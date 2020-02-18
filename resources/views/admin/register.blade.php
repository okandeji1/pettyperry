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

        <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('admin/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('admin/css/style.css')}}" rel="stylesheet" type="text/css">

    </head>


    <body>

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">

                <div class="panel-body">
                    <h3 class="text-center m-t-0 m-b-30">
                        <span class="text-primary">Pettyperry</span>
                    </h3>
                    <h4 class="text-muted text-center m-t-0"><b>Sign Up</b></h4>
                    @include('partials.messages')
                    <form class="form-horizontal m-t-20" action="/admin/adm-register" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" name="firstname" type="text" required placeholder="First Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" name="lastname" type="text" required placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" name="email" type="email" required parsley-type="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" name="password" type="password" required id="pass2" placeholder="Password" data-parsley-minlength="6">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" name="cpassword" type="password" required data-parsley-equalto="#pass2" placeholder=" Re-Type Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox-signup" type="checkbox" checked="checked">
                                    <label for="checkbox-signup">
                                        I accept <a href="#">Terms and Conditions</a>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Register</button>
                            </div>
                        </div>
                        <div class="form-group m-t-30 m-b-0">
                            <div class="col-sm-12 text-center">
                                <p>Already have account?<a href="/admin/adm-login" class="text-muted"> Login</a></p>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>



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
        <!-- Parsleyjs -->
        <script type="text/javascript" src="{{asset('admin/plugins/parsleyjs/parsley.min.js')}}"></script>
        <script src="{{asset('admin/js/app.js')}}"></script>

        <script type="text/javascript">
			$(document).ready(function() {
				$('form').parsley();
			});
		</script>

    </body>
</html>