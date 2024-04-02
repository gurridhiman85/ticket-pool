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
                    <li class="nav-item" style="margin-top:5px; margin-right:5px">
                        <input type="button" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_Tab_ActivityLog" value="Activity Log (1)" onclick="javascript:__doPostBack('ctl00$ctl00$Body$Body$btn_NewOrderWizard_Tab_ActivityLog','')" id="Body_Body_btn_NewOrderWizard_Tab_ActivityLog" class="btn btn-primary">
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
                                <div id="Body_Body_pnl_NewOrderWizard_CustomItemView_Description" class="col-lg-12">
					   <form action="{{route('admin.product.orders.store')}}" method="POST"  id="CoreForm">
                                @csrf
                                <input type="hidden" name="id" value="{{$productData->id}}">
                                <input type="hidden" name="customer_id" value="{{$productData->customer_id}}">
                                    Description: 
                                    <input name="CustomItemView_Description" type="text" value="{{$productData->wizard_descreption}}" id="Body_Body_txt_NewOrderWizard_CustomItemView_Description" class="form-control" autocomplete="off" placeholder="Description" required="required" style="width:100%;">
                                    Name in Database: <span id="Body_Body_lbl_NewOrderWizard_CustomItemView_DBDescription">Custom Item - Not in Database</span>                
                                          
                                    <br><br>
                                
				</div>
                                <div id="Body_Body_pnl_NewOrderWizard_CustomItemView_Size" class="col-lg-6">
					
                                    Size (Enter NA if Not Applicable): 
                                    <input name="CustomItemView_Size" type="text" value="{{$productData->size}}" id="Body_Body_txt_NewOrderWizard_CustomItemView_Size" class="form-control" autocomplete="off" placeholder="Size" required="required" style="width:100%;">
                                    
                                            <a id="Body_Body_rpt_NewOrderWizard_CustomItemView_DBSize_btn_0" class="aspNetDisabled"></a>,&nbsp;
                                        
                                    <a id="Body_Body_btn_Clear_txt_NewOrderWizard_CustomItemView_Size" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btn_Clear_txt_NewOrderWizard_CustomItemView_Size&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))" style="font-weight:bold;">Clear</a>
                                    <br><br>
                                
				</div>
                                <div id="Body_Body_pnl_NewOrderWizard_CustomItemView_Colour" class="col-lg-6">
					
                                    Colour (Enter NA if Not Applicable): 
                                    <input name="CustomItemView_Colour" type="text" value="{{$productData->color}}" id="Body_Body_txt_NewOrderWizard_CustomItemView_Colour" class="form-control" autocomplete="off" placeholder="Colour" required="required" style="width:100%;">
                                    
                                            <a id="Body_Body_rpt_NewOrderWizard_CustomItemView_DBColour_btn_0" class="aspNetDisabled"></a>,&nbsp;
                                        
                                    <a id="Body_Body_btn_Clear_txt_NewOrderWizard_CustomItemView_Colour" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btn_Clear_txt_NewOrderWizard_CustomItemView_Colour&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))" style="font-weight:bold;">Clear</a>
                                    <br><br>
                                
				</div>
                                <div id="Body_Body_pnl_NewOrderWizard_CustomItemView_Quantity" class="col-lg-6">
					
                                    Quantity: 
                                    <input name="CustomItemView_Quantity" type="text" value="{{$productData->wizard_quantity}}" onchange="javascript:setTimeout('__doPostBack(\'ctl00$ctl00$Body$Body$txt_NewOrderWizard_CustomItemView_Quantity\',\'\')', 0)" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" id="Body_Body_txt_NewOrderWizard_CustomItemView_Quantity" class="form-control" autocomplete="off" placeholder="Quantity" required="required" style="width:100%;">
                                    <span id="Body_Body_regex_txt_NewOrderWizard_CustomItemView_Quantity" style="color:Red;display:none;">Please enter in the following formats: 1 or 1.00</span>
                                    
                                    <br>
                                
				</div>
                                <div id="Body_Body_pnl_btn_NewOrderWizard_CustomItemView_GetPricing" class="col-lg-6">
					
                                    <br>
                                    <input type="button" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_CustomItemView_GetPricing" value="Get Pricing" onclick="javascript:__doPostBack('ctl00$ctl00$Body$Body$btn_NewOrderWizard_CustomItemView_GetPricing','')" id="Body_Body_btn_NewOrderWizard_CustomItemView_GetPricing" class="btn btn-primary" style="width:100%;">
                                    <br>
                                
				</div>
                                <div id="Body_Body_pnl_NewOrderWizard_CustomItemView_BuyPriceEx" class="col-lg-4">
					
                                    Unit Buy Price (Excluding GST):
                                    <input name="wizard_salespriceex" type="text" value="{{$productData->wizard_salespriceex}}" id="Body_Body_txt_NewOrderWizard_CustomItemView_BuyPriceEx" class="form-control" autocomplete="off" onkeyup="calculateValues(this)" placeholder="Buy Price (Excluding GST)" required="required" style="width:100%;">
                                                                    
                                    <span id="Body_Body_regex_txt_NewOrderWizard_CustomItemView_BuyPriceEx" style="color:Red;display:none;">Please enter in the following formats: 1 or 1.00</span>
                                    <br>
                                
				</div>
                                <div id="Body_Body_pnl_NewOrderWizard_CustomItemView_MarkUp" class="col-lg-4">
					
                                    Unit Mark-Up Amount (Excluding GST): 
                                    <input name="ctl00$ctl00$Body$Body$txt_NewOrderWizard_CustomItemView_MarkUpAmountEx" type="text" value="1.80" id="Body_Body_txt_NewOrderWizard_CustomItemView_MarkUpAmountEx" class="form-control" autocomplete="off" onkeyup="calculateValues(this)" placeholder="Mark-Up Amount (Excluding GST)" required="required" style="width:100%;">
                                                                    
                                    <span id="Body_Body_regex_txt_NewOrderWizard_CustomItemView_MarkUpAmountEx" style="color:Red;display:none;">Please enter in the following formats: 1 or 1.00</span>
                                    <input name="ctl00$ctl00$Body$Body$txt_NewOrderWizard_CustomItemView_MarkUpPercentageEx" type="text" value="60" id="Body_Body_txt_NewOrderWizard_CustomItemView_MarkUpPercentageEx" class="form-control" autocomplete="off" onkeyup="calculateValuesAfterPercentageConvert(this)" placeholder="Mark-Up (%)" style="width:100%;">
                                                                    
                                    <span id="Body_Body_regex_txt_NewOrderWizard_CustomItemView_MarkUpPercentageEx" style="color:Red;display:none;">Please enter in the following formats: 1 or 1.00</span>
                                    <br>
                                
				</div>
                                <div id="Body_Body_pnl_NewOrderWizard_CustomItemView_SalesPriceEx" class="col-lg-4">
					
                                    Unit Sales Price (Excluding GST): 
                                    <input name="ctl00$ctl00$Body$Body$txt_NewOrderWizard_CustomItemView_SalesPriceEx" type="text" value="4.80" id="Body_Body_txt_NewOrderWizard_CustomItemView_SalesPriceEx" class="form-control" autocomplete="off" placeholder="Sales Price (Excluding GST)" required="required" style="width:100%;">
                                    <span id="Body_Body_regex_txt_NewOrderWizard_CustomItemView_SalesPriceEx" style="color:Red;display:none;">Please enter in the following formats: 1 or 1.00</span>
                                    <br>
                                
				</div>
                                
                                        <div class="col-lg-4">
                                            <input id="Body_Body_rptStages_cbStage_0" type="checkbox" {{  $productData->printingA === "on" ? "checked" : "" }} name="orderstock" >Order Plain Stock / General</label>
                                            <br>
                                            
                                            <br>                                        
                                            <br>
                                        </div>
                      
                                    
                                        <div class="col-lg-4">
                                            <input id="Body_Body_rptStages_cbStage_1" type="checkbox" {{  $productData->printingA === "on" ? "checked" : "" }}  name="printingA" onclick="javascript:setTimeout('__doPostBack(\'ctl00$ctl00$Body$Body$rptStages$ctl01$cbStage\',\'\')', 0)"><label for="Body_Body_rptStages_cbStage_1">Printing A / Artwork</label>
                                            <br>
                                            <a href="{{ route('printing_a_artwork_add', $productData->id) }}"   class="btn btn-primary disabled-link " id="Body_Body_rptStages_btnGridPricing_1"> Pricing for Printing A</a>
                                            <!-- <input type="button" name="ctl00$ctl00$Body$Body$rptStages$ctl01$btnGridPricing" value="Pricing for Printing A" id="Body_Body_rptStages_btnGridPricing_1" disabled="disabled" class="aspNetDisabled btn btn-primary"> -->
                                            <br><span id="Body_Body_rptStages_lblGridDisplay_1"></span>                                        
                                            <br>
                                        </div>
                      
                                    
                                        <div class="col-lg-4">
                                            <input id="Body_Body_rptStages_cbStage_2" type="checkbox" {{  $productData->printingB === "on" ? "checked" : "" }} name="printingB" value=""><label for="Body_Body_rptStages_cbStage_2">Printing B / Artwork</label>
                                            <br>
                                            <a href="{{ route('order.printing_b_artwork_add', $productData->id) }}"   class="btn btn-primary disabled-link " id="Body_Body_rptStages_btnGridPricing_1"> Pricing for Printing B</a>
                                            <!-- <input type="button" name="ctl00$ctl00$Body$Body$rptStages$ctl02$btnGridPricing" value="Pricing for Printing B" id="Body_Body_rptStages_btnGridPricing_2" disabled="disabled" class="aspNetDisabled btn btn-primary"> -->
                                            <br><span id="Body_Body_rptStages_lblGridDisplay_2"></span>                                        
                                            <br>
                                        </div>
                                       <div class="col-lg-4">
                                            <input id="Body_Body_rptStages_cbStage_3" type="checkbox" {{  $productData->printingC === "on" ? "checked" : "" }} name="printingC"><label for="Body_Body_rptStages_cbStage_3">Printing C / Artwork</label>
                                            <br>    
                                           
                                            <!-- <input type="button" name="ctl00$ctl00$Body$Body$rptStages$ctl03$btnGridPricing" value="Pricing for Printing C" id="Body_Body_rptStages_btnGridPricing_3" disabled="disabled" class="aspNetDisabled btn btn-primary"> -->
                                            <br><span id="Body_Body_rptStages_lblGridDisplay_3"></span>                                        
                                            <br>  
                                        </div>  
                           
                                    
                                        <div class="col-lg-4">
                                            <input id="Body_Body_rptStages_cbStage_4" type="checkbox" {{  $productData->embroideryA === "on" ? "checked" : "" }} name="embroideryA" checked="checked"><label for="Body_Body_rptStages_cbStage_4">Embroidery A / Swatch</label>
                                            <br>
                                            <input type="button" name="ctl00$ctl00$Body$Body$rptStages$ctl04$btnGridPricing" value="Pricing for Embroidery A" onclick="javascript:__doPostBack('ctl00$ctl00$Body$Body$rptStages$ctl04$btnGridPricing','')" id="Body_Body_rptStages_btnGridPricing_4" class="btn btn-primary">
                                            <br><span id="Body_Body_rptStages_lblGridDisplay_4">250-8000 @ $4.32<br>Logo: Boss Building<br>Position: Centre Front<br></span>                                        
                                            <br>
                                        </div>
                                
                                        <div class="col-lg-4">
                                            <input id="Body_Body_rptStages_cbStage_5" type="checkbox" {{  $productData->embroideryB === "on" ? "checked" : "" }} name="embroideryB"><label for="Body_Body_rptStages_cbStage_5">Embroidery B / Swatch</label>
                                            <br>
                                            <input type="button" name="ctl00$ctl00$Body$Body$rptStages$ctl05$btnGridPricing" value="Pricing for Embroidery B" id="Body_Body_rptStages_btnGridPricing_5" disabled="disabled" class="aspNetDisabled btn btn-primary">
                                            <br><span id="Body_Body_rptStages_lblGridDisplay_5"></span>                                        
                                            <br>
                                        </div>
                                        
            
                                    
                                        <div class="col-lg-4">
                                            <input id="Body_Body_rptStages_cbStage_6" type="checkbox"{{  $productData->padprintA === "on" ? "checked" : "" }} name="padprintA"><label for="Body_Body_rptStages_cbStage_6">Pad Print A / Pad Print</label>
                                            <br>
                                            <input type="button" name="ctl00$ctl00$Body$Body$rptStages$ctl06$btnGridPricing" value="Pricing for Pad Print A" id="Body_Body_rptStages_btnGridPricing_6" disabled="disabled" class="aspNetDisabled btn btn-primary">
                                            <br><span id="Body_Body_rptStages_lblGridDisplay_6"></span>                                        
                                            <br>
                                        </div>
             
                                    
                            </div>
                            <br>
                            <p style="text-align:center">
                                
                                <br>
                                <a href="/Customer/OrdersView?Type=NewOrder&amp;CID=3feedaca-ff93-49e7-a4c4-f8f40597f38e&amp;OID=6cb4ca19-ba52-446f-80cf-9c85f802767b&amp;TID=AA6A3FBEDC3F45708DCB5123D66F7A57" class="btn btn-danger" onclick="return confirm('No changes will be saved. This decision is permanent!')">Back</a>&nbsp;
                                <input type="submit" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_CustomItemView_AddItem" value="Add Item" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btn_NewOrderWizard_CustomItemView_AddItem&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="Body_Body_btn_NewOrderWizard_CustomItemView_AddItem" class="btn btn-success">&nbsp;
                                <input type="submit" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_CustomItemView_AddItemAndDuplicate" value="Add Item &amp; Duplicate" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btn_NewOrderWizard_CustomItemView_AddItemAndDuplicate&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="Body_Body_btn_NewOrderWizard_CustomItemView_AddItemAndDuplicate" class="btn btn-info">&nbsp;
                            </p>
                            
              </form>
			</div>           
		</div>
                    
                </div>
            </div>
        
	</div>
</div>
 <script type="text/javascript">
//<![CDATA[
var theForm = document.forms['CoreForm'];
if (!theForm) {
    theForm = document.CoreForm;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}
//]]>
</script>
@include('admin.shared.viw_footer')