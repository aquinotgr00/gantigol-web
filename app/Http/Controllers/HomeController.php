<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;
use function GuzzleHttp\json_decode;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('API_URL'),
            'timeout' => env('CURL_TIMEOUT','50'),
            'http_errors' => false,
        ]);
    }

    public function index()
    {
        $bola = $this->client->get('api/blogs/post/category/bola/3');
        $bola = json_decode($bola->getBody());

        $klub = $this->client->get('api/blogs/post/category/klub/3');
        $klub = json_decode($klub->getBody());

        $man = $this->client->get('api/blogs/post/category/man/3');
        $man = json_decode($man->getBody());

        $banners = $this->client->get('api/banners/banner/home/3');
        $banners = json_decode($banners->getBody(), true);

        return view('frontend.index', compact('bola', 'klub', 'man', 'banners'));
    }

    public function about()
    {
        $banners = $this->client->get('api/banners/banner/about/1');
        $banners = json_decode($banners->getBody(), true);

        return view('frontend.about', compact('banners'));
    }

    public function reset()
    {
        return view('frontend.reset-password');
    }
    public function postReset(Request $request)
    {   
        $request->validate([
            'email' => 'required|email',
        ]);
        $response = $this->client->post('auth/password/reset', [
            'form_params' => [
                'email' => $request->email,
                'url_act' => env('APP_URL').'/reset-password',
            ]
        ]);
        $statuscode = $response->getStatusCode();
        if (422 == $statuscode ) {
                return back()->with('error', "Format email tidak benar.");
            }
        if (isset($data->data->message)) {
            return back()->with('error', 'Email tidak ditemukan.');
        }

        return redirect('/thanks')->with([
            'group'=>'Reset',
            'messages.heading' => '',
            'messages.body' => 'Silahkan mengikuti instruksi selanjutnya melalui email.'
        ]);
    }
    public function resetForm($token)
    {
        return view('frontend.reset-password-form', compact('token'));
    }
    public function postResetForm(Request $request)
    {
        $response = $this->client->post('auth/password/change', [
            'form_params' => $request->all()
        ]);
        $data = json_decode($response->getBody());

        if ("Email / token not valid" == $data->data->message) {
            return redirect('/reset')->with('error', $data->data->message);
        }

        ;
        if ($data->data->access_token) {
            $signin = $this->client->post('auth/token/signin', [
                'form_params' => [
                    'token' => $data->data->access_token
                ]
            ]);

            $statuscode = $signin->getStatusCode();

            $signinBody = json_decode($signin->getBody(), true);

            if (422 === $statuscode && isset($signinBody['message'])) {
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
        
        return response()->json($data);
    }

    public function search(Request $request)
    {
        $term = $request->term;
        if ($term !== null) {
            $response = $this->client->get('api/blogs/search/'.$term);
            $data = json_decode($response->getBody());

            $product = $this->client->get('api-product/items?keyword='.$term);
            $product = json_decode($product->getBody());

            return view('frontend.search', compact('term', 'data', 'product'));
        }
        return view('frontend.search');
    }

    public function infoPage(Request $request)
    {
        $categoryName = $request->segment(1);
        return view('frontend.info', compact('categoryName'));
    }
    
    public function thanks(Request $request)
    {   
        $categoryName = null;
        if ($request->session()->has('group')) {
        $categoryName = $request->session()->get('group');
        }
        
        return view('frontend.thanks',compact('categoryName'))->with([
            'messages.heading' => 'TELAH MELAKUKAN PEMESANAN!',
            'messages.body' => 'this is body'
        ]);
    }
}
