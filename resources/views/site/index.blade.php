@extends('layouts.site', ['pageTitle' => 'About', 'active' => 'index'])
@section('content')


        <section class="hero" data-bgColorStart="204, 179, 157" data-bgColorEnd="209, 209, 209">
            <div class="hero-slider d-flex flex-column">
                <div class="js-hero-slider">
                    <div class="hero-slide" style="background-image: url('/images/hero.jpg')">
                        <div class="container hero-slide-inner full-height">
                            <h1 class="hero-title">A design culture that transforms experience</h1>
                            <div class="hero-text">Leading provider of architecture services</div>
                            <button class="btn btn-icon hero-btn"><i class="icomoon-play"></i> Watch video</button>
                            <div class="hero-author">Arcus House, Los Angeles</div>
                        </div>
                    </div>
                    <div class="hero-slide" style="background-image: url('/images/home_8.jpg')">
                        <div class="container hero-slide-inner full-height">
                            <h1 class="hero-title">Dutch County Residence</h1>
                            <div class="hero-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
                            <button class="btn btn-icon hero-btn"><i class="icomoon-play"></i> Watch video</button>
                            <div class="hero-author">Miami, FL, United States</div>
                        </div>
                    </div>
                    <div class="hero-slide" style="background-image: url('/images/event_2.jpg')">
                        <div class="container hero-slide-inner full-height">
                            <h1 class="hero-title">Natural breeze & lighting symphony</h1>
                            <div class="hero-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
                            <button class="btn btn-icon hero-btn"><i class="icomoon-play"></i> Watch video</button>
                            <div class="hero-author">Nha Trang, Vietnam</div>
                        </div>
                    </div>
                </div>
                <div class="mt-auto slick-count js-slick-count"></div>
            </div>
        </section>

        <section class="home-figure">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 home-figure__img">
                        <div class="slide-image-wrap">
                            <figure class="figure slide-image-left">
                                <img class="figure-img" src="/images/home_1.jpg" alt="">
                                <figcaption class="figure-caption">Lester Jayeux, Architect MOAQ</figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-7 home-figure__text abs-box abs-box-right fade-from-top">
                        <h3 class="abs-box__title">Design is transformative</h3>
                        <div class="abs-box__text">
                            We have a strong reputation for achieving excellence in quality, innovation and delivery
                            while providing our clients with a level of service that meets their expectations.
                        </div>
                        <a href="#" class="btn btn-icon hero-btn"><i class="icomoon-right-arrow"></i> Work With Us</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="home-projects">
            <div class="container">
                <div class="section-title d-md-flex align-items-center">
                    <h2 class="mb-md-0 mb-4 mr-md-4">Projects</h2>
                    <a href="{{route('site.projects',0)}}" class="btn btn-primary">All projects <i class="icomoon-right-arrow-long"></i></a>
                </div>

                <div class="row project-list">
                    <div class="col-md-6 project-item">
                        <div class="slide-image-wrap">
                            <a href="{{route('site.project',0)}}" class="project-item__img-link"><img src="/images/home_2.jpg" alt="" class="project-item__img"></a>
                        </div>
                        <h4 class="project-item__title"><a href="{{route('site.project',0)}}">A viewpoint to Talamanca</a></h4>
                        <div class="project-item__loc">Minato-ku, Tokyo</div>
                    </div>
                    <div class="col-md-6 project-item">
                        <div class="slide-image-wrap">
                            <a href="{{route('site.project',0)}}" class="project-item__img-link" data-delay="300"><img src="/images/home_3.jpg" alt="" class="project-item__img"></a>
                        </div>
                        <h4 class="project-item__title"><a href="{{route('site.project',0)}}">Casa Don Juan</a></h4>
                        <div class="project-item__loc">Ecuador</div>
                    </div>
                    <div class="col-md-6 project-item">
                        <div class="slide-image-wrap">
                            <a href="{{route('site.project',0)}}" class="project-item__img-link"><img src="/images/home_4.jpg" alt="" class="project-item__img"></a>
                        </div>
                        <h4 class="project-item__title"><a href="{{route('site.project',0)}}">Natural breeze & lighting symphony</a></h4>
                        <div class="project-item__loc">Nha Trang, Vietnam</div>
                    </div>
                    <div class="col-md-6 project-item">
                        <div class="slide-image-wrap">
                            <a href="{{route('site.project',0)}}" class="project-item__img-link" data-delay="300"><img src="/images/home_5.jpg" alt="" class="project-item__img"></a>
                        </div>
                        <h4 class="project-item__title"><a href="{{route('site.project',0)}}">Hechingen Studio</a></h4>
                        <div class="project-item__loc">Shenzhen, China</div>
                    </div>
                    <div class="col-md-6 project-item">
                        <div class="slide-image-wrap">
                            <a href="{{route('site.project',0)}}" class="project-item__img-link"><img src="/images/home_6.jpg" alt="" class="project-item__img"></a>
                        </div>
                        <h4 class="project-item__title"><a href="{{route('site.project',0)}}">Boneo Country House</a></h4>
                        <div class="project-item__loc">VIC, Australia</div>
                    </div>
                    <div class="col-md-6 project-item">
                        <div class="slide-image-wrap">
                            <a href="{{route('site.project',0)}}" class="project-item__img-link" data-delay="300"><img src="/images/home_7.jpg" alt="" class="project-item__img"></a>
                        </div>
                        <h4 class="project-item__title"><a href="{{route('site.project',0)}}">Downside Up House</a></h4>
                        <div class="project-item__loc">Melbourne, Australia</div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-section content-bottom home-bg" style="background-image: url('/images/home_8.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 abs-box">
                        <h3 class="abs-box__title">The culture of design</h3>
                        <div class="abs-box__text">
                            We have the expertise to deliver small to medium sized contracts across many sectors of
                            the industry.
                            The company with its many project managers oversaw the activities of a large team of over
                            100 construction personnel at the peak of economic activity.
                        </div>
                        <a href="about.html" class="btn btn-icon hero-btn"><i class="icomoon-right-arrow"></i> Meet The Team</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="home-events bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 mb-5">
                        <h3 class="mb-4">Events</h3>
                        <a href="#" class="btn btn-primary">All Events <i class="icomoon-right-arrow-long"></i></a>
                    </div>
                    <div class="col-lg-3 fade-from-top" data-delay="200">
                        <div class="event">
                            <div class="event__date date">September 7, 2020</div>
                            <h4 class="event__title"><a href="{{route('site.event',0)}}">BuildTech Asia events</a></h4>
                            <div class="event__loc location"><i class="icomoon-pin"></i> CA, United States</div>
                        </div>
                    </div>
                    <div class="col-lg-3 fade-from-top" data-delay="400">
                        <div class="event">
                            <div class="event__date date">July 24, 2020</div>
                            <h4 class="event__title"><a href="{{route('site.event',0)}}">Webinar sponsorship information art modern architecture </a></h4>
                            <div class="event__loc location"><i class="icomoon-pin"></i> Beijing, China</div>
                        </div>
                    </div>
                    <div class="col-lg-3 fade-from-top" data-delay="600">
                        <div class="event">
                            <div class="event__date date">December 15, 2019</div>
                            <h4 class="event__title"><a href="{{route('site.event',0)}}">Future of Interior trade show and conference</a></h4>
                            <div class="event__loc location"><i class="icomoon-pin"></i> La Plata, Argentina</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
