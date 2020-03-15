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
                    <h4 class="pull-left page-title">Posts</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Admin</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Posts Table</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Post List</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                               <a class="btn btn-success" href="/admin/adm-add/post" style="margin-bottom: 2rem"><span class="fa fa-plus"></span> Create New</a>
                            </div>
                            <div class="col-xs-12">
                                <div class="table-responsive table-hover table-bordered">
                                    <table id="datatable-responsive" class="table table-striped table-bordered table-hover table-checkable dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Category</th>
                                                <th>Title</th>
                                                <th>Author</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Modified</th>
                                                <th>Publish</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $key => $post)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$post->category->name}}</td>
                                                <td>{{$post->header}}</td>
                                                <td>{{$post->user->firstname}}</td>
                                                @if($post->status)
                                                <td>Published</td>
                                                @else
                                                <td>Unpublished</td>
                                                @endif
                                                <td>{{$post->created_at->format('F j, Y')}}</td>
                                                <td>
                                                    <a href="/admin/adm-edit/post/{{$post->uuid}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> / 
                                                    <a href="/admin/adm-delete/post/{{$post->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </td>
                                                <td>
                                                    <a href="/admin/adm-publish/post/{{$post->uuid}}" class="btn btn-primary btn-lg"><i class="fa fa-share-square"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Category</th>
                                                <th>Title</th>
                                                <th>Author</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Modified</th>
                                                <th>Publish</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End row -->
    </div> <!-- container -->

</div>
<!-- content -->
@endsection
