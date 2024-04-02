{{-- admin.viw_orders.blade.php --}}
@include('admin.shared.viw_header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<div id="Body_Body_pnlMain" class="container-fluid">
   <div id="Body_Body_pnl_Main_NewOrderWizard" class="container-fluid">

   @if(request('approved') === 'approved')

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
                            <h1>Confirm Order Approval</h1>
                            <h3>Just confirming you want to approve the below order? If Approve &amp; Email is selected, this order will be sent to the customer for approval.</h3>
                            <p style="text-align:center">
                                <input type="button" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_ConfirmApproval_No" value="No, Cancel" onclick="javascript:__doPostBack('ctl00$ctl00$Body$Body$btn_NewOrderWizard_ConfirmApproval_No','')" id="Body_Body_btn_NewOrderWizard_ConfirmApproval_No" class="btn btn-danger btn-lg">&nbsp;
                                <input  type="hidden" name="approvelid" value="{{$orderInfo->id}}">
                                 <input  type="hidden" name="type_approved" value="internal_approved">
                                <button type="submit" class="btn btn-success btn-lg" name="btn_NewOrderWizard_ConfirmApproval_Yes">Yes, Approve</button>
                                <input type="submit" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_ConfirmApproval_Yes_Email" value="Yes, Approve &amp; Email" onclick="HBAC(this);WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btn_NewOrderWizard_ConfirmApproval_Yes_Email&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="Body_Body_btn_NewOrderWizard_ConfirmApproval_Yes_Email" class="btn btn-success btn-lg">&nbsp;
                            </p>
                </form>  
			</div> 
	@elseif(request('approved') === 'customer_approved')

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
                             <h1>Confirm Order Approval for Customer</h1>
                            <h3>Approve this order on behalf of the customer?</h3>
                            <p style="text-align:center">
                                <input  type="hidden" name="approvelid" value="{{$orderInfo->id}}">
                                <input  type="hidden" name="type_approved" value="customer_approved">
                                <input type="button" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_ConfirmApprovalCustomer_No" value="No, Cancel" onclick="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$btn_NewOrderWizard_ConfirmApprovalCustomer_No&#39;,&#39;&#39;)" id="Body_Body_btn_NewOrderWizard_ConfirmApprovalCustomer_No" class="btn btn-danger btn-lg" />&nbsp;
                                <input type="submit" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_ConfirmApprovalCustomer_Yes" value="Yes, Approve" onclick="HBAC(this);WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btn_NewOrderWizard_ConfirmApprovalCustomer_Yes&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="Body_Body_btn_NewOrderWizard_ConfirmApprovalCustomer_Yes" class="btn btn-success btn-lg" />&nbsp;
                            </p>
                </form>  
			</div>  
         @else
         
             <p>This order is not approved.</p>
         @endif
               <h1>Order Wizard </h1>
               <p style="text-align:center">
               </p>
               <div id="Body_Body_pnl_NewOrderWizard_OrderDetails">
                 
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
                        </table>
                     </div>
                       <form id="fileUploadForm" method="post" action = "{{route('admin.orders.details.store')}}"> 
             @csrf
             
             
                     <div class="col-lg-12">
                        <div>
                           <p style="text-align:right">
                           </p>
                        </div>
                        <div id="Body_Body_pnl_NewOrderWizard_Quote">
                           <p style="text-align:right">
                              <input id="quote" type="checkbox" {{ optional($ordersDetails)->quote === "on" ? "checked" : "" }} name="quote"/><label for="Body_Body_cb_NewOrderWizard_Quote">Quote</label>
 
                           </p>
                        </div>
                     </div>
                  </div>
                  <br />
           
                  <div class="row">
                     <div class="col-lg-4">
                        Order Date: 
                        
                        <input name="order_id" type="hidden" value="{{ $orderInfo->id ?? ''}}" id="order_id" class="form-control" onchange="calculateValues_OrderDate()" autocomplete="off" required="required" style="width:100%;" />
                        
                        <input name="orderDetailsId" type="hidden" value="{{$ordersDetails->id ?? ''}}" id="orderDetailsId" class="form-control"/>
                                       

                      <input name="OrderDate" type="date" value="{{ optional($orderInfo)->date_added ? date('Y-m-d', strtotime($orderInfo->date_added)) : '' }}" id="OrderDate" class="form-control" onchange="calculateValues_OrderDate()" autocomplete="off" required="required" />


                        <span id="Body_Body_lbl_txt_NewOrderWizard_OrderDate_Count">Placed 14 day/s ago.</span>
                        <br /><br />
                     </div>
                     <div class="col-lg-4">
                        Order Expected By: 
                        <input name="OrderExpectedBy" type="date" value="{{ optional($ordersDetails)->expected_date ? date('Y-m-d', strtotime($ordersDetails->expected_date)) : '' }}" id="OrderExpectedBy" class="form-control" onchange="calculateValues_OrderExpectedBy()" autocomplete="off" style="width:100%;" />
                        <span id="Body_Body_lbl_txt_NewOrderWizard_OrderExpectedBy_Count"></span>
                        <br />
                     </div>
                     <div class="col-lg-4">
                        Sales Representative: 
                        <input name="SalesRepresentative" value="{{ optional($orderInfo)->NewOrderWizard_SalesRepresentative }}" type="text"   id="SalesRepresentative" class="form-control" placeholder="Sales Representative" required="required" style="width:100%;" /><br />

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
                        <select name="DeliveryAddress" id="DeliveryAddress" class="form-control" required="required" style="width:100%;">
                           <option value="null">Select an Address</option>   
                            <option value="{{ isset($orderInfo->delivery_address_line1) ? $orderInfo->delivery_address_line1 : ''}}" {{ isset($ordersDetails->delivery_address) && $ordersDetails->delivery_address == $orderInfo->delivery_address_line1 ? 'selected' : '' }}>{{ $orderInfo->delivery_address_line1 }}</option>

<option value="{{isset($orderInfo->delivery_address_line2) ? $orderInfo->delivery_address_line2 : '' }}" {{ isset($ordersDetails->delivery_address) && $ordersDetails->delivery_address == $orderInfo->delivery_address_line2 ? 'selected' : '' }}>{{ $orderInfo->delivery_address_line2 }}</option>
  
                           
                        </select> 
                        <br />
                     </div> 
                     <div class="col-lg-4">
                        Purchase Order Number (Optional): 
                        <input name="PONumber" value="{{optional($ordersDetails)->purchase_order_no}}" type="text" id="PONumber" class="form-control" style="width:100%;" />
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
                     <table id="table" class="table table-dark table-striped table-responsive-lg table-bordered" style="width:100%">
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
                                 <a onclick="return confirm('By proceeding, you confirm you wish to delete this item. This decision is final!');" id="Body_Body_gv_NewOrderWizard_Items_btnDelete_0" class="btn btn-danger btnmargin" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$gv_NewOrderWizard_Items$ctl00$btnDelete&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))" style="display:inline-block;width:165px;">X</a>
                                 @if($items->type == 'product')
                                 <a id="Body_Body_gv_NewOrderWizard_Items_btnEdit_0" class="btn btn-warning btnmargin" href="{{route('admin.product.orders.edit',$items->id)}}" style="display:inline-block;width:165px;">Edit</a>
                                   <p style="text-align:center"><input id="Body_Body_gv_NewOrderWizard_Items_cbBlank_0" type="checkbox" name="product_item" value="{{$items->id}}"></p>
                                 @elseif($items->type == 'cost')
                                 <a id="Body_Body_gv_NewOrderWizard_Items_btnEdit_0" class="btn btn-warning btnmargin" href="{{route('admin.wizard.cost.edit',$items->id)}}" style="display:inline-block;width:165px;">Edit</a>
                                   <p style="text-align:center"><input id="Body_Body_gv_NewOrderWizard_Items_cbBlank_0" type="checkbox" name="cost_items" value="{{$items->id}}"></p>
                                 @else
                                 <a id="Body_Body_gv_NewOrderWizard_Items_btnEdit_0" class="btn btn-warning btnmargin" href="{{route('admin.shippping.orders.edit',$items->id)}}" style="display:inline-block;width:165px;">Edit</a>
                                   <p style="text-align:center"><input id="Body_Body_gv_NewOrderWizard_Items_cbBlank_0" type="checkbox" name="shippping_items" value="{{$items->id}}"></p>
                                 @endif
                                  
                              </td>
                              <td style="width:95px">{{$items->id}}</td>
                              <td>{{$items->wizard_descreption}}</td >
                             <td>{{$items->size}}</td>
                              <td>{{$items->color}}</td>
                              <td>{{$items->wizard_quantity}}</td>
                              <td style="width:100px">{{$items->wizard_salespriceex}}</td>
                              <td style="width:100px">$<span class="price">{{ $items->wizard_salespriceex ?? '0.00'}}</span></td>
                              <td>Item Stages</td>
                              <td>Dispatched</td>
                           </tr>
                           @endforeach
                        </tbody>
                        <tfoot>
                           <tr style="background-color:black">
                              <td colspan="10"><span style="color:white">There are no items in this order yet. Click the 'Add Item' button to add an item to the order.</span></td>
                           </tr>
                        </tfoot>
                     </table>
                     <div id="Body_Body_pnlSortableModule">
                        <div id="SortableUpdate" class="" style="display: none; visibility: hidden; height: 0; width: 0;"></div>
                        <script>
                        //   $("#Body_Body_gv_NewOrderWizard_Items tbody").addClass('gbitemsort');
                        //   $(".gbitemsort").sortable({
                        //       update: function (event, ui) {
                        //           var Items = document.getElementsByClassName("gbitemsortvalue");
                        //           var SDB = "";
                        //           for (var i = 0; i <= (Items.length - 1); i++) {
                        //               try {
                        //                   var id = Items[i].id;
                        //                   var v = (i + 100);
                        //                   document.getElementById(id).value = v;
                        //                   SDB += id + "," + v + ";";
                        //               }
                        //               catch{
                        //                   var error = "Error";
                        //               }
                        //           }
                        //           if (SDB != "") {
                        //               $.ajax({
                        //                   url: '/Modules/SystemServices/ItemOrderPost.ashx',
                        //                   type: 'POST',
                        //                   data: {
                        //                       'OrderID': '02aff5c9-1fdf-43a6-beb7-79f3380d38ed',
                        //                       'Data': SDB
                        //                   },
                        //                   success: function (data) {
                        //                       if (data.result == "Success") {
                        //                           document.getElementById("SortableUpdate").className = "alert alert-success";
                        //                           document.getElementById("SortableUpdate").innerHTML = "Successfully Updated";
                        //                       }
                        //                       else {
                        //                           document.getElementById("SortableUpdate").className = "alert alert-danger";
                        //                           document.getElementById("SortableUpdate").innerHTML = data.message;
                        //                       }
                        //                       document.getElementById("SortableUpdate").style = "top:0;z-index:25000;position: fixed;max-width: 90%;right: 0;margin: 15px;width: 300px;";
                        //                       $("#SortableUpdate").delay(5000).fadeOut('fast', function () { document.getElementById("SortableUpdate").style = "display: none; visibility: hidden; height: 0; width: 0;" });
                        //                   },
                        //                   error: function (errorText) {
                        //                       alert("An error occurred and we need you to close the page and reopen this audit to continue. If the problem continues, contact support.");
                        //                   }
                        //               });
                        //           }
                        //       },
                        //       axis: 'y'
                        //   });
                        //   $(".gbitemsort").disableSelection();
                        </script>
                     </div>
                     <!--<input type="submit" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_AddItemToOrder" value="Add Item" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btn_NewOrderWizard_AddItemToOrder&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="Body_Body_btn_NewOrderWizard_AddItemToOrder" class="btn btn-primary btn-lg" />-->
                     <a href="{{route('admin.orders.additem',$orderInfo->id)}}" name="NewOrderWizard_AddItemToOrde" id="Body_Body_btn_NewOrderWizard_AddItemToOrdet" class="btn btn-primary btn-lg" />Add Item</a>
                     <a href="{{route('admin.orders.wizard',$orderInfo->id)}}" name="NewOrderWizard_AddSetUpCost" id="Body_Body_btn_NewOrderWizard_AddSetUpCost" class="btn btn-primary btn-lg" />Add Set Up Cost</a>
                     <a href="{{route('admin.orders.shiping',$orderInfo->id)}}" name="NewOrderWizard_AddSetUpCost" id="Body_Body_btn_NewOrderWizard_AddSetUpCost" class="btn btn-primary btn-lg" />Add Shipping Cost</a>
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
                                             $('.Body_Body_lit_NewOrderWizard_Discount').val(Discount.toFixed(2));
                                            $('#Body_Body_lit_NewOrderWizard_Tax').text(NewAmountTax.toFixed(2));
                                            $('.Body_Body_lit_NewOrderWizard_Tax').val(NewAmountTax.toFixed(2));
                                            $('#Body_Body_lit_NewOrderWizard_Total').text(NewAmount.toFixed(2));
                                             $('.Body_Body_lit_NewOrderWizard_Total').val(NewAmount.toFixed(2));
                                        }
                                    }
                     </script>
                     <table>
                        <tr>
                           <th class="h4"> 
                              Sub-Total:&nbsp;&nbsp;
                           </th>
                           <td class="h5">
                              
                              $<span id="Body_Body_lit_NewOrderWizard_SubTotal">{{$ordersDetails->sub_total ?? '0.00'}}</span>
                             
                               <input name="sub_total" class="Body_Body_lit_NewOrderWizard_SubTotal"  type="hidden" value={{$ordersDetails->sub_total ?? '0'}}>
                           </td>
                        </tr>
                        <tr>
                           <th class="h4">
                              Discount (%, Ex GST):&nbsp;&nbsp;
                           </th>
                           <td>
                              <input name="discounted" type="text" value="{{$ordersDetails->discount_percentage ?? ''}}" id="Body_Body_txt_NewOrderWizard_Discount" class="form-control" onkeyup="CalculateValues_Discount()" placeholder="Discount" style="width:100%;" />
                              &nbsp;
                           </td>
                        </tr>
                        <tr> 
                           <th class="h4">
                              Discount (Ex GST):
                           </th>
                           <td class="h5">
                              $<span name="discount" id="Body_Body_lit_NewOrderWizard_Discount">{{optional($ordersDetails)->discount_gst  ?? '0.00'}}</span>
                              <input name="discount_gst" class ="Body_Body_lit_NewOrderWizard_Discount" type="hidden" value={{$ordersDetails->discount_gst ?? '0'}}>
                           </td>
                        </tr>
                        <tr>
                           <th class="h4">
                              Tax (GST):
                           </th>
                           <td class="h5">
                              $<span name="tax" id="Body_Body_lit_NewOrderWizard_Tax">{{optional($ordersDetails)->taxt_gst ?? '0.00'}}</span>
                               <input name="tax" class="Body_Body_lit_NewOrderWizard_Tax" type="hidden" value={{$ordersDetails->taxt_gst ?? '0'}}>
                           </td>
                        </tr> 
                        <tr>
                           <th class="h4">
                              Total:
                           </th>
                           <td class="h5">
                              $<span name="total" id="Body_Body_lit_NewOrderWizard_Total">{{optional($ordersDetails)->total ?? '0.00'}}</span>
                              
                              <input name="total" class="Body_Body_lit_NewOrderWizard_Total" type="hidden" value={{$ordersDetails->total ?? '0.00'}}>
                           </td>
                        </tr>
                     </table>
                  </div>
                  <br />
                  <input type="hidden" name="submit_type" id="submit_type" value="{{$orderInfo->order_status ?? " " }}">
                  <p style="text-align:center">
                     <input type="submit" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_SaveOrder" value="Save Order" id="Body_Body_btn_NewOrderWizard_SaveOrder" class="btn btn-primary btn-lg" />
                      <input type="button" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_SubmitOrder" value="Submit Order"  id="Body_Body_btn_NewOrderWizard_SubmitOrder" class="btn btn-success btn-lg" />&nbsp;
                  </p>
              </form>    
               
              <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function() {
    $('#Body_Body_btn_NewOrderWizard_SubmitOrder').click(function(event) {
        event.preventDefault(); // Prevent the default form submission

        var orderid = $('#order_id').val();
        var submit_type = $('#submit_type').val();

        var formData = new FormData();
        formData.append('orderid', orderid);
         formData.append('submit_type', submit_type);

        $.ajax({
            url: '{{ route('admin.orders.submit') }}', // Replace with your Laravel route
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json', // Add this line if you expect JSON response
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                 
                window.location.href = '{{ route('admin.orders') }}';
},
            error: function(error) {
                console.error('Error:', error);
            }
        });
    });
});




</script>
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



<script>
   // Function to calculate the total price
   function calculateTotal() {
       var total = 0;
       // Iterate through each row in the table
       document.querySelectorAll('#table tbody tr').forEach(function(row) {
           // Extract price value from the current row
           var price = parseFloat(row.querySelector('.price').textContent);
            //  alert(price);
           // Add price to the total
           total += price;
       });
    
       // Update the total price value in the HTML
       document.getElementById('Body_Body_lit_NewOrderWizard_SubTotal').textContent = total.toFixed(2); // Assuming you want to display the total with two decimal places
      $('.Body_Body_lit_NewOrderWizard_SubTotal').val(total.toFixed(2));

     
   }
   
   // Initial calculation when the page loads
   calculateTotal();
</script>
@include('admin.shared.viw_footer')
<!-- Include jQuery -->