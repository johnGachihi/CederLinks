@extends('visitors.layout.app')

@section('title', 'Services')

@section('content')
    <x-hero :bg-image="asset('storage/images/bg_1.jpg')" page-name="Services"/>

    <section class="ftco-section">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <x-service title="Investment" flaticonIcon="flaticon-family">
                We provide a platform with the best and most crucial investment opportunities in Kenya
            </x-service>
            <x-service title="Missions" flaticonIcon="flaticon-auction">
                We conduct investor missions to showcase our products to investors and business people
            </x-service>
            <x-service title="Financing" flaticonIcon="flaticon-shield">
                For businesses looking for further investments, we connect you to potential investors
            </x-service>
            <x-service title="Consultancy" flaticonIcon="flaticon-handcuffs">
                For quality & solid business advice from experts and professionals, we have you covered
            </x-service>
            <x-service title="Networking" flaticonIcon="flaticon-house">
                We have networking events for our members to meet industry leaders in various professions
            </x-service>
            <x-service title="Legal Advice" flaticonIcon="flaticon-employee">
                We provide connections to legal advice for our members regarding business decisions
            </x-service>
            <x-service title="Financial Advice" flaticonIcon="flaticon-fire">
                We provide sound financial advice for firms so they can make sound business decisions
            </x-service>
            <x-service title="Development" flaticonIcon="flaticon-money">
                We provide business development services to our members for growth and expansion
            </x-service>
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

