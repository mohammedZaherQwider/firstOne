@extends('back_end.layout.app')

@section('content')
    <div class="card card-flush mt-6 mt-xl-9">

        <!-- Card Header -->
        <div class="card-header mt-5">
            <div class="card-title flex-column">
                <h3 class="fw-bolder mb-1">Specializations</h3>
            </div>

            <div class="card-toolbar my-1">
                <a href="{{ route('specializations.create') }}" class="btn btn-primary btn-sm">
                    Add Specialization
                </a>

                <div class="d-flex align-items-center position-relative my-1 ms-4">
                    <input type="text" id="kt_filter_search"
                        class="form-control form-control-solid form-select-sm w-150px ps-3"
                        placeholder="Search Specialization" />
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
                            <th class="min-w-200px">Specialization Name</th>
                            <th class="min-w-50px text-end">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="fs-6">
                        @foreach ($specializations as $specialization)
                            <tr>
                                <td>{{ $specialization->id }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-45px me-5">
                                            <img src="{{ asset('uploads/specializations/' . ($specialization->image?->image ?? 'default.jpg')) }}"
                                                alt="Specialization Image" />
                                        </div>
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">
                                                {{ $specialization->name }}</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end flex-shrink-0">

                                        <a href="{{ route('specializations.edit', $specialization->id) }}"
                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form class="d-inline"
                                            action="{{ route('specializations.destroy', $specialization->id) }}"
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
                title: 'Are you sure?',
                text: "You won't be able to undo this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
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
