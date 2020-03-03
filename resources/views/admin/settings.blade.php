<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container" style="padding-top: 60px;">
  <h1 class="page-header">Edit Profile</h1>
  @include('partials.messages')
  <div class="row">
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="/storage/{{$user->image}}" class="avatar img-circle img-thumbnail" alt="Profile Image">
        <h6>Upload a different photo...</h6>
        <form action="/user/image/{{$user->id}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="file" name="image" class="text-center center-block well well-sm :class="{ 'is-invalid': form.errors.has('image') }">
          <has-error :form="form" field="image"></has-error>
          <button type="submit" class="btn btn-primary">Upload</button>
        </form>
      </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      <div class="alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a> 
        <i class="fa fa-coffee"></i>
        You can change your password<strong> settings</strong> if you want.
      </div>
      <h3>Personal info</h3>
      <form class="form-horizontal" role="form" action="/user/settings/{{$user->id}}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
          <label class="col-lg-3 control-label">First name:</label>
          <div class="col-lg-8">
            <input class="form-control :class="{ 'is-invalid': form.errors.has('firstname') }" value="{{$user->firstname}}" type="text" name="firstname">
            <has-error :form="form" field="firstname"></has-error>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Last name:</label>
          <div class="col-lg-8">
            <input class="form-control :class="{ 'is-invalid': form.errors.has('lastname') }" value="{{$user->lastname}}" type="text" name="lastname">
            <has-error :form="form" field="lastname"></has-error>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control :class="{ 'is-invalid': form.errors.has('email') }" value="{{$user->email}}" type="text" name="email">
            <has-error :form="form" field="email"></has-error>
          </div>
        </div>
        {{-- <div class="form-group">
          <label class="col-lg-3 control-label">Time Zone:</label>
          <div class="col-lg-8">
            <div class="ui-select">
              <select id="user_time_zone" class="form-control">
                <option value="Hawaii">(GMT-10:00) Hawaii</option>
                <option value="Alaska">(GMT-09:00) Alaska</option>
                <option value="Pacific Time (US & Canada)">(GMT-08:00) Pacific Time (US & Canada)</option>
                <option value="Arizona">(GMT-07:00) Arizona</option>
                <option value="Mountain Time (US & Canada)">(GMT-07:00) Mountain Time (US & Canada)</option>
                <option value="Central Time (US & Canada)" selected="selected">(GMT-06:00) Central Time (US & Canada)</option>
                <option value="Eastern Time (US & Canada)">(GMT-05:00) Eastern Time (US & Canada)</option>
                <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
              </select>
            </div>
          </div>
        </div> --}}
        <div class="form-group">
          <label class="col-md-3 control-label">Username:</label>
          <div class="col-md-8">
            <input class="form-control :class="{ 'is-invalid': form.errors.has('username') }" type="text" name="username">
            <has-error :form="form" field="username"></has-error>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" value="Save Changes" type="submit">
            <span></span>
            <a class="btn btn-default" value="Cancel" href="/admin/adm-dashboard">Cancel</a>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12 personal-info">
      <h3>Password Settings</h3>
      <form action="/user/password/{{$user->id}}" method="post" class="form-horizontal" role="form">
        {{ csrf_field() }}
        <div class="form-group">
          <label class="col-md-3 control-label">Password:</label>
          <div class="col-md-8">
            <input class="form-control :class="{ 'is-invalid': form.errors.has('password') }" type="password" name="password">
            <has-error :form="form" field="password"></has-error>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Confirm password:</label>
          <div class="col-md-8">
            <input class="form-control :class="{ 'is-invalid': form.errors.has('cpassword') }" type="password" name="cpassword">
            <has-error :form="form" field="cpassword"></has-error>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="form-control btn btn-primary rounded">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>