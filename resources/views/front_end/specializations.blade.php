@extends('front_end.layout.app')

@section('content')
<div class="body-content hospitals-page">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">
                        <span class="px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20.02" height="19.998" viewBox="0 0 20.02 19.998">
                                <g id="vuesax_bulk_home-2" data-name="vuesax/bulk/home-2" transform="translate(-621.99 -190.002)">
                                    <g id="home-2">
                                        <path id="Vector" d="M18.05,4.818,12.29.788A4.853,4.853,0,0,0,6.8.918L1.79,4.828A5.153,5.153,0,0,0,0,8.468v6.9A4.631,4.631,0,0,0,4.62,20H15.4a4.622,4.622,0,0,0,4.62-4.62V8.6A5.1,5.1,0,0,0,18.05,4.818Z" transform="translate(621.99 190.002)" fill="#e2e2e2"/>
                                        <path id="Vector-2" data-name="Vector" d="M.75,4.5A.755.755,0,0,1,0,3.75v-3A.755.755,0,0,1,.75,0,.755.755,0,0,1,1.5.75v3A.755.755,0,0,1,.75,4.5Z" transform="translate(631.25 202.25)" fill="#05060f"/>
                                    </g>
                                </g>
                            </svg>
                        </span>
                        <span>{{ __('front.main') }}</span>
                    </a>
                </li>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="6.811" height="12.121" viewBox="0 0 6.811 12.121">
                        <path id="Arrow_-_Right" data-name="Arrow - Right" d="M10,0,5,5,0,0" transform="translate(5.75 1.061) rotate(90)" fill="none" stroke="#727a83" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                    </svg>
                </span>
                <li class="breadcrumb-item active" aria-current="page">{{ __('site.specializations') }}</li>
            </ol>
        </nav>
        <div class="main-title">
            <h2> {{ __('site.high_quality_specializations') }}</h2>
        </div>
    </div>

    <div class="hospitals-filter">
        <div class="container">
            <div class="content">
                <div class="d-flex justify-content-between">
                    <h3>{{ __('site.filtering_factors') }}</h3>
                    <a href="#" class="clear-all"> {{ __('site.clear_all') }}</a>
                </div>
                <div class="form">
                    <form action="{{ route('specializations') }}" method="get">
                        <div class="row align-items-end">
                            <div class="col-lg-auto col-md-6">
                                <div class="form-group">
                                    <label>{{ __('site.hospitel') }}</label>
                                    <input type="text" name="specialization_name" class="form-control custom-input" placeholder="{{ __('site.searchB') }} {{ __('site.for') }} {{ __('site.hospitel') }} " value="{{ request('specialization_name') }}">
                                </div>
                            </div>
                            <div class="col-lg-auto col-md-6">
                                <button type="submit" class="btn cs-btn v2">{{ __('site.searchB') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="content">
            <div class="row mt-5">
                @foreach ($specializations as $specialization)
                    <div class="col-lg-auto col-md-6">
                        <div class="hospital-media">
                            <figure class="main-img">
                                <img src="{{ asset('uploads/specializations/' . ($specialization->image?->image ?? 'default.jpg')) }}" alt="" width="100%" class="wow zoomIn" data-wow-duration="1s" data-wow-delay="0.1s">
                            </figure>
                            <div class="hospital-media-body">
                                <div class="hospital-media-body_title">
                                    <div>
                                        <h2>Specialization Name : {{ $specialization->name }}</h2>
                                        <div class="d-flex align-items-center">
                                            <div class="address">
                                             <span class="me-3"> {{ __('site.number') }} {{ __('site.doctors') }} :</span>
                                        <h5>{{ $specialization->doctors->count() }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hospital-media-body_footer">
                                    <div class="info">
                                        <span class="me-3">{{ __('site.year_of_establishment') }} {{ __('site.specialization') }}:</span>
                                        <h5>{{ $specialization->created_at ? $specialization->created_at->format('Y') : '—' }}</h5>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap gap-2 align-items-center flex-lg-grow-0 flex-grow-1">
                                    <a href="{{ route('specialization_details', $specialization->id) }}" class="btn cs-btn cs-w-h">{{ __('site.view_details') }}</a>
                                    <a href="#" class="btn cs-btn v2 cs-w-h">{{ __('site.request_for_quotation') }} </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12">
                    <nav class="cs-pagination">
                        <ul class="pagination">
                            @if ($specializations->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">‹</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $specializations->previousPageUrl() }}">‹</a></li>
                            @endif
                            @foreach ($specializations->links()->elements[0] as $page => $url)
                                <li class="page-item {{ $page == $specializations->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach
                            @if ($specializations->hasMorePages())
                                <li class="page-item"><a class="page-link" href="{{ $specializations->nextPageUrl() }}">›</a></li>
                            @else
                                <li class="page-item disabled"><span class="page-link">›</span></li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-us-btn">
        <a href="#">
            <figure><img src="assets/images/contact-us-icon.svg" alt=""></figure>
        </a>
        <p>طلب مساعدة</p>
    </div>
</div>
@endsection
