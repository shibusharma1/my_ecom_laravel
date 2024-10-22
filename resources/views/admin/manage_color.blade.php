@extends('admin/layout')
@section('page_title', 'Manage Color')
@section('color_select','active')
@section('container')
<h1 class="m-b-5">
   Manage Color
</h1>
<a href="{{url('admin/color')}}">
    <button type="button" class="btn btn-success">
        Back
    </button>
</a>

        <div class="row m-t-30">
            <div class="col-md-12">
                
                    
                
                <div class="card p-5">
                    
                        <form action="{{ route('color.insert')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="color" class="control-label mb-1">Color</label>
                                <input id="color" value="{{$color}}" name="color" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                @error('color')
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