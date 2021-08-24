@section('head')
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="index, follow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>
        @yield('page_title') | haker.edu.pl
    </title>

    <meta name="description" content="@yield('page_description')" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="keywords" content="@yield('page_keywords')">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous" />
    <!-- AOS CSS CDN -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />

    <meta property="og:locale" content="pl_PL" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="@yield('page_title') | haker.edu.pl" />
    <meta property="og:description" content="@yield('page_description')" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="@yield('og_image')" />

    <meta property="og:site_name" content="haker.edu.pl" />
    <meta property="article:publisher" content="https://www.facebook.com/HakerEduPL/" />
    <meta property="article:author" content="https://www.facebook.com/HakerEduPL/" />
    <meta property="article:published_time" content="@yield('article_published_time')" />
    <meta property="article:modified_time" content="@yield('article_modified_time')" />

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png" />
    <link rel="manifest" href="/site.webmanifest" />
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#000000" />
    <meta name="msapplication-TileColor" content="#2b5797" />
    <meta name="theme-color" content="#357ebf" />

@endsection
