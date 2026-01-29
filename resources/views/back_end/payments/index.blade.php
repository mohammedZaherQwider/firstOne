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
                                        <form class="d-inline" action="{{ route('payments.destroy', $payment->id) }}"
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
