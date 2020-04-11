<div class="col-md-4 d-flex ftco-animate">
    <div class="blog-entry justify-content-end">
        <div class="text px-4 py-4">
            <h3 class="heading mb-0"><a href="#">{{ $title }}</a></h3>
        </div>
        <a href="blog-single.html">
            <img class="lazy block-20 object-fit-cover" data-src="{{ $image }}" width="100%">
        </a>
        <div class="text p-4 float-right d-block">
            <div class="topper d-flex align-items-center">
                <div class="one py-2 pl-3 pr-1 align-self-stretch">
                    <span class="day">{{ $day }}</span>
                </div>
                <div class="two pl-0 pr-3 py-2 align-self-stretch">
                    <span class="yr">{{ $year }}</span>
                    <span class="mos">{{ $month }}</span>
                </div>
            </div>
            <p>{{ $slot }}</p>
            <p><a href="#" class="btn btn-primary">Read more</a></p>
        </div>
    </div>
</div>
