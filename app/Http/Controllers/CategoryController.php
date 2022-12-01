<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth')->except(['index', 'show' , 'store']);
    // }





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
        try {
            dd($request->all());
            Category::create($request->all());

            $request->session()->flash('success', 'Categorie ajoutée avec succès');
            dd('ok');
        } catch (\Exception $e) {
            dd($e);
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
            return view('pages.category.show', compact('products'));
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
    public function edit($id)
    {
        //
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
            $category->update($request->all());
            $request->session()->flash('success', 'Categorie modifiée avec succès');
            return redirect()->intended('/categories');
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
            $category->delete();
            return redirect()->back()->with('success', 'Categorie supprimée avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function searchCategory(Request $request)
    {
        try {
            $categories = Category::where('type', 'like', '%' . $request->search . '%')->get();
            return view('pages.categories', compact('categories'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
