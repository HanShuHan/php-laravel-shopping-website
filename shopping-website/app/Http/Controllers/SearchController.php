<?php

//Written by David Currey

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // Get the search query from the request
        $query = $request->input('query');

        // Search the products table for matching items and paginate the results
        $products = Product::where('name', 'like', '%' . $query . '%')->paginate(12);
        $cart = Cart::where('id', Session::get('cart_id'));
        $cartItemCount = CartItem::where('cart_id', $cart->value('id'))->sum('quantity');
        $categories = DB::table('product_categories')->get();
        // Return the search results view with the products
        return view('pages.search-results', [
            'products' => $products,
            'cartItemsCount' => $cartItemCount,
            'categories' => $categories,
            'query' => $query,
            'onSale' => false
        ]);
    }

    public function listOnSale() {
        $cart = Cart::where('id', Session::get('cart_id'));
        $products = Product::where('is_on_sale', true)->paginate(12);
        $cartItemCount = CartItem::where('cart_id', $cart->value('id'))->sum('quantity');
        $categories = DB::table('product_categories')->get();
        return view('pages.search-results', [
            'products' => $products,
            'cartItemsCount' => $cartItemCount,
            'categories' => $categories,
            'onSale' => true

        ]);
    }
}
