@extends('front_end.layout.app')
@section('content')
    <div class="body-content">
        {{-- {{ dd($mixedData) }} --}}
        <!-- banner-section -->
        <section class="banner-section">
            <div class="container">
                <div class="content">
                    <div class="row align-items-center">
                        <div class="col-lg-5 order-lg-0 order-1">
                            <h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"> {{ __('front.title') }}
                            </h1>
                            <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">{{ __('site.con1') }}</p>
                            <form action="#" class="mt-5 mb-3 wow fadeInUp" data-wow-duration="1s"
                                data-wow-delay="0.3s">
                                <div class="form-group">
                                    <div class="cs-search-input">
                                        <span>
                                            🔍
                                        </span>

                                        <input type="text" id="searchInput" class="form-control custom-input"
                                            placeholder="{{ __('site.search') }}">

                                        <button type="button" class="btn cs-btn v2"
                                            onclick="triggerSearch()">{{ __('site.searchB') }}</button>
                                    </div>
                                </div>
                            </form>
                            <div class="suggestions wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                                <h4>{{ __('site.suggestions') }}</h4>
                                <div class="d-flex flex-wrap gap-1">
                                    @foreach ($mixedData as $item)
                                        <div class="suggestion wow fadeInUp" onclick="openDetails(this)"
                                            data-type="{{ $item['type'] }}" data-name="{{ $item['name'] }}"
                                            data-specialization="{{ $item['specialization'] ?? '' }}"
                                            data-hospital="{{ $item['hospital'] ?? '' }}"
                                            data-bio="{{ $item['bio'] ?? '' }}" data-country="{{ $item['country'] ?? '' }}"
                                            data-description="{{ $item['description'] ?? '' }}">
                                            <a href="javascript:void(0)">
                                                {{ $item['name'] }}
                                            </a>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-lg-1  order-0">
                            <figure>
                                <img src="{{ asset('assets/front_end/images/h-banner-img.png') }}" class="img-fluid"
                                    alt="" srcset="">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="detailsModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitle"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <p id="modalBody"></p>
                        </div>

                    </div>
                </div>
            </div>

        </section>
        <!-- ./banner-section -->

        <!-- majors-section -->
        <section class="majors-section">
            <div class="container">
                <div class="main-title d-flex flex-wrap justify-content-between align-items-center wow fadeInUp"
                    data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2>{{ __('site.medical_specialties') }}</h2>
                    <a href="{{ route('specializations') }}" class="btn cs-btn">{{ __('site.show') }}
                        {{ __('site.all') }} {{ __('site.specializations') }} </a>
                </div>
                <div class="content">
                    <div class="row">
                        @foreach ($specializations as $specialization)
                            {{-- {{ dd($specialization->image) }} --}}
                            <div class="col-lg-auto col-md-4 col-6">
                                <div class="major-card">
                                    <figure style="width: 100%; height: 200px; overflow: hidden;">
                                        <img src="{{ asset('uploads/specializations/' . ($specialization->image?->image ?? 'default.jpg')) }}"
                                            alt="" class="wow zoomIn" data-wow-duration="1s" data-wow-delay="0.1s"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    </figure>
                                    <h4 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                                        {{ $specialization->name }} </h4>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        <!-- ./majors-section -->

        <!-- hospital-section -->
        <section class="hospital-section">
            <div class="container">
                <div class="main-title d-flex flex-wrap justify-content-between align-items-center wow fadeInUp"
                    data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2>{{ __('site.recommended_hospitals') }} </h2>
                    <a href="{{ route('hostpial') }}" class="btn cs-btn"> {{ __('site.show') }}
                        {{ __('site.all') }} {{ __('site.hospitels') }} </a>
                </div>
                <div class="content">
                    <div class="row">
                        @foreach ($hostpials as $hostpial)
                            <div class="col-lg-4 col-md-6">
                                <div class="hospital-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                                    <figure>
                                        <img src="{{ asset('uploads/hospitals/' . $hostpial->images->first()->image) }}"
                                            alt="" srcset="">
                                    </figure>
                                    <div class="hospital-rate">
                                        <div class="d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20.08" height="18.567"
                                                viewBox="0 0 20.08 18.567">
                                                <g id="Star" transform="translate(-3.355 -2.05)">
                                                    <path id="Path"
                                                        d="M9.158.578a.962.962,0,0,1,1.764,0L13.016,5.41a.96.96,0,0,0,.808.575l5.369.413a.956.956,0,0,1,.537,1.691l-4.038,3.32a.954.954,0,0,0-.321.967l1.243,5a.959.959,0,0,1-1.419,1.054L10.527,15.7a.964.964,0,0,0-.974,0L4.886,18.432a.959.959,0,0,1-1.419-1.054l1.243-5a.954.954,0,0,0-.321-.967L.35,8.089A.956.956,0,0,1,.888,6.4l5.369-.413a.96.96,0,0,0,.808-.575Z"
                                                        transform="translate(3.355 2.05)" fill="#ffc542" />
                                                </g>
                                            </svg>
                                            @php
                                                $count = $hostpial->ratings->count();
                                                $average = $count > 0 ? $hostpial->ratings->avg('rating') : 0;
                                            @endphp
                                            <span class="ml-1">{{ $average }}</span>
                                        </div>
                                        {{-- {{ dd($hostpial->ratings) }} --}}
                                        <p> ({{ $count }}) تقييم | {{ $hostpial->country->name }}،
                                            {{ $hostpial->city->name }} </p>
                                    </div>
                                    <h4> {{ $hostpial->name }}</h4>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        <!-- ./hospital-section -->

        <!-- specialists-section -->
        <section class="specialists-section">
            <div class="container">
                <div class="main-title d-flex flex-wrap justify-content-between align-items-center wow fadeInUp"
                    data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2>{{ __('site.group_dr') }} </h2>
                    <a href="{{ route('doctors') }}" class="btn cs-btn"> {{ __('site.show') }}
                        {{ __('site.all') }} {{ __('site.doctors') }} </a>
                </div>
                <div class="content">
                    <div class="row">
                        @foreach ($doctors as $doctor)
                            {{-- {{ $doctor->image }} --}}
                            <div class="col-lg-3 col-md-6">
                                <div class="general-card specialist-card wow fadeInUp" data-wow-duration="1s"
                                    data-wow-delay="0.1s">
                                    <figure>
                                        <img src="{{ asset('uploads/doctors/' . $doctor->image->image) }}" alt=""
                                            srcset="">
                                    </figure>

                                    <div class="general-card-body">
                                        <h4>{{ $doctor->name }} </h4>
                                        <h6> {{ $doctor->specialization->name }} </h6>
                                        <div class="d-flex align-items-center justify-content-center rate">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20.08" height="18.567"
                                                viewBox="0 0 20.08 18.567">
                                                <g id="Star" transform="translate(-3.355 -2.05)">
                                                    <path id="Path"
                                                        d="M9.158.578a.962.962,0,0,1,1.764,0L13.016,5.41a.96.96,0,0,0,.808.575l5.369.413a.956.956,0,0,1,.537,1.691l-4.038,3.32a.954.954,0,0,0-.321.967l1.243,5a.959.959,0,0,1-1.419,1.054L10.527,15.7a.964.964,0,0,0-.974,0L4.886,18.432a.959.959,0,0,1-1.419-1.054l1.243-5a.954.954,0,0,0-.321-.967L.35,8.089A.956.956,0,0,1,.888,6.4l5.369-.413a.96.96,0,0,0,.808-.575Z"
                                                        transform="translate(3.355 2.05)" fill="#ffc542" />
                                                </g>
                                            </svg>
                                            @php
                                                $count = $doctor->ratings->count();
                                                $average = $count > 0 ? $doctor->ratings->avg('rating') : 0;
                                            @endphp
                                            <span class="ml-1">{{ $average }}</span>
                                        </div>
                                        <p>
                                            {{ __('site.dr') }} {{ $doctor->specialization->name }} -
                                            {{ $doctor->nationalitie->name }}
                                            <hr>{{ $doctor->bio }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </section>
        <!-- ./specialists-section -->

        <!-- numbers-section -->
        <section class="numbers-section">
            <div class="container">
                <div class="content">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-4">
                            <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                                {{ __('site.statistics_and_figures') }}</h3>
                            <h6 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">{{ __('site.num') }}
                            </h6>
                        </div>
                        <div class="col-lg-auto col-md-3 col-6">
                            <div class="number-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                                <figure>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32.727"
                                        viewBox="0 0 40 32.727">
                                        <g id="Hospital_Building" data-name="Hospital Building"
                                            transform="translate(-1 -3)">
                                            <g id="Group_16" data-name="Group 16" transform="translate(1 3)">
                                                <path id="Path_765" data-name="Path 765"
                                                    d="M10.451,3A5.453,5.453,0,0,0,5,8.455V33.909a1.818,1.818,0,0,0,1.817,1.818h21.8a1.818,1.818,0,0,0,1.817-1.818V8.455A5.453,5.453,0,0,0,24.986,3Z"
                                                    transform="translate(2.282 -3)" fill="#99ebc2" />
                                                <path id="Path_766" data-name="Path 766"
                                                    d="M4.641,10.82A1.82,1.82,0,1,0,1,10.82v18.2a1.82,1.82,0,1,0,3.641,0Z"
                                                    transform="translate(-1 1.883)" fill="#99ebc2" />
                                                <path id="Path_767" data-name="Path 767"
                                                    d="M21,10.82a1.82,1.82,0,1,1,3.641,0v18.2a1.82,1.82,0,1,1-3.641,0Z"
                                                    transform="translate(15.359 1.883)" fill="#99ebc2" />
                                            </g>
                                            <path id="Path_768" data-name="Path 768"
                                                d="M14.461,6a1.82,1.82,0,0,0-1.82,1.82v1.82H10.82a1.82,1.82,0,1,0,0,3.641h1.82V15.1a1.82,1.82,0,0,0,3.641,0v-1.82H18.1a1.82,1.82,0,0,0,0-3.641h-1.82V7.82A1.82,1.82,0,0,0,14.461,6Z"
                                                transform="translate(6.539 2.451)" fill="#00ce68" />
                                            <path id="Path_769" data-name="Path 769"
                                                d="M10,17.82A1.82,1.82,0,0,1,11.82,16h3.641a1.82,1.82,0,0,1,1.82,1.82V25.1H10Z"
                                                transform="translate(7.359 10.625)" fill="#00ce68" />
                                        </g>
                                    </svg>
                                </figure>
                                <h4>{{ $hostpials->count() }} +</h4>
                                <h6>{{ __('site.hospitels') }}</h6>
                            </div>
                        </div>
                        <div class="col-lg-auto col-md-3 col-6">
                            <div class="number-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                                <figure>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                        viewBox="0 0 40 40">
                                        <g id="Stethoscope" transform="translate(-2 -2)">
                                            <path id="Path_808" data-name="Path 808"
                                                d="M9,12a2,2,0,0,1,2,2v4.989a8.981,8.981,0,1,0,17.962,0V15.992a2,2,0,1,1,3.992,0v2.994A12.972,12.972,0,0,1,7,18.985V14A2,2,0,0,1,9,12Z"
                                                transform="translate(5.064 10.042)" fill="#99ebc2" fill-rule="evenodd" />
                                            <path id="Path_809" data-name="Path 809"
                                                d="M7.322,5.992A1.331,1.331,0,0,0,5.992,7.322v6.652a7.983,7.983,0,1,0,15.966,0V7.322a1.331,1.331,0,0,0-1.331-1.331h-.665a2,2,0,1,1,0-3.992h.665a5.322,5.322,0,0,1,5.322,5.322v6.652A11.975,11.975,0,1,1,2,13.975V7.322A5.322,5.322,0,0,1,7.322,2h.665a2,2,0,0,1,0,3.992Z"
                                                transform="translate(0 0)" fill="#00ce68" fill-rule="evenodd" />
                                            <path id="Path_810" data-name="Path 810"
                                                d="M21.987,16.983a2,2,0,1,0-2-2A2,2,0,0,0,21.987,16.983Zm0,3.992A5.987,5.987,0,1,0,16,14.987,5.987,5.987,0,0,0,21.987,20.975Z"
                                                transform="translate(14.025 7.013)" fill="#00ce68" fill-rule="evenodd" />
                                        </g>
                                    </svg>

                                </figure>
                                <h4>{{ $doctors->count() }}+</h4>
                                <h6>{{ __('site.doctors') }}</h6>
                            </div>
                        </div>
                        <div class="col-lg-auto col-md-3 col-6">
                            <div class="number-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                                <figure>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                        viewBox="0 0 35 35">
                                        <g id="Medical_Case" data-name="Medical Case" transform="translate(-2 -2)">
                                            <path id="Path_775" data-name="Path 775"
                                                d="M10.75,9V7.25A5.25,5.25,0,0,1,16,2h7a5.25,5.25,0,0,1,5.25,5.25V9h3.5A5.25,5.25,0,0,1,37,14.25v17.5A5.25,5.25,0,0,1,31.75,37H7.25A5.25,5.25,0,0,1,2,31.75V14.25A5.25,5.25,0,0,1,7.25,9Zm3.5-1.75A1.75,1.75,0,0,1,16,5.5h7a1.75,1.75,0,0,1,1.75,1.75V9H14.25Z"
                                                fill="#99ebc2" fill-rule="evenodd" />
                                            <path id="Path_776" data-name="Path 776"
                                                d="M13.284,11.761a1.761,1.761,0,0,1,3.523,0v3.523h3.523a1.761,1.761,0,0,1,0,3.523H16.806v3.523a1.761,1.761,0,0,1-3.523,0V18.806H9.761a1.761,1.761,0,0,1,0-3.523h3.523Z"
                                                transform="translate(4.455 5.94)" fill="#00ce68" fill-rule="evenodd" />
                                        </g>
                                    </svg>

                                </figure>
                                <h4>{{ $specializations->count() }}+</h4>
                                <h6>{{ __('site.specializations') }}</h6>
                            </div>
                        </div>
                        <div class="col-lg-auto col-md-3 col-6">
                            <div class="number-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                                <figure>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32.727" height="40"
                                        viewBox="0 0 32.727 40">
                                        <g id="User" transform="translate(-3 -1)">
                                            <path id="Path_433" data-name="Path 433"
                                                d="M25.175,10.1A9.088,9.088,0,1,1,16.088,1,9.091,9.091,0,0,1,25.175,10.1Z"
                                                transform="translate(3.276)" fill="#00ce68" />
                                            <path id="Path_434" data-name="Path 434"
                                                d="M31.76,14.578c-1.121-1.3-3.046-1.233-4.551-.409a16.284,16.284,0,0,1-7.845,2,16.285,16.285,0,0,1-7.845-2c-1.505-.824-3.43-.891-4.551.409A16.312,16.312,0,0,0,3,25.265v1.819a3.637,3.637,0,0,0,3.636,3.638H32.091a3.637,3.637,0,0,0,3.636-3.638V25.265A16.312,16.312,0,0,0,31.76,14.578Z"
                                                transform="translate(0 10.278)" fill="#99ebc2" fill-rule="evenodd" />
                                        </g>
                                    </svg>

                                </figure>
                                <h4>{{ $op }}+</h4>
                                <h6>{{ __('site.hospitels') }}</h6>
                            </div>
                        </div>
                        <div class="col-lg-auto col-md-3 col-6">
                            <div class="number-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.7s">
                                <figure>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="37.135"
                                        viewBox="0 0 40 37.135">
                                        <g id="Star" transform="translate(-1.546 -2.524)">
                                            <path id="Path_1034" data-name="Path 1034"
                                                d="M19.789,3.679a1.913,1.913,0,0,1,3.513,0l4.171,9.665a1.913,1.913,0,0,0,1.609,1.149l10.7.826A1.913,1.913,0,0,1,40.848,18.7L32.8,25.343a1.913,1.913,0,0,0-.639,1.935l2.476,10a1.913,1.913,0,0,1-2.828,2.108l-9.3-5.473a1.912,1.912,0,0,0-1.941,0l-9.3,5.473A1.913,1.913,0,0,1,8.45,37.28l2.475-10a1.913,1.913,0,0,0-.639-1.935L2.243,18.7A1.913,1.913,0,0,1,3.314,15.32l10.7-.826a1.913,1.913,0,0,0,1.609-1.149Z"
                                                transform="translate(0 0)" fill="#99ebc2" />
                                            <path id="Path_1035" data-name="Path 1035"
                                                d="M15.077,8.607a.961.961,0,0,1,1.787,0l1.559,3.942a.96.96,0,0,0,.813.6l4.131.348a.961.961,0,0,1,.562,1.671l-3.217,2.9a.96.96,0,0,0-.294.927l.97,4.277A.961.961,0,0,1,19.932,24.3l-3.443-2.211a.961.961,0,0,0-1.038,0L12.008,24.3a.961.961,0,0,1-1.456-1.021L11.522,19a.961.961,0,0,0-.294-.927l-3.217-2.9A.961.961,0,0,1,8.573,13.5l4.131-.348a.961.961,0,0,0,.813-.6Z"
                                                transform="translate(5.576 4.964)" fill="#00ce68" />
                                        </g>
                                    </svg>
                                </figure>
                                <h4>{{ $ratings->count() }}+</h4>
                                <h6>{{ __('site.reviews') }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ./numbers-section -->

        <!-- why-rightguide-section -->
        <section class="why-rightguide-section">
            <div class="container">
                <div class="main-title text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2>{{ __('site.Why_choose_Right_Guide') }} </h2>
                </div>
                <div class="content">
                    <div class="row">
                        @foreach ($contents->where('link', 'why_choose_us')->take(4) as $content)
                            <div class="col-lg-3 col-md-6">
                                <div class="general-card why-card wow fadeInUp" data-wow-duration="1s"
                                    data-wow-delay="0.1s">
                                    <figure class="circle-img mb-0">
                                        <img src="{{ asset('uploads/contents/' . ($content->image->image ?? 'default.jpg')) }}"
                                            alt="" style="width:100%;height:100%;object-fit:cover;">
                                    </figure>
                                    <div class="general-card-body">
                                        <h4>{{ $content->title }}</h4>
                                        <p>
                                            {!! $content->content !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- ./why-rightguide-section -->

        <!-- consultation-section -->
        <section class="consulation-section callaction-section">
            <div class="container">
                <div class="content">
                    @foreach ($contents as $content)
                        @if ($content->title == 'طلب استشارة')
                            @php
                                $contentTranslation = $content->translations()->where('locale', 'en')->first();
                                $title = $contentTranslation ? json_decode($contentTranslation->content)->title : null;
                                $contentTranslation = $contentTranslation
                                    ? json_decode($contentTranslation->content)->content
                                    : null;
                            @endphp
                            <div class="row align-items-center">
                                <div class="col-lg-2">
                                    <figure>
                                        <img src="{{ asset('uploads/contents/' . ($content->image->image ?? 'default.jpg')) }}"
                                            class="wow zoomIn" data-wow-duration="1s" data-wow-delay="0.1s"
                                            alt="" srcset="">
                                    </figure>
                                </div>
                                <div class="col-lg-7">
                                    <h4 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                                        {{ app()->getLocale() == 'en' ? $title : $content->title }}
                                    </h4>
                                    <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                                        {!! app()->getLocale() == 'en' ? $contentTranslation : $content->content !!}
                                    </p>
                                </div>
                                <div class="col-lg-3 mx-auto">
                                    <a href="{{ $content->link }}" class="btn cs-btn wow fadeInUp"
                                        data-wow-duration="1s" data-wow-delay="0.3s">
                                        {{ app()->getLocale() == 'en' ? $title : $content->title }}</a>
                                </div>
                            </div>
                            @break
                        @endif
                    @endforeach

                </div>
            </div>
        </section>
        <!-- ./consultation-section -->

        <!-- rates-stories-section -->
        <section class="rates-stories-section">
            <div class="container">
                <div class="main-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2> {{ __('site.stories_and_reviews') }}</h2>
                </div>
                <div class="content">
                    {{-- <div class="owl-carousel rates-slider owl-slider">
                        <div class="rates-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                            <div class="rate">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14.854"
                                        viewBox="0 0 16 14.854">
                                        <path id="Path"
                                            d="M7.3.462A.765.765,0,0,1,8.7.462l1.668,3.866a.765.765,0,0,0,.644.46l4.278.331a.765.765,0,0,1,.428,1.353L12.5,9.128a.765.765,0,0,0-.256.774l.99,4a.765.765,0,0,1-1.131.843L8.388,12.556a.765.765,0,0,0-.776,0L3.893,14.746A.765.765,0,0,1,2.762,13.9l.99-4A.765.765,0,0,0,3.5,9.128L.279,6.471A.765.765,0,0,1,.707,5.118l4.278-.331a.765.765,0,0,0,.644-.46Z"
                                            fill="#ffc542" />
                                    </svg>
                                </span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14.854"
                                        viewBox="0 0 16 14.854">
                                        <path id="Path"
                                            d="M7.3.462A.765.765,0,0,1,8.7.462l1.668,3.866a.765.765,0,0,0,.644.46l4.278.331a.765.765,0,0,1,.428,1.353L12.5,9.128a.765.765,0,0,0-.256.774l.99,4a.765.765,0,0,1-1.131.843L8.388,12.556a.765.765,0,0,0-.776,0L3.893,14.746A.765.765,0,0,1,2.762,13.9l.99-4A.765.765,0,0,0,3.5,9.128L.279,6.471A.765.765,0,0,1,.707,5.118l4.278-.331a.765.765,0,0,0,.644-.46Z"
                                            fill="#ffc542" />
                                    </svg>
                                </span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14.854"
                                        viewBox="0 0 16 14.854">
                                        <path id="Path"
                                            d="M7.3.462A.765.765,0,0,1,8.7.462l1.668,3.866a.765.765,0,0,0,.644.46l4.278.331a.765.765,0,0,1,.428,1.353L12.5,9.128a.765.765,0,0,0-.256.774l.99,4a.765.765,0,0,1-1.131.843L8.388,12.556a.765.765,0,0,0-.776,0L3.893,14.746A.765.765,0,0,1,2.762,13.9l.99-4A.765.765,0,0,0,3.5,9.128L.279,6.471A.765.765,0,0,1,.707,5.118l4.278-.331a.765.765,0,0,0,.644-.46Z"
                                            fill="#ffc542" />
                                    </svg>
                                </span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14.854"
                                        viewBox="0 0 16 14.854">
                                        <path id="Path"
                                            d="M7.3.462A.765.765,0,0,1,8.7.462l1.668,3.866a.765.765,0,0,0,.644.46l4.278.331a.765.765,0,0,1,.428,1.353L12.5,9.128a.765.765,0,0,0-.256.774l.99,4a.765.765,0,0,1-1.131.843L8.388,12.556a.765.765,0,0,0-.776,0L3.893,14.746A.765.765,0,0,1,2.762,13.9l.99-4A.765.765,0,0,0,3.5,9.128L.279,6.471A.765.765,0,0,1,.707,5.118l4.278-.331a.765.765,0,0,0,.644-.46Z"
                                            fill="#ffc542" />
                                    </svg>
                                </span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14.854"
                                        viewBox="0 0 16 14.854">
                                        <path id="Path"
                                            d="M7.3.462A.765.765,0,0,1,8.7.462l1.668,3.866a.765.765,0,0,0,.644.46l4.278.331a.765.765,0,0,1,.428,1.353L12.5,9.128a.765.765,0,0,0-.256.774l.99,4a.765.765,0,0,1-1.131.843L8.388,12.556a.765.765,0,0,0-.776,0L3.893,14.746A.765.765,0,0,1,2.762,13.9l.99-4A.765.765,0,0,0,3.5,9.128L.279,6.471A.765.765,0,0,1,.707,5.118l4.278-.331a.765.765,0,0,0,.644-.46Z"
                                            fill="#ffc542" />
                                    </svg>
                                </span>
                                <h6>5.0</h6>
                            </div>
                            <p>
                                أنا معجب جدا بخدماتكم، لقد أخبرت
                                ،الأصدقاء عن خدماتكم الممتازة
                                .أنصح المرضى بإستخدام المنصة
                            </p>
                            <div class="rates-card-info">
                                <figure>
                                    <img src="assets/images/avatar.png" alt="" srcset="">
                                </figure>
                                <div>
                                    <h4>عبدالكريم محمد</h4>
                                    <h6>‏12 أغسطس، 2022</h6>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="owl-carousel rates-slider owl-slider">
                        @foreach ($ratings as $rate)
                            <div class="rates-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                                <div class="rate">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14.854"
                                                viewBox="0 0 16 14.854">
                                                <path
                                                    d="M7.3.462A.765.765,0,0,1,8.7.462l1.668,3.866a.765.765,0,0,0,.644.46l4.278.331a.765.765,0,0,1,.428,1.353L12.5,9.128a.765.765,0,0,0-.256.774l.99,4a.765.765,0,0,1-1.131.843L8.388,12.556a.765.765,0,0,0-.776,0L3.893,14.746A.765.765,0,0,1,2.762,13.9l.99-4A.765.765,0,0,0,3.5,9.128L.279,6.471A.765.765,0,0,1,.707,5.118l4.278-.331a.765.765,0,0,0,.644-.46Z"
                                                    fill="{{ $i <= (int) $rate->rating ? '#ffc542' : '#e5e7eb' }}" />
                                            </svg>
                                        </span>
                                    @endfor
                                    <h6>{{ number_format((float) $rate->rating, 1) }}</h6>
                                </div>

                                <p>{{ $rate->comment }}</p>

                                <div class="rates-card-info">
                                    <figure>
                                        <img src="{{ $rate->user?->img ? asset('uploads/users/' . $rate->user->img) : asset('assets/images/avatar.png') }}"
                                            alt="">
                                    </figure>
                                    <div>
                                        <h4>{{ $rate->user?->name ?? 'مستخدم' }}</h4>
                                        <h6>{{ \Carbon\Carbon::parse($rate->date ?? $rate->created_at)->translatedFormat('d F، Y') }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>
        <!-- ./rates-stories-section -->


        <!-- offers-section -->
        <!-- service-request-section -->
        <section class="callaction-section service-request-section">
            <div class="container">
                @foreach ($contents as $content)
                    @if ($content->title == 'طلب خدمة')
                        @php
                            $contentTranslation = $content->translations()->where('locale', 'en')->first();
                            $title = $contentTranslation ? json_decode($contentTranslation->content)->title : null;
                            $contentTranslation = $contentTranslation
                                ? json_decode($contentTranslation->content)->content
                                : null;
                        @endphp
                        <div class="content">
                            <div class="row align-items-center">
                                <div class="col-lg-2">
                                    <figure>
                                        <img src="{{ asset('uploads/contents/' . ($content->image->image ?? 'default.jpg')) }}"
                                            class="wow zoomIn" data-wow-duration="1s" data-wow-delay="0.1s"
                                            alt="" srcset="">
                                    </figure>
                                </div>
                                <div class="col-lg-7">
                                    <h4 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                                        {{ app()->getLocale() == 'en' ? $title : $content->title }} </h4>
                                    <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                                        {!! app()->getLocale() == 'en' ? $contentTranslation : $content->content !!}
                                    </p>
                                </div>
                                <div class="col-lg-3 mx-auto">
                                    <a href="{{ $content->link }}" class="btn cs-btn wow fadeInUp"
                                        data-wow-duration="1s" data-wow-delay="0.3s">
                                        {{ app()->getLocale() == 'en' ? $title : $content->title }} </a>
                                </div>
                            </div>
                        </div>
                        @break
                    @endif
                @endforeach

            </div>
        </section>
        <!-- ./service-request-section -->
        <section class="offers-section">
            <div class="container">
                <div class="main-title d-flex flex-wrap justify-content-between align-items-center wow fadeInUp"
                    data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2>{{ __('site.best_offers') }}</h2>
                    <a href="{{ route('offers') }}" class="btn cs-btn"> {{ __('site.show') }}
                        {{ __('site.all') }} {{ __('site.offers') }} </a>
                </div>
                <div class="content">
                    <div class="row">
                        @foreach ($offers as $offer)
                            <div class="col-lg-3 col-md-6">
                                <a href="{{ route('pay', $offer) }}">
                                    <div class="offer-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                                        <figure>
                                            <img src="{{ asset('assets/front_end/images/offer-1.png') }}" alt=""
                                                srcset="">
                                            <div class="discount">
                                                ‏{{ intval($offer->discount_value) }}% {{ __('site.discount') }}
                                            </div>
                                        </figure>
                                        <div class="offer-card-body">
                                            <h4> {{ $offer->specialization->name }} </h4>
                                            <h6> {{ $offer->hospital->name }} </h6>
                                            <h6> {{ $offer->doctor->name }} </h6>
                                            <div class="price">
                                                <p>${{ $offer->price }}</p>
                                                <p> {{ number_format($offer->price * (1 - $offer->discount_value / 100), 2) }}
                                                    $</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        <!-- offers-section -->

        <!-- standers-section -->
        <section class="standers-section">
            <div class="container">
                <div class="main-title text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2>{{ __('site.hospital_selection_criteria') }}</h2>
                </div>
                <div class="content">
                    <div class="row">
                        @foreach ($contents->where('link', 'hospital_criteria')->take(6) as $content)
                            @php
                                $contentTranslation = $content->translations()->where('locale', 'en')->first();
                                $title = $contentTranslation ? json_decode($contentTranslation->content)->title : null;
                                $contentTranslation = $contentTranslation
                                    ? json_decode($contentTranslation->content)->content
                                    : null;
                            @endphp
                            <div class="col-lg-4 col-md-6">
                                <div class="standers-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                                    <figure>
                                        <img src="{{ asset('uploads/contents/' . ($content->image->image ?? 'default.jpg')) }}"
                                            alt="" srcset="">
                                    </figure>
                                    <h4> {{ app()->getLocale() == 'en' ? $title : $content->title }}</h4>
                                    <p>
                                        {!! app()->getLocale() == 'en' ? $contentTranslation : $content->content !!}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- ./standers-section -->

        <!-- contact-us-section -->
        <section class="callaction-section contact-us-section">
            <div class="container">
                @foreach ($contents as $content)
                    @if ($content->title == 'تواصل معنا')
                        @php
                            $contentTranslation = $content->translations()->where('locale', 'en')->first();
                            $title = $contentTranslation ? json_decode($contentTranslation->content)->title : null;
                            $contentTranslation = $contentTranslation
                                ? json_decode($contentTranslation->content)->content
                                : null;
                        @endphp
                        <div class="content">
                            <div class="row align-items-center">
                                <div class="col-lg-2">
                                    <figure>
                                        <img src="{{ asset('uploads/contents/' . ($content->image->image ?? 'default.jpg')) }}"
                                            class="wow zoomIn" data-wow-duration="1s" data-wow-delay="0.1s"
                                            alt="" srcset="">
                                    </figure>
                                </div>
                                <div class="col-lg-7">
                                    <h4 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                                        {{ app()->getLocale() == 'en' ? $title : $content->title }} </h4>
                                    <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                                        {!! app()->getLocale() == 'en' ? $contentTranslation : $content->content !!}
                                    </p>
                                </div>
                                <div class="col-lg-3 mx-auto">
                                    <a href="{{ $content->link }}" class="btn cs-btn wow fadeInUp"
                                        data-wow-duration="1s" data-wow-delay="0.3s">
                                        {{ app()->getLocale() == 'en' ? $title : $content->title }} </a>
                                </div>
                            </div>
                        </div>
                        @break
                    @endif
                @endforeach
            </div>
        </section>
        <!-- ./contact-us-section -->

        <!-- blog-section -->
        <section class="blog-section">
            <div class="container">
                <div class="main-title d-flex flex-wrap justify-content-between align-items-center wow fadeInUp"
                    data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2>{{ __('site.blog') }}</h2>
                    {{-- <a href="blog.html" class="btn cs-btn">عرض كل المقالات</a> --}}
                </div>
                <div class="content">
                    <div class="row">
                        @foreach ($contents->where('link', 'blog')->take(3) as $content)
                            @php
                                $contentTranslation = $content->translations()->where('locale', 'en')->first();
                                $title = $contentTranslation ? json_decode($contentTranslation->content)->title : null;
                                $contentTranslation = $contentTranslation
                                    ? json_decode($contentTranslation->content)->content
                                    : null;
                            @endphp
                            <div class="col-lg-4 col-md-6">
                                <a href="{{ route('blog.details', $content->id) }}">
                                    <div class="article-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                                        <figure style="width:100%; height:220px; overflow:hidden; border-radius:12px;">
                                            <img src="{{ asset('uploads/contents/' . ($content->image->image ?? 'default.jpg')) }}"
                                                alt=""
                                                style=" width:100%; height:100%; object-fit:cover; object-position:center; display:block;">
                                        </figure>
                                        <div class="article-card-body">
                                            <h6>
                                                {{ $content->created_at->translatedFormat('d F، Y') }}
                                            </h6>

                                            <h4> {{ app()->getLocale() == 'en' ? $title : $content->title }}</h4>

                                            <p>
                                                @if (app()->getLocale() == 'en')
                                                    {{ \Illuminate\Support\Str::words(strip_tags($contentTranslation), 20, '...') }}
                                                @else
                                                    {{ \Illuminate\Support\Str::words(strip_tags($content->content), 20, '...') }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- ./blog-section -->


        <!-- our-partners-section -->
        <section class="our-partners-section">
            <div class="container">
                <div class="main-title text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2> {{ __('site.our_partners_in_success') }} </h2>
                </div>
                <div class="content">
                    <div class="d-flex align-items-center flex-wrap gap-3">
                        <div class="partner-card">
                            <figure class="scale">
                                <img src="{{ asset('assets/front_end/images/partner-1.png') }}" class="wow zoomIn"
                                    data-wow-duration="1s" data-wow-delay="0.1s" alt="" srcset="">
                            </figure>
                        </div>
                        <div class="partner-card">
                            <figure class="scale">
                                <img src="{{ asset('assets/front_end/images/partner-2.png') }}" class="wow zoomIn"
                                    data-wow-duration="1s" data-wow-delay="0.2s" alt="" srcset="">
                            </figure>
                        </div>
                        <div class="partner-card">
                            <figure class="scale">
                                <img src="{{ asset('assets/front_end/images/partner-3.png') }}" class="wow zoomIn"
                                    data-wow-duration="1s" data-wow-delay="0.3s" alt="" srcset="">
                            </figure>
                        </div>
                        <div class="partner-card">
                            <figure class="scale">
                                <img src="{{ asset('assets/front_end/images/partner-4.png') }}" class="wow zoomIn"
                                    data-wow-duration="1s" data-wow-delay="0.4s" alt="" srcset="">
                            </figure>
                        </div>
                        <div class="partner-card">
                            <figure class="scale">
                                <img src="{{ asset('assets/front_end/images/partner-5.png') }}" class="wow zoomIn"
                                    data-wow-duration="1s" data-wow-delay="0.5s" alt="" srcset="">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ./our-partners-section -->

        <!-- mailinglist-section -->
        <section class="mailinglist-section">
            <div class="container">
                <div class="content">
                    <h4>
                        {{ __('site.con_l') }}
                    </h4>
                    <form action="#" method="post">
                        <div class="cs-search-input">
                            <span>
                                <svg id="vuesax_bulk_sms" data-name="vuesax/bulk/sms" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24">
                                    <g id="sms">
                                        <path id="Vector" d="M0,0H24V24H0Z" fill="none" opacity="0" />
                                        <path id="Vector-2" data-name="Vector"
                                            d="M15,17H5c-3,0-5-1.5-5-5V5C0,1.5,2,0,5,0H15c3,0,5,1.5,5,5v7C20,15.5,18,17,15,17Z"
                                            transform="translate(2 3.5)" fill="#868692" opacity="0.4" />
                                        <g id="Group" transform="translate(6.247 8.244)">
                                            <path id="Vector-3" data-name="Vector"
                                                d="M5.753,4.626a3.717,3.717,0,0,1-2.34-.79l-3.13-2.5a.747.747,0,1,1,.93-1.17l3.13,2.5a2.386,2.386,0,0,0,2.81,0l3.13-2.5a.738.738,0,0,1,1.05.12.738.738,0,0,1-.12,1.05l-3.13,2.5A3.67,3.67,0,0,1,5.753,4.626Z"
                                                fill="#868692" />
                                        </g>
                                    </g>
                                </svg>

                            </span>
                            <input type="text" class="form-control custom-input"
                                placeholder="{{ __('site.enter_your_email_address') }}">
                            <button type="button" class="btn cs-btn v2">{{ __('site.subscription') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- ./mailinglist-section -->

        <!-- contact-us-btn -->
        <div class="contact-us-btn">
            <a href="#">
                <figure>
                    <img src="assets/images/contact-us-icon.svg" alt="" srcset="">
                </figure>
            </a>
            <p>طلب مساعدة</p>
        </div>
        <!-- ./contact-us-btn -->
    </div>
@endsection
@section('js')
    <script>
        function openDetails(el) {
            const type = el.dataset.type;
            let title = '';
            let body = '';

            if (type === 'doctor') {
                title = 'Doctor Details';
                body = `
            <p><strong>Name:</strong> ${el.dataset.name}</p>
            <p><strong>Specialization:</strong> ${el.dataset.specialization}</p>
            <p><strong>Hospital:</strong> ${el.dataset.hospital}</p>
            <p><strong>Bio:</strong><br>${el.dataset.bio}</p>
        `;
            }

            if (type === 'hospital') {
                title = 'Hospital Details';
                body = `
            <p><strong>Name:</strong> ${el.dataset.name}</p>
            <p><strong>Country:</strong> ${el.dataset.country}</p>
            <p><strong>Description:</strong><br>${el.dataset.description}</p>
        `;
            }

            if (type === 'specialization') {
                title = 'Specialization Details';
                body = `
            <p><strong>Name:</strong> ${el.dataset.name}</p>
        `;
            }

            document.getElementById('modalTitle').innerHTML = title;
            document.getElementById('modalBody').innerHTML = body;

            new bootstrap.Modal(document.getElementById('detailsModal')).show();
        }
    </script>
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const keyword = this.value.toLowerCase().trim();
            const items = document.querySelectorAll('.suggestion');

            items.forEach(item => {
                const text = (
                    item.dataset.name +
                    item.dataset.type +
                    item.dataset.specialization +
                    item.dataset.hospital +
                    item.dataset.country
                ).toLowerCase();

                item.style.display = text.includes(keyword) ? 'block' : 'none';
            });
        });

        function triggerSearch() {
            document.getElementById('searchInput')
                .dispatchEvent(new Event('keyup'));
        }
    </script>
    <script>
        $('.rates-slider').owlCarousel({
            loop: false,
            rewind: true
        });
    </script>
@endsection
