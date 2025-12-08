  <!--begin::Modal - New Target-->
  <div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
      <!--begin::Modal dialog-->
      <div class="modal-dialog modal-dialog-centered mw-650px">
          <!--begin::Modal content-->
          <div class="modal-content rounded">
              <!--begin::Modal header-->
              <div class="modal-header pb-0 border-0 justify-content-end">
                  <!--begin::Close-->
                  <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                      <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                      <span class="svg-icon svg-icon-1">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none">
                              <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                  transform="rotate(-45 6 17.3137)" fill="black" />
                              <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                  transform="rotate(45 7.41422 6)" fill="black" />
                          </svg>
                      </span>
                      <!--end::Svg Icon-->
                  </div>
                  <!--end::Close-->
              </div>
              <!--begin::Modal header-->
              <!--begin::Modal body-->
              <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                  <!--begin:Form-->
                  <form id="kt_modal_new_target_form" class="form" action="{{ route('hospitals.store') }}"
                      method="POST">
                      @csrf
                      <!--begin::Heading-->
                      <div class="mb-13 text-center">
                          <!--begin::Title-->
                          <h1 class="mb-3">Set First Hospital</h1>
                          <!--end::Title-->
                      </div>
                      <!--end::Heading-->
                      <!--begin::Input group-->
                      <div class="d-flex flex-column mb-8 fv-row">
                          <!--begin::Label-->
                          <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                              <span class="required">Hospital Title</span>
                              <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                  title="Specify a target name for future usage and reference"></i>
                          </label>
                          <!--end::Label-->
                          <input type="text" class="form-control form-control-solid"
                              placeholder="Enter Hospital Name" name="name" id="name" />
                          @error('name')
                              <div class="form-error">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>
                      <!--end::Input group-->
                      <!--begin::Input group-->
                      <div class="row g-9 mb-8">
                          <!--begin::Col-->
                          <div class="col-md-6 fv-row">
                              <label class="required fs-6 fw-bold mb-2">Country</label>
                              <select id="country_id" class="form-select form-select-solid" ... name="country_id">
                                  <option value="">Select country...</option>
                                  @foreach ($countries as $country)
                                      <option value="{{ $country->id }}">{{ $country->name }}</option>
                                  @endforeach
                                  @error('country_id')
                                      <div class="form-error">
                                          {{ $message }}
                                      </div>
                                  @enderror
                              </select>
                          </div>
                          <div class="col-md-6 fv-row">
                              <label class="required fs-6 fw-bold mb-2">City</label>
                              <select id="city_id" class="form-select form-select-solid" ... name="city_id">
                                  <option value="">Select City...</option>
                              </select>
                              @error('city_id')
                                  <div class="form-error">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>
                          <!--end::Col-->
                      </div>
                      <div class="d-flex flex-column mb-8 fv-row">
                          <!--begin::Label-->
                          <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                              <span class="required">Bed Number</span>
                              <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                  title="Specify a target name for future usage and reference"></i>
                          </label>
                          <!--end::Label-->
                          <input type="number" class="form-control form-control-solid"
                              placeholder="Enter Bed Number in Hospital" name="bed_number" id="bed_number" />
                          @error('bed_number')
                              <div class="form-error">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>
                      <div id="services-wrapper">
                          <div class="service-item d-flex mb-3 align-items-center">
                              <input type="text" name="services[0][name]" placeholder="Service Name"
                                  class="form-control me-2">
                              @error('services[0][name]')
                                  <div class="form-error">
                                      {{ $message }}
                                  </div>
                              @enderror

                              <select name="services[0][type]" class="form-select me-2">
                                  <option value="in">In</option>
                                  <option value="out">Out</option>
                              </select>

                              <select id="service-icon" name="services[0][icon]" class="form-select">
                                  <option value="@" data-icon="fas fa-hospital">
                                      <i> @</i>
                                  </option>
                                  <option value="%" data-icon="fas fa-hospital">
                                      <i> %</i>
                                  </option>
                                  <option value="$" data-icon="fas fa-hospital">
                                      <i> $</i>
                                  </option>
                                  <option value="&" data-icon="fas fa-hospital">
                                      <i> &</i>
                                  </option>
                              </select>
                              <button type="button" class="btn btn-success btn-add-service">
                                  <i class="fa fa-plus"></i></button>
                              @error('services[0][icon]')
                                  <div class="form-error">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>
                      </div>
                      <!--end::Input group-->
                      <!--begin::Input group-->
                      <div class="d-flex flex-column mb-8">
                          <label class="fs-6 fw-bold mb-2">Description</label>
                          <textarea class="form-control form-control-solid" rows="3" id="description" name="description"
                              placeholder="Enter Description"></textarea>
                      </div>
                      <!--end::Input group-->

                      <!--begin::Actions-->
                      <div class="text-center">
                          <button type="reset" id="kt_modal_new_target_cancel"
                              class="btn btn-light me-3">Cancel</button>
                          <button id="saveHospitalBtn" class="btn btn-primary">
                              <span class="indicator-label">Submit</span>
                          </button>
                      </div>
                      <!--end::Actions-->
                  </form>
                  <!--end:Form-->
              </div>
              <!--end::Modal body-->
          </div>
          <!--end::Modal content-->
      </div>
      <!--end::Modal dialog-->
  </div>
  <!--end::Modal - New Target-->
  <script>
      $('#country_id').on('change', function() {
          var countryId = $(this).val();
          if (countryId) {
              $.ajax({
                  url: '/cities/' + countryId,
                  type: "GET",
                  dataType: "json",
                  success: function(data) {
                      $('#city_id').empty();
                      $('#city_id').append('<option value="">Select City...</option>');
                      $.each(data, function(key, value) {
                          $('#city_id').append('<option value="' + value.id + '">' + value
                              .name + '</option>');
                      });
                      $('#city_id').trigger('change');
                  }
              });
          } else {
              $('#city_id').empty();
              $('#city_id').append('<option value="">Select City...</option>');
              $('#city_id').trigger('change');
          }
      });
  </script>
  <script>
      let serviceIndex = 1;

      $(document).on('click', '.btn-add-service', function() {
          const newService = `
    <div class="service-item d-flex mb-3 align-items-center">
        <input type="text" name="services[${serviceIndex}][name]" placeholder="Service Name" class="form-control me-2">

        <select name="services[${serviceIndex}][type]" class="form-select me-2">
            <option value="in">In</option>
            <option value="out">Out</option>
        </select>

        <select name="services[${serviceIndex}][icon]" class="form-select me-2">
            <option value="fa-hospital" data-icon="fas fa-hospital">
                                      <i> @</i>
                                  </option>
                                  <option value="fa-hospital" data-icon="fas fa-hospital">
                                      <i> %</i>
                                  </option>
                                  <option value="fa-hospital" data-icon="fas fa-hospital">
                                      <i> $</i>
                                  </option>
                                  <option value="fa-hospital" data-icon="fas fa-hospital">
                                      <i> &</i>
                                  </option>
        </select>

        <button type="button" class="btn btn-danger btn-remove-service"><i>-</i></button>
    </div>
    `;
          $('#services-wrapper').append(newService);
          serviceIndex++;
      });

      $(document).on('click', '.btn-remove-service', function() {
          $(this).closest('.service-item').remove();
      });
  </script>
  <script>
      $('#saveHospitalBtn').click(function(e) {
          e.preventDefault();
          let services = [];
          $('.service-item').each(function() {
              let name = $(this).find('input[name*="[name]"]').val();
              let type = $(this).find('select[name*="[type]"]').val();
              let icon = $(this).find('select[name*="[icon]"]').val();

              if (name) {
                  services.push({
                      name: name,
                      type: type,
                      icon: icon
                  });
              }
          });

          let formData = {
              name: $('#name').val(),
              country_id: $('#country_id').val(),
              city_id: $('#city_id').val(),
              bed_number: $('#bed_number').val(),
              description: $('#description').val(),
              services: services,
              _token: "{{ csrf_token() }}"
          };
          $.ajax({
              url: "{{ route('hospitals.store') }}",
              type: "POST",
              data: formData,
              success: function(response) {
                  console.log("Saved:", response);
                //   $('#myTable').DataTable().ajax.reload(null, false);
                  var modal = bootstrap.Modal.getInstance(document.getElementById(
                      'kt_modal_new_target'));
                  modal.hide();
                  Swal.fire({
                      icon: 'success',
                      title: 'Added ',
                      text: 'Hospital created successfully.',
                      timer: 2000,
                      showConfirmButton: false
                  });
              },
              error: function(xhr) {
                  console.log(xhr.responseText);
              }
          });
      });
  </script>
