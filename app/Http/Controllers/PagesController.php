<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Show Index page
        $posts = Post::where('status', 1)->inRandomOrder()->get();
        $ascPosts = Post::where('status', 1, 'asc')->paginate(10);
        $descPosts = Post::where('status', 1, 'desc')->paginate(10);
        return view('index', compact(
            'posts', $posts,
            'ascPosts', $ascPosts, 
            'descPosts', $descPosts));
    }

    public function profile()
    {
        return view('admin.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $post = Post::where('uuid',$uuid)->first();
        $posts = Post::where('status', 1)->inRandomOrder()->get();
        $descPosts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('show', compact(['post', $post, 'posts', $posts, 'descPosts', $descPosts]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
