@extends('layouts.site', ['pageTitle' => 'About', 'active' => 'what-we-do'])
@section('content')


        <section class="page-title fade-from-top">
            <div class="container">
                <h1 class="page-title__h fade-from-top" data-delay="100">A full-service design firm providing architecture</h1>
                <div class="page-title__text fade-from-top" data-delay="200">We have a passion for simplicity and sustainability, always balancing form with function and delight.</div>

                <div class="page-title__counter counter fade-from-top" data-delay="400">
                    <div class="counter-num">19</div>
                    <div class="counter-text">years of global excellence</div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="row justify-content-between fade-from-top-children">
                    <div class="col-md-5 mb-5">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Architecture</h3>
                                <p class="card-text">To further develop our corporate strengths we have established a corporate mandate to maintain strong core values that truly reflect the companys philosophy.</p>
                            </div>
                            <div class="slide-image-wrap">
                                <img src="../../public/images/what_we_do_2.jpg" class="card-img-bottom" alt="Architecture">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-5">
                            <div class="slide-image-wrap">
                                <img src="../../public/images/what_we_do_2.jpg" class="card-img-top" alt="Architecture">
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Planning</h3>
                                <p class="card-text">During this phase, we will work to provide a detailed analysis of the project and we will establish project along with our clients.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-section" style="background-image: url('../../public/images/what_we_do_3.jpg')">
        </section>

        <section>
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-5 py-5">
                        <h3 class="mb-3">Strategic Design</h3>
                        <div class="section-text">We are focused on sustainable business that delivers the best possible project results. We are committed to providing the highest level of professionalism, service response, and quality workmanship.</div>
                    </div>
                    <div class="col-md-6 mt-lg-n5" >
                        <div class="slide-image-wrap">
                            <img src="../../public/images/what_we_do_4.jpg" alt="Strategic Design">
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
                <div class="office-item full-height">
                    <div class="container">
                        <h2 class="mb-3 js-office-item-title office-item-title">Chicago</h2>
                        <button class="btn btn-outline-secondary js-show-on-map-btn" data-toggle="modal" data-target="#js-office-map-modal">Show on map <i class="icomoon-pin"></i></button>
                        <div class="office-item__image">
                            <img src="../../public/images/image_4.jpg" alt="">
                        </div>
                        <div class="js-show-on-map-content show-on-map-content">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11882.127060704288!2d-87.61670486274774!3d41.88141960480525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880e2b587c65e43b%3A0x2594a4440fff56bd!2z0KfQuNC60LDQs9C-LdCb0YPQvywg0KfQuNC60LDQs9C-LCDQmNC70LvQuNC90L7QudGBIDYwNjAxLCDQodCo0JA!5e0!3m2!1sru!2sua!4v1557226177063!5m2!1sru!2sua" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="office-item full-height">
                    <div class="container">
                        <h2 class="mb-3 js-office-item-title office-item-title">Detroit</h2>
                        <button class="btn btn-outline-secondary js-show-on-map-btn" data-toggle="modal" data-target="#js-office-map-modal">Show on map <i class="icomoon-pin"></i></button>
                        <div class="office-item__image">
                            <img src="../../public/images/home_8.jpg" alt="">
                        </div>
                        <div class="js-show-on-map-content show-on-map-content">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11882.127060704288!2d-87.61670486274774!3d41.88141960480525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880e2b587c65e43b%3A0x2594a4440fff56bd!2z0KfQuNC60LDQs9C-LdCb0YPQvywg0KfQuNC60LDQs9C-LCDQmNC70LvQuNC90L7QudGBIDYwNjAxLCDQodCo0JA!5e0!3m2!1sru!2sua!4v1557226177063!5m2!1sru!2sua" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="office-item full-height">
                    <div class="container">
                        <h2 class="mb-3 js-office-item-title office-item-title">Los Angeles</h2>
                        <button class="btn btn-outline-secondary js-show-on-map-btn" data-toggle="modal" data-target="#js-office-map-modal">Show on map <i class="icomoon-pin"></i></button>
                        <div class="office-item__image">
                            <img src="../../public/images/image_2.jpg" alt="">
                        </div>
                        <div class="js-show-on-map-content show-on-map-content">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11882.127060704288!2d-87.61670486274774!3d41.88141960480525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880e2b587c65e43b%3A0x2594a4440fff56bd!2z0KfQuNC60LDQs9C-LdCb0YPQvywg0KfQuNC60LDQs9C-LCDQmNC70LvQuNC90L7QudGBIDYwNjAxLCDQodCo0JA!5e0!3m2!1sru!2sua!4v1557226177063!5m2!1sru!2sua" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="office-item full-height">
                    <div class="container">
                        <h2 class="mb-3 js-office-item-title office-item-title">Sacramento</h2>
                        <button class="btn btn-outline-secondary js-show-on-map-btn" data-toggle="modal" data-target="#js-office-map-modal">Show on map <i class="icomoon-pin"></i></button>
                        <div class="office-item__image">
                            <img src="../../public/images/home_8.jpg" alt="">
                        </div>
                        <div class="js-show-on-map-content show-on-map-content">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11882.127060704288!2d-87.61670486274774!3d41.88141960480525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880e2b587c65e43b%3A0x2594a4440fff56bd!2z0KfQuNC60LDQs9C-LdCb0YPQvywg0KfQuNC60LDQs9C-LCDQmNC70LvQuNC90L7QudGBIDYwNjAxLCDQodCo0JA!5e0!3m2!1sru!2sua!4v1557226177063!5m2!1sru!2sua" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="office-item full-height">
                    <div class="container">
                        <h2 class="mb-3 js-office-item-title office-item-title">San Diego</h2>
                        <button class="btn btn-outline-secondary js-show-on-map-btn" data-toggle="modal" data-target="#js-office-map-modal">Show on map <i class="icomoon-pin"></i></button>
                        <div class="office-item__image">
                            <img src="../../public/images/image_4.jpg" alt="">
                        </div>
                        <div class="js-show-on-map-content show-on-map-content">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11882.127060704288!2d-87.61670486274774!3d41.88141960480525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880e2b587c65e43b%3A0x2594a4440fff56bd!2z0KfQuNC60LDQs9C-LdCb0YPQvywg0KfQuNC60LDQs9C-LCDQmNC70LvQuNC90L7QudGBIDYwNjAxLCDQodCo0JA!5e0!3m2!1sru!2sua!4v1557226177063!5m2!1sru!2sua" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="office-item full-height">
                    <div class="container">
                        <h2 class="mb-3 js-office-item-title office-item-title">San Francisco</h2>
                        <button class="btn btn-outline-secondary js-show-on-map-btn" data-toggle="modal" data-target="#js-office-map-modal">Show on map <i class="icomoon-pin"></i></button>
                        <div class="office-item__image">
                            <img src="../../public/images/image_2.jpg" alt="">
                        </div>
                        <div class="js-show-on-map-content show-on-map-content">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11882.127060704288!2d-87.61670486274774!3d41.88141960480525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880e2b587c65e43b%3A0x2594a4440fff56bd!2z0KfQuNC60LDQs9C-LdCb0YPQvywg0KfQuNC60LDQs9C-LCDQmNC70LvQuNC90L7QudGBIDYwNjAxLCDQodCo0JA!5e0!3m2!1sru!2sua!4v1557226177063!5m2!1sru!2sua" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
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
