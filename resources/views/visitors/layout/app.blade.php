<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') - Ceder Links</title>

    <!--Favicon-->
    <link rel="shortcut icon" href="favicon.PNG"/>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/visitors/app.css') }}">
    <script src="{{ asset('/js/visitors/app.js') }}" defer></script>
    {{-- Render Re-capture --}}
    <script>
        var onloadCallback = function () {
            grecaptcha.render('register-recaptcha', {
                'sitekey': '6LfZA60UAAAAALEr3Ifkla8UKLp_kq2Jz-IRjWUC',
                'callback': window.gcaptcha.onSuccessfulResponse,
                'expired-callback': window.gcaptcha.onResponseExpired
            })
        }
    </script>
</head>
<body>
<x-nav-bar/>

@yield('content')

<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="logo"><a href="#">CederLinks <span></span></a></h2>
                    <p>Ceder Links is the leading business and investment platform in Kenya. We seek to provide our
                        members access to the best business opportunities in Africa.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="https://twitter.com/cederlinks"><span
                                    class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="https://www.linkedin.com/company/42909785/"><span
                                    class="icon-linkedin"></span></a></li>

                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Practice Areas</h2>
                    <ul class="list-unstyled">
                        <li><a href="Terms & Conditions.html" class="py-1 d-block"><span
                                    class="ion-ios-arrow-forward mr-3"></span>Terms & Conditions</a></li>
                        <li><a href="Partner Policies.html" class="py-1 d-block"><span
                                    class="ion-ios-arrow-forward mr-3"></span>Partner Policies</a></li>
                        <li><a href="Membership Policy.html" class="py-1 d-block"><span
                                    class="ion-ios-arrow-forward mr-3"></span>Membership Policy</a></li>
                        <li><a href="Event's Calender.html" class="py-1 d-block"><span
                                    class="ion-ios-arrow-forward mr-3"></span>Events Calendar</a></li>
                        <li><a href="attorneys.html" class="py-1 d-block"><span
                                    class="ion-ios-arrow-forward mr-3"></span>Our Team</a></li>
                        <li><a href="about.html" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>About
                                Us</a></li>
                        <li><a href="practice-areas.html" class="py-1 d-block"><span
                                    class="ion-ios-arrow-forward mr-3"></span>Our Services</a></li>
                        <li><a href="contact.html" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Contact
                                Us</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Question?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">3rd Floor, Karen Plains House, Nairobi,<br> Kenya
                            <li><a href="tel:+254 721 403 332"><span class="icon icon-phone"></span><span class="text">+254 721 403 332</span></a>
                            </li>
                            <li><a href=""><span class="icon icon-envelope"></span><span class="text">info@cedarlinks.com</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Business Hours</h2>
                    <div class="opening-hours">
                        <h4>Opening Days:</h4>
                        <p class="pl-3">
                            <span>Mon  8:00am-4:00pm</span><br>
                            <span>Tues 8:00am-4:00pm</span><br>
                            <span>Wed  8:00-4:00pm</span><br>
                            <span>Thur 8:00am-4:00pm</span><br>
                            <span>Fri  8:00am-4:00pm</span><br>
                            <span>Sat  9:00am-3:00pm</span><br>
                        </p>
                        <h4>Closed Days:</h4>
                        <p class="pl-3">
                            <span>All Sunday Days</span><br>
                            <span>All Public Holidays</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright Cedarlinks Limited &copy;
                    <script>document.write(new Date().getFullYear());</script>
                    All rights reserved</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00"/>
    </svg>
</div>

<!--Modal-->
<div class="modal fade" id="auth-modal" data-show="true" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="flex-grow-1 d-flex nav nav-tabs">
                    <li class="nav-item flex-grow-1 text-center active">
                        <a id="modal-register" class="nav-link active" href="#">Register</a>
                    </li>
                    <li class="nav-item flex-grow-1 text-center">
                        <a id="modal-login" class="nav-link" href="#">Login</a>
                    </li>
                </ul>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="register-tab">
                    <form action="{{ route('register') }}" method="POST" novalidate id="registration-form" class="w-75 mx-auto">
                        @csrf
                        <x-input name="name" required="true"></x-input>
                        <x-input name="email" required="true"></x-input>
                        <x-input name="password" type="password" required="true"></x-input>
                        <div class="mb-3">
                            <div id="register-recaptcha"></div>
                            <input class="d-none" id="g-captcha-val" name="g-captcha" required pattern="checked">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="checkbox" value="1"
                                    id="t-and-c-checkbox"
                                    name="t-and-c-checkbox"
                                    required {{ old('t-and-c-checkbox') ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="t-and-c-checkbox" style="font-size: 14px; color: #2c2c2c   ">
                                    Agree to the <a href="#">Terms and conditions</a>
                                </label>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <button id="register-btn" class="btn btn-primary">Register</button>
                    </form>
                </div>
                <div id="login-tab" class="d-none">Login</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@if($errors->any())
    <script>
        console.log(@json($errors->all()));
        window.addEventListener('DOMContentLoaded', evt => {
            $('#auth-modal').modal();
        });
    </script>
@endif

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
</body>
</html>
