@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            
                            @if (Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>                                
                            @endif
                            @if (Session::has('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>                                
                            @endif

                            <div class="d-flex justify-content-between">
                            <h4 class="card-title">Categories</h4>
                            <a href="{{url('admin/admin/add-edit-category')}}" class="btn btn-outline-primary btn-fw text-decoration-none" type="button">Add Category</a>
                            </div>

                            <div class="table-responsive pt-3">
                                <table class="table table-bordered" id="categories">
                                    <thead>
                                        <tr>
                                            <th >
                                                ID
                                            </th>
                                            <th >
                                                Category
                                            </th>
                                            <th>
                                                Parent Category
                                            </th>
                                            <th>
                                                Section
                                            </th>
                                            <th>
                                                URL
                                            </th>
                                            <th class="text-center">
                                                Status
                                            </th>
                                            <th class="text-center">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)   
                                         {{-- @dd($category) --}}
                                        <tr id="category{{ $category->id }}">
                                            <td>
                                                {{$category->id}}
                                            </td>
                                            <td>
                                                {{$category->category_name}}
                                            </td>

                                            <td>
                                                @if (isset($category->parentCategory))
                                                
                                                {{$category->parentCategory->category_name}}   @else
                                                <span>  Root</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{$category->section->name}}
                                            </td>
                                            <td>
                                                {{$category->url}}
                                            </td>
                                            
                                            <td>
                                                <span class="d-flex justify-content-center">
                                                @if ($category->status == 1)
                                                <a href="#" class="updatecategoryStatus" id="{{$category->id}}">
                                                <i style="font-size: 25px;" class="mdi mdi-bookmark-check" status="Active"></i></a>
                                                
                                                @else
                                                <a href="#" class="updatecategoryStatus" id="{{$category->id}}">
                                                <i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i></a>
                                                @endif
                                            </span>
                                            </td>
                                            <td >
                                               
                                               <span class="d-flex justify-content-center">
                                                <a href="{{url('admin/admin/add-edit-category/'.$category->id)}}"><i style="font-size: 25px;" class="mdi mdi-pencil-box"></i></a>
 
                                                <a onclick="DeleteCatCfm({{$category->id}})" href="#"><i style="font-size: 25px;" class="mdi mdi-delete"></i></a>
                                            </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- end form --}}
            </div>
        </div>
        @include('admin.layout.footer')
    @endsection
