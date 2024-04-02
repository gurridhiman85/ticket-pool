<?php 
// AccountingController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AccountingController extends Controller
{
    
    public function index()
    {
           $data['userName'] = session('user_name');

        return view('admin.Accounting.index',$data);
    }
    
    
    public function invoiceForm()
    {
           $data['userName'] = session('user_name');

           return view('admin.Accounting.create-invoice',$data);
    }
    
    
    
        public function newQuotes()
    {
           $data['userName'] = session('user_name');

           return view('admin.Accounting.create-newquote',$data);
    }
    
    
    
    // create invoice 
    public function filterCustomer(Request $request)
    {
        $keyword = $request->input('keyword');
        $items =DB::table('customers')->where('name', 'like', "%$keyword%")->get();

        return response()->json(['items' => $items]);
    }
    
    public function getItems($customerId)
    {
       $data['userName'] = session('user_name');

        
     return   $detailsResponse= DB::table('customers')->where('id',$customerId)->first();
         
       
    }
    
         public function saveInvoice(Request $request)
        {
            dd($request->all());
             
        }
    
}