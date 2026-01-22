@extends('front_end.layout.app')
@section('content')

    <div class="body-content hospital-details-page">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('index') }}">
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
                    <li class="breadcrumb-item">
                        <a href="{{ route('specializations') }}">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="6.811" height="12.121"
                                    viewBox="0 0 6.811 12.121">
                                    <path id="Arrow_-_Right" data-name="Arrow - Right" d="M10,0,5,5,0,0"
                                        transform="translate(5.75 1.061) rotate(90)" fill="none" stroke="#727a83"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
                                </svg>

                            </span>
                            <span>{{ __('site.specializations') }} </span>
                        </a>
                    </li>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="6.811" height="12.121" viewBox="0 0 6.811 12.121">
                            <path id="Arrow_-_Right" data-name="Arrow - Right" d="M10,0,5,5,0,0"
                                transform="translate(5.75 1.061) rotate(90)" fill="none" stroke="#727a83"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
                        </svg>

                    </span>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('site.details') }} {{ __('site.specialization') }}</li>
                </ol>
            </nav>
        </div>
        <div class="main-section">
            <div class="container">
                <div class="content">

                    <div class="d-flex align-items-center gap-3">
                        <figure class="circle-img mb-0">
                            <img src="{{ asset('uploads/specializations/' . ($specialization->image?->image ?? 'default.jpg')) }}"
                                alt="">
                        </figure>

                        <div>
                            <h2> {{ $specialization->name }} </h2>
                            <div class="d-flex ">
                                <div class="rate">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21.63" height="20"
                                            viewBox="0 0 21.63 20">
                                            <g id="Star" transform="translate(-3.355 -2.05)">
                                                <path id="Path"
                                                    d="M9.865.622a1.036,1.036,0,0,1,1.9,0L14.02,5.827a1.034,1.034,0,0,0,.87.619l5.783.445a1.029,1.029,0,0,1,.579,1.822L16.9,12.29a1.028,1.028,0,0,0-.346,1.042L17.9,18.719a1.033,1.033,0,0,1-1.529,1.135L11.34,16.907a1.038,1.038,0,0,0-1.05,0L5.263,19.854a1.033,1.033,0,0,1-1.529-1.135l1.339-5.387a1.028,1.028,0,0,0-.346-1.042L.377,8.713A1.029,1.029,0,0,1,.956,6.891L6.74,6.446a1.034,1.034,0,0,0,.87-.619Z"
                                                    transform="translate(3.355 2.05)" fill="#ffc542" />
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <div class="address">
                                   <h4> {{ __('site.nameH') }}:</h4>
                                    @foreach ($specialization->hostpials as $h)
                                        {{ $h->name }} ,
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn cs-btn v2 cs-w-h">{{ __('site.request_for_quotation') }} </a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-4">
                <div class="col-lg-9">
                    {{-- <div class="owl-carousel hospital-details-slider owl-slider mt-32">
                        <figure class="overlay video-img" href="assets/images/img-hospital-details.png" data-fancybox="">
                            <img src="assets/images/img-hospital-details.png" alt="" srcset="">
                            <div class="play">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22.168" height="25.728"
                                    viewBox="0 0 22.168 25.728">
                                    <path id="Shape"
                                        d="M5.547.55l14.9,9.224a3.634,3.634,0,0,1,0,6.18l-14.9,9.224A3.634,3.634,0,0,1,0,22.088V3.64A3.634,3.634,0,0,1,5.547.55Z"
                                        fill="#05051b"></path>
                                </svg>
                            </div>
                        </figure>
                        <figure class="overlay">
                            <img src="assets/images/img-hospital-details.png" alt="" srcset="">
                        </figure>
                        <figure class="overlay">
                            <img src="assets/images/img-hospital-details.png" alt="" srcset="">
                        </figure>
                        <figure class="overlay">
                            <img src="assets/images/img-hospital-details.png" alt="" srcset="">
                        </figure>
                    </div> --}}
                    <div id="cs-tabs" class="list-group cs-tabs">
                        <a class="list-group-item list-group-item-action" href="#list-item-2">{{ __('site.specializations') }}</a>
                        <a class="list-group-item list-group-item-action" href="#list-item-3">{{ __('site.doctors') }}</a>
                        <a class="list-group-item list-group-item-action" href="#list-item-4">{{ __('site.map') }}</a>
                    </div>
                    <div data-bs-spy="scroll" data-bs-target="#cs-tabs" data-bs-offset="0" class="scrollspy-example"
                        tabindex="0">
                        <div id="list-item-2" class="tab-section">
                            <h4>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <g id="Medical_Case" data-name="Medical Case" transform="translate(-2 -2)">
                                        <path id="Path_775" data-name="Path 775"
                                            d="M8,6.8V5.6A3.6,3.6,0,0,1,11.6,2h4.8A3.6,3.6,0,0,1,20,5.6V6.8h2.4A3.6,3.6,0,0,1,26,10.4v12A3.6,3.6,0,0,1,22.4,26H5.6A3.6,3.6,0,0,1,2,22.4v-12A3.6,3.6,0,0,1,5.6,6.8Zm2.4-1.2a1.2,1.2,0,0,1,1.2-1.2h4.8a1.2,1.2,0,0,1,1.2,1.2V6.8H10.4Z"
                                            fill="#99ebc2" fill-rule="evenodd" />
                                        <path id="Path_776" data-name="Path 776"
                                            d="M11.625,11.208a1.208,1.208,0,0,1,2.417,0v2.417h2.417a1.208,1.208,0,1,1,0,2.417H14.042v2.417a1.208,1.208,0,0,1-2.417,0V16.042H9.208a1.208,1.208,0,0,1,0-2.417h2.417Z"
                                            transform="translate(1.166 1.555)" fill="#00ce68" fill-rule="evenodd" />
                                    </g>
                                </svg>

                                {{ __('site.specializations') }}

                            </h4>
                            <ul class="majors-list">
                                @foreach ($specializations as $specialization)
                                    <li> {{ $specialization->name }} </li>
                                @endforeach

                            </ul>
                        </div>
                        <div id="list-item-3" class="tab-section">
                            <h4>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <g id="Stethoscope" transform="translate(-2 -2)">
                                        <path id="Path_808" data-name="Path 808"
                                            d="M8.2,12a1.2,1.2,0,0,1,1.2,1.2v3a5.4,5.4,0,1,0,10.808,0V14.4a1.2,1.2,0,1,1,2.4,0v1.8A7.806,7.806,0,1,1,7,16.2v-3A1.2,1.2,0,0,1,8.2,12Z"
                                            transform="translate(0.987 1.991)" fill="#99ebc2" fill-rule="evenodd" />
                                        <path id="Path_809" data-name="Path 809"
                                            d="M5.2,4.4a.8.8,0,0,0-.8.8v4a4.8,4.8,0,1,0,9.607,0v-4a.8.8,0,0,0-.8-.8h-.4a1.2,1.2,0,0,1,0-2.4h.4a3.2,3.2,0,0,1,3.2,3.2v4A7.205,7.205,0,0,1,2,9.205v-4A3.2,3.2,0,0,1,5.2,2h.4a1.2,1.2,0,0,1,0,2.4Z"
                                            transform="translate(0 0)" fill="#00ce68" fill-rule="evenodd" />
                                        <path id="Path_810" data-name="Path 810"
                                            d="M19.6,13.8a1.2,1.2,0,1,0-1.2-1.2A1.2,1.2,0,0,0,19.6,13.8Zm0,2.4A3.6,3.6,0,1,0,16,12.6,3.6,3.6,0,0,0,19.6,16.205Z"
                                            transform="translate(2.795 1.397)" fill="#00ce68" fill-rule="evenodd" />
                                    </g>
                                </svg>
                                {{ __('site.doctors') }}
                            </h4>
                            <ul class="majors-list">
                                @foreach ($doctors as $doctor)
                                    <li> {{ $doctor->name }} </li>
                                @endforeach

                            </ul>
                        </div>
                        <div id="list-item-4" class="tab-section">
                            <h4>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20.78" height="24"
                                    viewBox="0 0 20.78 24">
                                    <g id="location" transform="translate(-431.12 -189.75)">
                                        <path id="Vector"
                                            d="M20.488,7.844A10.1,10.1,0,0,0,10.4,0h-.012A10.1,10.1,0,0,0,.293,7.832c-1.37,6.041,2.33,11.157,5.678,14.377a6.348,6.348,0,0,0,8.839,0C18.158,18.989,21.858,13.885,20.488,7.844Z"
                                            transform="translate(431.12 189.75)" fill="#99ebc2" />
                                        <path id="Vector-2" data-name="Vector"
                                            d="M7.374,3.687A3.687,3.687,0,1,1,3.687,0,3.687,3.687,0,0,1,7.374,3.687Z"
                                            transform="translate(437.829 196.084)" fill="#00ce68" />
                                    </g>
                                </svg>
                                {{ __('site.map') }}
                            </h4>
                            <figure class="map">
                                <img src="{{ asset('assets/front_end/images/Location.png') }}" alt="" srcset="">
                            </figure>
                        </div>


                    </div>

                </div>
                {{-- <div class="col-lg-3">
                    <div class="form-hospital">
                        <h2>احصل على استشارة مجانية</h2>
                        <form action="#" method="get">
                            <div class="form-group mb-2">
                                <label for="">الاسم كاملا</label>
                                <input type="text" class="form-control cs-input" name="" id=""
                                    placeholder="الاسم كاملا">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">البريد الالكتروني</label>
                                <input type="email" class="form-control cs-input" name="" id=""
                                    placeholder="البريد الالكتروني">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">رقم الجوال</label>
                                <input type="text" class="form-control cs-input" name="" id=""
                                    placeholder="رقم الجوال">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">التخصص</label>
                                <select name="" id="" class="form-select cs-input">
                                    <option value="">اختر التخصص</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">المرض</label>
                                <input type="text" class="form-control cs-input" name="" id=""
                                    placeholder="ادخل المرض">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">الوصف</label>
                                <textarea name="" id="" class="form-control cs-input" cols="30" rows="5"
                                    placeholder="ادخل وصف مختصر..."></textarea>
                            </div>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    أنا أوافق على <a href="#" class="policy">شروط الإستخدام و
                                        سياسة الخصوصية</a>
                                </label>
                            </div>
                            <button type="button" class="btn cs-btn v2 w-100 mt-4">أرسل الطلب</button>
                        </form>
                    </div>
                </div> --}}
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
