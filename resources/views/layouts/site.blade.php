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
    <link href="/assets/css/colored-toast.css" rel="stylesheet">

    <link rel="icon" href="/favicon.png"/>
</head>

<body>
    <header id="main-header" class="site-header is-fixed">
        <div class="page-backdrop"></div>
        <div class="container">
            <div class="d-flex align-items-center">
                <a href="/" class="logo header-logo">62&#xb0; Architecture</a>
                <div class="header-nav ml-auto">
                    <button class="menu-toggle icomoon-menu" id="js-open-menu"></button>
                    <div class="main-menu-wrap" id="js-main-menu">
                        <button class="menu-toggle menu-close icomoon-left-arrow-long" id="js-close-menu"></button>
                        <ul class="nav main-menu">
                            <li id="projects" class="nav-item">
                                <a class="nav-link" href="{{route('site.projects')}}">{{session('lang') == 'hy' ? 'Projects' : 'Projects'}}</a>
                            </li>
                            <li id="what-we-do" class="nav-item">
                                <a class="nav-link" href="{{route('site.whatWeDo')}}">{{session('lang') == 'hy' ? 'What We Do' : 'What We Do'}}</a>
                            </li>
                            <li id="about" class="nav-item">
                                <a class="nav-link" href="{{route('site.about')}}">{{session('lang') == 'hy' ? 'About Us' : 'About Us'}}</a>
                            </li>
                            <li id="contact" class="nav-item">
                                <a class="nav-link" href="{{route('site.contact')}}">{{session('lang') == 'hy' ? 'Contact' : 'Contact'}}</a>
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
                <div class="widget-col col-lg-3">
                    <div class="widget widget-text">
                        <p id="phone"></p>
                        <p><a href="#" id="email"></a></p>
                        <p id="working_hours"></p>
                    </div>
                </div>

                <div class="widget-col col-lg-3">
                    <div class="widget widget-text">
                        <p id="address"></p>
                        <p id="city"></p>
                        <p id="address-detail"></p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-between align-items-center">
                <div class="col-lg-auto">
                    <div class="copy-text">© 62&#xb0; Architecture. All Rights Reserved.</div>
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
    <script src="/assets/js/sweetalert2.min.js"></script>

    <script>
        $(document).ready(function() {
            var active = "{{$active}}";
            $(`#${active}`).addClass("active");

            var xhr = new XMLHttpRequest();
            xhr.open('GET', "{{route('site.getFooter')}}");
            xhr.addEventListener("load", function() {
                var response = JSON.parse(xhr.response);
                if(response.status === 1) {
                    var result = response.data;
                    document.getElementById('phone').innerText = result.phone;
                    document.getElementById('email').innerText = result.email_address;
                    document.getElementById('email').href = "mailto:"+result.email_address;
                    document.getElementById('working_hours').innerText = result.work_hours_en;
                    document.getElementById('address').innerText = result.address_en;
                    document.getElementById('city').innerText = result.city_en;
                }
            });
            xhr.send();

            if("{{\Illuminate\Support\Facades\Session::has('message')}}" === "1") {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    iconColor: 'white',
                    customClass: {
                        popup: 'colored-toast'
                    },
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
                Toast.fire({
                    icon: "{{\Illuminate\Support\Facades\Session::get('type')}}" === 'danger' ? 'error' : 'success',
                    title: "{{\Illuminate\Support\Facades\Session::get('message')}}"
                });
            }
        });
    </script>
</body>
</html>
