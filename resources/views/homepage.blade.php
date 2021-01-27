@section('page_title', 'Wideo Haker')

    @extends('layouts.app')
    @extends('layouts.head')
    @extends('layouts.search')
    @extends('layouts.sidebar')
    @extends('layouts.footer')

@section('content')
    <div class="row video-wrapper" data-aos="zoom-out-up" data-aos-delay="50" data-aos-duration="500"
        data-aos-easing="ease-in-out" data-aos-once="true">

        @forelse ($videos as $video)
            @if (isset($video->slug))
                <a href="{{ $video->slug }}" class="col-xl-3 col-lg-4 col-md-6 col-sm-12 video-box">
                    <img class="img" src="https://pbs.twimg.com/media/CcdYVn0W0AAPeIs.jpg" alt="{{ $video->name }}" />
                    <div class="description">
                        <div class="title">{{ Str::limit($video->name, 23) }}</div>
                        <div class="stats">
                            <div class="row">
                                <div class="col-7 views">2,3tys wyświetleń</div>
                                <div class="col-5 date">3 dni temu</div>
                            </div>
                        </div>
                    </div>
                </a>
            @endif
        @empty
            Obecnie w serwisie nie ma żadnego wideo.
        @endforelse
    </div>
@endsection
