@extends('back_end.layout.app')
@section('content')
    <form action="{{ route('send_notification') }}" method="POST" enctype="multipart/form-data" id="doctorForm">
        @csrf
        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
            <label class="fs-5 fw-bold mb-2">Users</label>
            <select name="user_id" class="form-control form-control-solid">
                <option disabled >اختر المستخدم</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <textarea name="notification" id="summernote">
    </textarea>
        <button type="submit" class="btn btn-primary" id="kt_contact_submit_button">
            <span class="indicator-label">Send</span>
            <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
        </button>
    </form>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 250,
                dialogsInBody: true,
                disableResizeEditor: true,
                placeholder: 'اكتب المحتوى هنا...',
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['para', ['ul', 'ol']],
                    ['insert', ['link']],
                    ['view', ['codeview']]
                ]
            });
        });
    </script>
@endsection
