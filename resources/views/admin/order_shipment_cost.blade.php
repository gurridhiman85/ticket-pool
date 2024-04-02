{{-- admin.viw_orders.blade.php --}}
@include('admin.shared.viw_header')
  
<div id="Body_Body_pnlMain" class="container-fluid">
	
        <div id="Body_Body_pnl_Main_NewOrderWizard" class="container-fluid">
		
            <div role="tabpanel">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" style="margin-top:5px; margin-right:5px">
                        <input type="button" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_Tab_Order" value="Order" onclick="javascript:__doPostBack('ctl00$ctl00$Body$Body$btn_NewOrderWizard_Tab_Order','')" id="Body_Body_btn_NewOrderWizard_Tab_Order" class="btn btn-info">
                    </li>
                    <li class="nav-item" style="margin-top:5px; margin-right:5px; display:none; visibility:hidden">
                        
                    </li>
                    <li class="nav-item" style="margin-top:5px; margin-right:5px; display:none; visibility:hidden">
                        
                    </li>
                </ul>
                <div id="tabContentOrder" class="tab-content">
                    <div id="Body_Body_pnl_NewOrderWizard_Tab_Order" class="tab-pane active" role="tabpanel"> 
                        
                        <h1>Order Wizard </h1>
                        <p style="text-align:center">
                            
                        </p>
      
                        <div id="Body_Body_pnl_NewOrderWizard_CustomItemView">
				
                            <script type="text/javascript">
                                function calculateValues(arg)
                                {
                                    var Buy = document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_BuyPriceEx');
                                    var MarkUp = document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_MarkUpAmountEx');
                                    var Sale = document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_SalesPriceEx');
                                
                                    var BuyJS = 0;
                                    var MarkUpJS = 0;
                                    var SaleJS = 0;

                                    if (isNaN(parseFloat(Buy.value)) == false)
                                    {
                                        BuyJS = parseFloat(Buy.value);
                                    }
                                    else
                                    {
                                        BuyJS = 0;
                                    }
                                    if (isNaN(parseFloat(MarkUp.value)) == false)
                                    {
                                        MarkUpJS = parseFloat(MarkUp.value);
                                    }
                                    else
                                    {
                                        MarkUpJS = 0;
                                    }
                                    if (isNaN(parseFloat(Sale.value)) == false)
                                    {
                                        SaleJS = parseFloat(Sale.value);
                                    }
                                    else
                                    {
                                        SaleJS = 0;
                                    }
                                    var Percent = parseFloat((MarkUpJS / BuyJS) * 100).toFixed(0);
                                    if (isNaN(Percent))
                                    {
                                        Percent = 0;
                                    }
                                    document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_SalesPriceEx').value = parseFloat(BuyJS + MarkUpJS).toFixed(2);
                                    document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_MarkUpPercentageEx').value = Percent;
                                }
                                function calculateValuesAfterPercentageConvert(arg)
                                {
                                    var Percentage = document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_MarkUpPercentageEx');
                                    var Buy = document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_BuyPriceEx');
                                    var MarkUp = document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_MarkUpAmountEx');
                                    var Sale = document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_SalesPriceEx');
                                
                                    var PercentageJS = 0;
                                    var BuyJS = 0;
                                    var MarkUpJS = 0;
                                    var SaleJS = 0;
                                
                                    if (isNaN(parseFloat(Percentage.value)) == false)
                                    {
                                        PercentageJS = parseFloat(Percentage.value);
                                    }
                                    else
                                    {
                                        PercentageJS = 0;
                                    }
                                    if (isNaN(parseFloat(Buy.value)) == false)
                                    {
                                        BuyJS = parseFloat(Buy.value);
                                    }
                                    else
                                    {
                                        BuyJS = 0;
                                    }
                                    if (isNaN(parseFloat(MarkUp.value)) == false)
                                    {
                                        if (PercentageJS == 0)
                                        {
                                            MarkUpJS = parseFloat(MarkUp.value);
                                        }
                                        else
                                        {
                                            if (BuyJS == 0)
                                            {
                                                MarkUpJS = parseFloat(MarkUp.value);
                                                PercentageJS = 0;
                                            }
                                            else
                                            {
                                                MarkUpJS = parseFloat(BuyJS * (PercentageJS / 100)).toFixed(2);
                                                document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_MarkUpAmountEx').value = (MarkUpJS);
                                            }
                                        }
                                    }
                                    else
                                    {
                                        if (PercentageJS == 0)
                                        {
                                            MarkUpJS = 0;
                                        }
                                        else
                                        {
                                            if (BuyJS == 0)
                                            {
                                                MarkUpJS = 0;
                                            }
                                            else
                                            {
                                                MarkUpJS = parseFloat(BuyJS * (PercentageJS / 100)).toFixed(2);
                                                if (isNaN(MarkUpJS))
                                                {
                                                    MarkUpJS = 0;
                                                }
                                                if (isNaN(PercentageJS))
                                                {
                                                    PercentageJS = 0;
                                                }
                                                document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_MarkUpAmountEx').value = (MarkUpJS);
                                            }
                                        }
                                    }
                                    if (isNaN(parseFloat(Sale.value)) == false)
                                    {
                                        SaleJS = parseFloat(Sale.value);
                                    }
                                    else
                                    {
                                        SaleJS = 0;
                                    }

                                    document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_SalesPriceEx').value = parseFloat(BuyJS + MarkUpJS).toFixed(2);
                                    calculateValues(arg);
                                }
                            </script>
                            <div class="row">
                                <div id="Body_Body_pnl_NewOrderWizard_CustomItemView_Description" class="col-lg-4">
					  <form  action="{{route('admin.orders.shipping.store')}}" method="post">
                        @csrf 
                        <input type="hidden" name="id" value="{{$orderid}}">
                                    Description: 
                                    <input name="wizard_descreption" type="text" value="Shipping Cost" id="Body_Body_txt_NewOrderWizard_CustomItemView_Description" class="form-control" autocomplete="off" placeholder="Description" required="required" style="width:100%;">
                                    Name in Database: <span id="Body_Body_lbl_NewOrderWizard_CustomItemView_DBDescription">Shipping Cost</span>                
                                          
                                    <br><br>
                                
				       </div>
                                
                                
                                <div id="Body_Body_pnl_NewOrderWizard_CustomItemView_Quantity" class="col-lg-4">
					
                                    Quantity: 
                                    <input name="wizard_quantity" type="text" value="1" onchange="javascript:setTimeout('__doPostBack(\'ctl00$ctl00$Body$Body$txt_NewOrderWizard_CustomItemView_Quantity\',\'\')', 0)" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" id="Body_Body_txt_NewOrderWizard_CustomItemView_Quantity" class="form-control" autocomplete="off" placeholder="Quantity" required="required" style="width:100%;">
                                    <span id="Body_Body_regex_txt_NewOrderWizard_CustomItemView_Quantity" style="color:Red;display:none;">Please enter in the following formats: 1 or 1.00</span>
                                    
                                    <br>
                                
				</div>
                                
                 
                                <div id="Body_Body_pnl_NewOrderWizard_CustomItemView_SalesPriceEx" class="col-lg-4">
					
                                    Unit Sales Price (Excluding GST): 
                                    <input name="wizard_salespriceex" type="text" value="0" id="Body_Body_txt_NewOrderWizard_CustomItemView_SalesPriceEx" class="form-control" autocomplete="off" placeholder="Sales Price (Excluding GST)" required="required" style="width:100%;">
                                    <span id="Body_Body_regex_txt_NewOrderWizard_CustomItemView_SalesPriceEx" style="color:Red;display:none;">Please enter in the following formats: 1 or 1.00</span>
                                    <br>
                                					
				</div>
                                
                            </div>
                            <br>
                            <p style="text-align:center">
                                
                                <br>
                                <a href="/Customer/OrdersView?Type=NewOrder&amp;CID=4f545712-bce6-4e26-aae9-a8ccbe5a36cf&amp;OID=02aff5c9-1fdf-43a6-beb7-79f3380d38ed&amp;TID=AA6A3FBEDC3F45708DCB5123D66F7A57" class="btn btn-danger" onclick="return confirm('No changes will be saved. This decision is permanent!')">Back</a>&nbsp;
                                <input type="submit" name="NewOrderWizard_CustomItemView_AddItem" value="Add Item" id="Body_Body_btn_NewOrderWizard_CustomItemView_AddItem" class="btn btn-success">&nbsp;
                                <input type="submit" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_CustomItemView_AddItemAndDuplicate" value="Add Item &amp; Duplicate" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btn_NewOrderWizard_CustomItemView_AddItemAndDuplicate&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="Body_Body_btn_NewOrderWizard_CustomItemView_AddItemAndDuplicate" class="btn btn-info">&nbsp;
                            </p>  
                            </form>
			</div>
		</div>
                    
                    
                </div>
            </div>
	</div>
    
</div>

@include('admin.shared.viw_footer')