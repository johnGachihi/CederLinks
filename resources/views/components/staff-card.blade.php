<div class="col-lg-3 col-sm-6">
    <div class="block-2 ftco-animate">
        <div class="flipper">
            <div class="front lazy" data-bg="{{ $image }}">
                <div class="box">
                    <h2>{{ $name }}</h2>
                    <p>{{ $occupation }}</p>
                </div>
            </div>
            <div class="back">
                <!-- back content -->
                <blockquote>
                    <p>{{ $slot }}</p>
                </blockquote>
                <div class="author d-flex">
                    <div class="image align-self-center">
                        <img class="lazy" data-src="{{ $image }}">
                    </div>
                    <div class="name align-self-center ml-3">{{ $name }}<span
                            class="position">{{ $occupation }}</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
