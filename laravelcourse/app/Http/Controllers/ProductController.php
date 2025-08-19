<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] = "List of products";
        $viewData["products"] = Product::all();
        return view('product.index')->with("viewData", $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $product = Product::findOrFail($id);
        if (!$product) {
            return redirect()->route('home.index');
        }
        $viewData = [];
        $viewData["title"] = $product["name"] . " - Online Store";
        $viewData["subtitle"] = $product["name"] . " - Product information";
        $viewData["product"] = $product;

        return view('product.show')->with("viewData", $viewData);
    }

    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Create product";
        return view('product.create')->with("viewData", $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        $request->validate([
            "name" => "required",
            "price" => ["required", "numeric", "gt:0"]
        ], [
            "price.gt" => 'Price should be a number greater than zero'
        ]);
        Product::create($request->only(['name', 'price']));
        return back();
        //here will be the code to call the model and save it to the database
    }
}
