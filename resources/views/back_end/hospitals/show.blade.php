@extends('back_end.layout.app')
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Home card-->
            <div class="card">
                <!--begin::Body-->
                <div class="card-body p-lg-20">
                    <!--begin::Section-->
                    <div class="mb-17">
                        <!--begin::Title-->
                        <h3 class="text-dark mb-7">{{ $hospital->name }}</h3>
                        <!--end::Title-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed mb-9"></div>
                        <!--end::Separator-->
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-md-6">
                                <!--begin::Feature post-->
                                <div class="h-100 d-flex flex-column justify-content-between pe-lg-6 mb-lg-0 mb-10">
                                    <!--begin::Video-->
                                    <div class="mb-3">
                                        @if ($hospital->images->isNotEmpty())
                                            <img src="{{ asset('uploads/hospitals/' . $hospital->images->first()->image) }}"
                                                class="img-fluid rounded" alt="Hospital Image">
                                        @else
                                            <img src="{{ asset('uploads/hospitals/default.jpg') }}"
                                                class="img-fluid rounded" alt="Default Image">
                                        @endif
                                    </div>
                                    <!--end::Video-->
                                    <!--begin::Body-->
                                    <div class="mb-5">
                                        <!--begin::Title-->
                                        <a href="#"
                                            class="fs-2 text-dark fw-bolder text-hover-primary text-dark lh-base">{{ __('site.hospitel') }}
                                            {{ __('back.Description') }}</a>
                                        <!--end::Title-->
                                        <!--begin::Text-->
                                        <div class="fw-bold fs-5 text-gray-600 text-dark mt-4">
                                            {{ $hospital->description }}
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Body-->

                                </div>
                                <!--end::Feature post-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 justify-content-between d-flex flex-column">
                                <!--begin::Post-->
                                {{-- هنا بدي اخليه يضيف الصور --}}
                                <div class="ps-lg-6 mb-16 mt-md-0 mt-17">
                                    <!--begin::Body-->
                                    <div class="mb-6">
                                        <!--begin::Title-->
                                        <a href="#"
                                            class="fw-bolder text-dark mb-4 fs-2 lh-base text-hover-primary">{{ __('site.hospitel') }}
                                            {{ __('back.Images') }}</a>
                                        <!--end::Title-->
                                        <!--begin::Text-->
                                        <form id="hospitalForm" action="{{ route('uploadImage') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="fw-bold fs-5 mt-4 text-dark">
                                                <label class="fs-5 fw-bold mb-2">{{ __('back.Images') }}</label>
                                                <!-- Dropzone فقط -->
                                                <div id="myDropzone" class="dropzone"></div>
                                                <input type="hidden" id="id" name="hospital_id"
                                                    value="{{ $hospital->id }}">


                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                                <button id="saveHospitalBtn" class="btn btn-primary mt-3">
                                                    {{ __('back.Save') }} {{ __('back.Images') }}</button>

                                            </div>
                                        </form>

                                        <!--end::Text-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Post-->
                                <!--begin::Post-->

                                <!--end::Post-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--begin::Row-->
                    </div>
                    <!--end::Section-->
                    <!--begin::Section-->
                    <div class="mb-17">
                        <!--begin::Content-->
                        <div class="d-flex flex-stack mb-5">
                            <!--begin::Title-->
                            <h3 class="text-dark">{{ __('back.Services') }} </h3>
                            <!--end::Title-->
                            <!--begin::Link-->
                            <!--end::Link-->
                        </div>
                        <!--end::Content-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed mb-9"></div>
                        <!--end::Separator-->
                        <!--begin::Row-->
                        <div class="row g-10">
                            <!--begin::Col-->
                            {{-- {{ dd($hospital->services) }} --}}
                            @foreach ($hospital->services as $s)
                                @if (is_array($s))
                                    <div class="col-md-4">
                                        {{-- {{ dd($s) }} --}}
                                        <!--begin::Feature post-->
                                        <div class="card-xl-stretch me-md-6">
                                            <!--begin::Image-->
                                            <a class="d-block bgi-no-repeat bgi-size-cover bgi-position-center card-rounded position-relative min-h-175px mb-5"
                                                href="#">
                                                {{ $s['img'] }}
                                            </a>
                                            <!--end::Image-->
                                            <!--begin::Body-->
                                            <div class="m-0">
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">
                                                    {{ $s['name'] }}
                                                </a>
                                                <!--end::Title-->
                                                <!--begin::Text-->
                                                <div class="fw-bold fs-5 text-gray-600 text-dark my-4">
                                                    {{ $s['type'] }}
                                                </div>
                                                <!--end::Text-->
                                                <!--begin::Content-->
                                                <!--end::Content-->
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Feature post-->
                                    </div>
                                @endif
                            @endforeach
                            <!--end::Col-->
                            <!--end::Row-->
                        </div>
                        <!--end::Section-->
                        <!--begin::latest instagram-->
                        <br>
                        <div class="">
                            <!--begin::Section-->
                            <div class="m-0">
                                <!--begin::Content-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Title-->
                                    <h3 class="text-dark">Latest Instagram Posts</h3>
                                    <!--end::Title-->
                                    <!--begin::Link-->
                                    <!--end::Link-->
                                </div>
                                <!--end::Content-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed border-gray-300 mb-9 mt-5"></div>
                                <!--end::Separator-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Row-->
                            <div class="row g-10 row-cols-2 row-cols-lg-5">
                                @foreach ($hospital->images as $img)
                                    <div class="col">
                                        <a class="d-block overlay" data-fslightbox="lightbox-hospital"
                                            href="{{ asset('uploads/hospitals/' . $img->image) }}">

                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                                style="background-image:url('{{ asset('uploads/hospitals/' . $img->image) }}')">
                                            </div>

                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="bi bi-eye-fill fs-2x text-white"></i>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach



                            </div>
                            <!--begin::Row-->
                        </div>
                        <!--end::latest instagram-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Home card-->
            </div>
            <!--end::Container-->
        </div>
    @endsection
    @section('js')
        <script>
            Dropzone.autoDiscover = false;

            let myDropzone = new Dropzone("#myDropzone", {
                url: "{{ route('upload') }}",
                paramName: "file",
                maxFilesize: 5,
                acceptedFiles: "image/*",
                addRemoveLinks: true,
                dictDefaultMessage: " {{ __('back.Swipe') }} ",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            });

            myDropzone.on("sending", function(file, xhr, formData) {
                formData.append("folder", "hospitals");

            });

            myDropzone.on("success", function(file, response) {
                let input = document.createElement("input");
                input.type = "hidden";
                input.name = "uploaded_images[]";
                input.value = response.filename;
                document.getElementById("hospitalForm").appendChild(input);
            });
        </script>
    @endsection
