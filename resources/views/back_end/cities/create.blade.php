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

    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <div class="card-body p-lg-17">

                <form action="{{ route('cities.store') }}" method="POST">
                    @csrf

                    <h1 class="fw-bolder text-dark mb-9">
                        {{ isset($city) ? __('back.edit_city') : __('back.add_city') }}
                    </h1>

                    {{-- hidden id for update --}}
                    <input type="hidden" name="id" value="{{ $city->id ?? '' }}">

                    <div class="row mb-5">

                        {{-- City Name --}}
                        <div class="col-12 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.city_name') }}</label>
                            <input type="text" class="form-control form-control-solid" name="name"
                                value="{{ old('name', $city->name ?? '') }}" placeholder="{{ __('back.enter_city_name') }}">

                            @error('name')
                                <div class="form-error text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Country --}}
                        <div class="col-12 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.country') }}</label>
                            <select name="country_id" class="form-select form-select-solid">
                                <option value="">{{ __('back.select_country') }}</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}"
                                        {{ old('country_id', $city->country_id ?? '') == $country->id ? 'selected' : '' }}>
                                        {{ $country->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('country_id')
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
