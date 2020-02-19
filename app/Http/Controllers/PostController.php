<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Storage;
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
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
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
            'image' => 'required|file|mimes:jpg,png,peg,svg,gif,jpeg',
            'category' => 'required',
            'header' => 'required',
            'content' => 'required',
        ]);
        // Handle file upload
        if ($request->hasFile('image')) {
            // Get file name with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just the extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // File nameto store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            // Upload image
            $image = \Image::make($request->file('image')); //->save(public_path('posts/') . $fileNameToStore)
            $newImage = $image->resize(370,232);
            $path = "public/posts/".$fileNameToStore;
            Storage::put($path, $newImage->encode());
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
    public function edit($uuid)
    {
        $post = Post::where('uuid',$uuid)->first();
        $categories = Category::all();
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/admin/adm-login');
        }
        // Check for correct user
        return view('admin.edit_post', compact(['post', $post, 'categories', $categories]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this -> validate($request, [
            'header' => 'required',
            'content' => 'required'
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
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // Upload image
            \Image::make($request->file('image'))->save(public_path('posts/').$fileNameToStore);
        }
        $header = $request->header;
        $content = $request->content;
        $category = $request->category;
        // Update Post
        $updatePost = Post::find($id);
        if($updatePost){
            $updatePost->header = $header;
            $updatePost->content = $content;
            if ($request->hasFile('image')) {
                $updatePost->image = $fileNameToStore;
            }
                $content = $request->content;
            if($category !== null){
                $getCategory = Category::where('name', '=', $category)->firstOrFail();
                $getCategory_id = $getCategory->id;
                $updatePost->category_id = $getCategory_id;
                $updatePost->save();
                return redirect('/admin/adm-post')->with('success', 'Post Updated');
            }else {
                $updatePost->save();
                return redirect('/admin/adm-post')->with('success', 'Post Updated');
            }
        }else {
            return redirect('/admin/adm-post')->with('error', 'Unable to update post');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $deletePost = Post::find($id);
        // Check for correct user
        if($deletePost){
            // Delete Image
            Storage::delete('posts/'. $deletePost->image);
            $deletePost ->delete();
            return redirect('/admin/adm-post')->with('success', 'Post was deleted successfuly');
        }else {
            return redirect('/admin/adm-post')->with('success', 'Unable to delete post');
        }
    }
}
