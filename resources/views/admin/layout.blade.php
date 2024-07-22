<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    @yield('cssAndjs')

    <title>@yield('title')</title>
</head>

<body>
    <div class="row p-0 m-0 " style="height:100vh">

        <div class="col-2 p-0 m-0 text-center bg-secondary" style="min-height:100vh;">
            <div class="my-2">
                <img src="{{asset('images/logo.jpg')}}" class="img-fluid w-50" alt="">
                <h4 class="text-white mt-2">YEP </h4>
            </div>
            <hr style="color:white">

            <div class="mx-4 text-start ">

                <a href="{{route('dashboard.index')}}">
                    <div class="menu_item @if(request()->routeIS('dashboard.index')) menu_item_active @endif">
                        <i class="fa-solid fa-house mx-2"></i>
                        Home page
                    </div>
                </a>

                <a href="{{route('dashboard.posts.index')}}">
                    <div class="menu_item @if(request()->routeIS('dashboard.posts.*')) menu_item_active @endif">
                        <i class="fa-solid fa-house mx-2"></i>
                        Posts
                    </div>
                </a>

                <a href="{{route('dashboard.authors.index')}}">
                    <div class="menu_item @if(request()->routeIS('dashboard.authors.*')) menu_item_active @endif">
                        <i class="fa-solid fa-house mx-2"></i>
                        Authors
                    </div>
                </a>

            </div>

        </div>

        <div class="col-10 p-0 m-0">

            <div class="w-100  grad" style="height:60px">
                <a href="{{route('logout')}}" class="btn float-end text-white flex-center" style="font-weight:bold;height:60px;">log out</a>
            </div>

            <div class="p-2">
                @yield('main')
            </div>

        </div>
    </div>

</body>

</html>
