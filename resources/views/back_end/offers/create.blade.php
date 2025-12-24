@extends('back_end.layout.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   <div id="kt_content_container" class="container-xxl">
    <div class="card">
        <div class="card-body p-lg-17">
            <form action="{{ route('offers.store') }}" method="POST" id="offerForm">
                @csrf

                <h1 class="fw-bolder text-dark mb-9">
                    {{ isset($offer) ? 'Edit Offer' : 'Add Offer' }}
                </h1>

                <input type="hidden" name="id" value="{{ $offer->id ?? '' }}">

                <div class="row mb-5">
                    <div class="col-12 fv-row mb-3">
                        <label class="fs-5 fw-bold mb-2">Offer Name</label>
                        <input type="text" class="form-control form-control-solid" name="name"
                               value="{{ $offer->name ?? '' }}">
                        @error('name')
                        <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 fv-row mb-3">
                        <label class="fs-5 fw-bold mb-2">Discount Value (%)</label>
                        <input type="number" class="form-control form-control-solid" name="discount_value"
                               value="{{ $offer->discount_value ?? '' }}">
                        @error('discount_value')
                        <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 fv-row mb-3">
                        <label class="fs-5 fw-bold mb-2">Price</label>
                        <input type="number" class="form-control form-control-solid" name="price"
                               value="{{ $offer->price ?? '' }}" step="0.01">
                        @error('price')
                        <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 fv-row mb-3">
                        <label>Doctors</label><br>
                        <ul style="column-count: 3" class="list-unstyled">
                            @foreach ($doctors as $item)
                                <li>
                                    <label>
                                        <input type="radio" name="doctor_id" value="{{ $item->id }}"
                                               {{ isset($offer) && $offer->doctor_id == $item->id ? 'checked' : '' }}>
                                        {{ $item->name }}
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                        @error('doctor_id')
                        <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 fv-row mb-3">
                        <label>Hospitals</label><br>
                        <ul style="column-count: 3" class="list-unstyled">
                            @foreach ($hospitals as $item)
                                <li>
                                    <label>
                                        <input type="radio" name="hospital_id" value="{{ $item->id }}"
                                               {{ isset($offer) && $offer->hospital_id == $item->id ? 'checked' : '' }}>
                                        {{ $item->name }}
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                        @error('hospital_id')
                        <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 fv-row mb-3">
                        <label>Specializations</label><br>
                        <ul style="column-count: 3" class="list-unstyled">
                            @foreach ($specializations as $item)
                                <li>
                                    <label>
                                        <input type="radio" name="specialization_id" value="{{ $item->id }}"
                                               {{ isset($offer) && $offer->specialization_id == $item->id ? 'checked' : '' }}>
                                        {{ $item->name }}
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                        @error('specialization_id')
                        <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <button type="submit" class="btn btn-primary" id="kt_contact_submit_button">
                    <span class="indicator-label">Save</span>
                    <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
@section('js')
    <script>
        $('#check_all').change(function() {

            $('ul input[type=checkbox]').prop('checked', this.checked)

        })
    </script>
@endsection
