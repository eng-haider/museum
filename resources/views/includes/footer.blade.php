<footer class="footer-style3-area" style="background-image:url({{asset('assets/images/resources/footer4.jpg')}}">
            <div class="footer">
                <div class="container">
                    <div class="row">

                        <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="100ms">
                            <div class="single-footer-widget-style2 marbtm50">
                                <div class="our-company-info">
                                    <div class="footer-logo">
                                        <a href="/"><img src="{{asset('assets/images/resources/logo.png')}}" alt="Footer Logo"></a>

                                    </div>
                                    <div class="text">

                                        <p>{{ $about }}</p>
                                           
                                        <ul>
                                            <li>
                                                <div class="icon">
                                                    <span class="flaticon-clock-1"></span>
                                                </div>
                                                <div class="title">
                                                    <h5>يوميا من الساعة 9:00 صباحا - 8:30 مساءا</h5>
                                                </div>
                                            </li>
                                            <li class="d-block d-md-none">
                                                <div class="icon">
                                                    <span class="flaticon-map"></span>
                                                </div>
                                                <div class="title">
                                                    <h5>العنوان العتبة العباسية المقدسة - باب القبلة</h5>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <span class="flaticon-phone"></span>
                                                </div>
                                                <div class="title">
                                                    <h3><a href="tel:+9647702728492">9647702728492+</a></h3>
                                                    <h3><a href="tel:+9647801062544">9647801062544+</a></h3>
                                                    <h3><a href="tel:+9647730333053">9647730333053+</a></h3>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <span class="flaticon-global"></span>
                                                </div>
                                                <div class="title">
                                                    <h5>
                                                        <a href="{{ route('home') }}">museum.alkafeel.net</a><br>
                                                        <a  href="mailto:museum@alkafeel.net">museum@alkafeel.net</a>
                                                    </h5>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="contact-button">
                                            <a class="btn-two" href="{{ route('contact') }}">{{__('home.header.call_us')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="100ms">
                            <div class="single-footer-widget-style2">
                                <div class="footer-map-holder">
                                    <div class="map-outer">
                                        <!--Map Canvas-->
                                        <iframe class="map-canavs" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3360.5887537895796!2d44.03412441513114!3d32.61714139942731!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15596be40449bf49%3A0x327c2783e20809a4!2sHoly%20Shrine%20Of%20Hazrat%20Abalfadhl%20Al-%20Abbas!5e0!3m2!1sen!2siq!4v1658998420908!5m2!1sen!2siq" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                    <div class="address-box d-none d-md-block">
                                        <h3>العنوان :</h3>
                                        <p> داخل الصحن الشريف - قرب باب القبلة <br   > كربلاء المقدسة</p>
                                    </div>
                                    <div class="footer-social-links">
                                        <div class="title">التواصل الاجتماعي :</div>
                                        <ul class="social-links-style1">
                                            <li>
                                                <a href="https://www.facebook.com/MthfAlkfylLlnfaysWalmkhtwtat"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            </li>
                                            <li><a href="https://instagram.com/al.kf.mu"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                            <li>
                                            @if (Route::currentRouteName() == 'home')
                                                <a href="https://tiktok.com/@alkafeel_museum"><i class="fa fa-tiktok" aria-hidden="true" style="padding-top:12px">
                                            @else 
                                                <a href="https://tiktok.com/@alkafeel_museum"><i class="fa fa-tiktok" aria-hidden="true">
                                            @endif
                                                <svg width="14px" height="14px" version="1.1" id="tiktok" xmlns="http://www.w3.org/2000/svg" fill="#FFF" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64" xml:space="preserve"><path data-v-00b30c1b="" fill="#FF004F" d="M58,19.4v9.3c-0.5,0-1.1,0.1-1.7,0.1c-4.5,0-8.7-1.7-11.9-4.4v19.8c0,4-1.3,7.8-3.6,10.8     c-3.2,4.3-8.4,7.2-14.3,7.2c-6.4,0-12-3.4-15.1-8.4c3.2,3,7.5,4.9,12.2,4.9c5.8,0,11-2.8,14.2-7.2c2.2-3,3.6-6.7,3.6-10.8V20.8     c3.2,2.8,7.3,4.4,11.9,4.4c0.6,0,1.1,0,1.7-0.1v-6c0.9,0.2,1.7,0.3,2.6,0.3H58z"></path><path data-v-00b30c1b="" fill="#FF004F" d="M29,26.3v10.3c-0.7-0.2-1.5-0.3-2.2-0.3c-4.4,0-8,3.7-8,8.2c0,1,0.2,1.9,0.5,2.8c-2-1.5-3.4-3.9-3.4-6.6     c0-4.5,3.6-8.2,8-8.2c0.8,0,1.5,0.1,2.2,0.3l0-6.6c0.2,0,0.4,0,0.6,0C27.5,26.2,28.3,26.2,29,26.3z"></path><path data-v-00b30c1b="" fill="#FF004F" d="M45.9,12c-1.8-1.6-3.1-3.8-3.8-6.1h2.4c0,0.5,0,0.9,0,1.4C44.7,8.9,45.2,10.5,45.9,12z"></path><path data-v-00b30c1b="" d="M55.1,19.2v6c-0.5,0.1-1.1,0.1-1.7,0.1c-4.5,0-8.7-1.7-11.9-4.4v19.8c0,4-1.3,7.8-3.6,10.8c-3.3,4.4-8.4,7.2-14.2,7.2   c-4.7,0-9-1.9-12.2-4.9c-1.7-2.8-2.7-6-2.7-9.5c0-9.7,7.7-17.6,17.3-17.9l0,6.6c-0.7-0.2-1.5-0.3-2.2-0.3c-4.4,0-8,3.7-8,8.2   c0,2.7,1.3,5.2,3.4,6.6c1.1,3.1,4.1,5.4,7.5,5.4c4.4,0,8-3.7,8-8.2V5.9h7.3c0.7,2.4,2,4.5,3.8,6.1C47.7,15.6,51.1,18.3,55.1,19.2z"></path><path data-v-00b30c1b="" fill="#00F7EF" d="M26.1,22.8l0,3.4c-9.6,0.3-17.3,8.2-17.3,17.9c0,3.5,1,6.7,2.7,9.5C8.1,50.3,6,45.7,6,40.5      c0-9.9,8-17.9,17.8-17.9C24.6,22.6,25.4,22.7,26.1,22.8z"></path><path data-v-00b30c1b="" fill="#00F7EF" d="M42.1,5.9h-7.3v38.6c0,4.5-3.6,8.2-8,8.2c-3.5,0-6.4-2.2-7.5-5.4c1.3,0.9,2.9,1.5,4.6,1.5      c4.4,0,8-3.6,8-8.1V2h9.7v0.2c0,0.4,0,0.8,0.1,1.2C41.7,4.2,41.9,5.1,42.1,5.9z"></path><path data-v-00b30c1b="" fill="#00F7EF" d="M55.1,15.5C55.1,15.5,55.1,15.5,55.1,15.5v3.6c-4-0.8-7.4-3.5-9.3-7.1C48.3,14.3,51.5,15.6,55.1,15.5z"></path></svg>
                                            </i></a></li>
                                            <li><a href="https://www.youtube.com/@alkafeelmuseum1435"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                            <li><a href="https://t.me/alkafeel_museum"><i class="fa fa-telegram" aria-hidden="true">
                                                
                                            </i></a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="footer-bottom-style3">
                <div class="container">
                    <div class="copyright-text text-center">
                        <p>جميع الحقوق محفوظة متحف العتبة العباسية المقدسة</p>
                    </div>
                </div>
            </div>
        </footer>
