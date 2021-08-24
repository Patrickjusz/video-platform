@section('page_title', $video->name)
@section('page_description', substr($video->description, 0, 157) . '...')
@section('page_keywords', 'haker')
@section('og_image', Storage::url($video->thumb))
@section('article_published_time', $video->created_at)
@section('article_modified_time', $video->updated_at ?? $video->created_at)

@extends('layouts.app')
@extends('layouts.head')
@extends('layouts.search')
@extends('layouts.sidebar')
@extends('layouts.footer')

<link href="https://vjs.zencdn.net/7.14.3/video-js.css" rel="stylesheet" />
<script src="https://vjs.zencdn.net/7.14.3/video.min.js"></script>


@section('content')
    <div class="row video-container">
        <div class="col-lg-8 col-sm-12" style="background-color: #fff;">
            <video id="main-video" class="video-js vjs-default-skin  vjs-big-play-centered" controls preload="metadata"
                poster="{{ Storage::url($video->thumb) }}" width="640" height="268">
                <source src="{{ Storage::url($video->filename) }}" type='video/mp4'>
            </video>
            <h1 class="title">{{ $video->name }}</h1>

            {{-- <div class="stats">{{ $video->views }} wyświetleń • 24 sty 2021 </div> --}}
            <div class="stats">{{ shortNumberFormat($video->views) }} wyświetleń •
                {{ timeElapsedString($video->created_at) }} </div>

            <div class="description">
                {{-- <img style="float:left; margin:5px; margin-right: 15px;"
                src="https://haker.edu.pl/wp-content/uploads/2021/01/round-150x150.jpg" width=58> --}}
                {{ $video->description }}
            </div>

            <div id="tags">
                @forelse ($video->tags as $tag)
                    <span class="badge badge-secondary">{{ $tag->name }}</span>
                @empty

                @endforelse
            </div>
            @auth
                <div>
                    <br>
                    <button class="btn btn-primary"
                        onclick="window.location.href='{{ ADMIN_PANEL_EDIT_URL . $video->id }}'">Edytuj wideo</button>
                </div>
            @endauth
        </div>

        <div class="col-lg-4 col-sm-12" id="similar-videos">
            @forelse ($video->getSimilarVideos(7) as $similarVideo)
                <a class="row video" href="{{ $similarVideo->slug }}">
                    <div class="col-5" style=" background-image: url('{{ Storage::url($similarVideo->thumb) }}'); ">
                        <div class="duration">{{ $similarVideo->getDuration() }}</div>
                    </div>
                    <div class="col-7">
                        <b>{{ Str::limit($similarVideo->name, 20) }}</b><br>
                        {{ shortNumberFormat($similarVideo->views) }} wyświetleń<br>
                        Dodano {{ timeElapsedString($similarVideo->created_at) }}
                    </div>
                </a>
            @empty
                brak
            @endforelse

        </div>
    </div>
    </div>
@endsection
