@extends('layouts.site', ['pageTitle' => 'Contact', 'active' => 'contact'])
@section('content')
    <section class="page-title fade-from-top">
        <div class="container">
            <h1 class="page-title__h fade-from-top" data-delay="100">{{session('lang') == 'hy' ? 'Contacts' : 'Contacts'}}</h1>
            <div class="page-title__text fade-from-top" data-delay="200">
                {{session('lang') == 'hy' ? 'Got a project? Please email us at' : 'Got a project? Please email us at'}} <br>
                <a href="mailto:{{$office->email_address}}">{{$office->email_address}}</a>
            </div>
        </div>
    </section>

    <section class="section contact-offices">
        <div class="container">
            <div class="row fade-from-top-children">
                <div class="col-lg-3">
                    <h3 class="font-weight-normal section-text-offset  mb-4">{{session('lang') == 'hy' ? $office->title_hy : $office->title_en}}</h3>
                </div>
                <div class="col-lg-3">
                    <div class="address">
                        <h4 class="address__title section-text-offset">{{session('lang') == 'hy' ? $office->city_hy : $office->city_en}}</h4>
                        <div class="address__text">
                            <p>{{session('lang') == 'hy' ? $office->address_hy : $office->address_en}}</p>
                            <p>{{$office->phone}}</p>
                            <p>{{$office->mobile}}</p>
                        </div>
                        <a href="#" class="btn btn-link" data-toggle="modal" data-target="#office-map-modal-1">{{session('lang') == 'hy' ? 'Get Directions' : 'Get Directions'}}</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="slide-image-wrap">
                        <img src="{{$office->photo_url}}" alt="{{$office->title_en}} photo" class="slide-image-left event__thumb w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-form bg-light" style="z-index:2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <h3 class="font-weight-normal">{{session('lang') == 'hy' ? 'Have any questions?' : 'Have any questions?'}}</h3>
                    <form class="questions-form" method="post" action="{{route('site.contactUs.store')}}">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="E-mail" style="color:#333;" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Name" style="color:#333;" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" placeholder="Message" rows="3" style="color:#333;" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-icon form-btn">
                            <i class="icomoon-letter"></i> {{session('lang') == 'hy' ? 'Send us a message' : 'Send us a message'}}
                        </button>
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
                    <h5 class="modal-title">{{session('lang') == 'hy' ? $office->city_hy : $office->city_en}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @component('components.locationOnMap')@endcomponent
                </div>
            </div>
        </div>
    </div>

@endsection
