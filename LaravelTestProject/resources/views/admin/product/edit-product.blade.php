@extends('admin.master')
@section('body-content')
    <div class="container">
        <div class="row well">
            <div class="col-md-12">
                <div class="card-header">
                    <h5 style="color: #1f6fb2">PRODUCT TABLE</h5>
                    <br>
                    <br>
                </div>
                <form action="{{ route('update-product') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Product Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}">
                            <input type="hidden" class="form-control" name="id" value="{{ $product->id }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Product Code</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="product_code" value="{{ $product->product_code }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Product Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="description">{{ $product->description }}"</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Product Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="product_img" accept="image/*">
                            <img src="{{ asset($product->product_img) }}" width="60px" height="60px">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label"></label>
                        <div class="col-sm-6">
                            <input type="submit" name="btn" class="form-control" value="Update-Product">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
