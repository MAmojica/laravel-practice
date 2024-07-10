<div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <strong>VENDORS/CUSTOMERS<small> - SHOW</small></strong>
                </div>
                <div>
                    <a class="btn btn-secondary" href="{{route('vendor-customer-type.index')}}">
                    <span class="bi bi-arrow-left"></span>
                        <span class='btn-text'>Back</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row p-3">
            <!-- ==================== VENDOR CUSTOMER DETAILS ==================== -->
            <div class="col-lg-12 col-xl-6">
                <div class="card m-2">
                    <div class="card-body">
                        <div class="nav-tabs-boxed pb-3">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a wire:ignore.self class="nav-link active" data-coreui-toggle="tab" href="#vendor-customer-tab" role="tab" aria-controls="vendor-customer-tab">Vendor/Customer Details</a>
                                </li>
                                <li class="nav-item">
                                    <a wire:ignore.self class="nav-link" data-coreui-toggle="tab" href="#contact-information-tab" role="tab" aria-controls="contact-information-tab">Contact Information</a>
                                </li>
                                <li class="nav-item">
                                    <a wire:ignore.self class="nav-link" data-coreui-toggle="tab" href="#location-tab" role="tab" aria-controls="location-tab">Location</a>
                                </li>
                            </ul>
                            <div class="tab-content p-3">
                                <!-- ==================== VENDOR CUSTOMER  TAB ==================== -->
                                <div wire:ignore.self class="tab-pane active" class="tab-pane " id="vendor-customer-tab" role="tabpanel">
                                    <div class="mb-3 row">
                                        <label class="col-md-3 col-form-label" for="code">Code</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="code" type="text" wire:model.defer="code" disabled="disabled" />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="name" class="col-md-3 col-form-label">Name</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" id="name" placeholder="Enter name" wire:model.defer="name" autofocus disabled="disabled" />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="name" class="col-md-3 col-form-label">Type</label>
                                        <div class="col-md-9">
                                            <select class="form-select" type="text" id="vendor_customer_type" placeholder="Select Chart Of Account Group" wire:model.defer="vendor_customer_type" autofocus disabled="disabled">
                                                <option value="">Please Select</option>
                                                @foreach ($vendor_customer_types as $vendor_customer_type)
                                                <option value="{{$vendor_customer_type->id}}">{{$vendor_customer_type->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="bank-name" class="col-md-3 col-form-label">Bank Name</label>
                                        <div class="col-md-9">
                                            <input class="form-control" wire:model.defer="bank_name" type="text" disabled="disabled" />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="bank-account-number" class="col-md-3 col-form-label">Bank Account Number</label>
                                        <div class="col-md-9">
                                            <input class="form-control" wire:model.defer="bank_account_number" type="text" disabled="disabled" />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="bank-account-number" class="col-md-3 col-form-label">TIN</label>
                                        <div class="col-md-9">
                                            <input class="form-control" x-data x-mask="999-999-999-999" placeholder="000-000-000-000" wire:model.defer="tin" disabled="disabled">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="bank-account-number" class="col-md-3 col-form-label">Terms</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <input class="form-control text-end" wire:model="terms" type="number" disabled="disabled"><span class="input-group-text">day/s</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="active" class="col-md-3 col-form-label">Active?</label>
                                        <div class="col-md-9">
                                            <select class="form-select @error('active') is-invalid @enderror" type="text" id="active" placeholder="" wire:model.defer="active" disabled>
                                                <option value="">Please Select</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- ==================== CONTACT INFORMATION TAB ==================== -->
                                <div wire:ignore.self class="tab-pane" class="tab-pane " id="contact-information-tab" role="tabpanel">
                                    <div class="mb-3 row">
                                        <label class="col-md-3 col-form-label" for="code">Mobile</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" wire:model.defer="contact_mobile" disabled="disabled" />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-3 col-form-label" for="code">Landline</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" wire:model.defer="contact_landline" disabled="disabled" />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-3 col-form-label">Email Address</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" wire:model.defer="contact_email" disabled="disabled" />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-3 col-form-label">Website</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" wire:model.defer="contact_website" disabled="disabled" />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-3 col-form-label">Contact Person</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" wire:model.defer="contact_person" disabled="disabled" />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-3 col-form-label">Contact Role</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" wire:model.defer="contact_role" disabled="disabled" />
                                        </div>
                                    </div>
                                </div>
                                <!-- ==================== LOCATION TAB ==================== -->
                                <div wire:ignore.self class="tab-pane" class="tab-pane " id="location-tab" role="tabpanel">
                                    <div class="mb-3 row">
                                        <label class="col-md-3 col-form-label" for="code">Unit/Bldg #</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" wire:model.defer="address_number" disabled="disabled" />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-3 col-form-label" for="code">Street</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" wire:model.defer="address_street" disabled="disabled" />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-3 col-form-label">Barangay</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" wire:model.defer="address_barangay" disabled="disabled" />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-3 col-form-label">City</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" wire:model.defer="address_city" disabled="disabled" />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-3 col-form-label">Province</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" wire:model.defer="address_province" disabled="disabled" />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-3 col-form-label">Country</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" wire:model.defer="address_country" disabled="disabled" />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-3 col-form-label">Zip Code</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" wire:model.defer="address_zip_code" disabled="disabled" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ==================== REMARKS CARD ==================== -->
            <div class="col-md-6">
                <div class="card m-2">
                    <div class="card-header">
                        <strong>Remarks</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-group row mb-3">
                            <div class="col-md-12">
                                <textarea class="form-control" rows="4" type="text" id="remarks" placeholder="Enter remarks" wire:model.defer="remarks" autofocus disabled="disabled"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="d-flex justify-content-center mt-3 pb-4">
        <a href="{{ route('vendor-customer-type.update',$vendor_customer->id) }}" class="btn btn-info text-white me-2">
        <span class="bi bi-pencil-square"></span>
            <span class='btn-text'>Edit</span>
        </a>
        </div>
</div>
<style>
    .image-upload>input {
    display: none;
    }
    .image-upload img {
    width: 250px;
    height: 250px;
    cursor: pointer;
    }
    .btn-success {
    color: #fff;
    background-color: #2eb85c;
    border-color: #2eb85c;
    }
    @media (hover: hover),
    (-ms-high-contrast: none) {
    .btn-success:hover {
    color: #fff;
    background-color: #26994d;
    border-color: #248f48;
    }
    }
    .btn-success:focus,
    .btn-success.focus {
    color: #fff;
    background-color: #26994d;
    border-color: #248f48;
    box-shadow: 0 0 0 0.2rem rgba(77, 195, 116, 0.5);
    }
    .btn-success.disabled,
    .btn-success:disabled {
    color: #fff;
    background-color: #2eb85c;
    border-color: #2eb85c;
    }
    .btn-secondary {
    color: #4f5d73;
    background-color: #ced2d8;
    border-color: #ced2d8;
    }
    @media (hover: hover),
    (-ms-high-contrast: none) {
    .btn-secondary:hover {
    color: #4f5d73;
    background-color: #b9bec7;
    border-color: #b2b8c1;
    }
    }
    .btn-secondary:focus,
    .btn-secondary.focus {
    color: #4f5d73;
    background-color: #b9bec7;
    border-color: #b2b8c1;
    box-shadow: 0 0 0 0.2rem rgba(187, 192, 201, 0.5);
    }
    .btn-secondary.disabled,
    .btn-secondary:disabled {
    color: #4f5d73;
    background-color: #ced2d8;
    border-color: #ced2d8;
    }
    .nav-link {
    text-decoration: none;
    background-color: transparent;
    color: silver;
    }
    .nav-link.active {
    text-decoration: none;
    background-color: transparent;
    font-weight: bold;
    }
</style>