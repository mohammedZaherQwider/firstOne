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
                            <span>الرئيسية</span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('doctors') }}">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="6.811" height="12.121"
                                    viewBox="0 0 6.811 12.121">
                                    <path id="Arrow_-_Right" data-name="Arrow - Right" d="M10,0,5,5,0,0"
                                        transform="translate(5.75 1.061) rotate(90)" fill="none" stroke="#727a83"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
                                </svg>

                            </span>
                            <span>الدكاترة </span>
                        </a>
                    </li>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="6.811" height="12.121" viewBox="0 0 6.811 12.121">
                            <path id="Arrow_-_Right" data-name="Arrow - Right" d="M10,0,5,5,0,0"
                                transform="translate(5.75 1.061) rotate(90)" fill="none" stroke="#727a83"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
                        </svg>

                    </span>
                    <li class="breadcrumb-item active" aria-current="page">تفاصيل الدكتور</li>
                </ol>
            </nav>
        </div>
        <div class="main-section">
            <div class="container">
                <div class="content">

                    <div class="d-flex align-items-center gap-3">
                        <figure class="circle-img mb-0">
                            <img src="{{ asset('uploads/doctors/' . $doctor->image->image) }}" alt=""
                                style="width:100%;height:100%;object-fit:cover;">
                        </figure>
                        <div>
                            <h2> {{ $doctor->name }} </h2>
                            @php
                                $count = $doctor->ratings->count();
                                $average = $count > 0 ? $doctor->ratings->avg('rating') : 0;
                            @endphp
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

                                    {{-- {{ $doctor->doctor }} --}}
                                    <p class="mb-0">({{ $count }}) تقييم</p>
                                </div>
                                <div class="address">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17.75" height="20.5"
                                            viewBox="0 0 17.75 20.5">
                                            <g id="location" transform="translate(0)">
                                                <path id="Vector"
                                                    d="M17.5,6.7A8.626,8.626,0,0,0,8.88,0H8.87A8.624,8.624,0,0,0,.25,6.69C-.92,11.85,2.24,16.22,5.1,18.97a5.422,5.422,0,0,0,7.55,0C15.51,16.22,18.67,11.86,17.5,6.7Z"
                                                    fill="#d3d3d8" />
                                                <path id="Vector-2" data-name="Vector"
                                                    d="M6.3,3.15A3.15,3.15,0,1,1,3.15,0,3.15,3.15,0,0,1,6.3,3.15Z"
                                                    transform="translate(5.73 5.41)" fill="#868692" />
                                            </g>
                                        </svg>
                                    </span>
                                    {{ $doctor->hospital->country->name }} ، {{ $doctor->hospital->city->name }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn cs-btn v2 cs-w-h">طلب عرض سعر</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-4">
                <div class="col-lg-9">

                    <div id="cs-tabs" class="list-group cs-tabs">
                        <a class="list-group-item list-group-item-action" href="#list-item-1">نظرة عامة</a>
                        <a class="list-group-item list-group-item-action" href="#list-item-2">التخصصات</a>
                        <a class="list-group-item list-group-item-action" href="#list-item-3">الأخصائيين</a>
                        <a class="list-group-item list-group-item-action" href="#list-item-4">الخريطة</a>
                    </div>
                    <div data-bs-spy="scroll" data-bs-target="#cs-tabs" data-bs-offset="0" class="scrollspy-example"
                        tabindex="0">
                        <div id="list-item-1" class="tab-section">
                            <h4>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <g id="vuesax_bulk_info-circle" data-name="vuesax/bulk/info-circle"
                                        transform="translate(-366 -254)">
                                        <g id="info-circle" transform="translate(366 254)">
                                            <path id="Vector" d="M24,12A12,12,0,1,1,12,0,12,12,0,0,1,24,12Z"
                                                fill="#99ebc2" />
                                            <g id="Group_63665" data-name="Group 63665"
                                                transform="translate(0.399 -0.313)">
                                                <path id="Vector-2" data-name="Vector"
                                                    d="M1,8a.971.971,0,0,0,1-.923V.923A.971.971,0,0,0,1,0,.971.971,0,0,0,0,.923V7.077A.971.971,0,0,0,1,8Z"
                                                    transform="translate(11 6.313)" fill="#00ce68" />
                                                <path id="Vector-3" data-name="Vector"
                                                    d="M2.4.769A1.443,1.443,0,0,0,2.138.356,1.443,1.443,0,0,0,1.725.094a1.25,1.25,0,0,0-.95,0A1.443,1.443,0,0,0,.362.356,1.443,1.443,0,0,0,.1.769a1.244,1.244,0,0,0-.1.475,1.244,1.244,0,0,0,.1.475,1.29,1.29,0,0,0,.263.412,1.443,1.443,0,0,0,.412.263,1.244,1.244,0,0,0,.475.1,1.244,1.244,0,0,0,.475-.1,1.443,1.443,0,0,0,.412-.263A1.29,1.29,0,0,0,2.4,1.719a1.244,1.244,0,0,0,.1-.475A1.244,1.244,0,0,0,2.4.769Z"
                                                    transform="translate(10.6 16)" fill="#00ce68" />
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                حول الدكتور

                            </h4>
                            <p>
                                {{ $doctor->bio }}
                            </p>
                            <div class="d-flex flex-wrap gap-lg-4 gap-3 mt-4">
                                <div class="count-card">
                                    <p>{{ $doctor->created_at->format('Y') }}</p>
                                    <p>سنة التسجيل</p>
                                </div>
                                <div class="count-card">
                                    <p>{{ $doctor->gender }}</p>
                                    <p> الجنس</p>
                                </div>
                                <div class="count-card">
                                    <p>{{ $doctor->nationalitie->name }}</p>
                                    <p>الجنسية </p>
                                </div>
                                <div class="count-card">
                                    <p>{{ $doctor->operations->count() }}</p>
                                    <p>عدد العمليات</p>
                                </div>

                            </div>

                        </div>
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

                                التخصصات

                            </h4>
                            <ul class="majors-list">
                                <li> {{ $doctor->specialization->name }} </li>
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

                                الأخصائيين

                            </h4>
                            <div class="specialists-slider-section">
                                <div class="owl-carousel specialists-slider owl-slider mt-32">
                                    @foreach ($doctors as $doctor)
                                        <div class="general-card specialist-card v2 wow fadeInUp" data-wow-duration="1s"
                                            data-wow-delay="0.1s">
                                            <figure class="circle-img mb-0"
                                                style="width:120px; height:120px; overflow:hidden; border-radius:50%; margin:auto;">
                                                <img src="{{ asset('uploads/doctors/' . $doctor->image->image) }}"
                                                    alt="{{ $doctor->name }}"
                                                    style="width:100%; height:100%; object-fit:cover; display:block;">
                                            </figure>
                                            <div class="general-card-body">
                                                <h4> {{ $doctor->name }} </h4>
                                                <h6> {{ $doctor->specialization->name }} </h6>
                                                <div class="d-flex align-items-center justify-content-center rate">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20.08"
                                                        height="18.567" viewBox="0 0 20.08 18.567">
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
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
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
                                الخريطة
                            </h4>
                            <figure class="map">
                                <img src="{{ asset('assets/front_end/images/Location.png') }}" alt="" srcset="">
                            </figure>
                        </div>


                    </div>

                </div>
                <div class="col-lg-3">
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
                </div>
            </div>
        </div>
        <div class="other-hospitals">
            <div class="main-title text-center">
                <h2>مستشفيات أخرى</h2>
            </div>
            <div class="container">
                <div class="row mt-5">
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
