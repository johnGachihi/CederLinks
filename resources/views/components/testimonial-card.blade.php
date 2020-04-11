<div class="item">
    <div class="testimony-wrap py-4">
        <div class="text">
            <p class="mb-4">{{ $slot }}</p>
            <div class="d-flex align-items-center">
                <div class="user-img lazy" data-bg="{{ $image }}"></div>
                <div class="pl-3">
                    <p class="name">{{ $name }}</p>
                    <span class="position">{{ $position }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
