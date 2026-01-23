<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\AddCategoryRequest;
use App\Http\Requests\Admin\Category\UpadateCategoryRequest;
use App\Http\Requests\Admin\Category\UpadteCategoryRequest;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories=Category::paginate(4);

    //         $search = $request->input('search');

    // $categories = Category::when($search, function ($query, $search) {
    //     $query->where('name', 'LIKE', "%{$search}%");
    // })->get();


        return View('dashbord.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashbord.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddCategoryRequest $request)
    {



    $data = $request->validated();


      Category::create($data);


        return redirect()->route('categories.index')->with('success', 'تم إضافة البيانات بنجاح');

    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

        return view('dashbord.categories.edit',compact('category'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpadateCategoryRequest $request, Category $category)
    {
            $data = $request->validated();

           $category->update($data);

            return Redirect()->route('categories.index')->with('update', 'تم تعديل البيانات بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {

        $category->delete();
        return back()->with('error','تم حذف البايانات بنجاح');
    }
}
