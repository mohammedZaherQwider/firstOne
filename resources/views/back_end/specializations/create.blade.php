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

                <form action="{{ route('specializations.store') }}" method="POST">
                    @csrf

                    <h1 class="fw-bolder text-dark mb-9">
                        {{ isset($specialization) ? 'Edit Specialization' : 'Add Specialization' }}
                    </h1>

                    {{-- hidden id for update --}}
                    <input type="hidden" name="id" value="{{ $specialization->id ?? '' }}">

                    <div class="row mb-5">

                        {{-- Specialization Name --}}
                        <div class="col-12 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2">Specialization Name</label>
                            <input type="text" class="form-control form-control-solid" name="name"
                                value="{{ old('name', $specialization->name ?? '') }}" placeholder="Enter specialization name">

                            @error('name')
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
