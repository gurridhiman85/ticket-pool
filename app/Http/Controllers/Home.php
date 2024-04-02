<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


    class Home extends Controller
    {
        public function index(){
            $selectedFields = ['id','item_code', 'price','supplier', 'item_name', 'selling_name', 'image']; // Replace with your actual field names

            $data['inventory_info'] = DB::table('inventory')
                ->select($selectedFields)
                ->where('status', '=', 1) // Replace with your actual column and value
                ->limit(8)
                ->get();
            return view('front.viw_index',$data);
        }
    }