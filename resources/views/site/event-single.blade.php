@extends('layouts.site', ['pageTitle' => 'About', 'active' => 'events'])
@section('content')
        <section class="page-title fade-from-top">
            <div class="container">
                <h1 class="page-title__h fade-from-top" data-delay="100">Events</h1>
                <div class="page-title__text fade-from-top" data-delay="200">For media, event speaking engagements and award inquiries, contact <a href="mailto:events@arc.works">events@arc.works</a></div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="row align-items-start">
                    <div class="event-single-back fade-from-top">
                        <a href="/events.html" class="btn btn-primary"><i class="icomoon-left-arrow-long"></i> All Events</a>
                    </div>
                    <div class="event-single-wrap">
                        <div class="event-single">
                            <div class="event-single__box fade-from-top-children">
                                <h3 class="event-single__title">Performing a language for the messy reality of the everyday world</h3>
                                <div class="event-single__loc-date d-md-flex align-items-center">
                                    <div class="event__date date">July 24, 2020</div>
                                    <div class="event__loc location"><i class="icomoon-pin"></i> Copenhagen, Denmark</div>
                                </div>
                            </div>

                            <div class="event-single__content fade-from-top-children">
                                <p>In Tokyo, overlapping events of Hanami (viewing of the cherry blossom) and Kafunsho
                                    (hay fever) produce zones of contradiction: being under the cherry blossom and
                                    exposed to pollen—bringing to question how to negotiate the outdoor environment
                                    in order to maximize certain qualities while suppressing others, without resulting
                                    in a glass box.</p>
                                <p>The proposal is an artificial forest that emerges with the season and can be adapted
                                    to any site. By networking a field of prototypes (artificial trees) with local
                                    environmental data, sensors measure wind speed, temperature, humidity and airborne
                                    particles which in turn activate misters in an orchestrated real-time response.</p>

                                <img src="../../public/images/event_3.jpg" alt="">

                                <p>Liza López and John Doel are currently PhD candidates at Sma Lab at the University of
                                    Tokyo,
                                    where they also completed their Master’s degree. They have been awarded the
                                    Monbukagakusho
                                    scholarship.</p>

                                <p>Doel received a Bachelor of Arts and Master’s of Architecture from the European
                                    University
                                    of Madrid and Hadin a Bachelor of Arts in Architecture from UCLA. Their research
                                    currently
                                    examines the potential relationships between humans and computational tools in the
                                    fabrication process.</p>

                                <blockquote>
                                    “However, unlike the static and impermeable, air can be penetrated and manipulated,
                                    suggesting that it can also be designed.”
                                </blockquote>

                                <p>In Tokyo, overlapping events of Hanami (viewing of the cherry blossom) and Kafunsho (hay
                                fever) produce zones of contradiction: being under the cherry blossom and exposed to
                                pollen—bringing to question how to negotiate the outdoor environment in order to maximize
                                certain qualities while suppressing others, without resulting in a glass box.</p>

                                <p>The proposal is an artificial forest that emerges with the season and can be adapted to any
                                site. By networking a field of prototypes (artificial trees) with local environmental data,
                                sensors measure wind speed, temperature, humidity and airborne particles which in turn
                                activate misters in an orchestrated real-time response.</p>
                            </div>

                            <div class="event-single__box fade-from-top">
                                <div class="event-single__tags">
                                    <a href="#">projects</a>,
                                    <a href="#">CA</a>,
                                    <a href="#">careers</a>,
                                    <a href="#">architect</a>,
                                    <a href="#">landscape</a>.
                                </div>
                                <div class="social-list d-flex align-items-center">
                                    <a href="#" class="icomoon-facebook-f"></a>
                                    <a href="#" class="icomoon-twitter"></a>
                                    <a href="#" class="icomoon-linkedin"></a>
                                    <a href="#" class="icomoon-google-plus"></a>
                                    <a href="#" class="icomoon-pinterest-p"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
