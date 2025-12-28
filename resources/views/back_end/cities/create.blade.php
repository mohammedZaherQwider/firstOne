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
                        {{ isset($city) ? 'Edit City' : 'Add City' }}
                    </h1>

                    {{-- hidden id for update --}}
                    <input type="hidden" name="id" value="{{ $city->id ?? '' }}">

                    <div class="row mb-5">

                        {{-- City Name --}}
                        <div class="col-12 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2">City Name</label>
                            <input type="text" class="form-control form-control-solid" name="name"
                                value="{{ old('name', $city->name ?? '') }}" placeholder="Enter city name">

                            @error('name')
                                <div class="form-error text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Country --}}
                        <div class="col-12 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2">Country</label>
                            <select name="country_id" class="form-select form-select-solid">
                                <option value="">Select Country</option>
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
                        <span class="indicator-label">Save</span>
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
