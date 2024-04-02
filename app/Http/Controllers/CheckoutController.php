<?php 
// CartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CheckoutController extends Controller
{

        public function index(Request $request){
            $data['cart_info'] = $request->session()->get('cart', []);
            return view('front.viw_checkout',$data);
        }

        public function order_insert(Request $request)
        {
            $post_data = $request->input();
            // echo '<pre>';print_r($post_data);die;
            DB::table('customer')->insert([
                'name' => $post_data['name'],
                'account_no' => $post_data['account_no'],
                'address' => $post_data['address'],
                'total' => $post_data['total'],
            ]);

            return redirect()->route('shop.cart.checkout')->with('success', 'Order has been placed Successully !');

        }

}