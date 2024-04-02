<?php 
// CartController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\OrderCostsetup;
use App\Models\Customers;
use App\Models\OderDetails;
use App\Models\PrintingItem;
use Illuminate\Http\Request;


class OrdersController extends Controller
{

    public function index(Request $request){
        $data['userName'] = session('user_name');

        $selectedFields = ['cs.id as cid','cs.name', 'cs.account_no','cs.address', 'cs.order_status','cs.date_added'];

        $ordersQuery = DB::table('customers as cs')->select($selectedFields);

        // Check if start_date and end_date are provided in the request
        if ($request->has(['start_date', 'end_date'])) {
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');

            // Filter orders based on the provided date range
            $ordersQuery->whereBetween('date_added', [$start_date, $end_date]);
        }
     
         
        $data['orders_info'] =  DB::table('customers as cs')->Leftjoin('order_details as od','od.order_id','=','cs.id')->select('cs.id as cid','cs.name', 'cs.account_no','cs.address', 'cs.order_status','cs.date_added','cs.NewOrderWizard_SalesRepresentative','od.*','od.printingA')->get();  
     
          
        //   echo'<pre>';
        //   print_r($data['orders_info']);
        //   echo'</pre>';
        //  die();
        $data['total_orders'] = $ordersQuery->count();
        
        
        // print_R($data);
        // die;
        return view('admin.viw_orders', $data);

    }
    public function order_detail($orderid){
        // echo $orderid;die;
        $data['userName'] = session('user_name');

        $selectedFields = ['id','name', 'account_no','address', 'total', 'order_status','date_added']; // Replace with your actual field names

        $data['order_detail'] = DB::table('customers')
            ->select($selectedFields)
            ->where('id', '=', $orderid) // Replace with your actual column and value
            ->first();
        $data['total_orders'] = DB::table('customers')->count();
    
            return view('admin.viw_order_detail',$data);
    }
    
     public function orderCreate()
     {
         $data['userName'] = session('user_name');

        $selectedFields = ['id','name', 'account_no','address', 'total', 'order_status','date_added'];

        $ordersQuery = DB::table('customers')->select($selectedFields);
          $data['total_orders'] = $ordersQuery->count();
         return view('admin.create_order', $data);
     }
     
     public function orderStore(request $request)
     {
     
      $data['userName'] = session('user_name');
        $customer = new Customers();

    // Set the attributes using the request data
    $customer->name = $request->input('Customer_Name');
    $customer->f_name = $request->input('Customer_FirstName');
    $customer->l_name = $request->input('Customer_LastName');
    $customer->position = $request->input('Customer_Position');
    $customer->primary_email = $request->input('Customer_PrimaryEmail');
    $customer->billing_email = $request->input('Customer_BillingEmail');
    $customer->work_phone = $request->input('Customer_WorkPhone');
    $customer->mobile_phone = $request->input('Customer_MobilePhone');
    $customer->homephone = $request->input('Customer_HomePhone');
    $customer->business_customer = $request->input('Customer_BusinessCustomer');   
    $customer->deposit_required = $request->input('DepositRequired');
    $customer->deposit_percentage = $request->input('DepositPercentage');
    $customer->payment_term = $request->input('PaymentTerm');
    $customer->credit_limit = $request->input('CreditLimit');
    $customer->fixed_discount= $request->input('FixedDiscount');
    $customer->billing_address_line1 = $request->input('Customer_BillingAddressLine1');
    $customer->billing_address_line2 = $request->input('Customer_BillingAddressLine2');
    $customer->billing_suburb = $request->input('Customer_BillingSuburb');
    $customer->billing_state = $request->input('Customer_BillingState');
    $customer->billing_postcode = $request->input('Customer_BillingPostCode');
    $customer->billing_country = $request->input('Customer_BillingCountry');
    $customer->delivery_address_line1 = $request->input('Customer_DeliveryAddressLine1');
    $customer->delivery_address_line2 = $request->input('Customer_DeliveryAddressLine2'); 
    $customer->delivery_suburb = $request->input('Customer_DeliverySuburb');
    $customer->delivery_state = $request->input('Customer_DeliveryState');
    $customer->delivery_postcode = $request->input('Customer_DeliveryPostCode');
    $customer->delivery_country = $request->input('Customer_DeliveryCountry');

    $customer->business_name = $request->input('business_name');
    $customer->trending_name = $request->input('trending_name');
    $customer->abn = $request->input('abn');
    $customer->acn = $request->input('acn');
     $customer->NewOrderWizard_SalesRepresentative =$data['userName'];
    
    // Save the customer to the database
    $customer->save();

    return redirect()->route('admin.orders')->with('success', 'Data inserted successfully');

     }
     
     public function orderEdit(Request $request,$orderId)
     {
       
        $data['userName'] = session('user_name');

       
        $data['ordersCost'] = OrderCostsetup::where('customer_id',$orderId)->get(); 
        $data['ordersDetails'] = OderDetails::where('order_id',$orderId)->first();
        $ordersQuery = DB::table('customers');
          $data['total_orders'] = $ordersQuery->count();
          $data['orderInfo'] = DB::table('customers')
             
            ->where('id', '=', $orderId) // Replace with your actual column and value
            ->first();
         return view('admin.edit_order', $data); 
     }

     

      
         public function orderWizardItemStore(Request $request)
     {
        
    //   dd($request->all());

    $costAdd = new OrderCostsetup();

     $costAdd->type = 'product';
     $costAdd->customer_id = $request->orderid;
     $costAdd->wizard_descreption = $request->input('CustomItemView_Description');
     $costAdd->wizard_quantity = $request->input('CustomItemView_Quantity');
      $costAdd->wizard_salespriceex = $request->input('wizard_salespriceex');     
      $costAdd->size = $request->input('CustomItemView_Size');
       $costAdd->color = $request->input('CustomItemView_Colour');
        $costAdd->printingA = $request->input('printingA');
         $costAdd->printingB = $request->input('printingB');
          $costAdd->printingC = $request->input('printingC');
         $costAdd->embroideryA = $request->input('EmbroideryA');
            $costAdd->embroideryB = $request->input('EmbroideryB');
             $costAdd->padprintA = $request->input('Pad-Print-A');
              $costAdd->OrderPlainStock = $request->input('ctl00$ctl00$Body$Body$rptStages$ctl00$cbStage');
              
             
     
    // Add more columns and their values as needed
    $costAdd->save();

   return redirect()->to('admin/orders-edit/' . $request->orderid)->with('success', 'Data inserted successfully');

     } 
     
     
    //  edit or update part of product or cost or shipping


    public function orderWizard($orderid)
     { 
         $data['orderid'] = $orderid;
         $data['userName'] = session('user_name');
         return view('admin.order_wizard',$data);
     }

     public function orderWizardCostStore(Request $request)
     {
        $wizard_id = $request->id;

    $costAdd = new OrderCostsetup();
     
     $costAdd->type = 'cost';
     $costAdd->customer_id = $wizard_id;
     $costAdd->wizard_descreption = $request->input('wizard_descreption');
     $costAdd->wizard_quantity = $request->input('wizard_quantity');
     $costAdd->wizard_salespriceex = $request->input('wizard_salespriceex');
    // Add more columns and their values as needed
    $costAdd->save();

   return redirect()->to('admin/orders-edit/' . $wizard_id)->with('success', 'Data inserted successfully');

     } 
     
     public function orderWizardShippingStore(Request $request)
     {
        $wizard_id = $request->id;

    $costAdd = new OrderCostsetup();

     $costAdd->type = 'shiping';
     $costAdd->customer_id = $wizard_id;
     $costAdd->wizard_descreption = $request->input('wizard_descreption');
     $costAdd->wizard_quantity = $request->input('wizard_quantity');
     $costAdd->wizard_salespriceex = $request->input('wizard_salespriceex');
    // Add more columns and their values as needed
    $costAdd->save();

   return redirect()->to('admin/orders-edit/' . $wizard_id)->with('success', 'Data inserted successfully');

     } 

     public function editProductOrder($productid)
     {
        $data['userName'] = session('user_name');
        $data['productData'] = OrderCostsetup::find($productid);
         return view('admin.edit_order_product', $data); 
     }  
  

     public function editCostOrder($costid)
     {
        $data['userName'] = session('user_name');
        $data['costData'] = OrderCostsetup::find($costid);
         return view('admin.edit_order_cost', $data); 
     }

     public function editShippingOrder($shippingid)
     {
        $data['userName'] = session('user_name');
        $data['shippingData'] = OrderCostsetup::find($shippingid);
         return view('admin.edit_order_shipping', $data); 
     }


     public function StoreCostOrder(Request $request)
     {
         $wizard_id = $request->id;

         $customer_id = $request->customer_id;
     
         // Update the record directly
         OrderCostsetup::where('id', $wizard_id)->update([
             'wizard_descreption' => $request->input('wizard_descreption'),
             'wizard_quantity' => $request->input('wizard_quantity'),
             'wizard_salespriceex' => $request->input('wizard_salespriceex'),
             // Add more columns and their values as needed
         ]);
     
         return redirect()->to('admin/orders-edit/' . $customer_id)->with('success', 'Data updated successfully');
     }

     
     public function StoreProductOrder(Request $request)
     { 
  
      
         $wizard_id = $request->id;
       
         $customer_id = $request->customer_id;

    // Update the record directly
    OrderCostsetup::where('id', $wizard_id)->update([
        'wizard_descreption' => $request->input('CustomItemView_Description'),
        'wizard_quantity' => $request->input('CustomItemView_Quantity'),
        'size' => $request->input('CustomItemView_Size'),
        'wizard_salespriceex' => $request->input('wizard_salespriceex'),
        'color' => $request->input('CustomItemView_Colour'),
        'printingA' => $request->input('printingA'),
        'printingB' => $request->input('printingB'),
        'printingC' => $request->input('printingC'),
        'embroideryA' => $request->input('EmbroideryA'),
        'embroideryB' => $request->input('EmbroideryB'),
        'padprintA' => $request->input('padprintA'),
    ]);

    return redirect()->to('admin/orders-edit/' . $customer_id)->with('success', 'Data updated successfully');
         
     
         // Update the record directly
         OrderCostsetup::where('id', $wizard_id)->update([
             'wizard_descreption' => $request->input('wizard_descreption'),
             'wizard_quantity' => $request->input('wizard_quantity'),
             'wizard_salespriceex' => $request->input('wizard_salespriceex'),
             // Add more columns and their values as needed
         ]);
     
         return redirect()->to('admin/orders-edit/' . $customer_id)->with('success', 'Data updated successfully');
     }
     

     public function StoreShippingOrder(Request $request)
     {
         $wizard_id = $request->id;

         $customer_id = $request->customer_id;
     
         // Update the record directly
         OrderCostsetup::where('id', $wizard_id)->update([
             'wizard_descreption' => $request->input('wizard_descreption'),
             'wizard_quantity' => $request->input('wizard_quantity'),
             'wizard_salespriceex' => $request->input('wizard_salespriceex'),
             // Add more columns and their values as needed
         ]);
     
         return redirect()->to('admin/orders-edit/' . $customer_id)->with('success', 'Data updated successfully');
     }
     




     
      public function orderAddItem($orderId)
     {
         $data['userName'] = session('user_name');

        $selectedFields = ['id','name', 'account_no','address', 'total', 'order_status','date_added'];
        $data['ordersCost'] = OrderCostsetup::where('customer_id',$orderId)->get(); 
        $ordersQuery = DB::table('customers');
          $data['total_orders'] = $ordersQuery->count();
          $data['orderInfo'] = DB::table('customers')
            ->select($selectedFields)
            ->where('id', '=', $orderId) // Replace with your actual column and value
            ->first();
         return view('admin.order-add-item', $data);  
     }
     
  public function filterItems(Request $request)
    {
        $keyword = $request->input('keyword');
        $items =DB::table('inventory')->where('item_code', 'like', "%$keyword%")->get();

        return response()->json(['items' => $items]);
    }
    
    public function getItems($itemId, $orderId)
    {
       $data['userName'] = session('user_name');

        
        $ordersQuery = DB::table('inventory');
          $data['itemId'] = $itemId;
          $data['orderId'] = $orderId;
          $data['total_orders'] = $ordersQuery->count();
          $data['orderId'] = $orderId;
          $data['itemInfo'] = DB::table('inventory')->where('id', '=', $itemId) // Replace with your actual column and value
            ->first();
         return view('admin.add_item_based', $data); 
    }


    public function orderShippingAdd($orderid)
    { 
        $data['orderid'] = $orderid;
        $data['userName'] = session('user_name');
        return view('admin.order_shipment_cost',$data);
    }
    

    public function orderDetailsStores(Request $request)
    {
    
    
        $orderDetailId =  $request->input('orderDetailsId');
        $customerId = $request->input('order_id');
        if(empty($orderDetailId)){        
        $orderDetails = new OderDetails();
        $orderDetails->order_id = $request->input('order_id');        
        $orderDetails->order_date = $request->input('OrderDate');
        $orderDetails->expected_date = $request->input('OrderExpectedBy');
        $orderDetails->sales_representive = $request->input('SalesRepresentative');
        $orderDetails->delivery_address = $request->input('DeliveryAddress');
        $orderDetails->purchase_order_no = $request->input('PONumber');
        $orderDetails->quote = $request->input('quote');
        $orderDetails->sub_total = $request->input('sub_total');
        $orderDetails->discount_percentage = $request->input('discounted');
        $orderDetails->discount_gst = $request->input('discount_gst');
        $orderDetails->taxt_gst = $request->input('tax');
        $orderDetails->total = $request->input('total');
        $orderDetails->save();
        
       
        
        
		if($request->input('quote') == 'on')
		{
			$customerData = DB::table('customers')->where('id', $customerId)->update([
			'order_status'=>'Pending Approval',
			]);
		}else{
		    $customerData = DB::table('customers')->where('id', $customerId)->update([
			'order_status'=>'New Incomplete Orders',
			]);
		}
         	 
        }
        else {
        $orderDetails = OderDetails::where('id',$orderDetailId)->first();
        $orderDetails->order_id = $request->input('order_id');        
        $orderDetails->order_date = $request->input('OrderDate');
        $orderDetails->expected_date = $request->input('OrderExpectedBy');
        $orderDetails->sales_representive = $request->input('SalesRepresentative');
        $orderDetails->delivery_address = $request->input('DeliveryAddress');
        $orderDetails->purchase_order_no = $request->input('PONumber');
        $orderDetails->quote = $request->input('quote');
        $orderDetails->sub_total = $request->input('sub_total');
        $orderDetails->discount_percentage = $request->input('discounted');
        $orderDetails->discount_gst = $request->input('discount_gst');
        $orderDetails->taxt_gst = $request->input('tax');
        $orderDetails->total = $request->input('total');
        $orderDetails->update();
        
         
        
        
		if($request->input('quote') == 'on')
		{
			$customerData = DB::table('customers')->where('id', $customerId)->update([
			'order_status'=>'Pending Approval',
			]);
		}
		else{
		    $customerData = DB::table('customers')->where('id', $customerId)->update([
			'order_status'=>'New Incomplete Orders',
			]);
		}
        
        }
        return redirect()->route('admin.orders')->with('success', 'Data inserted successfully');
        
        
        
        
        
        // Return a response (you might want to customize this based on your needs)      


        // $customer_id = $request->customer_id;
     
        // Update the record directly
        // OrderCostsetup::where('id', $wizard_id)->update([
            
        // 'order_id' = $request->input('order_id');        
        // 'order_date' = $request->input('OrderDate');
        // 'expected_date' = $request->input('OrderExpectedBy');
        // 'sales_representive' = $request->input('SalesRepresentative');
        // 'delivery_address' = $request->input('DeliveryAddress');
        // 'purchase_order_no' = $request->input('PONumber');
        // 'quote' = $request->input('quote');
        // 'discount_percentage' = $request->input('discounted');
        // 'discount_gst' = $request->input('discount');
        // 'taxt_gst' = $request->input('tax'); 
        // 'total' = $request->input('total');
        //     // Add more columns and their values as needed
        // ]); 

        return response()->json(['message' => 'Order details stored successfully']);
    
    }
    
    
    public function orderDetailSubmit(Request $request)
    {
      
        if($request->orderid && $request->submit_type =="New Incomplete Orders"){
        
          DB::table('customers')->where('id',$request->orderid)->update(['order_Status'=>'Pending Internal Approval']);
          return true;
            return response()->json(['message' => 'Pending Internal Approval']);
        }
        if($request->orderid && $request->submit_type =="Pending Internal Approval"){
        
          DB::table('customers')->where('id',$request->orderid)->update(['order_Status'=>'Pending Customer Approval']);
            return true;
             return  'Pending Customer Approval';
        }
        if($request->orderid && $request->submit_type =="Pending Customer Approval"){
        
          DB::table('customers')->where('id',$request->orderid)->update(['order_Status'=>'Awaiting Deposit']);
       return true;
             return  'Awaiting Deposit';
        }
        if($request->orderid && $request->submit_type =="Awaiting Deposit"){
        
          DB::table('customers')->where('id',$request->orderid)->update(['order_Status'=>'Pending Orders']);
              return true;
             return  'Pending Orders';
        }
        //  if($request->orderid && $request->submit_type =="Awaiting Deposit"){
        
        //   DB::table('customers')->where('id',$request->orderid)->update(['order_Status'=>'Pending Orders']);
        //     return redirect()->route('admin.orders', ['filter' => 'Pending Orders']);
        //      return  'Pending Internal Approval';
        // }
        else{
       return redirect()->route('admin.orders')->with('warning', 'Something Went Wrong');
        }
        
    }

    public function orderPendingApproved(Request $request)
    {
       
        
        if($request->approvelid){
             if($request->type_approved == "internal_approved")
             {
         
          DB::table('customers')->where('id',$request->approvelid)->update(['order_Status'=>'Pending Customer Approval']);
           return redirect()->route('admin.orders', ['filter' => 'Pending Customer Approval']);
             }
             else if($request->type_approved == "customer_approved")
             {
           DB::table('customers')->where('id',$request->approvelid)->update(['order_Status'=>'Awaiting Deposit']);
           return redirect()->route('admin.orders', ['filter' => 'Awaiting Deposit']); 
             }
             
             else if($request->type_approved == "on_hold")
             {
           DB::table('customers')->where('id',$request->approvelid)->update(['order_Status'=>'On Hold']);
           return redirect()->route('admin.orders', ['filter' => 'On Hold']); 
             }
             else if($request->type_approved == "on_hold_removed")
             {
           DB::table('customers')->where('id',$request->approvelid)->update(['order_Status'=>'Pending Orders']);
           return redirect()->route('admin.orders', ['filter' => 'Pending Orders']); 
             }
             
             else if($request->type_approved == "proudctions_overview")
             {
            DB::table('customers')->where('id',$request->approvelid)->update(['order_Status'=>'Production Override']);
            return redirect()->route('admin.orders', ['filter' => 'Pending Orders']); 
             }
             else if($request->type_approved == "all")
             {
            DB::table('customers')->where('id',$request->approvelid)->update(['order_Status'=>'All']);
           return redirect()->route('admin.orders', ['filter' => 'All']); 
             }
               else if($request->type_approved == "tablcostup_approved")
             {
            DB::table('order_costsetup')->where('id',$request->approvelid)->update(['status'=>'completed']);
           return redirect()->route('admin.orders', ['filter' => 'All']); 
             }
             
        }
        else{
       return redirect()->route('admin.orders')->with('warning', 'Something Went Wrong');
        }
        
    } 
    
    public function printingAArtwork($id)
    {
        
      $selectedFields = ['cs.id as cid','cs.name', 'cs.account_no','cs.address', 'cs.order_status','cs.date_added'];

      $data['orderId'] = $id;
       

      // $data['itemId'] = $itemId;
      // $data['orderId'] = $orderId;
       
        $ordersQuery = DB::table('customers as cs')->select($selectedFields);

        $data['total_orders'] = $ordersQuery->count();
        $data['userName'] = session('user_name');
        return view('admin.printing.printingA',$data);
      
    } 

    public function printingBArtwork($id)
    {
      
        
      $selectedFields = ['cs.id as cid','cs.name', 'cs.account_no','cs.address', 'cs.order_status','cs.date_added'];

        $ordersQuery = DB::table('customers as cs')->select($selectedFields);
        $data['orderId'] = $id;
        $data['total_orders'] = $ordersQuery->count();
        $data['userName'] = session('user_name');
        return view('admin.printing.printingB',$data);
      
    }

    public function printingCArtwork($id)
    {
     
        
      $selectedFields = ['cs.id as cid','cs.name', 'cs.account_no','cs.address', 'cs.order_status','cs.date_added'];

        $ordersQuery = DB::table('customers as cs')->select($selectedFields);

        $data['orderId'] = $id;

        $data['total_orders'] = $ordersQuery->count();
        $data['userName'] = session('user_name');
        return view('admin.printing.printingC',$data);
      
    }

    public function embroideryAArtwork($id)
    {
    
      $selectedFields = ['cs.id as cid','cs.name', 'cs.account_no','cs.address', 'cs.order_status','cs.date_added'];

        $ordersQuery = DB::table('customers as cs')->select($selectedFields);
        $data['orderId'] = $id;
        $data['total_orders'] = $ordersQuery->count();
        $data['userName'] = session('user_name');
        return view('admin.printing.embroideryA',$data);
      
    }

    public function embroideryBArtwork($id)
    {
     
        $selectedFields = ['cs.id as cid','cs.name', 'cs.account_no','cs.address', 'cs.order_status','cs.date_added'];

        $ordersQuery = DB::table('customers as cs')->select($selectedFields);
        $data['orderId'] = $id;
        $data['total_orders'] = $ordersQuery->count();
        $data['userName'] = session('user_name');
        return view('admin.printing.embroideryB',$data);
      
    }

    
    public function padPrint($id)
    { 
        
      $selectedFields = ['cs.id as cid','cs.name', 'cs.account_no','cs.address', 'cs.order_status','cs.date_added'];
        $ordersQuery = DB::table('customers as cs')->select($selectedFields);
        $data['orderId'] = $id;
        $data['total_orders'] = $ordersQuery->count();
        $data['userName'] = session('user_name');
        return view('admin.printing.padprintA',$data);
      
    }
    
    public function viewOrder($orderId)
    {
        
     $data['userName'] = session('user_name');
       
        $data['ordersCost'] = OrderCostsetup::where('customer_id',$orderId)->get(); 
        $data['ordersDetails'] = OderDetails::where('order_id',$orderId)->first();

        $ordersQuery = DB::table('customers');

          $data['total_orders'] = $ordersQuery->count();
          $data['orderInfo'] = DB::table('customers')
             
            ->where('id', '=', $orderId) // Replace with your actual column and value
            ->first();
       
        return view('admin.viw_order',$data);
      
    }
    
    public function partShipOrder($orderId)
    {
        
     $data['userName'] = session('user_name');
       
        $data['ordersCost'] = OrderCostsetup::where('customer_id',$orderId)->get(); 
        $data['ordersDetails'] = OderDetails::where('order_id',$orderId)->first();
        $ordersQuery = DB::table('customers');
          $data['total_orders'] = $ordersQuery->count();
          $data['orderInfo'] = DB::table('customers')
             
            ->where('id', '=', $orderId) // Replace with your actual column and value
            ->first();
       
        return view('admin.partship',$data);
      
    }
    

    public function insertPrinting(Request $request)
    {
  
     
    
      $data = $request->all();  
      

  
      if($request->printing_a == 'printingA') {
        $dataUpdate = OrderCostsetup::where('id',$request->order_id)->update(['printingA' => 'on']);
      }
    elseif($request->printing_b == 'printingB'){
       $dataUpdate = OrderCostsetup::where('id',$request->order_id)->update(['printingB' => 'on']);
      }    
    elseif($request->printing_c == 'printingC'){
        $dataUpdate = OderDetails::where('id',$request->order_id)->update(['printingC' => 'on']);
       }   
     elseif($request->embroidery_a == 'embroideryA'){
        $dataUpdate = OderDetails::where('id',$request->order_id)->update(['embroideryA' => 'on']);
       }      
    elseif($request->embroidery_b == 'embroideryB'){
        $dataUpdate = OderDetails::where('id',$request->order_id)->update(['embroideryB' => 'on']);
       }    
     
    elseif($request->padprint_a == 'padprintA'){
        $dataUpdate = OderDetails::where('id',$request->order_id)->update(['padprintA' => 'on']);
       }    
    
    
      // Loop through the arrays of data and save each set of values individually
      foreach ($data['logo'] as $key => $logo) {
          // Assuming you have an Eloquent model named 'Printing' for database interaction
          $printing = new PrintingItem();
          $printing->logo = $logo; 
          $printing->position = $data['customPosition'][$key];
          $printing->quantity = $data['CustomItemView_Quantity'][$key];
          $printing->process = $data['Process'][$key];
          $printing->buy_price = $data['CustomItemView_BuyPriceEx'][$key];
          $printing->markup = isset($data['CustomItemView_MarkUpAmountEx'][$key]) ? $data['CustomItemView_MarkUpAmountEx'][$key] : null;
          $printing->markup_amount = isset($data['CustomItemView_MarkUpPercentageEx'][$key]) ? $data['CustomItemView_MarkUpPercentageEx'][$key] : null;
          $printing->sales_price = $data['CustomItemView_SalesPriceEx'][$key];
          $printing->order_cost_id = $request->order_id; // Assign order_id
          if($request->printing_a == 'printingA') {
            $printing->printingA = 'on';
          }    
          else{
            $printing->printingB = 'on';
           }
          $printing->save(); 
      }      
           
      return redirect()->back()->with('success', 'Printing items have been stored successfully.');

    
     } 
  
     

}