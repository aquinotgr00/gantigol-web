<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://gantigol-platform.test/',
            'timeout' => '5',
            'http_errors' => false,
        ]);
    }

    public function getNextPageProducts($page)
    {
        $response = $this->client->get('api-product/items?page='.$page);
        $products = json_decode($response->getBody());
        // dd($products);
        // return $response->getBody();
        if ($page <= $products->last_page) {
            $view = view('frontend.product-ajax',compact('products'))->render();
            return response()->json(['html'=>$view]);
        }

        return response()->json(['html'=>' ']);
    }
}
