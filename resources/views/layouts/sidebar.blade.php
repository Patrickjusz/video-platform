@section('sidebar')
    <nav id="sidebar" class="active" data-aos="fade-right" data-aos-delay="150" data-aos-duration="1500"
        data-aos-easing="ease-in-out" data-aos-once="true">
        <a href="{{ route('video.index') }}" class="sidebar-header">
            <h3>&lt;&sol;&gt;haker.edu.pl</h3>
            <strong>&lt;&sol;&gt;</strong>
        </a>

        <ul class="list-unstyled components">
            <li>
                <a href="{{ route('video.index') }}">
                    <i class="fas fa-2x fa-calendar-alt"></i>
                    <br />Najnowsze
                </a>
            </li>
            <li>
                <a href="{{ route('video.popular') }}">
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
                <a href="https://www.youtube.com/channel/UCxnQfWxR4Xp4Tv_dLh2Xvtw">
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
                <a href="https://www.facebook.com/HakerEduPL">
                    <i class="fab fa-2x fa-facebook-square"></i>
                    <br />Facebook
                </a>
            </li>

            <li>
                <a href="https://discord.gg/Rr9e6ugjay">
                    <i class="fab fa-2x fa-discord"></i>
                    <br />Discrod
                </a>
            </li>

            <li>
                <a href="https://twitter.com/hakeredupl">
                    <i class="fab fa-2x fa-twitter-square"></i>
                    <br />Twitter
                </a>
            </li>

            {{-- <li>
                <a href="#">
                    <i class="fab fa-2x fa-github-square"></i>
                    <br />GitHub
                </a>
            </li> --}}

            <!-- <li>
                        <a href="#">
                          <i class="fas fa-paper-plane"></i>
                          Pinterest
                        </a>
                      </li> -->
        </ul>
    </nav>
@endsection
