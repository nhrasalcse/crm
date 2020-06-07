<div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="{{route('home')}}" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><strong class="text-primary">Dashboard </strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
            <!-- Messages dropdown-->
              <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
              <span class="d-none d-sm-inline-block">{{Auth::user()->name ?? 'Profile'}}</span><i class="fa fa-user p-2"></i></a>
                           </a>
                            <ul aria-labelledby="notifications" class="dropdown-menu container-fluid">
                                <li>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="profile "> 
                                        <img src="{{Auth::user()->image ? asset(Auth::user()->image) : asset('backend/img/avatar-5.jpg')}}" alt="person" class="img-fluid rounded-circle">
                                         </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="msg-body text-center mt-2">
                                            <h3 class="h5">{{Auth::user()->name ?? 'Test Name'}}</h3>
                                            <!-- <span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small> -->
                                        </div>
                                    </div>
                                </div>
                                </li>
                                <hr>
                                <li>
                                    <div class="row" style="margin-right: 10px;">
                                        <div class="col-sm-6">
                                              <a  href="{{route('profile')}}" class="btn btn-sm btn-success"><span class="d-none d-sm-inline-block">Profile</span></a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a class="btn btn-sm btn-danger"><span class="d-none d-sm-inline-block" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</span></a>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
              
              </ul>
            </div>
          </div>
        </nav>
      </header>
     