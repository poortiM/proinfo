<header class="header">
    <div class="header-wrapper background-white">
        <div class="col" style="width: 95%; margin: auto;">
            <div class="header-inner">
                <div class="header-logo">
                    <a href="{{ url('/') }}">
                        
                    <span><img  style="width: 145px;" src="{{url('assets/img/logo.png')}}"></span>
                    <span style="position: relative;top: 14px;font-size: 21px;left: -25px;color: #f9b412;font-weight: bolder;">Au</span>
                    </a>
                </div><!-- /.header-logo -->

                <div class="header-content">
                   
                    <div class="header-bottom">
                        

                        <ul class="header-nav-primary nav nav-pills collapse navbar-collapse">

                            @if(!empty(Request::segment(1)))
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Find Professionals </a>
                                <ul class="dropdown-menu hidden-xs hidden-sm">
                                    
                                    @foreach( App::make('App\Http\Controllers\MainController')->category_menu() as $value)

                                    <li><a href="{{url('search')}}?type=listing&element=category&keyword={{$value->category}}" data-interaction-id="app-header_dropdown-Find professionals-5">
                                        {{$value->category}}
                                    </a></li>

                                    @endforeach

                                </ul>
                            </li>
                            @endif

                            <li><a href="{{url('stories')}}">Stories</a></li>

                            @if( Auth::guard('web')->check())
                            @if( Auth::guard('web')->user()->type == 'vendor')
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{  Auth::guard('web')->user()->name }} <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="{{ url('/') }}/profile/{{ Auth::guard('web')->user()->username }}">View profile</a></li>
                                <li><a href="{{ url('pro/dashboard') }}">Edit profile</a></li>
                                <!-- <li><a href="{{ url('pro/analytics') }}">Dashboard</a></li> -->
                                <li role="separator" class="divider"></li>
                                <li><a href="{{url('pro/change-password')}}">Setting</a></li>
                                <li><a href="{{url('pro/notification-settings')}}">Notification</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ url('pro/logout') }}">Logout</a></li>
                              </ul>
                            </li>
                            @else
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{  Auth::guard('web')->user()->name }} <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="{{ url('user/dashboard/newsfeed') }}">Dashboard</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ url('profile') }}/{{Auth::guard('web')->user()->username}}">View Profile</a></li>
                                <li><a href="{{ url('user/dashboard/newsfeed') }}">Setting</a></li>
                                <li><a href="{{ url('user/logout') }}">Logout</a></li>
                              </ul>
                            </li>
                            @endif

                            @else
                            <!-- <li> <a href="#">Consultation</a></li> -->
                            <li> <a href="#" data-toggle="modal" data-target="#sigUp-Login">User Login</a></li>

                            <li><a href="{{url('pro/register')}}" class="pro-hover">Pro SignUp</a></li>
                            <li><a href="{{url('pro/login')}}" class="pro-hover">Pro Login</a></li>

                            @endif
                            
                            


                        </ul>

                        <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".header-nav-primary">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div><!-- /.header-bottom -->
                </div><!-- /.header-content -->
            </div><!-- /.header-inner -->
        </div>
    </div><!-- /.header-wrapper -->
</header><!-- /.header -->