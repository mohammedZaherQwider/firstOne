@extends('back_end.layout.app')
@section('content')
    <style>
        #kt_content {
            margin-top: 0 !important;
            padding-top: 0 !important;
            position: relative;
            top: -10px;
        }
    </style>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Form-->
                <form action="#">
                    <!--begin::Card-->
                    <div class="card mb-7">
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Compact form-->
                            <div class="d-flex align-items-center">
                                <!--begin::Input group-->
                                <div class="position-relative w-md-400px me-md-2">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    <span
                                        class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                                rx="1" transform="rotate(45 17.0365 15.1223)" fill="black">
                                            </rect>
                                            <path
                                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                fill="black"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <input type="text" class="form-control form-control-solid ps-10" name="search"
                                        value="" placeholder="{{ __('back.Search') }}">
                                </div>
                                <button type="submit" class="btn btn-primary me-5">{{ __('back.Search') }}</button>
                                <!--end::Input group-->
                                <!--begin:Action-->

                                <!--end:Action-->
                            </div>
                            <!--end::Compact form-->

                            <!--end::Advance form-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </form>
                <!--end::Form-->

                <!--begin::Tab Content-->
                <div class="tab-content">
                    <!--begin::Tab pane-->

                    <!--end::Tab pane-->
                    <!--begin::Tab pane-->
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">{{ __('site.hospitels') }} </span>
                            </h3>
                            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-trigger="hover" title="Click to add a user">
                                @can('Add Hospital')
                                    <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_new_target">{{ __('site.add') }} {{ __('site.hospitel') }}</a>
                                @endcan
                                <div class="d-flex my-0">
                                    <select id="exportSelect"
                                        class="form-select form-select-sm border-body bg-body w-100px">
                                        <option value="">{{ __('back.Export') }}</option>
                                        <option value="{{ route('pdf') }}">PDF</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body py-3">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                                    id="myTable">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fw-bolder text-muted">
                                            <th class="w-25px">
                                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        data-kt-check="true" data-kt-check-target=".widget-9-check" />
                                                </div>
                                            </th>
                                            <th class="min-w-150px">{{ __('back.ID') }}</th>
                                            <th class="min-w-150px">{{ __('back.Name') }} </th>
                                            <th class="min-w-150px">{{ __('site.country') }} </th>
                                            <th class="min-w-140px">{{ __('site.city') }}</th>
                                            <th class="min-w-120px"> {{ __('site.number') }} {{ __('site.bed') }} </th>
                                            <th class="min-w-100px text-end">{{ __('back.Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        @foreach ($hospitals as $hospital)
                                            <tr>

                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input widget-9-check" type="checkbox"
                                                            value="1" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <span class="text-muted fw-bold text-muted d-block fs-7">
                                                            {{ $hospital->id }}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-45px me-5">
                                                            @if ($hospital->images->isNotEmpty())
                                                                <img src="{{ asset('uploads/hospitals/' . $hospital->images->first()->image) }}"
                                                                    class="img-fluid rounded" alt="Hospital Image">
                                                            @else
                                                                <img src="{{ asset('uploads/hospitals/default.jpg') }}"
                                                                    class="img-fluid rounded" alt="Default Image">
                                                            @endif
                                                        </div>
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                                class="text-dark fw-bolder text-hover-primary fs-6">
                                                                @if (app()->currentLocale() == 'ar')
                                                                    {{ $hospital->localization->name }}
                                                                @else
                                                                    {{ $hospital->name }}
                                                                @endif

                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <span class="text-muted fw-bold text-muted d-block fs-7">
                                                            {{ $hospital->country->name }}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <span class="text-muted fw-bold text-muted d-block fs-7">
                                                            {{ $hospital->city->name }}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <span class="text-muted fw-bold text-muted d-block fs-7">
                                                            {{ $hospital->bed_number }}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-end flex-shrink-0">
                                                        <a href="{{ route('hospitals.show', $hospital) }}"
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                            <i class="fas fa-eye"></i>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                        @can('Update Hospital')
                                                            <a href="#" data-id="{{ $hospital->id }}"
                                                                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 btn-edit-hospital">
                                                                <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path opacity="0.3"
                                                                            d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                            fill="black" />
                                                                        <path
                                                                            d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                            fill="black" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                        @endcan
                                                        @can('Delete Hospital')
                                                            <form class="d-inline"
                                                                action="{{ route('hospitals.destroy', $hospital->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="button" onclick="destroy(event)"
                                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                            height="24" viewBox="0 0 24 24"
                                                                            fill="none">
                                                                            <path
                                                                                d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                                                fill="black" />
                                                                            <path opacity="0.5"
                                                                                d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                                                fill="black" />
                                                                            <path opacity="0.5"
                                                                                d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                                                fill="black" />
                                                                        </svg>
                                                                    </span>
                                                                </button>
                                                            </form>
                                                        @endcan
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <!--end::Table body-->
                                </table>

                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--begin::Body-->
                    </div>
                    <!--end::Tab pane-->
                </div>
                <!--end::Tab Content-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    @include('back_end.hospitals.createmodel')
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "paging": true,
                "searching": true,
                "info": true,
                "lengthChange": true,
                "order": [
                    [1, "DESC"]
                ]
            });
        });
    </script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        @if (session('mas'))
            Toast.fire({
                icon: '{{ session('icon') }}',
                title: '{{ session('msg') }}'
            })
        @endif
    </script>
    <script>
        function destroy(e) {
            let url = e.target.closest('form').action;
            let row = e.target.closest('tr');
            console.log(url, row);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to undo this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log("dkvndknv");
                    axios.post(url, {
                            _method: 'delete'
                        })
                        .then(res => {
                            row.remove()
                        })
                }
            });
        }
    </script>
    <script>
        document.getElementById('exportSelect').addEventListener('change', function() {
            if (this.value) {
                window.location.href = this.value; // ينزل ملف PDF مباشرة
            }
        });
    </script>

    <script>
        $(document).on('click', '.btn-edit-hospital', function(e) {
            e.preventDefault();

            let serviceIndex = 0; // معرف خارج أي دالة ليبقى متاح لكل الوظائف

            function addServiceRow(index, srv = {
                name: '',
                type: 'in',
                icon: 'fa-hospital'
            }) {
                let html = `
            <div class="service-item d-flex mb-3 align-items-center">
                <input type="text" name="services[${index}][name]" value="${srv.name}" class="form-control me-2">
                <select name="services[${index}][type]" class="form-select me-2">
                    <option value="in" ${srv.type === 'in' ? 'selected' : ''}>In</option>
                    <option value="out" ${srv.type === 'out' ? 'selected' : ''}>Out</option>
                </select>
                <select name="services[${index}][icon]" class="form-select me-2">
                    <option value="fa-hospital" ${srv.icon === 'fa-hospital' ? 'selected' : ''}>Hospital</option>
                    <option value="fa-stethoscope" ${srv.icon === 'fa-stethoscope' ? 'selected' : ''}>Stethoscope</option>
                    <option value="fa-user-md" ${srv.icon === 'fa-user-md' ? 'selected' : ''}>Doctor</option>
                    <option value="@" ${srv.icon === '@' ? 'selected' : ''}>@</option>
                </select>
                <button type="button" class="btn btn-danger btn-remove-service ms-2">-</button>
            </div>
        `;
                $('#services-wrapper').append(html);
            }
            let id = $(this).data('id');
            let url = "/hospitals/" + id + "/edit";

            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    $('#name').val(response.name);
                    $('#country_id').val(response.country_id).trigger('change');
                    $('#bed_number').val(response.bed_number);
                    $('#description').val(response.description);
                    $('#id').val(response.id);
                    let formData = $('#hospitalForm').serialize();

                    // console.log(response.id);

                    $('#services-wrapper').empty();
                    serviceIndex = 0; // إعادة ضبط العد عند فتح المودل
                    response.services.forEach((srv, index) => {
                        addServiceRow(serviceIndex++, srv);
                    });

                    $.ajax({
                        url: '/cities/' + response.country_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#city_id').empty().append(
                                '<option value="">اختر المدينة</option>');
                            $.each(data, function(key, value) {
                                $('#city_id').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                            $('#city_id').val(response.city_id).trigger('change');
                        }
                    });

                    let modal = new bootstrap.Modal(document.getElementById('kt_modal_new_target'));
                    modal.show();
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });

        // إضافة خدمة جديدة
        $(document).on('click', '.btn-add-service', function() {
            addServiceRow(serviceIndex++);
        });

        // حذف الخدمة
        $(document).on('click', '.btn-remove-service', function() {
            $(this).closest('.service-item').remove();
        });
    </script>
@endsection
