<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use App\Models\Requests;
use App\Models\Students;
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

    /**
     * Remove all the items in the cart.
     */
    public function destroyCart()
    {
        try {
            // Destroy the cart
            Cart::destroy();

            // Log success message
            Log::info('Cart successfully destroyed');

            // Return success response
            return response()->json(['message' => 'Cart successfully destroyed'], 200);
        } catch (\Exception $e) {
            // Log error message
            Log::error('Failed to destroy cart: ' . $e->getMessage());

            // Return error response
            return response()->json(['error' => 'Failed to destroy cart'], 500);
        }
    }

    /**
     * Checkout the items in the cart.
     */
    public function checkout()
    {
        try {
            // Get items and requestors from the cart
            $cartItems = Cart::content()->toArray();
            $requestors = Cart::content()->pluck('options.student_details')->toArray();

            // Create a new request
            $request = new Requests();
            $request->items = $cartItems;
            $request->requestors = $requestors;
            // Leave item_variants blank for now
            $request->save();

            // Destroy the cart after successful checkout
            Cart::destroy();

            // Log success message
            Log::info('Items checked out successfully');

            // Redirect to '/' route with success message
            return redirect()->route('print')->with('success', 'Items checked out successfully');
            // return redirect('/')->with('success', 'Items checked out successfully');
        } catch (\Exception $e) {
            // Log error message
            Log::error('Failed to checkout items: ' . $e->getMessage());

            // Redirect back to '/cart/requestors' route with error message
            return redirect('/cart/requestors')->with('error', 'Failed to checkout items');
        }
    }

    /**
     * Show the requestors associated with items in the cart.
     */
    public function showRequestors()
    {
        // Get the requestors associated with items in the cart
        $requestors = Cart::content()->pluck('requestor')->unique();

        return view('requestors', compact('requestors'));
    }

    /**
     * Add the requestors with items in the cart if it exist in the Student model.
     */
    public function addRequestorToCart(Request $request)
    {
        $rfidCode = $request->input('requestor');

        // Log the RFID code received from the request
        Log::info('RFID code received from request: ' . $rfidCode);

        // Check if the RFID code exists in the Students model
        $student = Students::where('rfid_code', $rfidCode)->first();

        if ($student) {
            // Log the student details if found
            Log::info('Student found in the database: ' . json_encode($student));

            // Check if the RFID code is already in the cart
            $existingCartItem = Cart::content()->first(function ($cartItem) use ($rfidCode) {
                return $cartItem->options->requestor && $cartItem->options->student_details['rfid_code'] === $rfidCode;
            });

            if ($existingCartItem) {
                // Log that the RFID code is already in the request
                Log::warning('RFID code is already in the request.');

                return redirect()->back()->with('error', 'RFID code is already in the request.');
            }

            // Construct full name
            $fullName = $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name . ' ' . $student->extra_name;

            // Log the full name constructed
            Log::info('Full name constructed: ' . $fullName);

            // Add the student to the cart
            Cart::add([
                'id' => uniqid(), // Generate a unique ID for the requestor
                'name' => $fullName,
                'price' => 0, // Set price to 0 or adjust as needed
                'qty' => 1, // Default quantity to 1
                'weight' => 0, // Set weight to 0 or adjust as needed
                'options' => [
                    'requestor' => true, // Flag to identify requestor in the cart
                    'student_details' => $student->toArray(), // Store student details in options
                ],
            ]);

            // Log success message
            Log::info('Requestor added to cart successfully.');

            return redirect()->back()->with('success', 'Requestor added to cart successfully.');
        } else {
            // Log that RFID code not found in the database
            Log::error('RFID code not found in the database: ' . $rfidCode);

            return redirect()->back()->with('error', 'RFID code not found in the database.');
        }
    }
}
