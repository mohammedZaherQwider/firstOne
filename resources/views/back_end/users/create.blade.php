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
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" id="userForm">
                    @csrf
                    <h1 class="fw-bolder text-dark mb-9">{{ isset($user) ? __('back.edit_user') : __('back.add_user') }}</h1>

                    <div class="row mb-5">
                        <input type="hidden" name="id" value="{{ $user->id ?? '' }}">
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.user_name') }}</label>
                            <input type="text" class="form-control form-control-solid" name="name"
                                value="{{ $user->name ?? '' }}">
                            @error('name')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.user_email') }}</label>
                            <input type="email" class="form-control form-control-solid" name="email"
                                value="{{ $user->email ?? '' }}">
                            @error('email')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.password') }}</label>
                            <input type="password" class="form-control form-control-solid" name="password"
                                value="{{ $user->password ?? '' }}">
                            @error('password')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.phone') }}</label>
                            <input type="text" class="form-control form-control-solid" name="phone"
                                value="{{ $user->phone ?? '' }}">
                            @error('phone')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Images -->
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.images') }}</label>
                            <div id="myDropzone" class="dropzone">
                                @if (isset($user) && $user->image)
                                    <div id="currentImage">
                                        <img src="{{ asset('uploads/users/' . $user->image->image) }}" alt="User Image"
                                            width="120">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <input type="hidden" name="uploaded_images[]" id="uploaded_images"
                            value="{{ isset($user) ? $user->image?->image : '' }}">

                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label>{{ __('back.countries') }}</label><br>
                            <ul style="column-count: 2" class="list-unstyled">
                                @foreach ($countries as $item)
                                    <li>
                                        <label>
                                            <input type="radio" name="country_id" value="{{ $item->id }}"
                                                {{ isset($user) && $user->country_id == $item->id ? 'checked' : '' }}>
                                            {{ $item->name }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label>{{ __('back.jobs') }}</label><br>
                            <ul style="column-count: 2" class="list-unstyled">
                                @foreach ($jobs as $item)
                                    <li>
                                        <label>
                                            <input type="radio" name="job_id" value="{{ $item->id }}"
                                                {{ isset($user) && $user->job_id == $item->id ? 'checked' : '' }}>
                                            {{ $item->name }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label>{{ __('back.hospitals') }}</label><br>
                            <ul style="column-count: 2" class="list-unstyled">
                                @foreach ($hospitals as $item)
                                    <li>
                                        <label>
                                            <input type="radio" name="hospital_id" value="{{ $item->id }}"
                                                {{ isset($user) && $user->hospital_id == $item->id ? 'checked' : '' }}>
                                            {{ $item->name }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label>{{ __('back.roles') }}</label><br>
                            <ul style="column-count: 2" class="list-unstyled">
                                @foreach ($roles as $item)
                                    <li>
                                        <label>
                                            <input type="radio" name="role_id" value="{{ $item->id }}"
                                                {{ isset($user) && $user->role_id == $item->id ? 'checked' : '' }}>
                                            {{ $item->name }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fw-bold">{{ __('back.user_type') }}</label><br>
                            <label class="me-4">
                                <input type="radio" name="type" value="admin"
                                    {{ isset($user) && $user->type === 'admin' ? 'checked' : '' }}>
                                {{ __('back.admin') }}
                            </label>
                            <label>
                                <input type="radio" name="type" value="user"
                                    {{ isset($user) && $user->type === 'user' ? 'checked' : '' }}>
                                {{ __('back.user') }}
                            </label>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary" id="kt_contact_submit_button">
                        <span class="indicator-label">{{ __('back.send') }}</span>
                        <span class="indicator-progress">{{ __('back.please_wait') }}<span
                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
            formData.append("folder", "users");
        });
        myDropzone.on("success", function(file, response) {
            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'uploaded_images[]';
            input.value = response.filename;
            document.getElementById('userForm').appendChild(input);
        });
    </script>
@endsection
