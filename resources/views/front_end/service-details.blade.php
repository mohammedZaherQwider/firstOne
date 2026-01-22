@extends('front_end.layout.app')
@section('content')
    <div class="body-content service-details-page">
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
                    <li class="breadcrumb-item">
                        <a href="index.html">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="6.811" height="12.121"
                                    viewBox="0 0 6.811 12.121">
                                    <path id="Arrow_-_Right" data-name="Arrow - Right" d="M10,0,5,5,0,0"
                                        transform="translate(5.75 1.061) rotate(90)" fill="none" stroke="#727a83"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
                                </svg>

                            </span>
                            <span>{{ __('site.health_services') }}</span>
                        </a>
                    </li>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="6.811" height="12.121" viewBox="0 0 6.811 12.121">
                            <path id="Arrow_-_Right" data-name="Arrow - Right" d="M10,0,5,5,0,0"
                                transform="translate(5.75 1.061) rotate(90)" fill="none" stroke="#727a83"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
                        </svg>

                    </span>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('site.health_insurance') }}</li>
                </ol>
            </nav>

        </div>
        <div class="container">
            <div class="content">
                @php
                    $contentImage = $content->image->image ?? 'default.jpg';
                @endphp
                <figure>
                    <img src="{{ asset('uploads/contents/' . $contentImage) }}" class="img-fluid" alt=""
                        srcset="">
                </figure>
                <div class="row mt-lg-50 mt-4">
                    <div class="col-lg-7">
                        {!! $content->content !!}
                    </div>
                        {{-- <div class="col-lg-4  offset-lg-1">
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
