<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        // Get all products orderted by the created at desc and take 6 of the to the view
        $articles = Article::orderBy('created_at','desc')->take(6)->get();
        
        // Get all categories
        $categories = Category::all();
        
        // Return the home view with the products and categories
        return view('home', ["articles" => $articles, "categories" => $categories]);
    }

    public function products($category_name)
    {
        // Get all categories and all product by category name for users
        $data = [
            'categories' => Category::all(),
            'articles' => Article::where('category_name', $category_name)->paginate(3)
        ];

        // Return to the categories show view with the data and category name
        return view('dashboard.management.categories.showUsers', ['data' => $data, 'category_name' => $category_name]);
    }
}
