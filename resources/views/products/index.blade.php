@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">Product List</div>
            <div class="card-body">

                <a href="{{ route('products.create') }}" class="btn btn-success btn-sm my-2">
                    <i class="bi bi-plus-circle"></i> Add New Product
                </a>

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">S#</th>
                            <th scope="col" class="text-center">Code</th>
                            <th scope="col" class="text-center">Product Image</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-center">Price</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                <td class="text-center">{{ $product->code }}</td>
                                <td class="text-center">
                                    <img src="{{ $product->imageurl }}" alt="{{ $product->name }}" height="64px" width="64px">
                                </td>
                                <td class="text-center">{{ $product->name }}</td>
                                <td class="text-center">{{ $product->quantity }}</td>
                                <td class="text-center">{{ $product->price }}</td>
                                <td class="text-center">
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-eye"></i> Show
                                        </a>

                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>

                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Do you want to delete this product?');">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    <span class="text-danger">
                                        <strong>No Product Found!</strong>
                                    </span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{ $products->links() }}

            </div>
        </div>
    </div>
</div>
@endsection
