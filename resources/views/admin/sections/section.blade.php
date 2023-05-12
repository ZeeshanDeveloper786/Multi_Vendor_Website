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
                            <h4 class="card-title">Sections</h4>
                            <a href="{{url('admin/admin/add-edit-section')}}" class="btn btn-outline-primary btn-fw text-decoration-none" type="button">Add Section</a>
                            </div>

                            <div class="table-responsive pt-3">
                                <table class="table table-bordered" id="sections">
                                    <thead>
                                        <tr>
                                            <th >
                                                ID
                                            </th>
                                            <th >
                                                Name
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
                                        @foreach ($sections as $section)   
                                         
                                        <tr id="section{{ $section->id }}">
                                            <td>
                                                {{$section->id}}
                                            </td>
                                            <td>
                                                {{$section->name}}
                                            </td>
                                            <td>
                                                <span class="d-flex justify-content-center">
                                                @if ($section->status == 1)
                                                <a href="#" class="updateSectionStatus" id="{{$section->id}}">
                                                <i style="font-size: 25px;" class="mdi mdi-bookmark-check" status="Active"></i></a>
                                                
                                                @else
                                                <a href="#" class="updateSectionStatus" id="{{$section->id}}">
                                                <i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i></a>
                                                @endif
                                            </span>
                                            </td>
                                            <td >
                                               
                                               <span class="d-flex justify-content-center">
                                                <a href="{{url('admin/admin/add-edit-section/'.$section->id)}}"><i style="font-size: 25px;" class="mdi mdi-pencil-box"></i></a>
 
                                                <a onclick="confirmation({{$section->id}})" href="#"><i style="font-size: 25px;" class="mdi mdi-delete"></i></a>
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
