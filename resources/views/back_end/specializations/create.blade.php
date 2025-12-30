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

                <form action="{{ route('specializations.store') }}" method="POST" enctype="multipart/form-data" id="specializationForm">
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
                                value="{{ old('name', $specialization->name ?? '') }}"
                                placeholder="Enter specialization name">

                            @error('name')
                                <div class="form-error text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <!-- Images -->
                    <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                        <label class="fs-5 fw-bold mb-2">Images</label>
                        <div id="myDropzone" class="dropzone">
                            @if (isset($specialization) && $specialization->image)
                                <div id="currentImage">
                                    <img src="{{ asset('uploads/specializations/' . $specialization->image->image) }}" alt="Doctor Image"
                                        width="120">
                                </div>
                            @endif
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    {{--  ضل بس تعديل الصورة  --}}
                    <input type="hidden" name="uploaded_images[]" id="uploaded_images"
                        value="{{ isset($specialization) ? $specialization->image?->image : '' }}">
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
            formData.append("folder", "specializations");
        });
        myDropzone.on("success", function(file, response) {
            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'uploaded_images[]';
            input.value = response.filename;
            document.getElementById('specializationForm').appendChild(input);
        });
    </script>
@endsection

