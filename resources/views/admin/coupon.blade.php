@extends('admin/layout')
@section('page_title', 'Coupon')
@section('coupon_select','active')
@section('container')

@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    {{session('message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif 


<h1 class="m-b-5">
    Coupon
</h1>
<a href="{{url('admin/coupon/manage_coupon')}}">
    <button type="button" class="btn btn-success">
        Add Coupon
    </button>
</a>

<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Code</th>
                        <th>Value</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->title}}</td>
                        <td>{{$list->code}}</td>
                        <td>{{$list->value}}</td>
                        <td class="process">

                            {{-- Managing the add and edit in the same form dynamically --}}
                            <a href="{{url('admin/coupon/manage_coupon/')}}/{{$list->id}}">
                                <button type="button" class="btn btn-success">
                                    Edit
                                </button>
                            </a>
                            @if($list->status == 1)
                            <a href="{{url('admin/coupon/status/0')}}/{{$list->id}}">
                                <button type="button" class="btn btn-primary">
                                    Active
                                </button>
                            </a>
                            @elseif($list->status == 0)
                            <a href="{{url('admin/coupon/status/1')}}/{{$list->id}}">
                                <button type="button" class="btn btn-warning">
                                    Deactive
                                </button>
                            </a>

                            @endif

                            <a href="{{url('admin/coupon/delete/')}}/{{$list->id}}">
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