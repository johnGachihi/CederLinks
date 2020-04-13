@extends('visitors.layout.app')

@section('title', 'T & C')

@section('content')
    <x-hero :bg-image="asset('storage/images/bg_1.jpg')" page-name="Terms & Conditions"></x-hero>

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    <p>
                        <img src="{{ asset('storage/images/image_100.jpg') }}" alt="" class="img-fluid">
                    </p>
                    <h2 class="mb-3">Intellectual Property Rights and Restrictions on Use</h2>
                    <p>CederLinks Ltd grants to you a limited non-exclusive, non-transferable license to view, copy and
                        print the material on this website (other than the design or layout of this website) for your
                        non-commercial or personal use only.</p>
                    <p>All copies that you make must retain all copyright and other notices that are on this website.
                        Our status and that of any identified contributors as the authors of material on our website
                        must always be acknowledged.</p>
                    <p>Except as provided in the previous sentence, you may not use, distribute, sell, modify, transmit,
                        revise, reverse engineer, republish, post or create derivative works (where applicable) of the
                        trade-marks, trade names, logos, patent, information, software or other intellectual property,
                        material or content in these Terms of Use, referred to (collectively, as the “content”) of this
                        website without CederLinks Ltd’s prior written permission.</p>
                    <p>You acknowledge and agree that this website, its content including all software used on this
                        website are the property of CederLinks Ltd, its affiliates or their respective service
                        providers, suppliers or licensors and you will not acquire any rights or licenses in or on this
                        website or in its content. This website and its content are protected by copyright, both
                        individually and as a collective work or compilation and by trade-mark law, patent law and other
                        applicable laws.</p>
                    <h2 class="mb-3 mt-5">Trademarks</h2>
                    <p>​The CederLinks Ltd (Logo), and other marks used on this website belong to CederLinks Ltd .You
                        are not permitted to use any of the trademarks displayed on this website (including without
                        limitation those listed above) without the prior written consent of CederLinks Ltd or the third
                        party that owns the trademark.​The CederLinks Ltd (Logo), and other marks used on this website
                        belong to CederLinks Ltd .You are not permitted to use any of the trademarks displayed on this
                        website (including without limitation those listed above) without the prior written consent of
                        CederLinks Ltd or the third party that owns the trademark.</p>

                    <h2 class="mb-3 mt-5">Your authority to use this website</h2>
                    <p>By using this website, you are representing to us that you have the power and authority to accept
                        these Terms of Use and to enter into this agreement with us, that you are capable of assuming
                        and do assume any risks related to the use of this website and its content, and that you
                        understand and accept the terms, conditions and risks relating to their use. If you are
                        dissatisfied with this website or its content, your sole and exclusive remedy is to stop using
                        it.</p>

                    <h2 class="mb-3 mt-5">Disclaimers and Exclusion of Liability</h2>
                    <p>​The following provisions exclude or limit our liability for this website. They all apply only so
                        far as the law allows. In particular, we do not exclude or limit any of our responsibilities
                        under the Financial Services and Markets Act 2000 and the Financial Conduct Authority rules for
                        the conduct of business.</p>

                    <p>The content of this website is for information purposes only. CederLinks has taken care in
                        preparing the content of this website. However, except as set out below, CederLinks and each of
                        its affiliates, licensors, service providers and suppliers shall not be liable for any
                        inaccurate, delayed or incomplete information, or any omission nor for any actions taken in
                        reliance thereon.</p>
                    <p>The information contained in this website provided by any third party, including without
                        limitation, the information obtained through any link, has been supplied without verification by
                        us.</p>
                    <p>Neither CederLinks nor any of its affiliates, licensors, service providers or suppliers makes or
                        has made any recommendations or endorsements regarding the products, investments or services of
                        any third party mentioned or referred to in this website.</p>
                    <p>Please note that all third party products, investments or services must be ordered or purchased
                        directly from the third party. Commentary and other materials posted on our site are not
                        intended to amount to advice on which reliance should be placed.</p>

                    <p>This website could include technical or other inaccuracies or typographical errors and it is
                        provided to you on an “as is” basis without warranties or representations of any kind.</p>

                    <p>To the extent permitted by law CederLinks, its affiliates, licensors, service providers and
                        suppliers expressly exclude all representations, guarantees, warranties, conditions and terms of
                        any kind, whether express or which might otherwise be implied by statute, common law or equity
                        [including without limitation, representations, guarantees, warranties, conditions or terms
                        regarding accuracy, timeliness, completeness, non-infringement, satisfactory quality,
                        merchantability, merchantable quality or fitness for any particular purpose or those arising by
                        law, statute, usage of trade, or course of dealing.</p>

                    <p>CederLinks and each of its affiliates, licensors, service providers or suppliers to the fullest
                        extent permitted by law also expressly exclude any liability for any direct, indirect,
                        consequential or special loss or damage incurred by any user in connection with our website or
                        in connection with the use, inability to use or results with the use of our website or any
                        websites linked to it and any materials posted on it including without limitation any liability
                        for loss of income or revenue, loss of business, loss of profits or contracts, loss of
                        anticipated savings, loss of data, loss of goodwill, damage to reputation, wasted management or
                        office time and for any other loss or damage of any kind however arising and whether caused by
                        tort (including negligence), breach of contract or otherwise, even if foreseeable.</p>

                    <p>Nothing in these ‘Terms of use’ shall operate to limit or exclude our liability for death or
                        personal injury arising from our gross negligence nor any other liability which cannot be
                        excluded or limited under applicable law. CederLinks does not guarantee that access to and use
                        of the website will be uninterrupted or error-free. From time to time CederLinks may suspend or
                        restrict access to the website in order to carry out repairs, maintenance or to introduce new
                        facilities.</p>

                    <p>CederLinks reserves the right, in its sole discretion, to correct any errors or omissions in any
                        portion of this website.</p>
                    <h2 class="mb-3 mt-5">Changes to Terms of Use</h2>
                    <p>CederLinks reserves the right to update and revise these ‘Terms of use’ at any time without
                        notice to you. You are bound by such updates and revisions so we encourage you to visit this
                        page frequently to keep yourself updated. Your continued use of this website will mean that you
                        agree to any changes.</p>


                    <h2 class="mb-3 mt-5">Viruses, hacking and other offences</h2>
                    <p>You must not misuse our website by knowingly introducing viruses, Trojans, worms, logic bombs or
                        other material which is malicious or technologically harmful. You must not attempt to gain
                        unauthorized access to our website, the server on which our website is stored or any server,
                        computer or database connected to our website. You must not attack our website via a
                        denial-of-service attack or a distributed denial-of-service attack.

                    <p>By breaching this provision you will commit a criminal offence and we will report any such breach
                        to the relevant law enforcement authorities and will cooperate with those authorities by
                        disclosing your identity to them. In the event of such a breach your right to use our website
                        will cease immediately.</p>

                    <p>We will not be liable for any loss or damage caused by a distributed denial-of-service attack,
                        viruses or other technologically harmful material that may infect your computer equipment,
                        computer programs, data or other proprietary material due to your use of our Website or to your
                        downloading of any material posted on it or on any website linked to it.</p>

                    <p>This website (excluding linked sites) is controlled by CederLinks from its offices. By accessing
                        this website, you and CederLinks agree that all matters relating to your access to, or use of,
                        this website shall be governed by the statutes and laws of the England and Wales, as applicable,
                        without regard to the conflicts of laws principles thereof. You and CederLinks also hereby
                        submit to the exclusive jurisdiction and venue of the courts of the England and Wales with
                        respect to any and all matters arising in connection with these Terms of Use.</p>


                    <h2 class="mb-3 mt-5">Cookies</h2>
                    <p>A cookie is a small file which asks permission to be placed on your computer’s hard drive. Once
                        you agree, the file is added and the cookie helps analyse web traffic or lets you know when you
                        visit a particular site. Cookies allow web applications to respond to you as an individual. The
                        web application can tailor its operations to your needs, likes and dislikes by gathering and
                        remembering information about your preferences.

                    <p>We use traffic log cookies to identify which pages are being used. This helps us analyse data
                        about web page traffic and improve our website in order to tailor it to member needs. We only
                        use this information for statistical analysis purposes and then the data is removed from the
                        system.</p>

                    ​<p>Cookies help us provide you with a better website by enabling us to monitor which pages you find
                        useful and which you do not. A cookie in no way gives us access to your computer or any
                        information about you, other than the data you choose to share with us. You can choose to accept
                        or decline cookies. Most web browsers automatically accept cookies, but you can usually modify
                        your browser setting to decline cookies if you prefer. This may prevent you from taking full
                        advantage of the website.</p>

                    ​<p>When someone visits we use Google Analytics and Google Console to collect standard internet log
                        information and details of visitor behaviour patterns. We do this to find out things such as the
                        number of visitors to the various parts of the site. This information is only processed in a way
                        which does not identify anyone. We do not make, and do not allow Google to make, any attempt to
                        find out the identities of those visiting our website.</p>

                    <p>When you register as an CederLinks member or request to join our mailing lists, we collect
                        personal information. We use that information for a couple of reasons: to update you on
                        activities pertinent to the interests you have advised us of; to contact you if we need to
                        obtain or provide additional information; to check our records are up-to-date and to monitor
                        your satisfaction.</p>

                    <p>We use Constant Contact, to deliver our newsletter. We gather statistics around email opening and
                        clicks using industry standard technologies to help us monitor and improve our e-newsletter. For
                        more information, please see Constant Contact’s privacy notice. You can unsubscribe to general
                        mailings at any time by clicking the unsubscribe link at the bottom of any of our emails or by
                        emailing info@cederlinks.com.</p>

                    <p>When you purchase a ticket (or tickets) or register for events online, your name, address data,
                        email and contact number will be stored in Eventbrite which is integrated into our internal CRM
                        and CMS systems. Please be assured that we do not share your personal details with any other
                        company without your consent. For more information please see Eventbrite’s privacy policy.</p>

                    ​<p>In order to deliver our information and data services to members, we share limited member email
                        information with our partners Nurmara and Asoko Insight. These relationships are supported by
                        relevant Non-Disclosure Agreements. Their respective privacy policies can be found here and
                        here. You may opt out of these services by contacting our data protection officer.</p>

                    <p>Data is stored until such a date as you cease using our services or request that it be deleted.
                        You are entitled to view, amend, or delete the personal information that we hold. Email your
                        request to our data protection officer Susan Jones at susan.jones@investafrica.com. This notice
                        is reviewed intermittently, and may be updated at any time.</p>

                </div>
                <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
                    <div class="sidebar-box ftco-animate">
                        <div class="categories">
                            <h3>Important Links</h3>
                            <li><a href="Terms & Conditions.html">Terms & Conditions<span
                                        class="ion-ios-arrow-forward"></span></a></li>
                            <li><a href="Partner Policies.html">Partner Policies<span
                                        class="ion-ios-arrow-forward"></span></a></li>
                            <li><a href="Membership Policy.html">Membership Policy<span
                                        class="ion-ios-arrow-forward"></span></a></li>
                            <li><a href="Event's Calender.html">Events Calender<span
                                        class="ion-ios-arrow-forward"></span></a></li>
                            <li><a href="attorneys.html">Our Team<span class="ion-ios-arrow-forward"></span></a></li>
                            <li><a href="about.html">About Us<span class="ion-ios-arrow-forward"></span></a></li>
                            <li><a href="practice-areas.html">Our Services<span
                                        class="ion-ios-arrow-forward"></span></a></li>
                            <li><a href="contact.html">Contact Us<span class="ion-ios-arrow-forward"></span></a></li>
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>Upcoming Events</h3>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the
                                        blind texts</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> Oct. 18, 2019</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the
                                        blind texts</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> Oct. 18, 2019</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the
                                        blind texts</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> Oct. 18, 2019</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>About Us</h3>
                        <p>CederLinks is a Nairobi based investment company that provides a platform for investors to
                            meet business people and increase their investment portfolio. We capitalize on the niche of
                            a higher demand for diversified investment options for businesses, families and individuals
                            and focus to cater to this need.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row d-flex justify-content-end">
                <div class="col-md-8 py-4 px-md-4 bg-primary">
                    <div class="row">
                        <div class="col-md-6 ftco-animate d-flex align-items-center">
                            <h2 class="mb-0" style="color:white; font-size: 24px;">Subcribe to our Newsletter</h2>
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <form action="#" class="subscribe-form">
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control" placeholder="Enter email address">
                                    <input type="submit" value="Subscribe" class="submit px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
