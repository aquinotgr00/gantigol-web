<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;
use function GuzzleHttp\json_decode;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('API_URL'),
            'timeout' => '5',
            'http_errors' => false,
        ]);
    }
    
    public function post($id)
    {
        $response = $this->client->get('api/blogs/post/'.$id);
        $data = json_decode($response->getBody())->blog;

        $sameCategoryPosts = $this->client->get('api/blogs/post/category/'.$data->category_name.'/9');
        $sameCategoryPosts = json_decode($sameCategoryPosts->getBody())->post->data;
        
        $popularPosts = $this->client->get('api/blogs/post/category/bola/5');
        $popularPosts = json_decode($popularPosts->getBody())->post->data;

        $categoryName = $data->category_name;

        $tags = [];
        $tagPosts = null;
        foreach ($data->tagged as $tag) {
            array_push($tags, $tag->tag_name);
        }
        if (isset($tags[0])) {
            $tagPosts = $this->client->get('api/blogs/post/tag/limit/9', [
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'query' => [
                    'tag' => $tags[0]
                ]
            ]);
            $tagPosts = json_decode($tagPosts->getBody());
        }

        return view('frontend.single-post', compact('data', 'sameCategoryPosts', 'popularPosts', 'categoryName', 'tagPosts'));
    }

    public function category($categoryName)
    {
        $data = $this->client->get('api/blogs/post/category/'.$categoryName.'/3');
        $data = json_decode($data->getBody());
        
        $popularPosts = $this->client->get('api/blogs/post/category/bola/5');
        $popularPosts = json_decode($popularPosts->getBody())->post->data;

        return view('frontend.category', compact('categoryName', 'data', 'popularPosts'));
    }

    public function getNextPagePosts($category, $page)
    {
        // determine the last page first
        $lastPage = $this->client->get('api/blogs/post/category/'.$category.'/3');
        $lastPage = json_decode($lastPage->getBody())->post->last_page;
        if ($page <= $lastPage) {
            $response = $this->client->get('api/blogs/post/category/'.$category.'/3?page='.$page);
            $data = json_decode($response->getBody());
        
            $view = view('frontend.post-ajax',compact('data'))->render();
            return response()->json(['html'=>$view]);
        }

        return response()->json(['html'=>' ']);
    }
    
    public function tags()
    {
        return view('frontend.tags');
    }
}
