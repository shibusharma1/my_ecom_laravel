@extends('admin/layout')
@section('page_title', 'Manage Product')
@section('product_select','active')
@section('container')

@if($id>0)
{{$image_required=""}}
@else
{{$image_required="required" }}
@endif



<h1 class="m-b-5">
    Manage Product
</h1>
<a href="{{url('admin/product')}}">
    <button type="button" class="btn btn-success">
        Back
    </button>
</a>

<div class="row m-t-30">
    <div class="col-md-12">



        <div class="card p-5">

            <form action="{{ route('product.insert')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="control-label mb-1">Name</label>
                    <input id="name" value="{{$name}}" name="name" type="text" class="form-control" aria-required="true"
                        aria-invalid="false" required>
                    @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>

                    @enderror
                </div>

                <div class="form-group">
                    <label for="slug" class="control-label mb-1">Slug</label>
                    <input id="slug" value="{{$slug}}" name="slug" type="text" class="form-control" aria-required="true"
                        aria-invalid="false" required>
                </div>
                @error('slug')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" value="{{$image}}" name="image" class="form-control" id="image"
                        {{$image_required}}>
                </div>
                @if($errors->has('image'))
                <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif

                <div class='row'>

                    <div class="form-group col-md-4">
                        <label for="category_id" class="control-label mb-1">Category ID</label>
                        <select id="category_id" value="{{$category_id}}" name="category_id" type="text"
                            class="form-control" aria-required="true" aria-invalid="false" required>

                            <option value="" disabled>Select categories</option>
                            @foreach($category as $list)
                            @if($category_id==$list->id)
                            <option selected value="{{$list->id}}">
                                @else
                            <option value="{{$list->id}}">
                                @endif
                            <option value="{{$list->id}}">{{$list->category_name}}</option>
                            @endforeach


                        </select>

                    </div>
                    @error('category_id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror



                    <div class="form-group col-md-4">
                        <label for="brand" class="control-label mb-1">Brand</label>
                        <input id="brand" value="{{$brand}}" name="brand" type="text" class="form-control"
                            aria-required="true" aria-invalid="false" required>
                    </div>
                    @error('brand')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror



                    <div class="form-group col-md-4">
                        <label for="model" class="control-label mb-1">Model</label>
                        <input id="model" value="{{$model}}" name="model" type="text" class="form-control"
                            aria-required="true" aria-invalid="false" required>
                    </div>
                    @error('model')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="short_desc" class="control-label mb-1">Short Description</label>
                    <textarea id="short_desc" name="short_desc" type="text" class="form-control" aria-required="true"
                        aria-invalid="false" required>{{$short_desc}}</textarea>

                </div>
                @error('short_desc')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror

                <div class="form-group">
                    <label for="desc" class="control-label mb-1">Description</label>
                    <textarea id="desc" name="desc" type="text" class="form-control" aria-required="true"
                        aria-invalid="false" required>{{$desc}}</textarea>

                </div>
                @error('desc')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror

                <div class="form-group">
                    <label for="keywords" class="control-label mb-1">Keywords</label>
                    <textarea id="keywords" name="keywords" type="text" class="form-control" aria-required="true"
                        aria-invalid="false" required>{{$keywords}}</textarea>

                </div>
                @error('keywords')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror


                <div class="form-group">
                    <label for="technical_specification" class="control-label mb-1">Technical Specification</label>
                    <textarea id="technical_specification" name="technical_specification" type="text"
                        class="form-control" aria-required="true" aria-invalid="false"
                        required>{{$technical_specification}}</textarea>

                </div>
                @error('technical_specification')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror

                <div class="form-group">
                    <label for="uses" class="control-label mb-1">Uses</label>
                    <textarea id="uses" name="uses" type="text" class="form-control" aria-required="true"
                        aria-invalid="false" required>{{$uses}}</textarea>

                </div>
                @error('uses')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror


                <div class="form-group">
                    <label for="warranty" class="control-label mb-1">Warranty</label>
                    <textarea id="warranty" name="warranty" type="text" class="form-control" aria-required="true"
                        aria-invalid="false" required>{{$warranty}}</textarea>

                </div>

                @error('warranty')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror



                <div>
                    <input type="hidden" name="id" value="{{$id}}" />
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">

                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
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