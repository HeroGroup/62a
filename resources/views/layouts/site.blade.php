<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>62&#xb0; Architecture | {{$pageTitle}}</title>

    <!-- Lib styles -->
    <link rel="stylesheet" href="/libs/bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/libs/slick/slick.css">
    <link rel="stylesheet" href="/libs/simpleLightbox/simplelightbox.min.css">

    <!-- Font styles -->
    <link rel="stylesheet" href="/assets/fonts/NunitoSans/NunitoSans.css">

    <!-- Icons -->
    <link rel="stylesheet" href="/assets/fonts/icomoon/style.css">

    <!-- Site styles -->
    <link rel="stylesheet" href="/assets/css/main.min.css">

    <link rel="icon" href="/favicon.png"/>
</head>

<body>
    <header id="main-header" class="site-header is-fixed">
        <div class="page-backdrop"></div>
        <div class="container">
            <div class="d-flex align-items-center">
                <a href="/" class="logo header-logo"><img src="/images/logo.svg" alt="logo"></a>
                <div class="header-nav ml-auto">
                    <button class="menu-toggle icomoon-menu" id="js-open-menu"></button>
                    <div class="main-menu-wrap" id="js-main-menu">
                        <button class="menu-toggle menu-close icomoon-left-arrow-long" id="js-close-menu"></button>
                        <ul class="nav main-menu">
                            <li id="projects" class="nav-item">
                                <a class="nav-link" href="{{route('site.projects')}}">Projects</a>
                            </li>
                            <li id="what-we-do" class="nav-item">
                                <a class="nav-link" href="{{route('site.whatWeDo')}}">What We Do</a>
                            </li>
                            <li id="about" class="nav-item">
                                <a class="nav-link" href="{{route('site.about')}}">About Us</a>
                            </li>
                            <li id="events" class="nav-item">
                                <a class="nav-link" href="{{route('site.events')}}">Events</a>
                            </li>
                            <li id="career" class="nav-item">
                                <a class="nav-link" href="{{route('site.career')}}">Career</a>
                            </li>
                            <li id="contact" class="nav-item">
                                <a class="nav-link" href="{{route('site.contact')}}">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main id="main-content" class="site-content bg-lines">
        @yield('content')
    </main>

    <footer id="main-footer" class="site-footer">
        <div class="container">
            <div class="row">
                <div class="widget-col col-lg-2">
                    <div class="widget widget-logo">
                        <a href="/" class="logo footer-logo"><img src="/images/logo-footer.svg" alt="footer"></a>
                    </div>
                </div>

                <div class="widget-col col-lg-3">
                    <div class="widget widget-text">
                        <p>310.900.4000</p>
                        <p><a href="mailto:office@arc.works">office@arc.works</a></p>
                        <p>Monday — Sunday 8:00‒22:00</p>
                    </div>
                </div>

                <div class="widget-col col-lg-3">
                    <div class="widget widget-text">
                        <p>212 Wilshire Blvd. Suite 1245</p>
                        <p>San Francisco, California</p>
                        <p>CA 90015</p>
                    </div>
                </div>

                <div class="widget-col col-lg-4">
                    <div class="widget widget-newsletter">
                        <h6>Newsletter Sign Up</h6>
                        <div class="input-group">
                            <input type="email" class="form-control form-control-sm"  placeholder="Email address" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-secondary btn-sm" type="button" id="button-addon2">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-between align-items-center">
                <div class="col-lg-auto">
                    <div class="copy-text">© Arcworks. All Rights Reserved.</div>
                </div>
                <div class="col-auto">
                    <ul class="nav footer-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Terms of use</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Privacy policy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Lib scripts  -->
    <script src="/libs/jquery/jquery-3.3.1.min.js"></script>
    <script src="/libs/bootstrap-4.3.1/js/popper.min.js"></script>
    <script src="/libs/bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <script src="/libs/greensock-js/TweenMax.min.js"></script>
    <script src="/libs/scrollreveal/scrollreveal.min.js"></script>
    <script src="/libs/slick/slick.min.js"></script>
    <script src="/libs/simpleLightbox/simple-lightbox.min.js"></script>
    <script src="/libs/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="/libs/isotope/isotope.min.js"></script>

    <!-- Site scripts  -->
    <script src="/assets/js/common.min.js"></script>
    <script>
        var active = "{{$active}}";
        $(`#${active}`).addClass("active");
    </script>
</body>
</html>
