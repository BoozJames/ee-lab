<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requests;

class CartController extends Controller
{
    /**
     * Add items to the cart.
     */
    public function addToCart(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'reference_number' => 'required|string',
            'items' => 'required|array',
            'requestors' => 'required|array',
            'item_variants' => 'array', // Add validation for item variants
            // Add more validation rules as needed
        ]);

        // Store the cart data in session or database, depending on your application logic
        // For example, you can store the cart data in session
        $cart = session()->get('cart', []);

        // Append the new item to the cart
        $cart[] = $validatedData;

        // Store the updated cart in session
        session()->put('cart', $cart);

        // Redirect back or to a specific route
        return redirect()->back()->with('success', 'Item added to cart successfully!');
    }

    /**
     * Remove an item from the cart.
     */
    public function removeFromCart($index)
    {
        // Retrieve cart data from session
        $cart = session()->get('cart', []);

        // Remove the item from the cart at the specified index
        unset($cart[$index]);

        // Reindex the array to maintain sequential keys
        $cart = array_values($cart);

        // Store the updated cart in session
        session()->put('cart', $cart);

        // Redirect back or to a specific route
        return redirect()->back()->with('success', 'Item removed from cart successfully!');
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
