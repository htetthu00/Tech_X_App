<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function index() 
    {
        $this->checkRolePermission('view-category');
        if(request()->ajax()) {
            $query = Category::query();

            return DataTables::of($query)
                    ->order(function ($query) {
                        $query->orderBy('created_at', 'Desc');
                    })
                    ->addColumn('created_date', function ($admin) {
                        return Carbon::parse($admin->created_at)->format('d M, Y');
                    })
                    ->addColumn('action', function($category) {
                        return view('backend.category.partials.category_table_action', ['category' => $category]);
                    })
                    ->rawColumns(['action', 'created_date'])
                    ->make(true);
        }
        return view('backend.category.index');
    }

    public function create() : View
    {
        return view('backend.category.create');
    }

    public function store(Request $request) : RedirectResponse
    {
        $attributes = $request->validate([
            'title' => 'required'
        ]);

        Category::create($attributes);

        return redirect()->route('categories.index')->with(['create_status' => 'Category Successfully Created!']);
    }

    public function edit(Category $category) : View
    {
        return view('backend.category.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category) : RedirectResponse
    {
        $attributes = $request->validate([
            'title' => 'required'
        ]);

        $category->update($attributes);

        return redirect()->route('categories.index')->with(['update_status' => 'Category Successfully Updated!']);
    }

    public function destroy(Category $category) : RedirectResponse
    {
        $category->delete();
        
        return back()->with(['delete_status' => 'Category Successfully Deleted!']);
    }
}
