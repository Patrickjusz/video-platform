@section('page_title', 'Wideo Haker')
@section('page_description', 'opis')
@section('page_keywords', 'haker')
@section('og_image', '')
@section('article_published_time', '1')
@section('article_modified_time', '2')


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
                    <img class="img" src="{{ Storage::url($video->thumb) }}" alt="{{ $video->name }}" />
                    <div class="duration">{{ $video->getDuration() }}</div>
                    <div class="description">
                        <div class="title">{{ Str::limit($video->name, 23) }}</div>
                        <div class="stats">
                            <div class="row">
                                <div class=" col-12 views">{{ shortNumberFormat($video->views) }} wyświetleń</div>
                                <div class="col-12 date">Dodano {{ timeElapsedString($video->created_at) }}</div>
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
