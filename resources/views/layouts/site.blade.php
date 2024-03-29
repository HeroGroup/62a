<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>62&#xb0; ARCHITECTS | {{$pageTitle}}</title>

    <!-- Lib styles -->
    <link rel="stylesheet" href="/libs/bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/libs/slick/slick.css">
    <link rel="stylesheet" href="/libs/simpleLightbox/simplelightbox.min.css">

    <!-- Icons -->
    <link rel="stylesheet" href="/assets/fonts/icomoon/style.css">

    <!-- Font styles -->
    <!-- <link rel="stylesheet" href="/assets/fonts/NunitoSans/NunitoSans.css"> -->

    <style>
        @font-face {
            font-family: arialam;
            src: url('/assets/fonts/Montserratarm.otf');
        }
        html,body,h1,h2,h3,h4,h5,h6,a,span,p,label,div,ul,li {
            font-family: arialam;
        }

        @media only screen and (max-width: 991px) {
            .footer-logo-img {
                /*width: 120px;*/
                display: none;
            }
        }

        @media only screen and (min-width: 992px) {
            .footer-logo-container {
                text-align:center;
                padding-top:50px;
            }
            .footer-logo-img {
                height: 135px;
            }
        }

        .pre-loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('/images/Preloader_new.gif') center no-repeat #fff;
        }
    </style>

    <!-- Site styles -->
    <link rel="stylesheet" href="/assets/css/main.min.css">
    <link href="/assets/css/colored-toast.css" rel="stylesheet">

    <!--<link rel="icon" href="/favicon.png"/>-->
</head>

<body>
    <div class="pre-loader"></div>
    <header id="main-header" class="site-header is-fixed">
        <div class="page-backdrop"></div>
        <div class="container">
            <div class="d-flex align-items-center">
                <a href="/" class="logo header-logo">
                    <span style="color:#333;font-size:18px;font-weight: bold;padding-left:3px;">62&#xb0; ARCHITECTS.</span>
                </a>
                <div class="header-nav ml-auto">
                    <button class="menu-toggle icomoon-menu" id="js-open-menu"></button>
                    <div class="main-menu-wrap" id="js-main-menu">
                        <button class="menu-toggle menu-close icomoon-left-arrow-long" id="js-close-menu"></button>
                        <ul class="nav main-menu">
                            <li id="language" class="nav-item" style="position: relative;">
                                <a class="nav-link" href="#" onclick="toggleLanguageBoxDisplay()">
                                    <span @if(session('lang')=='hy') style="color:#222;" @else style="color:lightgray;" @endif>Հայ</span>
                                    <span style="color:gray;">|</span>
                                    <span @if(session('lang')=='hy') style="color:lightgray;" @else style="color:#222;" @endif>Eng</span>
                                </a>
                                <div id="language-box" style="background-color:#D9D9D9;border-radius:5px;position: absolute;z-index:2;opacity:0;visibility:hidden;width:120px;transition:opacity 300ms, visibility 300ms;">
                                    <ul style="list-style-type:none;padding:5px 20px;margin:0;">
                                        <li>
                                            <a href="#" onclick="changeLanguage('hy')" style="background-color:#D9D9D9;@if(session('lang')=='hy') color:#222; @else color:gray; @endif">Հայ</a>
                                        </li>
                                        <li>
                                            <a href="#" onclick="changeLanguage('en')" style="background-color:#D9D9D9;@if(session('lang')=='hy') color:gray; @else color:#222; @endif">English</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li id="projects" class="nav-item">
                                <a class="nav-link" href="{{route('site.projects')}}">{{session('lang') == 'hy' ? 'Նախագծեր' : 'Projects'}}</a>
                            </li>
                            <li id="what-we-do" class="nav-item">
                                <a class="nav-link" href="{{route('site.whatWeDo')}}">{{session('lang') == 'hy' ? 'Ինչ ենք անում' : 'What We Do'}}</a>
                            </li>
                            <li id="about" class="nav-item">
                                <a class="nav-link" href="{{route('site.about')}}">{{session('lang') == 'hy' ? 'Մեր մասին' : 'About Us'}}</a>
                            </li>
                            <li id="career" class="nav-item">
                                <a class="nav-link" href="{{route('site.career')}}">{{session('lang') == 'hy' ? 'Կարիերա' : 'Career'}}</a>
                            </li>
                            <li id="contact" class="nav-item">
                                <a class="nav-link" href="{{route('site.contact')}}">{{session('lang') == 'hy' ? 'Կապ' : 'Contact'}}</a>
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
                <div class="widget-col col-lg-2 footer-logo-container">
                    <div class="widget widget-logo" style="margin-bottom:40px;">
                        <a href="/" class="logo footer-logo">
                            <img src="images/logo-inverted-cropped.png" alt="62 ARCHITECTS." class="footer-logo-img">
                        </a>
                    </div>
                </div>

                <div class="widget-col col-lg-3">
                    <div class="widget widget-text" style="margin-bottom:40px;">
                        <p id="phone"></p>
                        <p id="mobile"></p>
                        <p><a href="#" id="email"></a></p>
                        <p id="working_hours"></p>
                    </div>
                </div>

                <div class="widget-col col-lg-3">
                    <div class="widget widget-text" style="margin-bottom:40px;">
                        <p id="address"></p>
                        <p id="city"></p>
                        <p id="address-detail"></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-5">
                    <div class="copy-text" style="font-size:12px;">
                        © 62&#xb0; ARCHITECTS. {{session('lang') == 'hy' ? 'Բոլոր իրավունքները պաշտպանված են.' : 'All Rights Reserved.'}}
                    </div>
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
        $(window).on('load', function() {
            $(".pre-loader").fadeOut("slow");
        });

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
                    document.getElementById('mobile').innerText = result.mobile;
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

        function toggleLanguageBoxDisplay() {
            var languageBox = document.getElementById('language-box'),
                currentVisibility = languageBox.style.visibility,
                currentOpacity = languageBox.style.opacity;

            languageBox.style.visibility = currentVisibility === "hidden" ? "visible" : "hidden";
            languageBox.style.opacity = currentOpacity === "1" ? "0" : "1";
        }

        function changeLanguage(lang) {
            window.location.href = "/language/"+lang;
        }
    </script>
</body>
</html>
