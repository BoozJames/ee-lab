<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use App\Models\Requests;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    /**
     * Add items to the cart.
     */
    public function addToCart(Request $request)
    {
        // Fetch the item from the database
        $item = Items::findOrFail($request->input('id'));

        // Get the count of item variants associated with the item
        $availableQuantity = $item->itemVariants->count();

        // Log the available quantity
        Log::info('Available Quantity: ' . $availableQuantity);

        // Get the requested quantity from the request
        $requestedQuantity = $request->input('quantity', 1); // Default to 1 if quantity is not provided

        // Log the requested quantity
        Log::info('Requested Quantity: ' . $requestedQuantity);

        // Get the quantity of the item in the cart
        $cartQuantity = Cart::content()->where('id', $item->id)->sum('qty');

        // Log the quantity in the cart
        Log::info('Quantity in Cart: ' . $cartQuantity);

        // Calculate the total available quantity considering the items already in the cart
        $totalAvailableQuantity = $availableQuantity - $cartQuantity;

        // Log the total available quantity
        Log::info('Total Available Quantity: ' . $totalAvailableQuantity);

        // Check if the requested quantity exceeds the total available quantity
        if ($requestedQuantity > $totalAvailableQuantity) {
            Log::info('Requested quantity exceeds total available quantity.');
            return redirect()->back()->with('error', 'Requested quantity exceeds available quantity.');
        }

        // Add the item to the cart with image attribute
        Cart::add([
            'id' => $item->id,
            'name' => $item->name,
            'price' => 0,
            'weight' => 0,
            'qty' => $requestedQuantity, // Add the requested quantity to the cart
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
