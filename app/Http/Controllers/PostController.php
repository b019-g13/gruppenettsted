<?php

namespace App\Http\Controllers;

use Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Post;
use App\PostType;

class PostController extends Controller
{
    public function __construct()
    {
        // Users have to be logged-in in order to create and edit posts
        $this->middleware('auth')->except(
            'index',
            'show'
        );
    }

    // Show list of posts
    public function index()
    {
        $post_types = PostType::where('slug', 'public')->get()->toArray();

        // Get all public posts
        $posts = Post::whereIn('post_type_id', $post_types)->get();

        // Filter out the about project post from all the other posts
        $posts = $posts->where('slug', '!=', 'om-prosjektet');

        return view('posts.index', compact('posts'));
    }

    public function index_admin()
    {
        $posts = Post::all();
        return view('posts.index_admin', compact('posts'));
    }

    // Show form for creating a new post
    public function create()
    {
        $post_types = PostType::all();

        return view('posts.create', compact('post_types'));
    }

    // Validates that the information we are storing is correct
    protected function post_validator(array $data, int $step = null, int $id = null)
    {
        $valid_post_types = implode(',', PostType::all()->pluck('id')->toArray());

        $validator_step_1 = [
            'title' => 'required|string',
            'content' => 'nullable|string',
            'post_type_id' => 'required|integer|in:' . $valid_post_types
        ];

        $slug_rule = 'required|string|unique:posts';
        if ($id != null) {
            $slug_rule .= ',slug,' . $id;
        }

        $validator_step_2 = [
            'slug' => $slug_rule,
            'user_id' => 'required|integer'
        ];

        // Validate the first section of the request
        if ($step === 1) {
            return Validator::make($data, $validator_step_1);
        }

        // Validate the second section of the request
        if ($step === 2) {
            return Validator::make($data, $validator_step_2);
        }

        // Validate the whole request
        $validator_step_all = array_merge($validator_step_1, $validator_step_2);
        return Validator::make($data, $validator_step_all);
    }

    // Save a new post
    public function store(Request $request)
    {
        // Validate data sent by user
        $this->post_validator($request->all(), 1)->validate();

        // Add data to the request
        $request->merge([
            'slug' => str_slug($request->title),
            'user_id' => str_slug($request->user()->id),
        ]);

        // Validate the new parts of the request
        $this->post_validator($request->all(), 2)->validate();

        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->content = $request->content;
        $post->post_type_id = $request->post_type_id;
        $post->user_id = $request->user_id;
        $post->save();

        if ($request->has('image')) {
            if (!$post->updateImage($request->file('image'))) {
                Session::flash('error', 'Noe gikk galt. Vi kunne ikke laste opp bilde.');
            }
        }

        Session::flash('success', 'Innlegg ble opprettet');
        return redirect()->route('post.index.admin');
    }

    // Show a post
    public function show($post)
    {
        if (is_numeric($post)) {
            $post = Post::findOrFail($post);
        } else if (is_string($post)) {
            $post = Post::where('slug', $post)->firstOrFail();
        }

        return view('posts.show', compact('post'));
    }

    // Show to form for editing a post
    public function edit(Post $post)
    {
        $post_types = PostType::all();
        return view('posts.edit', compact('post', 'post_types'));
    }

    // Save the changes to the post
    public function update(Request $request, Post $post)
    {
        // Validate data sent by user
        $this->post_validator($request->all(), 1, $post->id)->validate();

        // Add data to the request
        $request->merge([
            'slug' => str_slug($request->title),
            'user_id' => str_slug($request->user()->id),
        ]);

        // Validate the new parts of the request
        $this->post_validator($request->all(), 2, $post->id)->validate();

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->content = $request->content;
        $post->post_type_id = $request->post_type_id;
        $post->save();

        if ($request->has('image')) {
            if (!$post->updateImage($request->file('image'))) {
                Session::flash('error', 'Noe gikk galt. Vi kunne ikke laste opp bilde.');
            }
        }

        Session::flash('success', 'Innlegg ble oppdatert');
        return redirect()->route('post.index.admin');
    }

    // Show form for deleting a post
    public function delete(Post $post)
    {
        return view('posts.delete', compact('post'));
    }

    // Delete the post
    public function destroy(Post $post)
    {
        $post->delete();
        Session::flash('success', 'Innlegg ble slettet');

        return redirect()->route('post.index.admin');
    }
}
