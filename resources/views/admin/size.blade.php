@extends('admin/layout')
@section('page_title', 'Size')
@section('size_select','active')
@section('container')
<h1 class="m-b-5">
    Size
</h1>

    <a href="{{url('admin/size/manage_size')}}">

    <button type="button" class="btn btn-success">
        Add Size
    </button>
</a>

<div class="row m-t-30">
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Size</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->size}}</td>
                        
                        <td class="process">
                            
                            {{-- Managing the add and edit in the same form dynamically --}}
                            <a href="{{url('admin/size/manage_size/')}}/{{$list->id}}">
                                <button type="button" class="btn btn-success">
                                    Edit
                                </button>
                            </a>

                            @if($list->status == 1)
                            <a href="{{url('admin/size/status/0')}}/{{$list->id}}">
                                <button type="button" class="btn btn-primary">
                                    Active
                                </button>
                            </a>
                            @elseif($list->status == 0)
                            <a href="{{url('admin/size/status/1')}}/{{$list->id}}">
                                <button type="button" class="btn btn-warning">
                                    Deactive
                                </button>
                            </a>

                            @endif

                            

                            <a href="{{url('admin/size/delete/')}}/{{$list->id}}">
                                <button type="button" class="btn btn-danger">
                                    Delete
                                </button>
                            </a>

                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="copyright">
            <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.
            </p>
        </div>
    </div>
</div>

</div>
</div>

@endsection