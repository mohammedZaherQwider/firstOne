@extends('back_end.layout.app')

@section('content')
    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <div class="card-body p-lg-17">
                <form action="{{ isset($doctor) ? route('doctors.update', $doctor->id) : route('doctors.store') }}" " method="POST" enctype="multipart/form-data" id="doctorForm">
                    @csrf
                        @if (isset($doctor))
                            @method('PUT')
                        @endif
                    <h1 class="fw-bolder text-dark mb-9">Add Doctors</h1>

                    <div class="row mb-5">
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">Name</label>
                            <input type="text" class="form-control form-control-solid" name="name"
                                value="{{ $doctor->name ?? '' }}">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <!-- Specialization -->
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">Specialization</label>
                            <select name="specialization_id" class="form-control form-control-solid">
                                <option disabled {{ !isset($doctor) ? 'selected' : '' }}>اختر التخصص</option>
                                @foreach ($specializations as $specialization)
                                    <option value="{{ $specialization->id }}"
                                        {{ isset($doctor) && $doctor->specialization_id == $specialization->id ? 'selected' : '' }}>
                                        {{ $specialization->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <!-- Nationality -->
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">Nationality</label>
                            <select name="nationality_id" class="form-control form-control-solid">
                                <option disabled {{ !isset($doctor) ? 'selected' : '' }}>اختر الجنسية</option>
                                @foreach ($nationalitys as $nationality)
                                    <option value="{{ $nationality->id }}"
                                        {{ isset($doctor) && $doctor->nationality_id == $nationality->id ? 'selected' : '' }}>
                                        {{ $nationality->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <!-- Hospital -->
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">Hospital</label>
                            <select name="hospital_id" class="form-control form-control-solid">
                                <option disabled {{ !isset($doctor) ? 'selected' : '' }}>اختر المستشفى</option>
                                @foreach ($hospitals as $hospital)
                                    <option value="{{ $hospital->id }}"
                                        {{ isset($doctor) && $doctor->hospital_id == $hospital->id ? 'selected' : '' }}>
                                        {{ $hospital->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <!-- Gender -->
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">Gender</label>
                            <select name="gender" class="form-control form-control-solid">
                                <option disabled {{ !isset($doctor) ? 'selected' : '' }}>اختر الجنس</option>
                                <option value="male" {{ isset($doctor) && $doctor->gender == 'male' ? 'selected' : '' }}>
                                    Male</option>
                                <option value="female"
                                    {{ isset($doctor) && $doctor->gender == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <!-- Images -->
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">Images</label>
                            <div id="myDropzone" class="dropzone">
                                @if (isset($doctor) && $doctor->image)
                                    <div id="currentImage">
                                        <img src="{{ asset('uploads/doctors/' . $doctor->image->image) }}"
                                            alt="Doctor Image" width="120">
                                    </div>
                                @endif
                            </div>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        {{--  ضل بس تعديل الصورة  --}}
                        <input type="hidden" name="uploaded_images[]" id="uploaded_images"
                            value="{{ isset($doctor) ? $doctor->image?->image : '' }}">
                        <!-- Bio -->
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">Bio</label>
                            <textarea class="form-control form-control-solid" rows="6" name="bio">{{ $doctor->bio ?? '' }}</textarea>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary" id="kt_contact_submit_button">
                        <span class="indicator-label">Send</span>
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
            formData.append("folder", "doctors");

        });
        myDropzone.on("success", function(file, response) {
            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'uploaded_images[]';
            input.value = response.filename;
            document.getElementById('doctorForm').appendChild(input);
        });
    </script>
@endsection
