@include('admin.shared.viw_header')

    <!--order sections-->
<div class="container-fluid">
    
    
    
    
    @if(request('approved') === 'on_hold')

      <div role="tabpanel">
         <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" style="margin-top:5px; margin-right:5px">
               <input type="button" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_Tab_Order" value="Order" onclick="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$btn_NewOrderWizard_Tab_Order&#39;,&#39;&#39;)" id="Body_Body_btn_NewOrderWizard_Tab_Order" class="btn btn-info" />
            </li>
            <li class="nav-item" style="margin-top:5px; margin-right:5px; display:none; visibility:hidden">
            </li>
            <li class="nav-item" style="margin-top:5px; margin-right:5px; display:none; visibility:hidden">
            </li>
         </ul>
         <div id="tabContentOrder" class="tab-content">
            <div id="Body_Body_pnl_NewOrderWizard_Tab_Order" class="tab-pane active" role="tabpanel">
            <div id="Body_Body_pnl_NewOrderWizard_ConfirmApproval" style="padding:15px; margin:15px; border:4px dashed green">
				    <form method="Post" action="{{route('order.pending.approved')}}">
                  @csrf
                            <h1>Place Order on Hold</h1>
                            <h3>Confirm that you wish to place the order on hold? This will remove the order from production!</h3>
                            <textarea name="ctl00$ctl00$Body$Body$txt_NewOrderWizard_ConfirmPlaceOnHold_Notes" rows="2" cols="20" id="Body_Body_txt_NewOrderWizard_ConfirmPlaceOnHold_Notes" class="form-control" placeholder="Notes" style="width:100%;">
                </textarea><br />
                            <p style="text-align:center">
                                <input type="button" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_ConfirmApproval_No" value="No, Cancel" onclick="javascript:__doPostBack('ctl00$ctl00$Body$Body$btn_NewOrderWizard_ConfirmApproval_No','')" id="Body_Body_btn_NewOrderWizard_ConfirmApproval_No" class="btn btn-danger btn-lg">&nbsp;
                                <input  type="hidden" name="approvelid" value="{{$orderInfo->id}}">
                                 <input  type="hidden" name="type_approved" value="on_hold">
                                <button type="submit" class="btn btn-success btn-lg" name="btn_NewOrderWizard_ConfirmApproval_Yes">Yes, HOld</button>
                                <input type="submit" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_ConfirmApproval_Yes_Email" value="Yes, Approve &amp; Email" onclick="HBAC(this);WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btn_NewOrderWizard_ConfirmApproval_Yes_Email&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="Body_Body_btn_NewOrderWizard_ConfirmApproval_Yes_Email" class="btn btn-success btn-lg">&nbsp;
                            </p>
                </form>  
			</div> 
    </div>
    
    
    @elseif(request('approved') === 'on_hold_removed')

      <div role="tabpanel">
         <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" style="margin-top:5px; margin-right:5px">
               <input type="button" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_Tab_Order" value="Order" onclick="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$btn_NewOrderWizard_Tab_Order&#39;,&#39;&#39;)" id="Body_Body_btn_NewOrderWizard_Tab_Order" class="btn btn-info" />
            </li>
            <li class="nav-item" style="margin-top:5px; margin-right:5px; display:none; visibility:hidden">
            </li>
            <li class="nav-item" style="margin-top:5px; margin-right:5px; display:none; visibility:hidden">
            </li>
         </ul>
         <div id="tabContentOrder" class="tab-content">
            <div id="Body_Body_pnl_NewOrderWizard_Tab_Order" class="tab-pane active" role="tabpanel">
            <div id="Body_Body_pnl_NewOrderWizard_ConfirmApproval" style="padding:15px; margin:15px; border:4px dashed green">
				    <form method="Post" action="{{route('order.pending.approved')}}">
                  @csrf
                            <h1>Remove Order Hold</h1>
                            <h3>Confirm that you wish to remove the hold from the order? This will resume production for the order!</h3>
                            <textarea name="ctl00$ctl00$Body$Body$txt_NewOrderWizard_ConfirmPlaceOnHold_Notes" rows="2" cols="20" id="Body_Body_txt_NewOrderWizard_ConfirmPlaceOnHold_Notes" class="form-control" placeholder="Notes" style="width:100%;">
                </textarea><br />
                            <p style="text-align:center">
                                <input type="button" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_ConfirmApproval_No" value="No, Cancel" onclick="javascript:__doPostBack('ctl00$ctl00$Body$Body$btn_NewOrderWizard_ConfirmApproval_No','')" id="Body_Body_btn_NewOrderWizard_ConfirmApproval_No" class="btn btn-danger btn-lg">&nbsp;
                                <input  type="hidden" name="approvelid" value="{{$orderInfo->id}}">
                                 <input  type="hidden" name="type_approved" value="on_hold_removed">
                                <button type="submit" class="btn btn-success btn-lg" name="btn_NewOrderWizard_ConfirmApproval_Yes">Yes, Remove Hold</button>
                                <input type="submit" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_ConfirmApproval_Yes_Email" value="Yes, Approve &amp; Email" onclick="HBAC(this);WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btn_NewOrderWizard_ConfirmApproval_Yes_Email&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="Body_Body_btn_NewOrderWizard_ConfirmApproval_Yes_Email" class="btn btn-success btn-lg">&nbsp;
                            </p>
                </form>  
			</div> 
    </div>
    @elseif(request('approved') === 'proudctions_overview')
    <div role="tabpanel">
         <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" style="margin-top:5px; margin-right:5px">
               <input type="button" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_Tab_Order" value="Order" onclick="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$btn_NewOrderWizard_Tab_Order&#39;,&#39;&#39;)" id="Body_Body_btn_NewOrderWizard_Tab_Order" class="btn btn-info" />
            </li>
            <li class="nav-item" style="margin-top:5px; margin-right:5px; display:none; visibility:hidden">
            </li>
            <li class="nav-item" style="margin-top:5px; margin-right:5px; display:none; visibility:hidden">
            </li>
         </ul>
         <div id="tabContentOrder" class="tab-content">
            <div id="Body_Body_pnl_NewOrderWizard_Tab_Order" class="tab-pane active" role="tabpanel">
            <div id="Body_Body_pnl_NewOrderWizard_ConfirmApproval" style="padding:15px; margin:15px; border:4px dashed green">
				    <form method="Post" action="{{route('order.pending.approved')}}">
                  @csrf
                            <h1>Move Order to Production without Deposit</h1>
                            <h3>Approve this order for production without the customer deposit?</h3>
                            <textarea name="ctl00$ctl00$Body$Body$txt_NewOrderWizard_ConfirmPlaceOnHold_Notes" rows="2" cols="20" id="Body_Body_txt_NewOrderWizard_ConfirmPlaceOnHold_Notes" class="form-control" placeholder="Notes" style="width:100%;">
                </textarea><br />
                            <p style="text-align:center">
                                <input type="button" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_ConfirmApproval_No" value="No, Cancel" onclick="javascript:__doPostBack('ctl00$ctl00$Body$Body$btn_NewOrderWizard_ConfirmApproval_No','')" id="Body_Body_btn_NewOrderWizard_ConfirmApproval_No" class="btn btn-danger btn-lg">&nbsp;
                                <input  type="hidden" name="approvelid" value="{{$orderInfo->id}}">
                                 <input  type="hidden" name="type_approved" value="proudctions_overview">
                                <button type="submit" class="btn btn-success btn-lg" name="btn_NewOrderWizard_ConfirmApproval_Yes">Yes, Approve</button>
                            </p>
                </form>  
			</div> 
    </div>
    
    @endif
    
        <br />
        <div style="text-align:right">
            <input type="button" name="ctl00$ctl00$Body$Body$btnMain_Close" value="X" onclick="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$btnMain_Close&#39;,&#39;&#39;)" id="Body_Body_btnMain_Close" class="btn btn-danger" />
        </div>
    </div>
    <div id="Body_Body_pnlMain" class="container-fluid">
	
        <div id="Body_Body_pnl_Main_NewOrderWizard" class="container-fluid">
		
            <div role="tabpanel">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" style="margin-top:5px; margin-right:5px">
                        <input type="button" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_Tab_Order" value="Order" onclick="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$btn_NewOrderWizard_Tab_Order&#39;,&#39;&#39;)" id="Body_Body_btn_NewOrderWizard_Tab_Order" class="btn btn-info" />
                    </li>
                    <li class="nav-item" style="margin-top:5px; margin-right:5px; display:none; visibility:hidden">
                        
                    </li>
                    <li class="nav-item" style="margin-top:5px; margin-right:5px">
                        <input type="button" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_Tab_ActivityLog" value="Activity Log (14)" onclick="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$btn_NewOrderWizard_Tab_ActivityLog&#39;,&#39;&#39;)" id="Body_Body_btn_NewOrderWizard_Tab_ActivityLog" class="btn btn-primary" />
                    </li>
                </ul>
                <div id="tabContentOrder" class="tab-content">
                    <div id="Body_Body_pnl_NewOrderWizard_Tab_Order" class="tab-pane active" role="tabpanel">
			
                        
                        
                        
                        
                        
                        
                        <h1>View Order </h1>
                        <p style="text-align:center">
                            
                        </p>
                        
                        
                        
                        
                        <div id="Body_Body_pnl_NewOrderWizard_OrderDetails">
				
                            <script type="text/javascript">
                                function calculateValues_OrderDate() {
                                    var txtDate = document.getElementById("Body_Body_txt_NewOrderWizard_OrderDate").value;
                                    var txtToday = "2024-01-30";
                                    var Today = new Date(txtToday);
                                    var OD = new Date(txtDate);
                                    var Days = parseInt((OD - Today) / (24 * 3600 * 1000));
                                    if (Days == 0) {
                                        $('#Body_Body_lbl_txt_NewOrderWizard_OrderDate_Count').text('Order Placed Today.');
                                    }
                                    else {
                                        if (Days >= 0) {
                                            $('#Body_Body_lbl_txt_NewOrderWizard_OrderDate_Count').text('Order date is in ' + Days + ' day/s.');
                                        }
                                        else {
                                            Days = Days * -1;
                                            $('#Body_Body_lbl_txt_NewOrderWizard_OrderDate_Count').text('Placed ' + Days + ' day/s ago.');
                                        }
                                    }
                                }
                                function calculateValues_OrderExpectedBy() {
                                    var txtDate = document.getElementById("Body_Body_txt_NewOrderWizard_OrderExpectedBy").value;
                                    var txtToday = "2024-01-30";
                                    var Today = new Date(txtToday);
                                    var OED = new Date(txtDate);
                                    var Days = parseInt((OED - Today) / (24 * 3600 * 1000));
                                    if (Days == 0) {
                                        $('#Body_Body_lbl_txt_NewOrderWizard_OrderExpectedBy_Count').text('Order is due today.');
                                    }
                                    else {
                                        if (Days >= 0) {
                                            $('#Body_Body_lbl_txt_NewOrderWizard_OrderExpectedBy_Count').text('Order is due in ' + Days + ' day/s.');
                                        }
                                        else {
                                            Days = Days * -1;
                                            $('#Body_Body_lbl_txt_NewOrderWizard_OrderExpectedBy_Count').text('Order was due ' + Days + ' day/s ago.');
                                        }
                                    }
                                }
                            </script>
                            <h2>Order Details</h2>
                            <div class="row">
                                <div class="col-lg-4">
                                    <table border="1">
                           <tr>
                              <th>Customer Name</th>
                              <td><a href="#">{{$orderInfo->name ?? ''}}</a>&nbsp;&nbsp;</td>
                           </tr>
                           <tr>
                              <th>Account Number&nbsp;&nbsp;</th>
                              <td><a href="#">{{$orderInfo->account_no ?? rand()}}</a>&nbsp;&nbsp;</td>
                           </tr>
                           <tr>
                              <th>Order Number&nbsp;&nbsp;</th>
                              <td>{{$orderInfo->id ?? ''}}&nbsp;&nbsp;</td>
                           </tr>
                           <tr>
                              <th>Order Status&nbsp;&nbsp;</th>
                              <td>{{$orderInfo->order_status ?? ''}}</td>
                           </tr>
                               <tr id="Body_Body_tr_Invoice">
					<th>Invoice Number&nbsp;&nbsp;</th>
					<td><a href="/Accounting/Receivable/Manage.aspx?Type=ViewInvoice&ID=e6f382ed-2572-4036-b647-822d6fada0ad">4312</a></td>
				</tr>
				
                                    </table>
                                </div>
                                <div class="col-lg-8">
                                    <div>
                                        <p style="text-align:right">
                                            
                                            <a onclick="HBAC(this); return confirm(&#39;This will unlock the order to allow changes.&#39;);" id="Body_Body_btn_NewOrderWizard_Production_Change" class="btn btn-warning" UseSubmitBehavior="false" href="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$btn_NewOrderWizard_Production_Change&#39;,&#39;&#39;)">Change</a>
                                        </p>
                                    </div>
                                    @if(request('approved') != 'proudctions_overview')
                                    <div id="Body_Body_pnl_NewOrderWizard_ProductionButtons">
					
                                        <p style="text-align:right">
                                            <input type="submit" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_Production_Void" value="Void" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btn_NewOrderWizard_Production_Void&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="Body_Body_btn_NewOrderWizard_Production_Void" class="btn btn-danger" />
                                            <!--<input type="submit" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_Production_PlaceOnHold" value="Place On Hold" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btn_NewOrderWizard_Production_PlaceOnHold&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="Body_Body_btn_NewOrderWizard_Production_PlaceOnHold" class="btn btn-primary" />-->
                                            
                                             <td>
                                                  @if(request('removehold') === 'yes')
                                                 <a href="{{ route('admin.orders.view', ['orderid' => $orderInfo->id, 'approved' => 'on_hold_removed']) }}" class="btn btn-primary">Remove On Hold</a>
                                                  @else
                                                   <a href="{{ route('admin.orders.view', ['orderid' => $orderInfo->id, 'approved' => 'on_hold']) }}" class="btn btn-primary">Place On Hold</a>
                                                  @endif
                                                   <a href="{{ route('admin.orders.partship', ['orderid' => $orderInfo->id]) }}" class="btn btn-primary">Part Ship</a>
                                            <!--<input type="submit" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_Production_PartShip" value="Part Ship" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btn_NewOrderWizard_Production_PartShip&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="Body_Body_btn_NewOrderWizard_Production_PartShip" class="btn btn-primary" />-->
                                            <input type="submit" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_Production_Backorder" value="Backorder" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btn_NewOrderWizard_Production_Backorder&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="Body_Body_btn_NewOrderWizard_Production_Backorder" class="btn btn-primary" />
                                            <input type="submit" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_Production_Email" value="Email" onclick="HBAC(this); return confirm(&#39;This will send another confirmation email to the customer contacts registered emails.&#39;);WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btn_NewOrderWizard_Production_Email&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="Body_Body_btn_NewOrderWizard_Production_Email" class="btn btn-primary" />
                                        </p>
                                        </td>
                                    
				</div>
				@endif
                                    
                                </div>
                            </div>
                            <br />
                            <div class="row">
                               <div class="col-lg-4">
                        Order Date: 
                        
                        <input name="order_id" type="hidden" value="{{ $orderInfo->id ?? ''}}" id="order_id" class=" form-control" onchange="calculateValues_OrderDate()" autocomplete="off" required="required" style="width:100%;" />
                        
                        <input name="orderDetailsId" type="hidden" value="{{$ordersDetails->id ?? ''}}" id="orderDetailsId" class="form-control"/>
                                       

                      <input name="OrderDate" type="date" value="{{ optional($orderInfo)->date_added ? date('Y-m-d', strtotime($orderInfo->date_added)) : '' }}" id="OrderDate" class=" form-control" disabled onchange="calculateValues_OrderDate()" autocomplete="off" required="required" />


                        <span id="Body_Body_lbl_txt_NewOrderWizard_OrderDate_Count">Placed 14 day/s ago.</span>
                        <br /><br />
                     </div>
                     <div class="col-lg-4">
                        Order Expected By: 
                        <input name="OrderExpectedBy" type="date" value="{{ optional($ordersDetails)->expected_date ? date('Y-m-d', strtotime($ordersDetails->expected_date)) : '' }}" id="OrderExpectedBy" disabled class="form-control" onchange="calculateValues_OrderExpectedBy()" autocomplete="off" style="width:100%;" />
                        <span id="Body_Body_lbl_txt_NewOrderWizard_OrderExpectedBy_Count"></span>
                        <br />
                     </div>
                     <div class="col-lg-4">
                        Sales Representative: 
                        <input name="SalesRepresentative" value="{{ optional($orderInfo)->NewOrderWizard_SalesRepresentative }}" type="text"   id="SalesRepresentative" class="form-control" placeholder="Sales Representative"  disabled  style="width:100%;" /><br />

                        <script type="text/javascript">
                           function SearchItemSelectedA(sender, e) {
                               $get("Body_Body_hf_txt_NewOrderWizard_SalesRepresentative").value = e.get_value();
                           }
                           function acSearchClientShown(source, args) {
                               source._popupBehavior._element.style.zIndex = 100000;
                           }
                           function acSearchClientHidden(source, args) {
                               source._popupBehavior._element.style.zIndex = 100000;
                           }
                        </script>
                     </div>
                     
                    
                     <div class="col-lg-8">
                        Delivery Address: 
                        <select name="DeliveryAddress" id="DeliveryAddress" class="form-control" required="required" style="width:100%;" disabled>
                           <option value="null">Select an Address</option>   
                            <option value="{{ $orderInfo->delivery_address_line1 }}" {{ isset($ordersDetails->delivery_address) && $ordersDetails->delivery_address == $orderInfo->delivery_address_line1 ? 'selected' : '' }}>{{ $orderInfo->delivery_address_line1 }}</option>

<option value="{{ $orderInfo->delivery_address_line2 }}" {{ isset($ordersDetails->delivery_address) && $ordersDetails->delivery_address == $orderInfo->delivery_address_line2 ? 'selected' : '' }}>{{ $orderInfo->delivery_address_line2 }}</option>
  
                           
                        </select> 
                        <br />
                     </div> 
                     <div class="col-lg-4">
                        Purchase Order Number (Optional): 
                        <input name="PONumber" disabled value="{{optional($ordersDetails)->purchase_order_no}}" type="text" id="PONumber" class="form-control" style="width:100%;" />
                        <br />
                     </div>
                     <div class="col-lg-12">
                     </div>
                  </div>
                            <br />
                            <h2>Items </h2>
                            <div id="Body_Body_pnl_NewOrderWizard_ItemsView_Production" style="overflow-x:auto; width:100%; max-width:100%">
					
                                <style>
                                    .btnmargin
                                    {
                                        margin:2px;
                                    }
                                </style>
                               <table id="dynamicTable" class="table table-dark table-striped table-responsive-lg table-bordered" style="width:100%">
                        <thead>
                           <tr>
                              <th style="width:170px"></th>
                              <th style="width:95px">Densu ID</th>
                              <th>Description</th>
                              <th>Size</th>
                              <th>Colour</th>
                              <th>Quantity</th>
                              <th style="width:100px">Unit<br />(Ex GST)</th>
                              <th style="width:100px">Total<br />(Ex GST)</th>
                              <th>Item Stages</th>
                              <th>Dispatched</th>
                           </tr>
                        </thead>
                        <tbody class="gbitemsort">
                           @foreach ($ordersCost as $key => $items)
                           <tr>
                              <td style="width:170px">
                               
                                 @if($items->type == 'product')
                                 <a id="Body_Body_gv_NewOrderWizard_Items_btnEdit_0" class="btn btn-primary btnmargin" href="{{route('admin.product.orders.edit',$items->id)}}" style="display:inline-block;width:165px;">View</a>
                               
                                 @elseif($items->type == 'cost')
                                 <a id="Body_Body_gv_NewOrderWizard_Items_btnEdit_0" class="btn btn-primary btnmargin" href="{{route('admin.wizard.cost.edit',$items->id)}}" style="display:inline-block;width:165px;">View</a>
                                  
                                 @else
                                 <a id="Body_Body_gv_NewOrderWizard_Items_btnEdit_0" class="btn btn-primary btnmargin" href="{{route('admin.shippping.orders.edit',$items->id)}}" style="display:inline-block;width:165px;">View</a>
                                    
                                 @endif
                                 
                                   <a id="Body_Body_gv_NewOrderWizard_Items_btnBulkApprove_0" class="btn btn-warning btnmargin"   data-id="{{ $items->id }}"  onclick="openModal(this)" style="display:inline-block;width:165px;">Bulk Approve</a>
                                                        <p style="text-align:center"><input id="Body_Body_gv_NewOrderWizard_Items_cbBlank_0" type="checkbox" name="ctl00$ctl00$Body$Body$gv_NewOrderWizard_Items$ctl00$cbBlank" /></p>
                                                        <input id="gbitemsort_bb8923f5-82fe-4118-8b37-0c75a4c8e306" type="hidden" class="gbitemsortvalue" />
                                 
                                 <!--<a id="Body_Body_gv_NewOrderWizard_Items_btnEdit_0" class="btn btn-primary btnmargin" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$gv_NewOrderWizard_Items$ctl00$btnEdit&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))" style="display:inline-block;width:165px;">View</a>-->
                                                        
                                                      
                                  
                              </td>
                              <td style="width:95px">{{$items->id}}</td>
                              <td>{{$items->wizard_descreption}}</td >
                              <td>{{$items->size}}</td>
                              <td>{{$items->color}}</td>
                              <td>{{$items->wizard_quantity}}</td>
                              <td style="width:100px">{{$items->wizard_salespriceex}}</td>
                              <td style="width:100px">$<span class="price">{{$items->wizard_salespriceex}}</span></td>
                              <td>
                                  
                                                                @if($items->printingA == "on")
                                                                Printing A - Artwork<br>Status:  @if($items->status == "completed") Completed @else Pending Action 
                                                                <a id="Body_Body_gv_NewOrderWizard_Items_rptStagesDisplay_0_btnApprove_0" class="btn btn-success btnmargin" data-id="{{ $items->id }}"  onclick="openModal(this)" >Approve</a>
                                                            @endif 
                                                                <hr />
                                                                @elseif($items->printingB == "on")
                                                            
                                                                Printing B - Artwork<br>Status:  @if($items->status == "completed") Completed @else Pending Action 
                                                                <a id="Body_Body_gv_NewOrderWizard_Items_rptStagesDisplay_0_btnApprove_1" class="btn btn-success btnmargin" data-id="{{ $items->id }}"  onclick="openModal(this)">Approve</a>
                                                                 @endif 
                                                                <hr />
                                                             
                                                                Artwork Design - Artwork<br>
                                                                
                                                            
                                                                <hr />
                                                            
                                                                Production - General<br>
                                                                @endif
                                                            </td>
                              <td>Unsent</td>
                           </tr>
                           @endforeach
                        </tbody>
                        <tfoot>
                           <tr style="background-color:black">
                              <td colspan="10"><span style="color:white">There are no items in this order yet. Click the 'Add Item' button to add an item to the order.</span></td>
                           </tr>
                        </tfoot>
                     </table>
                                
                                
                                
                                
                            
				</div>
                            <div id="Body_Body_pnl_NewOrderWizard_ItemsView_Dispatch" style="overflow-x:auto; width:100%; max-width:100%">
					
                                <div>

					</div>
                                <script>
                                    function SSDChange(that) {
                                        var pE = that.parentElement;
                                        var oI = pE.getElementsByTagName("input");
                                        var ac = true;
                                        for (var i = 0; i < oI.length; i++) {
                                            if (!oI[i].checked) {
                                                ac = false;
                                            }
                                        }
                                        if (ac) {
                                            var pcbDis = document.getElementsByClassName(pE.id).item(0);
                                            var cbDis = pcbDis.getElementsByTagName("input").item(0);
                                            cbDis.removeAttribute("disabled");
                                        }
                                        else {
                                            var pcbDis = document.getElementsByClassName(pE.id).item(0);
                                            var cbDis = pcbDis.getElementsByTagName("input").item(0);
                                            cbDis.setAttribute("disabled", "disabled");
                                            cbDis.checked = false;
                                        }
                                    }
                                    function SDDLoader() {
                                        var s = document.getElementsByClassName("dvsdd");
                                        for (var i in s) {
                                            try {
                                                var is = s[i].getElementsByTagName("input");
                                                if (is.length < 1) {
                                                    s[i].style = "display:none; visibility:hidden; width:0; height:0;";
                                                    s[i].getElementsByTagName("h5").item(0).remove();
                                                    s[i].getElementsByTagName("hr").item(0).remove();
                                                }
                                                else {
                                                    var pcbDis = document.getElementsByClassName(s[i].id).item(0);
                                                    var cbDis = pcbDis.getElementsByTagName("input").item(0);
                                                    if (!cbDis.checked) {
                                                        cbDis.setAttribute("disabled", "disabled");
                                                    }
                                                }
                                            }
                                            catch {}
                                        }
                                    }
                                    SDDLoader();
                                </script>
                            
				</div>
                            <div id="Body_Body_pnl_NewOrderWizard_ItemsView_Backorder" style="overflow-x:auto; width:100%; max-width:100%">
					
                                <div>

					</div>
                            
				</div>
                            <br /><br />
                            <div id="Body_Body_pnl_NewOrderWizard_TotalPrices">
					
                                <script type="text/javascript">
                                    function CalculateValues_Discount()
                                    {
                                        var lit_NewOrderWizard_SubTotal = document.getElementById("Body_Body_lit_NewOrderWizard_SubTotal").innerText;
                                        var txt_NewOrderWizard_Discount = document.getElementById("Body_Body_txt_NewOrderWizard_Discount").value;
                                        if (txt_NewOrderWizard_Discount == "") {
                                            txt_NewOrderWizard_Discount = 0;
                                        }
                                        else
                                        {
                                            txt_NewOrderWizard_Discount = parseFloat(txt_NewOrderWizard_Discount);
                                        }
                                        lit_NewOrderWizard_SubTotal = lit_NewOrderWizard_SubTotal.replace("$", "").replace(",", "")
                                        if (txt_NewOrderWizard_Discount != 0)
                                        {
                                            var Discount = (lit_NewOrderWizard_SubTotal * (txt_NewOrderWizard_Discount / 100));
                                            var NewAmountTax = (lit_NewOrderWizard_SubTotal - Discount) * 0.10;
                                            var NewAmount = (lit_NewOrderWizard_SubTotal - Discount) * 1.10;
                                            $('#Body_Body_lit_NewOrderWizard_Discount').text(Discount.toFixed(2));
                                            $('#Body_Body_lit_NewOrderWizard_Tax').text(NewAmountTax.toFixed(2));
                                            $('#Body_Body_lit_NewOrderWizard_Total').text(NewAmount.toFixed(2));
                                        }
                                    }
                                </script>
                                <table>
                                    <tr>
                                        <th class="h4">
                                            Sub-Total:&nbsp;&nbsp;
                                        </th>
                                        <td class="h5">
                                            <span id="Body_Body_lit_NewOrderWizard_SubTotal">$1,659.50</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="h4">
                                            Discount (%, Ex GST):&nbsp;&nbsp;
                                        </th>
                                        <td>
                                            <input name="ctl00$ctl00$Body$Body$txt_NewOrderWizard_Discount" type="text" value="0" readonly="readonly" id="Body_Body_txt_NewOrderWizard_Discount" disabled="disabled" class="aspNetDisabled form-control" onkeyup="CalculateValues_Discount()" placeholder="Discount" style="width:100%;" />
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="h4">
                                            Discount (Ex GST):
                                        </th>
                                        <td class="h5">
                                            <span id="Body_Body_lit_NewOrderWizard_Discount">$0.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="h4">
                                            Tax (GST):
                                        </th>
                                        <td class="h5">
                                            <span id="Body_Body_lit_NewOrderWizard_Tax">$165.95</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="h4">
                                            Total:
                                        </th>
                                        <td class="h5">
                                            <span id="Body_Body_lit_NewOrderWizard_Total">$1,825.45</span>
                                        </td>
                                    </tr>
                                </table>
                            
				</div>
                            
                            
                            <br />
                            <p style="text-align:center">
                                &nbsp;
                                &nbsp;
                            </p>
                            <h1>Notes</h1>
                            <textarea name="ctl00$ctl00$Body$Body$txtOrderNote_A" rows="2" cols="20" id="Body_Body_txtOrderNote_A" class="form-control" placeholder="Notes">
</textarea>
                            <input type="button" name="ctl00$ctl00$Body$Body$btnSubmitOrderNote_A" value="Submit" onclick="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$btnSubmitOrderNote_A&#39;,&#39;&#39;)" id="Body_Body_btnSubmitOrderNote_A" class="btn btn-success" style="width:100%;" />
                        
			</div>
                        
                        
                        
                        
                        
                        
                    
		</div>
                    
                    
                </div>
            </div>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        
	</div>
        
        
        
        
    
</div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <br />
    <br />


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
       
      </div>
      <div class="modal-body">
       <div role="tabpanel">
         <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" style="margin-top:5px; margin-right:5px">
               <input type="button" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_Tab_Order" value="Order" onclick="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$btn_NewOrderWizard_Tab_Order&#39;,&#39;&#39;)" id="Body_Body_btn_NewOrderWizard_Tab_Order" class="btn btn-info" />
            </li>
            <li class="nav-item" style="margin-top:5px; margin-right:5px; display:none; visibility:hidden">
            </li>
            <li class="nav-item" style="margin-top:5px; margin-right:5px; display:none; visibility:hidden">
            </li>
         </ul>
         <div id="tabContentOrder" class="tab-content">
            <div id="Body_Body_pnl_NewOrderWizard_Tab_Order" class="tab-pane active" role="tabpanel">
            <div id="Body_Body_pnl_NewOrderWizard_ConfirmApproval" style="padding:15px; margin:15px; border:4px dashed green">
				    <form method="Post" action="{{route('order.pending.approved')}}">
                  @csrf
                         <h1>Next Step</h1>
                            <h3>We are going to mark Production for the line item as completed.</h3>
                            <textarea name="ctl00$ctl00$Body$Body$txt_NewOrderWizard_ConfirmPlaceOnHold_Notes" rows="2" cols="20" id="Body_Body_txt_NewOrderWizard_ConfirmPlaceOnHold_Notes" class="form-control" placeholder="Notes" style="width:100%;">
                </textarea><br />
                            <p style="text-align:center">
                               
                                <input  type="hidden" name="approvelid" id="saveid" >
                                 <input  type="hidden" name="type_approved" value="tablcostup_approved">
                                <button type="submit" class="btn btn-success btn-lg" name="btn_NewOrderWizard_ConfirmApproval_Yes">Confirm</button>
                               
                            </p>
                </form>  
			</div> 
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
   function openModal(element) {
      
        var dataId = $(element).data('id');
        
        // Use jQuery to trigger the modal display
        $('#order_id').text(dataId); // Set the value to the input field in the modal
           $('#saveid').val(dataId); // Set the value to the input field in the modal
        $('#myModal').modal('show');
    }
</script>
    

<script type="text/javascript">
//<![CDATA[

theForm.oldSubmit = theForm.submit;
theForm.submit = WebForm_SaveScrollPositionSubmit;

theForm.oldOnSubmit = theForm.onsubmit;
theForm.onsubmit = WebForm_SaveScrollPositionOnSubmit;
Sys.Application.add_init(function() {
    $create(Sys.UI._Timer, {"enabled":true,"interval":3600000,"uniqueID":"ctl00$ctl00$tmrCore"}, null, null, $get("tmrCore"));
});
Sys.Application.add_init(function() {
    $create(Sys.Extended.UI.AutoCompleteBehavior, {"completionInterval":15,"completionSetCount":12,"delimiterCharacters":"","id":"Body_actxtCoreSearch","serviceMethod":"NavBar_Search","servicePath":"../Modules/SystemServices/AutoComplete.asmx"}, {"hidden":acCSClientHidden,"itemSelected":CSItemSelectedA,"shown":acCSClientShown}, null, $get("Body_txtCoreSearch"));
});
Sys.Application.add_init(function() {
    $create(Sys.Extended.UI.AutoCompleteBehavior, {"completionInterval":15,"completionSetCount":12,"delimiterCharacters":"","id":"Body_Body_ac_txt_NewOrderWizard_SalesRepresentative","minimumPrefixLength":1,"serviceMethod":"Staff_Search","servicePath":"../Modules/SystemServices/AutoComplete.asmx"}, {"hidden":acSearchClientHidden,"itemSelected":SearchItemSelectedA,"shown":acSearchClientShown}, null, $get("Body_Body_txt_NewOrderWizard_SalesRepresentative"));
});
//]]>
</script>

    

@include('admin.shared.viw_footer')
