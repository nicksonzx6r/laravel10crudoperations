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
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <form action="{{ route('products.update', $product->id) }}" method="post">
                @csrf
                @method('DELETE')
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-secondary">Edit</a>
                <button
                        type="submit"
                        class="btn btn-danger showConfirm">Delete
                </button>
            </form>
        </div>
    </div>
@endsection
