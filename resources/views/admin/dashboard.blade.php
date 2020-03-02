@extends('layouts.admin')
@section('content')
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">Dashboard</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Admin</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a href="/admin/adm-post">Total Posts</h4></a>
                        </div>
                        <div class="panel-body">
                                <h3 class=""><b>{{$countAllPosts}}</b></h3>
                            <p class="text-muted"><b>48%</b> From Last 24 Hours</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                            <h4 class="panel-title">Published Posts</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class=""><b>{{$countPublished}}</b></h3>
                            <p class="text-muted"><b>15%</b> Orders in Last 10 months</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                            <h4 class="panel-title">Unpublished Posts</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class=""><b>{{$countUnpublished}}</b></h3>
                            <p class="text-muted"><b>65%</b> From Last 24 Hours</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                            <h4 class="panel-title">Comments</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class=""><b>2779</b></h3>
                            <p class="text-muted"><b>31%</b> From Last 1 month</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <h4 class="m-t-0">Revenue</h4>
                            <ul class="list-inline m-t-30 widget-chart text-center">
                                <li>
                                    <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                    <h4 class=""><b>5248</b></h4>
                                    <h5 class="text-muted m-b-0">Marketplace</h5>
                                </li>
                                <li>
                                    <i class="mdi mdi-arrow-down-bold-circle text-danger"></i>
                                    <h4 class=""><b>321</b></h4>
                                    <h5 class="text-muted m-b-0">Last week</h5>
                                </li>
                                <li>
                                    <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                    <h4 class=""><b>964</b></h4>
                                    <h5 class="text-muted m-b-0">Last Month</h5>
                                </li>
                            </ul>
                            <div id="sparkline1" style="margin: 0 -21px -22px -22px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <h4 class="m-t-0">Traffic</h4>
                            <ul class="list-inline m-t-30 widget-chart text-center">
                                <li>
                                    <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                    <h4 class=""><b>3654</b></h4>
                                    <h5 class="text-muted m-b-0">Marketplace</h5>
                                </li>
                                <li>
                                    <i class="mdi mdi-arrow-down-bold-circle text-danger"></i>
                                    <h4 class=""><b>954</b></h4>
                                    <h5 class="text-muted m-b-0">Last week</h5>
                                </li>
                                <li>
                                    <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                    <h4 class=""><b>8462</b></h4>
                                    <h5 class="text-muted m-b-0">Last Month</h5>
                                </li>
                            </ul>
                            <div id="sparkline2" style="margin: 0 -21px -22px -22px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <h4 class="m-t-0">News letter Subscriptions</h4>
                            <ul class="list-inline m-t-30 widget-chart text-center">
                                <li>
                                    <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                    <h4 class=""><b>3256</b></h4>
                                    <h5 class="text-muted m-b-0">Marketplace</h5>
                                </li>
                                <li>
                                    <i class="mdi mdi-arrow-down-bold-circle text-danger"></i>
                                    <h4 class=""><b>785</b></h4>
                                    <h5 class="text-muted m-b-0">Last week</h5>
                                </li>
                                <li>
                                    <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                    <h4 class=""><b>1546</b></h4>
                                    <h5 class="text-muted m-b-0">Last Month</h5>
                                </li>
                            </ul>
                            <div id="sparkline3" style="margin: 0 -21px -22px -22px;"></div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Category Tables</h3>
                        </div>
                        <div class="panel-body">
                            <table id="datatable-responsive" class="table table-striped table-bordered table-hover table-checkable dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $category)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->created_at->format('F j, Y')}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div> <!-- End Row -->


        </div> <!-- container -->

    </div> <!-- content -->
@endsection