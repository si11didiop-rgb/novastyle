<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $featured = Product::with('category')
            ->where('stock', '>', 0)
            ->latest()
            ->take(4)
            ->get();

        $categories = Category::all();

        return view('home', compact('featured', 'categories'));
    }
}