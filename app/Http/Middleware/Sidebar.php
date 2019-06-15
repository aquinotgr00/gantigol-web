<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client;

class Sidebar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        view()->share('sidePost', ['post'=>$this->hotPost(), 'latestProducts' =>$this->latestProducts(), 'legends'=>$this->legendPost()]);
        return $next($request);
    }

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('API_URL'),
            'timeout' => env('CURL_TIMEOUT','50'),
            'http_errors' => false,
        ]);
    }

    /**
     * Handle an sidebar hot Post.
     *
     * 
     * @return mixed
     */
    public function hotPost(){
        $popularPosts = $this->client->get('api/blogs/post/article/hot');
        return json_decode($popularPosts->getBody());
    }
    
    /**
     * Handle an sidebar hot Post.
     *
     * 
     * @return mixed
     */
    public function latestProducts(){
        $latestProducts = $this->client->get('api-product/items-latest');
        return json_decode($latestProducts->getBody())->data;
    }

    /**
     * Handle an sidebar Legenda Post.
     *
     * 
     * @return mixed
     */
    public function legendPost(){
        $post = $this->client->get('api/blogs/post/category/legenda/1');
        return json_decode($post->getBody())->post->data;
    }
}
