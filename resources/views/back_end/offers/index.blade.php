@extends('back_end.layout.app')
@section('content')
    <!--begin::Table-->
    <style>
        #kt_content {
            margin-top: 0 !important;
            padding-top: 0 !important;
            position: relative;
            top: -10px;
        }
    </style>
    <div class="card card-flush mt-6 mt-xl-9" id="kt_content">
        <!--begin::Card header-->
        <div class="card-header mt-5">
            <div class="card-title flex-column">
                <h3 class="fw-bolder mb-1">{{ __('back.offers') }}</h3>
            </div>
            <div class="card-toolbar my-1">
                <a href="{{ route('offers.create') }}" class="btn btn-primary btn-sm">{{ __('back.add_offer') }}</a>
                <div class="d-flex align-items-center position-relative my-1 ms-4">
                    <input type="text" id="kt_filter_search"
                        class="form-control form-control-solid form-select-sm w-150px ps-3"
                        placeholder="{{ __('back.search_offer') }}" />
                </div>
            </div>
        </div>
        <!--end::Card header-->
        <div class="card-body pt-0">
            <div class="table-responsive">
                <table id="kt_offers_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                    <thead class="fs-7 text-gray-400 text-uppercase">
                        <tr>
                            <th class="min-w-50px">ID</th>
                            <th class="min-w-150px">{{ __('back.name') }}</th>
                            <th class="min-w-100px">{{ __('back.discount') }} (%)</th>
                            <th class="min-w-100px">{{ __('back.price') }}</th>
                            <th class="min-w-150px">{{ __('back.doctor') }}</th>
                            <th class="min-w-150px">{{ __('back.hospital') }}</th>
                            <th class="min-w-150px">{{ __('back.specialization') }}</th>
                            <th class="min-w-50px">{{ __('back.created_at') }}</th>
                            <th class="min-w-50px">{{ __('back.updated_at') }}</th>
                            <th class="min-w-50px text-end">{{ __('back.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="fs-6">
                        @foreach ($offers as $offer)
                            <tr>
                                <td>{{ $offer->id }}</td>
                                <td>{{ $offer->name }}</td>
                                <td>{{ $offer->discount_value }}</td>
                                <td>{{ $offer->price }}</td>
                                <td>{{ $offer->doctor->name ?? '-' }}</td>
                                <td>{{ $offer->hospital->name ?? '-' }}</td>
                                <td>{{ $offer->specialization->name ?? '-' }}</td>
                                <td>{{ $offer->created_at->format('Y-m-d') }}</td>
                                <td>{{ $offer->updated_at->format('Y-m-d') }}</td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end flex-shrink-0">
                                        <a href="{{ route('offers.edit', $offer->id) }}"
                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                            <span class="svg-icon svg-icon-3">
                                                <!-- Edit Icon SVG -->
                                            </span>
                                        </a>
                                        <form class="d-inline" action="{{ route('offers.destroy', $offer->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="button" onclick="destroy(event)"
                                                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                <span class="svg-icon svg-icon-3">
                                                    <!-- Delete Icon SVG -->
                                                </span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--end::Card-->
@endsection
@section('js')
    <script>
        function destroy(e) {
            let url = e.target.closest('form').action;
            let row = e.target.closest('tr');
            console.log(url, row);
            Swal.fire({
                title: '{{ __('back.confirm_delete_title') }}',
                text: "{{ __('back.confirm_delete_text') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{ __('back.yes_delete') }}'
            }).then((result) => {
                if (result.isConfirmed) {
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
@endsection
