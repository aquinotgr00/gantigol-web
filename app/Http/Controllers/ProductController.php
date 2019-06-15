<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('API_URL'),
            'connect_timeout' => '10',
            'http_errors' => false,
        ]);
    }
    
    public function products()
    {
        $response = $this->client->get('api-product/items');
        $data = json_decode($response->getBody());

        $banners = $this->client->get('api/banners/banner/shop/3');
        $banners = json_decode($banners->getBody());

        return view('frontend.products')->with(['data' => $data, 'banners' => $banners]);
    }

    public function product($id)
    {
        $response = $this->client->get('api-product/items/'. $id);
        $data = json_decode($response->getBody());
        return view('frontend.product', compact('data'));
    }

    public function getNextPageProducts($page)
    {
        $response = $this->client->get('api-product/items?page='.$page);
        $products = json_decode($response->getBody());

        if ($page <= $products->last_page) {
            $view = view('frontend.product-ajax',compact('products'))->render();
            return response()->json(['html'=>$view]);
        }

        return response()->json(['html'=>' ']);
    }
}
