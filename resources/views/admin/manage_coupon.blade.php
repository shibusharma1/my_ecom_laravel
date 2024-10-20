@extends('admin/layout')
@section('page_title', 'Manage Coupon')
@section('coupon_select','active')

@section('container')
<h1 class="m-b-5">
   Manage Coupon
</h1>
<a href="{{url('admin/coupon')}}">
    <button type="button" class="btn btn-success">
        Back
    </button>
</a>

        <div class="row m-t-30">
            <div class="col-md-12">
                
                    
                
                <div class="card p-5">
                    
                        <form action="{{ route('coupon.insert')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title" class="control-label mb-1">Title</label>
                                <input id="title" value="{{$title}}" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                @error('title')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                    
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="code" class="control-label mb-1">Code</label>
                                <input id="code" value="{{$code}}" name="code" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            </div>
                            @error('code')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                    
                                @enderror
                            
                            <div class="form-group">
                                <label for="value" class="control-label mb-1">Value</label>
                                <input id="value" value="{{$value}}" name="value" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            </div>
                            @error('value')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                    
                                @enderror
                            
                            
                            
                            <div>
                                <input type="hidden" name="id" value="{{$id}}"/>
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
                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a
                            href="https://colorlib.com">Colorlib</a>.</p>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection