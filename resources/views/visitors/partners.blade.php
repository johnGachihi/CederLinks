@extends('visitors.layout.app')

@section('title', 'Partners')

@section('content')
    <x-hero :bg-image="asset('storage/images/bg_1.jpg')" page-name="Services"/>

    <section class="ftco-section">
        <div class="container-fluid px-md-5">
            <div class="row">
                <x-staff-card :image="asset('storage/images/person_25.jpg')"
                              name="Selim S.Benbasat"
                              occupation="Owner and founder Ennovation group">
                    Mr. Selim S.Benbasat is the owner and founder
                    Ennovation group and a partner of Ceder Links.
                </x-staff-card>

                <x-staff-card :image="asset('storage/images/person_263.jpg')"
                              name="Darryl Daniels K"
                              occupation="CEO, Jacobsen Daniels, USA">
                    Darryl Daniels is the CEO of Jacobsen Daniels
                    located in the USA. We are glad to have him as
                    a partner of our firm.
                </x-staff-card>

                <x-staff-card :image="asset('storage/images/person_27.jpg')"
                              name="Tigist Abebe"
                              occupation="Ethiopian partner">
                    Ms. Tigist Abebe is our Ethiopian partner.
                </x-staff-card>

                <x-staff-card :image="asset('storage/images/person_32.jpg')"
                              name="Mr. Gasore"
                              occupation="Burundi Partner">
                    Mr.Gasore is our partner from Burundi.
                </x-staff-card>

                <x-staff-card :image="asset('storage/images/person_33.jpg')"
                              name="Geoffrey"
                              occupation="Democratic republic of Congo">
                    Mr. Geoffrey is our partner from the Democratic
                    republic of Congo.
                </x-staff-card>

                <x-staff-card :image="asset('storage/images/person_300.jpg')"
                              name="Ayan Keynan"
                              occupation="C.E.O Raison Informatics">
                    Ms. Ayan Keynan is the C.E.O. of Raison Informatics,
                    our I.T. consultancy partner.
                </x-staff-card>

                <x-staff-card :image="asset('storage/images/person_26.jpg')"
                              name="Ashie Mukungu"
                              occupation="CEO, Balos Group Africa LTD, Uganda">
                    Mr. Mukungu served as Economic Advisor to the President
                    of the African Development Bank, in Tunis, Tunisia.
                    He also worked as Investment and Partnership Advisor
                    to the Secretary General of COMESA.
                </x-staff-card>
            </div>
        </div>
    </section>

@endsection
