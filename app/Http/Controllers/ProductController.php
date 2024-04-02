<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index($product_id){
        // echo $product_id;die;
        $selectedFields = ['id','item_code', 'price','supplier', 'item_name', 'selling_name', 'image']; // Replace with your actual field names
        $data['inventory_info'] = DB::table('inventory')
        ->select($selectedFields)
        ->where('id', '=', $product_id) // Replace with your actual column and value
        ->first();
        return view('front.viw_product_info',$data);

    }

    public function products_listing(){
        $selectedFields = ['id','item_code', 'price','supplier', 'item_name', 'selling_name', 'image']; // Replace with your actual field names

        $data['inventory_info'] = DB::table('inventory')
            ->select($selectedFields)
            ->where('status', '=', 1) // Replace with your actual column and value
            ->get();
        return view('front.viw_product',$data);
    }
}