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
                <p>
                    CEDER LINKS LIMITED is a Kenyan Incorporated
                    limited company since the year 2013.
                </p>
                <p>
                    The core of our business is linking the world
                    to African opportunities. From 2013 to 2018, we
                    established liaison offices in some parts of
                    Africa namely Uganda, Tanzania, Democratic
                    Republic of Congo, Ethiopia, Malawi, Ghana,
                    Zimbabwe and Egypt.
                </p>
                <p>
                    In 2019, we extended our operations to Rwanda,
                    Zambia, Namibia, Botswana, Nigeria and South Africa.
                    This year, 2020, we are aggressively diversifying to
                    the rest of the countries in Africa.
                </p>
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
                        name="Selim S. Benbasat" position="Owner and founder Ennovation group">
                        Ceder Links  especially are the jewel of the crown
                        in Kenya. My first visit to Kenya was planned for 2
                        days and soon enough I find my self remaining for
                        10 days, with a serious link to many surrounding
                        countries. Thanks Ceder Links  for being my family
                        in Kenya.
                    </x-testimonial-card>
                    <x-testimonial-card
                        :image="asset('storage/images/person_8.jpg')"
                        name="Mustafa" position="Egypt">
                        I would recommend Ceder Links to any investors
                        looking for solid and high quality investments
                        for business. I joined and am not looking back.
                    </x-testimonial-card>
                    <x-testimonial-card
                        :image="asset('storage/images/person_7.jpg')"
                        name="Joe Maina" position="Manager">
                        We have truly made a lot of positive changes
                        and progress with Ceder Links in the past few
                        years and I am very happy.
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
                        <span class="subheading">Welcome to Ceder Links</span>
                        <h2 class="mb-4">Best Business Opportunities for You</h2>
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
