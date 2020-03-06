@extends('layouts.admin')
@section('content')
<!-- Start content -->
<div class="content">
    @include('partials.messages')
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-header-title">
                    <h4 class="pull-left page-title">Add Post</h4>
                    <p class="text-danger text-center">You can only post image alone but you cannot post video without image</p>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Admin</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">Posts</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-body">
                    <form class="form-horizontal m-t-20" action="/admin/adm-post"  method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select id="category" name="category" class="form-control :class="{ 'is-invalid': form.errors.has('category') }" required>
                                <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->name}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <has-error :form="form" field="category"></has-error>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input id="image" type="file" name="image" class="form-control :class="{ 'is-invalid': form.errors.has('image') }">
                            <has-error :form="form" field="image"></has-error>
                        </div>
                        <div class="form-group">
                            <label for="media">Media</label>
                            <input id="media" type="file" name="media" class="form-control :class="{ 'is-invalid': form.errors.has('media') }">
                            <has-error :form="form" field="media"></has-error>
                        </div>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input id="link" type="text" name="link" class=" :class="{ 'is-invalid': form.errors.has('link') }">
                            <has-error :form="form" field="link"></has-error>
                        </div>
                        <div class="form-group">
                            <label for="header">Title</label>
                            <textarea id="header" name="header" class="form-control :class="{ 'is-invalid': form.errors.has('header') }" placeholder="Post header" required></textarea>
                            <has-error :form="form" field="header"></has-error>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea id="content" cols="30" rows="30" name="content" class="form-control :class="{ 'is-invalid': form.errors.has('content') }" placeholder="Post content" required></textarea>
                            <has-error :form="form" field="content"></has-error>
                        </div>
                        <div class="form-group">
                            <button class="form-control btn btn-success rounded-pill" type="submit">Save</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>


    </div> <!-- container -->

</div> <!-- content -->
{{-- ck editor scripts --}}
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/17.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script> --}}
@endsection
