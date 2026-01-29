@extends('back_end.layout.app')

@section('content')
    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <div class="card-body p-lg-17">

                <form action="{{ route('contents.store') }}" method="POST" enctype="multipart/form-data" id="contentForm">
                    @csrf
                    {{-- @if (isset($content))
                        @method('PUT')
                    @endif --}}

                    <h1 class="fw-bolder text-dark mb-9">
                        {{ isset($content) ? __('back.edit_content') : __('back.add_content') }}
                    </h1>

                    <div class="row mb-5">

                        <!-- Title -->
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.title') }}</label>
                            <input type="text" class="form-control form-control-solid" name="title"
                                value="{{ $content->title ?? '' }}">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        @if (isset($content))
                        @php
                            $contentTranslation = $content->translations()->where('locale', 'en')->first();
                            $title = $contentTranslation ? json_decode($contentTranslation->content)->title : null;
                            $contentTranslation = $contentTranslation
                            ? json_decode($contentTranslation->content)->content
                            : null;
                        @endphp

                        @endif
                        <!-- Translation Title (English) -->
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.title_en') }}</label>
                            <input type="text" class="form-control form-control-solid" name="title_en"
                                value="{{ $title ?? '' }}">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <!-- Type -->
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.type') }}</label>
                            <select name="type_selector" id="type_selector" class="form-select form-select-solid">
                                <option value="" selected disabled>{{ __('back.choose_type') }} </option>
                                <option value="why_choose_us"
                                    {{ isset($content) && $content->link === 'why_choose_us' ? 'selected' : '' }}>
                                    {{ __('back.why_choose_us') }}
                                </option>
                                <option value="banner"
                                    {{ isset($content) && $content->link && $content->link !== 'why_choose_us' && $content->link !== 'hospital_criteria' && $content->link !== 'blog' ? 'selected' : '' }}>
                                    {{ __('back.banner') }}
                                </option>
                                <option value="hospital_criteria"
                                    {{ isset($content) && $content->link === 'hospital_criteria' ? 'selected' : '' }}>
                                    {{ __('back.hospital_criteria') }}
                                </option>
                                <option value="blog"
                                    {{ isset($content) && $content->link === 'blog' ? 'selected' : '' }}>
                                    {{ __('back.blog') }}
                                </option>
                                <option value="service"
                                    {{ isset($content) && $content->link === 'service' ? 'selected' : '' }}>
                                    {{ __('back.service') }}
                                </option>
                            </select>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <!-- Link (Hidden by default, shown only for banner) -->
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3" id="link_wrapper" style="display:none;">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.link') }}</label>
                            <input type="url" class="form-control form-control-solid" id="link_input_visible"
                                placeholder="https://example.com">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <!-- The real link that will be submitted -->
                        <input type="hidden" name="link" id="link_hidden" value="{{ $content->link ?? '' }}">
                        <input type="hidden" name="id" value="{{ isset($content) ? $content->id : null }}">


                        <!-- Content -->
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.content') }}</label>
                            <textarea name="content" id="summernote">
                               {{ old('content', $content->content ?? '') }}
                            </textarea>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!-- Translation Content (English) -->
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.content_en') }}</label>
                            <textarea name="content_en" id="summernote_en">
                                 {{-- {{ old('content_en', isset($content) ? optional($content->translations()->where('locale', 'en')->first())->content['content'] ?? '' : '') }} --}}
                                {{ old('content', $contentTranslation ?? '') }}
                            </textarea>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!-- Images (Morph) -->
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.image') }}</label>

                            <div id="myDropzone" class="dropzone">
                                @if (isset($content) && $content->images && $content->images->isNotEmpty())
                                    @php
                                        $img = $content->images->first()->image;
                                    @endphp
                                    <div id="currentImage" class="mb-3">
                                        <img src="{{ asset('uploads/contents/' . $img) }}" alt="Content Image"
                                            width="120" style="border-radius:8px;object-fit:cover;">
                                    </div>
                                @endif
                            </div>

                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        {{-- hidden for existing image on edit --}}
                        <input type="hidden" name="uploaded_images[]" id="uploaded_images"
                            value="{{ isset($content) && $content->images && $content->images->isNotEmpty() ? $content->images->first()->image : '' }}">

                    </div>

                    <button type="submit" class="btn btn-primary" id="kt_contact_submit_button">
                        <span class="indicator-label">{{ __('back.save') }}</span>
                        <span class="indicator-progress">{{ __('back.please_wait') }}...
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
        // Dropzone init
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

        // send folder name to upload route
        myDropzone.on("sending", function(file, xhr, formData) {
            formData.append("folder", "contents");
        });

        // when upload success: append hidden input
        myDropzone.on("success", function(file, response) {

            // لو بدك صورة واحدة فقط: امسح المدخلات القديمة وخلي آخر صورة
            document.querySelectorAll('#contentForm input[name="uploaded_images[]"]').forEach((el) => el.remove());

            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'uploaded_images[]';
            input.value = response.filename;
            document.getElementById('contentForm').appendChild(input);

            // اخفاء الصورة القديمة (لو edit)
            let currentImage = document.getElementById('currentImage');
            if (currentImage) currentImage.remove();
        });
    </script>
    <script>
        const typeSelector = document.getElementById('type_selector');
        const linkWrapper = document.getElementById('link_wrapper');
        const linkHidden = document.getElementById('link_hidden');
        const linkVisible = document.getElementById('link_input_visible');

        // الأنواع الثابتة (بدون رابط يدوي)
        const fixedTypes = [
            'why_choose_us',
            'hospital_criteria',
            'blog',
            'service' // ← التأمين الصحي صار زي blog تمامًا
        ];

        function syncTypeToLink() {
            const type = typeSelector.value;

            // فقط banner يسمح بإدخال رابط
            if (type === 'banner') {
                linkWrapper.style.display = 'block';

                // في حالة edit لو القيمة مش نوع ثابت
                if (linkHidden.value && !fixedTypes.includes(linkHidden.value)) {
                    linkVisible.value = linkHidden.value;
                }

                linkHidden.value = linkVisible.value || '';
            } else {
                // أي نوع ثابت
                linkWrapper.style.display = 'none';
                linkVisible.value = '';
                linkHidden.value = type; // blog / service / ...
            }
        }

        // تغيير النوع
        typeSelector.addEventListener('change', syncTypeToLink);

        // كتابة رابط banner
        linkVisible.addEventListener('input', function() {
            if (typeSelector.value === 'banner') {
                linkHidden.value = this.value;
            }
        });

        // عند التحميل (edit mode)
        window.addEventListener('DOMContentLoaded', function() {
            const current = linkHidden.value;

            if (fixedTypes.includes(current)) {
                typeSelector.value = current;
            } else if (current) {
                typeSelector.value = 'banner';
                linkVisible.value = current;
            }

            syncTypeToLink();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 250,
                dialogsInBody: true,
                disableResizeEditor: true,
                placeholder: '{{ __('back.enter_content') }}',
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['para', ['ul', 'ol']],
                    ['insert', ['link']],
                    ['view', ['codeview']]
                ]
            });
            $('#summernote_en').summernote({
                height: 250,
                dialogsInBody: true,
                disableResizeEditor: true,
                placeholder: '{{ __('back.enter_content_en') }}',
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
