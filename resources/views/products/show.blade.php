{{--this file will extend layout.blade.php--}}
@extends('layout')
{{--!!!this file will extend layout.blade.php--}}
{{--here we append title--}}
@section('title')
{{--!!!here we append title--}}
    show
@endsection
@section('content')
    <h3 class="text-center">Product Details</h3>
    <-- Display the product details in a card format -->
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <-- Create a form for deleting the product -->
            <form action="{{ route('products.update', $product->id) }}" method="post">
                @csrf
                @method('DELETE')
                <-- Create a button to edit the product -->
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-secondary">Edit</a>
                <--!!! Create a button to edit the product -->
                <-- Create a button to delete the product -->
                <button
                        type="submit"
                        class="btn btn-danger showConfirm">Delete
                </button>
                <--!!! Create a button to delete the product -->
            </form>
            <--!!! Create a form for deleting the product -->
        </div>
    </div>
    <--!!! Display the product details in a card format -->
@endsection
