@extends('layouts.site', ['pageTitle' => session('lang')=='hy'?'Նախագծեր':'Projects', 'active' => 'projects'])
@section('content')
    <section class="page-title projects-title fade-from-top">
        <div class="container">
            <h1 class="page-title__h fade-from-top" data-delay="100">{{session('lang')=='hy'?'Նախագծեր':'Projects'}}</h1>
            <div class="page-title__text fade-from-top" data-delay="200">
                {{session('lang')=='hy' ? $top->description_hy : $top->description_en}}
            </div>
        </div>
    </section>

    <section class="projects">
        <div class="container">
            <div class="project-filter js-project-filter fade-from-top" data-delay="300">
                <button class="project-filter__btn active" data-filter="*">
                    {{session('lang') == 'hy' ? 'Բոլոր նախագծերը' : 'All Projects'}}
                    <span class="count">{{$totalProjects}}</span>
                </button>
                @foreach($categories as $category)
                    <button class="project-filter__btn" data-filter=".{{$category->id}}">{{session('lang') == 'hy' ? $category->title_hy : $category->title_en}}<span class="count">{{$category->cnt}}</span></button>
                @endforeach
            </div>
            <div class="row project-list js-project-list fade-from-top-children">
                @foreach($projects as $project)
                    <?php $res = "";
                    $cats = \Illuminate\Support\Facades\DB::table('project_categories')->where('project_id',$project->id)->get();
                    foreach($cats as $cat) {
                        $res .= (" " . $cat->category_id);
                    } ?>
                    <div class="col-md-6 project-item {{$res}}">
                        <div class="slide-image-wrap">
                            <a href="{{route('site.project',$project->id)}}" class="project-item__img-link">
                                <img src="{{$project->photo_url}}" alt="{{$project->title_en}}" class="project-item__img">
                            </a>
                        </div>
                        <h4 class="project-item__title">
                            <a href="project-single.html">{{session('lang') == 'hy' ? $project->title_hy : $project->title_en}}</a>
                        </h4>
                        <div class="project-item__loc">{{session('lang') == 'hy' ? $project->location_hy : $project->location_en}}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @if(isset($bottom) && $bottom)
    <section class="projects-contacts position-relative ">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 projects-contacts__img image-full">
                    <div class="image-full-box"><img src="{{$bottom->image_url}}" alt="{{$bottom->title_en}}"></div>
                </div>
                <div class="col-lg-7 projects-contacts__text abs-box abs-box-right" data-delay="200">
                    <h2>{{session('lang') == 'hy' ? $bottom->title_hy : $bottom->title_en}}</h2>
                    <p>{{session('lang') == 'hy' ? $bottom->description_hy : $bottom->description_en}}</p>
                    <a href="{{route('site.contact')}}" class="btn btn-icon hero-btn">
                        <i class="icomoon-right-arrow"></i> {{session('lang') == 'hy' ? 'Կապվեք մեզ հետ' : 'Contact Us'}}
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endif

    @component('components.brands', ['brands' => $brands])@endcomponent

@endsection
