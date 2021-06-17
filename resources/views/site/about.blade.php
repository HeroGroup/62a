@extends('layouts.site', ['pageTitle' => 'About', 'active' => 'about'])
@section('content')
<section class="page-title fade-from-top">
    <div class="container">
        <h1 class="page-title__h fade-from-top" data-delay="100">{{session('lang') == 'hy' ? 'Meet our people' : 'Meet our people'}}</h1>
        <div class="page-title__text fade-from-top" data-delay="200">
            {{session('lang') == 'hy' ? 'MWe have a passion for simplicity and sustainability, always balancing form with function and delight.' : 'We have a passion for simplicity and sustainability, always balancing form with function and delight.'}}
        </div>
    </div>
</section>

<section class="team section fade-from-top" data-delay="300">
    <div class="container">
        <div class="row">
        @foreach($members as $member)
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <div class="slide-image-wrap">
                        <img src="{{$member->photo_url}}" class="team-card__img" alt="Ivanka Young">
                    </div>
                    <h4 class="team-card__name">{{$member->name}}</h4>
                    <div class="team-card__post">{{session('lang') == 'hy' ? $member->position_hy : $member->position_en}}</div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>

<section class="pb-large">
    <div class="container">
    @for($i=0;$i<count($items);$i+=2)
        <div class="row justify-content-between">
        @if($item[$i])
            <div class="col-lg-6 mb-5">
                <div class="card">
                    <img src="{{$item[$i]->photo_url}}" alt="{{$item[$i]->title_en}}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h3 class="card-title">{{session('lang') == 'hy' ? $item[$i]->title_hy : $item[$i]->title_en}}</h3>
                        <p class="card-text">{{session('lang') == 'hy' ? $item[$i]->description_hy : $item[$i]->description_en}}</p>
                    </div>
                </div>
            </div>
        @endif
        @if($item[$i+1])
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title mt-3">{{session('lang') == 'hy' ? $item[$i+1]->title_hy : $item[$i+1]->title_en}}</h3>
                        <p class="card-text">{{session('lang') == 'hy' ? $item[$i+1]->description_hy : $item[$i+1]->description_en}}</p>
                    </div>
                    <img src="{{$item[$i+1]->photo_url}}" class="card-img-bottom" alt="{{$item[$i+1]->title_en}}">
                </div>
            </div>
        @endif
        </div>
    @endfor
    </div>
</section>

<section class="bg-section content-bottom" style="background-image: url('/images/about_2.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 abs-box abs-box-right">
                <h3>{{session('lang') == 'hy' ? 'Have any questions?' : 'Have any questions?'}}</h3>
                <form class="questions-form" method="post" action="{{route('site.contactUs.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-lg form-group">
                            <input type="email" name="email" class="form-control" placeholder="E-mail">
                        </div>
                        <div class="col-lg form-group">
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" placeholder="Message" rows="1"></textarea>
                    </div>
                    <button type="submit" class="btn btn-icon form-btn">
                        <i class="icomoon-letter"></i> {{session('lang') == 'hy' ? 'Send us a message' : 'Send us a message'}}
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
