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
            'timeout' => env('CURL_TIMEOUT','50'),
            'http_errors' => false,
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
    }
    
    public function post(Request $request, $id = null)
    {   
        if ($request->is('blog/formasi')) {
            $categoryPost = 'FORMASI';
        } else if ($request->is('blog/statistik')) {
            $categoryPost = 'STATISTIK';
        } else if ($request->is('blog/taktik')) {
            $categoryPost = 'TAKTIK';
        }
        if($id ==null){
             $responseCategory = $this->client->get('api/blogs/post/category/'.$categoryPost.'/1');
             $postCategory = json_decode($responseCategory->getBody());
            $id=$postCategory->post->data[0]->id;
        }
        $response = $this->client->get('api/blogs/post/'.$id);
         $data = json_decode($response->getBody());
        if (isset($data->blog)) {
            $data = $data->blog;
            $sameCategoryPosts = $this->client->get('api/blogs/post/category/'.$data->category_name.'/9');
            $sameCategoryPosts = json_decode($sameCategoryPosts->getBody())->post->data;

            $categoryName = $data->category_name;

            $tags = [];
            $tagPosts = null;
            $tagProducts = null;
            foreach ($data->tagged as $tag) {
                array_push($tags, $tag->tag_name);
            }
            if (isset($tags[0])) {
                $tagPosts = $this->client->get('api/blogs/post/tag/limit/9', [
                    'query' => [
                        'tag' => $tags[0]
                    ]
                ]);
                $tagPosts = json_decode($tagPosts->getBody())->data;
                $tagProducts = $this->client->get('api-product/items', [
                    'query' => [
                        'tags' => $tags[0],
                        'limit' => 4
                    ]
                ]);
                $tagProducts = json_decode($tagProducts->getBody());
            }

            return view('frontend.single-post', compact('data', 'sameCategoryPosts', 'categoryName', 'tagPosts', 'tagProducts'));
        }
        abort(404);
    }

    public function category($categoryName)
    {
        $data = $this->client->get('api/blogs/post/category/'.$categoryName.'/3');
        $data = json_decode($data->getBody());

        return view('frontend.category', compact('categoryName', 'data'));
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
    
    public function tags($name)
    {
        $posts = $this->client->get('api/blogs/post/tag/limit/99', [
            'query' => [
                'tag' => $name
            ]
        ]);
        $posts = json_decode($posts->getBody());
        $categoryName = 'tags';
        return view('frontend.tags', compact('categoryName', 'posts'));
    }
}
