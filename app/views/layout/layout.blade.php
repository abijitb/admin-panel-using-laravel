<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  <title>Admin Panle</title>

  <link rel="shortcut icon" href="{{ asset('dist/img/favicon.png') }}">
  <link rel="stylesheet" href="{{ asset('dist/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/modules/ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}">

  <link rel="stylesheet" href="{{ asset('dist/css/demo.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">

  <link rel="stylesheet" href="{{ asset('dist/modules/summernote/summernote-lite.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/modules/flag-icon-css/css/flag-icon.min.css') }}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="ion ion-navicon-round"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="ion ion-search"></i></a></li>
          </ul>
          
        </form>
        <ul class="navbar-nav navbar-right">
        
      <!-- START RIGHT USER NAME DROP DOWN -->

          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
            <i class="ion ion-android-person d-lg-none"></i>
            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->first_name." ".Auth::user()->last_name }}</div></a> <!-- USER NAME  -->
            <div class="dropdown-menu dropdown-menu-right">
              <!--<a href="profile.html" class="dropdown-item has-icon">
                <i class="ion ion-android-person"></i> Profile
              </a>-->
              <a href="{{ URL::to('/logout') }}" class="dropdown-item has-icon">
                <i class="ion ion-log-out"></i> Logout
              </a>
            </div>
          </li>

      <!-- END RIGHT USER NAME DROP DOWN -->

        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ URL::to('/') }}">Admin Panel</a>
          </div>
          <div class="sidebar-user">
            <div class="sidebar-user-picture">
            </div>
            <div class="sidebar-user-details">
              <div class="user-name" style="padding-left: 10%;">{{ Auth::user()->first_name." ".Auth::user()->last_name }}</div> <!-- USER NAME  -->
              <div class="user-role" style="padding-left: 10%;">
                @if(Auth::user()->role == '1')
                  Administrator
                @else
                  Staff
                @endif  <!-- Role -->
              </div>
            </div>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="">
              <a href="{{ URL::to('/') }}"><i class="ion ion-speedometer"></i><span>Dashboard</span></a>
            </li>


      @if(Auth::user()->role == '1')
            <li class="menu-header">Question And Answers</li>

            <li>
              <a href="#" class="has-dropdown"><i class="ion ion-university"></i><span>MCQ Questions</span></a>
              <ul class="menu-dropdown">
                <li><a href="{{ URL::to('/mcq/add') }}"><i class="ion ion-plus-circled"></i> Add</a></li>
                <li><a href="{{ URL::to('/mcq/view') }}"><i class="ion ion-navicon-round"></i> View All</a></li>
              </ul>
            </li>
            <li>
              <a href="#" class="has-dropdown"><i class="ion ion-university"></i><span>Broad Questions</span></a>
              <ul class="menu-dropdown">
                <li><a href="{{ URL::to('/broad/add') }}"><i class="ion ion-plus-circled"></i> Add</a></li>
                <li><a href="{{ URL::to('/broad/view') }}"><i class="ion ion-navicon-round"></i> View All</a></li>
              </ul>
            </li>
            
            <li class="menu-header">Others</li>

            <li>
              <a href="#" class="has-dropdown"><i class="ion ion-ios-book"></i><span>Subjects</span></a>
              <ul class="menu-dropdown">
                <li><a href="{{ URL::to('/subjects/add') }}"><i class="ion ion-plus-circled"></i> Add</a></li>
                <li><a href="{{ URL::to('/subjects/view') }}"><i class="ion ion-navicon-round"></i> View All</a></li>
              </ul>
            </li>

            <li>
              <a href="#" class="has-dropdown"><i class="ion ion-ios-calendar"></i><span>Year</span></a>
              <ul class="menu-dropdown">
                <li><a href="{{ URL::to('/years/add') }}"><i class="ion ion-plus-circled"></i> Add</a></li>
                <li><a href="{{ URL::to('/years/view') }}"><i class="ion ion-navicon-round"></i> View All</a></li>
              </ul>
            </li>
            <li>
              <a href="{{ URL::to('/trash') }}" class=""><i class="ion ion-trash-b"></i><span>Trash</span></a>
            </li>

            <li class="menu-header">Users</li> 

            <li>
              <a href="#" class="has-dropdown"><i class="ion ion-ios-book"></i><span>Staff</span></a>
              <ul class="menu-dropdown">
                <li><a href="{{ URL::to('/staff/add') }}"><i class="ion ion-plus-circled"></i> Add</a></li>
                <li><a href="{{ URL::to('/staff/view') }}"><i class="ion ion-navicon-round"></i> View All</a></li>
              </ul>
            </li>
      @else

            <li class="menu-header">Question And Answers</li>

            <li>
              <a href="#" class="has-dropdown"><i class="ion ion-university"></i><span>MCQ Questions</span></a>
              <ul class="menu-dropdown">
                <li><a href="{{ URL::to('/mcq/add') }}"><i class="ion ion-plus-circled"></i> Add</a></li>
                <li><a href="{{ URL::to('/mcq/view') }}"><i class="ion ion-navicon-round"></i> View All</a></li>
              </ul>
            </li>
            <li>
              <a href="#" class="has-dropdown"><i class="ion ion-university"></i><span>Broad Questions</span></a>
              <ul class="menu-dropdown">
                <li><a href="{{ URL::to('/broad/add') }}"><i class="ion ion-plus-circled"></i> Add</a></li>
                <li><a href="{{ URL::to('/broad/view') }}"><i class="ion ion-navicon-round"></i> View All</a></li>
              </ul>
            </li>
            <li class="menu-header">Others</li>
            <li>
              <a href="{{ URL::to('/trash') }}" class=""><i class="ion ion-trash-b"></i><span>Trash</span></a>
            </li>

      @endif

          </ul>
          
        </aside>
      </div>


      @yield('content')



       <footer class="main-footer">
        <div class="footer-left" style="text-align: center; text-transform: none;">
          Copyright &copy; Admin Panel {{ date('Y') }}
        </div>
        <div class="footer-right"></div>
      </footer>
    </div>
  </div>

  <script src="{{ asset('dist/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('dist/modules/popper.js') }}"></script>
  <script src="{{ asset('dist/modules/tooltip.js') }}"></script>
  <script src="{{ asset('dist/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('dist/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('dist/modules/scroll-up-bar/dist/scroll-up-bar.min.js') }}"></script>
  <script src="{{ asset('dist/js/sa-functions.js') }}"></script>

  @yield('footer')
  
  
  <script src="{{ asset('dist/js/scripts.js') }}"></script>
  <script src="{{ asset('dist/js/custom.js') }}"></script>

</body>
</html>