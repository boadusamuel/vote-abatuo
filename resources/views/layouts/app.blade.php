<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/customcss.css') }}" rel="stylesheet">


</head>

<body>
<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper" >
        <div class="sidebar-heading mb-3"><h2 class="text-light">Abatuo</h2> </div>
        <div class="list-group list-group-flush" >
<div >
            <a href="{{route('elections.index')}}" class="list-group-item list-group-item-action "><i class="fa fa-line-chart"></i>  <span class="mx-2">Dashboard</span> </a>
            <a href="{{route('users.index')}}" class="list-group-item list-group-item-action "><i class="fa fa-users"></i>  <span class="mx-2">Voters</span> </a>
            <a href="{{route('criteria.index')}}" class="list-group-item list-group-item-action "><i class="fa fa-cogs"></i>  <span class="mx-2">Criteria</span> </a>
            <a href="{{route('departments.index')}}" class="list-group-item list-group-item-action "><i class="fa fa-universal-access"></i>  <span class="mx-2">Departments</span> </a>
            <a href="{{route('nominees.index')}}" class="list-group-item list-group-item-action "><i class="fa fa-user"></i>  <span class="mx-2">Nominees</span> </a>
    <a href="{{route('roles.index')}}" class="list-group-item list-group-item-action " style= "display:  {{ isAdmin()  ? ''  : 'none'}}"><i class="fa fa-user-circle"></i>  <span class="mx-2">Roles</span> </a>
</div>
    <div >

        <a href="{{route('votes.create')}}" class="list-group-item list-group-item-action "><i class="fa fa-thumbs-down"></i>  <span class="mx-2">Vote</span> </a>
    </div>

        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom ">
            <button class="btn btn-outline-info" id="menu-toggle">Menu</button>

            <h1 class="text-center font-weight-bold m-0 p-0" id="app-header">Cast your <i class="fa fa-thumbs-o-down text-success"></i> </h1>

            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <div class="mb-3"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if(session('success'))
                        <div class="alert alert-success text-center">{{ session('success')}}</div>

                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger text-center">{{ session('error')}}</div>
                    @endif
                </div>

                <div class="col-12">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger text-center">
                                  {{ $error }}
                        </div>
                        @endforeach
                         @endif
                </div>

            </div>
            <div class="row">
                <div class="container-fluid d-flex justify-content-center">


                    <h3 class="mb-2">{{$header ?? 'Manage Election'}}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @yield('content')

                </div>

            </div>
        </div>

    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>



<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    @yield('script')



</script>

</body>

</html>
