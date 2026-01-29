@extends('back_end.layout.app')

@section('content')
    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <div class="card-body p-lg-17">
                <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data" id="operationForm">
                    @csrf
                    <h1 class="fw-bolder text-dark mb-9">Add Roles</h1>

                    <div class="row mb-5">
                        <input type="hidden" name="id" value="{{ $role->id ?? '' }}">
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">Role Name</label>
                            <input type="text" class="form-control form-control-solid" name="name"
                                value="{{ $role->name ?? '' }}">
                            @error('name')
                                <div class="form-error">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label>Permissions</label> <br>
                            <label><input type="checkbox" id="check_all"> All Permissions</label>
                            <ul style="column-count: 2" class="list-unstyled">
                                @foreach ($permissions as $item)
                                    <li><label> <input type="checkbox" name="permissions[]" value="{{ $item->id }}"
                                                {{ isset($role) && in_array($item->id, $rolePermissions) ? 'checked' : '' }}>
                                            {{ $item->name }}</label></li>
                                @endforeach
                            </ul>
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
