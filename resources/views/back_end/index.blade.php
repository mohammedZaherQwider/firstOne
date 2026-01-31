@extends('back_end.layout.app')

@section('content')
    <style>
        .custom-content-fix {
            margin-top: -70px;
            margin-inline-start: 20px;
        }
    </style>

    <div class="custom-content-fix">
        <div class="card mb-5 mb-xl-10">
            <div class="card-header border-0 cursor-pointer">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">{{ __('back.profile_details') }}</h3>
                </div>
            </div>

            <div class="collapse show">
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" class="form">
                    @csrf

                    <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="role_id" value="{{ auth()->user()->role->id }}">
                    <input type="hidden" name="profile" value="profile">

                    <div class="card-body border-top p-9">

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                {{ __('back.avatar') }}
                            </label>

                            <div class="col-lg-8">
                                <div class="image-input image-input-outline">
                                    <div class="image-input-wrapper w-125px h-125px"
                                        style="background-image: url('{{ asset('uploads/users/' . optional(auth()->user()->image)->image ?? 'default.jpg') }}')">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">
                                {{ __('back.name') }}
                            </label>

                            <div class="col-lg-8 fv-row">
                                <input type="text" name="name" class="form-control form-control-lg form-control-solid"
                                    value="{{ auth()->user()->name }}" />
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">
                                {{ __('back.email') }}
                            </label>

                            <div class="col-lg-8 fv-row">
                                <input type="text" name="email" class="form-control form-control-lg form-control-solid"
                                    value="{{ auth()->user()->email }}" />
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">
                                {{ __('back.password') }}
                            </label>

                            <div class="col-lg-8 fv-row">
                                <input type="password" name="password"
                                    class="form-control form-control-lg form-control-solid" placeholder="********" />
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                {{ __('back.role') }}
                            </label>

                            <div class="col-lg-8 fv-row">
                                <input type="text" class="form-control form-control-lg form-control-solid"
                                    value="{{ auth()->user()->role->name ?? '-' }}" readonly />
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                <span class="required">{{ __('back.contact_phone') }}</span>
                            </label>

                            <div class="col-lg-8 fv-row">
                                <input type="tel" name="phone" class="form-control form-control-lg form-control-solid"
                                    value="{{ auth()->user()->phone }}" />
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                {{ __('back.company_site') }}
                            </label>

                            <div class="col-lg-8 fv-row">
                                <input type="text" name="website" class="form-control form-control-lg form-control-solid"
                                    value="rightguide.com" />
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                <span class="required">{{ __('back.country') }}</span>
                            </label>

                            <div class="col-lg-8 fv-row">
                                <select name="country_id" class="form-select form-select-solid form-select-lg fw-bold">
                                    <option value="">{{ __('back.select_country') }}</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ auth()->user()->country_id == $country->id ? 'selected' : '' }}>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                {{ __('back.dark_mode') }}
                            </label>

                            <div class="col-lg-8 d-flex align-items-center">
                                <div class="form-check form-check-solid form-switch fv-row">
                                    <input class="form-check-input w-45px h-30px" type="checkbox" id="darkModeToggle" />
                                    <label class="form-check-label" for="darkModeToggle"></label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="submit" class="btn btn-primary">
                            {{ __('back.save_changes') }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
