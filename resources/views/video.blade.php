@section('page_title', $video->name)
@section('page_description', $video->seo_description)
@section('page_keywords', $video->seo_keywords)
@section('og_image', asset(Storage::url($video->thumb)))
@section('article_published_time', $video->created_at)
@section('article_modified_time', $video->updated_at ?? $video->created_at)

@extends('layouts.app')
@extends('layouts.head')
@extends('layouts.search')
@extends('layouts.sidebar')
@extends('layouts.footer')


@section('content')
    <link href="https://vjs.zencdn.net/7.14.3/video-js.min.css" rel="stylesheet" />
    <script src="https://vjs.zencdn.net/7.14.3/video.min.js"></script>

    <main class="row video-container">
        <article class="col-lg-8 col-sm-12" style="background-color: #fff;">
            <video id="main-video" class="video-js vjs-default-skin  vjs-big-play-centered" controls preload="metadata"
                poster="{{ url(Storage::url($video->thumb)) }}">
                <source src="{{ url(Storage::url($video->filename)) }}" type='video/mp4'>
            </video>

            <h1 class="title ">{{ $video->name }}</h1>
            <div class="stats">{{ $video->views_cache_text ?? '0 wyświetleń' }} •
                {{ $video->eclapsed_time }} </div>

            <div class="description">
                {!! $video->description !!}
            </div>

            <div id="tags">
                @forelse ($video->tags as $tag)
                    <a href="{{ url(CATEGORY_URL . $tag->slug) }}" rel="nofollow"
                        class="badge badge-secondary">{{ $tag->name }}</a>
                @empty

                @endforelse
            </div>
            @auth
                <div>
                    <br>
                    <button class="btn btn-primary"
                        onclick="window.location.href='{{ url(ADMIN_PANEL_EDIT_URL . $video->id) }}'">Edytuj wideo</button>
                    <br>
                </div>
            @endauth
        </article>

        <aside class="col-lg-4 col-sm-12" id="similar-videos">
            @forelse ($video->getSimilarVideos(7) as $similarVideo)
                <a class="row video" href="{{ url($similarVideo->slug) }}" title="{{ $similarVideo->name }}">
                    <div class="  col-5"
                        style=" background-image: url('{{ url(Storage::url($similarVideo->thumb)) }}'); ">
                        <div class="duration">
                            {{ empty($similarVideo->duration) ? $similarVideo->getDuration() : $similarVideo->duration }}
                        </div>
                    </div>
                    <div class="col-7">
                        <p class="text text-wrap">{{ $similarVideo->name }}</p>
                        {{ $similarVideo->views_cache_text ?? '0 wyświetleń' }} <br>
                        Dodano {{ $similarVideo->eclapsed_time }}
                    </div>
                </a>
            @empty
                brak
            @endforelse

        </aside>
    </main>

    @include('layouts.similar-video')
@endsection
