@extends('layouts.site', ['pageTitle' => 'Career', 'active' => 'career'])
@section('content')
    <section class="page-title fade-from-top">
        <div class="container">
            <h1 class="page-title__h fade-from-top" data-delay="100">Contacts</h1>
            <div class="page-title__text fade-from-top" data-delay="200">Got a project? Please email us at <br><a href="#">hello@arc.works</a></div>
        </div>
    </section>

    <section class="section contact-offices">
        <div class="container">
            <div class="row fade-from-top-children">
                <div class="col-lg-3">
                    <h3 class="font-weight-normal section-text-offset  mb-4">Main Offices</h3>
                </div>
                <div class="col-lg-3">
                    <div class="address">
                        <h4 class="address__title section-text-offset">San Francisco</h4>
                        <div class="address__text">
                            <p>212 Wilshire Blvd. Suite 1245 San Francisco, California CA 90015</p>
                            <p>987.654.3210</p>
                        </div>
                        <a href="#" class="btn btn-link" data-toggle="modal" data-target="#office-map-modal-1">Get Directions</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="slide-image-wrap">
                        <img src="../../public/images/contact_1.jpg" class="slide-image-left event__thumb w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section contact-sales fade-from-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <h3 class="font-weight-normal mb-5">Sales</h3>
                </div>
                <div class="col-lg-3">
                    <div class="address">
                        <h4 class="address__title">Chicago</h4>
                        <div class="address__text">
                            <p>4054 Sorrento Valley Blvd, Suite 10 San Diego, CA 92000</p>
                            <p>987.654.3210</p>
                        </div>
                        <a href="#" class="btn btn-link" data-toggle="modal" data-target="#office-map-modal-2">Get Directions</a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="address">
                        <h4 class="address__title">Los Angeles</h4>
                        <div class="address__text">
                            <p>212 Wilshire Blvd. Suite 1245 San Francisco, California CA 90015</p>
                            <p>987.654.3210</p>
                        </div>
                        <a href="#" class="btn btn-link" data-toggle="modal" data-target="#office-map-modal-3">Get Directions</a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="address">
                        <h4 class="address__title">San Diego</h4>
                        <div class="address__text">
                            <p>4054 Sorrento Valley Blvd, Suite 10 San Diego, CA 92000</p>
                            <p>987.654.3210</p>
                        </div>
                        <a href="#" class="btn btn-link" data-toggle="modal" data-target="#office-map-modal-4">Get Directions</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-form bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <h3 class="font-weight-normal">Have any questions?</h3>
                    <form class="questions-form">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Message" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-icon form-btn"><i class="icomoon-letter"></i> Send us a message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <!-- MAP MODAL -->
    <div class="office-map-modal modal fade" id="office-map-modal-1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">San Francisco</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11882.127060704288!2d-87.61670486274774!3d41.88141960480525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880e2b587c65e43b%3A0x2594a4440fff56bd!2z0KfQuNC60LDQs9C-LdCb0YPQvywg0KfQuNC60LDQs9C-LCDQmNC70LvQuNC90L7QudGBIDYwNjAxLCDQodCo0JA!5e0!3m2!1sru!2sua!4v1557226177063!5m2!1sru!2sua" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- MAP MODAL -->
    <div class="office-map-modal modal fade" id="office-map-modal-2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chicago</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11882.127060704288!2d-87.61670486274774!3d41.88141960480525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880e2b587c65e43b%3A0x2594a4440fff56bd!2z0KfQuNC60LDQs9C-LdCb0YPQvywg0KfQuNC60LDQs9C-LCDQmNC70LvQuNC90L7QudGBIDYwNjAxLCDQodCo0JA!5e0!3m2!1sru!2sua!4v1557226177063!5m2!1sru!2sua" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- MAP MODAL -->
    <div class="office-map-modal modal fade" id="office-map-modal-3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Los Angeles</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11882.127060704288!2d-87.61670486274774!3d41.88141960480525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880e2b587c65e43b%3A0x2594a4440fff56bd!2z0KfQuNC60LDQs9C-LdCb0YPQvywg0KfQuNC60LDQs9C-LCDQmNC70LvQuNC90L7QudGBIDYwNjAxLCDQodCo0JA!5e0!3m2!1sru!2sua!4v1557226177063!5m2!1sru!2sua" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- MAP MODAL -->
    <div class="office-map-modal modal fade" id="office-map-modal-4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">San Diego</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11882.127060704288!2d-87.61670486274774!3d41.88141960480525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880e2b587c65e43b%3A0x2594a4440fff56bd!2z0KfQuNC60LDQs9C-LdCb0YPQvywg0KfQuNC60LDQs9C-LCDQmNC70LvQuNC90L7QudGBIDYwNjAxLCDQodCo0JA!5e0!3m2!1sru!2sua!4v1557226177063!5m2!1sru!2sua" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

@endsection
