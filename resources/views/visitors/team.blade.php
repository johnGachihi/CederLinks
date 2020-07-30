@extends('visitors.layout.app')

@section('title', 'Our Team')

@section('content')
    <x-hero :bg-image="asset('storage/images/bg_1.jpg')" page-name="Our Team of Experts"/>

    <section class="ftco-section">
        <div class="container-fluid px-md-5">
            <div class="row justify-content-center">
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

@endsection
