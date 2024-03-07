<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $pagination = 8;

    public function index(Request $request)
    {
        $keyword = $request->keyword ?? '';
        $categories = json_decode($request->categories ?? '[]', true);

        $product = Product::when($keyword, function ($query, $value) {
            $query->where('name', $value);
        })->when($categories, function ($query, $value) {
            $query->whereIn('category_id', $value);
        })->paginate($this->pagination);

        $category = Category::all();
        return view('home', compact('product', 'category', 'keyword', 'categories'));
    }
}
