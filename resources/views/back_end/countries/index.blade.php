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
                <h3 class="fw-bolder mb-1">{{ __('back.countries') }}</h3>
            </div>

            <div class="card-toolbar my-1">
                <a href="{{ route('countries.create') }}" class="btn btn-primary btn-sm">
                    {{ __('back.add_country') }}
                </a>

                <div class="d-flex align-items-center position-relative my-1 ms-4">
                    <input type="text" class="form-control form-control-solid form-select-sm w-150px ps-3"
                        placeholder="{{ __('back.search_country') }}" />
                </div>
            </div>
        </div>

        <!-- Card Body -->
        <div class="card-body pt-0">
            <div class="table-responsive">
                <table class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">

                    <thead class="fs-7 text-gray-400 text-uppercase">
                        <tr>
                            <th class="min-w-50px">ID</th>
                            <th class="min-w-200px">{{ __('back.country_name') }}</th>
                            <th class="min-w-150px">{{ __('back.created_at') }}</th>
                            <th class="min-w-150px">{{ __('back.updated_at') }}</th>
                            <th class="min-w-50px text-end">{{ __('back.actions') }}</th>
                        </tr>
                    </thead>

                    <tbody class="fs-6">
                        @foreach ($countries as $country)
                            <tr>
                                <td>{{ $country->id }}</td>
                                <td>{{ $country->name }}</td>
                                <td>{{ $country->created_at->format('Y-m-d') }}</td>
                                <td>{{ $country->updated_at->format('Y-m-d') }}</td>

                                <td class="text-end">
                                    <div class="d-flex justify-content-end flex-shrink-0">

                                        <a href="{{ route('countries.edit', $country->id) }}"
                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form class="d-inline" action="{{ route('countries.destroy', $country->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')

                                            <button type="button" onclick="destroy(event)"
                                                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                <i class="bi bi-trash"></i>
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
