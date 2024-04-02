<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;


    class Login extends Controller
    {

        public function index(){
           
        }
        public function valid_auth(Request $req)
        {
            // Validate request data
            
            // $username = $req->username;
            $email = $req->email;
            $password = $req->password;
            $json = array();

            $validator = Validator::make($req->all(), [
                // 'username' => 'required',
                'email' => 'required|email',
                'password' => 'required',
            ]);
        
            // Check if validation fails
            if ($validator->fails()) {
                $json['message'] = 'Please fill all required fields !';
                $json['alert_class'] = 'alert-danger';
                // $json['errors'] = $validator->errors()->toArray();
        
                return response()->json($json);
            }

            // Find the admin by email
            $admin = Admin::where('email', $email)->first();
            // $admin = Admin::where('email', $email)->Where('name', $username)->first();

            // Check if admin exists and password is correct
            if ($admin && Hash::check($password, $admin->password)) {
                Auth::login($admin);
                $req->session()->put('user_name',$admin->name);
                $json['message'] = 'Login successfull redirecting to you dashboard....';
                $json['alert_class'] = 'alert-success';
                $json['redirect_url'] = 'admin/dashboard';
            } else {
                $json['message'] = 'Technical error occured while login !';
                $json['alert_class'] = 'alert-danger';
            }

            // Use response() instead of echo json_encode()
            return response()->json($json);
        }

        // dashboard page r
            public function dashboard()
            {
              
                // Retrieve user's name from the session
                $data['userName']    = session('user_name');
                if( $data['userName'] == ''){
                    return redirect()->route('admin');
                }
                $selectedFields = ['id','account_no', 'name','address']; // Replace with your actual field names
    
                $data['order_info'] = DB::table('customers')->get();
                    
                    // print_r($data);
                    // die;
                $data['total_orders'] = DB::table('customers')->count();
    
    
            $selectedFieldss = ['id','item_code', 'price','supplier', 'item_name', 'selling_name', 'image']; // Replace with your actual field names

            $data['inventory_info'] = DB::table('inventory')
                ->select($selectedFieldss)
                ->where('status', '=', 1) // Replace with your actual column and value
                ->limit(8)
                ->get();
                // Pass the user's name to the dashboard view
                return view('admin.viw_dashboard', $data);
            }

            // Logout 
            public function logout(){
                session()->flush();
                Auth::logout();
                return redirect()->route('admin');
            }
            
            
            
                    

    }