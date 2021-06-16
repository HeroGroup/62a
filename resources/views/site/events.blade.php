@extends('layouts.site', ['pageTitle' => 'About', 'active' => 'events'])
@section('content')


        <section class="page-title fade-from-top">
            <div class="container">
                <h1 class="page-title__h fade-from-top" data-delay="100">Events</h1>
                <div class="page-title__text fade-from-top" data-delay="200">For media, event speaking engagements and award inquiries, contact <a href="mailto:events@arc.works">events@arc.works</a></div>
            </div>
        </section>

        <section class="event-big">
            <div class="container">
                <div class="event">
                    <div class="row">
                        <div class="col-lg-5 mb-5 mb-lg-0 fade-from-top">
                            <div class="event__date date">July 24, 2020</div>
                            <h3 class="event__title"><a href="event-single.html">Summer School: Architecture x Film</a></h3>
                            <div class="event__loc location"><i class="icomoon-pin"></i> Copenhagen, Denmark</div>
                            <div class="event__text">During this phase, we will work to provide a detailed analysis of the project and we will establish project along with our clients.</div>
                            <a class="event__more" href="event-single.html">Find out more</a>
                        </div>
                        <div class="col-lg-7">
                            <div class="slide-image-wrap">
                                <img src="../../public/images/event_1.jpg" class="slide-image-left event__thumb" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section events-list">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 fade-from-top">
                        <div class="event">
                            <div class="event__date date">September 7, 2020</div>
                            <h3 class="event__title"><a href="event-single.html">BuildMech Asia events</a></h3>
                            <div class="event__loc location"><i class="icomoon-pin"></i> CA, United States</div>
                        </div>
                    </div>
                    <div class="col-lg-4 fade-from-top" data-delay="100">
                        <div class="event">
                            <div class="event__date date">July 24, 2020</div>
                            <h3 class="event__title"><a href="event-single.html">Webinar sponsorship information art modern architecture </a></h3>
                            <div class="event__loc location"><i class="icomoon-pin"></i> Beijing, China</div>
                        </div>
                    </div>
                    <div class="col-lg-4 fade-from-top" data-delay="200">
                        <div class="event">
                            <div class="event__date date">December 15, 2019</div>
                            <h3 class="event__title"><a href="event-single.html">Future of Interior trade show and conference</a></h3>
                            <div class="event__loc location"><i class="icomoon-pin"></i> La Plata, Argentina</div>
                        </div>
                    </div>
                    <div class="col-lg-4 fade-from-top" data-delay="300">
                        <div class="event">
                            <div class="event__date date">November 15, 2019</div>
                            <h3 class="event__title"><a href="event-single.html">Matchmaking Conference</a></h3>
                            <div class="event__loc location"><i class="icomoon-pin"></i> Ljubljana, Slovenia</div>
                        </div>
                    </div>
                    <div class="col-lg-4 fade-from-top" data-delay="400">
                        <div class="event">
                            <div class="event__date date">October 19, 2019</div>
                            <h3 class="event__title"><a href="event-single.html">Form Follows</a></h3>
                            <div class="event__loc location"><i class="icomoon-pin"></i> Kyiv, Ukraine</div>
                        </div>
                    </div>
                    <div class="col-lg-4 fade-from-top" data-delay="500">
                        <div class="event">
                            <div class="event__date date">October 2, 2019</div>
                            <h3 class="event__title"><a href="event-single.html">Architecture After the Future</a></h3>
                            <div class="event__loc location"><i class="icomoon-pin"></i> Zagreb, Croatia</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-section content-bottom" style="background-image: url('../../public/images/event_2.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 abs-box" data-delay="300">
                        <h3 class="abs-box__title">The best design is design that works</h3>
                        <div class="abs-box__text">
                            Our design solutions are creative and effective with an unparalleled mix of form and function.
                        </div>
                        <a href="contact.html" class="btn btn-icon hero-btn"><i class="icomoon-right-arrow"></i> Contact Us</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="brands">
            <div class="container">
                <div class="row align-items-center brand-list">
                    <div class="brand-list__item col-md-3 col-6"><img src="../../public/images/brand-1.png" alt=""></div>
                    <div class="brand-list__item col-md-3 col-6"><img src="../../public/images/brand-2.png" alt=""></div>
                    <div class="brand-list__item col-md-3 col-6"><img src="../../public/images/brand-3.png" alt=""></div>
                    <div class="brand-list__item col-md-3 col-6"><img src="../../public/images/brand-4.png" alt=""></div>
                    <div class="brand-list__item col-md-3 col-6"><img src="../../public/images/brand-5.png" alt=""></div>
                    <div class="brand-list__item col-md-3 col-6"><img src="../../public/images/brand-6.png" alt=""></div>
                    <div class="brand-list__item col-md-3 col-6"><img src="../../public/images/brand-7.png" alt=""></div>
                    <div class="brand-list__item col-md-3 col-6"><img src="../../public/images/brand-8.png" alt=""></div>
                </div>
            </div>
        </section>
@endsection
