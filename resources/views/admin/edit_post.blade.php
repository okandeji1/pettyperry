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
                    <h4 class="pull-left page-title">Edit Post</h4>
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
                    <form class="form-horizontal m-t-20" action="/update/{{$post->id}}"  method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label for="">Post category is: {{$post->category->name}}</label>
                          <p>You can change category by selecting a category below. Otherwise, the category remain as above</p>
                        </div>
                        <div class="form-group">
                            <label for="image">Image (Optional)</label>
                        <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="header">Header</label>
                            <textarea name="header" class="form-control :class="{ 'is-invalid': form.errors.has('header') }">{{$post->header}}</textarea>
                            <has-error :form="form" field="header"></has-error>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" class="form-control :class="{ 'is-invalid': form.errors.has('content') }">{{$post->content}}</textarea>
                            <has-error :form="form" field="content"></has-error>
                        </div>
                        <div class="form-group">
                            <select name="category" class="form-control">
                                <option value="">Select Category (Optional)</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->name}}">{{$category->name}}</option>
                                    @endforeach
                            </select>
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
@endsection