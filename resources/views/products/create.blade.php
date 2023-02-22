@extends('layout')
@section('title')
    Create product
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3>Create a new Product</h3>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Go Back</a>
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name"
                           value="{{ old('name') }}"
                           class="form-control @error('name') is-invalid @enderror"
                           id="name">
                    @error('name')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description"
                              class="form-control @error('description') is-invalid @enderror"
                              id="description"
                              rows="3"
                    >{{ old('description') }}</textarea>
                    @error('description')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Create product</button>
            </form>
        </div>
    </div>
@endsection
