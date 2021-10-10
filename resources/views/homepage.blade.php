@section('page_title', 'Haker Film')
@section('page_description', 'Haker film to serwis oferujący darmowe filmy o hakerach i narzędziach takich jak Kali
    Linux. Znajdziesz tutaj filmy o hakerach i ich programy hakerskie.')
@section('page_keywords', 'haker film, hakerzy film, filmy haker, filmy o hakerach, wideo haker, kali linux, haker edu
    wideo')
@section('og_image', '')
@section('article_published_time', $latest_video->created_at ?? '')
@section('article_modified_time', $latest_video->updated_at ?? $latest_video->created_at)

@extends('layouts.app')
@extends('layouts.head')
@extends('layouts.search')
@extends('layouts.sidebar')
@extends('layouts.footer')

@section('content')
    <div class="row video-wrapper" data-aos="zoom-out-up" data-aos-delay="50" data-aos-duration="500"
        data-aos-easing="ease-in-out" data-aos-once="true">

        @if (isset($title))
            <div class="col-12">
                <h2>Kategoria: <span class="badge badge-secondary">{{ $title }}</span></h2>
            </div>
        @endif
        {{ $specialAlt = ' ' }}
        @forelse ($videos as $video)
            @if (isset($video->slug))
                <?php
                switch ($loop->index) {
                    case 0:
                        $specialAlt = 'Haker film';
                        break;
                    case 1:
                        $specialAlt = 'Hakerzy film';
                        break;
                    case 2:
                        $specialAlt = 'Filmy haker edu';
                        break;
                    default:
                        $specialAlt = '';
                }
                ?>

                <a href="{{ url($video->slug) }}" class="col-xl-3 col-lg-4 col-md-6 col-sm-12 video-box"
                    title="{{ $video->name }}">
                    <img class="img" src="{{ url(Storage::url($video->thumb)) }}"
                        alt="{{ $specialAlt }} - {{ $video->name }}" title="{{ $video->name }}" />
                    <div class="duration">{{ empty($video->duration) ? $video->getDuration() : $video->duration }}
                    </div>
                    <div class="description">
                        <h2 class="title text-wrap">{{ $video->name }}</h2>
                        <div class="stats">
                            <div class="row">
                                <div class=" col-12 views">{{ shortNumberFormat($video->views_cache) }} wyświetleń</div>
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
