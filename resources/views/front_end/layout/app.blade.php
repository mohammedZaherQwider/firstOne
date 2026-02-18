<!doctype html>

<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Right Guide</title>
    <!-- Required meta tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="copyright" content="" />

    {{--   --}}
    <link rel="icon" href="{{ asset('assets/front_end/images/icon.svg') }}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-rtl.min.css"> -->

    <link rel="stylesheet" href="{{ asset('assets/front_end/plugins/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front_end/plugins/animate/animate.css') }}">
    <!-- owl slider CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front_end/plugins/owlslider/assets/owl.carousel.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/front_end/plugins/fancybox/jquery.fancybox.min.css') }}" />

    <!-- <link rel="stylesheet" href="assets/css/style-en.css"> -->
    {{--  --}}
    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
            integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ asset('assets/front_end/css/style.css') }}">
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('assets/front_end/cssRTL/style.css') }}">
    @endif
    <style>
        .circle-img {
            width: 120px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            flex-shrink: 0;
        }

        .circle-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
    </style>


</head>

<body>

    <!-- pre-loader -->
    <section class="pre-loader">
        <div class="loader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </section>
    <!-- pre-loader -->

    <!-- Side Menu -->
    <aside class="side-menu">
        <div class="text-right">
            <button class="bg-transparent border-0 btn text-muted btn-lg" id="closeMenu">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="scroll-menu">
            <nav class="scrollspy_menu">
                <ul class="navbar-nav">
                    <li class="nav-item active underline_header_titles">
                        <a class="nav-link" href="index.html">{{ __('front.main') }} </a>
                    </li>
                    <li class="nav-item">
                        <div class="cs-dropdown">

                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="achievements"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ __('site.health_services') }}
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="achievements">
                                    <li><a class="dropdown-item"
                                            href="service-details.html">{{ __('site.health_insurance') }}</a></li>
                                    {{-- <li><a class="dropdown-item" href="service-details.html">الاستشارات القانونية</a> --}}
                    </li>
                </ul>
        </div>
        </div>
        </li>
        {{-- <li class="nav-item">
                        <a class="nav-link" href="contact-us.html">{{__('front.contect') }}</a>
                    </li> --}}
        <li class="nav-item">
            <a href="#" class="btn cs-btn">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="26.605" height="24" viewBox="0 0 26.605 24">
                        <g id="Group_63524" data-name="Group 63524" transform="translate(-371.4 -32)">
                            <g id="Pin_-_1" data-name="Pin - 1" transform="translate(375.232 32)">
                                <g id="Group_63492" data-name="Group 63492">
                                    <path id="Path_42105" data-name="Path 42105"
                                        d="M447.555,329.927a1.624,1.624,0,0,1-1.274-.613c-2.93-3.668-6.477-8.12-6.727-8.5-.109-.165-.214-.337-.313-.51a1.474,1.474,0,0,1,1.273-2.211h1.521a1.47,1.47,0,0,1,1.255.707,1.869,1.869,0,0,0,1.653.819h4.47a3.574,3.574,0,0,0,1.584-2.7,2,2,0,0,0-.364-1.416,1.191,1.191,0,0,0-.844-.325h-1.915a1.372,1.372,0,0,1-1.223-.6,1.418,1.418,0,0,1,0-1.412l.015-.03.378-.679a1.325,1.325,0,0,0,0-1.5l-2.308,3.422a1.809,1.809,0,0,1-1.5.8h-3.567a1.468,1.468,0,0,1-1.156-.559,1.451,1.451,0,0,1-.28-1.235,9.589,9.589,0,0,1,2.538-4.6l.048-.048a9.506,9.506,0,0,1,13.477,0l.048.048a9.607,9.607,0,0,1,1.24,12c-.038.059-.154.237-6.751,8.531a1.624,1.624,0,0,1-1.276.617Zm-7.041-10.418a.047.047,0,0,0-.047.026.06.06,0,0,0,0,.065c.084.147.174.293.267.434.19.282,2.739,3.5,6.65,8.4a.215.215,0,0,0,.169.081h0a.215.215,0,0,0,.171-.083c3.933-4.946,6.485-8.168,6.679-8.433a8.188,8.188,0,0,0-1.063-10.219l-.048-.048a8.092,8.092,0,0,0-11.473,0l-.048.049a8.174,8.174,0,0,0-2.162,3.925.034.034,0,0,0,.009.033.059.059,0,0,0,.048.024h3.567a.4.4,0,0,0,.328-.175l2.357-3.495a1.345,1.345,0,0,1,2.065-.2,2.644,2.644,0,0,1,.288,3.267l-.336.6h1.853a2.614,2.614,0,0,1,1.866.761,3.219,3.219,0,0,1,.756,2.457c-.1,2.345-2.089,4.059-2.9,4.059h-4.564a3.249,3.249,0,0,1-2.857-1.491.067.067,0,0,0-.052-.035Zm8.857.13Z"
                                        transform="translate(-438.194 -305.927)" fill="#ff9f2d" />
                                </g>
                            </g>
                            <path id="Path_42106" data-name="Path 42106"
                                d="M451.7,336.415l-.079.1a.059.059,0,0,0,.042.1c2.263.234,3.684.571,3.684.945,0,.7-5.044,1.274-11.264,1.274s-11.264-.571-11.264-1.274c0-.357,1.282-.678,3.347-.91a.06.06,0,0,0,.041-.1l-.078-.1a.059.059,0,0,0-.054-.023c-3.217.363-5.295.942-5.295,1.592,0,1.1,5.956,2,13.3,2s13.3-.893,13.3-2c0-.673-2.225-1.268-5.631-1.63A.061.061,0,0,0,451.7,336.415Z"
                                transform="translate(-59.379 -288.601)" fill="#00ce68" />
                        </g>
                    </svg>

                </span>
                VIP
            </a>
        </li>
        <li>
            <a href="login.html" class="btn cs-btn v2">{{ __('front.login') }} </a>
        </li>
        </ul>
        </nav>
        <div class="lang d-lg-block d-none">
            <a href="#">
                <label for="">EN</label>
                <span class="show">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                        <g id="vuesax_bulk_global" data-name="vuesax/bulk/global" transform="translate(-174 -254)">
                            <g id="global">
                                <path id="Vector"
                                    d="M4.59,4.57c-.03,0-.07.02-.1.02A10.006,10.006,0,0,1,0,.1C0,.07.02.03.02,0A31.893,31.893,0,0,0,3.75.84,33.548,33.548,0,0,0,4.59,4.57Z"
                                    transform="translate(175.06 268.34)" fill="#e2e2e2" />
                                <path id="Vector-2" data-name="Vector"
                                    d="M4.65.11A10.093,10.093,0,0,1,0,4.68,30.563,30.563,0,0,0,.91.84,31.281,31.281,0,0,0,4.63,0C4.62.04,4.65.08,4.65.11Z"
                                    transform="translate(188.29 268.34)" fill="#e2e2e2" />
                                <path id="Vector-3" data-name="Vector"
                                    d="M4.73,4.73A31.643,31.643,0,0,0,.91,3.82,27.914,27.914,0,0,0,0,0,10.052,10.052,0,0,1,4.73,4.73Z"
                                    transform="translate(188.29 254.98)" fill="#e2e2e2" />
                                <path id="Vector-4" data-name="Vector"
                                    d="M4.67.03a31.248,31.248,0,0,0-.83,3.72A28.87,28.87,0,0,0,0,4.65,10.093,10.093,0,0,1,4.57,0C4.6,0,4.64.03,4.67.03Z"
                                    transform="translate(174.98 255.06)" fill="#e2e2e2" />
                                <path id="Vector-5" data-name="Vector"
                                    d="M6.98,4.59A31.328,31.328,0,0,0,0,4.59,28.373,28.373,0,0,1,1.02.53,1.635,1.635,0,0,0,1.04.31,10.406,10.406,0,0,1,3.49,0,10.322,10.322,0,0,1,5.93.31a1.66,1.66,0,0,0,.03.22A28.712,28.712,0,0,1,6.98,4.59Z"
                                    transform="translate(180.51 254)" fill="#05060f" />
                                <path id="Vector-6" data-name="Vector"
                                    d="M4.59,6.98A28.043,28.043,0,0,1,.53,5.96a1.635,1.635,0,0,0-.22-.02A10.406,10.406,0,0,1,0,3.49,10.322,10.322,0,0,1,.31,1.05a1.66,1.66,0,0,0,.22-.03A29.77,29.77,0,0,1,4.59,0,32.574,32.574,0,0,0,4.59,6.98Z"
                                    transform="translate(174 260.51)" fill="#05060f" />
                                <path id="Vector-7" data-name="Vector"
                                    d="M4.59,3.49a10.406,10.406,0,0,1-.31,2.45,1.635,1.635,0,0,0-.22.02A30.143,30.143,0,0,1,0,6.98,31.329,31.329,0,0,0,0,0,28.373,28.373,0,0,1,4.06,1.02a.833.833,0,0,0,.22.03A10.389,10.389,0,0,1,4.59,3.49Z"
                                    transform="translate(189.41 260.51)" fill="#05060f" />
                                <path id="Vector-8" data-name="Vector"
                                    d="M6.98,0A28.043,28.043,0,0,1,5.96,4.06a1.66,1.66,0,0,0-.03.22,10.322,10.322,0,0,1-2.44.31,10.406,10.406,0,0,1-2.45-.31,1.635,1.635,0,0,0-.02-.22A29.77,29.77,0,0,1,0,0,31.29,31.29,0,0,0,3.49.22,31.14,31.14,0,0,0,6.98,0Z"
                                    transform="translate(180.51 269.41)" fill="#05060f" />
                                <path id="Vector-9" data-name="Vector"
                                    d="M7.763,7.763a30.039,30.039,0,0,1-7.527,0,30.039,30.039,0,0,1,0-7.527,30.039,30.039,0,0,1,7.527,0A30.039,30.039,0,0,1,7.763,7.763Z"
                                    transform="translate(180 260)" fill="#05060f" />
                            </g>
                        </g>
                    </svg>
                </span>
                <span class="hide">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                        <g id="vuesax_bulk_global" data-name="vuesax/bulk/global" transform="translate(-174 -254)">
                            <g id="global">
                                <path id="Vector"
                                    d="M4.59,4.57c-.03,0-.07.02-.1.02A10.006,10.006,0,0,1,0,.1C0,.07.02.03.02,0A31.893,31.893,0,0,0,3.75.84,33.548,33.548,0,0,0,4.59,4.57Z"
                                    transform="translate(175.06 268.34)" fill="rgba(237,27,36,0.4)" />
                                <path id="Vector-2" data-name="Vector"
                                    d="M4.65.11A10.093,10.093,0,0,1,0,4.68,30.563,30.563,0,0,0,.91.84,31.281,31.281,0,0,0,4.63,0C4.62.04,4.65.08,4.65.11Z"
                                    transform="translate(188.29 268.34)" fill="rgba(237,27,36,0.4)" />
                                <path id="Vector-3" data-name="Vector"
                                    d="M4.73,4.73A31.643,31.643,0,0,0,.91,3.82,27.914,27.914,0,0,0,0,0,10.052,10.052,0,0,1,4.73,4.73Z"
                                    transform="translate(188.29 254.98)" fill="rgba(237,27,36,0.4)" />
                                <path id="Vector-4" data-name="Vector"
                                    d="M4.67.03a31.248,31.248,0,0,0-.83,3.72A28.87,28.87,0,0,0,0,4.65,10.093,10.093,0,0,1,4.57,0C4.6,0,4.64.03,4.67.03Z"
                                    transform="translate(174.98 255.06)" fill="rgba(237,27,36,0.4)" />
                                <path id="Vector-5" data-name="Vector"
                                    d="M6.98,4.59A31.328,31.328,0,0,0,0,4.59,28.373,28.373,0,0,1,1.02.53,1.635,1.635,0,0,0,1.04.31,10.406,10.406,0,0,1,3.49,0,10.322,10.322,0,0,1,5.93.31a1.66,1.66,0,0,0,.03.22A28.712,28.712,0,0,1,6.98,4.59Z"
                                    transform="translate(180.51 254)" fill="#be1e2d" />
                                <path id="Vector-6" data-name="Vector"
                                    d="M4.59,6.98A28.043,28.043,0,0,1,.53,5.96a1.635,1.635,0,0,0-.22-.02A10.406,10.406,0,0,1,0,3.49,10.322,10.322,0,0,1,.31,1.05a1.66,1.66,0,0,0,.22-.03A29.77,29.77,0,0,1,4.59,0,32.574,32.574,0,0,0,4.59,6.98Z"
                                    transform="translate(174 260.51)" fill="#be1e2d" />
                                <path id="Vector-7" data-name="Vector"
                                    d="M4.59,3.49a10.406,10.406,0,0,1-.31,2.45,1.635,1.635,0,0,0-.22.02A30.143,30.143,0,0,1,0,6.98,31.329,31.329,0,0,0,0,0,28.373,28.373,0,0,1,4.06,1.02a.833.833,0,0,0,.22.03A10.389,10.389,0,0,1,4.59,3.49Z"
                                    transform="translate(189.41 260.51)" fill="#be1e2d" />
                                <path id="Vector-8" data-name="Vector"
                                    d="M6.98,0A28.043,28.043,0,0,1,5.96,4.06a1.66,1.66,0,0,0-.03.22,10.322,10.322,0,0,1-2.44.31,10.406,10.406,0,0,1-2.45-.31,1.635,1.635,0,0,0-.02-.22A29.77,29.77,0,0,1,0,0,31.29,31.29,0,0,0,3.49.22,31.14,31.14,0,0,0,6.98,0Z"
                                    transform="translate(180.51 269.41)" fill="#be1e2d" />
                                <path id="Vector-9" data-name="Vector"
                                    d="M7.763,7.763a30.039,30.039,0,0,1-7.527,0,30.039,30.039,0,0,1,0-7.527,30.039,30.039,0,0,1,7.527,0A30.039,30.039,0,0,1,7.763,7.763Z"
                                    transform="translate(180 260)" fill="#be1e2d" />
                            </g>
                        </g>
                    </svg>
                </span>

            </a>
        </div>
        </div>
    </aside>

    <div class="side-overlay"></div>
    <!-- Side Menu -->

    <!-- Main header -->
    <header class="main-header fixed-top">

        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <a href="{{ route('index') }}" class="logo">
                    <img src="{{ asset('assets/front_end/images/logo.svg') }}" alt="" srcset=""
                        loading="lazy">
                </a>
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item active underline_header_titles">
                            <a class="nav-link" href="{{ route('index') }}">{{ __('front.main') }} </a>
                        </li>
                        <li class="nav-item">
                            <div class="cs-dropdown">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="achievements"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ __('site.health_services') }}
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="achievements">
                                        <li><a class="dropdown-item"
                                                href="{{ route('service-details') }}">{{ __('site.health_insurance') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact-us.html"> {{ __('front.contect') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="btn cs-btn">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26.605" height="24"
                                        viewBox="0 0 26.605 24">
                                        <g id="Group_63524" data-name="Group 63524"
                                            transform="translate(-371.4 -32)">
                                            <g id="Pin_-_1" data-name="Pin - 1" transform="translate(375.232 32)">
                                                <g id="Group_63492" data-name="Group 63492">
                                                    <path id="Path_42105" data-name="Path 42105"
                                                        d="M447.555,329.927a1.624,1.624,0,0,1-1.274-.613c-2.93-3.668-6.477-8.12-6.727-8.5-.109-.165-.214-.337-.313-.51a1.474,1.474,0,0,1,1.273-2.211h1.521a1.47,1.47,0,0,1,1.255.707,1.869,1.869,0,0,0,1.653.819h4.47a3.574,3.574,0,0,0,1.584-2.7,2,2,0,0,0-.364-1.416,1.191,1.191,0,0,0-.844-.325h-1.915a1.372,1.372,0,0,1-1.223-.6,1.418,1.418,0,0,1,0-1.412l.015-.03.378-.679a1.325,1.325,0,0,0,0-1.5l-2.308,3.422a1.809,1.809,0,0,1-1.5.8h-3.567a1.468,1.468,0,0,1-1.156-.559,1.451,1.451,0,0,1-.28-1.235,9.589,9.589,0,0,1,2.538-4.6l.048-.048a9.506,9.506,0,0,1,13.477,0l.048.048a9.607,9.607,0,0,1,1.24,12c-.038.059-.154.237-6.751,8.531a1.624,1.624,0,0,1-1.276.617Zm-7.041-10.418a.047.047,0,0,0-.047.026.06.06,0,0,0,0,.065c.084.147.174.293.267.434.19.282,2.739,3.5,6.65,8.4a.215.215,0,0,0,.169.081h0a.215.215,0,0,0,.171-.083c3.933-4.946,6.485-8.168,6.679-8.433a8.188,8.188,0,0,0-1.063-10.219l-.048-.048a8.092,8.092,0,0,0-11.473,0l-.048.049a8.174,8.174,0,0,0-2.162,3.925.034.034,0,0,0,.009.033.059.059,0,0,0,.048.024h3.567a.4.4,0,0,0,.328-.175l2.357-3.495a1.345,1.345,0,0,1,2.065-.2,2.644,2.644,0,0,1,.288,3.267l-.336.6h1.853a2.614,2.614,0,0,1,1.866.761,3.219,3.219,0,0,1,.756,2.457c-.1,2.345-2.089,4.059-2.9,4.059h-4.564a3.249,3.249,0,0,1-2.857-1.491.067.067,0,0,0-.052-.035Zm8.857.13Z"
                                                        transform="translate(-438.194 -305.927)" fill="#ff9f2d" />
                                                </g>
                                            </g>
                                            <path id="Path_42106" data-name="Path 42106"
                                                d="M451.7,336.415l-.079.1a.059.059,0,0,0,.042.1c2.263.234,3.684.571,3.684.945,0,.7-5.044,1.274-11.264,1.274s-11.264-.571-11.264-1.274c0-.357,1.282-.678,3.347-.91a.06.06,0,0,0,.041-.1l-.078-.1a.059.059,0,0,0-.054-.023c-3.217.363-5.295.942-5.295,1.592,0,1.1,5.956,2,13.3,2s13.3-.893,13.3-2c0-.673-2.225-1.268-5.631-1.63A.061.061,0,0,0,451.7,336.415Z"
                                                transform="translate(-59.379 -288.601)" fill="#00ce68" />
                                        </g>
                                    </svg>

                                </span>
                                VIP
                            </a>
                        </li>

                    </ul>
                </nav>
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('login') }}" class="btn cs-btn v2"> {{ __('front.login') }}</a>
                    <div class="lang d-flex align-items-center">
                        <!-- <a href="#"> -->
                        {{-- <div class="cs-dropdown">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="language"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Languages
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="language">
                                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li
                                            class="kt-nav__item {{ app()->currentLocale() == $localeCode ? 'kt-nav__item--active' : '' }}">
                                            <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                                class="kt-nav__link">
                                                <span class="kt-nav__link-text">{{ $properties['native'] }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div> --}}
                        @php
    $currentLocale = app()->currentLocale();
    $locales = LaravelLocalization::getSupportedLocales();
@endphp

<div class="cs-dropdown">
    <div class="dropdown">
        <button class="btn dropdown-toggle" type="button" id="language"
            data-bs-toggle="dropdown" aria-expanded="false">
            {{ $locales[$currentLocale]['native'] }}
        </button>

        <ul class="dropdown-menu" aria-labelledby="language">
            @foreach ($locales as $localeCode => $properties)
                <li
                    class="kt-nav__item {{ $currentLocale == $localeCode ? 'kt-nav__item--active' : '' }}">
                    <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                        class="kt-nav__link">
                        <span class="kt-nav__link-text">{{ $properties['native'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

                        <span class="icon-show">
                            <svg id="vuesax_bulk_global" data-name="vuesax/bulk/global"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <g id="global">
                                    <path id="Vector"
                                        d="M4.59,4.57c-.03,0-.07.02-.1.02A10.006,10.006,0,0,1,0,.1C0,.07.02.03.02,0A31.893,31.893,0,0,0,3.75.84,33.548,33.548,0,0,0,4.59,4.57Z"
                                        transform="translate(3.06 16.34)" fill="#d3d3d8" />
                                    <path id="Vector-2" data-name="Vector"
                                        d="M4.65.11A10.093,10.093,0,0,1,0,4.68,30.563,30.563,0,0,0,.91.84,31.281,31.281,0,0,0,4.63,0C4.62.04,4.65.08,4.65.11Z"
                                        transform="translate(16.29 16.34)" fill="#d3d3d8" />
                                    <path id="Vector-3" data-name="Vector"
                                        d="M4.73,4.73A31.643,31.643,0,0,0,.91,3.82,27.914,27.914,0,0,0,0,0,10.052,10.052,0,0,1,4.73,4.73Z"
                                        transform="translate(16.29 2.98)" fill="#d3d3d8" />
                                    <path id="Vector-4" data-name="Vector"
                                        d="M4.67.03a31.248,31.248,0,0,0-.83,3.72A28.87,28.87,0,0,0,0,4.65,10.093,10.093,0,0,1,4.57,0C4.6,0,4.64.03,4.67.03Z"
                                        transform="translate(2.98 3.06)" fill="#d3d3d8" />
                                    <path id="Vector-5" data-name="Vector"
                                        d="M6.98,4.59A31.328,31.328,0,0,0,0,4.59,28.373,28.373,0,0,1,1.02.53,1.635,1.635,0,0,0,1.04.31,10.406,10.406,0,0,1,3.49,0,10.322,10.322,0,0,1,5.93.31a1.66,1.66,0,0,0,.03.22A28.712,28.712,0,0,1,6.98,4.59Z"
                                        transform="translate(8.51 2)" fill="#868692" />
                                    <path id="Vector-6" data-name="Vector"
                                        d="M4.59,6.98A28.043,28.043,0,0,1,.53,5.96a1.635,1.635,0,0,0-.22-.02A10.406,10.406,0,0,1,0,3.49,10.322,10.322,0,0,1,.31,1.05a1.66,1.66,0,0,0,.22-.03A29.77,29.77,0,0,1,4.59,0,32.574,32.574,0,0,0,4.59,6.98Z"
                                        transform="translate(2 8.51)" fill="#868692" />
                                    <path id="Vector-7" data-name="Vector"
                                        d="M4.59,3.49a10.406,10.406,0,0,1-.31,2.45,1.635,1.635,0,0,0-.22.02A30.143,30.143,0,0,1,0,6.98,31.329,31.329,0,0,0,0,0,28.373,28.373,0,0,1,4.06,1.02a.833.833,0,0,0,.22.03A10.389,10.389,0,0,1,4.59,3.49Z"
                                        transform="translate(17.41 8.51)" fill="#868692" />
                                    <path id="Vector-8" data-name="Vector"
                                        d="M6.98,0A28.043,28.043,0,0,1,5.96,4.06a1.66,1.66,0,0,0-.03.22,10.322,10.322,0,0,1-2.44.31,10.406,10.406,0,0,1-2.45-.31,1.635,1.635,0,0,0-.02-.22A29.77,29.77,0,0,1,0,0,31.29,31.29,0,0,0,3.49.22,31.14,31.14,0,0,0,6.98,0Z"
                                        transform="translate(8.51 17.41)" fill="#868692" />
                                    <path id="Vector-9" data-name="Vector"
                                        d="M7.763,7.763a30.039,30.039,0,0,1-7.527,0,30.039,30.039,0,0,1,0-7.527,30.039,30.039,0,0,1,7.527,0A30.039,30.039,0,0,1,7.763,7.763Z"
                                        transform="translate(8 8)" fill="#868692" />
                                    <path id="Vector-10" data-name="Vector" d="M0,0H24V24H0Z" fill="none"
                                        opacity="0" />
                                </g>
                            </svg>
                        </span>
                        <span class="icon-hide">
                            <svg id="vuesax_bulk_global" data-name="vuesax/bulk/global"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <g id="global">
                                    <path id="Vector"
                                        d="M4.59,4.57c-.03,0-.07.02-.1.02A10.006,10.006,0,0,1,0,.1C0,.07.02.03.02,0A31.893,31.893,0,0,0,3.75.84,33.548,33.548,0,0,0,4.59,4.57Z"
                                        transform="translate(3.06 16.34)" fill="rgba(37,55,81,0.4)" />
                                    <path id="Vector-2" data-name="Vector"
                                        d="M4.65.11A10.093,10.093,0,0,1,0,4.68,30.563,30.563,0,0,0,.91.84,31.281,31.281,0,0,0,4.63,0C4.62.04,4.65.08,4.65.11Z"
                                        transform="translate(16.29 16.34)" fill="rgba(37,55,81,0.4)" />
                                    <path id="Vector-3" data-name="Vector"
                                        d="M4.73,4.73A31.643,31.643,0,0,0,.91,3.82,27.914,27.914,0,0,0,0,0,10.052,10.052,0,0,1,4.73,4.73Z"
                                        transform="translate(16.29 2.98)" fill="rgba(37,55,81,0.4)" />
                                    <path id="Vector-4" data-name="Vector"
                                        d="M4.67.03a31.248,31.248,0,0,0-.83,3.72A28.87,28.87,0,0,0,0,4.65,10.093,10.093,0,0,1,4.57,0C4.6,0,4.64.03,4.67.03Z"
                                        transform="translate(2.98 3.06)" fill="rgba(37,55,81,0.4)" />
                                    <path id="Vector-5" data-name="Vector"
                                        d="M6.98,4.59A31.328,31.328,0,0,0,0,4.59,28.373,28.373,0,0,1,1.02.53,1.635,1.635,0,0,0,1.04.31,10.406,10.406,0,0,1,3.49,0,10.322,10.322,0,0,1,5.93.31a1.66,1.66,0,0,0,.03.22A28.712,28.712,0,0,1,6.98,4.59Z"
                                        transform="translate(8.51 2)" fill="#253751" />
                                    <path id="Vector-6" data-name="Vector"
                                        d="M4.59,6.98A28.043,28.043,0,0,1,.53,5.96a1.635,1.635,0,0,0-.22-.02A10.406,10.406,0,0,1,0,3.49,10.322,10.322,0,0,1,.31,1.05a1.66,1.66,0,0,0,.22-.03A29.77,29.77,0,0,1,4.59,0,32.574,32.574,0,0,0,4.59,6.98Z"
                                        transform="translate(2 8.51)" fill="#253751" />
                                    <path id="Vector-7" data-name="Vector"
                                        d="M4.59,3.49a10.406,10.406,0,0,1-.31,2.45,1.635,1.635,0,0,0-.22.02A30.143,30.143,0,0,1,0,6.98,31.329,31.329,0,0,0,0,0,28.373,28.373,0,0,1,4.06,1.02a.833.833,0,0,0,.22.03A10.389,10.389,0,0,1,4.59,3.49Z"
                                        transform="translate(17.41 8.51)" fill="#253751" />
                                    <path id="Vector-8" data-name="Vector"
                                        d="M6.98,0A28.043,28.043,0,0,1,5.96,4.06a1.66,1.66,0,0,0-.03.22,10.322,10.322,0,0,1-2.44.31,10.406,10.406,0,0,1-2.45-.31,1.635,1.635,0,0,0-.02-.22A29.77,29.77,0,0,1,0,0,31.29,31.29,0,0,0,3.49.22,31.14,31.14,0,0,0,6.98,0Z"
                                        transform="translate(8.51 17.41)" fill="#253751" />
                                    <path id="Vector-9" data-name="Vector"
                                        d="M7.763,7.763a30.039,30.039,0,0,1-7.527,0,30.039,30.039,0,0,1,0-7.527,30.039,30.039,0,0,1,7.527,0A30.039,30.039,0,0,1,7.763,7.763Z"
                                        transform="translate(8 8)" fill="#253751" />
                                    <path id="Vector-10" data-name="Vector" d="M0,0H24V24H0Z" fill="none"
                                        opacity="0" />
                                </g>
                            </svg>

                        </span>

                        <!-- </a> -->
                    </div>
                    <button type="button" class="navbar-toggler btn" id="openMenu">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>

            </div>
        </div>

    </header>
    <!-- Main header -->

    @yield('content')



    <footer class="main-footer" id="footer">
        <div class="container">
            <div class="f-top">
                <div class="row justify-content-md-start justify-content-center">
                    <div class="col-lg-5 col-md-12 mb-3 mb-md-0">
                        <figure>
                            <img src="{{ asset('assets/front_end/images/logo.svg') }}" alt=""
                                srcset="">
                        </figure>
                        <p>
                            {{ __('site.f_con1') }}
                        </p>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <div class="f-widget">
                            <h3 class="title">{{ __('site.platform') }}</h3>
                            <ul>
                                <li><a href="{{ url('/') }}">{{ __('front.main') }}</a></li>
                                <li><a href="{{ route('hostpial') }}">{{ __('site.hospitels') }}</a></li>
                                <li><a href="{{ route('doctors') }}">{{ __('site.doctors') }}</a></li>
                                {{-- <li><a href="">المدونة</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <div class="f-widget">
                            <h3 class="title">{{ __('site.important_links') }}</h3>
                            <ul>
                                <li><a href="about-us.html"> {{ __('site.who_are_we') }}</a></li>
                                <li><a href="contact-us.html">{{ __('site.contact_us') }} </a></li>
                                <li><a href="policies.html">{{ __('site.terms_and_conditions') }}</a></li>
                                <li><a href="privacy.html"> {{ __('site.privacy_policy') }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <div class="f-widget">
                            <h3 class="title"> {{ __('site.health_services') }}</h3>
                            <ul>
                                <li><a href="service-details.html">{{ __('site.health_insurance') }} </a></li>
                                {{-- <li><a href="service-details.html">الاستشارات القانونية</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="f-bottom d-flex align-items-center justify-content-md-between justify-content-center flex-wrap">
                <p class="f-copyright">
                    {{ __('site.f_con2') }} © 2022
                </p>

                <div class="f-social">
                    <a href="{{ $settings['whatsapp'] }}" class="when-hover" target="_blank"
                        rel="noopener noreferrer">
                        <span class="before-hover">
                            <svg id="Group_16" data-name="Group 16" xmlns="http://www.w3.org/2000/svg"
                                width="32" height="31.997" viewBox="0 0 32 31.997">
                                <path id="Vector"
                                    d="M7.913,29.8A16.012,16.012,0,0,0,16.008,32,16.241,16.241,0,0,0,31.974,15.055,16,16,0,1,0,2.138,24l-1.424,5.3a1.594,1.594,0,0,0,1.968,1.952Z"
                                    transform="translate(0 0)" fill="#e2e2e2" />
                                <g id="Group" transform="translate(7.991 7.95)">
                                    <path id="Vector-2" data-name="Vector"
                                        d="M16.034,13.131a1.974,1.974,0,0,1-.208.882,3.825,3.825,0,0,1-.545.818,3.654,3.654,0,0,1-1.315.946,3.924,3.924,0,0,1-1.571.3,6.53,6.53,0,0,1-2.613-.593A14.685,14.685,0,0,1,7.023,13.9a23.168,23.168,0,0,1-2.63-2.245,22.929,22.929,0,0,1-2.245-2.63A14.106,14.106,0,0,1,.577,6.285,6.789,6.789,0,0,1,0,3.656,4.189,4.189,0,0,1,.289,2.1,3.58,3.58,0,0,1,1.219.754,2.317,2.317,0,0,1,2.886,0a1.569,1.569,0,0,1,.657.144,1.328,1.328,0,0,1,.545.449L5.932,3.239a2.588,2.588,0,0,1,.321.561,1.17,1.17,0,0,1,.112.5,1.15,1.15,0,0,1-.176.577,2.821,2.821,0,0,1-.449.577l-.609.641A.412.412,0,0,0,5,6.413a.8.8,0,0,0,.032.192,1.1,1.1,0,0,1,.064.16,6.429,6.429,0,0,0,.754,1.026c.369.417.754.85,1.17,1.267.433.433.85.818,1.283,1.186a6.156,6.156,0,0,0,1.042.738c.048.016.1.048.144.064a.526.526,0,0,0,.545-.112l.609-.609a2.576,2.576,0,0,1,.577-.449A1.1,1.1,0,0,1,11.8,9.7a1.17,1.17,0,0,1,.5.112,2.919,2.919,0,0,1,.561.321l2.662,1.892a1.354,1.354,0,0,1,.449.513A5.608,5.608,0,0,1,16.034,13.131Z"
                                        fill="#727a83" />
                                </g>
                            </svg>
                        </span>
                        <span class="after-hover">
                            <svg id="Group_16" data-name="Group 16" xmlns="http://www.w3.org/2000/svg"
                                width="32" height="31.997" viewBox="0 0 32 31.997">
                                <path id="Vector"
                                    d="M7.913,29.8A16.012,16.012,0,0,0,16.008,32,16.241,16.241,0,0,0,31.974,15.055,16,16,0,1,0,2.138,24l-1.424,5.3a1.594,1.594,0,0,0,1.968,1.952Z"
                                    transform="translate(0 0)" fill="#e2fee7" />
                                <g id="Group" transform="translate(7.991 7.95)">
                                    <path id="Vector-2" data-name="Vector"
                                        d="M16.034,13.131a1.974,1.974,0,0,1-.208.882,3.825,3.825,0,0,1-.545.818,3.654,3.654,0,0,1-1.315.946,3.924,3.924,0,0,1-1.571.3,6.53,6.53,0,0,1-2.613-.593A14.685,14.685,0,0,1,7.023,13.9a23.168,23.168,0,0,1-2.63-2.245,22.929,22.929,0,0,1-2.245-2.63A14.106,14.106,0,0,1,.577,6.285,6.789,6.789,0,0,1,0,3.656,4.189,4.189,0,0,1,.289,2.1,3.58,3.58,0,0,1,1.219.754,2.317,2.317,0,0,1,2.886,0a1.569,1.569,0,0,1,.657.144,1.328,1.328,0,0,1,.545.449L5.932,3.239a2.588,2.588,0,0,1,.321.561,1.17,1.17,0,0,1,.112.5,1.15,1.15,0,0,1-.176.577,2.821,2.821,0,0,1-.449.577l-.609.641A.412.412,0,0,0,5,6.413a.8.8,0,0,0,.032.192,1.1,1.1,0,0,1,.064.16,6.429,6.429,0,0,0,.754,1.026c.369.417.754.85,1.17,1.267.433.433.85.818,1.283,1.186a6.156,6.156,0,0,0,1.042.738c.048.016.1.048.144.064a.526.526,0,0,0,.545-.112l.609-.609a2.576,2.576,0,0,1,.577-.449A1.1,1.1,0,0,1,11.8,9.7a1.17,1.17,0,0,1,.5.112,2.919,2.919,0,0,1,.561.321l2.662,1.892a1.354,1.354,0,0,1,.449.513A5.608,5.608,0,0,1,16.034,13.131Z"
                                        fill="#28d146" />
                                </g>
                            </svg>
                        </span>
                    </a>
                    <a href="{{ $settings['facebook'] }}" class="when-hover" target="_blank"
                        rel="noopener noreferrer">
                        <span class="before-hover">
                            <svg id="Component_858_32" data-name="Component 858 – 32"
                                xmlns="http://www.w3.org/2000/svg" width="32" height="32.402"
                                viewBox="0 0 32 32.402">
                                <path id="Path_41468" data-name="Path 41468"
                                    d="M16,0A16,16,0,1,1,0,16,16,16,0,0,1,16,0Z" fill="#e2e2e2" />
                                <path id="Path_77" data-name="Path 77"
                                    d="M13.674,31.3a.78.78,0,0,0,.81-.791V18.347h3.242a1.621,1.621,0,1,0,0-3.242H14.484V11.863a1.621,1.621,0,0,1,1.621-1.621h1.621a1.621,1.621,0,1,0,0-3.242H16.105a4.863,4.863,0,0,0-4.863,4.863v3.242H9.621a1.621,1.621,0,1,0,0,3.242h1.621V30.329a.783.783,0,0,0,.652.781A16.274,16.274,0,0,0,13.674,31.3Z"
                                    transform="translate(1.727 1.105)" fill="#727a83" />
                            </svg>
                        </span>
                        <span class="after-hover">
                            <svg id="Component_858_32" data-name="Component 858 – 32"
                                xmlns="http://www.w3.org/2000/svg" width="32" height="32.402"
                                viewBox="0 0 32 32.402">
                                <path id="Path_41468" data-name="Path 41468"
                                    d="M16,0A16,16,0,1,1,0,16,16,16,0,0,1,16,0Z" fill="#dff2ff" />
                                <path id="Path_77" data-name="Path 77"
                                    d="M13.674,31.3a.78.78,0,0,0,.81-.791V18.347h3.242a1.621,1.621,0,1,0,0-3.242H14.484V11.863a1.621,1.621,0,0,1,1.621-1.621h1.621a1.621,1.621,0,1,0,0-3.242H16.105a4.863,4.863,0,0,0-4.863,4.863v3.242H9.621a1.621,1.621,0,1,0,0,3.242h1.621V30.329a.783.783,0,0,0,.652.781A16.274,16.274,0,0,0,13.674,31.3Z"
                                    transform="translate(1.727 1.105)" fill="#1877f2" />
                            </svg>
                        </span>
                    </a>

                    <a href="{{ $settings['x'] }}" class="when-hover" target="_blank" rel="noopener noreferrer">
                        <span class="before-hover">
                            <svg id="Component_859_26" data-name="Component 859 – 26"
                                xmlns="http://www.w3.org/2000/svg" width="32" height="28.193"
                                viewBox="0 0 32 28.193">
                                <path id="Path_109" data-name="Path 109"
                                    d="M31.74,10.048c.783,11.747-7.831,21.145-18.8,21.145A24.965,24.965,0,0,1,2.425,29.267a.674.674,0,0,1,.338-1.28c3.65-.242,6.67-1.113,8.616-3.059,4.7-4.7,5.482-6.265,6.68-12.493A7.05,7.05,0,0,1,30.449,5.981l2.69-.384a.783.783,0,0,1,.762,1.21Z"
                                    transform="translate(-2.034 -3)" fill="#e2e2e2" />
                                <path id="Path_110" data-name="Path 110"
                                    d="M11.234,23.964C2.753,21.137,1.29,10.653,2.813,5.185a.727.727,0,0,1,1.35-.07c2.6,4.449,7.549,6.933,13.749,6.36C27.676,11.475,25.327,28.662,11.234,23.964Z"
                                    transform="translate(-1.893 -2.043)" fill="#727a83" />
                            </svg>
                        </span>
                        <span class="after-hover">
                            <svg id="Component_859_26" data-name="Component 859 – 26"
                                xmlns="http://www.w3.org/2000/svg" width="32" height="28.193"
                                viewBox="0 0 32 28.193">
                                <path id="Path_109" data-name="Path 109"
                                    d="M31.74,10.048c.783,11.747-7.831,21.145-18.8,21.145A24.965,24.965,0,0,1,2.425,29.267a.674.674,0,0,1,.338-1.28c3.65-.242,6.67-1.113,8.616-3.059,4.7-4.7,5.482-6.265,6.68-12.493A7.05,7.05,0,0,1,30.449,5.981l2.69-.384a.783.783,0,0,1,.762,1.21Z"
                                    transform="translate(-2.034 -3)" fill="#dcf6ff" />
                                <path id="Path_110" data-name="Path 110"
                                    d="M11.234,23.964C2.753,21.137,1.29,10.653,2.813,5.185a.727.727,0,0,1,1.35-.07c2.6,4.449,7.549,6.933,13.749,6.36C27.676,11.475,25.327,28.662,11.234,23.964Z"
                                    transform="translate(-1.893 -2.043)" fill="#1d9bf0" />
                            </svg>
                        </span>
                    </a>

                    <a href="{{ $settings['instagram'] }}" class="when-hover" target="_blank"
                        rel="noopener noreferrer">
                        <span class="before-hover">
                            <svg id="Component_860_23" data-name="Component 860 – 23"
                                xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                viewBox="0 0 32 32">
                                <circle id="Ellipse_11616" data-name="Ellipse 11616" cx="5.344" cy="5.344"
                                    r="5.344" transform="translate(10.656 10.123)" fill="#e2e2e2" />
                                <path id="Path_84" data-name="Path 84"
                                    d="M10,2a8,8,0,0,0-8,8V26a8,8,0,0,0,8,8H26a8,8,0,0,0,8-8V10a8,8,0,0,0-8-8Zm8,20.8A4.8,4.8,0,1,0,13.2,18,4.8,4.8,0,0,0,18,22.8Z"
                                    transform="translate(-2 -2)" fill="#e2e2e2" fill-rule="evenodd" />
                                <path id="Path_85" data-name="Path 85"
                                    d="M18.6,8.206A1.6,1.6,0,1,0,17,6.6,1.6,1.6,0,0,0,18.6,8.206Z"
                                    transform="translate(6.985 -0.191)" fill="#727a83" />
                                <path id="Path_86" data-name="Path 86"
                                    d="M23.031,15.015A8.015,8.015,0,1,1,15.015,7,8.015,8.015,0,0,1,23.031,15.015Zm-3.206,0a4.809,4.809,0,1,1-4.809-4.809A4.809,4.809,0,0,1,19.825,15.015Z"
                                    transform="translate(0.985 0.984)" fill="#727a83" fill-rule="evenodd" />
                            </svg>

                        </span>
                        <span class="after-hover">
                            <svg id="Component_860_23" data-name="Component 860 – 23"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="32" height="32" viewBox="0 0 32 32">
                                <defs>
                                    <linearGradient id="linear-gradient" x1="0.146" y1="0.854"
                                        x2="0.854" y2="0.146" gradientUnits="objectBoundingBox">
                                        <stop offset="0" stop-color="#f30072" />
                                        <stop offset="1" stop-color="#e50097" />
                                    </linearGradient>
                                    <linearGradient id="linear-gradient-2" x1="0.146" y1="0.854"
                                        x2="0.854" y2="0.146" gradientUnits="objectBoundingBox">
                                        <stop offset="0" stop-color="#ff6400" />
                                        <stop offset="0.5" stop-color="#ff0100" />
                                        <stop offset="1" stop-color="#fd0056" />
                                    </linearGradient>
                                </defs>
                                <g id="Group_62851" data-name="Group 62851"
                                    transform="translate(-1137.999 -1949.309)">
                                    <path id="Path_84" data-name="Path 84"
                                        d="M10,2a8,8,0,0,0-8,8V26a8,8,0,0,0,8,8H26a8,8,0,0,0,8-8V10a8,8,0,0,0-8-8Zm8,20.8A4.8,4.8,0,1,0,13.2,18,4.8,4.8,0,0,0,18,22.8Z"
                                        transform="translate(1135.999 1947.309)" fill="#ffe2e1"
                                        fill-rule="evenodd" />
                                    <circle id="Ellipse_11616" data-name="Ellipse 11616" cx="6"
                                        cy="6" r="6" transform="translate(1148 1959.107)" fill="#ffe2e1" />
                                    <path id="Path_41470" data-name="Path 41470"
                                        d="M365.1,90.213a1.588,1.588,0,1,1-1.588-1.588A1.588,1.588,0,0,1,365.1,90.213Zm0,0"
                                        transform="translate(800.084 1865.492)" fill="url(#linear-gradient)" />
                                    <path id="Path_41471" data-name="Path 41471"
                                        d="M132.554,124.539a8.015,8.015,0,1,0,8.016,8.015A8.015,8.015,0,0,0,132.554,124.539Zm0,13.218a5.2,5.2,0,1,1,5.2-5.2A5.2,5.2,0,0,1,132.554,137.757Zm0,0"
                                        transform="translate(1021.441 1832.758)" fill="url(#linear-gradient-2)" />
                                </g>
                            </svg>
                        </span>
                    </a>
                    <a href="{{ $settings['linkedin'] }}" class="when-hover" target="_blank"
                        rel="noopener noreferrer">
                        <span class="before-hover">
                            <svg id="Component_862_28" data-name="Component 862 – 28"
                                xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                viewBox="0 0 32 32">
                                <path id="Path_87" data-name="Path 87"
                                    d="M2,6.8A4.8,4.8,0,0,1,6.8,2H29.2A4.8,4.8,0,0,1,34,6.8V29.2A4.8,4.8,0,0,1,29.2,34H6.8A4.8,4.8,0,0,1,2,29.2Z"
                                    transform="translate(-2 -2)" fill="#e2e2e2" />
                                <g id="Group_52916" data-name="Group 52916" transform="translate(6.338 6.337)">
                                    <path id="Path_88" data-name="Path 88"
                                        d="M7.614,9.228A1.614,1.614,0,1,0,6,7.614,1.614,1.614,0,0,0,7.614,9.228Z"
                                        transform="translate(-6 -6)" fill="#727a83" />
                                    <path id="Path_89" data-name="Path 89"
                                        d="M7.614,10A1.614,1.614,0,0,0,6,11.614V21.3a1.614,1.614,0,1,0,3.228,0V11.614A1.614,1.614,0,0,0,7.614,10Z"
                                        transform="translate(-6 -3.578)" fill="#727a83" />
                                    <path id="Path_90" data-name="Path 90"
                                        d="M16.456,13.228a3.228,3.228,0,0,0-3.228,3.228V21.3A1.614,1.614,0,1,1,10,21.3V11.614a1.614,1.614,0,0,1,3.085-.665,6.457,6.457,0,0,1,9.827,5.507V21.3a1.614,1.614,0,0,1-3.228,0V16.456A3.228,3.228,0,0,0,16.456,13.228Z"
                                        transform="translate(-3.58 -3.578)" fill="#727a83" />
                                </g>
                            </svg>

                        </span>
                        <span class="after-hover">
                            <svg id="Component_862_28" data-name="Component 862 – 28"
                                xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                viewBox="0 0 32 32">
                                <path id="Path_87" data-name="Path 87"
                                    d="M2,6.8A4.8,4.8,0,0,1,6.8,2H29.2A4.8,4.8,0,0,1,34,6.8V29.2A4.8,4.8,0,0,1,29.2,34H6.8A4.8,4.8,0,0,1,2,29.2Z"
                                    transform="translate(-2 -2)" fill="#e0f3ff" />
                                <g id="Group_52916" data-name="Group 52916" transform="translate(6.338 6.337)">
                                    <path id="Path_88" data-name="Path 88"
                                        d="M7.614,9.228A1.614,1.614,0,1,0,6,7.614,1.614,1.614,0,0,0,7.614,9.228Z"
                                        transform="translate(-6 -6)" fill="#0a66c2" />
                                    <path id="Path_89" data-name="Path 89"
                                        d="M7.614,10A1.614,1.614,0,0,0,6,11.614V21.3a1.614,1.614,0,1,0,3.228,0V11.614A1.614,1.614,0,0,0,7.614,10Z"
                                        transform="translate(-6 -3.578)" fill="#0a66c2" />
                                    <path id="Path_90" data-name="Path 90"
                                        d="M16.456,13.228a3.228,3.228,0,0,0-3.228,3.228V21.3A1.614,1.614,0,1,1,10,21.3V11.614a1.614,1.614,0,0,1,3.085-.665,6.457,6.457,0,0,1,9.827,5.507V21.3a1.614,1.614,0,0,1-3.228,0V16.456A3.228,3.228,0,0,0,16.456,13.228Z"
                                        transform="translate(-3.58 -3.578)" fill="#0a66c2" />
                                </g>
                            </svg>

                        </span>
                    </a>
                </div>
            </div>
            <!-- <span class="scroll-to-top">
                <svg xmlns="http://www.w3.org/2000/svg" width="14.904" height="9.578" viewBox="0 0 14.904 9.578">
                    <path id="Path_382" data-name="Path 382"
                        d="M9.678,9.292a1.065,1.065,0,0,0,1.5-.053l3.44-3.726a1.071,1.071,0,0,0,0-1.448L11.182.339A1.066,1.066,0,0,0,9.617,1.787l1.791,1.937H1.065a1.065,1.065,0,1,0,0,2.129H11.408L9.617,7.791A1.061,1.061,0,0,0,9.678,9.292Z"
                        transform="translate(0 0)" fill="currentColor" fill-rule="evenodd" />
                </svg>
            </span> -->
        </div>
    </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('assets/front_end/js/jquery.min.js') }}"></script>
    <!-- <script src="assets/js/popper.min.js"></script> -->
    <!-- <script src="assets/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/front_end/plugins/owlslider/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/front_end/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/front_end/plugins/animate/wow.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.8.1/lottie_svg.min.js"
        integrity="sha512-jk2H6cbspEVLyLHIJkHcwiHqh7sQuyrBJvHKokFyKebzaRZiA7RmcbAo7KvM3GqFaLJJGDFC/gBMYzbeeS7KUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/front_end/js/main.js') }}"></script>
    <script></script>
    <!-- <script src="assets/js/scripts.js"></script> -->
    <!-- <script src="assets/js/scripts-en.js"></script> -->
    @yield('js')
</body>

</html>
