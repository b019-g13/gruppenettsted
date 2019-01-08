<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\PostType;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        // Get all public posts
        $post_types = PostType::where('slug', 'public')->get()->toArray();
        $posts = Post::whereIn('post_type_id', $post_types)->get();

        return view('index', compact('posts', 'about_post'));
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function about_group()
    {
        // Get all the articles about each user
        $users = User::all()->pluck('name')->toArray();
        $user_slugs = [];
        foreach ($users as $user) {
            array_push($user_slugs, 'om-' . str_slug($user));
        }

        $posts = Post::whereIn('slug', $user_slugs)->get();

        return view('about-group', compact('posts'));
    }

    public function about_project()
    {
        $post = Post::where('slug', 'om-prosjektet')->firstOrFail();
        return view('posts.show', compact('post'));
    }
}
