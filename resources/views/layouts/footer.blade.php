@section('footer')
    <nav id="mobile-nav">
        <div id="mobile-nav-exit">x</div>
        <div class="row">
            @foreach ($menu as $element)
                @if ($element['show'] == 1)
                    <div class="col-6 mobile-nav-element bold">
                        <a href="{{ $element['url'] }}">
                            <i class="{{ $element['icon'] }}"></i>
                            <span>{{ $element['text'] }}</span>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </nav>

    <footer class="container-fluid">
        <div>&copy; 2021 haker.edu.pl . Wszelkie prawa zastrzeżone.</div>
    </footer>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>

    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
        integrity="sha512-F5QTlBqZlvuBEs9LQPqc1iZv2UMxcVXezbHzomzS6Df4MZMClge/8+gXrKw2fl5ysdk4rWjR0vKS7NNkfymaBQ=="
        crossorigin="anonymous"></script>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>
@endsection
