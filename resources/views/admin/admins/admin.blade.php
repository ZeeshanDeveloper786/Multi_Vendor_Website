@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{$title}}</h4>
                            <p class="card-description">
                                Add class <code>.table-bordered</code>
                            </p>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                Admin ID
                                            </th>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Type
                                            </th>
                                            <th>
                                                Mobile
                                            </th>
                                            <th>
                                                Email
                                            </th>
                                            <th>
                                                Image
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($adminsData as $data)   
                                         
                                        <tr>
                                            <td>
                                                {{$data->id}}
                                            </td>
                                            <td>
                                                {{$data->name}}
                                            </td>
                                            <td>
                                                {{$data->type}}
                                            </td>
                                            <td>
                                                {{$data->mobile}}
                                            </td>
                                            <td>
                                                {{$data->email}}
                                            </td>
                                            <td>
                                                <img src="{{asset('admin/images/photos/'. $data->image)}}" alt="">
                                            </td>
                                            <td>
                                                @if ($data->status == 1)
                                                <a href="#" class="updateAdminStatus" id="{{$data->id}}">
                                                <i style="font-size: 25px;" class="mdi mdi-bookmark-check" status="Active"></i></a>
                                                
                                                @else
                                                <a href="#" class="updateAdminStatus" id="{{$data->id}}">
                                                <i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i></a>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($data->type == 'vendor')
                                               <a href="{{url('admin/view-vendor-details/'.$data->id)}}"><i style="font-size: 25px;" class="mdi mdi-file-document"></i></a>
                                                @endif
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
