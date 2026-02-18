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
                <h3 class="fw-bolder mb-1">{{ __('back.payments') }}</h3>
            </div>

            <div class="card-toolbar my-1">
                <div class="d-flex align-items-center position-relative my-1 ms-4">
                    <input type="text" id="kt_filter_search"
                        class="form-control form-control-solid form-select-sm w-150px ps-3"
                        placeholder="{{ __('back.search_payment') }}" />
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
                            <th class="min-w-150px">{{ __('back.offer') }}</th>
                            <th class="min-w-100px">{{ __('back.amount') }}</th>
                            <th class="min-w-80px">{{ __('back.currency') }}</th>
                            <th class="min-w-150px">{{ __('back.payment_method') }}</th>
                            <th class="min-w-150px">{{ __('back.transaction_id') }}</th>
                            <th class="min-w-100px">{{ __('back.status') }}</th>
                            <th class="min-w-150px">{{ __('back.paid_at') }}</th>
                            <th class="min-w-150px">{{ __('back.created_at') }}</th>
                            <th class="min-w-150px">{{ __('back.updated_at') }}</th>
                            <th class="min-w-50px text-end">{{ __('back.actions') }}</th>
                        </tr>
                    </thead>

                    <tbody class="fs-6">
                        @foreach ($payments as $payment)
                            <tr>
                                <td>{{ $payment->id }}</td>
                                <td>{{ $payment->offer->name ?? '-' }}</td>
                                <td>{{ $payment->amount }}</td>
                                <td>{{ $payment->currency }}</td>
                                <td>{{ $payment->payment_method }}</td>
                                <td>{{ $payment->transaction_id }}</td>
                                <td>{{ ucfirst($payment->status) }}</td>
                                <td>
                                    {{ $payment->paid_at ? \Carbon\Carbon::parse($payment->paid_at)->format('Y-m-d H:i') : '-' }}
                                </td>
                                <td>{{ $payment->created_at->format('Y-m-d H:i') }}</td>
                                <td>{{ $payment->updated_at->format('Y-m-d H:i') }}</td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end flex-shrink-0">
                                        @can('Delete Payment')
                                            <form class="d-inline" action="{{ route('payments.destroy', $payment->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="button" onclick="destroy(event)"
                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none">
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
                title: '{{ __('back.confirm_delete') }}',
                text: "{{ __('back.delete_warning') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '{{ __('back.yes_delete') }}',
                cancelButtonText: '{{ __('back.cancel') }}'
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
