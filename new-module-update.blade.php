<div>
    <form wire:submit.prevent="update">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <strong>VENDORS/CUSTOMERS<small> - UPDATE</small></strong>
                    <div>
                        <a class="btn btn-secondary" href="{{ route('vendor-customer-type.read',$vendor_customer->id) }}">
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
                                            <label class="col-md-3 col-form-label" for="code">Code<span style="color: red;"> *</span></label>
                                            <div class="col-md-9">
                                                <input class="form-control @error('code') is-invalid @enderror" id="code" type="text" wire:model.defer="code" />
                                                @error('code') 
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="name" class="col-md-3 col-form-label">Name<span style="color: red"> *</span></label>
                                            <div class="col-md-9">
                                                <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" placeholder="Enter name" wire:model.defer="name" autofocus />
                                                @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="name" class="col-md-3 col-form-label">Type<span style="color: red"> *</span></label>
                                            <div class="col-md-9">
                                                <select class="form-select @error('vendor_customer_type') is-invalid @enderror" type="text" id="vendor_customer_type" placeholder="Select Chart Of Account Group" wire:model.defer="vendor_customer_type" autofocus>
                                                    <option value="">Please Select</option>
                                                    @foreach ($vendor_customer_types as $vendor_customer_type)
                                                    <option value="{{$vendor_customer_type->id}}">{{$vendor_customer_type->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('vendor_customer_type') 
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="bank-name" class="col-md-3 col-form-label">Bank Name</label>
                                            <div class="col-md-9">
                                                <input
                                                class="form-control"
                                                wire:model.defer="bank_name"
                                                type="text"/>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="bank-account-number" class="col-md-3 col-form-label">Bank Account Number</label>
                                            <div class="col-md-9">
                                                <input
                                                class="form-control"
                                                wire:model.defer="bank_account_number"
                                                type="text"/>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="bank-account-number" class="col-md-3 col-form-label">TIN<span style="color: red"> *</span></label>
                                            <div class="col-md-9">
                                                <input class="form-control" x-data x-mask="999-999-999-999" placeholder="000-000-000-000" wire:model.defer="tin">
                                                <!-- <input  class="form-control tin-mask" type='text' id="tin_num" placeholder="Enter TIN Number" wire:model.defer="tin"> -->
                                                <!-- <input type="hidden" name="tin_num" wire:model.defer="tin"/> -->
                                                @error('tin')
                                                <span class="text-danger">
                                                    {{$message}}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="bank-account-number" class="col-md-3 col-form-label">Terms<span style="color: red"> *</span></label>
                                            <div class="col-md-9">
                                            <div class="input-group">
                                                <input pattern=" 0+\.[0-9]*[1-9][0-9]*$" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" 
                                                class="form-control text-end" wire:model="terms" type="number"><span class="input-group-text">day/s</span>
                                            </div>
                                                @error('terms')
                                                <span class="text-danger">
                                                    {{$message}}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>   
                                        <div class="mb-3 row">
                                            <label for="active" class="col-md-3 col-form-label">Active?<span style="color: red">*</span></label>
                                            <div class="col-md-9">
                                                <select class="form-select @error('active') is-invalid @enderror" type="text" id="active" placeholder="" wire:model.defer="active" autofocus>
                                                    <option value="">Please Select</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                                @error('active')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ==================== CONTACT INFORMATION TAB ==================== -->
                                    <div wire:ignore.self class="tab-pane" class="tab-pane " id="contact-information-tab" role="tabpanel">
                                        <div class="mb-3 row">
                                            <label class="col-md-3 col-form-label" for="code">Mobile</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" wire:model.defer="contact_mobile" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-md-3 col-form-label" for="code">Landline</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" wire:model.defer="contact_landline" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-md-3 col-form-label">Email Address</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" wire:model.defer="contact_email" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-md-3 col-form-label">Website</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" wire:model.defer="contact_website" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-md-3 col-form-label">Contact Person</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" wire:model.defer="contact_person" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-md-3 col-form-label">Contact Role</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" wire:model.defer="contact_role" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ==================== LOCATION TAB ==================== -->
                                    <div wire:ignore.self class="tab-pane" class="tab-pane " id="location-tab" role="tabpanel">
                                        <div class="mb-3 row">
                                            <label class="col-md-3 col-form-label" for="code">Unit/Bldg #</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" wire:model.defer="address_number" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-md-3 col-form-label" for="code">Street</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" wire:model.defer="address_street" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-md-3 col-form-label">Barangay</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" wire:model.defer="address_barangay" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-md-3 col-form-label">City</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" wire:model.defer="address_city" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-md-3 col-form-label">Province</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" wire:model.defer="address_province" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-md-3 col-form-label">Country</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" wire:model.defer="address_country" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-md-3 col-form-label">Zip Code</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" wire:model.defer="address_zip_code" />
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
                                    <textarea class="form-control @error('remarks') is-invalid @enderror" rows="4" type="text" id="remarks" placeholder="Enter remarks" wire:model.defer="remarks" autofocus></textarea>
                                    @error('remarks') 
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="d-flex justify-content-center mt-3 pb-4">
            <button class="btn btn-success text-white">
            <span class="cil-save btn-icon"></span>
                <span class='btn-text'>Update</span>
            </button>
            </div>
    </form>
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
