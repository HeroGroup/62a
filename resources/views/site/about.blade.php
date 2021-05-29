@extends('layouts.site', ['pageTitle' => 'About', 'active' => 'about'])
@section('content')
<section class="page-title fade-from-top">
    <div class="container">
        <h1 class="page-title__h fade-from-top" data-delay="100">Meet our people</h1>
        <div class="page-title__text fade-from-top" data-delay="200">We have a passion for simplicity and sustainability, always balancing form with function and delight.</div>
    </div>
</section>

<section class="team section fade-from-top" data-delay="300">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <div class="slide-image-wrap">
                        <img src="/images/team_1.jpg" class="team-card__img" alt="Ivanka Young">
                    </div>
                    <h4 class="team-card__name">Ivanka Young</h4>
                    <div class="team-card__post">AIA Partner</div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <div class="slide-image-wrap">
                        <img src="/images/team_2.jpg" class="team-card__img" alt="Robert Hutsch">
                    </div>
                    <h4 class="team-card__name">Robert Hutsch</h4>
                    <div class="team-card__post">Chief Administrative Officer</div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <div class="slide-image-wrap">
                        <img src="/images/team_3.jpg" class="team-card__img" alt="Erica Kpale">
                    </div>
                    <h4 class="team-card__name">Erica Kpale</h4>
                    <div class="team-card__post">AIA, AICP, LEED AP </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-delay="300">
                <div class="team-card">
                    <div class="slide-image-wrap">
                        <img src="/images/team_4.jpg" class="team-card__img" alt="Mika Nekoranec">
                    </div>
                    <h4 class="team-card__name">Mika Nekoranec</h4>
                    <div class="team-card__post">AIA</div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-delay="400">
                <div class="team-card">
                    <div class="slide-image-wrap">
                        <img src="/images/team_5.jpg" class="team-card__img" alt="Adam F. Spielmann">
                    </div>
                    <h4 class="team-card__name">Adam F. Spielmann</h4>
                    <div class="team-card__post">Founding Partner</div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <div class="slide-image-wrap">
                        <img src="/images/team_1.jpg" class="team-card__img" alt="Alexander Migelsky">
                    </div>
                    <h4 class="team-card__name">Alexander Migelsky</h4>
                    <div class="team-card__post">Director of Historic Preservation</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pb-large">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-6 mb-5">
                <div class="card">
                    <img src="/images/about_1.jpg" class="card-img-top" alt="">
                    <div class="card-body">
                        <h3 class="card-title">We pride ourselves on being solution providers</h3>
                        <p class="card-text">To provide exceptional services to the insurance industry and thier clients, the property owner.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title mt-3">World's leading building design firm</h3>
                        <p class="card-text">We believe that the best design results from deep insight into the people and passions that animate each unique environment.</p>
                    </div>
                    <img src="/images/what_we_do_2.jpg" class="card-img-bottom" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-section content-bottom" style="background-image: url('/images/about_2.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 abs-box abs-box-right">
                <h3>Have any questions?</h3>
                <form class="questions-form">
                    <div class="row">
                        <div class="col-lg form-group">
                            <input type="email" class="form-control" placeholder="E-mail">
                        </div>
                        <div class="col-lg form-group">
                            <input type="text" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Message" rows="1"></textarea>
                    </div>
                    <button type="submit" class="btn btn-icon form-btn"><i class="icomoon-letter"></i> Send us a message</button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="brands">
    <div class="container">
        <div class="row align-items-center brand-list">
            <div class="brand-list__item col-md-3 col-6"><img src="/images/brand-1.png" alt=""></div>
            <div class="brand-list__item col-md-3 col-6"><img src="/images/brand-2.png" alt=""></div>
            <div class="brand-list__item col-md-3 col-6"><img src="/images/brand-3.png" alt=""></div>
            <div class="brand-list__item col-md-3 col-6"><img src="/images/brand-4.png" alt=""></div>
            <div class="brand-list__item col-md-3 col-6"><img src="/images/brand-5.png" alt=""></div>
            <div class="brand-list__item col-md-3 col-6"><img src="/images/brand-6.png" alt=""></div>
            <div class="brand-list__item col-md-3 col-6"><img src="/images/brand-7.png" alt=""></div>
            <div class="brand-list__item col-md-3 col-6"><img src="/images/brand-8.png" alt=""></div>
        </div>
    </div>
</section>
@endsection
