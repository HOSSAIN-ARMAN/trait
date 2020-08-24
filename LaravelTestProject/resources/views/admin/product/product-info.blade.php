@extends('admin.master')
@section('body-content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Sl</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Code</th>
            <th scope="col">Description</th>
            <th scope="col">Product Image</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @php($i = 1)
        @foreach($products as $product)
        <tr>
            <th scope="row">{{ $i++ }}</th>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->product_code }}</td>
            <td>{{ $product->description }}</td>
            <td><img src="{{ asset($product->product_img) }}" width="80px" height="80px"></td>
            <td>
                <a href="{{ route('edit-product', ['id' => $product->id]) }}">Edit</a>
                <a href="{{ route('delete-product', ['id'=> $product->id]) }}">Delete</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
