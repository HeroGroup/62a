@extends('layouts.site', ['pageTitle' => 'About', 'active' => 'projects'])
@section('content')

        <section class="page-title fade-from-top">
            <div class="container">
                <h1 class="page-title__h fade-from-top">Arcus House</h1>
            </div>
        </section>

        <section class="project-single">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <h2 class="project-single__content-title fade-from-top" data-delay="100">Project description</h2>
                        <div class="project-single__content fade-from-top" data-delay="200">
                            <p>Planning and design of a horse ranch. The ranch was planned in continuance to the existing house and adjacent to the driveway, in order to keep the view over the backyard open and allow an outlook on the ranch and stables from the house.</p>
                            <p>It was planned in an L shape and divided into an operational area and stable area. The stable entrance and main corridor is led by a wooden pergola and concrete pillars covered in natural stone.</p>
                        </div>
                    </div>
                    <div class="col-lg-5 fade-from-top" data-delay="300">
                        <div class="project-single__table">
                            <table>
                                <tr>
                                    <th>Location</th>
                                    <td>Rosemont, Montréal</td>
                                </tr>
                                <tr>
                                    <th>Type</th>
                                    <td>Single Family Home, Private House</td>
                                </tr>
                                <tr>
                                    <th>Year</th>
                                    <td>2019</td>
                                </tr>
                                <tr>
                                    <th>Size</th>
                                    <td>0 sqft — 1000 sqft</td>
                                </tr>
                                <tr>
                                    <th>Budget</th>
                                    <td>$500k — 1m</td>
                                </tr>
                                <tr>
                                    <th>Photos</th>
                                    <td>John Doe</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="project-single__gallery js-gallery fade-from-top-children">
                    <a class="grid-item" href="/images/project-single-1.jpg"><div class="slide-image-wrap"><img src="../../public/images/project-single-1.jpg" alt=""></div></a>
                    <a class="grid-item" href="/images/project-single-2.jpg"><div class="slide-image-wrap"><img src="../../public/images/project-single-2.jpg" alt=""></div></a>
                    <a class="grid-item" href="/images/project-single-3.jpg"><div class="slide-image-wrap"><img src="../../public/images/project-single-3.jpg" alt=""></div></a>
                    <a class="grid-item" href="/images/project-single-4.jpg"><div class="slide-image-wrap"><img src="../../public/images/project-single-4.jpg" alt=""></div></a>
                    <a class="grid-item" href="/images/project-single-5.jpg"><div class="slide-image-wrap"><img src="../../public/images/project-single-5.jpg" alt=""></div></a>
                    <a class="grid-item" href="/images/project-single-6.jpg"><div class="slide-image-wrap"><img src="../../public/images/project-single-6.jpg" alt=""></div></a>
                    <a class="grid-item" href="/images/project-single-7.jpg"><div class="slide-image-wrap"><img src="../../public/images/project-single-7.jpg" alt=""></div></a>
                    <a class="grid-item" href="/images/project-single-8.jpg"><div class="slide-image-wrap"><img src="../../public/images/project-single-8.jpg" alt=""></div></a>
                </div>
            </div>
        </section>

        <section class="project-nav">
            <div class="container">
                <div class="section-title d-flex flex-wrap align-items-center ">
                    <h2 class="mb-3 mr-4">Projects</h2>
                    <a href="/projects.html" class="btn btn-primary mb-3">All projects <i class="icomoon-right-arrow-long"></i></a>
                </div>
                <div class="row">
                    <div class="col-6 project-item">
                        <div class="slide-image-wrap">
                            <a href="project-single.html" class="project-item__img-link"><img src="../../public/images/home_2.jpg" alt="" class="project-item__img"></a>
                        </div>
                        <h4 class="project-item__title"><a href="project-single.html">A viewpoint to Talamanca</a></h4>
                        <div class="project-item__loc">Minato-ku, Tokyo</div>
                    </div>
                    <div class="col-6 project-item">
                        <div class="slide-image-wrap">
                            <a href="project-single.html" class="project-item__img-link"><img src="../../public/images/home_3.jpg" alt="" class="project-item__img"></a>
                        </div>
                        <h4 class="project-item__title"><a href="project-single.html">Casa Don Juan</a></h4>
                        <div class="project-item__loc">Ecuador</div>
                    </div>
                </div>
            </div>
        </section>
@endsection
