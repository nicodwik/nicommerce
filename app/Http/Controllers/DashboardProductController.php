<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\Category;

class DashboardProductController extends Controller
{
    public function index()
    {
        $products = Product::where('users_id', \Auth::user()->id)->with(['galleries', 'category'])->get();
        return view('pages.dashboard-products', [
            'products' => $products
        ]);
    }

    public function details($id)
    {
        return view('pages.dashboard-products-details', [
            'product' => Product::with(['category', 'user', 'galleries'])->find($id),
            'categories' => Category::all()
        ]);
    }
    
    public function create()
    {
        $categories = Category::all();
        return view('pages.dashboard-products-create', [
            'categories' => $categories
        ]);
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['users_id'] = \Auth::user()->id;
        $data['slug'] = \Str::slug($request->name);
        $product = Product::create($data);

        $gallery = [
            'products_id' => $product->id,
            'photo' => $request->file('photo')->store('asset/gallery', 'public'),
        ];

        ProductGallery::create($gallery);

        return redirect()->route('dashboard-products');
    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $item = Product::findOrFail($id);
        $item->update($data);

        return redirect()->route('dashboard-products');
    }

    public function uploadGallery(Request $request)
    {
        ProductGallery::create([
            'products_id' => $request->products_id,
            'photo' => $request->file('photo')->store('asset/gallery', 'public'),
        ]);

        return redirect()->route('dashboard-products-details', $request->products_id);
    }

    public function deleteGallery(Request $request, $id)
    {
        $item = ProductGallery::find($id);
        $item->delete();

        return redirect()->route('dashboard-products-details', $item->products_id);
    }
}
