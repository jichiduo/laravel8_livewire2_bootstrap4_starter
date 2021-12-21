<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">
</head>
</head>

<body style="min-height: 50rem;padding-top: 5rem;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-secondary fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="bi bi-bullseye"></i> {{ config('app.name', '') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <!-- Authentication Links -->
                        @guest

                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="/actions/receive"> <span class="bi bi-ui-checks-grid"></span>
                                    Receive
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/actions/move"><span class="bi bi-truck"></span> Move</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/actions/dispose"><span class="bi bi-trash"></span>
                                    Dispose</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/actions/sort"><span class="bi bi-boxes"></span> Sort</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                                    aria-expanded="false"> <span class="bi bi-search"></span> Query</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown01">
                                    <a class="dropdown-item" href="/transactions"><span class="bi bi-stack">
                                            Transaction</span></a>
                                    <a class="dropdown-item" href="/movelogs"><span class="bi bi-truck"></span> Move
                                        Log</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown"
                                    aria-expanded="false"> <span class="bi bi-gear"></span> Settings</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown01">
                                    <a class="dropdown-item" href="/warehouses"><span class="bi bi-building">
                                            Warehouse</span></a>
                                    <a class="dropdown-item" href="/shelves"><span class="bi bi-bookshelf">
                                            Shelf</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/categories"> <span class="bi bi-card-list"></span>
                                        Sample
                                        Category</a>
                                    <a class="dropdown-item" href="/vessels"> <span class="bi bi-pentagon-half"></span>
                                        Vessel</a>
                                    <a class="dropdown-item" href="/locations"> <span class="bi bi-pin-map"></span>
                                        Location</a>
                                    <a class="dropdown-item" href="/cargos"> <span class="bi bi-droplet-half"></span>
                                        Cargo</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/users"> <span class="bi bi-people"></span>
                                        Users</a>
                                </div>
                            </li>

                        </ul>
                        <ul class="navbar-nav mr-left">
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="true"><span class="bi bi-person" aria-hidden="true"></span>
                                    {{ Auth::user()->name }} <span class="caret"></span></a>
                                <div class="dropdown-menu" aria-labelledby="dropdown01">
                                    <a class="dropdown-item" href="/profile"> <span class="bi bi-headset"></span>
                                        Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); this.closest('form').submit();"><span
                                                class="bi bi-box-arrow-right"></span> {{ __('Logout') }} </a>
                                    </form>
                                </div>
                            </li>

                        </ul>
                    </div>

                @endguest
                </ul>
            </div>
    </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
    </div>
    <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 0; bottom: 0; ">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true"
            data-delay="3000">
            <div class="toast-header" style="background-color:white">
                <svg class="bd-placeholder-img rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#007aff"></rect>
                </svg>
                <strong class="mr-auto">System Message</strong>
                <small></small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body" id="toastMsg" style="background-color:white">
            </div>
        </div>
    </div>
    @livewireScripts
    <script>
        window.addEventListener('modal-open', event => {
            $('#formModal').modal('show');
        });
        window.addEventListener('modal-close', event => {
            $('#formModal').modal('hide');
        });
        window.addEventListener('toastr', event => {
            //$('#liveToast').toast('show');
            //$('#toastMsg').html(event.detail.message);
            toastr.success(event.detail.message);
        });
    </script>
</body>

</html>
