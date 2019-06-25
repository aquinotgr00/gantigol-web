<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;
use function GuzzleHttp\json_decode;

use Illuminate\Support\Facades\URL;

class CartController extends Controller
{
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('API_URL'),
            'timeout' => '10',
            'http_errors' => false,
        ]);
    }

    private function getProduct($id)
    {
        $response = $this->client->get('api-product/items/'. $id);
        $data = json_decode($response->getBody());
        return $data;
    }

    public function getCourierCost(Request $request, $id, $courier, $weight)
    {
        if ($weight == 0) {
            $weight = 10;
        }
        //origin = city_id
        $response = $this->client->get('shipment/cost?o=419&d='.$id.'&w='.$weight.'&c='.$courier);
        $response = json_decode($response->getBody());
        return response()->json($response->rajaongkir->results[0]->costs);
    }

    public function checkout(Request $request)
    {
        $token = $request->session()->get('token');
        $username = $request->session()->get('username');
        $categoryName = 'Checkout';

        if (!is_null($token) && !is_null($username)) {
            // get user by token
            $user = $this->client->get('api/user', [
                'headers' => [
                    'Authorization' => 'Bearer '.$token
                ]
            ]);

            $user = json_decode($user->getBody());
            return view('frontend.checkout', compact('user', 'categoryName'));
        }
        return view('frontend.checkout', compact('categoryName'));
    }

    public function postCheckout(Request $request)
    {
        $shipping = [];
        parse_str($request->shipping, $shipping);
        if ($shipping['user_id'] == "") {
            $response = $this->client->post('api-ecommerce/cart-checkout', [
                'form_params' => [
                    'session' => $request->session,
                    'shipping_name' => $shipping['name'],
                    'shipping_phone' => $shipping['phone'],
                    'shipping_email' => $shipping['email'],
                    'shipping_address' => $shipping['address'],
                    'shipping_cost' => $shipping['cost'],
                    'shipping_subdistrict_id' => $shipping['subdistrict_id'],
                    'shipping_postal_code' => $shipping['postal_code'],
                    'shipment_name' => $shipping['shipment_name'],
                    'discount' => $shipping['discount'],
                ]
            ]);
        } else if ($shipping['user_id'] !== "") {
            $response = $this->client->post('api-ecommerce/cart-checkout', [
                'form_params' => [
                    'session' => $request->session,
                    'shipping_name' => $shipping['name'],
                    'shipping_phone' => $shipping['phone'],
                    'shipping_email' => $shipping['email'],
                    'shipping_address' => $shipping['address'],
                    'shipping_cost' => $shipping['cost'],
                    'shipping_subdistrict_id' => $shipping['subdistrict_id'],
                    'shipping_postal_code' => $shipping['postal_code'],
                    'shipment_name' => $shipping['shipment_name'],
                    'discount' => $shipping['discount'],
                    'user_id' => $shipping['user_id']
                ]
            ]);
        }
        if ($shipping['register_account'] == 'on') {
            $shipping['username'] = preg_replace('/\s+/', '', strtolower($shipping['name']));
            $shipping['password'] = 'default123';
            $shipping['password_confirmation'] = 'default123';
            $shipping['dob'] = '1990-01-01';
            $shipping['gender'] = 'male';
            $shipping['subdistrict'] = $shipping['subdistrict_text'];
            $shipping['url_act'] = '/user';
            $userSignup = $this->client->post('auth/signup', [
                'headers' => [
                    'Accept' => 'application/json',
                ],
                'form_params' => $shipping
            ]);
            $this->client->post('auth/password/reset', [
                'form_params' => [
                    'email' => $shipping['email'],
                    'url_act' => env('APP_URL').'/reset-password',
                ]
            ]);
        }
        $response = json_decode($response->getBody());
        return response()->json($response);
    }
    
    public function postCheckoutPreorder(Request $request)
    {
        $shipping = [];
        $preOrderItems = [];
        $preOrderId = 0;
        parse_str($request->shipping, $shipping);
        // get cart items by session
        $cartItems = $this->client->get('api-ecommerce/cart/999999?session='.$request->session);
        $cartItems = json_decode($cartItems->getBody())->data->get_items;
        // loop all the items and figure out which ones is pre order item
        foreach ($cartItems as $item) {
            if ($item->product_variant->product->pre_order !== null) {
                $preOrderItems[] = $item;
                $preOrderId = $item->product_variant->product->pre_order->id;
            }
        }
        $response = $this->client->post('api-preorder/transaction', [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded'
            ],
            'form_params' => [
                'pre_order_id' => $preOrderId,
                'name' => $shipping['name'],
                'email' => $shipping['email'],
                'phone' => $shipping['phone'],
                'postal_code' => $shipping['postal_code'],
                'address' => $shipping['address'],
                'items' => $preOrderItems,
                'subdistrict_id' => $shipping['subdistrict'],
                'courier_name' => $shipping['shipment_name'],
                'courier_fee' => $shipping['cost']
            ]
        ]);
        $response = json_decode($response->getBody())->data;
        return response()->json($response);
    }

    public function getItems(Request $request, $id, $checked = false)
    {
        $url = 'api-ecommerce/cart/'. $id . '?session='. $request->session;
        // if ($checked) {
        //     $url = 'api-ecommerce/cart-checked/'. $id;
        // }
        $response = $this->client->get($url);
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

    public function applyPromo(Request $request)
    {
        $response = $this->client->get('api/promos/promo/'.$request->promo);
        $response = json_decode($response->getBody());
        return response()->json($response);
    }

    public function store(Request $request)
    {
        $product = $this->client->get('api-product/variant?id='.$request->id);
        $product = json_decode($product->getBody());
        
        $userId = null;
        if ($request->user_token != null) {
            // get user by token
            $user = $this->client->get('api/user', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'X-Requested-With' => 'XMLHttpRequest',
                    'Authorization' => 'Bearer '.$request->user_token
                ]
            ]);

            $user = json_decode($user->getBody());
            $userId = $user->id;
        }

        // $total = $request->price * $request->qty;
        
        $response = $this->client->post('api-ecommerce/cart', [
            'form_params' => [
                'session' => $request->session,
                'items[$key][product_id]' => $request->id,      // variant ID
                'items[$key][qty]' => $request->qty,
                'items[$key][wishlist]' => 'false',
                'items[$key][checked]' => 'true',
                'user_id' => $userId,
            ]
        ]);

        $data = json_decode($response->getBody());
        return response()->json($data);
    }

    public function checkoutPreOrder(Request $request)
    {
        // return $request->all();
        $token = $request->session()->get('token');
        $username = $request->session()->get('username');
        $categoryName = 'Checkout';

        $preOrderItems = [];
        foreach ($request->items as $id => $value) {
            if ($value > 0) {
                $item = $this->client->get('api-product/variant?id='.$id);
                $item = json_decode($item->getBody());
                $preOrderItems[] = $item;
            }
        }
        // return response()->json($preOrderItems);
        if (!is_null($token) && !is_null($username)) {
            // get user by token
            $user = $this->client->get('api/user', [
                'headers' => [
                    'Authorization' => 'Bearer '.$token
                ]
            ]);

            $user = json_decode($user->getBody());
            return view('frontend.checkout', compact('user', 'categoryName', 'preOrderItems'));
        }
        return view('frontend.checkout', compact('categoryName', 'preOrderItems'));
    }

    public function storeItems(Request $request)
    {
        $product = $this->getProduct($request->id);
        $quantity = 0;
        $total = 0;

        $userId = null;
        if ($request->user_token != null) {
            // get user by token
            $user = $this->client->get('api/user', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'X-Requested-With' => 'XMLHttpRequest',
                    'Authorization' => 'Bearer '.$request->user_token
                ]
            ]);

            $user = json_decode($user->getBody());
            $userId = $user->id;
        }

        foreach ($request->items as $value) {
            $quantity += $value['quantity'];
            $total += $product->data->price * $value['quantity'];
        }
        foreach ($request->items as $key => $item) {
            $response = $this->client->post('api-ecommerce/cart', [
                'form_params' => [
                    'session' => $request->session,
                    'items[$key][product_id]' => $request->id,
                    'items[$key][qty]' => $item['quantity'],
                    'items[$key][price]' => $product->data->price,
                    'items[$key][subtotal]' => $product->data->price * $item['quantity'],
                    'items[$key][wishlist]' => 'false',
                    'items[$key][checked]' => 'true',
                    'amount_items' => $quantity,
                    'user_id' => $userId,
                    'total' => $total
                ]
            ]);
            $data = json_decode($response->getBody());
        }
        return response()->json($data);
    }

    public function charge(Request $request)
    {
        $api_url = config('services.midtrans.isProduction') ? 'https://app.midtrans.com/snap/v1/transactions' : 'https://app.sandbox.midtrans.com/snap/v1/transactions';
        $server_key = config('services.midtrans.serverKey');

        $client = new Client();
        $response = $client->post(
            $api_url,
            [
                'headers'=>[
                    'Content-Type'=>'application/json',
                    'Accept'=>'application/json',
                    'Authorization'=>'Basic ' . base64_encode($server_key . ':')
                ],
                'json'=>json_decode($request->getContent())
            ]
        );
            
        return $response->getBody();
    }
}
