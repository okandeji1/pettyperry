<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // passing category & product to the view
        $categories = Category::all();
        $posts = Post::orderBy('created_at', 'asc')->paginate(10);
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/admin/adm-login');
        }
        return view('admin.post', compact(['posts', $posts, 'categories', $categories]));
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
        $this->validate($request, [
            'image' => 'required',
            'category' => 'required',
            'header' => 'required',
            'content' => 'required',
        ]);
        // Handle file upload

        if ($request->hasFile('image')) {
            // Get file name with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just file name
            $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just the extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // File nameto store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            // Upload image
            \Image::make($request->file('image'))->save(public_path('posts/') . $fileNameToStore);
        } else {
            return redirect()->back()->with('error', 'Image is required');
        }
        // Form data
        $data = $request->only(['header', 'content', 'category']);
        // Get category
        $category = Category::where('name', '=', $data['category'])->firstOrFail();
        $category_id = $category->id;
        // Create Product
        $post = new Post();
        $post->uuid = Uuid::uuid4();
        $post->user_id = auth()->user()->id;
        $post->category_id = $category_id;
        $post->header = $data['header'];
        $post->content = $data['content'];
        $post->image = $fileNameToStore;
        $post->save();

        return back()->with('success', 'New Post Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
