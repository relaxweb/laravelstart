<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://use.fontawesome.com/9712be8772.js"></script>
    
    <!-- Scripts -->
    <script> window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!}; </script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Project') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                        <!-- <li><a href="{{ url('/') }}">Home</a></li> -->
                        @if (Auth::guest())
                         <!-- WHEN NOT LOGGED IN -->
                         
                         @foreach($global['menu'] as $m)
                          @if($m->part == 'left' && (int)$m->permission_id == 0 && $m->parent_id == 0)
                            <li class="{{ $m->class }}"><a href="{{ url($m->link) }}">{{ $m->name }}</a></li>
                          @endif
                         @endforeach

                        @else
                         <!-- WHEN LOGGEDIN -->
                         <!-- <li><a href="{{ route('posts.create') }}">New Post</a></li> -->

                         @foreach($global['menu'] as $m)
                          @if($m->part == 'left')
                            @if((int)$m->has_child == 1)
                              <!-- HAS DROPDOWN -->
                              <li class="{{ $m->class }} dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">{{ $m->name }} <span class="caret"></span></a>
                                
                                <ul class="dropdown-menu">
                                    <li>
                                     <a href="{{ url($m->link) }}">View {{ strtolower($m->name) }}</a>
 
                                    @foreach($global['menu'] as $m1)
                                     @if($m1->parent_id == $m->id)
                                        @if($m1->permission_id == 0)
                                           <a href="{{ url($m1->link) }}">{{ $m1->name }}</a>
                                        @else
                                          @can($m1->permission)
                                            <a href="{{ url($m1->link) }}">{{ $m1->name }}</a>
                                          @endcan
                                        @endif
                                     @endif
                                    @endforeach
                                    </li>
                                </ul>
                              </li>
                            @else 
                              <!-- NO DROPDOWN -->
                              @if($m->parent_id == 0)
                              <li class="{{ $m->class }}">
                                <a href="{{ url($m->link) }}">{{ $m->name }}</a>
                              </li>
                              @endif
                            @endif
                          @endif
                         @endforeach
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                         @foreach($global['menu'] as $m)
                          @if($m->part == 'right' && (int)$m->permission_id == 0 && $m->parent_id == 0)
                            <li class="{{ $m->class }}"><a href="{{ url($m->link) }}">{{ $m->name }}</a></li>
                          @endif
                         @endforeach
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else

                            @foreach($global['menu'] as $m)
                              @if($m->part == 'right')
                                @if((int)$m->has_child == 1)
                                  <!-- HAS DROPDOWN -->
                                  <li class="{{ $m->class }} dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">{{ $m->name }} <span class="caret"></span></a>
                                    
                                    <ul class="dropdown-menu">
                                        <li>
                                         <a href="{{ url($m->link) }}">View {{ strtolower($m->name) }}</a>
     
                                        @foreach($global['menu'] as $m1)
                                         @if($m1->parent_id == $m->id)
                                            @if($m1->permission_id == 0)
                                               <a href="{{ url($m1->link) }}">{{ $m1->name }}</a>
                                            @else
                                              @can($m1->permission)
                                                <a href="{{ url($m1->link) }}">{{ $m1->name }}</a>
                                              @endcan
                                            @endif
                                         @endif
                                        @endforeach
                                        </li>
                                    </ul>
                                  </li>
                                @else 
                                  <!-- NO DROPDOWN -->
                                  @if($m->parent_id == 0)
                                  <li class="{{ $m->class }}">
                                    <a href="{{ url($m->link) }}">{{ $m->name }}</a>
                                  </li>
                                  @endif
                                @endif
                              @endif
                             @endforeach



                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                       @role('Admin') {{-- Laravel-permission blade helper --}}
                                        <a href="{{ url('users') }}"><i class="fa fa-btn fa-users"></i> Users</a>
                                        <!-- <a href="{{ url('roles') }}"><i class="fa fa-btn fa-key"></i>Roles</a> -->

                                        @endrole
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @if(Session::has('flash_message'))
            <div class="container">      
                <div class="alert alert-success"><em> {!! session('flash_message') !!}</em>
                </div>
            </div>
        @endif 
        <div class="container"> 
            <div class="row">
                <div class="col-md-8 col-md-offset-2">              
                    @include ('errors.list') {{-- Including error file --}}
                </div>
            </div>
        </div>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
