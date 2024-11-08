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

        <form action="{{ route('product.insert')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-5">
                        <div class="card-body">



                            <div class="form-group">
                                <label for="name" class="control-label mb-1">Name</label>
                                <input id="name" value="{{$name}}" name="name" type="text" class="form-control"
                                    aria-required="true" aria-invalid="false" required>
                                @error('name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>

                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="slug" class="control-label mb-1">Slug</label>
                                <input id="slug" value="{{$slug}}" name="slug" type="text" class="form-control"
                                    aria-required="true" aria-invalid="false" required>
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
                                    <select id="category_id" value="{{$category_id}}" name="category_id"
                                        class="form-control" aria-required="true" aria-invalid="false" required>
                                        <option value="">Select categories</option>

                                        @foreach($category as $list)
                                        <option value="{{$list->id}}" {{ $category_id==$list->id ? 'selected' : '' }}>
                                            {{$list->category_name}}
                                        </option>
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
                                <textarea id="short_desc" name="short_desc" type="text" class="form-control"
                                    aria-required="true" aria-invalid="false" required>{{$short_desc}}</textarea>

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
                                <textarea id="keywords" name="keywords" type="text" class="form-control"
                                    aria-required="true" aria-invalid="false" required>{{$keywords}}</textarea>

                            </div>
                            @error('keywords')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror


                            <div class="form-group">
                                <label for="technical_specification" class="control-label mb-1">Technical
                                    Specification</label>
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
                                <textarea id="warranty" name="warranty" type="text" class="form-control"
                                    aria-required="true" aria-invalid="false" required>{{$warranty}}</textarea>

                            </div>

                            @error('warranty')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror




                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
</div>


{{-- making another form below the form --}}
<h2 class="mb-3">Product Attributes</h2>
<div class="col-lg-12" id="product_attr_box">
    <div class="card p-3 mb-5" id="product_attr_1">
        <div class="card-body">
            <div class="form-group">
            <div class='row'>
                <div class="col-md-2">
                    <label for="sku" class="control-label mb-1">SKU</label>
                    <input id="sku" name="sku[]" type="text" class="form-control" aria-required="true"
                        aria-invalid="false" required>
                </div>
                @error('sku')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror

                <div class="col-md-2">
                    <label for="mrp" class="control-label mb-1">MRP</label>
                    <input id="mrp" name="mrp[]" type="text" class="form-control" aria-required="true"
                        aria-invalid="false" required>
                </div>
                @error('mrp')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror

                <div class="col-md-2">
                    <label for="price" class="control-label mb-1">Price</label>
                    <input id="price" name="price[]" type="text" class="form-control" aria-required="true"
                        aria-invalid="false" required>
                </div>
                @error('price')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror

                <div class="col-md-3">
                    <label for="size_id" class="control-label mb-1">Size</label>
                    <select id="size_id" name="size_id[]" class="form-control" aria-required="true" aria-invalid="false">
                        <option value="">Select </option>
                        @foreach($sizes as $list)
                        <option value="{{$list->id}}">
                            {{$list->size}}
                        </option>
                        @endforeach
                    </select>


                </div>


                <div class="col-md-3">
                    <label for="color_id" class="control-label mb-1">Color</label>
                    <select id="color_id" name="color_id[]" class="form-control" aria-required="true"
                        aria-invalid="false">
                        <option value="">Select </option>

                        @foreach($colors as $list)
                        <option value="{{$list->id}}">
                            {{$list->color}}
                        </option>
                        @endforeach
                    </select>


                </div>

                <div class="col-md-2">
                    <label for="qty" class="control-label mb-1">Qty</label>
                    <input id="qty" name="qty[]" type="text" class="form-control" aria-required="true"
                        aria-invalid="false" required>
                </div>
                @error('qty')
                <div class="alert alert-danger">
                    {{ $message}}
                </div>
                @enderror


                <div class="col-md-4">
                    <label for="attr_image">Image</label>
                    <input type="file" name="attr_image[]" class="form-control" id="attr_image" {{$image_required}}>
                </div>
                @if($errors->has('attr_image'))
                <span class="text-danger">{{ $errors->first('attr_image') }}</span>
                @endif

                <div class="col-md-2">
                    <label for="action" class="control-label mb-1">&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <button type="button" class="btn btn-lg btn-success btn-block" onclick="add_more()">
                        <i class="fa fa-plus"></i> &nbsp;Add</button>

                </div>
            </div>
        </div>
    </div>
</div>
</div>

<input type="hidden" name="id" value="{{$id}}" />
<button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
    Submit
</button>


</div>
</form>
</div>
</div>



<script>
    var loop_count = 1;

function add_more() {
    loop_count++;
    var html = '<div class="card p-3 mt-3" id="product_attr_' + loop_count + '"><div class="card-body"><div class="form-group"><div class="row">';

    html += '<div class=" col-md-2"><label for="sku" class="control-label mb-1">SKU</label>';
    html += '<input id="sku" name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false"></div>';

    html += '<div class=" col-md-2"><label for="mrp" class="control-label mb-1">MRP</label>';
    html += '<input id="mrp" name="mrp[]" type="text" class="form-control" aria-required="true" aria-invalid="false"></div>';

    html += '<div class=" col-md-2"><label for="price" class="control-label mb-1">Price</label>';
    html += '<input id="price" name="price[]" type="text" class="form-control" aria-required="true" aria-invalid="false"></div>';

    // html += '<div class=" col-md-3"><label for="size_id_' + loop_count + '" class="control-label mb-1">Size</label>';
    // html += '<select id="size_id_' + loop_count + '" name="size_id[]" class="form-control" aria-required="true" aria-invalid="false">';
    // html += '<option value="">Select</option>';
    // html += '@foreach($sizes as $list)<option value="{{$list->id}}">{{$list->size}}</option>@endforeach';
    // html += '</select></div>';

    // Alternative way for size
    var size_id_html=jQuery('#size_id').html();
    html +='<div class="col-md-3"><label for="size_id" class="control-label mb-1">Size</label><select id="size_id" name="size_id[]" class="form-control" aria-required="true" aria-invalid="false">'+size_id_html+'</select></div>';

    html += '<div class=" col-md-3"><label for="color_id" class="control-label mb-1">Color</label>';
    html += '<select id="color_id" name="color_id[]" class="form-control" aria-required="true" aria-invalid="false">';
    html += '<option value="">Select</option>';
    html += '@foreach($colors as $list)<option value="{{$list->id}}">{{$list->color}}</option>@endforeach';
    html += '</select></div>';

    html += '<div class=" col-md-2"><label for="qty" class="control-label mb-1">Qty</label>';
    html += '<input id="qty" name="qty[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';

    html += '<div class=" col-md-4"><label for="attr_image">Image</label>';
    html += '<input type="file" name="attr_image[]" class="form-control" id="attr_image" {{$image_required}}></div>';

    html += '<div class=" col-md-2"><label for="action" class="control-label mb-1">&nbsp;&nbsp;&nbsp;&nbsp;</label>';
    html += '<button type="button" class="btn btn-danger btn-block" onclick="remove_more(' + loop_count + ')"><i class="fa fa-minus"></i> Remove</button></div>';

    html += '</div></div></div></div>';

    jQuery('#product_attr_box').append(html);
}

function remove_more(loop_count) {
    jQuery('#product_attr_' + loop_count).remove();
}

</script>

@endsection