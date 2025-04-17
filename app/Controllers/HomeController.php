<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Post;

class HomeController
{
    // public function index()
    // {
    //     $categories = Category::all();
    //     $keyword = $_GET['keyword'] ?? '';

    //     if ($keyword) {
    //         $posts = Post::select(['posts.*', 'name as cagetory_name'])
    //         ->join('categories', 'category_id', 'id')
    //         ->where('title', 'LIKE', "%$keyword%")
    //         ->get();
    //     } else {
    //         $posts = Post::select(['posts.*', 'name as cagetory_name'])
    //         ->join('categories', 'category_id', 'id')
    //         ->orderBy('id', 'DESC')
    //         ->get();
    //     }

    //     return view('home', compact('posts', 'categories'));
    // }

    // use Illuminate\Http\Request;

    public function index()
    {
        $search = $_GET['search'] ?? '';
        $categories = Category::all();

        // dd($posts);

        if ($search) {
            $posts = Post::select(['posts.*', 'categories.name as category_name'])
            ->join('categories', 'category_id', 'id')
            ->where('posts.title', 'LIKE', '%' . $search . '%')
            ->orderBy('id', 'DESC')
            ->get();

            $postsSidebar = Post::select(['posts.*', 'categories.name as cagetory_name'])
                ->join('categories', 'category_id', 'id')
                ->orderBy('id', 'DESC')
                ->get();

            return view('search', compact('posts', 'categories', 'search', 'postsSidebar'));
        } else {

            $posts = Post::select(['posts.*', 'name as cagetory_name'])
            ->join('categories', 'category_id', 'id')
            ->orderBy('id', 'DESC')
            ->get();
            return view('home', compact('posts', 'categories'));
        }
    }



    public function listPost()
    {
        $categories = Category::all();
        $posts = Post::select(['posts.*', 'name as cagetory_name'])
            ->join('categories', 'category_id', 'id')
            ->get();
        $postsSidebar = Post::select(['posts.*', 'name as cagetory_name'])
            ->join('categories', 'category_id', 'id')
            ->orderBy('id', 'DESC')
            ->get();

        return view('listPost', compact('categories', 'posts', 'postsSidebar'));
    }

    public function listPostCategory($id)
    {
        $categories = Category::all(); // Lấy danh mục

        // Lấy bài viết theo danh mục
        $posts = Post::select(['posts.*', 'name as cagetory_name'])
            ->join('categories', 'category_id', 'id')
            ->where('category_id', '=', $id)
            ->get();

        $postsSidebar = Post::select(['posts.*', 'name as cagetory_name'])
            ->join('categories', 'category_id', 'id')
            ->orderBy('id', 'DESC')
            ->get();
        // dd($posts);
        return view('listPost', compact('categories', 'posts', 'postsSidebar'));
    }

    public function aboutUs()
    {
        $categories = Category::all();
        return view('aboutUs', compact('categories'));
    }
    public function contact()
    {
        $categories = Category::all();
        return view('contact', compact('categories'));
    }
    public function detailPost($id)
    {
        $categories = Category::all();

        $post = Post::select(['posts.*', 'categories.name as category_name'])
            ->joinCate('categories', 'posts.category_id', 'categories.id')
            ->whereCate('posts.id', '=', $id)
            ->first();
        // dd($post);
        $postsSidebar = Post::select(['posts.*', 'name as cagetory_name'])
            ->join('categories', 'category_id', 'id')
            ->orderBy('id', 'DESC')
            ->get();

        //     $postsRelated = Post::select(['posts.*', 'categories.name as category_name'])
        //     ->join('categories', 'posts.category_id', 'categories.id')
        //     ->where('posts.category_id', '=', $id) // Lọc bài viết cùng danh mục
        //     ->get();
        // dd($postsRelated);

        return view('detailPost', compact('categories', 'postsSidebar', 'post'));
    }
    public function login()
    {
        $categories = Category::all();
        return view('login', compact('categories'));
    }
    public function register()
    {
        $categories = Category::all();
        return view('register', compact('categories'));
    }
}
