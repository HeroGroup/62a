@extends('layouts.site', ['pageTitle' => 'About', 'active' => 'projects'])
@section('content')

        <section class="page-title projects-title fade-from-top">
            <div class="container">
                <h1 class="page-title__h fade-from-top" data-delay="100">Projects</h1>
                <div class="page-title__text fade-from-top" data-delay="200">
                    We have a passion for simplicity and sustainability, always balancing form with function and delight.
                </div>
            </div>
        </section>

        <section class="projects">
            <div class="container">
                <div class="project-filter js-project-filter fade-from-top" data-delay="300">
                    <button class="project-filter__btn active" data-filter="*">All Projects<span class="count">31</span></button>
                    <button class="project-filter__btn" data-filter=".interior">Interior Design<span class="count">14</span></button>
                    <button class="project-filter__btn" data-filter=".office">Office<span class="count">3</span></button>
                    <button class="project-filter__btn" data-filter=".industrial">Industrial<span class="count">8</span></button>
                    <button class="project-filter__btn" data-filter=".studio">Design Studio<span class="count">6</span></button>
                </div>
                <div class="row project-list js-project-list fade-from-top-children">
                    <div class="col-md-6 project-item interior">
                        <div class="slide-image-wrap">
                            <a href="project-single.html" class="project-item__img-link"><img src="../../public/images/home_6.jpg" alt="" class="project-item__img"></a>
                        </div>
                        <h4 class="project-item__title"><a href="project-single.html">Bono Country House</a></h4>
                        <div class="project-item__loc">VIC, Australia</div>
                    </div>
                    <div class="col-md-6 project-item interior">
                        <div class="slide-image-wrap">
                            <a href="project-single.html" class="project-item__img-link" data-delay="300"><img src="../../public/images/home_7.jpg" alt="" class="project-item__img"></a>
                        </div>
                        <h4 class="project-item__title"><a href="project-single.html">Downside Up House</a></h4>
                        <div class="project-item__loc">Melbourne, Australia</div>
                    </div>
                    <div class="col-md-6 project-item office">
                        <div class="slide-image-wrap">
                            <a href="project-single.html" class="project-item__img-link"><img src="../../public/images/home_3.jpg" alt="" class="project-item__img"></a>
                        </div>
                        <h4 class="project-item__title"><a href="project-single.html">Casa Don Juan</a></h4>
                        <div class="project-item__loc">Ecuador</div>
                    </div>
                    <div class="col-md-6 project-item industrial">
                        <div class="slide-image-wrap">
                            <a href="project-single.html" class="project-item__img-link" data-delay="300"><img src="../../public/images/home_2.jpg" alt="" class="project-item__img"></a>
                        </div>
                        <h4 class="project-item__title"><a href="project-single.html">A viewpoint to Talamanca</a></h4>
                        <div class="project-item__loc">Minato-ku, Tokyo</div>
                    </div>
                    <div class="col-md-6 project-item industrial">
                        <div class="slide-image-wrap">
                            <a href="project-single.html" class="project-item__img-link"><img src="../../public/images/home_5.jpg" alt="" class="project-item__img"></a>
                        </div>
                        <h4 class="project-item__title"><a href="project-single.html">Techiner Studio</a></h4>
                        <div class="project-item__loc">Shenzhen, China</div>
                    </div>
                    <div class="col-md-6 project-item office studio">
                        <div class="slide-image-wrap">
                            <a href="project-single.html" class="project-item__img-link" data-delay="300"><img src="../../public/images/home_4.jpg" alt="" class="project-item__img"></a>
                        </div>
                        <h4 class="project-item__title"><a href="project-single.html">Natural breeze & lighting symphony</a></h4>
                        <div class="project-item__loc">Nha Trang, Vietnam</div>
                    </div>
                    <div class="col-md-6 project-item interior studio">
                        <div class="slide-image-wrap">
                            <a href="project-single.html" class="project-item__img-link"><img src="../../public/images/project_1.jpg" alt="" class="project-item__img"></a>
                        </div>
                        <h4 class="project-item__title"><a href="project-single.html">Brilliant House</a></h4>
                        <div class="project-item__loc">Dutchess County, NY, United States</div>
                    </div>
                    <div class="col-md-6 project-item studio">
                        <div class="slide-image-wrap">
                            <a href="project-single.html" class="project-item__img-link" data-delay="300"><img src="../../public/images/project_2.jpg" alt="" class="project-item__img"></a>
                        </div>
                        <h4 class="project-item__title"><a href="project-single.html">Dutch County Residence</a></h4>
                        <div class="project-item__loc">Miami, FL, United States</div>
                    </div>
                </div>
                <div class="text-center projects-load">
                    <button class="btn btn-primary">Loading... <i class="icomoon-refresh"></i></button>
                </div>
            </div>
        </section>

        <section class="projects-contacts position-relative ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 projects-contacts__img image-full">
                        <div class="image-full-box"><img src="../../public/images/projects-1-bg.jpg" alt=""></div>
                    </div>
                    <div class="col-lg-7 projects-contacts__text abs-box abs-box-right" data-delay="200">
                        <h2>Who we work with</h2>
                        <p>As a national, multidisciplinary firm, we have produced unique design solutions for some of the country’s most forward thinking organizations, and have earned a reputation for design excellence.</p>
                        <a href="contact.html" class="btn btn-icon hero-btn"><i class="icomoon-right-arrow"></i> Contact Us</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="brands bg-light">
            <div class="container">
                <div class="row align-items-center brand-lis">
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
