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
        $tags = [];
        $tagPosts = null;
        $tagProducts = null;
        $related = null;
        if ($data->data->tagged != null) {
            foreach ($data->data->tagged as $tag) {
                array_push($tags, $tag->tag_name);
            }
            $related_product = $this->client->get('api-product/items',[
                    'headers' => [
                        'Accept' => 'application/json'
                    ],
                    'query' => [
                        'tag' => $tags[0]
                    ]
                ]);
            $related = json_decode($related_product->getBody());
        }
        return view('frontend.product', compact('data','related'));
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
