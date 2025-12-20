@extends('back_end.layout.app')
@section('content')
    {{-- {{ dd($settings) }} --}}
    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <div class="card-body p-lg-17">
                <form method="POST" action="{{ route('settings') }}" enctype="multipart/form-data" id="settingsForm">
                    @csrf

                    <h1 class="fw-bolder text-dark mb-9">General Settings</h1>

                    <div class="row mb-5">

                        <div class="col-md-6 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2">Site Name</label>
                            <input type="text" class="form-control form-control-solid" name="site_name"
                                value="{{ $settings['site_name'] ?? '' }}">
                        </div>

                        <div class="col-md-6 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2">Site Email</label>
                            <input type="email" class="form-control form-control-solid" name="site_email"
                                value="{{ $settings['site_email'] ?? '' }}">
                        </div>

                        <div class="col-md-6 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2">Phone</label>
                            <input type="text" class="form-control form-control-solid" name="site_phone"
                                value="{{ $settings['site_phone'] ?? '' }}">
                        </div>

                        <div class="col-md-6 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2">WhatsApp</label>
                            <input type="text" class="form-control form-control-solid" name="whatsapp"
                                value="{{ $settings['whatsapp'] ?? '' }}">
                        </div>

                        <div class="col-md-6 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2">Facebook</label>
                            <input type="text" class="form-control form-control-solid" name="facebook"
                                value="{{ $settings['facebook'] ?? '' }}">
                        </div>

                        <div class="col-md-6 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2">X (Twitter)</label>
                            <input type="text" class="form-control form-control-solid" name="x"
                                value="{{ $settings['x'] ?? '' }}">
                        </div>

                        <div class="col-md-6 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2">Instagram</label>
                            <input type="text" class="form-control form-control-solid" name="instagram"
                                value="{{ $settings['instagram'] ?? '' }}">
                        </div>

                        <div class="col-md-6 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2">LinkedIn</label>
                            <input type="text" class="form-control form-control-solid" name="linkedin"
                                value="{{ $settings['linkedin'] ?? '' }}">
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary" id="kt_settings_submit_button">
                        <span class="indicator-label">Save Settings</span>
                        <span class="indicator-progress">
                            Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
