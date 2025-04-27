<!-- Header start  -->


<!DOCTYPE html>
<html lang="en">
  @php
    use App\Models\Websetting;
    $websetting=Websetting::first();
@endphp
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $websetting->webtitle_text ?? ''}}</title>
    <meta name="keywords"content="apparel, catalog, clean, ecommerce, ecommerce HTML, electronics, fashion, html eCommerce, html store, minimal, multipurpose, multipurpose ecommerce, online store, responsive ecommerce template, shops" />
    <meta name="description" content="Best ecommerce html template for single and multi vendor store.">
    <meta name="author" content="ashishmaraviya">

    <!-- site Favicon -->
    <link rel="icon" href="{{ asset('uploads/websettings') }}/{{ $websetting->favicon ?? ''}}" sizes="32x32" />
    <link rel="apple-touch-icon" href="{{ asset('uploads/websettings') }}/{{ $websetting->favicon ?? ''}}" />
    <meta name="msapplication-TileImage" content="{{ asset('uploads/websettings') }}/{{ $websetting->favicon ?? ''}}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <!-- jQuery UI Autocomplete স্ক্রিপ্ট -->
    <script>
        $(document).ready(function () {
            $('#search_text').keyup(function () {
                let query = $(this).val();

                if (query.length > 0) {
                    $.ajax({
                        url: "{{ route('searchproductajax') }}",
                        type: "GET",
                        data: { term: query },
                        success: function (data) {
                            let list = $('#search_result_list');
                            list.empty().show();

                            if (data.length > 0) {
                                $.each(data, function (i, item) {
                                    list.append(`
                                        <li style="padding:5px 10px;cursor:pointer;" class="result_item" data-name="${item.name}">
                                            <img src="${item.image}" style="width:30px;height:30px;margin-right:10px;" />
                                            ${item.name} - ৳${item.price}
                                        </li>
                                    `);
                                });
                            } else {
                                list.append(`<li style="padding:5px 10px;">কোনো ফলাফল পাওয়া যায়নি</li>`);
                            }
                        }
                    });
                } else {
                    $('#search_result_list').hide();
                }
            });

            // ক্লিক করলে ইনপুটে সেট হবে
            $(document).on('click', '.result_item', function () {
                let selected = $(this).data('name');
                $('#search_text').val(selected);
                $('#search_result_list').hide();
            });

            // বাইরের ক্লিকে লিস্ট হাইড
            $(document).click(function (e) {
                if (!$(e.target).closest('#search_text, #search_result_list').length) {
                    $('#search_result_list').hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#search_text').on('keyup', function () {
                let searchTerm = $(this).val();

                if (searchTerm.length > 1) {
                    $.ajax({
                        url: "{{ route('searchsubmit') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            name: searchTerm
                        },
                        success: function (res) {
                            if (res.status === 'success') {
                                $('#search_result_box').html(res.html);
                            } else {
                                $('#search_result_box').html('<p style="color:red;">' + res.message + '</p>');
                            }
                        },
                        error: function () {
                            $('#search_result_box').html('<p style="color:red;">সার্ভার সমস্যা হয়েছে।</p>');
                        }
                    });
                } else {
                    $('#search_result_box').empty();
                }
            });
        });
    </script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @if (Session::has('success') || Session::has('error'))
    @php
        $successMessage = Session::get('success');
        $errorMessage = Session::get('error');
    @endphp

    <script>
    $(document).ready(function () {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right",
            timeOut: 5000
        };

        @if ($errorMessage)
            toastr.error("{{ $errorMessage }}");
        @endif

        @if ($successMessage)
            toastr.success("{{ $successMessage }}");
        @endif
    });
    </script>
    @endif
    <!-- Slick CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <!-- css Icon Font -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/vendor/ecicons.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins/animate.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins/jquery-ui.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins/countdownTimer.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins/slick.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins/bootstrap.css" />

    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/demo1.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/responsive.css" />

    <!-- Background css -->
    <link rel="stylesheet" id="bg-switcher-css" href="{{ asset('frontend') }}/assets/css/backgrounds/bg-4.css">
</head>

<body>
    <div id="ec-overlay">
        <div class="ec-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
<header class="ec-header">
    <!--Ec Header Top Start -->



    <div class="header-top"style="background:#0f134f;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col text-left header-top-left d-none d-lg-block">
                    <div class="header-top-social">
                        <span class="social-text text-upper">Follow us on:</span>
                        <ul class="mb-0">
                            <li class="list-inline-item">
                                <a class="hdr-facebook" href="{{ $websetting->facebook ?? ''}}" target="_blank">
                                    <i class="ecicon eci-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="hdr-twitter" href="{{ $websetting->twitter ?? ''}}" target="_blank">
                                    <i class="ecicon eci-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="hdr-instagram" href="{{ $websetting->instagram ?? ''}}" target="_blank">
                                    <i class="ecicon eci-instagram"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="hdr-linkedin" href="{{ $websetting->linkedin ?? ''}}" target="_blank">
                                    <i class="ecicon eci-linkedin"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="hdr-youtube" href="{{ $websetting->youtube ?? ''}}" target="_blank">
                                    <i class="ecicon eci-youtube"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="hdr-whatsapp" href="{{ $websetting->whatsapp ?? ''}}" target="_blank">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Header Top social End -->
                <!-- Header Top Message Start -->
                <div class="col text-center header-top-center">
                    <div class="header-top-message text-upper">
                        <marquee style="color:white;">{{ $websetting->offer_title ?? ''}}</marquee>
                    </div>

                </div>
                <!-- Header Top Message End -->
                <!-- Header Top Language Currency -->
                <div class="col header-top-right d-none d-lg-block">
                    <div class="header-top-lan-curr d-flex justify-content-end">
                        <!-- Currency Start -->
                        <div class="header-top-curr dropdown">
                            <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown" style="color:white;">Currency <i
                                    class="ecicon eci-caret-down" aria-hidden="true"  style="color:white;" ></i></button>
                            <ul class="dropdown-menu">
                                <li class="active"><a class="dropdown-item" href="#">USD $</a></li>
                                <li><a class="dropdown-item" href="#">EUR €</a></li>

                            </ul>
                        </div>
                        <!-- Currency End -->
                        <!-- Language Start -->
                        <div class="header-top-lan dropdown">
                            <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown"  style="color:white;">Language <i
                                    class="ecicon eci-caret-down" aria-hidden="true"  style="color:white;"></i></button>
                            <ul class="dropdown-menu">
                                <li class="active"><a class="dropdown-item" href="#">English</a></li>
                                <li><a class="dropdown-item" href="#">Italiano</a></li>
                            </ul>
                        </div>
                        <!-- Language End -->

                    </div>
                </div>
                <!-- Header Top Language Currency -->
                <!-- Header Top responsive Action -->
                <div class="col d-lg-none ">
                    <div class="ec-header-bottons">
                        <!-- Header User Start -->
                        <div class="ec-header-user dropdown">
                            <button class="dropdown-toggle" data-bs-toggle="dropdown"><i
                                    class="fi-rr-user"></i></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a class="dropdown-item" href="register.html">Register</a></li>
                                <li><a class="dropdown-item" href="checkout.html">Checkout</a></li>
                                <li><a class="dropdown-item" href="login.html">Login</a></li>
                            </ul>
                        </div>
                        <!-- Header User End -->
                        <!-- Header Cart Start -->
                        <a href="{{route('whilist.index')}}" class="ec-header-btn ec-header-wishlist">
                            <div class="header-icon"><i class="fi-rr-heart"></i></div>
                            <span class="ec-header-count">{{ whilistcount() }}</span>
                        </a>
                        <!-- Header Cart End -->
                        <!-- Header Cart Start -->
                        <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
                            <div class="header-icon"><i class="fi-rr-shopping-bag"></i></div>
                            <span class="ec-header-count cart-count-lable">{{ allcartcount() }}</span>
                        </a>
                        <!-- Header Cart End -->
                        <a href="javascript:void(0)" class="ec-header-btn ec-sidebar-toggle">
                            <i class="fi fi-rr-apps" style="color:green;"></i>
                        </a>
                        <!-- Header menu Start -->
                        <a href="#ec-mobile-menu" class="ec-header-btn ec-side-toggle d-lg-none">
                            <i class="fi fi-rr-menu-burger"></i>
                        </a>
                        <!-- Header menu End -->
                    </div>
                </div>
                <!-- Header Top responsive Action -->
            </div>
        </div>
    </div>
    <!-- Ec Header Top  End -->
    <!-- Ec Header Bottom  Start -->
    <div class="ec-header-bottom d-none d-lg-block">
        <div class="container position-relative">
            <div class="row">
                <div class="ec-flex">
                    <!-- Ec Header Logo Start -->
                    <div class="align-self-center">
                        <div class="header-logo">
                            <a href="{{ route('frontend') }}"><img src="{{ asset('uploads/websettings') }}/{{ $websetting->photo ?? ''}}" alt="Site Logo" /><imgclass="dark-logo" src="{{ asset('uploads/websettings') }}/{{ $websetting->photo ?? ''}}" alt="Site Logo"style="display: none;" /></a>
                        </div>
                    </div>
                    <!-- Ec Header Logo End -->

                    <!-- Ec Header Search Start -->
                    <div class="align-self-center">
                        <div class="header-search">
                            <form class="ec-btn-group-form" action="{{ route('searchsubmit') }}" method="POST" id="search-form">
                                @csrf
                                <input class="form-control ec-search-bar" name="search_product" id="search_text" placeholder="Search products..." type="text">
                                <button class="submit" type="submit" name="searchbtn"><i class="fi-rr-search"></i></button>
                            </form>
                            <ul id="search_result_list" style="position:absolute;z-index:999;background:#fff;list-style:none;padding:10px;border:1px solid #ccc;display:none;"></ul>
                        </div>
                    </div>

                    <!-- Ec Header Search End -->

                    <!-- Ec Header Button Start -->
                    <div class="align-self-center">
                        <div class="ec-header-bottons">

                            <!-- Header User Start -->
                            <div class="ec-header-user dropdown">
                                <button class="dropdown-toggle" data-bs-toggle="dropdown"><i
                                        class="fi-rr-user"></i></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a class="dropdown-item" href="register.html">Register</a></li>
                                    <li><a class="dropdown-item" href="checkout.html">Checkout</a></li>
                                    <li><a class="dropdown-item" href="login.html">Login</a></li>
                                </ul>
                            </div>
                            <!-- Header User End -->
                            <!-- Header wishlist Start -->
                            <a href="{{route('whilist.index')}}" class="ec-header-btn ec-header-wishlist">
                                <div class="header-icon"><i class="fi-rr-heart"></i></div>
                                <span class="ec-header-count">{{ whilistcount() }}</span>
                            </a>
                            <!-- Header wishlist End -->
                            <!-- Header Cart Start -->
                            <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
                                <div class="header-icon"><i class="fi-rr-shopping-bag"></i></div>
                                <span class="ec-header-count cart-count-lable">{{ allcartcount() }}</span>
                            </a>
                            <!-- Header Cart End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec Header Button End -->
    <!-- Header responsive Bottom  Start -->
    <div class="ec-header-bottom d-lg-none">
        <div class="container position-relative">
            <div class="row ">

                <!-- Ec Header Logo Start -->
                <div class="col">
                    <div class="header-logo">
                        <a href="index.html"><img src="{{ asset('uploads/websettings') }}/{{ $websetting->photo ?? ''}}" alt="Site Logo" /><img
                                class="dark-logo" src="{{ asset('uploads/websettings') }}/{{ $websetting->photo ?? ''}}" alt="Site Logo"
                                style="display: none;" /></a>
                    </div>
                </div>
                <!-- Ec Header Logo End -->
                <!-- Ec Header Search Start -->
                <div class="col">
                    <div class="header-search">
                        <form class="ec-btn-group-form" action="{{ route('searchsubmit') }}" method="POST" id="search-form">
                            @csrf
                            <input class="form-control ec-search-bar" name="search_product" id="search_text" placeholder="Search products..." type="text">
                            <button class="submit" type="submit" name="searchbtn"><i class="fi-rr-search"></i></button>
                        </form>
                        <ul id="search_result_list" style="position:absolute;z-index:999;background:#fff;list-style:none;padding:10px;border:1px solid #ccc;display:none;"></ul>

                    </div>
                </div>
                <!-- Ec Header Search End -->
            </div>
        </div>
    </div>
    <!-- Header responsive Bottom  End -->
    <!-- EC Main Menu Start -->
    <div id="ec-main-menu-desk" class="d-none d-lg-block sticky-nav"style="background:#0f134f;">
        <div class="container position-relative">
            <div class="row">
                <div class="col-md-12 align-self-center">
                    <div class="ec-main-menu">
                        <a href="javascript:void(0)" class="ec-header-btn ec-sidebar-toggle">
                            <i class="fi fi-rr-apps"style="color:green;"></i>
                        </a>
                        <ul>
                            <li ><a href="index.html">Home</a></li>
                            <li class="dropdown position-static"><a href="javascript:void(0)">Categories</a>
                                <ul class="mega-menu d-block">
                                    <li class="d-flex">
                                        <ul class="d-block">
                                            <li class="menu_title"><a href="javascript:void(0)">Classic
                                                    Variation</a></li>
                                            <li><a href="shop-left-sidebar-col-3.html">Left sidebar 3 column</a>
                                            </li>
                                            <li><a href="shop-left-sidebar-col-4.html">Left sidebar 4 column</a>
                                            </li>
                                            <li><a href="shop-right-sidebar-col-3.html">Right sidebar 3 column</a>
                                            </li>
                                            <li><a href="shop-right-sidebar-col-4.html">Right sidebar 4 column</a>
                                            </li>
                                            <li><a href="shop-full-width.html">Full width 4 column</a></li>
                                        </ul>
                                        <ul class="d-block">
                                            <li class="menu_title"><a href="javascript:void(0)">Classic
                                                    Variation</a></li>
                                            <li><a href="shop-banner-left-sidebar-col-3.html">Banner left sidebar 3
                                                    column</a></li>
                                            <li><a href="shop-banner-left-sidebar-col-4.html">Banner left sidebar 4
                                                    column</a></li>
                                            <li><a href="shop-banner-right-sidebar-col-3.html">Banner right sidebar
                                                    3 column</a></li>
                                            <li><a href="shop-banner-right-sidebar-col-4.html">Banner right sidebar
                                                    4 column</a></li>
                                            <li><a href="shop-banner-full-width.html">Banner Full width 4 column</a>
                                            </li>
                                        </ul>
                                        <ul class="d-block">
                                            <li class="menu_title"><a href="javascript:void(0)">Columns
                                                    Variation</a></li>
                                            <li><a href="shop-full-width-col-3.html">3 Columns full width</a></li>
                                            <li><a href="shop-full-width-col-4.html">4 Columns full width</a></li>
                                            <li><a href="shop-full-width-col-5.html">5 Columns full width</a></li>
                                            <li><a href="shop-full-width-col-6.html">6 Columns full width</a></li>
                                            <li><a href="shop-banner-full-width-col-3.html">Banner 3 Columns</a>
                                            </li>
                                        </ul>
                                        <ul class="d-block">
                                            <li class="menu_title"><a href="javascript:void(0)">List Variation</a>
                                            </li>
                                            <li><a href="shop-list-left-sidebar.html">Shop left sidebar</a></li>
                                            <li><a href="shop-list-right-sidebar.html">Shop right sidebar</a></li>
                                            <li><a href="shop-list-banner-left-sidebar.html">Banner left sidebar</a>
                                            </li>
                                            <li><a href="shop-list-banner-right-sidebar.html">Banner right
                                                    sidebar</a></li>
                                            <li><a href="shop-list-full-col-2.html">Full width 2 columns</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul class="ec-main-banner w-100">
                                            <li><a class="p-0" href="shop-left-sidebar-col-3.html"><img
                                                        class="img-responsive" src="assets/images/menu-banner/1.jpg"
                                                        alt=""></a></li>
                                            <li><a class="p-0" href="shop-left-sidebar-col-4.html"><img
                                                        class="img-responsive" src="assets/images/menu-banner/2.jpg"
                                                        alt=""></a></li>
                                            <li><a class="p-0" href="shop-right-sidebar-col-3.html"><img
                                                        class="img-responsive" src="assets/images/menu-banner/3.jpg"
                                                        alt=""></a></li>
                                            <li><a class="p-0" href="shop-right-sidebar-col-4.html"><img
                                                        class="img-responsive" src="assets/images/menu-banner/4.jpg"
                                                        alt=""></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="javascript:void(0)">Products</a>
                                <ul class="sub-menu">
                                    <li class="dropdown position-static"><a href="javascript:void(0)">Product page
                                            <i class="ecicon eci-angle-right"></i></a>
                                        <ul class="sub-menu sub-menu-child">
                                            <li><a href="product-left-sidebar.html">Product left sidebar</a></li>
                                            <li><a href="product-right-sidebar.html">Product right sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown position-static"><a href="javascript:void(0)">Product 360
                                            <i class="ecicon eci-angle-right"></i></a>
                                        <ul class="sub-menu sub-menu-child">
                                            <li><a href="product-360-left-sidebar.html">360 left sidebar</a></li>
                                            <li><a href="product-360-right-sidebar.html">360 right sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown position-static"><a href="javascript:void(0)">Product video
                                            <i class="ecicon eci-angle-right"></i></a>
                                        <ul class="sub-menu sub-menu-child">
                                            <li><a href="product-video-left-sidebar.html">Video left sidebar</a>
                                            </li>
                                            <li><a href="product-video-right-sidebar.html">Video right sidebar</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown position-static"><a href="javascript:void(0)">Product
                                            gallery
                                            <i class="ecicon eci-angle-right"></i></a>
                                        <ul class="sub-menu sub-menu-child">
                                            <li><a href="product-gallery-left-sidebar.html">Gallery left sidebar</a>
                                            </li>
                                            <li><a href="product-gallery-right-sidebar.html">Gallery right
                                                    sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="product-full-width.html">Product full width</a></li>
                                    <li><a href="product-360-full-width.html">360 full width</a></li>
                                    <li><a href="product-video-full-width.html">Video full width</a></li>
                                    <li><a href="product-gallery-full-width.html">Gallery full width</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="javascript:void(0)">Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="contact-us.html">Contact Us</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="compare.html">Compare</a></li>
                                    <li><a href="faq.html">FAQ</a></li>
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="register.html">Register</a></li>
                                    <li><a href="track-order.html">Track Order</a></li>
                                    <li><a href="terms-condition.html">Terms Condition</a></li>
                                    <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><span class="main-label-note-new" data-toggle="tooltip"
                                    title="NEW"></span><a href="javascript:void(0)">Others</a>
                                <ul class="sub-menu">
                                    <li class="dropdown position-static"><a href="javascript:void(0)">Mail
                                            Confirmation
                                            <i class="ecicon eci-angle-right"></i></a>
                                        <ul class="sub-menu sub-menu-child">
                                            <li><a href="email-template-confirm-1.html">Mail Confirmation 1</a></li>
                                            <li><a href="email-template-confirm-2.html">Mail Confirmation 2</a></li>
                                            <li><a href="email-template-confirm-3.html">Mail Confirmation 3</a></li>
                                            <li><a href="email-template-confirm-4.html">Mail Confirmation 4</a></li>
                                            <li><a href="email-template-confirm-5.html">Mail Confirmation 5</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown position-static"><a href="javascript:void(0)">Mail Reset
                                            password
                                            <i class="ecicon eci-angle-right"></i></a>
                                        <ul class="sub-menu sub-menu-child">
                                            <li><a href="email-template-forgot-password-1.html">Reset password 1</a>
                                            </li>
                                            <li><a href="email-template-forgot-password-2.html">Reset password 2</a>
                                            </li>
                                            <li><a href="email-template-forgot-password-3.html">Reset password 3</a>
                                            </li>
                                            <li><a href="email-template-forgot-password-4.html">Reset password 4</a>
                                            </li>
                                            <li><a href="email-template-forgot-password-5.html">Reset password 5</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown position-static"><a href="javascript:void(0)">Mail
                                            Promotional
                                            <i class="ecicon eci-angle-right"></i></a>
                                        <ul class="sub-menu sub-menu-child">
                                            <li><a href="email-template-offers-1.html">Offer mail 1</a></li>
                                            <li><a href="email-template-offers-2.html">Offer mail 2</a></li>
                                            <li><a href="email-template-offers-3.html">Offer mail 3</a></li>
                                            <li><a href="email-template-offers-4.html">Offer mail 4</a></li>
                                            <li><a href="email-template-offers-5.html">Offer mail 5</a></li>
                                            <li><a href="email-template-offers-6.html">Offer mail 6</a></li>
                                            <li><a href="email-template-offers-7.html">Offer mail 7</a></li>
                                            <li><a href="email-template-offers-8.html">Offer mail 8</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown position-static">
                                        <span class="label-note-hot"></span>
                                        <a href="javascript:void(0)">Vendor account pages
                                            <i class="ecicon eci-angle-right"></i></a>
                                        <ul class="sub-menu sub-menu-child">
                                            <li><a href="vendor-dashboard.html">Vendor Dashboard</a></li>
                                            <li><a href="vendor-profile.html">Vendor Profile</a></li>
                                            <li><a href="vendor-uploads.html">Vendor Uploads</a></li>
                                            <li><a href="vendor-settings.html">Vendor Settings</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown position-static">
                                        <span class="label-note-trending"></span>
                                        <a href="javascript:void(0)">User account pages
                                            <i class="ecicon eci-angle-right"></i></a>
                                        <ul class="sub-menu sub-menu-child">
                                            <li><a href="user-profile.html">User Profile</a></li>
                                            <li><a href="user-history.html">History</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="track-order.html">Track Order</a></li>
                                            <li><a href="user-invoice.html">Invoice</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown position-static"><a href="javascript:void(0)">Construction
                                            pages
                                            <i class="ecicon eci-angle-right"></i></a>
                                        <ul class="sub-menu sub-menu-child">
                                            <li><a href="404-error-page.html">404 error page</a></li>
                                            <li><a href="under-maintenance.html">maintanence page</a></li>
                                            <li><a href="coming-soon.html">Coming soon page</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown position-static">
                                        <span class="label-note-new"></span>
                                        <a href="javascript:void(0)">Vendor Catalog pages
                                            <i class="ecicon eci-angle-right"></i></a>
                                        <ul class="sub-menu sub-menu-child">
                                            <li><a href="catalog-single-vendor.html">Catalog Single Vendor</a></li>
                                            <li><a href="catalog-multi-vendor.html">Catalog Multi Vendor</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="javascript:void(0)">Blog</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-left-sidebar.html">Blog left sidebar</a></li>
                                    <li><a href="blog-right-sidebar.html">Blog right sidebar</a></li>
                                    <li><a href="blog-detail-left-sidebar.html">Blog detail left sidebar</a></li>
                                    <li><a href="blog-detail-right-sidebar.html">Blog detail right sidebar</a></li>
                                    <li><a href="blog-full-width.html">Blog full width</a></li>
                                    <li><a href="blog-detail-full-width.html">Blog detail full width</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="javascript:void(0)">Elements</a>
                                <ul class="sub-menu">
                                    <li><a href="elemets-products.html">Products</a></li>
                                    <li><a href="elemets-typography.html">Typography</a></li>
                                    <li><a href="elemets-title.html">Titles</a></li>
                                    <li><a href="elemets-categories.html">Categories</a></li>
                                    <li><a href="elemets-buttons.html">Buttons</a></li>
                                    <li><a href="elemets-tabs.html">Tabs</a></li>
                                    <li><a href="elemets-accordions.html">Accordions</a></li>
                                    <li><a href="elemets-blog.html">Blogs</a></li>
                                </ul>
                            </li>
                            <li><a href="offer.html">Hot Offers</a></li>
                            <li class="dropdown scroll-to"><a href="javascript:void(0)"><i
                                        class="fi fi-rr-sort-amount-down-alt"></i></a>
                                <ul class="sub-menu">
                                    <li class="menu_title">Scroll To Section</li>
                                    <li><a href="javascript:void(0)" data-scroll="collection" class="nav-scroll">Top
                                            Collection</a></li>
                                    <li><a href="javascript:void(0)" data-scroll="categories"
                                            class="nav-scroll">Categories</a></li>
                                    <li><a href="javascript:void(0)" data-scroll="offers"
                                            class="nav-scroll">Offers</a></li>
                                    <li><a href="javascript:void(0)" data-scroll="vendors" class="nav-scroll">Top
                                            Vendors</a></li>
                                    <li><a href="javascript:void(0)" data-scroll="services"
                                            class="nav-scroll">Services</a></li>
                                    <li><a href="javascript:void(0)" data-scroll="arrivals" class="nav-scroll">New
                                            Arrivals</a></li>
                                    <li><a href="javascript:void(0)" data-scroll="reviews" class="nav-scroll">Client
                                            Review</a></li>
                                    <li><a href="javascript:void(0)" data-scroll="insta"
                                            class="nav-scroll">Instagram Feed</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec Main Menu End -->
    <!-- ekka Mobile Menu Start -->
    <div id="ec-mobile-menu" class="ec-side-cart ec-mobile-menu">
        <div class="ec-menu-title">
            <span class="menu_title">My Menu</span>
            <button class="ec-close">×</button>
        </div>
        <div class="ec-menu-inner">
            <div class="ec-menu-content">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="javascript:void(0)">Categories</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="javascript:void(0)">Classic Variation</a>
                                <ul class="sub-menu">
                                    <li><a href="shop-left-sidebar-col-3.html">Left sidebar 3 column</a></li>
                                    <li><a href="shop-left-sidebar-col-4.html">Left sidebar 4 column</a></li>
                                    <li><a href="shop-right-sidebar-col-3.html">Right sidebar 3 column</a></li>
                                    <li><a href="shop-right-sidebar-col-4.html">Right sidebar 4 column</a></li>
                                    <li><a href="shop-full-width.html">Full width 4 column</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Classic Variation</a>
                                <ul class="sub-menu">
                                    <li><a href="shop-banner-left-sidebar-col-3.html">Banner left sidebar 3
                                            column</a></li>
                                    <li><a href="shop-banner-left-sidebar-col-4.html">Banner left sidebar 4
                                            column</a></li>
                                    <li><a href="shop-banner-right-sidebar-col-3.html">Banner right sidebar 3
                                            column</a></li>
                                    <li><a href="shop-banner-right-sidebar-col-4.html">Banner right sidebar 4
                                            column</a></li>
                                    <li><a href="shop-banner-full-width.html">Banner Full width 4 column</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Columns Variation</a>
                                <ul class="sub-menu">
                                    <li><a href="shop-full-width-col-3.html">3 Columns full width</a></li>
                                    <li><a href="shop-full-width-col-4.html">4 Columns full width</a></li>
                                    <li><a href="shop-full-width-col-5.html">5 Columns full width</a></li>
                                    <li><a href="shop-full-width-col-6.html">6 Columns full width</a></li>
                                    <li><a href="shop-banner-full-width-col-3.html">Banner 3 Columns</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">List Variation</a>
                                <ul class="sub-menu">
                                    <li><a href="shop-list-left-sidebar.html">Shop left sidebar</a></li>
                                    <li><a href="shop-list-right-sidebar.html">Shop right sidebar</a></li>
                                    <li><a href="shop-list-banner-left-sidebar.html">Banner left sidebar</a></li>
                                    <li><a href="shop-list-banner-right-sidebar.html">Banner right sidebar</a></li>
                                    <li><a href="shop-list-full-col-2.html">Full width 2 columns</a></li>
                                </ul>
                            </li>
                            <li><a class="p-0" href="shop-left-sidebar-col-3.html"><img class="img-responsive"
                                        src="assets/images/menu-banner/1.jpg" alt=""></a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0)">Products</a>
                        <ul class="sub-menu">
                            <li><a href="javascript:void(0)">Product page</a>
                                <ul class="sub-menu">
                                    <li><a href="product-left-sidebar.html">Product left sidebar</a></li>
                                    <li><a href="product-right-sidebar.html">Product right sidebar</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)">Product 360</a>
                                <ul class="sub-menu">
                                    <li><a href="product-360-left-sidebar.html">360 left sidebar</a></li>
                                    <li><a href="product-360-right-sidebar.html">360 right sidebar</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)">Product vodeo</a>
                                <ul class="sub-menu">
                                    <li><a href="product-video-left-sidebar.html">vodeo left sidebar</a></li>
                                    <li><a href="product-video-right-sidebar.html">vodeo right sidebar</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)">Product gallery</a>
                                <ul class="sub-menu">
                                    <li><a href="product-gallery-left-sidebar.html">Gallery left sidebar</a></li>
                                    <li><a href="product-gallery-right-sidebar.html">Gallery right sidebar</a></li>
                                </ul>
                            </li>
                            <li><a href="product-full-width.html">Product full width</a></li>
                            <li><a href="product-360-full-width.html">360 full width</a></li>
                            <li><a href="product-video-full-width.html">Video full width</a></li>
                            <li><a href="product-gallery-full-width.html">Gallery full width</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0)">Others</a>
                        <ul class="sub-menu">
                            <li><a href="javascript:void(0)">Mail Confirmation</a>
                                <ul class="sub-menu">
                                    <li><a href="email-template-confirm-1.html">Mail Confirmation 1</a></li>
                                    <li><a href="email-template-confirm-2.html">Mail Confirmation 2</a></li>
                                    <li><a href="email-template-confirm-3.html">Mail Confirmation 3</a></li>
                                    <li><a href="email-template-confirm-4.html">Mail Confirmation 4</a></li>
                                    <li><a href="email-template-confirm-5.html">Mail Confirmation 5</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)">Mail Reset password</a>
                                <ul class="sub-menu">
                                    <li><a href="email-template-forgot-password-1.html">Reset password 1</a></li>
                                    <li><a href="email-template-forgot-password-2.html">Reset password 2</a></li>
                                    <li><a href="email-template-forgot-password-3.html">Reset password 3</a></li>
                                    <li><a href="email-template-forgot-password-4.html">Reset password 4</a></li>
                                    <li><a href="email-template-forgot-password-5.html">Reset password 5</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)">Mail Promotional</a>
                                <ul class="sub-menu">
                                    <li><a href="email-template-offers-1.html">Offer Mail 1</a></li>
                                    <li><a href="email-template-offers-2.html">Offer Mail 2</a></li>
                                    <li><a href="email-template-offers-3.html">Offer Mail 3</a></li>
                                    <li><a href="email-template-offers-4.html">Offer Mail 4</a></li>
                                    <li><a href="email-template-offers-5.html">Offer Mail 5</a></li>
                                    <li><a href="email-template-offers-6.html">Offer Mail 6</a></li>
                                    <li><a href="email-template-offers-7.html">Offer Mail 7</a></li>
                                    <li><a href="email-template-offers-8.html">Offer Mail 8</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)">Vendor Account Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="vendor-dashboard.html">Vendor Dashboard</a></li>
                                    <li><a href="vendor-profile.html">Vendor Profile</a></li>
                                    <li><a href="vendor-uploads.html">Vendor Uploads</a></li>
                                    <li><a href="vendor-settings.html">Vendor Settings</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)">User Account Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="user-profile.html">User Profile</a></li>
                                    <li><a href="user-history.html">User History</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="track-order.html">Track Order</a></li>
                                    <li><a href="user-invoice.html">User Invoice</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)">Construction Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="404-error-page.html">404 Error Page</a></li>
                                    <li><a href="under-maintenance.html">Maintenance Page</a></li>
                                    <li><a href="coming-soon.html">Comming Soon Page</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)">Vendor Catalog Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="catalog-single-vendor.html">Catalog Single Vendor</a></li>
                                    <li><a href="catalog-multi-vendor.html">Catalog Multi Vendor</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0)">Pages</a>
                        <ul class="sub-menu">
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="contact-us.html">Contact Us</a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="compare.html">Compare</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="register.html">Register</a></li>
                            <li><a href="track-order.html">Track Order</a></li>
                            <li><a href="terms-condition.html">Terms Condition</a></li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="javascript:void(0)">Blog</a>
                        <ul class="sub-menu">
                            <li><a href="blog-left-sidebar.html">Blog left sidebar</a></li>
                            <li><a href="blog-right-sidebar.html">Blog right sidebar</a></li>
                            <li><a href="blog-detail-left-sidebar.html">Blog detail left sidebar</a></li>
                            <li><a href="blog-detail-right-sidebar.html">Blog detail right sidebar</a></li>
                            <li><a href="blog-full-width.html">Blog full width</a></li>
                            <li><a href="blog-detail-full-width.html">Blog detail full width</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="javascript:void(0)">Elements</a>
                        <ul class="sub-menu">
                            <li><a href="elemets-products.html">Products</a></li>
                            <li><a href="elemets-typography.html">Typography</a></li>
                            <li><a href="elemets-title.html">Titles</a></li>
                            <li><a href="elemets-categories.html">Categories</a></li>
                            <li><a href="elemets-buttons.html">Buttons</a></li>
                            <li><a href="elemets-tabs.html">Tabs</a></li>
                            <li><a href="elemets-accordions.html">Accordions</a></li>
                            <li><a href="elemets-blog.html">Blogs</a></li>
                        </ul>
                    </li>
                    <li><a href="offer.html">Hot Offers</a></li>
                </ul>
            </div>
            <div class="header-res-lan-curr">
                <div class="header-top-lan-curr">
                    <!-- Language Start -->
                    <div class="header-top-lan dropdown">
                        <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Language <i
                                class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                        <ul class="dropdown-menu">
                            <li class="active"><a class="dropdown-item" href="#">English</a></li>
                            <li><a class="dropdown-item" href="#">Italiano</a></li>
                        </ul>
                    </div>
                    <!-- Language End -->
                    <!-- Currency Start -->
                    <div class="header-top-curr dropdown">
                        <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Currency <i
                                class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                        <ul class="dropdown-menu">
                            <li class="active"><a class="dropdown-item" href="#">USD $</a></li>
                            <li><a class="dropdown-item" href="#">EUR €</a></li>
                        </ul>
                    </div>
                    <!-- Currency End -->
                </div>
                <!-- Social Start -->
                <div class="header-res-social">
                    <div class="header-top-social">
                        <ul class="mb-0">
                            <li class="list-inline-item"><a class="hdr-facebook" href="#"><i
                                        class="ecicon eci-facebook"></i></a></li>
                            <li class="list-inline-item"><a class="hdr-twitter" href="#"><i
                                        class="ecicon eci-twitter"></i></a></li>
                            <li class="list-inline-item"><a class="hdr-instagram" href="#"><i
                                        class="ecicon eci-instagram"></i></a></li>
                            <li class="list-inline-item"><a class="hdr-linkedin" href="#"><i
                                        class="ecicon eci-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- Social End -->
            </div>
        </div>
    </div>
    <!-- ekka mobile Menu End -->

</header>
<!-- Header End  -->
