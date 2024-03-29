@extends('layouts.site', ['pageTitle' => session('lang')=='hy'?'Մեր մասին':'About', 'active' => 'about'])
@section('content')
    <section class="page-title fade-from-top">
        <div class="container">
            <h1 class="page-title__h fade-from-top" data-delay="100">{{session('lang') == 'hy' ? $haveAnyQuestions->title_hy : $haveAnyQuestions->title_en}}</h1>
            <div class="page-title__text fade-from-top" data-delay="200">
                <?php echo session('lang') == 'hy' ? '<p>'.str_replace("\n","</p><p>",$haveAnyQuestions->description_hy).'</p>' : '<p>'.str_replace("\n","</p><p>",$haveAnyQuestions->description_en).'</p>' ?>
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
                            <img src="{{$member->photo_url ? str_replace(' ','%20',$member->photo_url) : '/images/member_default.png'}}" class="team-card__img" alt="{{$member->name_en}}">
                        </div>
                        <h4 class="team-card__name">{{session('lang') == 'hy' ? $member->name_hy : $member->name_en}}</h4>
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
            @if(isset($items[$i]))
                <div class="col-lg-6 mb-5">
                    <div class="card">
                        <img src="{{str_replace(' ','%20',$items[$i]->photo_url)}}" alt="{{$items[$i]->title_en}}" class="card-img-top">
                        <div class="card-body">
                            <h3 class="card-title">{{session('lang') == 'hy' ? $items[$i]->title_hy : $items[$i]->title_en}}</h3>
                            <p class="card-text">{{session('lang') == 'hy' ? $items[$i]->description_hy : $items[$i]->description_en}}</p>
                        </div>
                    </div>
                </div>
            @endif
            @if(isset($items[$i+1]))
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title mt-3">{{session('lang') == 'hy' ? $items[$i+1]->title_hy : $items[$i+1]->title_en}}</h3>
                            <p class="card-text">{{session('lang') == 'hy' ? $items[$i+1]->description_hy : $items[$i+1]->description_en}}</p>
                        </div>
                        <img src="{{str_replace(' ','%20',$items[$i+1]->photo_url)}}" class="card-img-bottom" alt="{{$items[$i+1]->title_en}}">
                    </div>
                </div>
            @endif
            </div>
        @endfor
        </div>
    </section>

    <section class="bg-section content-bottom" style="background-image: url({{str_replace(' ','%20',$haveAnyQuestions->photo_url)}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 abs-box abs-box-right">
                    <h3>{{session('lang') == 'hy' ? 'Հարցեր ունե՞ք:' : 'Have any questions?'}}</h3>
                    <form class="questions-form" method="post" action="{{route('site.contactUs.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-lg form-group">
                                <input type="email" name="email" class="form-control" placeholder="{{session('lang')=='hy'?'էլ. հասցե':'E-mail'}}" required>
                            </div>
                            <div class="col-lg form-group">
                                <input type="text" name="name" class="form-control" placeholder="{{session('lang')=='hy'?'Անուն':'Name'}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" placeholder="{{session('lang')=='hy'?'Հաղորդագրություն':'Message'}}" rows="1" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-icon form-btn">
                            <i class="icomoon-letter"></i> {{session('lang') == 'hy' ? 'Ուղարկեք մեզ հաղորդագրություն' : 'Send us a message'}}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @component('components.brands', ['brands' => $brands])@endcomponent
@endsection
