<!DOCTYPE html>
<html>

<head>
    @yield('head')
</head>

<body>
    <div class="wrapper" data-aos="fade-in" data-aos-delay="50" data-aos-duration="500" data-aos-easing="ease-in-out"
        data-aos-once="true">


        <div id="mobile-header" data-aos="fade-in" data-aos-delay="150" data-aos-duration="600"
            data-aos-easing="ease-in-out" data-aos-once="true">&lt;&sol;&gt;haker.edu.pl</div>

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