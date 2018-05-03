<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Respositories\CategoryRepository;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->middleware('auth');
        $this->categoryRepository = $categoryRepository;
    }
    public function index()
    {
        // dd($category);
        //
        $categories = $this->categoryRepository->listAllCategories();

        return view('categories.categories',['categories'=>$categories]);

        // dd("list categories");
    }

    public function store(Request $request)
    {
        //
        $rules  = [
            'name' => 'required',
            'description' => 'required',
        ];
        $this->validate($request,$rules);

        $category = $request->all();

        Category::create($category);

        return back()->with('success','Successfully added category.');
    }

    public function show(Category $category)
    {
        //
        return view('categories.edit',['category'=>$category]);
    }

    public function update(Request $request, Category $category)
    {
        //
        $category->fill($request->only([
            'name', 'description'
        ]));

        if($category->isClean())
        {
            return back()->withErrors('You need to specify different value for update.');
        }

        $category->save();

        return back()->with('success','Successfully updated.');
    }

    public function destroy(Category $category)
    {
        //
        $category->delete();

        return back();
    }
}
