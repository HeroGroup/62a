@extends('layouts.site', ['pageTitle' => 'Career', 'active' => 'career'])
@section('content')
    <section class="page-title fade-from-top">
        <div class="container">
            <h1 class="page-title__h fade-from-top" data-delay="100">{{session('lang') == 'hy' ? 'Job openings' : 'Job openings'}}</h1>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="accordion fade-from-top-children " id="job-accordion">
                @if($careers->count()>0)
                @foreach($careers as $career)
                    <div class="card job-item">
                        <div class="card-header" id="heading-job-1">
                            <a href="#" data-toggle="collapse" data-target="#job-tab-{{$career->id}}" aria-expanded="true" aria-controls="job-tab-{{$career->id}}">
                                <h3 class="job-item__title">{{session('lang') == 'hy' ? $career->job_title_hy : $career->job_title_en}}</h3>
                                <div class="job-item__meta d-md-flex align-items-center">
                                    <div class="job-item__loc location mr-lg-4"><i class="icomoon-pin"></i> {{session('lang') == 'hy' ? $career->location_hy : $career->location_en}}</div>
                                    <!--<div class="job-item__date date">Posted 3 days ago</div>-->
                                </div>
                            </a>
                        </div>
                        <div id="job-tab-{{$career->id}}" class="collapse show" aria-labelledby="heading-job-1" data-parent="#job-accordion">
                            <div class="card-body">
                                <div class="job-item__content">
                                    <table class="job-table">
                                        <tr>
                                            <th>{{session('lang') == 'hy' ? 'Job description' : 'Job description'}}</th>
                                            <td>{{session('lang') == 'hy' ? $career->job_description_hy : $career->job_description_en}}</td>
                                        </tr>
                                        <tr>
                                            <th>{{session('lang') == 'hy' ? 'Your skills' : 'Your skills'}}</th>
                                            <td>
                                                <ul>
                                                    @foreach(\Illuminate\Support\Facades\DB::table('career_items')->where('career_id',$career->id)->get() as $item)
                                                    <li>{{session('lang') == 'hy' ? $item->item_description_hy : $item->item_description_en}}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td>
                                                <button class="btn btn-primary" onclick="openModal('{{$career->id}}','{{$career->job_title_en}}')">{{session('lang') == 'hy' ? 'Apply for this position' : 'Apply for this position'}}</button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                <h4 style="color:gray;">{{session('lang') == 'hy' ? 'Unfortunately there are no job openings right now!' : 'Unfortunately there are no job openings right now!'}}</h4>
                @endif
            </div>
        </div>
    </section>

    <section class="brands bg-light">
        <div class="container">
            <div class="row align-items-center brand-list">
                <div class="brand-list__item col-lg-4 col-md-4 col-sm-4"><img src="/images/brand-1.png" alt="brand-1"></div>
                <div class="brand-list__item col-lg-4 col-md-4 col-sm-4"><img src="/images/brand-2.png" alt="brand-2"></div>
                <div class="brand-list__item col-lg-4 col-md-4 col-sm-4"><img src="/images/brand-3.png" alt="brand-3"></div>
                <div class="brand-list__item col-lg-4 col-md-4 col-sm-4"><img src="/images/brand-4.png" alt="brand-4"></div>
                <div class="brand-list__item col-lg-4 col-md-4 col-sm-4"><img src="/images/brand-5.png" alt="brand-5"></div>
                <div class="brand-list__item col-lg-4 col-md-4 col-sm-4"><img src="/images/brand-6.png" alt="brand-6"></div>
                <div class="brand-list__item col-lg-4 col-md-4 col-sm-4"><img src="/images/brand-7.png" alt="brand-7"></div>
                <div class="brand-list__item col-lg-4 col-sm-4 col-sm-4"><img src="/images/brand-8.png" alt="brand-8"></div>
            </div>
        </div>
    </section>

    <!-- APPLY MODAL -->
    <div class="apply-modal modal fade" id="apply-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Apply for <b id="career-title"></b> position</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                {!! Form::open(array('url' => route('site.careers.request'), 'method' => 'POST', 'files' => 'true')) !!}
                        @csrf
                        <input type="hidden" name="career_id" id="career_id" />

                        <div class="form-group">
                            <input type="text" name="name" placeholder="Enter your full name" class="form-control" style="color:#666;" required />
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Enter your email address" class="form-control" style="color:#666;" required />
                        </div>
                        <div class="form-group">
                            <input type="text" name="mobile" placeholder="Enter your mobile number" class="form-control" style="color:#666;" required />
                        </div>
                        <div class="form-group">
                            <label for="cv">{{session('lang') == 'hy' ? 'Upload your resume' : 'Upload your resume'}}</label>
                            <input type="file" name="cv" id="cv" />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{session('lang') == 'hy' ? 'Apply' : 'Apply'}}</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <script>
        function openModal(careerId, careerTitle) {
            $("#career-title").text(careerTitle);
            $("#career_id").val(careerId);
            $("#apply-modal").modal();
        }
    </script>
@endsection
