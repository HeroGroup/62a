@extends('layouts.site', ['pageTitle' => session('lang')=='hy' ? 'Գլխավոր էջ' : 'HOME', 'active' => 'index'])
@section('content')

        <section class="hero" data-bgColorStart="204, 179, 157" data-bgColorEnd="209, 209, 209">
            <div class="hero-slider d-flex flex-column">
                <div class="js-hero-slider">
                @foreach($banners as $banner)
                    <div class="hero-slide" style="background-image: url('{{$banner->image_url}}')">
                        <div class="container hero-slide-inner full-height">
                            <h1 class="hero-title">{{session('lang') == 'hy' ? $banner->title_hy : $banner->title_en}}</h1>
                            <div class="hero-text">{{session('lang') == 'hy' ? $banner->description_hy : $banner->description_en}}</div>
                            <div class="hero-author">{{session('lang') == 'hy' ? $banner->location_hy : $banner->location_en}}</div>
                        </div>
                    </div>
                @endforeach
                </div>
                <div class="mt-auto slick-count js-slick-count"></div>
            </div>
        </section>

        @if(isset($top) && $top)
        <section class="home-figure">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 home-figure__img">
                        <div class="fade-from-top"><!--slide-image-wrap-->
                            <figure class="figure"><!--slide-image-left-->
                                <img class="figure-img" src="{{$top->image_url ?? '/images/blank.jpg'}}" alt="{{$top->image_title_en}}">
                                <figcaption class="figure-caption">{{session('lang') == 'hy' ? $top->image_title_hy : $top->image_title_en}}</figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-7 home-figure__text abs-box abs-box-right fade-from-top">
                        <h3 class="abs-box__title">{{session('lang') == 'hy' ? $top->title_hy : $top->title_en}}</h3>
                        <div class="abs-box__text">
                            {{session('lang') == 'hy' ? $top->description_hy : $top->description_en}}
                        </div>
                        <a href="{{route('site.contact')}}" class="btn btn-icon hero-btn">
                            <i class="icomoon-right-arrow"></i> {{session('lang') == 'hy' ? 'Աշխատեք մեզ հետ' : 'Work With Us'}}
                        </a>
                    </div>
                </div>
            </div>
        </section>
        @endif

        <section class="home-projects" style="margin-bottom:300px;">
            <div class="container">
                <div class="section-title d-md-flex align-items-center">
                    <h2 class="mb-md-0 mb-4 mr-md-4">{{session('lang') == 'hy' ? 'Նախագծեր' : 'Projects'}}</h2>
                    <a href="{{route('site.projects')}}" class="btn btn-primary">
                        {{session('lang') == 'hy' ? 'Բոլոր նախագծեր' : 'All Projects'}}
                        <i class="icomoon-right-arrow-long"></i>
                    </a>
                </div>

                <div class="row project-list">
                @foreach($projects as $project)
                    <div class="col-md-6 project-item">
                        <div class="slide-image-wrap">
                            <a href="{{route('site.project',$project->id)}}" class="project-item__img-link">
                                <img src="{{\Illuminate\Support\Facades\DB::table('project_photos')->where('project_id',$project->id)->where('is_cover',1)->first() ? \Illuminate\Support\Facades\DB::table('project_photos')->where('project_id',$project->id)->where('is_cover',1)->first()->photo_url : (\Illuminate\Support\Facades\DB::table('project_photos')->where('project_id',$project->id)->first() ? \Illuminate\Support\Facades\DB::table('project_photos')->where('project_id',$project->id)->first()->photo_url : '/images/blank.jpg')}}" alt="{{$project->title_en}}" class="project-item__img">
                            </a>
                        </div>
                        <h4 class="project-item__title">
                            <a href="{{route('site.project',$project->id)}}">{{session('lang') == 'hy' ? $project->title_hy : $project->title_en}}</a>
                        </h4>
                        <div class="project-item__loc">{{session('lang') == 'hy' ? $project->location_hy : $project->location_en}}</div>
                    </div>
                @endforeach
                </div>
            </div>
        </section>

        @if(isset($bottom) && $bottom)
        <section class="bg-section content-bottom home-bg" style="background-image: url('{{$bottom->image_url ?? '/images/blank.jpg'}}')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 abs-box">
                        <h3 class="abs-box__title">{{session('lang') == 'hy' ? $bottom->title_hy : $bottom->title_en}}</h3>
                        <div class="abs-box__text">
                            {{session('lang') == 'hy' ? $bottom->description_hy : $bottom->description_en}}
                        </div>
                        <a href="{{route('site.about')}}" class="btn btn-icon hero-btn">
                            <i class="icomoon-right-arrow"></i> {{session('lang') == 'hy' ? 'Հանդիպեք թիմին' : 'Meet The Team'}}
                        </a>
                    </div>
                </div>
            </div>
        </section>
        @endif
@endsection
