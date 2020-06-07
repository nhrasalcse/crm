  <!-- Side Navbar -->
  <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center">
          <img src="{{asset('backend')}}/icon.png" alt="person" class="img-fluid rounded-circle bg-light">
            <h2 class="h5">EARLY REDUCE </h2><span>{{Auth::User()->role->name ?? 'Test Name' }}</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="#" class="brand-small text-center"><img src="{{asset('backend')}}/icon.png" alt="person" class="img-fluid rounded-circle bg-light"></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="{{route('home')}}"> <i class="icon-home"></i>Home</a></li>
            @if(Auth::user()->role_id==1)
            <li><a href="{{route('admin.index')}}"> <i class="icon-user"></i>Admins</a></li>
           <li><a href="{{route('customer.pendding')}}"> <i class="icon-user"></i>Pendding Customers</a></li>
           @endif
            <li><a href="{{route('customer.index')}}"> <i class="icon-user"></i>Customer</a></li>
            <!-- <li><a href="{{route('invoice.create')}}"> <i class="icon-grid"></i>Invoice</a></li> -->
            <!-- <li><a href="#"> <i class="icon-form"></i>Forms</a></li>
            <li><a href="#"> <i class="fa fa-bar-chart"></i>Charts</a></li>
            <li><a href="#"> <i class="icon-grid"></i>Tables</a></li> -->
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Invoice </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{route('invoice.create')}}">Invoice Create</a></li>
                <li><a href="{{route('invoice.index')}}">Invoice</a></li>
                <!-- <li><a href="##">Page</a></li>
                <li><a href="##">Page</a></li>
                <li><a href="##">Page</a></li> -->
              </ul>
            </li>
            <!-- <li><a href="#"> <i class="icon-interface-windows"></i>Login page</a></li>
            <li> <a href="##"> <i class="icon-mail"></i>Demo
                <div class="badge badge-warning">6 New</div></a></li> -->
          </ul>
        </div>
        <div class="admin-menu">
          <h5 class="sidenav-heading">Second menu</h5>
          <!-- <ul id="side-admin-menu" class="side-menu list-unstyled"> 
            <li> <a href="##"> <i class="icon-screen"> </i>Demo</a></li>
            <li> <a href="##"> <i class="icon-flask"> </i>Demo
                <div class="badge badge-info">Special</div></a></li>
            <li> <a href="#"> <i class="icon-flask"> </i>Demo</a></li>
            <li> <a href="#"> <i class="icon-picture"> </i>Demo</a></li>
          </ul> -->
        </div>
      </div>
    </nav>
 