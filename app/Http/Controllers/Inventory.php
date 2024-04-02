<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


    class Inventory extends Controller
    {
        public function index(){

            $data['userName'] = session('user_name');
            $data['total_orders'] = DB::table('customers')->count();

            return view('admin.administration.viw_inventory',$data);
        }

        /******************************** Insert inventory********************************************* */
  public function insert_inventory(Request $req)
	{
	    try {
		$req->validate([
		    'item_code' => 'required',
		    'supplier' => 'required',
		    'item_name' => 'required',
		    'selling_name' => 'required',
		    'item_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
		]);

		$originalImageName = $req->file('item_image')->getClientOriginalName();
		$imagePath = $req->file('item_image')->storeAs("images/inventory", $originalImageName, 'public');

		DB::table('inventory')->insert([
		    'item_code' => $req->input('item_code'),
		    'supplier' => $req->input('supplier'),
		    'item_name' => $req->input('item_name'),
		    'selling_name' => $req->input('selling_name'),
		    'image' => $originalImageName,
		]);

		return redirect()->route('admin/inventory')->with('success', 'Inventory Added Successfully!');
	    } catch (\Exception $e) {
		// Log or echo the error for debugging
		// Log::error($e->getMessage());
		echo 'Error: ' . $e->getMessage();
		// Redirect back with an error message if needed
	//	return redirect()->back()->with('error', 'Error adding inventory. Please try again.');
	    }
	}
        /******************************** List inventory********************************************* */
        public function get_inventory(){
            $data['userName'] = session('user_name');
            $selectedFields = ['id','item_code', 'price','supplier', 'item_name', 'selling_name', 'image']; // Replace with your actual field names

            $data['inventory_info'] = DB::table('inventory')
                ->select($selectedFields)
                ->where('status', '=', 1) // Replace with your actual column and value
                ->get();
                $data['total_orders'] = DB::table('customers')->count();
    
            return view('admin.administration.viw_inventory_list',$data);
        }

        /******************************** update inventory********************************************* */
        public function update_inventory(Request $req){
            $post_data = $req->input();
                    // Check if the item with the given item_code exists
            $existingItem = DB::table('inventory')->where('id', $post_data['id'])->first();

            if (!$existingItem) {
                return redirect()->route('admin/inventory/list')->with('error', 'Item not found.');
            }

            // Check if a new image is uploaded
            if ($req->hasFile('item_image')) {
                $originalImageName = $req->file('item_image')->getClientOriginalName();
                $imagePath = $req->file('item_image')->storeAs("images/inventory", $originalImageName, 'public');
            } else {
                // If no new image is uploaded, keep the existing image path
                $originalImageName = $existingItem->image;
            }

            // Update the record in the database
            DB::table('inventory')
                ->where('id', $post_data['id'])
                ->update([
                    'item_code' => $post_data['item_code'],
                    'supplier' => $post_data['supplier'],
                    'item_name' => $post_data['item_name'],
                    'selling_name' => $post_data['selling_name'],
                    'image' => $originalImageName,
                ]);
                $data['total_orders'] = DB::table('customers')->count();
            return redirect()->route('admin/inventory/list')->with('success', 'Inventory Updated Successfully!');

        }

        /******************************** Delete inventory********************************************* */
        public function delete_inventory($id){
            $existingItem = DB::table('inventory')->where('id', $id)->first();

            if (!$existingItem) {
                return redirect()->route('admin/inventory/list')->with('error', 'Item not found.');
            }
        
            // Delete the record from the database
            DB::table('inventory')->where('id', $id)->delete();
            $data['total_orders'] = DB::table('customers')->count();

            return redirect()->route('admin/inventory/list')->with('success', 'Inventory Deleted Successfully!');
        }
        
        
        
        public function openModelData(request $request)
        {
          $id = ($request->id);
          $inventoryDetails = DB::table('inventory')->where('id',$id)->first();
          $inventoryWebDetails = DB::table('inventory_webdetails')->where('inventory_id',$id)->first();
           return $htmlContent = view('admin.administration.inventory_details', ['inventoryDetails' => $inventoryDetails,'inventoryWebDetails'=>$inventoryWebDetails])->render();

          
        }
        public function storeItem(Request $request)
    {
        $minimumQuantity = $request->input('txtItemDetails_MinimumQuantity');
        $maximumQuantity = $request->input('txtItemDetails_MaximumQuantity');
        $noMaximum = $request->has('cbNoMaximum') ? 1 : 0;
        $minimumProcesses = $request->input('txtItemDetails_MinimumProcesses');
        $maximumProcesses = $request->input('txtItemDetails_MaximumProcesses');
        $sizes = $request->input('txtItemDetails_Sizes');
        $colours = $request->input('txtItemDetails_Colours');
        $purchasePriceEx = $request->input('txtItemDetails_PurchasePriceEx');

        DB::table('invertory_details')->insert([
            'invertory_id'=>$request->input('inventory_id'),
            'minimum_quantity' => $minimumQuantity,
            'maximum_quantity' => $maximumQuantity,
            'no_maximum' => $noMaximum,
            'minimum_processes' => $minimumProcesses,
            'maximum_processes' => $maximumProcesses,
            'sizes' => $sizes,
            'colours' => $colours,
            'purchase_price_ex' => $purchasePriceEx,
            // 'created_at' => now(),
            // 'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Item details saved successfully');
    }
    
    public function getItemDetails($itemId) {
    
    $item =  DB::table('invertory_details')->where('id',$itemId)->first();
    return response()->json($item);
    }
        
        
        public function updateItem(Request $request) {
    $itemId = $request->input('editItemId');
    DB::table('invertory_details')->where('id',$itemId)->update([
            'minimum_quantity' => $request->input('txtItemDetails_MinimumQuantity'),
            'maximum_quantity' => $request->input('txtItemDetails_MaximumQuantity'),
            'no_maximum' => $request->has('cbNoMaximum') ? 1 : 0,
            'minimum_processes' =>  $request->input('txtItemDetails_MinimumProcesses'),
            'maximum_processes' => $request->input('txtItemDetails_MaximumProcesses'),
            'sizes' => $request->input('txtItemDetails_Sizes'),
            'colours' => $request->input('txtItemDetails_Colours'),
            'purchase_price_ex' => $request->input('txtItemDetails_PurchasePriceEx'),
            // 'created_at' => now(),
            // 'updated_at' => now(),
        ]);

    return redirect()->back(); // Redirect back to the original page
}


         public function submitForm(Request $request)
    {
       
       
        DB::table('invertory_details')->insert([
            'inventoryType'=>'Increase Stock',
            'invertory_id'=>$request->input('inventory_id'),
            'inventoryAdjustment' => $request->input('inventoryAdjustment'),
            'inventoryAdjustmentNote' => $request->input('inventoryAdjustmentNote'), 
        ]);

        // Handle form submission logic here
        // You can access form data using $request->input('fieldName')

        return redirect()->back()->with('success', 'Inventory adjusted successfully!');
    }
    
    
    
     public function webDetailsstore(Request $request)
        {
         // Validate the form data, including file uploads
    $validatedData = $request->validate([
        'txtWebTitle' => 'required',
        'txtWebDescription' => 'required',
        'txtWebCategory' => 'required',
        'inventory_id'=>'required',
        'txtWebSubcategory'=>'required',
          'txtWebAvailableSizes'=>'required',
            'txtWebAvailableColours'=>'required',
              'cbWebEnableCustomDesigner'=>'required',
              'cbMoveToProduction'=>'required', 
        //'fuPrimaryDisplayImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        //'fuOtherDisplayImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        //'fuWebPublicItemDocumentation' => 'required|file|mimes:pdf|max:10240', // max:10240 means 10MB
        // Add validation rules for other fields
    ]);
    
    

    // Handle file uploads and store in the specified folder with a new name
    $primaryImageName = 'primary_image_' . time() . '.' . $request->file('fuPrimaryDisplayImage')->getClientOriginalExtension();
    $primaryImagePath = $request->file('fuPrimaryDisplayImage')->storeAs('images', $primaryImageName,'public');

    $otherImageName = 'other_image_' . time() . '.' . $request->file('fuOtherDisplayImage')->getClientOriginalExtension();
    $otherImagePath = $request->file('fuOtherDisplayImage')->storeAs('images', $otherImageName,'public');

    $documentationName = 'documentation_' . time() . '.' . $request->file('fuWebPublicItemDocumentation')->getClientOriginalExtension();
    $documentationPath = $request->file('fuWebPublicItemDocumentation')->storeAs('documents', $documentationName,'public');

    // Add file paths to the validated data
    $validatedData['fuPrimaryDisplayImage'] = $primaryImagePath;
    $validatedData['fuOtherDisplayImage'] = $otherImagePath;
    $validatedData['fuWebPublicItemDocumentation'] = $documentationPath;
    // Store file paths in the database
    $validatedData['primary_display_image_path'] = $primaryImagePath;
    $validatedData['other_display_image_path'] = $otherImagePath;
    $validatedData['documentation_path'] = $documentationPath; 
   


        // Create a new instance of your model and fill it with the validated data
        $modelInstance = DB::table('inventory_webdetails')->insert($validatedData);

        // Redirect or perform additional actions as needed
        return redirect()->back();
        }

        
  
    
    
    public function uploadStandardPricing(Request $request)
        {
            // Validate the form data
            $request->validate([
                'fuStandardPricing' => 'required|mimes:txt',
                // Add other validation rules as needed
            ]);
        
            // Process the uploaded file
            $file = $request->file('fuStandardPricing');
            $data = file_get_contents($file->getRealPath());
            $rows = explode("\n", $data);
        
            foreach ($rows as $row) {
                $columns = explode("\t", $row);
        
                // Assuming the first row is headers, adjust as needed
                if (!empty($columns[0]) && $columns[0] !== 'Supplier') {
                    DB::table('inventory')->insert([
                        'supplier' => $columns[0],
                        'item_code' => $columns[1],
                        'product_name' => $columns[2],
                        'range' => $columns[3],
                        'price' => $columns[4],
                    ]);
                }
            }
        
            return redirect()->back()->with('success', 'Data uploaded successfully.');
        }
    
    
    
    
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

?>    