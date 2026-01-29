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
    <div class="card card-flush mt-6 mt-xl-9" id="kt_content">

        <!-- Card Header -->
        <div class="card-header mt-5">
            <div class="card-title flex-column">
                <h3 class="fw-bolder mb-1">{{ __('back.cities') }}</h3>
            </div>

            <div class="card-toolbar my-1">
                @can('Add City')
                    <a href="{{ route('cities.create') }}" class="btn btn-primary btn-sm">
                        {{ __('back.add_city') }}
                    </a>
                @endcan
                <div class="d-flex align-items-center position-relative my-1 ms-4">
                    <input type="text" id="kt_filter_search"
                        class="form-control form-control-solid form-select-sm w-150px ps-3"
                        placeholder="{{ __('back.search_city') }}" />
                </div>
            </div>
        </div>

        <!-- Card Body -->
        <div class="card-body pt-0">
            <div class="table-responsive">
                <table class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">

                    <thead class="fs-7 text-gray-400 text-uppercase">
                        <tr>
                            <th class="min-w-50px">{{ __('back.id') }}</th>
                            <th class="min-w-200px">{{ __('back.city_name') }}</th>
                            <th class="min-w-200px">{{ __('back.country') }}</th>
                            <th class="min-w-50px text-end">{{ __('back.actions') }}</th>
                        </tr>
                    </thead>

                    <tbody class="fs-6">
                        @foreach ($cities as $city)
                            <tr>
                                <td>{{ $city->id }}</td>
                                <td>{{ $city->name }}</td>
                                <td>{{ $city->country->name ?? '-' }}</td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end flex-shrink-0">
                                        @can('Update City')
                                            <a href="{{ route('cities.edit', $city->id) }}"
                                                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        @endcan
                                        @can('Delete City')
                                            <form class="d-inline" action="{{ route('cities.destroy', $city->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')

                                                <button type="button" onclick="destroy(event)"
                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <script>
        function destroy(e) {
            let url = e.target.closest('form').action;
            let row = e.target.closest('tr');

            Swal.fire({
                title: "{{ __('back.confirm_delete_title') }}",
                text: "{{ __('back.confirm_delete_text') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "{{ __('back.yes_delete') }}",
                cancelButtonText: "{{ __('back.cancel') }}"
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post(url, {
                            _method: 'delete'
                        })
                        .then(() => row.remove());
                }
            });
        }
    </script>
@endsection
