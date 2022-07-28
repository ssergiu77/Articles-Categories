<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use Redirect;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all categories
        $categories = Category::all();

        // Return to the categories view with all categories
        return view('dashboard.management.categories.categories', ["categories" => $categories]);
    }

    public function products($category_name)
    {

        // Get all categories and all product by category name for users
        $data = [
            'categories' => Category::all(),
            'articles' => Article::where('category_name', $category_name)->paginate(3)
        ];

        // Return to the categories show view with the data and category name
        return view('dashboard.management.categories.show', ['data' => $data, 'category_name' => $category_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return categories create view
        return view('dashboard.management.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);
        
        // Get category name
        $categoryName = $request->category_name;

        // Create a new category
        $category = new Category;

        // Set category name by the admin input
        $category->category_name = $request->category_name;

        // Save category
        $category->save();

        // Redirect back to the create category page with a message
        return Redirect::back()->with('status', 'Category created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category_id)
    {
        $category = Category::findOrFail($category_id);
        return view('dashboard.management.categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($category_id)
    {
        // Get category by the id
        $category = Category::find($category_id);

        // Send all data from that specify category to the view.
        return view('dashboard.management.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_id)
    {
        // Set categoty_name the value from the admin input
        $data = ['category_name' => $request->category_name];

        // Get the product by category_id
        $products = Article::where('category_id', $category_id)->get();

        // Update the product where category id is the same and update the category name
        Article::where('category_id', $category_id)->update($data);

        // Update category name where category id is the same
        Category::whereId($category_id)->update($data);

        // Redirect back tot the edit category page with a message
        return Redirect::back()->with('status', 'Category edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        // Get category by category id
        $category = Category::find($category_id);

        // Get product where category id is the same and delete all the product with that specify category id
        Article::where('category_id', $category_id)->delete();

        // Delete category where category id is the same
        Category::whereId($category_id)->delete();

        // Redirect back to the category page with a message;
        return Redirect::back()->with('status', 'Category deleted!');
    }
}
