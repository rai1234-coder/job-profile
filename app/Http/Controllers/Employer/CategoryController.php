<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('user_id', Auth::id())->latest()->get();
        return view('employer.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employer.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
        'name' => 'required|string|max:255'
    ]);

    Category::create([
        'user_id' => auth()->id(),
        'name' => $request->name,
    ]);

    return redirect()->route('category.index')->with('success', 'Category added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('employer.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

            if (auth()->id() !== $category->user_id) {
        return back()->with('error', 'You are not authorized to update this job.');
    }


            $request->validate([
            'name' => 'required|string|max:255',
        ]);

            Category::create([
        'user_id' => auth()->id(),
        'name' => $request->name,
    ]);
    return redirect()->route('category.index')->with('success', 'Category updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
                    // Ensure the logged-in user owns the job
            if (auth()->id() !== $category->user_id) {
                return back()->with('error', 'You are not authorized to delete this job.');
            }

             $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully!');
    }
}
