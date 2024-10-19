@extends('admin/layout')

@section('container')
<h1 class="m-b-5">
   Manage Category
</h1>
<a href="manage_category">
    <button type="button" class="btn btn-success">
        Back
    </button>
</a>

        <div class="row m-t-30">
            <div class="col-md-12">
                
                    
                
                <div class="card p-5">
                    
                        <form action="{{ route('category.insert')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="category_name" class="control-label mb-1">Category</label>
                                <input id="category_name" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                @error('category_name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                    
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_slug" class="control-label mb-1">Category Slug</label>
                                <input id="category_slug" name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            </div>
                            @error('category_slug')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                    
                                @enderror
                            
                            
                            
                            <div>
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