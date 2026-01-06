@extends('front_end.layout.app')
@section('content')
    <div class="body-content blog-details-page">
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
                            <span>الرئيسية</span>
                        </a>
                    </li>
                    <li>
                        <a href="blog.html">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="6.811" height="12.121"
                                    viewBox="0 0 6.811 12.121">
                                    <path id="Arrow_-_Right" data-name="Arrow - Right" d="M10,0,5,5,0,0"
                                        transform="translate(5.75 1.061) rotate(90)" fill="none" stroke="#727a83"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
                                </svg>

                            </span>
                    <li class="breadcrumb-item active" aria-current="page">المدونة</li>
                    </a>
                    </li>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="6.811" height="12.121" viewBox="0 0 6.811 12.121">
                            <path id="Arrow_-_Right" data-name="Arrow - Right" d="M10,0,5,5,0,0"
                                transform="translate(5.75 1.061) rotate(90)" fill="none" stroke="#727a83"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
                        </svg>

                    </span>
                    <li class="breadcrumb-item active" aria-current="page">تفاصيل المقال</li>
                </ol>
            </nav>
        </div>
        <!--  ./breadcrumb -->
        <div class="container mt-lg-50 mt-4">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8">
                        <h6>12 أغسطس، 2022 - طب العيون</h6>
                        <h1> أسباب جفاف العين وأهم أعراضه وطرق
                            العلاج بالأدوية والجراحة</h1>
                        <figure>
                            <img src="{{ asset('uploads/contents/' . ($content->image->image ?? 'default.jpg')) }}"
                                class="img-fluid" alt="">
                        </figure>
                        <div class="description">
                            {!! $content->content !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- service-request-section -->
        <section class="callaction-section service-request-section">
            <div class="container">
                <div class="content">
                    @foreach ($contents as $content)
                        @if ($content->title == 'طلب خدمة')
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
                                            {{ $content->title }} </h4>
                                        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                                            {!! $content->content !!}
                                        </p>
                                    </div>
                                    <div class="col-lg-3 mx-auto">
                                        <a href="{{ $content->link }}" class="btn cs-btn wow fadeInUp"
                                            data-wow-duration="1s" data-wow-delay="0.3s">ارسل طلب الأن</a>
                                    </div>
                                </div>
                            </div>
                            @break
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
        <!-- ./service-request-section -->

        <!-- blog-section -->
        <section class="blog-section">
            <div class="container">
                <div class="main-title d-flex flex-wrap justify-content-between align-items-center wow fadeInUp"
                    data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2>مقالات ذات صلة</h2>
                </div>
                <div class="content">
                    <div class="row">
                        @foreach ($contents->where('link', 'blog')->take(3) as $content)
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

                                            <h4>{{ $content->title }}</h4>

                                            <p>
                                                {{ \Illuminate\Support\Str::words(strip_tags($content->content), 20, '...') }}
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
