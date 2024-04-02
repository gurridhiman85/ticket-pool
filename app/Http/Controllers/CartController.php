<?php 
// CartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Retrieve input data from the request
        $post_data = $request->input();
    
        // Ensure that required keys are present in $post_data
        $product_id = $post_data['product_id'] ?? null;
        $product_name = $post_data['product_name'] ?? null;
        $product_price = $post_data['product_price'] ?? null;
        $product_image = $post_data['product_image'] ?? null;
        $product_qty = $post_data['product_qty'] ?? null;
    
        // Check if any required key is missing
        if ($product_id === null || $product_name === null || $product_price === null || $product_image === null) {
            // Handle the missing data, e.g., return an error response
            return response()->json(['error' => 'Invalid product data'], 400);
        }
    
        // Create a product array
        $product = [
            'id' => $product_id,
            'item_name' => $product_name,
            'price' => $product_price,
            'product_image' => $product_image,
            'product_qty' => $product_qty, // Assuming you always start with a quantity of 1
            // Add other product details as needed
        ];
    
        // Get the current cart from the session
        $cart = $request->session()->get('cart', []);
    
        // Check if the product is already in the cart
        if (isset($cart[$product_id])) {
            // Increment the quantity if the product is already in the cart
            $cart[$product_id]['product_qty']++;
        } else {
            // Add the product to the cart with a quantity of 1
            $cart[$product_id] = $product;
        }
        isset($cart[$product_id]['product_image']) ? $cart[$product_id]['product_image'] : null;
        isset($cart[$product_id]['product_qty']) ? $cart[$product_id]['product_qty'] : null;
        // Update the cart in the session
        $request->session()->put('cart', $cart);
    
        // Retrieve the cart data from the session
        $data['cart_info'] = $request->session()->get('cart', []);
        // echo '<pre>';print_r($data['cart_info']);die;
        // Check if the 'product_image' key exists before accessing it
        $imageForProduct = isset($cart_data[$product_id]['product_image']) ? $cart_data[$product_id]['product_image'] : null;
        // Additional code...
    
        // Return a response or redirect to a view as needed
        return view('front.viw_cart', $data);
    }
    

    public function view_cart(Request $request)
    {
        $data['cart_info'] = $request->session()->get('cart', []);

        return view('front.viw_cart',$data);
    }

    // Remove a product to cart
        public function remove_product($productId)
        {
            // Get the current cart from the session
            $cart = session()->get('cart', []);

            // Check if the product is in the cart
            if (isset($cart[$productId])) {
                // Remove the product from the cart
                unset($cart[$productId]);

                // Update the session with the modified cart
                session()->put('cart', $cart);

                return redirect()->route('viewcart')->with('success', 'Product removed from the cart!');

                // Return a JSON response with success message and updated cart data
                // return response()->json([
                //     'message' => 'Product removed from the cart!',
                //     'cart' => $cart,
                // ]);
            }
            return redirect()->route('viewcart')->with('success', 'Inventory Updated Successfully!');
            // Return a JSON response with an error message if the product is not in the cart
            // return response()->json([
            //     'message' => 'Product not found in the cart!',
            // ], 404);
        }

}
?>