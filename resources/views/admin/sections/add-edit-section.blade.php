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

              <h3 class="font-weight-bold">Setting</h3>
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
       <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">{{$title}}</h4>
              
              <form class="forms-sample" @if (empty($sectionData->id))
                action="{{url('admin/admin/add-edit-section')}}"
                @else
                action="{{url('admin/admin/add-edit-section/'.$sectionData->id)}}"
              @endif  
              method="POST" enctype="multipart/form-data">
                @csrf


                <div class="form-group">
                    <label for="section_name">Section Name</label>
                    <input type="text" name="section_name" class="form-control" id="section_name" placeholder="Enter Section Name" 
                    @if (!empty($sectionData->name))  
                    value="{{$sectionData->name}}" 
                    @else
                    value="{{old('section_name')}}"
                    @endif  >
                    <span class="text-danger">@error('section_name') {{$message}} @enderror</span>
                </div>

                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{url('admin/section')}}" class="btn btn-light">Cancel</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    {{-- end form --}}
   
  </div>
  @include('admin.layout.footer')
@endsection