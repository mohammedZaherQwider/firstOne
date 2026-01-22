@extends('front_end.layout.app')
@section('content')
    <div class="body-content profile-page">
        <!--  breadcrumb -->
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
                    <li class="breadcrumb-item active" aria-current="page">ملفي الشخصي</li>
                </ol>
            </nav>
        </div>
        <!--  ./breadcrumb -->
        <div class="container">
            <div class="content">
                <div class="row">

                    <div class="col-xl-3 col-lg-4">
                        <div class="profile-sidebar">
                            <div class="user-info">
                                <figure class="mb-0">
                                    <img src="assets/images/avatar.png" alt="" srcset="">
                                </figure>
                                <div>
                                    <h6>عبدالرحمن الشيخ محمد</h6>
                                    <h4>+90 554 864 60 20</h4>
                                </div>
                            </div>
                            <ul>
                                <li class="active">
                                    <a href="#">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24">
                                                <g id="vuesax_bulk_note" data-name="vuesax/bulk/note"
                                                    transform="translate(-428 -252)">
                                                    <g id="note">
                                                        <path id="Vector" d="M0,0H24V24H0Z"
                                                            transform="translate(428 252)" fill="none" opacity="0" />
                                                        <path id="Vector-2" data-name="Vector"
                                                            d="M16,4v9.75c0,3-1.79,4-4,4H4c-2.21,0-4-1-4-4V4C0,.75,1.79,0,4,0a2.237,2.237,0,0,0,.66,1.59,2.237,2.237,0,0,0,1.59.66h3.5A2.253,2.253,0,0,0,12,0C14.21,0,16,.75,16,4Z"
                                                            transform="translate(432 256.25)" fill="#868692" />
                                                        <path id="Vector-3" data-name="Vector"
                                                            d="M8,2.25A2.253,2.253,0,0,1,5.75,4.5H2.25a2.25,2.25,0,0,1,0-4.5h3.5A2.253,2.253,0,0,1,8,2.25Z"
                                                            transform="translate(436 254)" fill="#d3d3d8" />
                                                        <g id="Group">
                                                            <path id="Vector-4" data-name="Vector"
                                                                d="M4.75,1.5h-4A.755.755,0,0,1,0,.75.755.755,0,0,1,.75,0h4A.755.755,0,0,1,5.5.75.755.755,0,0,1,4.75,1.5Z"
                                                                transform="translate(435.25 264.25)" fill="#d3d3d8" />
                                                        </g>
                                                        <g id="Group-2" data-name="Group">
                                                            <path id="Vector-5" data-name="Vector"
                                                                d="M8.75,1.5h-8A.755.755,0,0,1,0,.75.755.755,0,0,1,.75,0h8A.755.755,0,0,1,9.5.75.755.755,0,0,1,8.75,1.5Z"
                                                                transform="translate(435.25 268.25)" fill="#d3d3d8" />
                                                        </g>
                                                        <path id="Vector-6" data-name="Vector" d="M0,0H24V24H0Z"
                                                            transform="translate(428 252)" fill="none" opacity="0" />
                                                    </g>
                                                </g>
                                            </svg>

                                        </span>
                                        الطلبات
                                    </a>
                                </li>
                                <li>
                                    <a href="user-info.html">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24">
                                                <g id="vuesax_bulk_profile" data-name="vuesax/bulk/profile"
                                                    transform="translate(-108 -252)">
                                                    <g id="profile">
                                                        <path id="Vector"
                                                            d="M4.75,0a4.746,4.746,0,0,0-.12,9.49.807.807,0,0,1,.22,0h.07A4.746,4.746,0,0,0,4.75,0Z"
                                                            transform="translate(115.25 254)" fill="#d3d3d8" />
                                                        <path id="Vector-2" data-name="Vector"
                                                            d="M12.12,1.395a9.929,9.929,0,0,0-10.15,0A3.947,3.947,0,0,0,0,4.625a3.914,3.914,0,0,0,1.96,3.21,9.239,9.239,0,0,0,5.08,1.41,9.239,9.239,0,0,0,5.08-1.41,3.945,3.945,0,0,0,1.96-3.23A3.937,3.937,0,0,0,12.12,1.395Z"
                                                            transform="translate(112.96 264.755)" fill="#868692" />
                                                        <path id="Vector-3" data-name="Vector" d="M0,0H24V24H0Z"
                                                            transform="translate(108 252)" fill="none"
                                                            opacity="0" />
                                                    </g>
                                                </g>
                                            </svg>
                                        </span>
                                        البيانات الشخصية
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24">
                                                <g id="vuesax_bulk_message-text" data-name="vuesax/bulk/message-text"
                                                    transform="translate(-236 -252)">
                                                    <g id="message-text">
                                                        <path id="Vector"
                                                            d="M0,10.97V4.99A4.993,4.993,0,0,1,5,0H15a4.993,4.993,0,0,1,5,4.99v6.98a4.991,4.991,0,0,1-5,4.98H13.5a1.014,1.014,0,0,0-.8.4l-1.5,1.99a1.421,1.421,0,0,1-2.4,0L7.3,17.35a1.112,1.112,0,0,0-.8-.4H5a4.991,4.991,0,0,1-5-4.98Z"
                                                            transform="translate(238 254)" fill="#d3d3d8" />
                                                        <path id="Vector-2" data-name="Vector"
                                                            d="M10.75,1.5H.75A.755.755,0,0,1,0,.75.755.755,0,0,1,.75,0h10a.755.755,0,0,1,.75.75A.755.755,0,0,1,10.75,1.5Z"
                                                            transform="translate(242.25 259.25)" fill="#868692" />
                                                        <path id="Vector-3" data-name="Vector"
                                                            d="M6.75,1.5h-6A.755.755,0,0,1,0,.75.755.755,0,0,1,.75,0h6A.755.755,0,0,1,7.5.75.755.755,0,0,1,6.75,1.5Z"
                                                            transform="translate(242.25 264.25)" fill="#868692" />
                                                        <path id="Vector-4" data-name="Vector" d="M0,0H24V24H0Z"
                                                            transform="translate(236 252)" fill="none"
                                                            opacity="0" />
                                                    </g>
                                                </g>
                                            </svg>
                                        </span>
                                        مركز المساعدة
                                    </a>
                                </li>
                                <li class="logout">
                                    <a href="#">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24">
                                                <g id="logout" transform="translate(-748 -444)">
                                                    <path id="Vector"
                                                        d="M0,5.2v9.59A4.835,4.835,0,0,0,5.2,20H7.79a4.832,4.832,0,0,0,5.2-5.2V5.2A4.819,4.819,0,0,0,7.8,0H5.2A4.832,4.832,0,0,0,0,5.2Z"
                                                        transform="translate(757 446)" fill="#ffe2e2" />
                                                    <path id="Vector-2" data-name="Vector"
                                                        d="M3.568.225.218,3.575a.754.754,0,0,0,0,1.06l3.35,3.35a.75.75,0,1,0,1.06-1.06l-2.07-2.07h10.69a.75.75,0,0,0,0-1.5H2.557l2.07-2.07a.742.742,0,0,0,.22-.53.725.725,0,0,0-.22-.53A.737.737,0,0,0,3.568.225Z"
                                                        transform="translate(750.003 451.895)" fill="#ff4040" />
                                                    <path id="Vector-3" data-name="Vector" d="M0,0H24V24H0Z"
                                                        transform="translate(748 444)" fill="none" opacity="0" />
                                                </g>
                                            </svg>
                                        </span>
                                        تسجيل الخروج
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="requests-section">
                            <h4>طلبات عرض السعر</h4>
                            <div class="table-responsive cs-table">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 30%;">اسم المستشفى</th>
                                            <th>تاريخ الإرسال</th>
                                            <th>رقم الطلب</th>
                                            <th>التخصص</th>
                                            <th>حالة الطلب</th>
                                            <th>الاجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <figure class="mb-0">
                                                        <img src="assets/images/logo-hospital-1.png" alt=""
                                                            srcset="">
                                                    </figure>
                                                    مستشفى استاتيك
                                                    انترناشونال
                                                </div>
                                            </td>
                                            <td>‏12 أغسطس، 2022</td>
                                            <td>100200</td>
                                            <td>طب أسنان</td>
                                            <td>
                                                <div class="status bg-warning">
                                                    قيد التقييم
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-3">
                                                    <div class="cs-action">
                                                        <a href="request-details.html">
                                                            <svg id="vuesax_bulk_document-text"
                                                                data-name="vuesax/bulk/document-text"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24">
                                                                <g id="document-text" transform="translate(-492 -252)">
                                                                    <path id="Vector" d="M0,0H24V24H0Z"
                                                                        transform="translate(492 252)" fill="none"
                                                                        opacity="0" />
                                                                    <path id="Vector-2" data-name="Vector"
                                                                        d="M18,5V15c0,3-1.5,5-5,5H5c-3.5,0-5-2-5-5V5C0,2,1.5,0,5,0h8C16.5,0,18,2,18,5Z"
                                                                        transform="translate(495 254)"
                                                                        fill="rgba(37,55,81,0.4)" />
                                                                    <g id="Group">
                                                                        <path id="Vector-3" data-name="Vector"
                                                                            d="M4.75,5.5h-2A2.748,2.748,0,0,1,0,2.75v-2A.755.755,0,0,1,.75,0,.755.755,0,0,1,1.5.75v2A1.25,1.25,0,0,0,2.75,4h2a.75.75,0,0,1,0,1.5Z"
                                                                            transform="translate(505.75 255.75)"
                                                                            fill="#253751" />
                                                                    </g>
                                                                    <g id="Group-2" data-name="Group">
                                                                        <path id="Vector-4" data-name="Vector"
                                                                            d="M4.75,1.5h-4A.755.755,0,0,1,0,.75.755.755,0,0,1,.75,0h4A.755.755,0,0,1,5.5.75.755.755,0,0,1,4.75,1.5Z"
                                                                            transform="translate(499.25 264.25)"
                                                                            fill="#253751" />
                                                                    </g>
                                                                    <g id="Group-3" data-name="Group">
                                                                        <path id="Vector-5" data-name="Vector"
                                                                            d="M8.75,1.5h-8A.755.755,0,0,1,0,.75.755.755,0,0,1,.75,0h8A.755.755,0,0,1,9.5.75.755.755,0,0,1,8.75,1.5Z"
                                                                            transform="translate(499.25 268.25)"
                                                                            fill="#253751" />
                                                                    </g>
                                                                    <path id="Vector-6" data-name="Vector"
                                                                        d="M0,0H24V24H0Z" transform="translate(492 252)"
                                                                        fill="none" opacity="0" />
                                                                </g>
                                                            </svg>

                                                        </a>
                                                        <p>عرض</p>
                                                    </div>
                                                    <div class="cs-action">
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24">
                                                                <g id="trash" transform="translate(-108 -188)">
                                                                    <path id="Vector"
                                                                        d="M18.824,3.98c-1.61-.16-3.22-.28-4.84-.37V3.6l-.22-1.3c-.15-.92-.37-2.3-2.71-2.3H8.434C6.1,0,5.884,1.32,5.724,2.29l-.21,1.28c-.93.06-1.86.12-2.79.21l-2.04.2a.748.748,0,1,0,.14,1.49l2.04-.2a79.729,79.729,0,0,1,15.82.21h.08a.757.757,0,0,0,.75-.68A.766.766,0,0,0,18.824,3.98Z"
                                                                        transform="translate(110.246 189.25)"
                                                                        fill="#ff4040" />
                                                                    <path id="Vector-2" data-name="Vector"
                                                                        d="M14.8.39a1.264,1.264,0,0,0-.91-.39H1.252a1.248,1.248,0,0,0-.91.39A1.288,1.288,0,0,0,0,1.33l.62,10.26c.11,1.52.25,3.42,3.74,3.42h6.42c3.49,0,3.63-1.89,3.74-3.42l.62-10.25A1.3,1.3,0,0,0,14.8.39Z"
                                                                        transform="translate(112.428 195.75)"
                                                                        fill="#ffe2e2" />
                                                                    <path id="Vector_Stroke_" data-name="Vector (Stroke)"
                                                                        d="M0,.75A.75.75,0,0,1,.75,0H4.08a.75.75,0,0,1,0,1.5H.75A.75.75,0,0,1,0,.75Z"
                                                                        transform="translate(117.58 204.25)"
                                                                        fill="#ff4040" />
                                                                    <path id="Vector_Stroke_2" data-name="Vector (Stroke)"
                                                                        d="M0,.75A.75.75,0,0,1,.75,0h5a.75.75,0,0,1,0,1.5h-5A.75.75,0,0,1,0,.75Z"
                                                                        transform="translate(116.75 200.25)"
                                                                        fill="#ff4040" />
                                                                    <path id="Vector-3" data-name="Vector"
                                                                        d="M0,0H24V24H0Z" transform="translate(108 188)"
                                                                        fill="none" opacity="0" />
                                                                </g>
                                                            </svg>
                                                        </a>
                                                        <p>حذف</p>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <figure class="mb-0">
                                                        <img src="assets/images/logo-hospital-1.png" alt=""
                                                            srcset="">
                                                    </figure>
                                                    مستشفى استاتيك
                                                    انترناشونال
                                                </div>
                                            </td>
                                            <td>‏12 أغسطس، 2022</td>
                                            <td>100200</td>
                                            <td>طب أسنان</td>
                                            <td>
                                                <div class="status bg-success">
                                                    تم الانتهاء
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-3">
                                                    <div class="cs-action">
                                                        <a href="#">
                                                            <svg id="vuesax_bulk_document-text"
                                                                data-name="vuesax/bulk/document-text"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24">
                                                                <g id="document-text" transform="translate(-492 -252)">
                                                                    <path id="Vector" d="M0,0H24V24H0Z"
                                                                        transform="translate(492 252)" fill="none"
                                                                        opacity="0" />
                                                                    <path id="Vector-2" data-name="Vector"
                                                                        d="M18,5V15c0,3-1.5,5-5,5H5c-3.5,0-5-2-5-5V5C0,2,1.5,0,5,0h8C16.5,0,18,2,18,5Z"
                                                                        transform="translate(495 254)"
                                                                        fill="rgba(37,55,81,0.4)" />
                                                                    <g id="Group">
                                                                        <path id="Vector-3" data-name="Vector"
                                                                            d="M4.75,5.5h-2A2.748,2.748,0,0,1,0,2.75v-2A.755.755,0,0,1,.75,0,.755.755,0,0,1,1.5.75v2A1.25,1.25,0,0,0,2.75,4h2a.75.75,0,0,1,0,1.5Z"
                                                                            transform="translate(505.75 255.75)"
                                                                            fill="#253751" />
                                                                    </g>
                                                                    <g id="Group-2" data-name="Group">
                                                                        <path id="Vector-4" data-name="Vector"
                                                                            d="M4.75,1.5h-4A.755.755,0,0,1,0,.75.755.755,0,0,1,.75,0h4A.755.755,0,0,1,5.5.75.755.755,0,0,1,4.75,1.5Z"
                                                                            transform="translate(499.25 264.25)"
                                                                            fill="#253751" />
                                                                    </g>
                                                                    <g id="Group-3" data-name="Group">
                                                                        <path id="Vector-5" data-name="Vector"
                                                                            d="M8.75,1.5h-8A.755.755,0,0,1,0,.75.755.755,0,0,1,.75,0h8A.755.755,0,0,1,9.5.75.755.755,0,0,1,8.75,1.5Z"
                                                                            transform="translate(499.25 268.25)"
                                                                            fill="#253751" />
                                                                    </g>
                                                                    <path id="Vector-6" data-name="Vector"
                                                                        d="M0,0H24V24H0Z" transform="translate(492 252)"
                                                                        fill="none" opacity="0" />
                                                                </g>
                                                            </svg>

                                                        </a>
                                                        <p>عرض</p>
                                                    </div>
                                                    <div class="cs-action">
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24">
                                                                <g id="trash" transform="translate(-108 -188)">
                                                                    <path id="Vector"
                                                                        d="M18.824,3.98c-1.61-.16-3.22-.28-4.84-.37V3.6l-.22-1.3c-.15-.92-.37-2.3-2.71-2.3H8.434C6.1,0,5.884,1.32,5.724,2.29l-.21,1.28c-.93.06-1.86.12-2.79.21l-2.04.2a.748.748,0,1,0,.14,1.49l2.04-.2a79.729,79.729,0,0,1,15.82.21h.08a.757.757,0,0,0,.75-.68A.766.766,0,0,0,18.824,3.98Z"
                                                                        transform="translate(110.246 189.25)"
                                                                        fill="#ff4040" />
                                                                    <path id="Vector-2" data-name="Vector"
                                                                        d="M14.8.39a1.264,1.264,0,0,0-.91-.39H1.252a1.248,1.248,0,0,0-.91.39A1.288,1.288,0,0,0,0,1.33l.62,10.26c.11,1.52.25,3.42,3.74,3.42h6.42c3.49,0,3.63-1.89,3.74-3.42l.62-10.25A1.3,1.3,0,0,0,14.8.39Z"
                                                                        transform="translate(112.428 195.75)"
                                                                        fill="#ffe2e2" />
                                                                    <path id="Vector_Stroke_" data-name="Vector (Stroke)"
                                                                        d="M0,.75A.75.75,0,0,1,.75,0H4.08a.75.75,0,0,1,0,1.5H.75A.75.75,0,0,1,0,.75Z"
                                                                        transform="translate(117.58 204.25)"
                                                                        fill="#ff4040" />
                                                                    <path id="Vector_Stroke_2" data-name="Vector (Stroke)"
                                                                        d="M0,.75A.75.75,0,0,1,.75,0h5a.75.75,0,0,1,0,1.5h-5A.75.75,0,0,1,0,.75Z"
                                                                        transform="translate(116.75 200.25)"
                                                                        fill="#ff4040" />
                                                                    <path id="Vector-3" data-name="Vector"
                                                                        d="M0,0H24V24H0Z" transform="translate(108 188)"
                                                                        fill="none" opacity="0" />
                                                                </g>
                                                            </svg>
                                                        </a>
                                                        <p>حذف</p>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <figure class="mb-0">
                                                        <img src="assets/images/logo-hospital-1.png" alt=""
                                                            srcset="">
                                                    </figure>
                                                    مستشفى استاتيك
                                                    انترناشونال
                                                </div>
                                            </td>
                                            <td>‏12 أغسطس، 2022</td>
                                            <td>100200</td>
                                            <td>طب أسنان</td>
                                            <td>
                                                <div class="status bg-success">
                                                    تم الانتهاء
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-3">
                                                    <div class="cs-action">
                                                        <a href="#">
                                                            <svg id="vuesax_bulk_document-text"
                                                                data-name="vuesax/bulk/document-text"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24">
                                                                <g id="document-text" transform="translate(-492 -252)">
                                                                    <path id="Vector" d="M0,0H24V24H0Z"
                                                                        transform="translate(492 252)" fill="none"
                                                                        opacity="0" />
                                                                    <path id="Vector-2" data-name="Vector"
                                                                        d="M18,5V15c0,3-1.5,5-5,5H5c-3.5,0-5-2-5-5V5C0,2,1.5,0,5,0h8C16.5,0,18,2,18,5Z"
                                                                        transform="translate(495 254)"
                                                                        fill="rgba(37,55,81,0.4)" />
                                                                    <g id="Group">
                                                                        <path id="Vector-3" data-name="Vector"
                                                                            d="M4.75,5.5h-2A2.748,2.748,0,0,1,0,2.75v-2A.755.755,0,0,1,.75,0,.755.755,0,0,1,1.5.75v2A1.25,1.25,0,0,0,2.75,4h2a.75.75,0,0,1,0,1.5Z"
                                                                            transform="translate(505.75 255.75)"
                                                                            fill="#253751" />
                                                                    </g>
                                                                    <g id="Group-2" data-name="Group">
                                                                        <path id="Vector-4" data-name="Vector"
                                                                            d="M4.75,1.5h-4A.755.755,0,0,1,0,.75.755.755,0,0,1,.75,0h4A.755.755,0,0,1,5.5.75.755.755,0,0,1,4.75,1.5Z"
                                                                            transform="translate(499.25 264.25)"
                                                                            fill="#253751" />
                                                                    </g>
                                                                    <g id="Group-3" data-name="Group">
                                                                        <path id="Vector-5" data-name="Vector"
                                                                            d="M8.75,1.5h-8A.755.755,0,0,1,0,.75.755.755,0,0,1,.75,0h8A.755.755,0,0,1,9.5.75.755.755,0,0,1,8.75,1.5Z"
                                                                            transform="translate(499.25 268.25)"
                                                                            fill="#253751" />
                                                                    </g>
                                                                    <path id="Vector-6" data-name="Vector"
                                                                        d="M0,0H24V24H0Z" transform="translate(492 252)"
                                                                        fill="none" opacity="0" />
                                                                </g>
                                                            </svg>

                                                        </a>
                                                        <p>عرض</p>
                                                    </div>
                                                    <div class="cs-action">
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24">
                                                                <g id="trash" transform="translate(-108 -188)">
                                                                    <path id="Vector"
                                                                        d="M18.824,3.98c-1.61-.16-3.22-.28-4.84-.37V3.6l-.22-1.3c-.15-.92-.37-2.3-2.71-2.3H8.434C6.1,0,5.884,1.32,5.724,2.29l-.21,1.28c-.93.06-1.86.12-2.79.21l-2.04.2a.748.748,0,1,0,.14,1.49l2.04-.2a79.729,79.729,0,0,1,15.82.21h.08a.757.757,0,0,0,.75-.68A.766.766,0,0,0,18.824,3.98Z"
                                                                        transform="translate(110.246 189.25)"
                                                                        fill="#ff4040" />
                                                                    <path id="Vector-2" data-name="Vector"
                                                                        d="M14.8.39a1.264,1.264,0,0,0-.91-.39H1.252a1.248,1.248,0,0,0-.91.39A1.288,1.288,0,0,0,0,1.33l.62,10.26c.11,1.52.25,3.42,3.74,3.42h6.42c3.49,0,3.63-1.89,3.74-3.42l.62-10.25A1.3,1.3,0,0,0,14.8.39Z"
                                                                        transform="translate(112.428 195.75)"
                                                                        fill="#ffe2e2" />
                                                                    <path id="Vector_Stroke_" data-name="Vector (Stroke)"
                                                                        d="M0,.75A.75.75,0,0,1,.75,0H4.08a.75.75,0,0,1,0,1.5H.75A.75.75,0,0,1,0,.75Z"
                                                                        transform="translate(117.58 204.25)"
                                                                        fill="#ff4040" />
                                                                    <path id="Vector_Stroke_2" data-name="Vector (Stroke)"
                                                                        d="M0,.75A.75.75,0,0,1,.75,0h5a.75.75,0,0,1,0,1.5h-5A.75.75,0,0,1,0,.75Z"
                                                                        transform="translate(116.75 200.25)"
                                                                        fill="#ff4040" />
                                                                    <path id="Vector-3" data-name="Vector"
                                                                        d="M0,0H24V24H0Z" transform="translate(108 188)"
                                                                        fill="none" opacity="0" />
                                                                </g>
                                                            </svg>
                                                        </a>
                                                        <p>حذف</p>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="requests-section mt-4">
                            <h4 class="mb-5">مقالات مهمة</h4>
                            <div class="row">
                                <div class="col-xl-6">
                                    <a href="blog-details.html">

                                        <div class="recently-article-card d-flex align-items-center">
                                            <figure class="mb-0">
                                                <img src="assets/images/article-2.png" class="img-fluid" alt="...">
                                            </figure>
                                            <div class="flex-grow-1 ms-3">
                                                <h4>‏20 يوليو، 2022 - أمراض القلب</h4>
                                                <h2>الجلطة القلبية: وأعراض جلطة القلب وأسبابها وماذا بعد الإصابة </h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xl-6">
                                    <a href="blog-details.html">

                                        <div class="recently-article-card d-flex align-items-center">
                                            <figure class="mb-0">
                                                <img src="assets/images/article-2.png" class="img-fluid" alt="...">
                                            </figure>
                                            <div class="flex-grow-1 ms-3">
                                                <h4>‏20 يوليو، 2022 - أمراض القلب</h4>
                                                <h2>الجلطة القلبية: وأعراض جلطة القلب وأسبابها وماذا بعد الإصابة </h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xl-6">
                                    <a href="blog-details.html">

                                        <div class="recently-article-card d-flex align-items-center">
                                            <figure class="mb-0">
                                                <img src="assets/images/article-2.png" class="img-fluid" alt="...">
                                            </figure>
                                            <div class="flex-grow-1 ms-3">
                                                <h4>‏20 يوليو، 2022 - أمراض القلب</h4>
                                                <h2>الجلطة القلبية: وأعراض جلطة القلب وأسبابها وماذا بعد الإصابة </h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xl-6">
                                    <a href="blog-details.html">

                                        <div class="recently-article-card d-flex align-items-center">
                                            <figure class="mb-0">
                                                <img src="assets/images/article-2.png" class="img-fluid" alt="...">
                                            </figure>
                                            <div class="flex-grow-1 ms-3">
                                                <h4>‏20 يوليو، 2022 - أمراض القلب</h4>
                                                <h2>الجلطة القلبية: وأعراض جلطة القلب وأسبابها وماذا بعد الإصابة </h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
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
