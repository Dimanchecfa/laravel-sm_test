<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontOfficeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function searchProduct(Request $request)
    {
        try {
            $products = Product::where('nom', 'like', '%' . $request->search . '%')->get();
            return response()->json([
                'products' => $products
            ]);
        }catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }
    public function getProduct ()
    {
        try {
            $products = Product::all();
            return view('pages.app.products.index', compact('products'));
        }catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function searchCategory(Request $request)
    {
        try {
            $categories = Category::where('type', 'like', '%' . $request->search . '%')->get();
            return response()->json([
                'categories' => $categories
            ]);
        }catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function getCategory ()
    {
        try {
            $categories = Category::all();
            return view('pages.app.categories.index', compact('categories'));
        }catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function getProductByCategory($id)
    {
        try {
            $products = Product::with('category')->where('category_id', $id)->get();
            return view('pages.app.categories.show', compact('products'));
        }catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function searchProductByCategory(Request $request, $id)
    {
        try {
            $products = Product::where('category_id', $id)->where('nom', 'like', '%' . $request->search . '%')->get();
            return response()->json([
                'products' => $products
            ]);
        }catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

}
