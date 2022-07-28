<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use Redirect;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all the products an categories
        $articles = Article::all();
        $categories = Category::all();

        // Return the articles view from dashboard with all articles and categories
        return view('dashboard.management.articles.articles', ['articles' => $articles, 'categories' => $categories]);
    }

    public function articles($article_id)
    {
        // Get all the products an categories
        $article = Article::find($article_id);

        // Return the products view from dashboard with all products and categories
        return view('dashboard.management.articles.show', ['article' => $article]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get all categories
        $categories = Category::all();

        // Return to the create article view with all the categories
        return view('dashboard.management.articles.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'category_name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'author' => 'required',
            'status' => 'required',
        ]);

        $image_path = $request->file('image')->store('articles', 'public');
        
        // dd(Storage::url($image_path));
        // Get category by category name
        $category = Category::find($request->category_name);

        // Asign to data variable an array with all the fiels needed 
        $data = [
            'category_id' => $category->id,
            'category_name' => $category->category_name,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image_path,
            'author' => $request->author,
            'status' => $request->status
        ];

        // Create a new article and set all the attributes
        $article = new Article;
        $article->category_id = $data['category_id'];
        $article->category_name = $data['category_name'];
        $article->title = $data['title'];
        $article->description = $data['description'];
        $article->image = $data['image'];
        $article->author = $data['author'];
        $article->status = $data['status'];
        $article->created_at = date('Y-m-d H:i:s');

        // Save the article in database
        $article->save();

        // Redirect user back to the create product view with a message
        return Redirect::back()->with('status', 'Article created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($article_id)
    {
        // Get a specified article by id
        $article = Article::find($article_id);

        // Return the product view with the article specified
        return view('dashboard.management.articles.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($article_id)
    {
        // Get a product my article id
        $article = Article::find($article_id);
        $categories = Category::all();

        // Return to the edit product view with that specified product
        return view('dashboard.management.articles.edit', ['article' => $article, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $article_id)
    {
        
        // Create an array article
        $article = [];
        //$image_path = $request->file('image')->store('public/images');


        // Asign to data variable an array with all the fiels what are supposed to be changed 

        $category = Category::find($request->category_name);

        $data = [
            'category_id' => $category->id,
            'category_name' => $category->category_name,
            'title' => $request->title,
            'description' => $request->description,
            'image' => null,
            'author' => $request->author, 
            'status' => $request->status,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Check if any input is empty and skip it getting only the input with an value
        foreach ($data as $key => $value) {
            if ($value != "") {
                $article[$key] = $value;
            }
        }
        
        // Update article where article id with the inputs filled
        Article::whereId($article_id)->update($article);

        // Redirect back tot the edit article view with an message
        return Redirect::back()->with('status', 'Article edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($article_id)
    {
        // Get the product by article id
        $article = Article::find($article_id);

        // Delete the article with article id specified 
        Article::whereId($article_id)->delete();

        // Redirect back to the produce view with a message
        return Redirect::back()->with('status', 'Article deleted!');
    }
}
