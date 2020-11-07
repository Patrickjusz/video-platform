<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>Haker wideo | haker.edu.pl</title>

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
</head>

<body>
    <div class="wrapper" data-aos="fade-in" data-aos-delay="50" data-aos-duration="500" data-aos-easing="ease-in-out"
        data-aos-once="true">
        <!-- Sidebar  -->
        <nav id="sidebar" class="active" data-aos="fade-right" data-aos-delay="150" data-aos-duration="1500"
            data-aos-easing="ease-in-out" data-aos-once="true">
            <a href="https://haker.edu.pl/" class="sidebar-header">
                <h3>&lt;&sol;&gt;haker.edu.pl</h3>
                <strong>&lt;&sol;&gt;</strong>
            </a>

            <ul class="list-unstyled components">
                <li>
                    <a href="#">
                        <i class="fas fa-2x fa-calendar-alt"></i>
                        <br />Najnowsze
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-2x fa-fire-alt"></i>
                        <br />Popularne
                    </a>
                </li>

                <hr style="
              background-color: white;
              opacity: 0.15;
              margin-top: 0.25rem;
              margin-bottom: 0.25rem;
            " />

                <li>
                    <a href="#">
                        <i class="fab fa-2x fa-youtube"></i>
                        <br />YouTube
                    </a>
                </li>

                <li class="live">
                    <a href="#">
                        <i class="fas fa-2x fa-headset"></i>
                        <br />Na żywo
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fab fa-2x fa-facebook-square"></i>
                        <br />Facebook
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fab fa-2x fa-discord"></i>
                        <br />Discrod
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fab fa-2x fa-twitter-square"></i>
                        <br />Twitter
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fab fa-2x fa-github-square"></i>
                        <br />GitHub
                    </a>
                </li>

                <!-- <li>
            <a href="#">
              <i class="fas fa-paper-plane"></i>
              Pinterest
            </a>
          </li> -->
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" data-aos="zoom-in-up" data-aos-delay="50"
                data-aos-duration="500" data-aos-easing="ease-in-out" data-aos-once="true">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-angle-double-right"></i>
                        <span> </span>
                    </button>

                    <div class="input-group col-md-4 search-wrapper">
                        <input class="form-control py-2" type="search" value="" placeholder="Szukaj"
                            id="search-input" />
                        <span class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>

                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" id="hamburgerMenu" type="button"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="https://haker.edu.pl">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://forum.haker.edu.pl">Forum</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://koszulkiinformatyczne.cupsell.pl/">Koszulki</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://haker.edu.pl/o-haker-edu-pl/">O mnie</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://haker.edu.pl/kontakt/">Kontakt</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <hr style="
            background-color: rgba(0, 0, 0, 0.01);
            width: 100%;
            margin-top: -33px;
            margin-bottom: 45px;
          " />

            <div class="row video-wrapper" data-aos="zoom-out-up" data-aos-delay="50" data-aos-duration="500"
                data-aos-easing="ease-in-out" data-aos-once="true">
                <a href="#" class="col-xl-3 col-lg-4 col-md-6 col-sm-12 video-box">
                    <img class="img" src="https://pbs.twimg.com/media/CcdYVn0W0AAPeIs.jpg" />
                    <div class="description">
                        <div class="title">Jak zostać hakerem?</div>
                        <div class="stats">
                            <div class="row">
                                <div class="col-7 views">2,3tys wyświetleń</div>
                                <div class="col-5 date">3 dni temu</div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#" class="col-xl-3 col-lg-4 col-md-6 col-sm-12 video-box">
                    <img class="img"
                        src="https://gfx.wiadomosci.radiozet.pl/var/radiozetwiadomosci/storage/images/swiat/wyciekly-dane-235-mln-uzytkownikow-instagrama-tiktoka-i-youtube-a/8128549-1-pol-PL/Wyciekly-dane-235-mln-uzytkownikow-Instagrama-TikToka-i-YouTube-a_article.jpg" />
                    <div class="description">
                        <div class="title">Jak zostać hakerem?</div>
                        <div class="stats">
                            <div class="row">
                                <div class="col-7 views">2,3tys wyświetleń</div>
                                <div class="col-5 date">5 dni temu</div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#" class="col-xl-3 col-lg-4 col-md-6 col-sm-12 video-box">
                    <img class="img"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSolIL7K4RQV506VVWoavHHD9CBeEVXvA1KZA&usqp=CAU" />
                    <div class="description">
                        <div class="title">Jak zostać hakerem?</div>
                        <div class="stats">
                            <div class="row">
                                <div class="col-7 views">2,3tys wyświetleń</div>
                                <div class="col-5 date">3 dni temu</div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#" class="col-xl-3 col-lg-4 col-md-6 col-sm-12 video-box">
                    <img class="img" src="https://i.ytimg.com/vi/Z0ojy9wo52w/mqdefault.jpg" />
                    <div class="description">
                        <div class="title">Jak zostać hakerem?</div>
                        <div class="stats">
                            <div class="row">
                                <div class="col-7 views">2,3tys wyświetleń</div>
                                <div class="col-5 date">3 dni temu</div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#" class="col-xl-3 col-lg-4 col-md-6 col-sm-12 video-box">
                    <img class="img" src="https://i.ytimg.com/vi/E43datlHvKs/maxresdefault.jpg" />
                    <div class="description">
                        <div class="title">Jak zostać hakerem?</div>
                        <div class="stats">
                            <div class="row">
                                <div class="col-7 views">2,3tys wyświetleń</div>
                                <div class="col-5 date">3 dni temu</div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#" class="col-xl-3 col-lg-4 col-md-6 col-sm-12 video-box">
                    <img class="img" src="https://i.ytimg.com/vi/QBRRL-Tz6eE/maxresdefault.jpg" />
                    <div class="description">
                        <div class="title">Jak zostać hakerem?</div>
                        <div class="stats">
                            <div class="row">
                                <div class="col-7 views">2,3tys wyświetleń</div>
                                <div class="col-5 date">3 dni temu</div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#" class="col-xl-3 col-lg-4 col-md-6 col-sm-12 video-box">
                    <img class="img" src="https://i.ytimg.com/vi/pWlNhYn5d60/hqdefault.jpg" />
                    <div class="description">
                        <div class="title">Jak zostać hakerem?</div>
                        <div class="stats">
                            <div class="row">
                                <div class="col-7 views">2,3tys wyświetleń</div>
                                <div class="col-5 date">3 dni temu</div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#" class="col-xl-3 col-lg-4 col-md-6 col-sm-12 video-box">
                    <img class="img" src="https://pbs.twimg.com/media/CcdYVn0W0AAPeIs.jpg" />
                    <div class="description">
                        <div class="title">Jak zostać hakerem?</div>
                        <div class="stats">
                            <div class="row">
                                <div class="col-7 views">2,3tys wyświetleń</div>
                                <div class="col-5 date">3 dni temu</div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#" class="col-xl-3 col-lg-4 col-md-6 col-sm-12 video-box">
                    <img class="img"
                        src="https://gfx.wiadomosci.radiozet.pl/var/radiozetwiadomosci/storage/images/swiat/wyciekly-dane-235-mln-uzytkownikow-instagrama-tiktoka-i-youtube-a/8128549-1-pol-PL/Wyciekly-dane-235-mln-uzytkownikow-Instagrama-TikToka-i-YouTube-a_article.jpg" />
                    <div class="description">
                        <div class="title">Jak zostać hakerem?</div>
                        <div class="stats">
                            <div class="row">
                                <div class="col-7 views">2,3tys wyświetleń</div>
                                <div class="col-5 date">5 dni temu</div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#" class="col-xl-3 col-lg-4 col-md-6 col-sm-12 video-box">
                    <img class="img"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSolIL7K4RQV506VVWoavHHD9CBeEVXvA1KZA&usqp=CAU" />
                    <div class="description">
                        <div class="title">Jak zostać hakerem?</div>
                        <div class="stats">
                            <div class="row">
                                <div class="col-7 views">2,3tys wyświetleń</div>
                                <div class="col-5 date">3 dni temu</div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#" class="col-xl-3 col-lg-4 col-md-6 col-sm-12 video-box">
                    <img class="img" src="https://i.ytimg.com/vi/Z0ojy9wo52w/mqdefault.jpg" />
                    <div class="description">
                        <div class="title">Jak zostać hakerem?</div>
                        <div class="stats">
                            <div class="row">
                                <div class="col-7 views">2,3tys wyświetleń</div>
                                <div class="col-5 date">3 dni temu</div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#" class="col-xl-3 col-lg-4 col-md-6 col-sm-12 video-box">
                    <img class="img" src="https://i.ytimg.com/vi/E43datlHvKs/maxresdefault.jpg" />
                    <div class="description">
                        <div class="title">Jak zostać hakerem?</div>
                        <div class="stats">
                            <div class="row">
                                <div class="col-7 views">2,3tys wyświetleń</div>
                                <div class="col-5 date">3 dni temu</div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#" class="col-xl-3 col-lg-4 col-md-6 col-sm-12 video-box">
                    <img class="img" src="https://i.ytimg.com/vi/QBRRL-Tz6eE/maxresdefault.jpg" />
                    <div class="description">
                        <div class="title">Jak zostać hakerem?</div>
                        <div class="stats">
                            <div class="row">
                                <div class="col-7 views">2,3tys wyświetleń</div>
                                <div class="col-5 date">3 dni temu</div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#" class="col-xl-3 col-lg-4 col-md-6 col-sm-12 video-box">
                    <img class="img" src="https://i.ytimg.com/vi/pWlNhYn5d60/hqdefault.jpg" />
                    <div class="description">
                        <div class="title">Jak zostać hakerem?</div>
                        <div class="stats">
                            <div class="row">
                                <div class="col-7 views">2,3tys wyświetleń</div>
                                <div class="col-5 date">3 dni temu</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <footer class="container-fluid">
        <div>&copy; 2020 haker.edu.pl . Wszelkie prawa zastrzeżone.</div>
    </footer>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>

    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
        integrity="sha512-F5QTlBqZlvuBEs9LQPqc1iZv2UMxcVXezbHzomzS6Df4MZMClge/8+gXrKw2fl5ysdk4rWjR0vKS7NNkfymaBQ=="
        crossorigin="anonymous"></script>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>