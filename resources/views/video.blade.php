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
        <video id="main-video" class="video-js vjs-default-skin  vjs-big-play-centered" controls preload="metadata"
            poster="thumb.jpg" width="640" height="268">
            <source src="wideos/fb2.mp4" type='video/mp4'>
        </video>
        <h1 class="title">Jak włamać się do routera?</h1>

        <div class="stats">240 370 wyświetleń•24 sty 2021</div>

        <div class="description">
            {{-- <img style="float:left; margin:5px; margin-right: 15px;"
                src="https://haker.edu.pl/wp-content/uploads/2021/01/round-150x150.jpg" width=58> --}}
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore nesciunt aperiam, saepe porro,
            illo aliquid,
            dignissimos velit magnam repudiandae laudantium id. Consequuntur atque veritatis deleniti distinctio
            mollitia animi facilis placeat!Maxime officia suscipit quisquam cum, dolores quo earum tenetur corrupti
            eaque nostrum obcaecati animi eveniet cumque necessitatibus? Eaque molestiae voluptates obcaecati rem libero
            ut doloremque, quidem officia debitis error pariatur!
        </div>

        <div id="tags">
            <span class="badge badge-secondary">hasło router</span>
            <span class="badge badge-secondary">router password</span>
            <span class="badge badge-secondary">jak poznać hasło do routera</span>
        </div>
    </div>

    <div class="col-lg-4 col-sm-12" id="similar-videos">

        <a class="row video" href="#adam">
            <div class="col-5"
                style=" min-height: 90px; background-image: url('https://gfx.wiadomosci.radiozet.pl/var/radiozetwiadomosci/storage/images/swiat/wyciekly-dane-235-mln-uzytkownikow-instagrama-tiktoka-i-youtube-a/8128549-1-pol-PL/Wyciekly-dane-235-mln-uzytkownikow-Instagrama-TikToka-i-YouTube-a_article.jpg'); background-repeat: no-repeat; background-size: cover;">

            </div>
            <div class="col-7">
                <b>Jak zostać hakerem?</b><br>
                2.7 tys. wyświetleń<br>
                Dodano 6 dni temu
            </div>
        </a>

        <a class="row video" href="#adam">
            <div class="col-5"
                style=" min-height: 90px; background-image: url('https://gfx.wiadomosci.radiozet.pl/var/radiozetwiadomosci/storage/images/swiat/wyciekly-dane-235-mln-uzytkownikow-instagrama-tiktoka-i-youtube-a/8128549-1-pol-PL/Wyciekly-dane-235-mln-uzytkownikow-Instagrama-TikToka-i-YouTube-a_article.jpg'); background-repeat: no-repeat; background-size: cover;">

            </div>
            <div class="col-7">
                <b>Jak zostać hakerem?</b><br>
                2.7 tys. wyświetleń<br>
                Dodano 6 dni temu
            </div>
        </a>

        <a class="row video" href="#adam">
            <div class="col-5"
                style=" min-height: 90px; background-image: url('https://gfx.wiadomosci.radiozet.pl/var/radiozetwiadomosci/storage/images/swiat/wyciekly-dane-235-mln-uzytkownikow-instagrama-tiktoka-i-youtube-a/8128549-1-pol-PL/Wyciekly-dane-235-mln-uzytkownikow-Instagrama-TikToka-i-YouTube-a_article.jpg'); background-repeat: no-repeat; background-size: cover;">

            </div>
            <div class="col-7">
                <b>Jak zostać hakerem?</b><br>
                2.7 tys. wyświetleń<br>
                Dodano 6 dni temu
            </div>
        </a>

        <a class="row video" href="#adam">
            <div class="col-5"
                style=" min-height: 90px; background-image: url('https://gfx.wiadomosci.radiozet.pl/var/radiozetwiadomosci/storage/images/swiat/wyciekly-dane-235-mln-uzytkownikow-instagrama-tiktoka-i-youtube-a/8128549-1-pol-PL/Wyciekly-dane-235-mln-uzytkownikow-Instagrama-TikToka-i-YouTube-a_article.jpg'); background-repeat: no-repeat; background-size: cover;">

            </div>
            <div class="col-7">
                <b>Jak zostać hakerem?</b><br>
                2.7 tys. wyświetleń<br>
                Dodano 6 dni temu
            </div>
        </a>

        <a class="row video" href="#adam">
            <div class="col-5"
                style=" min-height: 90px; background-image: url('https://gfx.wiadomosci.radiozet.pl/var/radiozetwiadomosci/storage/images/swiat/wyciekly-dane-235-mln-uzytkownikow-instagrama-tiktoka-i-youtube-a/8128549-1-pol-PL/Wyciekly-dane-235-mln-uzytkownikow-Instagrama-TikToka-i-YouTube-a_article.jpg'); background-repeat: no-repeat; background-size: cover;">

            </div>
            <div class="col-7">
                <b>Jak zostać hakerem?</b><br>
                2.7 tys. wyświetleń<br>
                Dodano 6 dni temu
            </div>
        </a>

        <a class="row video" href="#adam">
            <div class="col-5"
                style=" min-height: 90px; background-image: url('https://gfx.wiadomosci.radiozet.pl/var/radiozetwiadomosci/storage/images/swiat/wyciekly-dane-235-mln-uzytkownikow-instagrama-tiktoka-i-youtube-a/8128549-1-pol-PL/Wyciekly-dane-235-mln-uzytkownikow-Instagrama-TikToka-i-YouTube-a_article.jpg'); background-repeat: no-repeat; background-size: cover;">

            </div>
            <div class="col-7">
                <b>Jak zostać hakerem?</b><br>
                2.7 tys. wyświetleń<br>
                Dodano 6 dni temu
            </div>
        </a>

        <a class="row video" href="#adam">
            <div class="col-5"
                style=" min-height: 90px; background-image: url('https://gfx.wiadomosci.radiozet.pl/var/radiozetwiadomosci/storage/images/swiat/wyciekly-dane-235-mln-uzytkownikow-instagrama-tiktoka-i-youtube-a/8128549-1-pol-PL/Wyciekly-dane-235-mln-uzytkownikow-Instagrama-TikToka-i-YouTube-a_article.jpg'); background-repeat: no-repeat; background-size: cover;">

            </div>
            <div class="col-7">
                <b>Jak zostać hakerem?</b><br>
                2.7 tys. wyświetleń<br>
                Dodano 6 dni temu
            </div>
        </a>


    </div>
</div>
</div>
@endsection