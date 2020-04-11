@extends('visitors.layout.app')

@section('title', 'About')

@section('content')
<x-hero :bg-image="asset('storage/images/bg_1.jpg')" page-name="About Us"/>

<section class="ftco-consultation ftco-section ftco-no-pt ftco-no-pb img" style="background-image: url('{{ asset('storage/images/bg_27.jpg') }}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row d-md-flex justify-content-end">
            <div class="col-md-6 half p-3 py-5 pl-md-5 ftco-animate heading-section heading-section-white">
                <span class="subheading">Who are we?</span>
                <h2 class="mb-4">About Us</h2>
                <p>CederLinks is a Nairobi based investment company that provides a platform for investors to meet business people and increase their investment portfolio.</p>
                <p>We capitalize on the niche of a higher demand for diversified investment options for businesses, families and individuals and focus to cater to this need.</p>
                <p>For investors, we simplify the process of identifying the best and most profitable options for investments. This leads to higher return rates and better decision making skills.</p>
                <p>For business people, we provide options for geting further investments into their businesses in order to grow and mature their businesses and the economy at large. </p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section testimony-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Testimonials</span>
                <h2 class="mb-4">Happy Clients</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel ftco-owl">
                    <x-testimonial-card
                        :image="asset('storage/images/person_5.jpg')"
                        name="John Karanja" position="Director">
                        I am impressed by this work and I would like to convey my gratitude and thanks.
                        I now have very diverse investments.
                    </x-testimonial-card>
                    <x-testimonial-card
                        :image="asset('storage/images/person_8.jpg')"
                        name="Roger Scott" position="C.E.O.">
                        We were afraid of going into real estate investments without proper investments, but we got all the help needed.
                    </x-testimonial-card>
                    <x-testimonial-card
                        :image="asset('storage/images/person_7.jpg')"
                        name="Joe Maina" position="Manager">
                        I would recommend CederLinks to any investors looking for solid and high quality investments for business. I joined and am not looking back.
                    </x-testimonial-card>
                    <x-testimonial-card
                        :image="asset('storage/images/person_6.jpg')"
                        name="Maria Gamba" position="C.F.O">
                        Thank you to the team, thanks to insights from CederLinks my business secured enough money for further investments.
                    </x-testimonial-card>
                    <x-testimonial-card
                        :image="asset('storage/images/person_7.jpg')"
                        name="John Okwiri" position="Entrepreneur">
                        We have grown from a company of 12 people to over 50 employees thanks to the insights and diligence. Thank you.
                    </x-testimonial-card>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-6 d-flex">
                <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-end lazy" data-bg="{{ asset('storage/images/about.jpg') }}">
                    <a href="https://www.youtube.com/watch?v=UUtxyLOUxY0" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
                        <span class="icon-play"></span>
                    </a>
                </div>
            </div>
            <div class="col-md-6 pl-md-5 py-md-5">
                <div class="row justify-content-start pt-3 pb-3">
                    <div class="col-md-12 heading-section ftco-animate">
                        <span class="subheading">Welcome to CederLinks</span>
                        <h2 class="mb-4">We Always Fight For Your Justice to Win</h2>
                        <p>Our mission, vision and values are our guiding principles in all our decisions and are based on ethics and goodwill.</p>
                        <div class="tabulation-2 mt-4">
                            <ul class="nav nav-pills nav-fill d-md-flex d-block">
                                <li class="nav-item mb-md-0 mb-2">
                                    <a class="nav-link active py-2" data-toggle="tab" href="#home1">Our Mission</a>
                                </li>
                                <li class="nav-item px-lg-2 mb-md-0 mb-2">
                                    <a class="nav-link py-2" data-toggle="tab" href="#home2">Our Vision</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-2 mb-md-0 mb-2" data-toggle="tab" href="#home3">Our Values</a>
                                </li>
                            </ul>
                            <div class="tab-content bg-light rounded mt-2">
                                <div class="tab-pane container p-0 active" id="home1">
                                    <p>To guide our investors to the best investment opportunities in Kenya and other countries, and to give businesses a platform to gain access to Venture Capital and Angel Investment to grow and expand.</p>
                                </div>
                                <div class="tab-pane container p-0 fade" id="home2">
                                    <p>To be the most trusted investment platfom by growing our network of high valued investors and focusing on increasing the net asset value of our investors as well as th net worth of businesses on our platforms.</p>
                                </div>
                                <div class="tab-pane container p-0 fade" id="home3">
                                    <p>These are the ethical principles we follow that have made us the most trusted investment brokerage platform in Kenya. Our values are are: integrity, accountability, diligence, perseverance, and, discipline.</p>
                                </div>
                            </div>
                        </div>
                        <div class="years d-flex mt-4 mt-md-5">
                            <h4>
                                <span class="number mr-2" data-number="40">0</span>
                                <span>Years of Experience</span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb">
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
