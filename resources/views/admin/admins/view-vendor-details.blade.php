@extends('admin.layout.layout')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">

                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">

                            <h3 class="font-weight-bold">view Vendor Details</h3>
                            {{-- <h6 class="font-weight-normal mb-0">Update Admin Password</h6> --}}
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="justify-content-end d-flex">
                                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button"
                                        id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="true">
                                        <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                        <a class="dropdown-item" href="#">January - March</a>
                                        <a class="dropdown-item" href="#">March - June</a>
                                        <a class="dropdown-item" href="#">June - August</a>
                                        <a class="dropdown-item" href="#">August - November</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
       
                <div class="row">
                    {{-- personal information display --}}
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Personal information</h4>
                                
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Email</label>
                                        <input type="text" class="form-control"
                                            value="{{ $vendorDetails->vendorPersonal->email }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="vendor_name">Name</label>
                                        <input type="text" name="vendor_name" class="form-control" id="vendor_name"
                                            placeholder="Enter Name" value="{{$vendorDetails->vendorPersonal->name }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_address">Address</label>
                                        <input type="text" name="vendor_address" class="form-control" id="vendor_address"
                                            placeholder="Enter Address" value="{{$vendorDetails->vendorPersonal->address }}" readonly>
                                     
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_city">City</label>
                                        <input type="text" name="vendor_city" class="form-control" id="vendor_city"
                                            placeholder="Enter city" value="{{$vendorDetails->vendorPersonal->city }}" readonly>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_state">State</label>
                                        <input type="text" name="vendor_state" class="form-control" id="vendor_state"
                                            placeholder="Enter State" value="{{$vendorDetails->vendorPersonal->state }}" readonly>
                                      
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_country">Country</label>
                                        <input type="text" name="vendor_country" class="form-control" id="vendor_country"
                                            placeholder="Enter Country" value="{{$vendorDetails->vendorPersonal->country }}" readonly>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_pincode">Pincode</label>
                                        <input type="text" name="vendor_pincode" class="form-control" id="vendor_pincode"
                                            placeholder="Enter Pincode" value="{{$vendorDetails->vendorPersonal->pincode}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="admin_mobile">Mobile</label>
                                        <input type="text" name="vendor_mobile" class="form-control" id="admin_mobile"
                                            placeholder="Enter Current Password"
                                            value="{{$vendorDetails->vendorPersonal->mobile }}" readonly>
                                        
                                    </div>

                                    @if (!@empty($vendorDetails->image))
                                    <div class="form-group">
                                        <label for="vendor_image">image</label>
                                        <br>
                                            <img
                                            src="{{ url('admin/images/photos/' . $vendorDetails->image) }}" width="100px;" height="100px;">
                                    </div>
                                    @endif

                            
                            </div>
                        </div>
                    </div>

                    {{-- Business information display --}}
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Business information</h4>
                                
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Shop Name</label>
                                        <input type="text" class="form-control"
                                            value="{{ $vendorDetails->vendorBusiness->shop_name }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="vendor_name">Shop Address</label>
                                        <input type="text" name="vendor_name" class="form-control" id="vendor_name"
                                            placeholder="Enter Name" value="{{$vendorDetails->vendorBusiness->shop_address }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_address">Shop City</label>
                                        <input type="text" name="vendor_address" class="form-control" id="vendor_address"
                                            placeholder="Enter Address" value="{{$vendorDetails->vendorBusiness->shop_city }}" readonly>
                                     
                                    </div>
                                 
                                    <div class="form-group">
                                        <label for="vendor_state">Shop State</label>
                                        <input type="text" name="vendor_state" class="form-control" id="vendor_state"
                                            placeholder="Enter State" value="{{$vendorDetails->vendorBusiness->shop_state }}" readonly>
                                      
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_country">Shop Country</label>
                                        <input type="text" name="vendor_country" class="form-control" id="vendor_country"
                                            placeholder="Enter Country" value="{{$vendorDetails->vendorBusiness->shop_country }}" readonly>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_pincode">Shop Pincode</label>
                                        <input type="text" name="vendor_pincode" class="form-control" id="vendor_pincode"
                                            placeholder="Enter Pincode" value="{{$vendorDetails->vendorBusiness->shop_pincode}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="admin_mobile">Shop Website</label>
                                        <input type="text" name="vendor_mobile" class="form-control" id="admin_mobile"
                                            placeholder="Enter Current Password"
                                            value="{{$vendorDetails->vendorBusiness->shop_website }}" readonly>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="admin_mobile">Shop Email</label>
                                        <input type="text" name="vendor_mobile" class="form-control" id="admin_mobile"
                                            placeholder="Enter Current Password"
                                            value="{{$vendorDetails->vendorBusiness->shop_email }}" readonly>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="admin_mobile">Address Proof</label>
                                        <input type="text" name="vendor_mobile" class="form-control" id="admin_mobile"
                                            placeholder="Enter Current Password"
                                            value="{{$vendorDetails->vendorBusiness->address_proof }}" readonly>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="admin_mobile">Address Proof Image</label>
                                        <br>
                                            <img
                                            src="{{ url('admin/images/proofs/'.$vendorDetails->vendorBusiness->address_proof_image) }}" width="100px;" height="100px">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="admin_mobile">Business License Number</label>
                                        <input type="text" name="vendor_mobile" class="form-control" id="admin_mobile"
                                            placeholder="Enter Current Password"
                                            value="{{$vendorDetails->vendorBusiness->business_license_number }}" readonly>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="admin_mobile">GST Number</label>
                                        <input type="text" name="vendor_mobile" class="form-control" id="admin_mobile"
                                            placeholder="Enter Current Password"
                                            value="{{$vendorDetails->vendorBusiness->gst_number }}" readonly>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="admin_mobile">PAN Number</label>
                                        <input type="text" name="vendor_mobile" class="form-control" id="admin_mobile"
                                            placeholder="Enter Current Password"
                                            value="{{$vendorDetails->vendorBusiness->pan_number }}" readonly>
                                        
                                    </div>


                            
                            </div>
                        </div>
                    </div>

                    {{-- Bank information display --}}
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Bank information</h4>
                                
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Account Holder Name</label>
                                        <input type="text" class="form-control"
                                            value="{{ $vendorDetails->vendorBank->account_holder_name }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="vendor_address">Bank Name</label>
                                        <input type="text" name="vendor_address" class="form-control" id="vendor_address"
                                            placeholder="Enter Address" value="{{$vendorDetails->vendorBank->bank_name }}" readonly>
                                     
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_city">Account Number</label>
                                        <input type="text" name="vendor_city" class="form-control" id="vendor_city"
                                            placeholder="Enter city" value="{{$vendorDetails->vendorBank->account_number}}" readonly>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_state">Swift Code</label>
                                        <input type="text" name="vendor_state" class="form-control" id="vendor_state"
                                            placeholder="Enter State" value="{{$vendorDetails->vendorBank->swift_code }}" readonly>
                                      
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

             
            {{-- end form --}}

        </div>
        @include('admin.layout.footer')
    @endsection
