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
                               <button class="btn btn-success" data-toggle="modal" data-target="#addProduct" style="margin-bottom: 2rem"><span class="fa fa-plus"></span> Create New</button>
                            </div>
                            <div class="col-xs-12">
                                <div class="table-responsive table-hover table-bordered">
                                    <table class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Category</th>
                                                <th>Title</th>
                                                <th>Posted by</th>
                                                <th>Date</th>
                                                <th>Modified</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $key => $post)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$post->category->name}}</td>
                                                <td>{{$post->header}}</td>
                                                <td>{{$post->user->firstname}}</td>
                                                <td>{{$post->created_at->format('F j, Y')}}</td>
                                                <td>
                                                    <a href="/admin/adm-edit/post/{{$post->uuid}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> / 
                                                    <a href="/admin/adm-delete/post/{{$post->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Category</th>
                                                <th>Title</th>
                                                <th>Posted by</th>
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
               <form action="/admin/adm-post" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="form-group">
                    <select name="category" class="form-control :class="{ 'is-invalid': form.errors.has('category') }" required>
                        <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->name}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <has-error :form="form" field="category"></has-error>
                </div>
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
@section('script')

    <!--begin::Page Vendors -->
    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}" type="text/javascript"></script>

    <!--end::Page Vendors -->

    <!--begin::Page Scripts -->
    <script src="{{asset('admin/plugins/datatables/dataTables.responsive.min.js')}}" type="text/javascript"></script>

    <script>

        function deleteProject(id) {

            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true

            }).then(function(result){
                if (result.value) {

                    confirmDeleteProject(id);

                    swal(
                        'Deleted!',
                        'Project has been deleted.',
                        'success'
                    )
                    .then(function(){
                        location.reload();
                    });
                } else if (result.dismiss === 'cancel') {
                    swal(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            });
        };

        function confirmDeleteProject(id){
            var id = id;
            $.ajax({
                url: '{{url("/project/delete")}}',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "projectId": id
                },
                success: function(data){
                }
            });
        }

    </script>
    
@endsection
