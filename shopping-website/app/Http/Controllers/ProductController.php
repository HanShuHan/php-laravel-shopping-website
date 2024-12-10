<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function listItems($categoryName)
    {
        $categories = DB::table('product_categories')->get();
        $cartItemsCount = 0;
        if (session()->has('cart_id')) {
            $cartId = session('cart_id');
            $cartItemsCount = CartItem::where('cart_id', $cartId)->sum('quantity');
        }
        if ($categoryName === 'all') {
            $products = DB::table('products')->paginate(8);
        } else {
            $categoryId = DB::table('product_categories')->where('name', $categoryName)->value('id');
            $products = DB::table('products')->where('category_id', $categoryId)->paginate(8);
        }

        return view('pages/product-listing', [
            'categories' => $categories,
            'products' => $products,
            'cartItemsCount' => $cartItemsCount
        ]);
    }

    public function index(Request $request)
    {
        $product = DB::table('products')->where('id', '=', $request->route('product_id'))->first();
        $categories = DB::table('product_categories')->get();
        $category = DB::table('product_categories')->where('id', '=', $product->category_id)->value('name');
        $cartItemsCount = 0;
        $backURL = (string)$request->input('url');
        if ($request->input('page')) {
            $backURL = $request->input('searching_category') . '?page=' . $request->input('page');
            if (!Str::contains($backURL, 'sales')) {
                $backURL = '/products/' . $backURL;
            }
        }
        if (session()->has('cart_id')) {
            $cartId = session('cart_id');
            $cartItemsCount = CartItem::where('cart_id', $cartId)->sum('quantity');
        }
        return view('pages/product', [
            'product' => $product,
            'categories' => $categories,
            'category' => $category,
            'cartItemsCount' => $cartItemsCount,
            'backURL' => $backURL
        ]);
    }

    public
    function addToCart($product_id)
    {
        $cartId = Session::get('cart_id');

        if (!$cartId) {
            $cart = new Cart;
            $cart->id = fake()->uuid();
            $cart->user_id = Auth::id();
            $cart->total_cost = 0;
            $cart->save();
            Session::put('cart_id', $cart->id);
        } else {
            $cart = Cart::find($cartId);
        }

        if (!$cart) {
            // If the cart does not exist in the database, create a new cart and save it
            $cart = new Cart;
            $cart->id = fake()->uuid();
            $cart->user_id = Auth::id();
            $cart->total_cost = 0;
            $cart->save();
            Session::put('cart_id', $cart->id);
        }

        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product_id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            $cartItem = new CartItem;
            $cartItem->id = fake()->uuid();
            $cartItem->cart_id = $cart->id;
            $cartItem->product_id = $product_id;
            $cartItem->quantity = 1;
            $cartItem->save();
        }

        $previousUrl = URL::previous();
        $productPageUrl = route('product.index', $product_id);

        if ($previousUrl == $productPageUrl) {
            return redirect($productPageUrl)->with('success', 'Added to cart succesfully');
        } else {
            return redirect($previousUrl)->with('success', 'Added to cart succesfully');
        }
    }

    public
    function create()
    {
        $categories = ProductCategory::all();
        return view('pages/product-create', compact('categories'));
    }

    public
    function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'nullable|numeric',
            'rating' => 'integer|between:0,5',
            'rating_count' => 'integer|min:0',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048'
            // Add validation rules for other fields here
        ]);
        $data['category_id'] = $request->category_id;
        // Handle file upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = $file->store('photos', 'public');
            $data['photo'] = $path;
        }
        $product = Product::create($data);

        return redirect()->route('product.create')->with('success', 'Product added successfully');
    }
}
