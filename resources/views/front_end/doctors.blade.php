@extends('front_end.layout.app')
@section('content')
    <style>
        .body-content.hospitals-page {
            padding-bottom: 0 !important;
            margin-bottom: 0 !important;
        }

        .hospitals-filter {
            margin-bottom: 0 !important;
            padding-bottom: 0 !important;
        }

        .hospitals-filter .content {
            margin-bottom: 0 !important;
            padding-bottom: 0 !important;
        }

        .hospitals-page+.container {
            margin-top: 0 !important;
            padding-top: 0 !important;
        }

        .hospitals-page+.container .row {
            margin-top: 0 !important;
        }

        /* ضبط شكل صورة الدكتور داخل الكرت */
        .hospital-media .main-img {
            overflow: hidden;
        }

        .hospital-media .main-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
    </style>

    <div class="body-content hospitals-page">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">
                            <span class="px-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20.02" height="19.998"
                                    viewBox="0 0 20.02 19.998">
                                    <g id="vuesax_bulk_home-2" data-name="vuesax/bulk/home-2"
                                        transform="translate(-621.99 -190.002)">
                                        <g id="home-2">
                                            <path id="Vector"
                                                d="M18.05,4.818,12.29.788A4.853,4.853,0,0,0,6.8.918L1.79,4.828A5.153,5.153,0,0,0,0,8.468v6.9A4.631,4.631,0,0,0,4.62,20H15.4a4.622,4.622,0,0,0,4.62-4.62V8.6A5.1,5.1,0,0,0,18.05,4.818Z"
                                                transform="translate(621.99 190.002)" fill="#e2e2e2" />
                                            <path id="Vector-2" data-name="Vector"
                                                d="M.75,4.5A.755.755,0,0,1,0,3.75v-3A.755.755,0,0,1,.75,0,.755.755,0,0,1,1.5.75v3A.755.755,0,0,1,.75,4.5Z"
                                                transform="translate(631.25 202.25)" fill="#05060f" />
                                        </g>
                                    </g>
                                </svg>
                            </span>
                            <span>{{ __('front.main') }}</span>
                        </a>
                    </li>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="6.811" height="12.121" viewBox="0 0 6.811 12.121">
                            <path id="Arrow_-_Right" data-name="Arrow - Right" d="M10,0,5,5,0,0"
                                transform="translate(5.75 1.061) rotate(90)" fill="none" stroke="#727a83"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
                        </svg>
                    </span>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('site.doctors') }}</li>
                </ol>
            </nav>

            <div class="main-title">
                <h2> {{ __('site.high_quality_doctos') }}</h2>
            </div>
        </div>

        <div class="hospitals-filter">
            <div class="container">
                <div class="content">
                    <div class="d-flex justify-content-between">
                        <h3>{{ __('site.filtering_factors') }}</h3>
                        <a href="#" class="clear-all">{{ __('site.clear_all') }}</a>
                    </div>

                    <div class="form">
                        <form action="{{ route('doctors') }}" method="get">
                            <div class="row align-items-end">

                                <div class="col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('site.doctor') }}</label>
                                        <input type="text" name="doctor_name" class="form-control custom-input"
                                            placeholder="{{ __('site.searchB') }} {{ __('site.for') }} {{ __('site.doctor') }}"
                                            value="{{ request('doctor_name') }}">
                                    </div>
                                </div>

                                <!-- التخصص -->
                                <div class="col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('site.specialization') }}</label>
                                        <select name="specialization_id" class="form-select custom-input">
                                            <option value="">{{ __('site.choose') }} {{ __('site.specialization') }}
                                            </option>
                                            @foreach ($specializations as $specialization)
                                                <option value="{{ $specialization->id }}"
                                                    {{ request('specialization_id') == $specialization->id ? 'selected' : '' }}>
                                                    {{ $specialization->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- الدولة -->
                                <div class="col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('site.country') }}</label>
                                        <select name="country_id" class="form-select custom-input">
                                            <option value="">{{ __('site.choose') }} {{ __('site.country') }}
                                            </option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}"
                                                    {{ request('country_id') == $country->id ? 'selected' : '' }}>
                                                    {{ $country->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- المستشفى (ملاحظة: عندك هنا لازم تكون قائمة مستشفيات مش دكاترة، بس خليته زي ما كودك) -->
                                <div class="col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('site.hospitel') }}</label>
                                        <select name="hospital_id" class="form-select custom-input">
                                            <option value="">{{ __('site.choose') }} {{ __('site.hospitel') }}
                                            </option>
                                            @foreach ($doctors as $doctor)
                                                <option value="{{ $doctor->id }}"
                                                    {{ request('hospital_id') == $doctor->id ? 'selected' : '' }}>
                                                    {{ $doctor->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- زر البحث -->
                                <div class="col-lg-auto col-md-6">
                                    <button type="submit" class="btn cs-btn v2">{{ __('site.searchB') }}</button>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <br>


            <div class="container" style="margin-top:0; padding-top:0;">
                <div class="content" style="margin-top:0; padding-top:0;">
                    <div class="row mt-0">

                        @foreach ($doctors as $doctor)
                            @php
                                $doctorImage = optional($doctor->image)->image ?? 'default.jpg';
                            @endphp

                            <div class="col-lg-auto col-md-6">
                                <div class="hospital-media">
                                    <figure class="main-img">
                                        <img src="{{ asset('uploads/doctors/' . $doctorImage) }}" alt="">
                                    </figure>

                                    <div class="hospital-media-body">
                                        <div class="hospital-media-body_title">
                                            <div>
                                                <h2>{{ $doctor->name }}</h2>

                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <div class="rate">
                                                            @php
                                                                $count = $doctor->ratings->count();
                                                                $average =
                                                                    $count > 0 ? $doctor->ratings->avg('rating') : 0;
                                                            @endphp
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="21.63"
                                                                    height="20" viewBox="0 0 21.63 20">
                                                                    <g id="Star" transform="translate(-3.355 -2.05)">
                                                                        <path id="Path"
                                                                            d="M9.865.622a1.036,1.036,0,0,1,1.9,0L14.02,5.827a1.034,1.034,0,0,0,.87.619l5.783.445a1.029,1.029,0,0,1,.579,1.822L16.9,12.29a1.028,1.028,0,0,0-.346,1.042L17.9,18.719a1.033,1.033,0,0,1-1.529,1.135L11.34,16.907a1.038,1.038,0,0,0-1.05,0L5.263,19.854a1.033,1.033,0,0,1-1.529-1.135l1.339-5.387a1.028,1.028,0,0,0-.346-1.042L.377,8.713A1.029,1.029,0,0,1,.956,6.891L6.74,6.446a1.034,1.034,0,0,0,.87-.619Z"
                                                                            transform="translate(3.355 2.05)"
                                                                            fill="#ffc542" />
                                                                    </g>
                                                                </svg>
                                                                {{ $average }}
                                                            </span>
                                                            <p class="mb-0">({{ $count }})
                                                                {{ __('site.reviews') }}</p>
                                                        </div>

                                                        <div class="address">
                                                            <span>
                                                                <svg id="vuesax_bulk_location"
                                                                    data-name="vuesax/bulk/location"
                                                                    xmlns="http://www.w3.org/2000/svg" width="17.75"
                                                                    height="20.5" viewBox="0 0 17.75 20.5">
                                                                    <g id="location">
                                                                        <path id="Vector"
                                                                            d="M17.5,6.7A8.626,8.626,0,0,0,8.88,0H8.87A8.624,8.624,0,0,0,.25,6.69C-.92,11.85,2.24,16.22,5.1,18.97a5.422,5.422,0,0,0,7.55,0C15.51,16.22,18.67,11.86,17.5,6.7Z"
                                                                            fill="#d3d3d8" />
                                                                        <path id="Vector-2" data-name="Vector"
                                                                            d="M6.3,3.15A3.15,3.15,0,1,1,3.15,0,3.15,3.15,0,0,1,6.3,3.15Z"
                                                                            transform="translate(5.73 5.41)"
                                                                            fill="#868692" />
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                            <p class="mb-0">
                                                                {{ $doctor->hospital->country->name }} ،
                                                                {{ $doctor->hospital->city->name }}
                                                            </p>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="hospital-media-body_description">
                                                {{-- وصف مختصر لو بدك --}}
                                            </div>

                                            <div class="hospital-media-body_footer">
                                                <div>
                                                    <div class="info">
                                                        <h6 class="me-1">{{ __('site.year_of_establishment') }} :</h6>
                                                        <h5>{{ __('site.year') }} {{ __('site.in') }}
                                                            {{ $doctor->created_at->format('Y') }}</h5>
                                                    </div>

                                                    <div class="info">
                                                        <h6 class="me-1">{{ __('site.specialization') }} :</h6>
                                                        <h5>{{ $doctor->specialization->name }}</h5>
                                                    </div>

                                                    <div class="info">
                                                        <h6 class="me-1">{{ __('site.gender') }} :</h6>
                                                        <h5>{{ $doctor->gender == 'male' ? __('site.male') : __('site.fmale') }}
                                                        </h5>
                                                    </div>

                                                    <div class="info">
                                                        <h6 class="me-1">{{ __('site.hospitel') }} :</h6>
                                                        <h5>{{ $doctor->hospital->name }}</h5>
                                                    </div>

                                                    <div class="info">
                                                        <h6 class="me-1">{{ __('site.nationality') }} :</h6>
                                                        <h5>{{ $doctor->nationalitie->name }}</h5>
                                                    </div>
                                                </div>

                                                <div
                                                    class="d-flex flex-wrap gap-2 align-items-center flex-lg-grow-0 flex-grow-1">
                                                    <a href="{{ route('doctor_details', $doctor->id) }}"
                                                        class="btn cs-btn cs-w-h">{{ __('site.show') }}
                                                        {{ __('site.details') }}</a>
                                                    <a href="#"
                                                        class="btn cs-btn v2 cs-w-h">{{ __('site.request_for_quotation') }}</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-lg-12">
                            <nav class="cs-pagination">
                                <ul class="pagination">

                                    {{-- Previous --}}
                                    @if ($doctors->onFirstPage())
                                        <li class="page-item disabled">
                                            <span class="page-link">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="6.811" height="12.121"
                                                    viewBox="0 0 6.811 12.121">
                                                    <path id="Arrow_-_Right" data-name="Arrow - Right" d="M10,5,5,0,0,5"
                                                        transform="translate(6.061 1.061) rotate(90)" fill="none"
                                                        stroke="#aeaeb1" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5"></path>
                                                </svg>
                                            </span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $doctors->previousPageUrl() }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="6.811" height="12.121"
                                                    viewBox="0 0 6.811 12.121">
                                                    <path id="Arrow_-_Right" data-name="Arrow - Right" d="M10,5,5,0,0,5"
                                                        transform="translate(6.061 1.061) rotate(90)" fill="none"
                                                        stroke="#aeaeb1" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5"></path>
                                                </svg>
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Numbers --}}
                                    @foreach ($doctors->links()->elements[0] as $page => $url)
                                        <li class="page-item {{ $page == $doctors->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach

                                    {{-- Next --}}
                                    @if ($doctors->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $doctors->nextPageUrl() }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="6.811" height="12.121"
                                                    viewBox="0 0 6.811 12.121">
                                                    <path id="Arrow_-_Right" data-name="Arrow - Right" d="M10,0,5,5,0,0"
                                                        transform="translate(5.75 1.061) rotate(90)" fill="none"
                                                        stroke="#05060f" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5"></path>
                                                </svg>
                                            </a>
                                        </li>
                                    @else
                                        <li class="page-item disabled">
                                            <span class="page-link">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="6.811" height="12.121"
                                                    viewBox="0 0 6.811 12.121">
                                                    <path id="Arrow_-_Right" data-name="Arrow - Right" d="M10,0,5,5,0,0"
                                                        transform="translate(5.75 1.061) rotate(90)" fill="none"
                                                        stroke="#05060f" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5"></path>
                                                </svg>
                                            </span>
                                        </li>
                                    @endif

                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>

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
        @endsection
