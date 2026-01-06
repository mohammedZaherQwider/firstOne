@extends('back_end.layout.app')

@section('content')
    <div class="card card-flush mt-6 mt-xl-9">

        <!-- Card Header -->
        <div class="card-header mt-5">
            <div class="card-title flex-column">
                <h3 class="fw-bolder mb-1">Contents</h3>
            </div>

            <div class="card-toolbar my-1">
                <a href="{{ route('contents.create') }}" class="btn btn-primary btn-sm">
                    Add Content
                </a>

                <div class="d-flex align-items-center position-relative my-1 ms-4">
                    <input type="text" id="kt_filter_search"
                        class="form-control form-control-solid form-select-sm w-150px ps-3"
                        placeholder="Search Content" />
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
                            <th class="min-w-80px">Image</th>
                            <th class="min-w-200px">Title</th>
                            <th class="min-w-200px">Type | Link</th>
                            <th class="min-w-150px">Created At</th>
                            <th class="min-w-50px text-end">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="fs-6">
                        @foreach ($contents as $content)
                            @php
                                $contentImage = $content->image->image ?? 'default.jpg';
                            @endphp

                            <tr>
                                <td>{{ $content->id }}</td>

                                <td>
                                    <div style="width:48px;height:48px;border-radius:8px;overflow:hidden;">
                                        <img
                                            src="{{ asset('uploads/contents/' . $contentImage) }}"
                                            alt="{{ $content->title }}"
                                            style="width:100%;height:100%;object-fit:cover;display:block;"
                                        >
                                    </div>
                                </td>

                                <td>{{ $content->title }}</td>

                                <td>
                                    @if ($content->link == "why_choose_us" || $content->link == "hospital_criteria" || $content->link == "blog")
                                        {{ $content->link }}
                                    @else
                                        <a href="{{ $content->link }}" target="_blank">{{ $content->link }}</a>

                                    @endif
                                </td>

                                <td>{{ $content->created_at?->format('Y-m-d H:i') ?? '-' }}</td>

                                <td class="text-end">
                                    <div class="d-flex justify-content-end flex-shrink-0">

                                        <a href="{{ route('contents.edit', $content->id) }}"
                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form class="d-inline" action="{{ route('contents.destroy', $content->id) }}"
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
