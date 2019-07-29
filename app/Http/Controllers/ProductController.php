<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use function GuzzleHttp\json_decode;

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
        $banners = json_decode($banners->getBody(), true);

        $categories = $this->client->get('api-product/categories');
        $categories = json_decode($categories->getBody());

        return view('frontend.products')->with(['data' => $data, 'banners' => $banners, 'categories' => $categories]);
    }

    public function product($id)
    {
        $response = $this->client->get('api-product/items/'. $id);
        $data = json_decode($response->getBody());
        if ($data->data == []) {
            abort(404);
        }
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
                        'tags' => $tags[0],
                        'limit' => 4
                    ]
                ]);
            $related = json_decode($related_product->getBody());
        }
        return view('frontend.product', compact('data','related'));
    }

    public function getProducts(Request $request, $category=null)
    {
        $response = $this->client->get('api-product/items');
        $products = json_decode($response->getBody());
        if($request->has('data')){
        $term = $request->data['term'];
        if ($term === 'asc' || $term === 'desc') {
            $response = $this->client->get('api-product/items?price='.$term);
            $products = json_decode($response->getBody());
        } else if ($term === 'latest') {
            $response = $this->client->get('api-product/items-latest?limit=999');
            $products = json_decode($response->getBody());
        }
       }
        if($request->has('category') && !empty($request->category)){
           
            if($request->has('data')){
                $term = $request->data['term'];
                if ($term === 'asc' || $term === 'desc') {
                $response = $this->client->get('api-product/items/category/'.$request->category.'?price='.$term);
                } else if ($term === 'latest') {
                    $response = $this->client->get('api-product/items/category/'.$request->category.'?latest=desc');
                } 
            }else{
                     $response = $this->client->get('api-product/items/category/'.$request->category);
                }
            $products = json_decode($response->getBody());
        }
        $view = view('frontend.product-ajax',compact('products','category'))->render();
        return response()->json(['html'=>$view,'nextPage'=>$products->next_page_url,'currentPage'=>$products->current_page]);
    }

    public function getNextPageProducts(Request $request,$page, $category=null)
    {
        if($request->has('nextPage')){
            $response = $this->client->get( str_replace(env('API_URL'),'',$request->nextPage)); 
        }else{
            $response = $this->client->get('api-product/items?page='.$page);   
        }
        
        $products = json_decode($response->getBody());
        if($request->has('category')){
            $category = $request->category;
        }
        if ($products->current_page <= $products->last_page) {
            $view = view('frontend.product-ajax',compact('products','category'))->render();
            return response()->json(['html'=>$view,'nextPage'=>$products->next_page_url,'currentPage'=>$products->current_page]);
        }

        return response()->json(['html'=>' ']);
    }
}
