<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use function GuzzleHttp\json_decode;

class MembershipController extends Controller
{
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('API_URL'),
            'timeout' => '10',
            'http_errors' => false,
        ]);
    }

    public function login()
    {
        return view('frontend.login');
    }

    public function register()
    {
        return view('frontend.register');
    }

    public function signin(Request $request)
    {
        $request->request->add(['verification' => 'unverified']);

        $response = $this->client->post('auth/signin', [
            'form_params' => $request->except(['_token', 'cart_session'])
        ]);

        $statuscode = $response->getStatusCode();

        $body = json_decode($response->getBody(), true);

        if (422 === $statuscode && isset($body['message'])) {
            return redirect()->back()->with('error', $body['message']);
        }

        // get user by token
        $user = $this->client->get('api/user', [
            'headers' => [
                'Authorization' => 'Bearer '.$body['access_token']
            ]
        ]);

        $user = json_decode($user->getBody(), true);
        
        // get user cart
        $userCart = $this->client->get('api-ecommerce/cart-by-user/'.$user['id']);
        $userCart = json_decode($userCart->getBody());

        if ($request->cart_session != null) {
            // merge the user cart with current cart items
            $userCart = $this->client->get('api-ecommerce/cart-merge/'.$user['id'].'?session='.$request->cart_session);
            $userCart = json_decode($userCart->getBody());
        }

        if ($userCart->data != null) {
            $request->session()->put('cart_id', $userCart->data->id);
            $request->session()->put('cart_session', $userCart->data->session);
        }
        $request->session()->put('token', $body['access_token']);
        $request->session()->put('username', $user['username']);

        return redirect()->back();
    }

    public function user(Request $request)
    {
        $token = $request->session()->get('token');
        // get user by token
        $user = $this->client->get('api/user', [
            'headers' => [
                'Content-Type' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => 'Bearer '.$token
            ]
        ]);

        $user = json_decode($user->getBody());
        return view('frontend.user', compact('user'));
    }

    public function signout(Request $request)
    {
        // get user by token
        $user = $this->client->get('api/user', [
            'headers' => [
                'Content-Type' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => 'Bearer '.$request->session()->get('token')
            ]
        ]);

        $user = json_decode($user->getBody(), true);
        
        // get user cart
        $userCart = $this->client->get('api-ecommerce/cart-by-user/'.$user['id']);
        $userCart = json_decode($userCart->getBody())->data;

        if (isset($userCart->get_items)) {
            // update the user cart items to checked false
            foreach ($userCart->get_items as $key => $item) {
                $response = $this->client->post('api-ecommerce/cart', [
                    'form_params' => [
                        'session' => $userCart->session,
                        'items[$key][product_id]' => $item->product_id,
                        'items[$key][qty]' => 0,
                        'items[$key][price]' => $item->price,
                        'items[$key][size_code]' => $item->size_code,
                        'items[$key][subtotal]' => 0,
                        'items[$key][checked]' => 'false',
                        'total' => 0
                    ]
                ]);
            }
        }
        $request->session()->flush();

        return redirect()->intended('/');
    }

    public function signup(Request $request)
    {
        $request->request->add(['url_act' => '/user']);

        $response = $this->client->post('auth/signup', [
            'headers' => [
                'Accept' => 'application/json',
                // 'Content-Type' => 'application/json'
            ],
            'form_params' => $request->all()
        ]);

        $body = json_decode($response->getBody(), true);

        if (201 === $response->getStatusCode() && $body['access_token']) {
            $signin = $this->client->post('auth/token/signin', [
                'form_params' => [
                    'token' => $body['access_token']
                ]
            ]);

            $statuscode = $signin->getStatusCode();

            $signinBody = json_decode($signin->getBody(), true);

            if (422 === $statuscode && isset($signinBody['message'])) {
                // $request->session()->flash('error', $signinBody['message']);
                return redirect('/')->with('error', $signinBody['message']);
            }

            // get user by token
            $user = $this->client->get('api/user', [
                'headers' => [
                    'Authorization' => 'Bearer '.$signinBody['access_token']
                ]
            ]);

            $user = json_decode($user->getBody(), true);
            
            $request->session()->put('token', $signinBody['access_token']);
            $request->session()->put('username', $user['username']);

            return redirect()->intended('/');
        }

        return redirect()->back()->with('errors', $body['errors']);
    }

    public function apiSubdistrict(Request $request)
    {
        // return $request->all();
        $response = $this->client->get('shipment/subdistrict?q='.$request->term);
        $response = json_decode($response->getBody());
        foreach ($response->data as $key => $value) {
            $data[$key]['id'] = $value->id;
            $data[$key]['value'] = $value->name;
            $data[$key]['city'] = $value->city->name;
            $data[$key]['province'] = $value->city->province->name;
            $data[$key]['postal_code'] = $value->city->postal_code;
        }
        return response()->json($data);
    }
}
