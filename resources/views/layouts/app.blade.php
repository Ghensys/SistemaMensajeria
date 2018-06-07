<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}  
    @if(auth()->check())
        @if($count_receiver != 0)({{ $count_receiver }})@endif
    @endif</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link href="https://datatables.yajrabox.com/css/datatables.bootstrap.css" rel="stylesheet">

    <style type="text/css">
        .zzzz
        {
            background-color: red; !important
        }
    </style>


    
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
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar Sesión
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
        <div class="container">
            <div class="row">

                @if(auth()->check())

                    <div class="col-md-3">
                        @include('includes.menu')
                    </div>
                    <div class="col-md-9">
                        @yield('content')
                    </div>

                @else
                    <div class="col-md-3">
                        
                    </div>
                    <div class="col-md-7">
                        @yield('content')
                    </div>
                @endif

            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/dropdown.js')}}"></script>

    <script src="{{ asset('js/datatable.js') }}"></script>

    <!script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.0.0/jquery.mark.min.js"><!/script>

    <script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>

    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('usuario.getUsers') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'institution.description_institution', name: 'institution.description_institution' },
                    { data: 'management.description_management', name: 'management.description_management' },
                    { data: 'department.description_department', name: 'department.description_department' },
                    { data: 'role.description_role', name: 'role.description_role' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}

                ]
            });
        });
    </script>

    <script>
        $(function() {
            $('#management-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('gerencia.getManagements') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'description_management', name: 'description_management' },
                    { data: 'institution.description_institution', name: 'institution.description_institution' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                    { data: 'action2', name:'action2', orderable: false, searchable: false }

                ]
            });
        });
    </script>


</body>
</html>
