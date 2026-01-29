@extends('back_end.layout.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <style>
        #kt_content_container {
            margin-top: 0 !important;
            padding-top: 0 !important;
            position: relative;
            top: -10px;
        }
    </style>
    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <div class="card-body p-lg-17">

                <form action="{{ route('countries.store') }}" method="POST">
                    @csrf

                    <h1 class="fw-bolder text-dark mb-9">
                        {{ isset($country) ? __('back.edit_country') : __('back.add_country') }}
                    </h1>

                    <input type="hidden" name="id" value="{{ $country->id ?? '' }}">

                    <div class="row mb-5">
                        <div class="col-12 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2">
                                {{ __('back.country_name') }}
                            </label>

                            <input type="text" class="form-control form-control-solid" name="name"
                                value="{{ old('name', $country->name ?? '') }}"
                                placeholder="{{ __('back.enter_country_name') }}">

                            @error('name')
                                <div class="form-error text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <span class="indicator-label">{{ __('back.save') }}</span>
                        <span class="indicator-progress">
                            {{ __('back.please_wait') }}
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>

                </form>

            </div>
        </div>
    </div>

@endsection
