<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $categories = Category::when($request->search , function($q) use ($request){


            return $q->whereTranslationLike('name', '%' . $request->search . '%');


       })->latest()->paginate(5);

       return view('dashboard.categories.index', compact('categories'));
    }// end of index

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.categories.create');

    }// end of create

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request->all());
        $request->validate([

            'ar.*' => 'required|unique:category_translations,name',
            'en.*' => 'required|unique:category_translations,name',

        ]);

        Category::create($request->all());

        session()->flash('success', __('site.added_successfully'));


        return redirect(route('dashboard.categories.index'));

    }// end of store


    public function edit(Category $category)
    {
        return view('dashboard.categories.edit' , compact('category'));
    }// end of edit

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'ar.name' => 'required|unique:category_translations,name',
            'en.name' => 'required|unique:category_translations,name',

        ]);

        $category->update($request->all());

        session()->flash('success', __('site.updated_successfully'));


        return redirect(route('dashboard.categories.index'));
    }// end of update

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        session()->flash('success', __('site.deleted_successfully'));


        return redirect(route('dashboard.categories.index'));
    }// end of delete
}// end of controller
