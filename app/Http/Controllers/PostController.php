<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategories;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $response = [
            'data' => [],
            'message' => 'Something Wrong!',
            'status' => false,
        ];

        try {
            $posts = Post::select('posts.id as post_id', 'posts.title', 'posts.summary', 'posts.status_id', 'posts.category_id', 'posts.image', 'posts.content', 'posts.created_at',
            'users.name as user_name',
            'posts_status.id', 'posts_status.name as status_name'
            )
                ->join('users', 'posts.user_id', '=', 'users.id')
                ->join('posts_status', 'posts.status_id', '=', 'posts_status.id')
                ->where('status_id', '=', 1)
                ->orderBy('posts.created_at', 'desc')->paginate(6);

            $categories = PostCategories::all('id', 'name')->keyBy('id');

            if ($posts) {
                $response['data'] = $posts;
                $response['message'] = 'Get List Posts success';
                $response['status'] = true;
                $response['pagination'] = [
                    'total' => $posts->total(),
                    'per_page' => $posts->perPage(),
                    'current_page' => $posts->currentPage(),
                    'last_page' => $posts->lastPage(),
                    'from' => $posts->firstItem(),
                    'to' => $posts->lastItem()
                ];

            }

        } catch (\Exception $e) {
            echo 'Something Error in' . $e->getMessage() . "\n";
        }

        return response()->json($response);
    }

    public function show(Request $request, $id) {
        $response = [
            'data' => [],
            'message' => 'Something Wrong!',
            'status' => false,
        ];

        try {
            $post = Post::select('posts.id as post_id', 'posts.title', 'posts.summary', 'posts.status_id', 'posts.category_id', 'posts.image', 'posts.content', 'posts.created_at',
            'users.name as user_name')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('posts.id', $id)
            ->first();
            $post['category_id'] = json_decode($post['category_id']);
            $categories = PostCategories::all('id', 'name')->keyBy('id');

            if ($post) {
                $response['data'] = $post;
                $response['message'] = 'Get Post success';
                $response['status'] = true;
            }
        } catch (\Exception $e) {
            echo 'Something Error in' . $e->getMessage() . "\n";
        }
        
        return response()->json($response);
    }

    public function update() {

    }

    public function delete() {
        
    }
}
