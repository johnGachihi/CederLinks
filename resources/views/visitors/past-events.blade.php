@extends('visitors.layout.app')

@section('title', 'Past Events')

@section('content')
    <x-hero :bg-image="asset('storage/images/bg_1.jpg')"
            page-name="Our Past Events"
            :breadcrumbs="['Missions']"
    />

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                @forelse($missions as $mission)
                    <x-mission-preview-img :mission="$mission"/>
                @empty
                    No past events
                @endforelse
            </div>
            <div class="d-flex justify-content-center">
                {{ $missions->links() }}
            </div>
        </div>
    </section>
@endsection
