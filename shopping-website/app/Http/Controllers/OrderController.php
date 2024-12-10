<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function showOrder(Request $request) {
        $cartId = Session::get('cart_id');
        $cartItems = CartItem::with('product')->where('cart_id', $cartId)->get();
        $categories = DB::table('product_categories')->get();
        return view('pages.checkout-summary', [
            'cartItems' => $cartItems,
            'categories' => $categories,
            'cartItemsCount' => $cartItems->sum('quantity')
        ]);
    }

    public function viewPlacedOrder($orderId) {
        $order = Order::where('id', $orderId)->first();
        $cart = Cart::where('id', $order->cart_id)->first();
        $cartItems = CartItem::where('cart_id', $cart->id)->with('product')->get();

        $currentId = Session::get('cart_id');
        $cartItemsCount = 0;

        if($currentId)
            $cartItemsCount = CartItem::where('cart_id', $currentId)->sum('quantity');

        return view('pages/order', [
            'order' => $order,
            'items' => $cartItems,
            'cartItemsCount' => $cartItemsCount,
            'categories' => DB::table('product_categories')->get()
        ]);
    }
    public function processOrder(Request $request) {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' =>  'required|string',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'address1' => 'required|string',
            'address2' => 'nullable|string',
            'city' => 'required|string',
            'province' => 'required|string',
            'postalCode' => 'required|string|size:6'
        ]);

        $cartId = Session::get('cart_id');
        $cartItems = CartItem::where('cart_id', $cartId)->get();
        $totalItems = $cartItems->sum('quantity');
        $baseTotal = $cartItems->sum( fn($item) => $item->quantity * $item->product->price);
        $tax = round( $baseTotal * 0.13, 2, PHP_ROUND_HALF_UP);
        $shipping = ( $baseTotal > 80 ) ? 0 : round($baseTotal * 0.2, 2, PHP_ROUND_HALF_DOWN);
        $totalCost = $baseTotal + $tax + $shipping;

        $address = implode(',', [
            $request->input('address1'),
            $request->input('address2'),
            $request->input('city'),
            $request->input('province'),
            $request->input('postalCode'),
        ]);

        $orderNumber = strtoupper(Str::random(8));

        $order = new Order([
            'user_id' => auth()->id(),
            'cart_id' => $cartId,
            'base_total' => $baseTotal,
            'total_items' => $totalItems,
            'tax' => $tax,
            'shipping' => $shipping,
            'total_cost' => $totalCost,
            'address' => $address,
            'order_number' => $orderNumber,
        ]);

        $order->save();
        Session::forget('cart_id');
        return redirect('/')->with('success', 'Your order has been placed successfully!');

    }
}
