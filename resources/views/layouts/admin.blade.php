<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>{{ config('app.name', 'Pettyperry')}}</title>
        <!-- CSRF TOKEN -->
        <meta name="csrf-token" content="{{csrf_token()}}">
        <script>
            window.Laravel = { csrfToken: '{{ csrf_token()}}'}
        </script>
        <!-- Favicon --> 

        <link rel="shortcut icon" href="{{asset('admin/images/logo.ico')}}">

        <!-- DataTables -->
        <link href="{{asset('admin/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/plugins/datatables/responsive.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>


        <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('admin/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('admin/css/style.css')}}" rel="stylesheet" type="text/css">

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            @include('partials.admin.navbar')
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            @include('partials.admin.sidebar')
            <!-- Left Sidebar End -->

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Session message -->
                @include('partials.messages')
                <!-- Start content -->
                @yield('content') 
                <!-- content -->

                @include('partials.admin.footer')

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


        <!-- jQuery  -->
        <script src="{{asset('admin/js/jquery.min.js')}}"></script>
        <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('admin/js/modernizr.min.js')}}"></script>
        <script src="{{asset('admin/js/detect.js')}}"></script>
        <script src="{{asset('admin/js/fastclick.js')}}"></script>
        <script src="{{asset('admin/js/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('admin/js/jquery.blockUI.js')}}"></script>
        <script src="{{asset('admin/js/waves.js')}}"></script>
        <script src="{{asset('admin/js/wow.min.js')}}"></script>
        <script src="{{asset('admin/js/jquery.nicescroll.js')}}"></script>
        <script src="{{asset('admin/js/jquery.scrollTo.min.js')}}"></script>
        <script src="{{asset('admin/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
        <!-- Datatables-->
        <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('admin/plugins/datatables/dataTables.bootstrap.js')}}"></script>
        <script src="{{asset('admin/plugins/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('admin/plugins/datatables/responsive.bootstrap.min.js')}}"></script>
        <script src="{{asset('admin/pages/dashborad.js')}}"></script>
        <script src="{{asset('admin/js/app.js')}}"></script>
        <!-- Parsleyjs -->
        <script type="text/javascript" src="{{asset('admin/plugins/parsleyjs/parsley.min.js')}}"></script>
        <script type="text/javascript">
			$(document).ready(function() {
				$('form').parsley();
			});
		</script>

    </body>
</html>