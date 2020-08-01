<div class="hero-wrap js-fullheight" style="background-image: url('{{ asset('storage/images/bg_1.jpg') }}');"
     data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
             data-scrollax-parent="true">
            <div class="col-md-6 ftco-animate">
                <h2 class="subheading">Welcome To Ceder Links</h2>
                <h1>
                    We Provide Highest Quality
                    <span class="txt-rotate" data-period="2000" data-rotate='[ "Investments.", "Networks.", "Services.", "Returns." ]'></span>
                </h1>
                <p class="mb-4">
                    Join us to day to start your journey to high return
                    investment. We are a leading business and investment
                    platform, using over 60 years’ experience in Kenya to
                    provide our members with unique information and
                    exposure to business opportunities.
                </p>
                @guest
                    <p>
                        <a href="#" class="btn btn-primary mr-md-4 py-2 px-4 _auth-modal-show register">
                            Become a Member
                            <span class="ion-ios-arrow-forward"></span>
                        </a>
                    </p>
                @endguest
            </div>
        </div>
    </div>
</div>
