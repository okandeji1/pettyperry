<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="text-center">
                <img src="/storage/{{Auth::user()->image}}" class="img-circle" alt="Profile Image">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ Auth::user()->firstname }}</a>
                    <ul class="dropdown-menu">
                        <li><a href="/admin/adm-profile"> Profile</a></li>
                        <li><a href="/admin/adm-settings/{{ Auth::user()->uuid }}"> Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="/logout"> Logout</a></li>
                    </ul>
                </div>

                <p class="text-muted m-0"><i class="fa fa-dot-circle-o text-success"></i> Online</p>
            </div>
        </div>
        <div class="divider"></div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="/admin/adm-dashboard" class="waves-effect"><i class="ti-home"></i><span> Dashboard </span></a>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-agenda"></i> <span> Post Management </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="/admin/adm-post">Post</a></li>
                        <li><a href="/admin/adm-category">Post Category</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-user"></i> <span> User Management </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="/admin/adm-user">Users</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/admin/adm-profile" class="waves-effect"><i class="ti-id-badge"></i><span> Profile <span class="badge badge-primary pull-right">NEW</span></span></a>
                </li>
                <li>
                    <a href="/admin/adm-settings/{{ Auth::user()->uuid }}" class="waves-effect"><i class="ti-wand"></i> <span> Settings </span></a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>