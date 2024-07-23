<!doctype html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    <!--favicon-->
    <link rel="icon" href="{{asset('assets/images/favicon-32x32.png')}}" type="image/png">

    <!--plugins-->
    <link href="{{asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/metismenu/metisMenu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/metismenu/mm-vertical.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/simplebar/css/simplebar.css')}}">
    <!--bootstrap css-->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <!--main css-->
    <link href="{{asset('assets/css/bootstrap-extended.css')}}" rel="stylesheet">
    <link href="{{asset('sass/main.css')}}" rel="stylesheet">
    <link href="{{asset('sass/dark-theme.css')}}" rel="stylesheet">
    <link href="{{asset('sass/semi-dark.css')}}" rel="stylesheet">
    <link href="{{asset('sass/bordered-theme.css')}}" rel="stylesheet">
    <link href="{{asset('sass/responsive.css')}}" rel="stylesheet">

    {{$css}}

</head>

<body>

    <x-Layout.Header>
    </x-Layout.Header>

    <x-Layout.Sidbar>
    </x-Layout.Sidbar>



    <!--start main wrapper-->
    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">{{$title}}</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <!-- <li class="breadcrumb-item active" aria-current="page">Starter Page</li> -->
                        </ol>
                    </nav>
                </div>
                {{$breadcrumbRight}}

            </div>
            <!--end breadcrumb-->
            {{$body}}
        </div>
    </main>
    <!--end main wrapper-->


    <!--start overlay-->
    <div class="overlay btn-toggle"></div>
    <!--end overlay-->



    <!--start footer-->
    <!-- <footer class="page-footer">
        <p class="mb-0">Copyright © 2023. All right reserved.</p>
    </footer> -->
    <!--top footer-->

    <!--start cart-->
    <x-Layout.Cart>
    </x-Layout.Cart>
    <!--end cart-->



    <!--start switcher-->
    <x-Layout.Switcher>
    </x-Layout.Switcher>
    <!--start switcher-->

    <!--bootstrap js-->
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    <!--plugins-->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <!--plugins-->
    <script src="{{asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('assets/plugins/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    {{$js}}

</body>

</html>