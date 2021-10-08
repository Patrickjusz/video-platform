@section('sidebar')
    <nav id="sidebar" class="active" data-aos="fade-right" data-aos-delay="150" data-aos-duration="1500"
        data-aos-easing="ease-in-out" data-aos-once="true">
        <a href="{{ route('video.index') }}" class="sidebar-header">
            <strong>&lt;&sol;&gt;</strong>
        </a>
        <div>
            @if (Route::current()->getName() == 'video.popular' || Route::current()->getName() == 'video.index')
                <h1 class="header-text"><a href="{{ route('video.index') }}">Haker Wideo</a></h1>
            @else
                <p class="header-text"><a href="{{ route('video.index') }}">Haker Wideo</a></p>
            @endif
        </div>


        <ul class="list-unstyled components">
            @foreach ($menu as $element)
                @if ($element['show'] == 1)
                    <li>
                        <a href="{{ $element['url'] }}">
                            <i class="{{ $element['icon'] }}"></i>
                            <br />{{ $element['text'] }}
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </nav>
@endsection
