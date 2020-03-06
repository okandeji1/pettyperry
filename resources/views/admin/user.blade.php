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
                    <h4 class="pull-left page-title">Users</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Admin</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Users Table</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Users List</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                               <button class="btn btn-success" data-toggle="modal" data-target="#addProduct" style="margin-bottom: 2rem"><span class="fa fa-plus"></span> Create New</button>
                            </div>
                            <div class="col-xs-12">
                                <div class="table-responsive table-hover table-bordered">
                                    <table id="datatable-responsive" class="table table-striped table-bordered table-hover table-checkable dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Username</th>
                                                <th>Author</th>
                                                <th>Admin</th>
                                                <th>Date</th>
                                                <th>Modified</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $key => $user)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$user->firstname}}</td>
                                                <td>{{$user->lastname}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->username}}</td>
                                                @if($user->is_author)
                                                <td>yes</td>
                                                @else
                                                <td>No</td>
                                                @endif
                                                @if($user->is_admin)
                                                <td>yes</td>
                                                @else
                                                <td>No</td>
                                                @endif
                                                <td>{{$user->created_at->format('F j, Y')}}</td>
                                                <td>
                                                    <a href="/admin/adm-edit/user/{{$user->uuid}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> / 
                                                    <a href="/admin/adm-delete/user/{{$user->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Username</th>
                                                <th>Author</th>
                                                <th>Admin</th>
                                                <th>Date</th>
                                                <th>Modified</th>
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

<!-- Modal -->
<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="addProduct" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProduct">Add New Post</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
               <form action="/admin/adm-create" method="post">
                    {{ csrf_field() }}
                <div class="form-group">
                    <input type="file" name="image" class="form-control :class="{ 'is-invalid': form.errors.has('image') }" required>
                    <has-error :form="form" field="image"></has-error>
                </div>
                <div class="form-group">
                    <textarea name="header" class="form-control :class="{ 'is-invalid': form.errors.has('header') }" placeholder="Post header" required></textarea>
                    <has-error :form="form" field="header"></has-error>
                </div>
                <div class="form-group">
                    <textarea name="content" class="form-control :class="{ 'is-invalid': form.errors.has('content') }" placeholder="Post content" required></textarea>
                    <has-error :form="form" field="content"></has-error>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
              </form>
            </div>
        </div>
    </div>
@endsection
