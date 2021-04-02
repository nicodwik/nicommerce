<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('galleries')->paginate(10);
        return view('pages.category', [
            'categories' => $categories,
            'products' => $products
        ]);
    }

    public function detail(Request $request, $slug)
    {
        $categories = Category::all();
        $category_data = Category::where('slug', $slug)->with('products')->first();
        $products = Product::with('galleries')->where('categories_id', $category_data->id)->paginate(10);
        return view('pages.category', [
            'categories' => $categories,
            'products' => $products,
            'category_data' => $category_data
        ]);
    }
}
