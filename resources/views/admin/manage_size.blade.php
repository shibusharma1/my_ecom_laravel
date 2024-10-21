@extends('admin/layout')
@section('page_title', 'Manage Size')
@section('size_select','active')
@section('container')
<h1 class="m-b-5">
   Manage Size
</h1>
<a href="{{url('admin/size')}}">
    <button type="button" class="btn btn-success">
        Back
    </button>
</a>

        <div class="row m-t-30">
            <div class="col-md-12">
                
                    
                
                <div class="card p-5">
                    
                        <form action="{{ route('size.insert')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="size" class="control-label mb-1">Size</label>
                                <input id="size" value="{{$size}}" name="size" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                @error('size')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                    
                                @enderror
                            </div>
                            
                            
                            
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