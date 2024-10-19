@extends('layouts.template')

@section('title', "Product: $product->product_name")

@section('body')

@if ($product->product_image)
    <img src="{{ $product->product_image_url }}" class="rounded img-thumbnail mx-auto d-block my-3"/>
@endif

<div class="col-md-12 mt-4">
<table class="table table-striped table-bordered table-container table-center ">
    <tbody>
        <tr>
            <th scope="row">Product Name</th>
            <td>{{ $product->product_name }}</td>
        </tr>
        <tr>
            <th scope="row">Description</th>
            <td>{{ $product->description }}</td>
        </tr>
        <tr>
            <th scope="row">Retail Price</th>
            <td>{{ $product->retail_price }}</td>
        </tr>
        <tr>
            <th scope="row">Pholesale Price</th>
            <td>{{ $product->wholesale_price }}</td>
        </tr>
        <tr>
            <th scope="row">Origin</th>
            <td>{{ $product->origin }} - {{ $countryName }}</td>
        </tr>
        <tr>
            <th scope="row">Quantity</th>
            <td>{{ $product->quantity }}</td>
        </tr>
    </tbody>
</table>
</div>

<div class="mb-3">
    <small>Created at: {{ $product->created_at }}</small>
    @if ($product->updated_at)
        <br><small>Updated at: {{ $product->updated_at }}</small>
    @endif
</div>

<div class="mb-4">
    <a href="{{ route('products.index', $product) }}" class="btn btn-secondary btn-sm">
    Back
    </a>
</div><br>

@endsection
