<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


    class StaffController extends Controller
    {
        public function index(){

            $data['userName'] = session('user_name');
            $data['total_orders'] = DB::table('staff')->count();

            return view('admin.administration.viw_staff',$data);
        }

        /******************************** Insert staff********************************************* */
  public function insert_staff(Request $req)
	{
	    try {
		$req->validate([
		    'first_name' => 'required',
		    'last_name' => 'required',
		    'PrimaryEmail' => 'required',
		    'WorkPhone' => 'WorkPhone', 
		]);

		 

		DB::table('staff')->insert([
		    'first_name' => $req->input('first_name'),
		    'last_name' => $req->input('last_name'),
		    'Position' => $req->input('Position'),
		    'PrimaryEmail' => $req->input('PrimaryEmail'),
		    'WorkPhone' => $req->input('WorkPhone'),
		    'MobilePhone' => $req->input('MobilePhone'),
		    'HomePhone' => $req->input('HomePhone'),
		    'AdminPortalAccess' => $req->input('AdminPortalAccess'),
		    'cbDeleted' => $req->input('cbDeleted'),
		    'cbRestricted' => $req->input('cbRestricted'),
		    'created_at' => date('y-m-d H:i:s'),
		]);

		return redirect()->route('admin/staff')->with('success', 'staff Added Successfully!');
	    } catch (\Exception $e) {
		// Log or echo the error for debugging
		// Log::error($e->getMessage());
		echo 'Error: ' . $e->getMessage();
		// Redirect back with an error message if needed
	//	return redirect()->back()->with('error', 'Error adding staff. Please try again.');
	    }
	}
        /******************************** List staff********************************************* */
        public function get_staff(){
            $data['userName'] = session('user_name');
           
            $data['staff_info'] = DB::table('staff')
                
               // ->where('status', '=', 1) // Replace with your actual column and value
                ->get();
                $data['total_orders'] = DB::table('customers')->count();
    
            return view('admin.administration.viw_staff_list',$data);
        }

        /******************************** update staff********************************************* */
        public function update_staff(Request $req){
            $post_data = $req->input();
                    // Check if the item with the given item_code exists
            $existingItem = DB::table('staff')->where('id', $post_data['id'])->first();

            if (!$existingItem) {
                return redirect()->route('admin/staff/list')->with('error', 'Item not found.');
            }

            // Check if a new image is uploaded
            if ($req->hasFile('item_image')) {
                $originalImageName = $req->file('item_image')->getClientOriginalName();
                $imagePath = $req->file('item_image')->storeAs("images/staff", $originalImageName, 'public');
            } else {
                // If no new image is uploaded, keep the existing image path
                $originalImageName = $existingItem->image;
            }

            // Update the record in the database
            DB::table('staff')
                ->where('id', $post_data['id'])
                ->update([
                    'item_code' => $post_data['item_code'],
                    'supplier' => $post_data['supplier'],
                    'item_name' => $post_data['item_name'],
                    'selling_name' => $post_data['selling_name'],
                    'image' => $originalImageName,
                ]);
                $data['total_orders'] = DB::table('customers')->count();
            return redirect()->route('admin/staff/list')->with('success', 'staff Updated Successfully!');

        }

        /******************************** Delete staff********************************************* */
        public function delete_staff($id){
            $existingItem = DB::table('staff')->where('id', $id)->first();

            if (!$existingItem) {
                return redirect()->route('admin/staff/list')->with('error', 'Item not found.');
            }
        
            // Delete the record from the database
            DB::table('staff')->where('id', $id)->delete();
            $data['total_orders'] = DB::table('customers')->count();

            return redirect()->route('admin/staff/list')->with('success', 'staff Deleted Successfully!');
        }

       public function Permission()
       {
        $data['userName'] = session('user_name');
        $data['total_orders'] = DB::table('staff')->count();
        return view('admin.permission',$data);
       }   
    }
 
?>    