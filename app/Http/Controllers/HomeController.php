<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://gantigol-platform.test/',
            'timeout' => '5',
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

    public function user()
    {
        return view('frontend.user');
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
        return view('frontend.thanks');
    }
}
