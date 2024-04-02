<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use App\Models\Requests;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    /**
     * Add items to the cart.
     */
    public function addToCart(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'id' => 'required|exists:items,id',
            // Add more validation rules as needed
        ]);

        // Fetch the item from the database
        $item = Items::findOrFail($request->input('id'));

        // Add the item to the cart with image attribute
        Cart::add([
            'id' => $item->id,
            'name' => $item->name,
            'price' => 0,
            'weight' => 0,
            'qty' => 1,
            'image' => Storage::url($item->image), // Get the image URL from storage
            // 'attributes' => [], // You can add additional attributes if needed
        ]);

        return redirect()->back()->with('success', 'Item added to cart successfully.');
    }

    /**
     * Remove an item from the cart.
     */
    public function removeFromCart($rowId)
    {
        // Remove the item from the cart using its row ID
        Cart::remove($rowId);

        return redirect()->back()->with('success', 'Product removed from cart successfully.');
    }

    public function destroyCart()
    {
        try {
            // Destroy the cart
            Cart::destroy();

            // Return success response
            return response()->json(['message' => 'Cart successfully destroyed'], 200);
        } catch (\Exception $e) {
            // Return error response
            return response()->json(['error' => 'Failed to destroy cart'], 500);
        }
    }

    /**
     * Checkout the items in the cart.
     */
    public function checkout()
    {
        // Retrieve cart data from session or database
        $cart = session()->get('cart', []);

        // Create a new request for checkout
        foreach ($cart as $cartItem) {
            Requests::create($cartItem);
        }

        // Clear the cart after checkout
        session()->forget('cart');

        // Redirect with success message
        return redirect()->route('requests.create')->with('success', 'Checkout successful!');
    }
}
