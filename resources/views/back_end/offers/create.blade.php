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
                <form action="{{ route('offers.store') }}" method="POST" id="offerForm" enctype="multipart/form-data">
                    @csrf

                    <h1 class="fw-bolder text-dark mb-9">
                        {{ isset($offer) ?  __('back.edit_offer') : __('back.add_offer') }}
                    </h1>

                    <input type="hidden" name="id" value="{{ $offer->id ?? '' }}">

                    <div class="row mb-5">
                        <div class="col-12 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.offer_name') }}</label>
                            <input type="text" class="form-control form-control-solid" name="name"
                                value="{{ $offer->name ?? '' }}">
                            @error('name')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.discount_value') }} (%)</label>
                            <input type="number" class="form-control form-control-solid" name="discount_value"
                                value="{{ $offer->discount_value ?? '' }}">
                            @error('discount_value')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.price') }}</label>
                            <input type="number" class="form-control form-control-solid" name="price"
                                value="{{ $offer->price ?? '' }}" step="0.01">
                            @error('price')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Images -->
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.images') }}</label>
                            <div id="myDropzone" class="dropzone">
                                @if (isset($offer) && $offer->image)
                                    <div id="currentImage">
                                        <img src="{{ asset('uploads/offers/' . $offer->image->image) }}"
                                            alt="Doctor Image" width="120">
                                    </div>
                                @endif
                            </div>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        {{--  ضل بس تعديل الصورة  --}}
                        <input type="hidden" name="uploaded_images[]" id="uploaded_images"
                            value="{{ isset($offer) ? $offer->image?->image : '' }}">
                        <div class="col-12 fv-row mb-3">
                            <label>{{ __('back.doctors') }}</label><br>
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
                            <label>{{ __('back.hospitals') }}</label><br>
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
                            <label>{{ __('back.specializations') }}</label><br>
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
                        <span class="indicator-label">{{ __('back.save') }}</span>
                        <span class="indicator-progress">   {{ __('back.please_wait') }}
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
    <script>
        let myDropzone = new Dropzone("#myDropzone", {
            url: "{{ route('upload') }}",
            paramName: "file",
            maxFilesize: 5,
            acceptedFiles: "image/*",
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });
        myDropzone.on("sending", function(file, xhr, formData) {
            formData.append("folder", "offers");
        });
        myDropzone.on("success", function(file, response) {
            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'uploaded_images[]';
            input.value = response.filename;
            document.getElementById('offerForm').appendChild(input);
        });
    </script>
@endsection
