<?php

namespace App\Http\Controllers;
use App\Models\Customers;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $searchQuery = $request->input('search'); // change from 'query' to 'search'
        
        $customers = Customers::where('name', 'LIKE', "%$searchQuery%")->get();
        
        return view('admin.customer.index', compact('customers'));
    }

    public function searchData(Request $request)
    {
        $output = ''; 
    
        $customers = Customers::where('name', 'LIKE', '%' . $request->search . '%')->get();
        
        foreach ($customers as $customer) {
            $output .=
            '<li>' . $customer->name . '</li>';
        }
    
        return response()->json($output);
    }
}