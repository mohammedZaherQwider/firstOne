@extends('back_end.layout.app')

@section('content')
    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <div class="card-body p-lg-17">
                <form
                    action="{{ isset($operation) ? route('operations.update', $operation->id) : route('operations.store') }}" " method="POST" enctype="multipart/form-data" id="operationForm">
                                        @csrf
                                        @if (isset($operation))
                    @method('PUT')
                    @endif
                    <h1 class="fw-bolder text-dark mb-9">{{ __('back.add_operation') }}</h1>

                    <div class="row mb-5">
                        <input type="hidden" name="id" value="{{ $operation->id ?? '' }}">
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.patient_name') }}</label>
                            <input type="text" class="form-control form-control-solid" name="name"
                                value="{{ $operation->name ?? '' }}">
                            @error('name')
                                <div class="form-error">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.patient_id') }}</label>
                            <input type="text" class="form-control form-control-solid" name="id_patient"
                                value="{{ $operation->id_patient ?? '' }}">
                            @error('id_patient')
                                <div class="form-error">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!-- Specialization -->
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.specialization') }}</label>
                            <select name="specialization_id" class="form-control form-control-solid">
                                <option disabled {{ !isset($operation) ? 'selected' : '' }}>{{ __('back.select_specialization') }}  </option>
                                @foreach ($specializations as $specialization)
                                    <option value="{{ $specialization->id }}"
                                        {{ isset($operation) && $operation->specialization_id == $specialization->id ? 'selected' : '' }}>
                                        {{ $specialization->name }}
                                    </option>
                                @endforeach
                                @error('specialization_id')
                                    <div class="form-error">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </select>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <!-- doctor -->
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.doctor') }}</label>
                            <select name="doctor_id" class="form-control form-control-solid">
                                <option disabled {{ !isset($operation) ? 'selected' : '' }}>{{ __('back.select_doctor') }}  </option>
                                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}"
                                        {{ isset($operation) && $operation->doctor_id == $doctor->id ? 'selected' : '' }}>
                                        {{ $doctor->name }}
                                    </option>
                                @endforeach
                                @error('doctor_id')
                                    <div class="form-error">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </select>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <!-- Hospital -->
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.hospital') }}</label>
                            <select name="hospital_id" class="form-control form-control-solid">
                                <option disabled {{ !isset($operation) ? 'selected' : '' }}>{{ __('back.select_hospital') }}  </option>
                                @foreach ($hospitals as $hospital)
                                    <option value="{{ $hospital->id }}"
                                        {{ isset($operation) && $operation->hospital_id == $hospital->id ? 'selected' : '' }}>
                                        {{ $hospital->name }}
                                    </option>
                                @endforeach
                                @error('hospital_id')
                                    <div class="form-error">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </select>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.operation_name') }}</label>
                            <input type="text" class="form-control form-control-solid" name="operation_name"
                                value="{{ $operation->operation_name ?? '' }}">
                            @error('operation_name')
                                <div class="form-error">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.operation_date') }}</label>
                            <input type="date" class="form-control form-control-solid" name="operation_date"
                                value="{{ $operation->operation_date ?? '' }}">
                            @error('operation_date')
                                <div class="form-error">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.operation_time') }}</label>
                            <input type="time" class="form-control form-control-solid" name="operation_date_time"
                                value="{{ $operation->operation_date_time ?? '' }}">
                            @error('operation_date_time')
                                <div class="form-error">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="col-12 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2"> {{ __('back.operation_duration') }}</label>

                            <input type="number" name="operation_schedule" class="form-control form-control-solid"
                                placeholder="ex: 45" min="1" value="{{ $operation->operation_schedule ?? '' }}">
                            @error('operation_schedule')
                                <div class="form-error">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.status') }}</label>
                            <select name="status" class="form-control form-control-solid">
                                <option disabled {{ !isset($operation) ? 'selected' : '' }}> {{ __('back.select_status') }}</option>
                                <option value="scheduled"
                                    {{ isset($operation) && $operation->status == 'scheduled' ? 'selected' : '' }}>
                                    {{ __('back.scheduled') }}</option>
                                <option value="done"
                                    {{ isset($operation) && $operation->status == 'done' ? 'selected' : '' }}>{{ __('back.done') }}</option>
                                <option value="cancelled"
                                    {{ isset($operation) && $operation->status == 'cancelled' ? 'selected' : '' }}>
                                    {{ __('back.cancelled') }}</option>
                                @error('status')
                                    <div class="form-error">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </select>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.price') }}</label>
                            <input type="number" step="0.01" class="form-control form-control-solid" name="price"
                                value="{{ $operation->price ?? '' }}" placeholder="Enter price">
                            @error('price')
                                <div class="form-error">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="col-12 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2 d-block">{{ __('back.pay') }}</label>

                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                <input type="checkbox" name="pay" class="form-check-input" value="1"
                                    {{ isset($operation) && $operation->pay ? 'checked' : '' }}>
                                @error('pay')
                                    <div class="form-error">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <span class="form-check-label">{{ __('back.paid') }} ?</span>
                            </label>

                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="col-12 fv-row mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.currency') }}</label>

                            <select name="currency" class="form-control form-control-solid">
                                <option value="USD"
                                    {{ isset($operation) && $operation->currency == 'USD' ? 'selected' : '' }}>USD
                                </option>
                                <option value="ILS"
                                    {{ isset($operation) && $operation->currency == 'ILS' ? 'selected' : '' }}>EUR
                                </option>
                                <option value="JOD"
                                    {{ isset($operation) && $operation->currency == 'JOD' ? 'selected' : '' }}>JOD
                                </option>
                                @error('currency')
                                    <div class="form-error">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </select>

                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>


                        <!-- report -->
                        <div class="col-12 fv-row fv-plugins-icon-container mb-3">
                            <label class="fs-5 fw-bold mb-2">{{ __('back.report') }}</label>
                            <textarea class="form-control form-control-solid" rows="6" name="report">{{ $operation->report ?? '' }}</textarea>
                            @error('report')
                                <div class="form-error">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary" id="kt_contact_submit_button">
                        <span class="indicator-label">{{ __('back.save') }}</span>
                        <span class="indicator-progress"> {{ __('back.please_wait') }}
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
