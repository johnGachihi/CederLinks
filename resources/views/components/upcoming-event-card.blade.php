<div class="col-md-4 d-flex ftco-animate">
    <div class="blog-entry justify-content-end">
        <div class="text px-4 py-4">
            <h3 class="heading mb-0 line-clamp-1"><a href="#">{{ $title ?? "..." }}</a></h3>
        </div>
        <a href="blog-single.html">
            <img class="lazy block-20 object-fit-cover"
                 data-src="{{ $image
                                ? asset("storage/images/$image")
                                : asset("storage/images/missions/45.jpg") }}"
                 width="100%">
        </a>
        <div class="text p-4 float-right d-block">
            <div class="topper d-flex align-items-center">
                <div class="one py-2 pl-3 pr-1 align-self-stretch">
                    <span class="day">{{ $date->day ?? "-" }}</span>
                </div>
                <div class="two pl-0 pr-3 py-2 align-self-stretch">
                    <span class="yr">{{ $date->year ?? "-" }}</span>
                    <span class="mos">{{ $date->englishMonth ?? "-" }}</span>
                </div>
            </div>
            <p class="line-clamp-3">{{ $descriptionPreview ?? "..."  }}</p>
            <p><a href="#" class="btn btn-primary">Read more</a></p>
        </div>
    </div>
</div>
