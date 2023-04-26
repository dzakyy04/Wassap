@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endpush
@section('content')
    <section id="team" class="team section-bg">
        <div class="container">

            <div class="section-title">
                <h2>Team Kami</h2>
                <div class="underline"></div>
                <p>Team pengerjaan website Wassap</p>
            </div>

            <div class="row justify-content-center">

                <div class="col-lg-6">
                    <div class="member d-flex align-items-start">
                        <div class="teampic"><img src="{{ asset('img/our-team/dzaky.jpg') }}" class="img-fluid"
                                alt=""></div>
                        <div class="member-info">
                            <h4>Dewa Sheva Dzaky</h4>
                            <span>09021182126005</span>

                            <p>Barudak Musi Rawas</p>
                            <div class="social">
                                <a href="https://www.instagram.com/dzaa.kyyy/"><i class="bi bi-instagram"></i></a>
                                <a href="https://www.linkedin.com/in/dewa-sheva-dzaky/"><i class="bi bi-linkedin"></i></a>
                                <a href="https://wa.me/6282269324126"> <i class="bi bi-whatsapp"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="member d-flex align-items-start">
                        <div class="teampic"><img src="{{ asset('img/our-team/indra.jpg') }}" class="img-fluid"
                                alt=""></div>
                        <div class="member-info">
                            <h4>Indra Juliansyah Putra</h4>
                            <span>09021182126016</span>

                            <p>Barudak Empat Lawang</p>
                            <div class="social">
                                <a href="https://www.instagram.com/abdi_ijul/"><i class="bi bi-instagram"></i></a>
                                <a href="https://www.linkedin.com/in/indra-juliansyah-putra/"><i class="bi bi-linkedin"></i></a>
                                <a href="https://wa.me/6281273415726"> <i class="bi bi-whatsapp"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mt-4">
                    <div class="member d-flex align-items-start">
                        <div class="teampic"><img src="{{ asset('img/our-team/nadia.jpg') }}" class="img-fluid"
                                alt=""></div>
                        <div class="member-info">
                            <h4>Nadia Laras</h4>
                            <span>09021182126019</span>

                            <p>Barudak Kertapati</p>
                            <div class="social">
                                <a href="https://www.instagram.com/nadialaraz/"><i class="bi bi-instagram"></i></a>
                                <a href="https://www.linkedin.com/in/nadia-laras-89762a221/"><i class="bi bi-linkedin"></i></a>
                                <a href="https://wa.me/6289531718950"> <i class="bi bi-whatsapp"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mt-4">
                    <div class="member d-flex align-items-start">
                        <div class="teampic"><img src="{{ asset('img/our-team/adit.jpg') }}" class="img-fluid"
                                alt=""></div>
                        <div class="member-info">
                            <h4>Aditya Kurniawan</h4>
                            <span>09021182126028</span>

                            <p>Barudak Layoh</p>
                            <div class="social">
                                <a href="https://www.instagram.com/aditiya.kurniawan8/"><i class="bi bi-instagram"></i></a>
                                <a href="#"><i class="bi bi-linkedin"></i></a>
                                <a href="https://wa.me/6282179420379"> <i class="bi bi-whatsapp"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mt-4">
                    <div class="member d-flex align-items-start">
                        <div class="teampic"><img src="{{ asset('img/our-team/bima.jpg') }}" class="img-fluid"
                                alt=""></div>
                        <div class="member-info">
                            <h4>Bima Aryadinata</h4>
                            <span>09021282126035</span>

                            <p>Barudak Bangka</p>
                            <div class="social">
                                <a href="https://www.instagram.com/bima__a/"><i class="bi bi-instagram"></i></a>
                                <a href="https://www.linkedin.com/in/bima-aryadinata-43a392224/"><i class="bi bi-linkedin"></i></a>
                                <a href="https://wa.me/6282371416026"> <i class="bi bi-whatsapp"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Team Section -->
@endsection
