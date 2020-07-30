@extends('visitors.layout.app')

@section('title', 'Services')

@section('content')
    <x-hero :bg-image="asset('storage/images/bg_1.jpg')" page-name="Contact us"/>

    <section class="ftco-section contact-section">
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                <div class="col-md-12 mb-4">
                    <h2 class="h3">Contact Information</h2>
                </div>
                <div class="w-100"></div>
                <div class="col-md-3">
                    <p><span>Address:</span> 2nd Floor, Karen Plains Arcade, Nairobi, Kenya </p>
                </div>
                <div class="col-md-3">
                    <p><span>Phone:</span> <a href="tel://1234567920">(+254) 721 403332</a></p>
                </div>
                <div class="col-md-3">
                    <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@cederlinks.com</a></p>
                </div>
                <div class="col-md-3">
                    <p><span>Website</span> <a href="#">cederlinks.com</a></p>
                </div>
            </div>
            <div class="row block-9 no-gutters">
                <div class="col-lg-6 order-md-last d-flex">
                    <form action="#" class="bg-light p-5 contact-form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea name="" id="" cols="30" rows="7" class="form-control"
                                      placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>

                </div>

                <div class="col-lg-6 d-flex">
                    <div id="map" class="bg-white">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.745023986586!2d36.715734614753934!3d-1.3290172990306772!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f1b3ff2a5588f%3A0x5eec95a16ba09d94!2sKaren%20Plains%20Arcade!5e0!3m2!1sen!2ske!4v1585721905752!5m2!1sen!2ske"
                            width="550" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
