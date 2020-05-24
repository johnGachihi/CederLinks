@props(['bgImage', 'pageName', 'breadcrumbs'])

<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ $bgImage }}');"
         data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-3 bread">{{ $pageName }}</h1>
                <p class="breadcrumbs">
                    <span class="mr-2">
                        <a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a>
                    </span>
                    @isset($breadcrumbs)
                        @foreach($breadcrumbs as $link => $breadcrumb)
                            @if (! $loop->last)
                                @if (is_int($link))
                                    <span class="mr-2">
                                        {{ $breadcrumb }}
                                        <i class="ion-ios-arrow-forward"></i>
                                    </span>
                                @else
                                    <span class="mr-2">
                                        <a href="{{ $link }}">
                                            {{ $breadcrumb }}
                                            <i class="ion-ios-arrow-forward"></i>
                                        </a>
                                    </span>
                                @endif
                            @else
                                <span>{{ $breadcrumb }}</span>
                            @endif
                        @endforeach
                    @else
                        <span>{{ $pageName }}</span>
                    @endisset
                </p>
            </div>
        </div>
    </div>
</section>
