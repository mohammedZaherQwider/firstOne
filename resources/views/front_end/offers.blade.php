@extends('front_end.layout.app')

@section('content')
    <style>
        /* ===== Offers UI ===== */
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

        .offer-card {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .06);
            transition: .2s ease;
            height: 100%;
        }

        .offer-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 35px rgba(0, 0, 0, .10);
        }

        .offer-head {
            padding: 16px 16px 10px;
            display: flex;
            justify-content: space-between;
            gap: 12px;
            align-items: flex-start;
        }

        .offer-title {
            margin: 0;
            font-size: 18px;
            font-weight: 800;
            color: #111;
            line-height: 1.4;
        }

        .offer-sub {
            margin-top: 6px;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            color: #6b7280;
            font-size: 13px;
        }

        .badge-discount {
            background: #fff4d6;
            color: #8a5a00;
            border: 1px solid #ffe2a3;
            padding: 6px 10px;
            border-radius: 999px;
            font-weight: 800;
            font-size: 13px;
            white-space: nowrap;
        }

        .offer-body {
            padding: 0 16px 16px;
        }

        .offer-price {
            display: flex;
            align-items: baseline;
            gap: 10px;
            padding: 12px 0;
            border-top: 1px dashed #eee;
            border-bottom: 1px dashed #eee;
            margin: 10px 0 14px;
        }

        .price-now {
            font-size: 20px;
            font-weight: 900;
            color: #0f172a;
        }

        .price-old {
            font-size: 14px;
            color: #9ca3af;
            text-decoration: line-through;
        }

        .offer-meta {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px 12px;
            margin-bottom: 14px;
        }

        .meta-item {
            display: flex;
            gap: 8px;
            align-items: center;
            background: #f8fafc;
            border: 1px solid #eef2f7;
            border-radius: 12px;
            padding: 10px 10px;
            font-size: 13px;
            color: #334155;
        }

        .offer-actions {
            display: flex;
            gap: 10px;
        }

        .offer-actions .btn {
            flex: 1;
            border-radius: 14px;
            padding: 10px 12px;
            font-weight: 800;
        }

        @media (max-width: 768px) {
            .offer-meta {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="body-content hospitals-page">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">
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
                    <li class="breadcrumb-item active" aria-current="page">{{ __('site.offers') }}</li>
                </ol>
            </nav>

            <div class="main-title">
                <h2>
                    {{ __('site.special_medical_offers') }}
                </h2>
            </div>
        </div>

        <div class="hospitals-filter">
            <div class="container">
                <div class="content">
                    <div class="d-flex justify-content-between">
                        <h3>{{ __('site.filtering_factors') }}</h3>
                        <a href="{{ route('offers') }}" class="clear-all">{{ __('site.clear_all') }}</a>
                    </div>

                    <div class="form">
                        <form action="{{ route('offers') }}" method="get">
                            <div class="row align-items-end">

                                {{-- اسم العرض --}}
                                <div class="col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('site.offer') }}</label>
                                        <input type="text" name="offer_name" class="form-control custom-input"
                                            placeholder="{{ __('site.searchB') }} {{ __('site.for') }} {{ __('site.offer') }}" value="{{ request('offer_name') }}">
                                    </div>
                                </div>

                                {{-- التخصص --}}
                                <div class="col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('site.specialization') }}</label>
                                        <select name="specialization_id" class="form-select custom-input">
                                            <option value="">{{ __('site.choose') }} {{ __('site.specialization') }}</option>
                                            @foreach ($specializations as $specialization)
                                                <option value="{{ $specialization->id }}"
                                                    {{ request('specialization_id') == $specialization->id ? 'selected' : '' }}>
                                                    {{ $specialization->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- المستشفى --}}
                                <div class="col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('site.hospitel') }}</label>
                                        <select name="hospital_id" class="form-select custom-input">
                                            <option value="">{{ __('site.choose') }} {{ __('site.hospitel') }}</option>
                                            @foreach ($hospitals as $hospital)
                                                <option value="{{ $hospital->id }}"
                                                    {{ request('hospital_id') == $hospital->id ? 'selected' : '' }}>
                                                    {{ $hospital->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- الدكتور --}}
                                <div class="col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('site.doctor') }}</label>
                                        <select name="doctor_id" class="form-select custom-input">
                                            <option value="">{{ __('site.choose') }} {{ __('site.doctor') }}</option>
                                            @foreach ($doctors as $doctor)
                                                <option value="{{ $doctor->id }}"
                                                    {{ request('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                                    {{ $doctor->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- السعر من/إلى (اختياري) --}}
                                <div class="col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('site.price') }} {{ __('site.from') }}</label>
                                        <input type="number" name="min_price" class="form-control custom-input"
                                            value="{{ request('min_price') }}">
                                    </div>
                                </div>

                                <div class="col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('site.price') }} {{ __('site.to') }}</label>
                                        <input type="number" name="max_price" class="form-control custom-input"
                                            value="{{ request('max_price') }}">
                                    </div>
                                </div>

                                {{-- زر البحث --}}
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

                        @forelse ($offers as $offer)
                            @php
                                $discount = (float) ($offer->discount_value ?? 0);
                                $oldPrice = (float) ($offer->price ?? 0);

                                // افتراض أن discount_value نسبة مئوية
                                $newPrice = $oldPrice > 0 ? $oldPrice - $oldPrice * ($discount / 100) : 0;
                            @endphp

                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="offer-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">

                                    <div class="offer-head">
                                        <div>
                                            <h3 class="offer-title">{{ $offer->name }}</h3>
                                            <div class="offer-sub">
                                                <span>{{ $offer->specialization?->name ?? '—' }}</span>
                                                <span>•</span>
                                                <span>{{ $offer->hospital?->name ?? '—' }}</span>
                                            </div>
                                        </div>

                                        <span class="badge-discount">
                                            {{ __('site.discount') }} {{ rtrim(rtrim(number_format($discount, 2), '0'), '.') }}%
                                        </span>
                                    </div>

                                    <div class="offer-body">
                                        <div class="offer-price">
                                            <div class="price-now">
                                                {{ rtrim(rtrim(number_format($newPrice, 2), '0'), '.') }}
                                            </div>

                                            @if ($oldPrice > 0 && $discount > 0)
                                                <div class="price-old">
                                                    {{ rtrim(rtrim(number_format($oldPrice, 2), '0'), '.') }}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="offer-meta">
                                            <div class="meta-item">
                                                <span>👨‍⚕️</span>
                                                <span>{{ $offer->doctor?->name ?? '—' }}</span>
                                            </div>

                                            <div class="meta-item">
                                                <span>🏥</span>
                                                <span>{{ $offer->hospital?->name ?? '—' }}</span>
                                            </div>

                                            <div class="meta-item">
                                                <span>🧾</span>
                                                <span>{{ __('site.number') }} {{ __('site.offer') }}: #{{ $offer->id }}</span>
                                            </div>

                                            <div class="meta-item">
                                                <span>📅</span>
                                                <span>{{ $offer->created_at?->format('Y-m-d') }}</span>
                                            </div>
                                        </div>

                                        <div class="offer-actions">
                                            {{-- <a href="{{ route('offer_details', $offer->id) }}" class="btn cs-btn">
                                                عرض التفاصيل
                                            </a> --}}
                                            <a href="{{ route('pay', $offer) }}" class="btn cs-btn v2">{{ __('site.reservation') }} {{ __('site.offer') }}</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-warning mb-0">
                                   {{ __('site.no_offers_matched_the_current_search') }}
                                </div>
                            </div>
                        @endforelse

                        {{-- <div class="col-12 mt-2">
                            {{ $offers->links() }}
                        </div> --}}

                    </div>
                </div>
            </div>

            <!-- contact-us-btn -->
            <div class="contact-us-btn">
                <a href="#">
                    <figure>
                        <img src="assets/images/contact-us-icon.svg" alt="">
                    </figure>
                </a>
                <p>طلب مساعدة</p>
            </div>
            <!-- ./contact-us-btn -->
        </div>
    </div>
@endsection
