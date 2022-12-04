<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $categories = Category::with('products')->get();
            return view('pages.admin.categories.index', compact('categories'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $inputs = $request->all();
        try {
            if ($request->hasFile('image')) {
                $inputs['image'] = $request->file('image')->store('public/categories');
            }
            Category::create($inputs);
            return redirect()->route('category.index')->with('success', 'Catégorie ajoutée avec succès');
        } catch (\Exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return redirect()->back();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        try {
            $products = $category->products ?? [];
            return view('pages.admin.categories.show', compact('category', 'products'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('pages.admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $inputs = $request->all();
            if($request->hasFile('image')) {
                $inputs['image'] = $request->file('image')->store('public/categories');
            }
            $category->update($inputs);

            $request->session()->flash('success', 'Categorie modifiée avec succès');
            return redirect()->intended('admin/category');
        } catch (\Exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $products = $category->products;
            foreach ($products as $product) {
                $product->delete();
            }
            $category->delete();
            return redirect()->back()->with('success', 'Categorie supprimée avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function addProductInCategory(Request $request,$id)
    {
         $validate = Validator::make($request->all(), [
            'nom' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);
        if ($validate->fails()) {
           $request->session()->flash('error', 'Veuillez remplir tous les champs');
            return redirect()->back();
        }

        try {
            $inputs = $request->all();
            $inputs['category_id'] = $id;
            if ($request->hasFile('image')) {
                $inputs['image'] = $request->file('image')->store('public/products');
            }
            Product::create($inputs);
            return redirect()->back()->with('success', 'Produit ajouté avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updateProductInCategory(Request $request, $id)
    {

        $validate = Validator::make($request->all(), [
            'nom' => 'required',
            'description' => 'required',
            'prix' => 'required',
              ]);
        if ($validate->fails()) {
           $request->session()->flash('error', 'Veuillez remplir tous les champs');
            return redirect()->back();
        }





        try {
            $inputs = $request->all();
            $product = Product::find($id);
            if ($request->hasFile('image')) {
                $inputs['image'] = $request->file('image')->store('public/products');
            }
            $product->update($inputs);
            return redirect()->back()->with('success', 'Produit modifié avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
