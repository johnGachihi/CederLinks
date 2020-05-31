<div class="d-flex ftco-animate">
    <div class="blog-entry justify-content-end">
        <div class="text px-4 py-4">
            <h3 class="heading mb-0 line-clamp-1">
                <a href="{{ url("/mission/$mission->id") }}">{{ $mission->title ?? "..." }}</a>
            </h3>
        </div>
        <a href="{{ url("/mission/$mission->id") }}">
            <img class="lazy block-20 object-fit-cover"
                 data-src="{{ $mission->image
                                ? asset("storage/images/$mission->image")
                                : asset("storage/images/mission-default-img.jpg") }}"
                 width="100%">
        </a>
        <div class="text p-4 float-right d-block">
            <div class="topper d-flex align-items-center">
                <div class="one py-2 pl-3 pr-1 align-self-stretch">
                    <span class="day">{{ $mission->date->day ?? "-" }}</span>
                </div>
                <div class="two pl-0 pr-3 py-2 align-self-stretch">
                    <span class="yr">{{ $mission->date->year ?? "-" }}</span>
                    <span class="mos">{{ $mission->date->englishMonth ?? "-" }}</span>
                </div>
            </div>
            <p class="line-clamp-3">{{ $mission->descriptionPreview ?? "..."  }}</p>
            <p><a href="{{ url("/mission/$mission->id") }}" class="btn btn-primary">Read more</a></p>
        </div>
    </div>
</div>
