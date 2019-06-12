<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;
use function GuzzleHttp\json_decode;

class CartController extends Controller
{
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('API_URL'),
            'timeout' => '5',
            'http_errors' => false,
        ]);
    }

    private function getProduct($id)
    {
        $response = $this->client->get('api-product/items/'. $id);
        $data = json_decode($response->getBody());
        return $data;
    }

    public function checkout(Request $request)
    {
        // return ;
        $token = $request->session()->get('token');
        $username = $request->session()->get('username');

        $cartItemsResponse = $this->client->get('api-ecommerce/cart/'. $request->cart_id);
        $cartItems = json_decode($cartItemsResponse->getBody());
        $cartItems = $cartItems->data->get_items;

        if (!is_null($token) && !is_null($username)) {
            // get user by token
            $user = $this->client->get('api/user', [
                'headers' => [
                    'Authorization' => 'Bearer '.$token
                ]
            ]);

            $user = json_decode($user->getBody());
            return view('frontend.checkout', compact('cartItems', 'user'));
        }
        return view('frontend.checkout', compact('cartItems'));
    }

    public function getItems($id)
    {
        $response = $this->client->get('api-ecommerce/cart/'. $id);
        $data = json_decode($response->getBody());
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $product = $this->getProduct($request->id);
        $cartItemsResponse = $this->client->get('api-ecommerce/cart/'. $id);
        $cartItems = json_decode($cartItemsResponse->getBody());
        $totalItems = count($cartItems->data->get_items);
        $total = 0;
        // foreach ($request->items as $value) {
        //     $total += $product->product->price * $value['quantity'];
        // }
        foreach ($request->items as $key => $item) {
            $key += $totalItems;
            $response = $this->client->put('api-ecommerce/cart/'. $id, [
                'form_params' => [
                    'items[$key][product_id]' => $request->id,
                    'items[$key][qty]' => $item['quantity'],
                    'items[$key][price]' => $product->product->price,
                    // 'items[$key][subtotal]' => $product->product->price * $item['quantity'],
                    'items[$key][subtotal]' => '6000000',
                    // 'total' => $total
                    'total' => '6000000'
                ]
            ]);
            $data = json_decode($response->getBody());
        }
        return response()->json($data);
    }

    public function getCartId(Request $request)
    {
        return $request->all();
    }

    public function deleteItem(Request $request, $id)
    {
        // delete the actual cart item
        $response = $this->client->post('api-ecommerce/cart-delete-item/'.$id);
        $response = json_decode($response->getBody());
        
        // if the cart item successfulyy deleted
        if ($response->message == 200) {
            return response()->json($response->data);
        }
        return response()->json('failed');
    }

    public function store(Request $request)
    {
        // return $request->all();
        $product = $this->getProduct($request->id);
        $quantity = 0;
        $total = 0;

        $userId = null;
        if ($request->user_token != null) {
            // get user by token
            $user = $this->client->get('api/user', [
                'headers' => [
                    'Authorization' => 'Bearer '.$request->user_token
                ]
            ]);

            $user = json_decode($user->getBody());
            $userId = $user->id;
        }

        foreach ($request->items as $value) {
            $quantity += $value['quantity'];
            $total += $product->product->price * $value['quantity'];
        }
        foreach ($request->items as $key => $item) {
            $response = $this->client->post('api-ecommerce/cart', [
                'form_params' => [
                    'session' => $request->session,
                    'items[$key][product_id]' => $request->id,
                    'items[$key][qty]' => $item['quantity'],
                    'items[$key][price]' => $product->product->price,
                    'items[$key][subtotal]' => $product->product->price * $item['quantity'],
                    'items[$key][wishlist]' => false,
                    'items[$key][size_code]' => $item['size_code'],
                    'amount_items' => $quantity,
                    'user_id' => $userId,
                    'total' => $total
                ]
            ]);
            $data = json_decode($response->getBody());
        }
        return response()->json($data);
    }
}
