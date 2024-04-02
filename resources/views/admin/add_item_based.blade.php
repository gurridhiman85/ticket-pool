{{-- admin.viw_orders.blade.php --}}
@include('admin.shared.viw_header')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
               <input type="button" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_Tab_ActivityLog" value="Activity Log (4)" onclick="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$btn_NewOrderWizard_Tab_ActivityLog&#39;,&#39;&#39;)" id="Body_Body_btn_NewOrderWizard_Tab_ActivityLog" class="btn btn-primary" />
            </li>
         </ul>
         <div id="tabContentOrder" class="tab-content">
            <div id="Body_Body_pnl_NewOrderWizard_Tab_Order" class="tab-pane active" role="tabpanel">
               <h1>View Order </h1>
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
                     //alert(arg);
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
                  <form action="{{route('admin.orders.item.store')}}" method="POST">
                     @csrf
                     <input type="hidden" name="orderid" value="{{$orderId}}">
                     <div class="row">
                        <div id="Body_Body_pnl_NewOrderWizard_CustomItemView_Description" class="col-lg-12">
                           Description: 
                           <input name="CustomItemView_Description" type="text" value="{{$itemInfo->item_code}}" class="form-control" autocomplete="off" placeholder="Description" required="required" style="width:100%;" />
                           Name in Database: <span id="Body_Body_lbl_NewOrderWizard_CustomItemView_DBDescription"></span>                
                           <br /><br />
                        </div>
                         <div id="Body_Body_pnl_NewOrderWizard_CustomItemView_Size" class="col-lg-6">
                        Size (Enter NA if Not Applicable):
                        <input name="CustomItemView_Size" type="text" id="Body_Body_txt_NewOrderWizard_CustomItemView_Size" class="form-control" autocomplete="off" placeholder="Size" required="required" style="width:100%;" />
                    
                        <a class="size-link" href="#" data-size="XXS">XXS</a>,
                        <a class="size-link" href="#" data-size="XS">XS</a>,
                        <a class="size-link" href="#" data-size="S">S</a>,
                        <!-- Add similar lines for other sizes -->
                    
                        <br /><br />
                    </div>

                        <div id="Body_Body_pnl_NewOrderWizard_CustomItemView_Colour" class="col-lg-6">
    Colour (Enter NA if Not Applicable):
    <input name="CustomItemView_Colour" type="text" id="Body_Body_txt_NewOrderWizard_CustomItemView_Colour" class="form-control" autocomplete="off" placeholder="Colour" required="required" style="width:100%;" />

    <a class="colour-link" href="#" data-colour="navy heather">navy heather</a>,
    <a class="colour-link" href="#" data-colour="black heather">black heather</a>,
    <!-- Add similar lines for other colours -->

    <br /><br />
</div>
                        <div id="Body_Body_pnl_NewOrderWizard_CustomItemView_Quantity" class="col-lg-6">
                           Quantity: 
                           <input name="CustomItemView_Quantity" type="text" onchange="javascript:setTimeout(&#39;__doPostBack(\&#39;ctl00$ctl00$Body$Body$txt_NewOrderWizard_CustomItemView_Quantity\&#39;,\&#39;\&#39;)&#39;, 0)" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" id="Body_Body_txt_NewOrderWizard_CustomItemView_Quantity" class="form-control" autocomplete="off" placeholder="Quantity" required="required" style="width:100%;" />
                           <span id="Body_Body_regex_txt_NewOrderWizard_CustomItemView_Quantity" style="color:Red;display:none;">Please enter in the following formats: 1 or 1.00</span>
                           <br />
                        </div>
                        <div id="Body_Body_pnl_btn_NewOrderWizard_CustomItemView_GetPricing" class="col-lg-6">
                           <br />
                           <input type="button" name="CustomItemView_GetPricing" value="Get Pricing" onclick="calculatePricing()"   class="btn btn-primary" style="width:100%;" />
                           <br />
                        </div>
                        <div id="Body_Body_pnl_NewOrderWizard_CustomItemView_BuyPriceEx" class="col-lg-4">
                           Unit Buy Price (Excluding GST):
                           <input name="CustomItemView_BuyPriceEx" type="text" id="Body_Body_txt_NewOrderWizard_CustomItemView_BuyPriceEx" disabled="disabled" class="aspNetDisabled form-control" autocomplete="off" onkeyup="calculateValues(this)" placeholder="Buy Price (Excluding GST)" required="required" style="width:100%;" />
                           <input type="hidden" id="buyprice" value="{{$itemInfo->price}}"
                           <span id="Body_Body_regex_txt_NewOrderWizard_CustomItemView_BuyPriceEx" style="color:Red;display:none;">Please enter in the following formats: 1 or 1.00</span>
                           <br />
                        </div>
                        <div id="Body_Body_pnl_NewOrderWizard_CustomItemView_MarkUp" class="col-lg-4">
                           Unit Mark-Up Amount (Excluding GST): 
                           <input name="CustomItemView_MarkUpAmountEx" type="text" id="Body_Body_txt_NewOrderWizard_CustomItemView_MarkUpAmountEx" disabled="disabled" class="aspNetDisabled form-control" autocomplete="off" onkeyup="calculateValues(this)" placeholder="Mark-Up Amount (Excluding GST)" required="required" style="width:100%;" />
                           <span id="Body_Body_regex_txt_NewOrderWizard_CustomItemView_MarkUpAmountEx" style="color:Red;display:none;">Please enter in the following formats: 1 or 1.00</span>
                           <input name="CustomItemView_MarkUpPercentageEx" type="text" id="Body_Body_txt_NewOrderWizard_CustomItemView_MarkUpPercentageEx" class="form-control" autocomplete="off" onkeyup="calculateValuesAfterPercentageConvert(this)" placeholder="Mark-Up (%)" style="width:100%;" />
                           <span id="Body_Body_regex_txt_NewOrderWizard_CustomItemView_MarkUpPercentageEx" style="color:Red;display:none;">Please enter in the following formats: 1 or 1.00</span>
                           <br />
                        </div>
                        <div id="Body_Body_pnl_NewOrderWizard_CustomItemView_SalesPriceEx" class="col-lg-4">
                           Unit Sales Price (Excluding GST): 
                           <input name="CustomItemView_SalesPriceEx" type="text" id="Body_Body_txt_NewOrderWizard_CustomItemView_SalesPriceEx" disabled="disabled" class="aspNetDisabled form-control" autocomplete="off" placeholder="Sales Price (Excluding GST)" required="required" style="width:100%;" />
                           <span id="Body_Body_regex_txt_NewOrderWizard_CustomItemView_SalesPriceEx" style="color:Red;display:none;">Please enter in the following formats: 1 or 1.00</span>
                           <br />                                
                        </div>
                        <div class="col-lg-4">
                           <input id="Body_Body_rptStages_cbStage_0" type="checkbox" name="ctl00$ctl00$Body$Body$rptStages$ctl00$cbStage" onclick="javascript:setTimeout(&#39;__doPostBack(\&#39;ctl00$ctl00$Body$Body$rptStages$ctl00$cbStage\&#39;,\&#39;\&#39;)&#39;, 0)" /><label for="Body_Body_rptStages_cbStage_0">Order Plain Stock / General</label>
                           <br />
                           <br />                                        
                           <br />
                        </div>
                        <div class="col-lg-4">
                           <input id="Body_Body_rptStages_cbStage_1" type="checkbox" name="printingA" onclick="printingtoggleA()"  /><label for="Body_Body_rptStages_cbStage_1">Printing A / Artwork</label>
                           <br />
                           <a href="{{ route('printing_a_artwork_add',$itemInfo->id)}}"   class="btn btn-primary disabled-link " id="Body_Body_rptStages_btnGridPricing_1"> Pricing for Printing A</a>
                           <!--<input type="button" name="ctl00$ctl00$Body$Body$rptStages$ctl01$btnGridPricing" value="Pricing for Printing A"  disabled="disabled" class="aspNetDisabled btn btn-primary" />-->
                           <br />                                        
                           <br />
                        </div>
                        <div class="col-lg-4">
                           <input id="Body_Body_rptStages_cbStage_2" type="checkbox" name="printingB" onclick="printingtoggleB()" /><label for="Body_Body_rptStages_cbStage_2">Printing B / Artwork</label>
                           <br />
                           <a href="{{route('order.printing_b_artwork_add',$itemInfo->id) }}"   class="btn btn-primary disabled-link " id="Body_Body_rptStages_btnGridPricing_2"> Pricing for Printing B</a>
                           <!--<input type="button" name="ctl00$ctl00$Body$Body$rptStages$ctl02$btnGridPricing" value="Pricing for Printing B" id="Body_Body_rptStages_btnGridPricing_2" disabled="disabled" class="aspNetDisabled btn btn-primary" />-->
                           <br />                                        
                           <br />
                        </div>
                        <div class="col-lg-4">
                           <input id="Body_Body_rptStages_cbStage_3" type="checkbox" name="printingC" onclick="printingtoggleC()" /><label for="Body_Body_rptStages_cbStage_3">Printing C / Artwork</label>
                           <br />
                           <a href="{{route('order.printing_c_artwork_add',$itemInfo->id)}}"   class="btn btn-primary disabled-link " id="Body_Body_rptStages_btnGridPricing_3"> Pricing for Printing C</a>
                           <!--<input type="button" name="ctl00$ctl00$Body$Body$rptStages$ctl03$btnGridPricing" value="Pricing for Printing C" id="Body_Body_rptStages_btnGridPricing_3" disabled="disabled" class="aspNetDisabled btn btn-primary" />-->
                           <br />                                        
                           <br />
                        </div>
                        <div class="col-lg-4">
                           <input id="Body_Body_rptStages_cbStage_4" type="checkbox" name="EmbroideryA" onclick="EmbroiderytoggleA()" /><label for="Body_Body_rptStages_cbStage_4">Embroidery A / Swatch</label>
                           <br />
                           <a href="{{route('order.embroidery_a_artwork_add',$itemInfo->id)}}"   class="btn btn-primary disabled-link " id="Body_Body_rptStages_btnGridPricing_4"> Pricing for Embroidery A</a>
                           <!--<input type="button" name="ctl00$ctl00$Body$Body$rptStages$ctl04$btnGridPricing" value="Pricing for Embroidery A" id="Body_Body_rptStages_btnGridPricing_4" disabled="disabled" class="aspNetDisabled btn btn-primary" />-->
                           <br />                                        
                           <br />
                        </div>
                        <div class="col-lg-4">
                           <input id="Body_Body_rptStages_cbStage_5" type="checkbox" name="EmbroideryB" onclick="EmbroiderytoggleB()"  /><label for="Body_Body_rptStages_cbStage_5">Embroidery B / Swatch</label>
                           <br /> 
                           <a href="{{route('order.embroidery_b_artwork_add',$itemInfo->id)}}"   class="btn btn-primary disabled-link " id="Body_Body_rptStages_btnGridPricing_5"> Pricing for Embroidery B</a>
                           <!--<input type="button" name="ctl00$ctl00$Body$Body$rptStages$ctl05$btnGridPricing" value="Pricing for Embroidery B" id="Body_Body_rptStages_btnGridPricing_5" disabled="disabled" class="aspNetDisabled btn btn-primary" />-->
                           <br />                                        
                           <br />
                        </div>
                        <div class="col-lg-4">
                           <input id="Body_Body_rptStages_cbStage_6" type="checkbox" name="Pad-Print-A" onclick="EmbroiderytoggleC()"  /><label for="Body_Body_rptStages_cbStage_6">Pad Print A / Pad Print</label>
                           <br />
                           <a href="{{route('order.pad_print_add',$itemInfo->id)}}"   class="btn btn-primary disabled-link " id="Body_Body_rptStages_btnGridPricing_6"> Pricing for Pad Print A</a>
                           <!--<input type="button" name="ctl00$ctl00$Body$Body$rptStages$ctl06$btnGridPricing" value="Pricing for Pad Print A" id="Body_Body_rptStages_btnGridPricing_6" disabled="disabled" class="aspNetDisabled btn btn-primary" />-->
                           <br />                                        
                           <br />
                        </div>
                     </div>
                     <br />
                     <p style="text-align:center">
                        <br />
                        <a href='/Customer/OrdersView?Type=ViewOrder&CID=7c58971c-3d69-427a-985e-df7ebfdd1cbd&OID=eb17aab3-2603-4952-8dad-a69288e0de38&TID=FD7AFD14800B4BA5946CCD04579D0897' class="btn btn-danger" onclick="return confirm('No changes will be saved. This decision is permanent!')">Back</a>&nbsp;
                        <input type="submit" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_CustomItemView_AddItem" value="Add Item" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btn_NewOrderWizard_CustomItemView_AddItem&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="Body_Body_btn_NewOrderWizard_CustomItemView_AddItem" class="btn btn-success" />&nbsp;
                        <input  name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_CustomItemView_AddItemAndDuplicate" value="Add Item &amp; Duplicate" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btn_NewOrderWizard_CustomItemView_AddItemAndDuplicate&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="Body_Body_btn_NewOrderWizard_CustomItemView_AddItemAndDuplicate" class="btn btn-info" />&nbsp;
                     </p>
               </div>
            </div>
         </div>
      </div>
      </form>
   </div>
</div>
<style>
   .disabled-link {
   pointer-events: none; /* Disable pointer events */
   opacity: 0.5; /* Optionally reduce opacity to visually indicate disabled state */
   }
</style>
<script>
   // In your Blade file or external JavaScript file
   
 
   
   // Function to add custom size
   function addCustomSize() {
       var customSizeInput = document.getElementById('customSizeInput');
       var customSize = customSizeInput.value.trim();
   
       if (customSize !== "") {
           // Check if the custom size is not already in the list
           if (!Array.from(sizeSelect.options).some(option => option.value === customSize)) {
               var option = document.createElement('option');
               option.value = customSize;
               option.text = customSize;
               sizeSelect.add(option);
               customSizeInput.value = ""; // Clear the input box
           } else {
               alert("Custom size already exists in the list.");
           }
       }
   }
</script>
<script>
function calculatePricing() {
    var quantity = parseFloat(document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_Quantity').value);
    var unitBuyPrice = parseFloat(document.getElementById('buyprice').value);
    var markupPercentage = parseFloat('70');


    // Check if all required fields have values
    if (isNaN(quantity)) {
        // If any required field is empty or not a number, exit the function
        return;
    } 
    
    // Calculate Unit Mark-Up Amount (Excluding GST)
    var unitMarkupAmount = unitBuyPrice * (markupPercentage / 100);

    // Calculate Unit Sales Price (Excluding GST)
    var unitSalesPrice = unitBuyPrice + unitMarkupAmount;

    // Calculate Total Mark-Up Amount (Excluding GST) based on quantity
    var totalMarkupAmount = unitMarkupAmount * quantity;

    // Calculate Total Sales Price (Excluding GST) based on quantity
    var totalSalesPrice = unitSalesPrice * quantity;

    // Enable input fields
    document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_BuyPriceEx').disabled = false;
    document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_SalesPriceEx').disabled = false;
    document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_MarkUpPercentageEx').disabled = false;
alert(totalMarkupAmount);
    // Display the results by setting the value of the input fields
    document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_BuyPriceEx').value = totalMarkupAmount.toFixed(2);
    document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_SalesPriceEx').value = totalSalesPrice.toFixed(2);
    document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_MarkUpPercentageEx').value = markupPercentage;

    calculateValuesAfterPercentageConvert(markupPercentage);
}
   
   
   
    function printingtoggleA() {
      
   var checkbox = document.getElementById("Body_Body_rptStages_cbStage_1");
   var button = document.getElementById("Body_Body_rptStages_btnGridPricing_1");
   
   if (checkbox.checked) {
       button.classList.remove("disabled-link");
   } else {
       button.disabled = true;
        button.classList.add("disabled-link");
   }
    }
   
   function printingtoggleB() {
      
   var checkbox = document.getElementById("Body_Body_rptStages_cbStage_2");
   var button = document.getElementById("Body_Body_rptStages_btnGridPricing_2");
   
   if (checkbox.checked) {
       button.classList.remove("disabled-link");
   } else {
       button.disabled = true;
        button.classList.add("disabled-link");
   }
   }
   
    function printingtoggleC() {
      
   var checkbox = document.getElementById("Body_Body_rptStages_cbStage_3");
   var button = document.getElementById("Body_Body_rptStages_btnGridPricing_3");
   
   if (checkbox.checked) {
       button.classList.remove("disabled-link");
   } else {
       button.disabled = true;
        button.classList.add("disabled-link");
   }
   
   }
   
   
   
   
    function EmbroiderytoggleA() {
      
   var checkbox = document.getElementById("Body_Body_rptStages_cbStage_4");
   var button = document.getElementById("Body_Body_rptStages_btnGridPricing_4");
   
   if (checkbox.checked) {
       button.classList.remove("disabled-link");
   } else {
       button.disabled = true;
        button.classList.add("disabled-link");
   }
    }
   
   function EmbroiderytoggleB() {
      
   var checkbox = document.getElementById("Body_Body_rptStages_cbStage_5");
   var button = document.getElementById("Body_Body_rptStages_btnGridPricing_5");
   
   if (checkbox.checked) {
       button.classList.remove("disabled-link");
   } else {
       button.disabled = true;
        button.classList.add("disabled-link");
   }
   }
   
    function EmbroiderytoggleC() {
      
   var checkbox = document.getElementById("Body_Body_rptStages_cbStage_6");
   var button = document.getElementById("Body_Body_rptStages_btnGridPricing_6");
   
   if (checkbox.checked) {
       button.classList.remove("disabled-link");
   } else {
       button.disabled = true;
        button.classList.add("disabled-link");
   }
   
   }
   
   
   $('.size-link').click(function (e) {
            e.preventDefault();

            // Get the size value from the clicked anchor tag
            var sizeValue = $(this).data('size');

            // Get the current value of the input field
            var currentInputValue = $('#Body_Body_txt_NewOrderWizard_CustomItemView_Size').val();

            // Concatenate the new size value with the current input value, separated by a comma
            var newValue = currentInputValue ? currentInputValue + ', ' + sizeValue : sizeValue;

            // Set the input field value
            $('#Body_Body_txt_NewOrderWizard_CustomItemView_Size').val(newValue);
        });
   
   
    $('.colour-link').click(function (e) {
            e.preventDefault();

            // Get the colour value from the clicked anchor tag
            var colourValue = $(this).data('colour');

            // Get the current value of the input field
            var currentInputValue = $('#Body_Body_txt_NewOrderWizard_CustomItemView_Colour').val();

            // Concatenate the new colour value with the current input value, separated by a comma
            var newValue = currentInputValue ? currentInputValue + ', ' + colourValue : colourValue;

            // Set the input field value
            $('#Body_Body_txt_NewOrderWizard_CustomItemView_Colour').val(newValue);
        });
</script>

 

@include('admin.shared.viw_footer')
<!-- Include jQuery -->