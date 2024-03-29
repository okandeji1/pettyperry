<header>
    <div class="header-wrapper">
      <div class="container">
        <div class="header-menu">
          <div class="row no-gutters align-items-center justify-content-center">
            <div class="col-4 col-md-2"><h1><a class="logo" href="/" style="color: #f38888">Pettyperry</a></h1></div>
            <div class="col-8 col-md-8">
              <div class="mobile-menu"><a href="#" id="showMenu"><i class="fas fa-bars"></i></a></div>
              <nav class="navigation">
                <ul>
                  <li class="nav-item"><a class="pisen-nav-link active" href="/">Home</a><i class="submenu-opener fas fa-plus"></i>
                  </li>
                  <li class="nav-item"><a class="pisen-nav-link" href="/services">Services</a><i class="submenu-opener fas fa-plus"></i>
                  </li>
                  <li class="nav-item"><a class="pisen-nav-link" href="/about">About us</a></li>
                  <li class="nav-item"><a class="pisen-nav-link" href="#">Contact</a></li>
                </ul>
              </nav>
            </div>
            <div class="col-0 col-xl-2">
              <div class="menu-function">
                {{-- <div id="search"><a class="search-btn" href="#"><i class="fas fa-search"></i></a></div> --}}
                <div class="social-contact">
                  @if(Auth::user())
                  {{-- <a href="/admin/adm-dashboard" >Dashboard</a> --}}
                  <ul>
                    <li class="nav-item">
                      <a href="/admin/adm-dashboard"><span class="badge badge-success pull-right">5</span> Dashboard </a>
                    </li>
                    <li class="nav-item"><a href="javascript:void(0)"> Profile</a></li>
                    <li class="nav-item" class="divider"></li>
                    <li class="nav-item"><a href="/logout" class="text-danger"> Logout</a></li>
                </ul>
                  @else
                  <a href="#/"><i class="fab fa-facebook-f"></i></a>
                  <a href="#"><i class="fab fa-instagram"></i></a>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                  <a href="#"><i class="fab fa-dribbble"></i></a>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header><!--End header-->
