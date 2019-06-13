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
            'timeout' => '5',
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
        dd(env('API_URL'));

        $popularPosts = $this->client->get('api/blogs/post/category/bola/5');
        $popularPosts = json_decode($popularPosts->getBody());
        if (isset($popularPosts->post)) {
            $popularPosts = $popularPosts->post->data;
            return view('frontend.index', compact('bola', 'klub', 'man', 'banners', 'popularPosts'));
        }
        return view('frontend.index', compact('bola', 'klub', 'man', 'banners'));
    }

    public function reset()
    {
        return view('frontend.reset-password');
    }
    public function postReset(Request $request)
    {
        $response = $this->client->post('auth/password/reset', [
            'form_params' => [
                'email' => $request->email,
                'url_act' => 'gantigoal.test/reset-password',
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
        $response = $this->client->get('api/blogs/search/'.$term);
        $data = json_decode($response->getBody());
        // return response()->json($data);
        return view('frontend.search', compact('term', 'data'));
    }
    
    public function thanks()
    {
        return view('frontend.thanks')->with([
            'messages.heading' => 'TELAH MELAKUKAN PEMESANAN!',
            'messages.body' => 'this is body'
        ]);
    }
}
