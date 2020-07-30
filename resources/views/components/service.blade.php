@props(['title', 'description', 'flaticonIcon'])

<div class="col-md-3 text-center">
    <div class="practice-area ftco-animate">
        <div class="icon d-flex justify-content-center align-items-center">
            <span class="{{ $flaticonIcon }}"></span>
        </div>
        <h3 class="title">{{ $title }}</h3>
        <p>{{ $slot }}</p>
        {{--<a href="pdf.PDF"
           download
           class="btn-custom d-flex align-items-center justify-content-center">
            <span class="ion-ios-arrow-round-forward"></span>
        </a>--}}
    </div>
</div>
