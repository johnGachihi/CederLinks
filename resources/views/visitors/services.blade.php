@extends('visitors.layout.app')

@section('title', 'Services')

@section('content')
    <x-hero :bg-image="asset('storage/images/bg_1.jpg')" page-name="Services"/>

    <section class="ftco-section">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-3 text-center">
                <div class="practice-area ftco-animate">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-family"></span>
                    </div>
                    <h3><a href="practice-single.html">Investment</a></h3>
                    <p>We provide a platform with the best and most crucial investment opportunities in Kenya</p>
                    <a href="pdf.PDF" download class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="practice-area ftco-animate">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-auction"></span>
                    </div>
                    <h3><a href="practice-single.html">Missions</a></h3>
                    <p>We conduct investor missions to showcase our products to investors and business people</p>
                    <a href="pdf.PDF" download class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="practice-area ftco-animate">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-shield"></span>
                    </div>
                    <h3><a href="practice-single.html">Financing</a></h3>
                    <p>For businesses looking for further investments, we connect you to potential investors</p>
                    <a href="pdf.PDF" download class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="practice-area ftco-animate">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-handcuffs"></span>
                    </div>
                    <h3><a href="practice-single.html">Consultancy</a></h3>
                    <p>For quality & solid business advice from experts and professionals, we have you covered</p>
                    <a href="pdf.PDF" download class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="practice-area ftco-animate">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-house"></span>
                    </div>
                    <h3><a href="practice-single.html">Networking</a></h3>
                    <p>We have networking events for our members to meet industry leaders in various professions</p>
                    <a href="pdf.PDF" download class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="practice-area ftco-animate">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-employee"></span>
                    </div>
                    <h3><a href="practice-single.html">Legal Advice</a></h3>
                    <p>We provide connections to legal advice for our members regarding business decisions</p>
                    <a href="pdf.PDF" download class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="practice-area ftco-animate">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-fire"></span>
                    </div>
                    <h3><a href="practice-single.html">Financial Advice</a></h3>
                    <p>We provide sound financial advice for firms so they can make sound business decisions</p>
                    <a href="pdf.PDF" download class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="practice-area ftco-animate">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-money"></span>
                    </div>
                    <h3><a href="practice-single.html">Development</a></h3>
                    <p>We provide business development services to our members for growth and expansion</p>
                    <a href="pdf.PDF" download class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
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

