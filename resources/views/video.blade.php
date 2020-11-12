@section('page_title', 'Wideo Haker')

@extends('layouts.app')
@extends('layouts.head')
@extends('layouts.search')
@extends('layouts.sidebar')
@extends('layouts.footer')

<link href="https://vjs.zencdn.net/7.8.4/video-js.css" rel="stylesheet" />

<!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
<script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
<script src="https://vjs.zencdn.net/7.8.4/video.js"></script>


@section('content')
<div class="row video-container">
    <div class="col-lg-8 col-sm-12" style="background-color: #fff;">
        <video id="my_video_1" class="video-js vjs-default-skin  vjs-big-play-centered" controls preload="metadata"
            poster="thumb.jpg" width="640" height="268">
            <source src="fb.mp4" type='video/mp4'>
        </video>
        <h1 class="title">Jak włamać się do routera?</h1>

        <div class="description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore nesciunt aperiam, saepe porro, illo aliquid,
            dignissimos velit magnam repudiandae laudantium id. Consequuntur atque veritatis deleniti distinctio
            mollitia animi facilis placeat!Maxime officia suscipit quisquam cum, dolores quo earum tenetur corrupti
            eaque nostrum obcaecati animi eveniet cumque necessitatibus? Eaque molestiae voluptates obcaecati rem libero
            ut doloremque, quidem officia debitis error pariatur!
        </div>
    </div>

    <div class="col-lg-4 col-sm-12">
        2
    </div>
</div>
@endsection