@extends('back_end.layout.app')
@section('content')
    {{-- {{ dd($settings) }} --}}

    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <div class="card-body p-lg-17">
                <form method="POST" action="{{ route('settings') }}" enctype="multipart/form-data" id="settingsForm">
                    @csrf

                    <h1 class="fw-bolder text-dark mb-9">{{ __('back.general_settings') }}</h1>

                    <div class="row mb-5">

                        <div class="col-md-6 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.site_name') }}</label>
                            <input type="text" class="form-control form-control-solid" name="site_name"
                                value="{{ $settings['site_name'] ?? '' }}">
                        </div>

                        <div class="col-md-6 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.site_email') }}</label>
                            <input type="email" class="form-control form-control-solid" name="site_email"
                                value="{{ $settings['site_email'] ?? '' }}">
                        </div>

                        <div class="col-md-6 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.phone') }}</label>
                            <input type="text" class="form-control form-control-solid" name="site_phone"
                                value="{{ $settings['site_phone'] ?? '' }}">
                        </div>

                        <div class="col-md-6 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.whatsapp') }}</label>
                            <input type="text" class="form-control form-control-solid" name="whatsapp"
                                value="{{ $settings['whatsapp'] ?? '' }}">
                        </div>

                        <div class="col-md-6 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.facebook') }}</label>
                            <input type="text" class="form-control form-control-solid" name="facebook"
                                value="{{ $settings['facebook'] ?? '' }}">
                        </div>

                        <div class="col-md-6 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.x') }}</label>
                            <input type="text" class="form-control form-control-solid" name="x"
                                value="{{ $settings['x'] ?? '' }}">
                        </div>

                        <div class="col-md-6 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.instagram') }}</label>
                            <input type="text" class="form-control form-control-solid" name="instagram"
                                value="{{ $settings['instagram'] ?? '' }}">
                        </div>

                        <div class="col-md-6 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.linkedin') }}</label>
                            <input type="text" class="form-control form-control-solid" name="linkedin"
                                value="{{ $settings['linkedin'] ?? '' }}">
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary" id="kt_settings_submit_button">
                        <span class="indicator-label">{{ __('back.save_settings') }}</span>
                        <span class="indicator-progress">
                            {{ __('back.please_wait') }}...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
