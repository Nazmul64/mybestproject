<!-- Footer Start -->
<footer class="ec-footer section-space-mt">
 @php
    use App\Models\Websetting;
    $websettings=Websetting::first();
@endphp
    <div class="footer-container">
        <div class="footer-offer">
            <div class="container">
                <div class="row">
                    <span style="color:white;background:#0f134f;font-size:20px;text-align:center; display: block; white-space: nowrap; overflow: hidden; width: 100%;">
                        <div style="animation: marquee 15s linear infinite;">
                            🕋🕌🌙 আসসালামু আলাইকুম,

                            সকল গ্রাহক এবং শুভাকাঙ্ক্ষীদের জন্য 27bazar -এর পক্ষ থেকে জানাই পবিত্র ইদ-উল-ফিতরের শুভেচ্ছা। ঈদ আমাদের জীবনে এক নতুন আনন্দ, সুখ এবং শান্তির বার্তা নিয়ে আসে। এটি আত্মবিশ্বাস, ভালোবাসা এবং একতার উৎসব, যেখানে আমরা একে অপরের সাথে আনন্দ ভাগ করে নিই এবং আল্লাহর রহমত ও করুণার জন্য কৃতজ্ঞতা জানাই।

                            এই পবিত্র উৎসবে, আমরা সবাইকে সুস্থ, সুখী এবং শান্তিপূর্ণ জীবন কামনা করছি। ঈদ আমাদের জীবনে নতুন সম্ভাবনা, নতুন স্বপ্ন এবং নতুন উদ্যোগ নিয়ে আসুক। আল্লাহ আমাদের সবাইকে তার অশেষ রহমত এবং দয়া দান করুন এবং আমাদের জীবনে আনন্দের ছোঁয়া আসুক।

                            🎉 এই ঈদ উপলক্ষে, 27bazar আপনাদের সবার জন্য শুভেচ্ছা এবং ভালোবাসা জানাচ্ছে। আশা করি, আমাদের সেবাগুলি আপনাদের সঙ্গী হয়ে থাকবে এবং আমরা সবাই একসাথে আরো ভালো এবং সুস্থ জীবন উপভোগ করতে পারবো।

                            ঈদ মোবারক!
                        </div>
                    </span>
                </div>
            </div>
        </div>
        <div class="footer-top section-space-footer-p">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-3 ec-footer-contact">
                        <div class="ec-footer-widget">
                            <div class="ec-footer-logo"><a href="#"><img src="{{ asset('uploads/websettings') }}/{{ $websettings->photo ?? ''}}"
                                        alt=""><img class="dark-footer-logo" src="{{ asset('uploads/websettings') }}/{{ $websettings->photo ?? ''}}"
                                        alt="Site Logo" style="display: none;" /></a></div>
                            <h4 class="ec-footer-heading">Contact us</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link">{{ $websettings->address ?? ''}}</li>
                                    <li class="ec-footer-link"><span>Call Us:</span><a href="tel:+440123456789">
                                        {{ $websettings->phone ?? ''}}</a></li>
                                    <li class="ec-footer-link"><span>Email:</span><a
                                            href="mailto:example@ec-email.com"> {{ $websettings->email  ?? ''}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-2 ec-footer-info">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Information</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link"><a href="about-us.html">About us</a></li>
                                    <li class="ec-footer-link"><a href="faq.html">FAQ</a></li>
                                    <li class="ec-footer-link"><a href="track-order.html">Delivery Information</a>
                                    </li>
                                    <li class="ec-footer-link"><a href="contact-us.html">Contact us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-2 ec-footer-account">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Account</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link"><a href="user-profile.html">My Account</a></li>
                                    <li class="ec-footer-link"><a href="track-order.html">Order History</a></li>
                                    <li class="ec-footer-link"><a href="wishlist.html">Wish List</a></li>
                                    <li class="ec-footer-link"><a href="offer.html">Specials</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-2 ec-footer-service">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Services</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link"><a href="track-order.html">Discount Returns</a></li>
                                    <li class="ec-footer-link"><a href="privacy-policy.html">Policy & policy </a>
                                    </li>
                                    <li class="ec-footer-link"><a href="terms-condition.html">Customer Service</a>
                                    </li>
                                    <li class="ec-footer-link"><a href="terms-condition.html">Term & condition</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 ec-footer-news">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Newsletter</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link">Get instant updates about our new products and
                                        special promos!</li>
                                </ul>
                                <div class="ec-subscribe-form">
                                    <form id="ec-newsletter-form" name="ec-newsletter-form" method="post"
                                        action="#">
                                        <div id="ec_news_signup" class="ec-form">
                                            <input class="ec-email" type="email" required=""
                                                placeholder="Enter your email here..." name="ec-email" value="" />
                                            <button id="ec-news-btn" class="button btn-primary" type="submit"
                                                name="subscribe" value=""><i class="ecicon eci-paper-plane-o"
                                                    aria-hidden="true"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Footer social Start -->
                    <div class="col text-left footer-bottom-left">
                        <div class="footer-bottom-social">
                            <span class="social-text text-upper">Follow us on:</span>
                            <ul class="mb-0">
                                <li class="list-inline-item">
                                    <a class="hdr-facebook" href="{{ $websettings->facebook ?? ''}}" target="_blank">
                                        <i class="ecicon eci-facebook"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="hdr-twitter" href="{{ $websettings->twitter ?? ''}}" target="_blank">
                                        <i class="ecicon eci-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="hdr-instagram" href="{{ $websettings->instagram ?? ''}}" target="_blank">
                                        <i class="ecicon eci-instagram"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="hdr-linkedin" href="{{ $websettings->linkedin ?? ''}}" target="_blank">
                                        <i class="ecicon eci-linkedin"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="hdr-youtube" href="{{ $websettings->youtube ?? ''}}" target="_blank">
                                        <i class="ecicon eci-youtube"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="hdr-whatsapp" href="{{ $websettings->whatsapp ?? ''}}" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer social End -->
                    <!-- Footer Copyright Start -->
                    <div class="col text-center footer-copy">
                        <div class="footer-bottom-copy ">
                            <div class="ec-copy">Copyright © <span id="copyright_year"></span> <a class="site-name text-upper"
                                    href="#">27bazar<span>.</span></a>. All Rights Reserved</div>
                        </div>
                    </div>
                    <!-- Footer Copyright End -->
                    <!-- Footer payment -->
                    <div class="col footer-bottom-right">
                        <div class="footer-bottom-payment d-flex justify-content-end">
                            <div class="payment-link">
                                <img src="{{ asset('uploads/websettings') }}/{{ $websettings->favicon ?? ''}}" alt="">
                            </div>

                        </div>
                    </div>
                    <!-- Footer payment -->
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End -->

<!-- Modal -->
<div class="modal fade" id="ec_quickview_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close qty_close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <!-- Swiper -->
                        <div class="qty-product-cover">
                            <div class="qty-slide">
                                <img class="img-responsive" src="{{ asset('frontend') }}/assets/images/product-image/3_1.jpg" alt="">
                            </div>
                            <div class="qty-slide">
                                <img class="img-responsive" src="{{ asset('frontend') }}/assets/images/product-image/3_2.jpg" alt="">
                            </div>
                            <div class="qty-slide">
                                <img class="img-responsive" src="{{ asset('frontend') }}/assets/images/product-image/3_3.jpg" alt="">
                            </div>
                            <div class="qty-slide">
                                <img class="img-responsive" src="{{ asset('frontend') }}/assets/images/product-image/3_4.jpg" alt="">
                            </div>
                            <div class="qty-slide">
                                <img class="img-responsive" src="{{ asset('frontend') }}/assets/images/product-image/3_5.jpg" alt="">
                            </div>
                        </div>
                        <div class="qty-nav-thumb">
                            <div class="qty-slide">
                                <img class="img-responsive" src="{{ asset('frontend') }}/assets/images/product-image/3_1.jpg" alt="">
                            </div>
                            <div class="qty-slide">
                                <img class="img-responsive" src="{{ asset('frontend') }}/assets/images/product-image/3_2.jpg" alt="">
                            </div>
                            <div class="qty-slide">
                                <img class="img-responsive" src="{{ asset('frontend') }}/assets/images/product-image/3_3.jpg" alt="">
                            </div>
                            <div class="qty-slide">
                                <img class="img-responsive" src="{{ asset('frontend') }}/assets/images/product-image/3_4.jpg" alt="">
                            </div>
                            <div class="qty-slide">
                                <img class="img-responsive" src="{{ asset('frontend') }}/assets/images/product-image/3_5.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="quickview-pro-content">
                            <h5 class="ec-quick-title"><a href="product-left-sidebar.html">Handbag leather purse for
                                    women</a>
                            </h5>
                            <div class="ec-quickview-rating">
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star"></i>
                            </div>

                            <div class="ec-quickview-desc">Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
                                since the 1500s,</div>
                            <div class="ec-quickview-price">
                                <span class="old-price">$100.00</span>
                                <span class="new-price">$80.00</span>
                            </div>

                            <div class="ec-pro-variation">
                                <div class="ec-pro-variation-inner ec-pro-variation-color">
                                    <span>Color</span>
                                    <div class="ec-pro-color">
                                        <ul class="ec-opt-swatch">
                                            <li><span style="background-color:#ebbf60;"></span></li>
                                            <li><span style="background-color:#75e3ff;"></span></li>
                                            <li><span style="background-color:#11f7d8;"></span></li>
                                            <li><span style="background-color:#acff7c;"></span></li>
                                            <li><span style="background-color:#e996fa;"></span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="ec-pro-variation-inner ec-pro-variation-size ec-pro-size">
                                    <span>Size</span>
                                    <div class="ec-pro-variation-content">
                                        <ul class="ec-opt-size">
                                            <li class="active"><a href="#" class="ec-opt-sz"
                                                    data-tooltip="Small">S</a></li>
                                            <li><a href="#" class="ec-opt-sz" data-tooltip="Medium">M</a></li>
                                            <li><a href="#" class="ec-opt-sz" data-tooltip="Large">X</a></li>
                                            <li><a href="#" class="ec-opt-sz" data-tooltip="Extra Large">XL</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="ec-quickview-qty">
                                <div class="qty-plus-minus">
                                    <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                                </div>
                                <div class="ec-quickview-cart ">
                                    <button class="btn btn-primary"><i class="fi-rr-shopping-basket"></i> Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->


<!-- Footer navigation panel for responsive display -->
<div class="ec-nav-toolbar">
    <div class="container">
        <div class="ec-nav-panel">
            <div class="ec-nav-panel-icons">
                <a href="#ec-mobile-menu" class="navbar-toggler-btn ec-header-btn ec-side-toggle"><i
                        class="fi-rr-menu-burger"></i></a>
            </div>
            <div class="ec-nav-panel-icons">
                <a href="#ec-side-cart" class="toggle-cart ec-header-btn ec-side-toggle"><i
                        class="fi-rr-shopping-bag"></i><span
                        class="ec-cart-noti ec-header-count cart-count-lable">3</span></a>
            </div>
            <div class="ec-nav-panel-icons">
                <a href="index.html" class="ec-header-btn"><i class="fi-rr-home"></i></a>
            </div>
            <div class="ec-nav-panel-icons">
                <a href="wishlist.html" class="ec-header-btn"><i class="fi-rr-heart"></i><span
                        class="ec-cart-noti">4</span></a>
            </div>
            <div class="ec-nav-panel-icons">
                <a href="login.html" class="ec-header-btn"><i class="fi-rr-user"></i></a>
            </div>

        </div>
    </div>
</div>
<!-- Footer navigation panel for responsive display end -->


<!-- Cart Floating Button -->
<div class="ec-cart-float">
    <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
        <div class="header-icon"><i class="fi-rr-shopping-basket"></i>
        </div>
        <span class="ec-cart-count cart-count-lable">3</span>
    </a>
</div>
<!-- Cart Floating Button end -->

<!-- Whatsapp -->
<div class="ec-style ec-right-bottom">
    <!-- Start Floating Panel Container -->
    <div class="ec-panel">
        <!-- Panel Header -->
        <div class="ec-header">
            <strong>Need Help?</strong>
            <p>Chat with us on WhatsApp</p>
        </div>
        <!-- Panel Content -->
        <div class="ec-body">
            <ul>
                <!-- Start Single Contact List -->
                <li>
                    <a class="ec-list" data-number="918866774266"
                        data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                        <div class="d-flex bd-highlight">
                            <!-- Profile Picture -->
                            <div class="ec-img-cont">
                                <img src="assets/images/whatsapp/profile_01.jpg" class="ec-user-img"
                                    alt="Profile image">
                                <span class="ec-status-icon"></span>
                            </div>
                            <!-- Display Name & Last Seen -->
                            <div class="ec-user-info">
                                <span>Sahar Darya</span>
                                <p>Sahar left 7 mins ago</p>
                            </div>
                            <!-- Chat iCon -->
                            <div class="ec-chat-icon">
                                <i class="fa fa-whatsapp"></i>
                            </div>
                        </div>
                    </a>
                </li>
                <!--/ End Single Contact List -->
                <!-- Start Single Contact List -->
                <li>
                    <a class="ec-list" data-number="918866774266"
                        data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                        <div class="d-flex bd-highlight">
                            <!-- Profile Picture -->
                            <div class="ec-img-cont">
                                <img src="{{ asset('frontend') }}/assets/images/whatsapp/profile_02.jpg" class="ec-user-img"
                                    alt="Profile image">
                                <span class="ec-status-icon ec-online"></span>
                            </div>
                            <!-- Display Name & Last Seen -->
                            <div class="ec-user-info">
                                <span>Yolduz Rafi</span>
                                <p>Yolduz is online</p>
                            </div>
                            <!-- Chat iCon -->
                            <div class="ec-chat-icon">
                                <i class="fa fa-whatsapp"></i>
                            </div>
                        </div>
                    </a>
                </li>
                <!--/ End Single Contact List -->
                <!-- Start Single Contact List -->
                <li>
                    <a class="ec-list" data-number="918866774266"
                        data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                        <div class="d-flex bd-highlight">
                            <!-- Profile Picture -->
                            <div class="ec-img-cont">
                                <img src="{{ asset('frontend') }}/assets/images/whatsapp/profile_03.jpg" class="ec-user-img"
                                    alt="Profile image">
                                <span class="ec-status-icon ec-offline"></span>
                            </div>
                            <!-- Display Name & Last Seen -->
                            <div class="ec-user-info">
                                <span>Nargis Hawa</span>
                                <p>Nargis left 30 mins ago</p>
                            </div>
                            <!-- Chat iCon -->
                            <div class="ec-chat-icon">
                                <i class="fa fa-whatsapp"></i>
                            </div>
                        </div>
                    </a>
                </li>
                <!--/ End Single Contact List -->
                <!-- Start Single Contact List -->
                <li>
                    <a class="ec-list" data-number="918866774266"
                        data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                        <div class="d-flex bd-highlight">
                            <!-- Profile Picture -->
                            <div class="ec-img-cont">
                                <img src="{{ asset('frontend') }}/assets/images/whatsapp/profile_04.jpg" class="ec-user-img"
                                    alt="Profile image">
                                <span class="ec-status-icon ec-offline"></span>
                            </div>
                            <!-- Display Name & Last Seen -->
                            <div class="ec-user-info">
                                <span>Khadija Mehr</span>
                                <p>Khadija left 50 mins ago</p>
                            </div>
                            <!-- Chat iCon -->
                            <div class="ec-chat-icon">
                                <i class="fa fa-whatsapp"></i>
                            </div>
                        </div>
                    </a>
                </li>
                <!--/ End Single Contact List -->
            </ul>
        </div>
    </div>
    <!--/ End Floating Panel Container -->
    <!-- Start Right Floating Button-->
    <div class="ec-right-bottom">
        <div class="ec-box">
            <div class="ec-button rotateBackward">
                <img class="whatsapp" src="{{ asset('frontend') }}/assets/images/common/whatsapp.png" alt="whatsapp icon">
            </div>
        </div>
    </div>
    <!--/ End Right Floating Button-->
</div>
<!-- Whatsapp end -->

<!-- Feature tools -->
<div class="ec-tools-sidebar-overlay"></div>
<div class="ec-tools-sidebar">
    <div class="tool-title">
        <h3>Features</h3>
    </div>
    {{--  <a href="#" class="ec-tools-sidebar-toggle in-out">
        <img alt="icon" src="{{ asset('frontend') }}/assets/images/common/settings.png">
    </a>  --}}
    <div class="ec-tools-detail">
        <div class="ec-tools-sidebar-content ec-change-color ec-color-desc">
            <h3>Color Scheme</h3>
            <ul class="bg-panel">
                <li class="active" data-color="01"><a href="#" class="colorcode1"></a></li>
                <li data-color="02"><a href="#" class="colorcode2"></a></li>
                <li data-color="03"><a href="#" class="colorcode3"></a></li>
                <li data-color="04"><a href="#" class="colorcode4"></a></li>
                <li data-color="05"><a href="#" class="colorcode5"></a></li>
            </ul>
        </div>
        <div class="ec-tools-sidebar-content">
            <h3>Backgrounds</h3>
            <ul class="bg-panel">
                <li class="bg"><a class="back-bg-1" id="bg-1">Background-1</a></li>
                <li class="bg"><a class="back-bg-2" id="bg-2">Background-2</a></li>
                <li class="bg"><a class="back-bg-3" id="bg-3">Background-3</a></li>
                <li class="bg"><a class="back-bg-4" id="bg-4">Default</a></li>
            </ul>
        </div>
        <div class="ec-tools-sidebar-content">
            <h3>Full Screen mode</h3>
            <div class="ec-fullscreen-mode">
                <div class="ec-fullscreen-switch">
                    <div class="ec-fullscreen-btn">Mode</div>
                    <div class="ec-fullscreen-on">On</div>
                    <div class="ec-fullscreen-off">Off</div>
                </div>
            </div>
        </div>
        <div class="ec-tools-sidebar-content">
            <h3>Dark mode</h3>
            <div class="ec-change-mode">
                <div class="ec-mode-switch">
                    <div class="ec-mode-btn">Mode</div>
                    <div class="ec-mode-on">On</div>
                    <div class="ec-mode-off">Off</div>
                </div>
            </div>
        </div>
        <div class="ec-tools-sidebar-content">
            <h3>RTL mode</h3>
            <div class="ec-change-rtl">
                <div class="ec-rtl-switch">
                    <div class="ec-rtl-btn">Rtl</div>
                    <div class="ec-rtl-on">On</div>
                    <div class="ec-rtl-off">Off</div>
                </div>
            </div>
        </div>
        <div class="ec-tools-sidebar-content">
            <h3>Clear local storage</h3>
            <a class="clear-cach" href="javascript:void(0)">Clear Cache & Default</a>
        </div>
    </div>
</div>
<!-- Feature tools end -->
<!-- jQuery & Slick JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- Vendor JS -->
<script src="{{ asset('frontend') }}/assets/js/vendor/jquery-3.5.1.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/vendor/popper.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/vendor/bootstrap.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/vendor/modernizr-3.11.2.min.js"></script>

<!--Plugins JS-->
<script src="{{ asset('frontend') }}/assets/js/plugins/swiper-bundle.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/countdownTimer.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/scrollup.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/jquery.zoom.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/slick.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/infiniteslidev2.js"></script>
<script src="{{ asset('frontend') }}/assets/js/vendor/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/jquery.sticky-sidebar.js"></script>

<!-- Main Js -->
<script src="{{ asset('frontend') }}/assets/js/vendor/index.js"></script>
<script src="{{ asset('frontend') }}/assets/js/main.js"></script>
</body>



</html>

