<!DOCTYPE html>
<html lang="pl-PL">

<head>
    @yield('head')
</head>

<body>
    <div class="wrapper" data-aos="fade-in" data-aos-delay="50" data-aos-duration="500" data-aos-easing="ease-in-out"
        data-aos-once="true">

        <a id="mobile-header" href="{{route('video.index')}}" data-aos="fade-in" data-aos-delay="150" data-aos-duration="600"
            data-aos-easing="ease-in-out" data-aos-once="true">haker.edu.pl</a>

        <!-- Sidebar  -->
        @yield('sidebar')

        <!-- Page Content  -->
        <div id="content">
            @yield('search')

            @yield('content')
        </div>
    </div>

    @yield('footer')
</body>

</html>
