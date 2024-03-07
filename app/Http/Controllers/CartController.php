<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        $product = Product::all();
        $category = Category::all();
        $user_id = Auth::user()->id;
        $cart = Cart::with('product.category', 'user',)->where('user_id', $user_id)->get();
        return view('cart.index', compact('cart', 'product', 'category', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        if (Auth::user()->is_admin) {
            return redirect('/')->with('message', 'Cart can only be accessed for customers');
        }
        $cart = Cart::where('user_id', $user_id)->where('product_id', $request->id)->first();
        if ($cart) {
            $cart->update([
                'quantity' => $cart->quantity + $request->quantity,
            ]);
            return redirect('/cart')->with('message', 'Product Add To Cart Successfully');
        }
        Cart::create([
            'user_id' => $user_id,
            'product_id' => $request->id,
            'quantity' => $request->quantity ?? 1,
        ]);
        return redirect('/cart')->with('message', 'Product Add To Cart Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
