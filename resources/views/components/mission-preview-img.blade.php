
<div class="col-md-4 ftco-animate">
    <div class="case img d-flex align-items-center justify-content-center"
         style="background-image: url({{
            $mission->image
                ? asset("storage/images/$mission->image")
                : asset("storage/images/mission-default-img.jpg")
         }});">
        <div class="text text-center" style="width: 80%">
            <h3>
                <a href="{{ url("/mission/$mission->id") }}">{{ $mission->title ?? "..." }}</a>
            </h3>
            <span>{{ $mission->date->toFormattedDateString() }}</span>
        </div>
    </div>
</div>
