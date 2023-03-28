@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          
          @if (Session::has('success'))
                  <div class="alert alert-success">{{Session::get('success')}}</div>
              @endif
              @if (Session::has('fail'))
                  <div class="alert alert-danger">{{Session::get('fail')}}</div>
              @endif

          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">

              <h3 class="font-weight-bold">Update Vendor Details</h3>
              {{-- <h6 class="font-weight-normal mb-0">Update Admin Password</h6> --}}
            </div>
            <div class="col-12 col-xl-4">
             <div class="justify-content-end d-flex">
              <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
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

       {{-- form --}}
       {{-- personal details --}}
       @if ($slug == 'personal')
       <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Update Personal information</h4>
              <form class="forms-sample" action="{{url('admin/update-vendor-details/personal')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleInputUsername1">Vendor Username/Email</label>
                  <input type="text" class="form-control" value="{{Auth::guard('admin')->user()->email}}" readonly>
                </div>
                
                <div class="form-group">
                    <label for="vendor_name">Name</label>
                    <input type="text" name="vendor_name" class="form-control" id="vendor_name" placeholder="Enter Name" value="{{$vendorDetails->name}}" required>
                    <span class="text-danger">@error('vendor_name') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="vendor_address">Address</label>
                    <input type="text" name="vendor_address" class="form-control" id="vendor_address" placeholder="Enter Address" value="{{$vendorDetails->address}}" required>
                    <span class="text-danger">@error('vendor_address') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="vendor_city">City</label>
                    <input type="text" name="vendor_city" class="form-control" id="vendor_city" placeholder="Enter city" value="{{$vendorDetails->city}}" required>
                    <span class="text-danger">@error('vendor_city') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="vendor_state">State</label>
                    <input type="text" name="vendor_state" class="form-control" id="vendor_state" placeholder="Enter State" value="{{$vendorDetails->state}}" required>
                    <span class="text-danger">@error('vendor_state') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="vendor_country">Country</label>
                    <input type="text" name="vendor_country" class="form-control" id="vendor_country" placeholder="Enter Country" value="{{$vendorDetails->country}}" required>
                    <span class="text-danger">@error('vendor_country') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="vendor_pincode">Pincode</label>
                    <input type="text" name="vendor_pincode" class="form-control" id="vendor_pincode" placeholder="Enter Pincode" value="{{$vendorDetails->pincode}}" required>
                    <span class="text-danger">@error('vendor_pincode') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="admin_mobile">Mobile</label>
                    <input type="text" name="vendor_mobile" class="form-control" id="admin_mobile" placeholder="Enter Current Password" value="{{Auth::guard('admin')->user()->mobile}}" required>
                    <span class="text-danger">@error('admin_mobile') {{$message}} @enderror</span>
                </div>

                <div class="form-group">
                  <label for="vendor_image">image</label>
                  <input type="file" name="vendor_image" class="form-control file-upload-info" id="vendor_image" placeholder="Enter Current Password">
                 @if (!@empty(Auth::guard('admin')->user()->image))
                     <a target="_blank" href="{{url('admin/images/photos/'.Auth::guard('admin')->user()->image)}}">view image</a>
                     <input type="hidden" name="current_vendor_image" value="{{Auth::guard('admin')->user()->image}}">
                 @endif
              </div>
                

                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    
      {{-- business details --}}
       @elseif($slug == 'business')
       <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Update Business information</h4>
              <form class="forms-sample" action="{{url('admin/update-vendor-details/business')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleInputUsername1">Vendor Username/Email</label>
                  <input type="text" class="form-control" value="{{Auth::guard('admin')->user()->email}}" readonly>
                </div>
                
                <div class="form-group">
                    <label for="shop_name">Shop Name</label>
                    <input type="text" name="shop_name" class="form-control" id="shop_name" placeholder="Enter shop name" value="{{$vendorDetails->shop_name}}" required>
                    <span class="text-danger">@error('shop_name') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="shop_address">Shop Address</label>
                    <input type="text" name="shop_address" class="form-control" id="shop_address" placeholder="Enter shop address" value="{{$vendorDetails->shop_address}}" required>
                    <span class="text-danger">@error('shop_address') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="shop_city">Shop City</label>
                    <input type="text" name="shop_city" class="form-control" id="shop_city" placeholder="Enter shop city" value="{{$vendorDetails->shop_city}}" required>
                    <span class="text-danger">@error('shop_city') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="shop_state">Shop State</label>
                    <input type="text" name="shop_state" class="form-control" id="shop_state" placeholder="Enter shope state" value="{{$vendorDetails->shop_state}}" required>
                    <span class="text-danger">@error('shop_state') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="shop_country">Shop Country</label>
                    <input type="text" name="shop_country" class="form-control" id="shop_country" placeholder="Enter Shop Country" value="{{$vendorDetails->shop_country}}" required>
                    <span class="text-danger">@error('shop_country') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="shop_pincode">Shop Pincode</label>
                    <input type="text" name="shop_pincode" class="form-control" id="shop_pincode" placeholder="Enter Shop Pincode" value="{{$vendorDetails->shop_pincode}}" required>
                    <span class="text-danger">@error('shop_pincode') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="shop_mobile">Shop Mobile</label>
                    <input type="text" name="shop_mobile" class="form-control" id="shop_mobile" placeholder="Enter shop mobile number" value="{{$vendorDetails->shop_mobile}}" required>
                    <span class="text-danger">@error('shop_mobile') {{$message}} @enderror</span>
                </div>

                <div class="form-group">
                    <label for="address_proof">Address Proof</label>
                    <select class="form-control" value="" name="address_proof" id="address_proof">
                        <option value="CNIC" {{ $vendorDetails->address_proof == 'CNIC' ? 'selected' : ''}}>CNIC</option>
                        <option value="Passport" {{ $vendorDetails->address_proof == 'Passport' ? 'selected' : ''}}>Passport</option>
                        <option value="Driving Liecence" {{ $vendorDetails->address_proof == 'Driving Liecence' ? 'selected' : ''}}>Driving Liecence</option>
                    </select>
                    <span class="text-danger">@error('address_proof') {{$message}} @enderror</span>
                </div>
               
                <div class="form-group">
                  <label for="address_proof_image">Address Proof Image</label>
                  <input type="file" name="address_proof_image" class="form-control file-upload-info" id="address_proof_image" placeholder="Enter Current Password">
                  <span>@error('address_proof_image'){{$message}}@enderror</span>
                 @if (!@empty($vendorDetails->address_proof_image))
                     <a target="_blank" href="{{url('admin/images/proofs/'.$vendorDetails->address_proof_image)}}">view image</a>
                     <input type="hidden" name="current_address_proof_image" value="{{$vendorDetails->address_proof_image}}">
                 @endif
              </div>
              <div class="form-group">
                <label for="business_license_number">business license number</label>
                <input type="text" name="business_license_number" class="form-control" id="business_license_number" placeholder="Enter shop mobile number" value="{{$vendorDetails->business_license_number}}" required>
                <span class="text-danger">@error('business_license_number') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
                <label for="gst_number">GST Number</label>
                <input type="text" name="gst_number" class="form-control" id="gst_number" placeholder="Enter shop mobile number" value="{{$vendorDetails->gst_number}}" required>
                <span class="text-danger">@error('gst_number') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
                <label for="pan_number">PAN Number</label>
                <input type="text" name="pan_number" class="form-control" id="pan_number" placeholder="Enter shop mobile number" value="{{$vendorDetails->pan_number}}" required>
                <span class="text-danger">@error('pan_number') {{$message}} @enderror</span>
            </div>
                

                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
              </form>
            </div>
          </div>
        </div>
      </div>

       @elseif($slug == 'bank')           
       @endif
       
    {{-- end form --}}
   
  </div>
  @include('admin.layout.footer')
@endsection