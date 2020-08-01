@extends('visitors.layout.app')

@section('title', 'Upcoming Events')

@section('content')
    <x-hero :bg-image="asset('storage/images/bg_1.jpg')" page-name="Upcoming Events"/>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row d-flex">
                @foreach ($missions as $mission)
                    <div class="col-md-4 d-flex ftco-animate">
                        <x-upcoming-event-card :mission="$mission"></x-upcoming-event-card>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $missions->links() }}
        </div>
    </section>
@endsection
