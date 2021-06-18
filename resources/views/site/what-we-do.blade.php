@extends('layouts.site', ['pageTitle' => 'What We Do', 'active' => 'what-we-do'])
@section('content')
        <section class="page-title fade-from-top">
            <div class="container">
                <h1 class="page-title__h fade-from-top" data-delay="100">
                    {{session('lang') == 'hy' ? $section->title_hy : $section->title_en}}
                </h1>
                <div class="page-title__text fade-from-top" data-delay="200">
                    {{session('lang') == 'hy' ? $section->description_hy : $section->description_en}}
                </div>

                <div class="page-title__counter counter fade-from-top" data-delay="400">
                    <div class="counter-num">19</div>
                    <div class="counter-text">
                        {{session('lang') == 'hy' ? 'years of global excellence' : 'years of global excellence'}}
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="row justify-content-between fade-from-top-children">
                @foreach($items as $item)
                    <div class="col-md-5 mb-5">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">{{session('lang') == 'hy' ? $item->title_hy : $item->title_en}}</h3>
                                <p class="card-text">
                                    {{session('lang') == 'hy' ? $item->description_hy : $item->description_en}}
                                </p>
                            </div>
                            <div class="slide-image-wrap">
                                <img src="{{$item->photo_url}}" class="card-img-bottom" alt="{{$item->title_en}}">
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </section>

        <section class="bg-section" style="background-image: url('{{$section->image_url}}')"></section>

        <section class="section icons-section">
            <div class="container">
                <div class="row justify-content-between fade-from-top-children">
                    <div class="col-lg-4">
                        <div class="icon-box">
                            <h4 class="icon-box__title">Workplace Strategy</h4>
                            <div class="icon-box__text">
                                We strive to create meaningful connections for users through considered. Don't hesitate and let's get started!
                                Contact us for a free quote on your
                                next home improvement project.
                            </div>
                            <div class="icon-box__icon icon-box__icon_bottom">
                                <img src="../../public/images/what_we_do_icon_1.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" data-delay="200">
                        <div class="icon-box">
                            <div class="icon-box__icon icon-box__icon_top">
                                <img src="../../public/images/what_we_do_icon_2.svg" alt="">
                            </div>
                            <h4 class="icon-box__title">Employee Engagement</h4>
                            <div class="icon-box__text">
                                We are an award winning construction company focused on user-driven outcomes. To provide exceptional services to the insurance industry and thier clients, the property owner.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" data-delay="400">
                        <div class="icon-box">
                            <h4 class="icon-box__title">Change Management</h4>
                            <div class="icon-box__text">
                                Based in California, Arcworks a licensed general contractor. We are committed to providing the highest level of professionalism, service response, and quality workmanship.
                            </div>
                            <div class="icon-box__icon icon-box__icon_bottom">
                                <img src="../../public/images/what_we_do_icon_3.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="offices clearfix">
            <div class="offices-list bg-dark" data-delay="200">
                <div class="offices-lis-inner">
                    <h3>Our offices</h3>
                    <ul class="js-offices-nav offices-nav"></ul>
                </div>
            </div>

            <div class="offices-carousel js-offices-carousel" >
            @foreach($offices as $office)
                <div class="office-item full-height">
                    <div class="container">
                        <h2 class="mb-3 js-office-item-title office-item-title">{{session('lang') == 'hy' ? $office->city_hy : $office->city_en}}</h2>
                        <button class="btn btn-outline-secondary js-show-on-map-btn" data-toggle="modal" data-target="#js-office-map-modal">
                            {{session('lang') == 'hy' ? 'Show on Map' : 'Show on Map'}} <i class="icomoon-pin"></i>
                        </button>
                        <div class="office-item__image">
                            <img src="{{$office->photo_url}}" alt="{{$office->title_en}}">
                        </div>
                        <div class="js-show-on-map-content show-on-map-content">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d97583.88432336322!2d44.418527203961425!3d40.15350050893358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406aa2dab8fc8b5b%3A0x3d1479ae87da526a!2sYerevan%2C%20Armenia!5e0!3m2!1sen!2s!4v1623940854545!5m2!1sen!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>

            <!-- MAP MODAL -->
            <div class="office-map-modal modal fade" id="js-office-map-modal" tabindex="-1" role="dialog" aria-labelledby="officeMapModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="officeMapModalTitle"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body"></div>
                    </div>
                </div>
            </div>
        </section>
@endsection
