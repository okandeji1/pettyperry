@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">Add New User</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Admin</a></li>
                            <li><a href="#">Pages</a></li>
                            <li class="active">New User</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="wrapper-page">
                    <div class="panel panel-color panel-primary panel-pages">
        
                        <div class="panel-body">
                            <h3 class="text-center m-t-0 m-b-30">
                                <span class="text-primary">Modify User</span>
                            </h3>
                            <h4 class="text-muted text-center m-t-0"><b></b></h4>
                            @include('partials.messages')
                            {{-- Author form --}}
                            <form class="form-horizontal m-t-20" action="/admin/user/adm-author/{{$user->id}}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="author">Make Author</label>
                                    <input type="checkbox" name="author" class=" :class="{ 'is-invalid': form.errors.has('author') }" required>
                                    <has-error :form="form" field="author"></has-error>
                                </div>
                                <div class="form-group text-center m-t-20">
                                    <div class="col-xs-12">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                            {{-- Admin form --}}
                            <form class="form-horizontal m-t-20" action="/admin/user/adm-admin/{{$user->id}}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="admin">Make Admin</label>
                                    <input type="checkbox" name="admin" class=" :class="{ 'is-invalid': form.errors.has('admin') }" required>
                                    <has-error :form="form" field="admin"></has-error>
                                </div>
                                <div class="form-group text-center m-t-20">
                                    <div class="col-xs-12">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection