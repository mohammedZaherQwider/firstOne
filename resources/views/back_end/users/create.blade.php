@extends('back_end.layout.app')

@section('content')
    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <div class="card-body p-lg-17">
                <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST"
                    enctype="multipart/form-data" id="operationForm">
                    @csrf
                    @if (isset($user))
                        @method('PUT')
                    @endif
                    <h1 class="fw-bolder text-dark mb-9">Add Users</h1>

                    <div class="row mb-5">
                        <input type="hidden" name="id" value="{{ $user->id ?? '' }}">
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">User Name</label>
                            <input type="text" class="form-control form-control-solid" name="name"
                                value="{{ $user->name ?? '' }}">
                            @error('name')
                                <div class="form-error">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">User Email </label>
                            <input type="email" class="form-control form-control-solid" name="email"
                                value="{{ $user->email ?? '' }}">
                            @error('email ')
                                <div class="form-error">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">Password </label>
                            <input type="password" class="form-control form-control-solid" name="password"
                                value="{{ $user->password ?? '' }}">
                            @error('password ')
                                <div class="form-error">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">Phone </label>
                            <input type="text" class="form-control form-control-solid" name="phone"
                                value="{{ $user->phone ?? '' }}">
                            @error('phone ')
                                <div class="form-error">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label>Countries</label><br>

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
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label>Jobs</label><br>

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
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label> Hospitals</label><br>

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
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label> Roles</label><br>

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
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fw-bold">User Type</label><br>

                            <label class="me-4">
                                <input type="radio" name="type" value="admin"
                                    {{ isset($user) && $user->type === 'admin' ? 'checked' : '' }}>
                                Admin
                            </label>

                            <label>
                                <input type="radio" name="type" value="user"
                                    {{ isset($user) && $user->type === 'user' ? 'checked' : '' }}>
                                User
                            </label>
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
        $('#check_all').change(function() {

            $('ul input[type=checkbox]').prop('checked', this.checked)

        })
    </script>
@endsection
