<div class="block-21 mb-4 d-flex">
    <a href="{{ url("/mission/" . $mission->id) }}">
        <img class="blog-img mr-4 lazy"
             data-src="{{ $mission->image
                                ? asset("storage/images/$mission->image")
                                : asset("storage/images/mission-default-img.jpg") }}"
             style="object-fit: cover"
             alt="Mission Image"
        />
    </a>
    <div class="text">
        <h3 class="heading line-clamp-3"><a href="#">{{ $mission->title ?? "..." }}</a></h3>
        <div class="meta">
            <div>
                <a href="{{ url("/mission/" . $mission->id) }}">
                    <span class="icon-calendar"></span>
                    {{ $mission->date->format("M. d, Y") }}
                </a>
            </div>
{{--            <div><a href="#"><span class="icon-person"></span> Admin</a></div>--}}
{{--            <div><a href="#"><span class="icon-chat"></span> 19</a></div>--}}
        </div>
    </div>
</div>
