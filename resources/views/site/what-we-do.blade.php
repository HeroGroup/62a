@extends('layouts.site', ['pageTitle' => session('lang')=='hy'?'Ինչ ենք անում':'What We Do', 'active' => 'what-we-do'])
@section('content')
        <section class="page-title fade-from-top">
            <div class="container">
                <h1 class="page-title__h fade-from-top" data-delay="100">
                    {{session('lang') == 'hy' ? $section->title_hy : $section->title_en}}
                </h1>
                <div class="page-title__text fade-from-top" data-delay="200">
                    {{session('lang') == 'hy' ? $section->description_hy : $section->description_en}}
                </div>

                <!--<div class="page-title__counter counter fade-from-top" data-delay="400">
                    <div class="counter-num">19</div>
                    <div class="counter-text">
                        {{session('lang') == 'hy' ? 'years of global excellence' : 'years of global excellence'}}
                    </div>
                </div>-->
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

        <section class="bg-section" style="background-image: url('{{$section->image_url}}')" loading="lazy"></section>

        <!--<section class="section icons-section">
            <div class="container">
                <div class="row justify-content-between fade-from-top-children">
                    <div class="col-lg-4">
                        <div class="icon-box">
                            <h4 class="icon-box__title">Workplace Strategy</h4>
                            <div class="icon-box__text">
                                We strive to create meaningful connections for users through considered.
                                Don't hesitate and let's get started!
                                Contact us for a free quote on your next home improvement project.
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
                                Based in Armenia, Yeravan, 62&#xb0; Architects a licensed general contractor. We are committed to providing the highest level of professionalism, service response, and quality workmanship.
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
                            @component('components.locationOnMap')@endcomponent
                        </div>
                    </div>
                </div>
            @endforeach
            </div>

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
        </section>-->
@endsection
