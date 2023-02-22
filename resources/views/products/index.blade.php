{{--this file will extend layout.blade.php--}}
@extends('layout')
{{--!!!this file will extend layout.blade.php--}}
{{--here we append title--}}
@section('title') Index @endsection
{{--!!!here we append title--}}
@section('content')
    <h1>Laravel 10 Pagination Example</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Create new Product</a>
    <table class="table table-bordered data-table">
        <thead>
        <tr>
            <th class="w-10">ID</th>
            <th class="w-25">Name</th>
            <th class="w-50">Email</th>
            <td class="w-10">Actions</td>
        </tr>
        </thead>
        <tbody>
        {{--show produts that we passed from the controller--}}
        @forelse($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger showConfirm">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">There are no products.</td>
            </tr>
        @endforelse
        {{--!!!show produts that we passed from the controller--}}
        </tbody>
    </table>
    {{--paginate products--}}
    {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
    {{--!!!paginate products--}}
@endsection
