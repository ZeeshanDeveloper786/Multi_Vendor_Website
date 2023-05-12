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

              <h3 class="font-weight-bold">Categories</h3>
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
              
              <form class="forms-sample" 
              @if (empty($category->id))
                action="{{url('admin/admin/add-edit-category')}}"
                @else
                action="{{url('admin/admin/add-edit-category/'.$category->id)}}"
              @endif  
              method="POST" enctype="multipart/form-data">
                @csrf


                <div class="form-group">
                    <label for="category_name">category Name</label>
                    <input type="text" name="category_name" class="form-control" id="category_name" placeholder="Enter category Name" 
                    @if (!empty($category->category_name))  
                    value="{{$category->category_name}}" 
                    @else
                    value="{{old('category_name')}}"
                    @endif  >
                    <span class="text-danger">@error('category_name') {{$message}} @enderror</span>
                </div>

                {{-- section name --}}
                <div class="form-group">
                  <label for="section_id">Section Name</label>
                  <select name="section_id" id="section_id" class="form-control">
                    <option value="">Select Section</option>
                    @foreach ($sections as $section)                        
                    <option value="{{$section->id}}" @if (!empty($category->section_id) && $category->section_id == $section->id) selected='' @endif> {{$section->name}}</option>
                    @endforeach
                  
                  </select>
                  <span class="text-danger">@error('section_id') {{$message}} @enderror</span>
              </div>


            <div id="appendCatLevel">
              @include('admin.categories.categories_level')
            </div>

            {{-- Category Level --}}
            <div class="form-group">
              <label for="category_image">Category Image</label>
              <input type="file" class="form-control" id="category_image" name="category_image">
              @if (!empty($category->category_image))
                  <a target="_blank" href="{{url('front/images/category_images/'.$category->category_image)}}">view image</a>
                  &nbsp;|&nbsp;
                  <a onclick="DeleteImage({{$category->id}})" href="#">Delete Image</a>
              @endif
              <span class="text-danger">@error('category_image') {{$message}} @enderror</span>
          </div>

          {{-- category discount --}}
          <div class="form-group">
            <label for="category_discount">Category Discount</label>
            <input type="text" name="category_discount" class="form-control" id="category_discount" placeholder="Enter category Discount" 
            @if (!empty($category->category_discount))  
            value="{{$category->category_discount}}" 
            @else
            value="{{old('category_discount')}}"
            @endif  >
            <span class="text-danger">@error('category_discount') {{$message}} @enderror</span>
        </div>

        {{-- category Description --}}
        <div class="form-group">
          <label for="category_description">Category Description</label>
          <textarea name="category_description" id="category_description" rows="3" class="form-control" >{{$category->description}}</textarea>
          <span class="text-danger">@error('category_description') {{$message}} @enderror</span>
      </div>


      {{-- category URL --}}
      <div class="form-group">
        <label for="url">Category URL</label>
        <input type="text" name="url" class="form-control" id="url" placeholder="Enter Category URL" 
        @if (!empty($category->url))  
        value="{{$category->url}}" 
        @else
        value="{{old('url')}}"
        @endif  >
        <span class="text-danger">@error('url') {{$message}} @enderror</span>
    </div>

    {{-- Meta_title --}}
    <div class="form-group">
      <label for="meta_title">Meta Title</label>
      <input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Enter Meta Title" 
      @if (!empty($category->meta_title))  
      value="{{$category->meta_title}}" 
      @else
      value="{{old('meta_title')}}"
      @endif  >
      <span class="text-danger">@error('meta_title') {{$message}} @enderror</span>
  </div>

  {{-- category URL --}}
  <div class="form-group">
    <label for="meta_description">Meta Description</label>
    <input type="text" name="meta_description" class="form-control" id="meta_description" placeholder="Enter Meta Description" 
    @if (!empty($category->meta_description))  
    value="{{$category->meta_description}}" 
    @else
    value="{{old('meta_description')}}"
    @endif  >
    <span class="text-danger">@error('meta_description') {{$message}} @enderror</span>
</div>

{{-- category URL --}}
<div class="form-group">
  <label for="meta_keywords">Meta Keywords</label>
  <input type="text" name="meta_keywords" class="form-control" id="meta_keywords" placeholder="Enter meta keywords" 
  @if (!empty($category->meta_keywords))  
  value="{{$category->meta_keywords}}" 
  @else
  value="{{old('meta_keywords')}}"
  @endif  >
  <span class="text-danger">@error('meta_keywords') {{$message}} @enderror</span>
</div>


                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{url('admin/categories')}}" class="btn btn-light">Cancel</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    {{-- end form --}}
   
  </div>
  @include('admin.layout.footer')
@endsection