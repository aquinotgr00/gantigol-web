<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class MembershipController extends Controller
{
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('API_URL'),
            'timeout' => '5',
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
            'form_params' => $request->except('_token')
        ]);

        $statuscode = $response->getStatusCode();

        $body = json_decode($response->getBody(), true);

        if (422 === $statuscode && isset($body['message'])) {
            return redirect('/')->with('error', $body['message']);
        }

        // get user by token
        $user = $this->client->get('api/user', [
            'headers' => [
                'Authorization' => 'Bearer '.$body['access_token']
            ]
        ]);

        $user = json_decode($user->getBody(), true);
        
        $request->session()->put('token', $body['access_token']);
        $request->session()->put('username', $user['username']);

        return redirect()->intended('/user');
    }

    public function user(Request $request)
    {
        $token = $request->session()->get('token');
        // get user by token
        $user = $this->client->get('api/user', [
            'headers' => [
                'Authorization' => 'Bearer '.$token
            ]
        ]);

        $user = json_decode($user->getBody());
        return view('frontend.user', compact('user'));
    }

    public function signout(Request $request)
    {
        $request->session()->flush();

        return redirect()->intended('/');
    }

    public function signup(Request $request)
    {
        $response = $this->client->post('auth/signup', [
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

            return redirect()->intended('/user');
        }

        return redirect()->route('homepage')->with('errors', ['Error.']);
    }
}
