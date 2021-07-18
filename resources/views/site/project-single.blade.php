@extends('layouts.site', ['pageTitle' => session('lang')=='hy'?'Նախագծեր':'Project', 'active' => 'projects'])
@section('content')

        <section class="page-title fade-from-top">
            <div class="container">
                <h1 class="page-title__h fade-from-top">{{session('lang') == 'hy' ? $project->title_hy : $project->title_en}}</h1>
            </div>
        </section>

        <section class="project-single">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <h2 class="project-single__content-title fade-from-top" data-delay="100">{{session('lang') == 'hy' ? 'Նախագծի նկարագրություն' : 'Project description'}}</h2>
                        <div class="project-single__content fade-from-top" data-delay="200">
                            {{session('lang') == 'hy' ? $project->description_hy : $project->description_en}}
                        </div>
                    </div>
                    <div class="col-lg-5 fade-from-top" data-delay="300">
                        <div class="project-single__table">
                            <table>
                                @if($project->location_hy || $project->location_en)
                                <tr>
                                    <th>Location</th>
                                    <td>{{session('lang') == 'hy' ? $project->location_hy : $project->location_en}}</td>
                                </tr>
                                @endif
                                @if($project->type_hy || $project->type_en)
                                <tr>
                                    <th>Type</th>
                                    <td>{{session('lang') == 'hy' ? $project->type_hy : $project->type_en}}</td>
                                </tr>
                                @endif
                                @if($project->year)
                                <tr>
                                    <th>Year</th>
                                    <td>{{$project->year}}</td>
                                </tr>
                                @endif
                                @if($project->size_hy || $project->size_en)
                                <tr>
                                    <th>Size</th>
                                    <td>{{session('lang') == 'hy' ? $project->size_hy : $project->size_en}}</td>
                                </tr>
                                @endif
                                @if($project->budget_hy || $project->budget_en)
                                <tr>
                                    <th>Budget</th>
                                    <td>{{session('lang') == 'hy' ? $project->budget_hy : $project->budget_en}}</td>
                                </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
                <div class="project-single__gallery js-gallery fade-from-top-children">
                @foreach($photos as $photo)
                    <a class="grid-item" href="{{$photo->photo_url}}">
                        <div class="slide-image-wrap">
                            <img src="{{$photo->photo_url}}" alt="{{$project->title_en}}" loading="lazy">
                        </div>
                    </a>
                @endforeach
                </div>
            </div>
        </section>

        <section class="project-nav">
            <div class="container">
                <div class="section-title d-flex flex-wrap align-items-center ">
                    <h2 class="mb-3 mr-4">{{session('lang') == 'hy' ? 'Նախագծեր' : 'Projects'}}</h2>
                    <a href="{{route('site.projects')}}" class="btn btn-primary mb-3">
                        {{session('lang') == 'hy' ? 'Բոլոր նախագծեր' : 'All projects'}} <i class="icomoon-right-arrow-long"></i>
                    </a>
                </div>
                <div class="row">
                @foreach($projects as $project)
                    <div class="col-6 project-item">
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
@endsection
