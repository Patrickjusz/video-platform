@section('search')
<nav class="navbar navbar-expand-lg navbar-light bg-light" data-aos="zoom-in-up" data-aos-delay="50"
    data-aos-duration="500" data-aos-easing="ease-in-out" data-aos-once="true">
    <div class="container-fluid">
        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-angle-double-right"></i>
            <span> </span>
        </button>

        <div class="input-group col-md-4 search-wrapper">
            <input class="form-control py-2" type="search" value="" placeholder="Szukaj" id="search-input" />
            <span class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>

        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" id="hamburgerMenu" type="button"
            data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
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
@endsection