@extends('admin/layout')
@section('page_title', 'Product')
@section('product_select','active')
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
    Product
</h1>

<a href="{{url('admin/product/manage_product')}}">

    <button type="button" class="btn btn-success">
        Add Product
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
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Image</th>
                    {{-- <th>Brand</th>
                    <th>Model</th>
                    <th>Short Description</th>
                    <th>Description</th>
                    <th>Keyword</th>
                    <th>Technical Specification</th>
                    <th>Uses</th>
                    <th>Status</th> --}}
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $list)
                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->name}}</td>
                    <td>{{$list->slug}}</td>
                    <td>
                        @if($list->image!='')
                        <img src="{{asset('storage/media/'.$list->image)}}" alt="Image Loading" width=200px>
                        @endif
                    </td>
                    {{-- <td>{{$list->brand}}</td>
                    <td>{{$list->model}}</td>
                    <td>{{$list->short_desc}}</td>
                    <td>{{$list->desc}}</td>
                    <td>{{$list->keywords}}</td>
                    <td>{{$list->technical_specification}}</td>
                    <td>{{$list->uses}}</td>
                    <td>{{$list->warranty}}</td> --}}
                    {{-- <td>{{$list->status}}</td> --}}
                    <td class="process">

                        {{-- Managing the add and edit in the same form dynamically --}}
                        <a href="{{url('admin/product/manage_product/')}}/{{$list->id}}">
                            <button type="button" class="btn btn-success">
                                Edit
                            </button>
                        </a>

                        @if($list->status == 1)
                        <a href="{{url('admin/product/status/0')}}/{{$list->id}}">
                            <button type="button" class="btn btn-primary">
                                Active
                            </button>
                        </a>
                        @elseif($list->status == 0)
                        <a href="{{url('admin/product/status/1')}}/{{$list->id}}">
                            <button type="button" class="btn btn-warning">
                                Deactive
                            </button>
                        </a>

                        @endif



                        <a href="{{url('admin/product/delete/')}}/{{$list->id}}">
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