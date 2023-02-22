<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Database\QueryException;
use App\Constants\Product as ProductConstants;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        try {
            // create a new product with validated request data
            Product::create($request->validated());
            // redirect to index with success message
            return redirect()->route('products.index')
                ->with('success', ProductConstants::PRODUCT_CREATED);
        } catch (QueryException $exception) {// catch query exceptions
            // redirect back with warning message
            return back()->with('warning', ProductConstants::PRODUCT_WAS_NOT_SAVED);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        // Update the product with the validated data from the request
        $product->update($request->validated());

        // Check if the product has been updated
        if (!$product->getChanges()) {
            // If the product has not been updated, redirect back to the previous page with a warning message
            return back()->with('warning', ProductConstants::NO_CHANGES);
        }

        // If the product has been updated, redirect to the product index page with a success message
        return redirect()->route('products.index')
            ->with('success', ProductConstants::PRODUCT_UPDATED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Delete the specified product from the database
        $product->delete();

        // Redirect to the product index page with a success message
        return redirect()->route('products.index')
            ->with('success', ProductConstants::PRODUCT_DELETED);
    }
}
