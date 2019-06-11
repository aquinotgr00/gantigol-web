<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('API_URL'),
            // 'timeout' => '5',
            'http_errors' => false,
        ]);
    }

    public function index()
    {
        return view('frontend.index');
    }
    
    public function post()
    {
        return view('frontend.single-post');
    }
    
    public function category()
    {
        return view('frontend.category');
    }
    
    public function products()
    {
        $response = $this->client->get('api-product/items');
        $data = json_decode($response->getBody());
        return view('frontend.products')->with(['data' => $data]);
    }
    public function product($id)
    {
        $response = $this->client->get('api-product/items/'. $id);
        $data = json_decode($response->getBody());
        return view('frontend.product', compact('data'));
    }

    public function reset()
    {
        return view('frontend.reset-password');
    }
    public function postReset(Request $request)
    {
        $response = $this->client->post('auth/password/reset', [
            'form_params' => [
                'email' => $request->email
            ]
        ]);
        $data = json_decode($response->getBody());
        
        if (isset($data->data->message)) {
            return back()->with('error', 'Email tidak ditemukan.');
        }

        $message = [
            'heading' => '',
            'body' => 'Kami telah mengirim link reset password ke email anda.'
        ];

        // session()->flash('message', 'flased');
        return redirect('/thanks')->with([
            'messages.heading' => '',
            'messages.body' => 'Silahkan mengikuti instruksi selanjutnya melalui email.'
        ]);
    }
    public function resetForm($token)
    {
        // $response = $this->client->post('auth/token/verification/', [
        //     'form_params' => [
        //         'token' => $token
        //     ]
        // ]);
        // $data = json_decode($response->getBody());

        return view('frontend.reset-password-form', compact('token'));
    }
    public function postResetForm(Request $request)
    {
        $response = $this->client->post('auth/password/change', [
            'form_params' => $request->all()
        ]);
        $data = json_decode($response->getBody());
        
        return response()->json($data);
    }

    public function search()
    {
        return view('frontend.search');
    }
    
    public function tags()
    {
        return view('frontend.tags');
    }
    
    public function thanks()
    {
        return view('frontend.thanks')->with([
            'messages.heading' => 'TELAH MELAKUKAN PEMESANAN!',
            'messages.body' => 'this is body'
        ]);
    }
}
