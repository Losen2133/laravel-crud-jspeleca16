<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('products.index', [
            'products' => Product::latest()->paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {   
        $request->validated();

        //regular field
        $newProduct = new Product;
        $newProduct->code = $request->code;
        $newProduct->name = $request->name;
        $newProduct->quantity = $request->quantity;
        $newProduct->price = $request->price;
        $newProduct->description = $request->description;

        //file upload
        $file = $request->file('product-image');
        $fileName = $file->getClientOriginalName();
        $filePath = Storage::disk('public')->putFileAs("products/{$request->code}", $file, $fileName);
        $newProduct->imageurl = Storage::url($filePath);
        $newProduct->save();

        return redirect()->route('products.index')->withSuccess('New product is added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {   
        //regular fields
        $request->validated();
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->description = $request->description;

        //file upload
        $file = $request->file('product-image');
        $fileName = $file->getClientOriginalName();
        $filePath = Storage::disk('public')->putFileAs("products/{$request->code}", $file, $fileName);
        $product->imageurl = Storage::url($filePath);
        $product->update();

        return redirect()->back()->withSuccess('Product is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')->withSuccess('Product is deleted successfully.');
    }
}
