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
    }

    public function update(Request $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        //
    }
}
