 @include('admin.shared.viw_header')
 
 <div class="container-fluid">
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
                        <input type="button" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_Tab_ActivityLog" value="Activity Log (17)" onclick="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$btn_NewOrderWizard_Tab_ActivityLog&#39;,&#39;&#39;)" id="Body_Body_btn_NewOrderWizard_Tab_ActivityLog" class="btn btn-primary" />
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
                                    var txtToday = "2024-02-01";
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
                                    var txtToday = "2024-02-01";
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
                                            <td><a href="/Customer/CustomerProfile?ID=7c58971c-3d69-427a-985e-df7ebfdd1cbd">Newordertwo</a>&nbsp;&nbsp;</td>                            
                                        </tr>
                                        <tr>
                                            <th>Account Number&nbsp;&nbsp;</th>
                                            <td><a href="/Customer/CustomerProfile?ID=7c58971c-3d69-427a-985e-df7ebfdd1cbd">5010562</a>&nbsp;&nbsp;</td>                            
                                        </tr>
                                        <tr>
                                            <th>Order Number&nbsp;&nbsp;</th>
                                            <td>1707001&nbsp;&nbsp;</td>                            
                                        </tr>
                                        <tr>
                                            <th>Order Status&nbsp;&nbsp;</th>
                                            <td>Production&nbsp;&nbsp;</td>                            
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
                            
                            <div id="Body_Body_pnl_NewOrderWizard_ItemsView_Dispatch" style="overflow-x:auto; width:100%; max-width:100%">
					
                                <div>
						<table cellspacing="0" cellpadding="3" rules="cols" id="Body_Body_gv_NewOrderWizard_ItemsView_Dispatch" style="color:Black;background-color:White;border-color:#999999;border-width:1px;border-style:Solid;width:100%;border-collapse:collapse;">
							<tr>
								<td colspan="6">There are no items ready to dispatch.</td>
							</tr>
						</table>
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
                            
                            <div id="Body_Body_pnl_NewOrderWizard_Dispatch">
					
                                <div class="row">
                                    <div class="col-lg-12">
                                        Order Checked By: 
                                        <input name="ctl00$ctl00$Body$Body$txt_NewOrderWizard_Dispatch_OrderCheckedBy" type="text" id="Body_Body_txt_NewOrderWizard_Dispatch_OrderCheckedBy" class="form-control" placeholder="Order Checked By" required="required" style="width:100%;" /><br />
                                        
                                        <input type="hidden" name="ctl00$ctl00$Body$Body$hf_txt_NewOrderWizard_Dispatch_OrderCheckedBy" id="Body_Body_hf_txt_NewOrderWizard_Dispatch_OrderCheckedBy" />
                                        <script type="text/javascript">
                                            function SearchAItemSelectedA(sender, e)
                                            {
                                                $get("Body_Body_hf_txt_NewOrderWizard_Dispatch_OrderCheckedBy").value = e.get_value();
                                            }
                                            function acSearchAClientShown(source, args)
                                            {
                                                source._popupBehavior._element.style.zIndex = 100000;
                                            }
                                            function acSearchAClientHidden(source, args)
                                            {
                                                source._popupBehavior._element.style.zIndex = 100000;
                                            }
                                        </script>
                                        <br />
                                    </div>
                                    <div class="col-lg-12">
                                        <style type="text/css">
                                            .radioButtonList { list-style:none; margin: 0; padding: 0;}
                                            .radioButtonList.horizontal li { display: inline;}

                                            .radioButtonList label{
                                                display:inline;
                                                margin-right:10px;
                                                margin-left:3px;
                                            }
                                        </style>
                                        <table id="Body_Body_rd_NewOrderWizard_Dispatch_Type" class="radioButtonList" required="required">
						<tr style="display:none;">
							<td><input id="Body_Body_rd_NewOrderWizard_Dispatch_Type_0" type="radio" name="ctl00$ctl00$Body$Body$rd_NewOrderWizard_Dispatch_Type" value="Customer Pick-Up" onclick="javascript:setTimeout(&#39;__doPostBack(\&#39;ctl00$ctl00$Body$Body$rd_NewOrderWizard_Dispatch_Type$0\&#39;,\&#39;\&#39;)&#39;, 0)" /><label for="Body_Body_rd_NewOrderWizard_Dispatch_Type_0">Customer Pick-Up</label></td><td><input id="Body_Body_rd_NewOrderWizard_Dispatch_Type_1" type="radio" name="ctl00$ctl00$Body$Body$rd_NewOrderWizard_Dispatch_Type" value="Staff Delivery" onclick="javascript:setTimeout(&#39;__doPostBack(\&#39;ctl00$ctl00$Body$Body$rd_NewOrderWizard_Dispatch_Type$1\&#39;,\&#39;\&#39;)&#39;, 0)" /><label for="Body_Body_rd_NewOrderWizard_Dispatch_Type_1">Staff Delivery</label></td><td><input id="Body_Body_rd_NewOrderWizard_Dispatch_Type_2" type="radio" name="ctl00$ctl00$Body$Body$rd_NewOrderWizard_Dispatch_Type" value="Courier Delivery" onclick="javascript:setTimeout(&#39;__doPostBack(\&#39;ctl00$ctl00$Body$Body$rd_NewOrderWizard_Dispatch_Type$2\&#39;,\&#39;\&#39;)&#39;, 0)" /><label for="Body_Body_rd_NewOrderWizard_Dispatch_Type_2">Courier Delivery</label></td>
						</tr>
					</table>
                                        <br />
                                    </div>
                                    
                                    
                                </div>
                                <p style="text-align:center">
                                    <input type="button" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_Dispatch_CancelDispatch" value="Cancel" onclick="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$btn_NewOrderWizard_Dispatch_CancelDispatch&#39;,&#39;&#39;)" id="Body_Body_btn_NewOrderWizard_Dispatch_CancelDispatch" class="btn btn-danger btn-lg" />&nbsp;
                                    <input type="submit" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_Dispatch_ProcessDispatch" value="Process Dispatch" onclick="HBAC(this);WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btn_NewOrderWizard_Dispatch_ProcessDispatch&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="Body_Body_btn_NewOrderWizard_Dispatch_ProcessDispatch" class="btn btn-success btn-lg" />&nbsp;
                                </p>
                            
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
  @include('admin.shared.viw_footer')