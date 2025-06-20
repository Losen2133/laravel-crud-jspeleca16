@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Edit Product</span>
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
            </div>

            <div class="card-body p-5" style="min-height: 100%">
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <div class="row align-items-stretch">
                        
                        <div class="col-md-9">

                            <div class="mb-3 row">
                                <label for="code" class="col-md-4 col-form-label text-md-end text-start">Code</label>
                                <div class="col-md-6">
                                    <input type="text"
                                        class="form-control @error('code') is-invalid @enderror"
                                        id="code"
                                        name="code"
                                        value="{{ $product->code }}">
                                    @error('code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                                <div class="col-md-6">
                                    <input type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        id="name"
                                        name="name"
                                        value="{{ $product->name }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="quantity" class="col-md-4 col-form-label text-md-end text-start">Quantity</label>
                                <div class="col-md-6">
                                    <input type="number"
                                        class="form-control @error('quantity') is-invalid @enderror"
                                        id="quantity"
                                        name="quantity"
                                        value="{{ $product->quantity }}">
                                    @error('quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="price" class="col-md-4 col-form-label text-md-end text-start">Price</label>
                                <div class="col-md-6">
                                    <input type="number"
                                        step="0.01"
                                        class="form-control @error('price') is-invalid @enderror"
                                        id="price"
                                        name="price"
                                        value="{{ $product->price }}">
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                                <div class="col-md-6">
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                            id="description"
                                            name="description">{{ $product->description }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="product-image" class="col-md-4 col-form-label text-md-end text-start">Product Image</label>
                                <div class="col-md-6">
                                    <input type="file"
                                        class="form-control @error('product-image') is-invalid @enderror"
                                        id="product-image"
                                        name="product-image">
                                    @error('product-image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="col-md-3 d-flex justify-content-center align-items-center">
                            <img src="{{ $product->imageurl }}" alt="{{ $product->name }}" height="150" width="150">
                        </div>

                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-12 text-center">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
