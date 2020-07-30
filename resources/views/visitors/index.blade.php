@extends('visitors.layout.app')

@section('title', 'Home')

@section('content')

    <x-index-hero/>

    <section class="ftco-section ftco-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 py-5">
                    <div class="heading-section ftco-animate">
                        <span class="subheading">Services</span>
                        <h2 class="mb-4">Why choose us?</h2>
                        <p>
                            We organize for trade missions, business conferences
                            and forums through B2B, B2C, B2G and G2G respectively,
                            both with local and global partners.
                        </p>
                        <p><a href="#linktotop" class="btn btn-primary py-3 px-4">Free Consultation</a></p>
                    </div>
                </div>
                <div class="col-lg-9 services-wrap px-4 pt-5">
                    <div class="row pt-md-3">
                        <div class="col-md-4 d-flex align-items-stretch">
                            <div class="services text-center">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="flaticon-employee"></span>
                                </div>
                                <div class="text">
                                    <h3>Investor Missions</h3>
                                    <p>We conduct missions to ensure that our investors are aware of the best business
                                        prospects.</p>
                                </div>
                                <!-- <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a> -->
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-items-stretch">
                            <div class="services text-center">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="flaticon-handshake"></span>
                                </div>
                                <div class="text">
                                    <h3>Business Support</h3>
                                    <p>We provide a platform for businesses to gain access to big investment and venture
                                        capital.</p>
                                </div>
                                <!-- <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a> -->
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-items-stretch">
                            <div class="services text-center">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="flaticon-handshake"></span>
                                </div>
                                <div class="text">
                                    <h3>Expert Consultancy</h3>
                                    <p>We give access to consulting from seasoned professionals for investors.</p>
                                </div>
                                <!-- <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt">
        <div class="container-fluid px-md-5">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Our Team</span>
                    <h2 class="mb-4">Our Expert Team</h2>
                </div>
            </div>
            <div class="row">
                <x-staff-card :image="asset('storage/images/person_1.jpg')"
                              name="Rebecca Kim" occupation="Director">
                    With experience of over 10 years in expert investment, Ms.
                    Rebecca Kimeto is the director and Chief Executive Officer
                    of CederLinks Investment Ltd.
                </x-staff-card>
                <x-staff-card :image="asset('storage/images/person_4.jpg')"
                              name="Jared Kimetto" occupation="Director/Co-founder">
                    Mr. Jared Kimetto is the second company director at Ceder Links.
                    With experience in business management he has the qualifications
                    for directing company operations.
                </x-staff-card>
                <x-staff-card :image="asset('storage/images/person_3.jpg')"
                              name="Ercan Engin" occupation="Chairman">
                    Mr.Ercan Engin is the company's chairman and is in charge of
                    operations and board decisions. He has 15 years experience in
                    company management.
                </x-staff-card>
            </div>
        </div>
    </section>


    <a name="linktotop"></a>
    <section class="ftco-consultation ftco-section ftco-no-pt ftco-no-pb img lazy"
             data-bg="{{ asset('storage/images/bg_2.jpg') }}">
        <div class="overlay"></div>
        <div class="container">
            <div class="row d-md-flex justify-content-end">
                <div class="col-md-6 half p-3 py-5 pl-md-5 ftco-animate heading-section heading-section-white">
                    <span class="subheading">Booking an Appointment</span>
                    <h2 class="mb-4">Free Consultation</h2>
                    <form action="#" class="consultation">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject">
                        </div>
                        <div class="form-group">
                        <textarea name="" id="" cols="30" rows="7" class="form-control"
                                  placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send message" class="btn btn-dark py-3 px-4">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Events</span>
                    <h2>Our Upcoming Events</h2>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col">
                    <div class="carousel-missions owl-carousel ftco-owl">
                        @foreach ($missions as $mission)
                            <x-upcoming-event-card :mission="$mission"></x-upcoming-event-card>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section ftco-no-pt ftco-no-pb bg-light">
        <div class="container">
            <div class="row d-flex justify-content-end">
                <div class="col-md-8 py-4 px-md-4 bg-primary">
                    <div class="row">
                        <div class="col-md-6 ftco-animate d-flex align-items-center">
                            <h2 class="mb-0" style="color:white; font-size: 24px;">Subcribe to our Newsletter</h2>
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <form action="#" class="subscribe-form">
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control" placeholder="Enter email address">
                                    <input type="submit" value="Subscribe" class="submit px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
