{{-- admin.viw_orders.blade.php --}}
@include('admin.shared.viw_header')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
               <input type="button" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_Tab_ActivityLog" value="Activity Log (3)" onclick="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$btn_NewOrderWizard_Tab_ActivityLog&#39;,&#39;&#39;)" id="Body_Body_btn_NewOrderWizard_Tab_ActivityLog" class="btn btn-primary" />
            </li>
         </ul>
         <div id="tabContentOrder" class="tab-content">
            <div id="Body_Body_pnl_NewOrderWizard_Tab_Order" class="tab-pane active" role="tabpanel">
               <h1>View Order </h1>
               <p style="text-align:center">
               </p> 
               <div id="Body_Body_pnl_NewOrderWizard_CustomItemView_GridPricing">
                  <div class="row">
                     <div class="col-lg-12">
                        <br />
                        <h3>Pad Print A</h3>
                     </div>
                     <script type="text/javascript">
                        function calculateValues(arg)
                        {
                            var Buy = document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_BuyPriceEx'+ id);
                            var MarkUp = document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_MarkUpAmountEx'+ id);
                          
                            var Sale = document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_SalesPriceEx'+ id);
                        
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
                            document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_SalesPriceEx'+ id).value = parseFloat(BuyJS + MarkUpJS).toFixed(2);
                            document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_MarkUpPercentageEx'+ id).value = Percent;
                        }
                        function calculateValuesAfterPercentageConvert(arg,id)
                        {
                       
                            var Percentage = document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_MarkUpPercentageEx'+ id);
                            var Buy = document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_BuyPriceEx'+ id);
                            var MarkUp = document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_MarkUpAmountEx'+ id);
                            var Sale = document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_SalesPriceEx'+ id);
                        
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
                                        document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_MarkUpAmountEx'+ id).value = (MarkUpJS);
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
                                        document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_MarkUpAmountEx'+ id).value = (MarkUpJS);
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
                        
                            document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_SalesPriceEx'+ id).value = parseFloat(BuyJS + MarkUpJS).toFixed(2);
                            calculateValues(arg);
                        }
                     </script>
                     <div class="col-lg-12">
                        <br />
                        <hr />
                     </div>
                     <form action="{{route('printing.insert') }}" method="POST" enctype="multipart/form-data" style="display: contents;">
   @csrf
   <input type="text" name="order_id" value="{{$orderId}}"> 
   <input type="hidden" name="padprint_a" value="padprintA">
   <div class="col-lg-1">
      <a onclick="return confirm(&#39;A permanent change will be made.&#39;);" id="Body_Body_rpt_NewOrderWizard_CustomItemView_GridPricing_Additions_btnDelete_0" class="btn btn-danger" UseSubmitBehavior="false" href="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$rpt_NewOrderWizard_CustomItemView_GridPricing_Additions$ctl00$btnDelete&#39;,&#39;&#39;)">X</a>
   </div> 
   <div class="col-lg-11">
      <div class="row">
         <div class="col-lg-6">
            Logo: 
            <input name="logo[]" class="form-control" autocomplete="off" placeholder="Logo" style="width:100%;" />
            <br />
         </div>
         <div class="col-lg-6">
            Position:  
            <select name="customPosition[]" class="form-control" required="required">
               <option selected="selected" value="0">Select a Position</option>
               <option value="Left Hand Chest">Left Hand Chest</option>
               <option value="Right Hand Chest">Right Hand Chest</option>
               <option value="Left Hand Sleeve">Left Hand Sleeve</option>
               <option value="Right Hand Sleeve">Right Hand Sleeve</option>
               <option value="Centre Back">Centre Back</option>
               <option value="Centre Front">Centre Front</option>
               <option value="Lower Back">Lower Back</option>
               <option value="On Collar">On Collar</option>
               <option value="Below Collar">Below Collar</option>
               <option value="Left Side of Cap">Left Side of Cap</option>
               <option value="Right Side of Cap">Right Side of Cap</option>
               <option value="Back of Cap">Back of Cap</option>
               <option value="Cap Velcro">Cap Velcro</option>
               <option value="Left Leg">Left Leg</option>
               <option value="Right Leg">Right Leg</option>
               <option value="Above Left Back Pocket ">Above Left Back Pocket&#160;</option>
               <option value="Above Right Back Pocket">Above Right Back Pocket</option>
               <option value="Left Side ">Left Side&#160;</option>
               <option value="Right Side ">Right Side&#160;</option>
            </select>
            <br />
         </div>
         <div id="Body_Body_pnl_NewOrderWizard_CustomItemView_Quantity" class="col-lg-4">
            Quantity: 
            <input name="CustomItemView_Quantity[]" type="text" onchange="javascript:setTimeout(&#39;__doPostBack(\&#39;ctl00$ctl00$Body$Body$txt_NewOrderWizard_CustomItemView_Quantity\&#39;,\&#39;\&#39;)&#39;, 0)" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" id="Body_Body_txt_NewOrderWizard_CustomItemView_Quantity1" class="form-control" autocomplete="off" placeholder="Quantity" required="required" style="width:100%;" />
            <span id="Body_Body_regex_txt_NewOrderWizard_CustomItemView_Quantity" style="color:Red;display:none;">Please enter in the following formats: 1 or 1.00</span>
            <br /> 
         </div>
         <div class="col-lg-4">
            Process: 
            <input name="Process[]" class="form-control" autocomplete="off" placeholder="Process" required="required" style="width:100%;" />
            <span id="Body_Body_rpt_NewOrderWizard_CustomItemView_GridPricing_Additions_regex_txt_NewOrderWizard_CustomItemView_GridPricing_Addition_Process_0" style="color:Red;display:none;">Please enter in the following formats: 1 or 1.00</span>
            <br />
         </div>
         <div id="Body_Body_pnl_btn_NewOrderWizard_CustomItemView_GetPricing" class="col-lg-4">
            <br /> 
            <input type="button" name="CustomItemView_GetPricing" value="Get Pricing" onclick="calculatePricing(1)"   class="btn btn-primary" style="width:100%;" />
            <br />
         </div>
         <div id="Body_Body_pnl_NewOrderWizard_CustomItemView_BuyPriceEx" class="col-lg-4">
            Unit Buy Price (Excluding GST):
            <input name="CustomItemView_BuyPriceEx[]" type="text" id="Body_Body_txt_NewOrderWizard_CustomItemView_BuyPriceEx1" disabled="disabled" class="aspNetDisabled form-control" autocomplete="off" onkeyup="calculateValues(this)" placeholder="Buy Price (Excluding GST)" required="required" style="width:100%;" />
            <input type="hidden" id="buyprice" value="10">
            <span id="Body_Body_regex_txt_NewOrderWizard_CustomItemView_BuyPriceEx1" style="color:Red;display:none;">Please enter in the following formats: 1 or 1.00</span>
            <br />
         </div>
         <div id="Body_Body_pnl_NewOrderWizard_CustomItemView_MarkUp" class="col-lg-4">
            Unit Mark-Up Amount (Excluding GST):
            <input type="text" name="CustomItemView_MarkUpAmountEx[]" id="Body_Body_txt_NewOrderWizard_CustomItemView_MarkUpAmountEx1" disabled="disabled" class="aspNetDisabled form-control" autocomplete="off" onkeyup="calculateValues(this)" placeholder="Mark-Up Amount (Excluding GST)" required="required" style="width:100%;" />
            <span id="Body_Body_regex_txt_NewOrderWizard_CustomItemView_MarkUpAmountEx" style="color:Red;display:none;">Please enter in the following formats: 1 or 1.00</span>
            <input name="CustomItemView_MarkUpPercentageEx[]" type="text" id="Body_Body_txt_NewOrderWizard_CustomItemView_MarkUpPercentageEx1" class="form-control" autocomplete="off" onkeyup="calculateValuesAfterPercentageConvert(this)" placeholder="Mark-Up (%)" style="width:100%;" />
            <span id="Body_Body_regex_txt_NewOrderWizard_CustomItemView_MarkUpPercentageEx" style="color:Red;display:none;">Please enter in the following formats: 1 or 1.00</span>
            <br />
         </div>
         <div id="Body_Body_pnl_NewOrderWizard_CustomItemView_SalesPriceEx" class="col-lg-4">
            Unit Sales Price (Excluding GST): 
            <input name="CustomItemView_SalesPriceEx[]" type="text" id="Body_Body_txt_NewOrderWizard_CustomItemView_SalesPriceEx1" disabled="disabled" class="aspNetDisabled form-control" autocomplete="off" placeholder="Sales Price (Excluding GST)" required="required" style="width:100%;" />
            <span id="Body_Body_regex_txt_NewOrderWizard_CustomItemView_SalesPriceEx" style="color:Red;display:none;">Please enter in the following formats: 1 or 1.00</span>
            <br />                                
         </div>
      </div>
      
   </div>
   <br />
   <div class="col-lg-12"><br /><input type="button" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_CustomItemView_GridPricing_AddLine" value="Add Line" onclick="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$btn_NewOrderWizard_CustomItemView_GridPricing_AddLine&#39;,&#39;&#39;)" id="Body_Body_btn_NewOrderWizard_CustomItemView_GridPricing_AddLine" class="btn btn-primary" style="width:100%;" /><br /></div>
   <div class="col-lg-12 mt-4">
   <p style="text-align:center">
      <a href='/Customer/OrdersView?Type=ViewOrder&CID=92d7aeb1-77f4-4ab8-83a5-c40bff0fc640&OID=9ac5ff6e-dd2d-4d44-af0a-0b00117a0559&TID=FD7AFD14800B4BA5946CCD04579D0897' class="btn btn-danger" onclick="return confirm('No changes will be saved. This decision is permanent!')">Back</a>&nbsp;
      <input type="submit" name="ctl00$ctl00$Body$Body$btn_NewOrderWizard_CustomItemView_GridPricing_Add" value="Add Grid Pricing" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btn_NewOrderWizard_CustomItemView_GridPricing_Add&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="Body_Body_btn_NewOrderWizard_CustomItemView_GridPricing_Add" class="btn btn-success btn-lg" />&nbsp;
   </p>
   </div>
   </div> 
</form>

            </div>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
   //<![CDATA[
   var Page_Validators =  new Array(document.getElementById("Body_Body_rpt_NewOrderWizard_CustomItemView_GridPricing_Additions_regex_txt_NewOrderWizard_CustomItemView_GridPricing_Addition_Quantity_0"), document.getElementById("Body_Body_rpt_NewOrderWizard_CustomItemView_GridPricing_Additions_regex_txt_NewOrderWizard_CustomItemView_GridPricing_Addition_Process_0"), document.getElementById("Body_Body_rpt_NewOrderWizard_CustomItemView_GridPricing_Additions_regex_txt_NewOrderWizard_CustomItemView_GridPricing_Addition_BuyPriceEx_0"), document.getElementById("Body_Body_rpt_NewOrderWizard_CustomItemView_GridPricing_Additions_regex_txt_NewOrderWizard_CustomItemView_GridPricing_Addition_MarkUpAmountEx_0"), document.getElementById("Body_Body_rpt_NewOrderWizard_CustomItemView_GridPricing_Additions_regex_txt_NewOrderWizard_CustomItemView_GridPricing_Addition_MarkUpPercentageEx_0"), document.getElementById("Body_Body_rpt_NewOrderWizard_CustomItemView_GridPricing_Additions_regex_txt_NewOrderWizard_CustomItemView_GridPricing_Addition_SalesPriceEx_0"));
   //]]>
</script>
<style>
    .disabled-link {
    pointer-events: none; /* Disable pointer events */
    opacity: 0.5; /* Optionally reduce opacity to visually indicate disabled state */
    }
 </style>
 <script>
    // In your Blade file or external JavaScript file
    
    // Sample sizes array
    var sizes = ['XS', 'S', 'M', 'L', 'XL'];
    
    // Get the select element by its ID
    var sizeSelect = document.getElementById('sizeSelect');
    
    // Populate the select box with options
    sizes.forEach(function (size) {
        var option = document.createElement('option');
        option.value = size;
        option.text = size;
        sizeSelect.add(option);
    });
    
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
$(document).ready(function() {
    // Event handler for the button click


    $("#Body_Body_btn_NewOrderWizard_CustomItemView_GridPricing_AddLine").click(function() {
        addNewLine();
    });
});

function addNewLine() {
    var newIndex = $(".col-lg-11").length + 1; // Calculate the index for the new form
    
var newLineHtml = `
<div class="col-lg-1 mt-4">
                        <a onclick="removeLastAppendedLine(${newIndex})"
                         id="removeButton${newIndex}" class="btn btn-danger" 
                         ">X</a>
                     </div>
<div class="col-lg-11 mt-4">
    <div class="row">
        <div class="col-lg-6">
            Logo:
            <input name="logo[]" type="text" class="form-control" autocomplete="off" placeholder="Logo" style="width:100%;" />
            <br />
        </div>
        <div class="col-lg-6">
            Position:
            <select name="customPosition[]" class="form-control customPosition" required="required">
      
                                 <option selected="selected" value="0">Select a Position</option>
                                 <option value="Left Hand Chest">Left Hand Chest</option>
                                 <option value="Right Hand Chest">Right Hand Chest</option>
                                 <option value="Left Hand Sleeve">Left Hand Sleeve</option>
                                 <option value="Right Hand Sleeve">Right Hand Sleeve</option>
                                 <option value="Centre Back">Centre Back</option>
                                 <option value="Centre Front">Centre Front</option>
                                 <option value="Lower Back">Lower Back</option>
                                 <option value="On Collar">On Collar</option>
                                 <option value="Below Collar">Below Collar</option>
                                 <option value="Left Side of Cap">Left Side of Cap</option>
                                 <option value="Right Side of Cap">Right Side of Cap</option>
                                 <option value="Back of Cap">Back of Cap</option>
                                 <option value="Cap Velcro">Cap Velcro</option>
                                 <option value="Left Leg">Left Leg</option>
                                 <option value="Right Leg">Right Leg</option>
                                 <option value="Above Left Back Pocket ">Above Left Back Pocket&#160;</option>
                                 <option value="Above Right Back Pocket">Above Right Back Pocket</option>
                                 <option value="Left Side ">Left Side&#160;</option>
                                 <option value="Right Side ">Right Side&#160;</option>
                              
            </select>
        </div>
        <div class="col-lg-4"> 
            Quantity:
            <input name="CustomItemView_Quantity[]" id="Body_Body_txt_NewOrderWizard_CustomItemView_Quantity${newIndex}" type="text" class="form-control customQuantity${newIndex}" autocomplete="off" placeholder="Quantity" required="required" style="width:100%;" />
            <span style="color:Red;display:none;">Please enter in the following formats: 1 or 1.00</span>
            <br />
        </div>
        <div class="col-lg-4">
            Process:
            <input name="Process[]" type="text" id="" class="form-control customBuyPrice" autocomplete="off" placeholder="Process" required="required" style="width:100%;" />
            <span style="color:Red;display:none;">Please enter in the following formats: 1 or 1.00</span>
            <br />
        </div>
        <div class="col-lg-4">
            <br />
            <input type="button" name="CustomItemView_GetPricing" value="Get Pricing" onclick="calculatePricing(${newIndex})" class="btn btn-primary" style="width:100%;" />
            <br />
        </div>
        <div class="col-lg-4">
            Unit Buy Price (Excluding GST):
            <input name="CustomItemView_BuyPriceEx[]" id="Body_Body_txt_NewOrderWizard_CustomItemView_BuyPriceEx${newIndex}" class="form-control customBuyPriceEx" type="text" disabled="disabled" autocomplete="off" onkeyup="calculateValues(this, ${newIndex})" placeholder="Buy Price (Excluding GST)" required="required" style="width:100%;" />
            <input type="hidden" id="buyprice[]" value="10">
            <span style="color:Red;display:none;">Please enter in the following formats: 1 or 1.00</span>
            <br />
        </div>
   <div class="col-lg-4">
    Unit Mark-Up Amount (Excluding GST):
    <input name="CustomItemView_MarkUpAmountEx[]" id="Body_Body_txt_NewOrderWizard_CustomItemView_MarkUpAmountEx${newIndex}" class="form-control MarkUpUnitPrice"  type="text" autocomplete="off" onkeyup="calculateValues(this, ${newIndex})" placeholder="Mark-Up Amount (Excluding GST)" required="required" style="width:100%;" />
    <span style="color:Red;display:none;">Please enter in the following formats: 1 or 1.00</span>
    <input name="CustomItemView_MarkUpPercentageEx[]" id="Body_Body_txt_NewOrderWizard_CustomItemView_MarkUpPercentageEx${newIndex}" type="text" class="form-control customMarkUpPercentageEx" autocomplete="off" onkeyup="calculateValuesAfterPercentageConvert(this, ${newIndex})" placeholder="Mark-Up (%)" style="width:100%;" />
    <span style="color:Red;display:none;">Please enter in the following formats: 1 or 1.00</span>
    <br /> 
</div>

        <div class="col-lg-4">
            Unit Sales Price (Excluding GST):
            <input name="CustomItemView_SalesPriceEx[]" id="Body_Body_txt_NewOrderWizard_CustomItemView_SalesPriceEx${newIndex}" class="form-control customSalesPriceEx" type="text" disabled="disabled" autocomplete="off" placeholder="Sales Price (Excluding GST)" required="required" style="width:100%;" />
            <span style="color:Red;display:none;">Please enter in the following formats: 1 or 1.00</span>
            <br />
        </div> 
    </div>
</div>`;

// Append the new line after the last occurrence of ".col-lg-11"
$(".col-lg-11:last").after(newLineHtml);
}

function removeLastAppendedLine(id) {
    // Remove the last occurrence of ".col-lg-11"


    $(".col-lg-11:last").remove();
    $(".col-lg-1:last").remove();
}
</script>
 <script>
   function calculatePricing(id) {

var quantity = parseFloat(document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_Quantity' + id).value);


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
    document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_BuyPriceEx'+ id).disabled = false;
    document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_SalesPriceEx'+ id).disabled = false;
    document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_MarkUpAmountEx'+ id).disabled = false;
    document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_MarkUpPercentageEx'+ id).disabled = false;
 
    // Display the results by setting the value of the input fields
    document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_BuyPriceEx'+ id).value = totalMarkupAmount.toFixed(2);
    document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_SalesPriceEx'+ id).value = totalSalesPrice.toFixed(2);
    document.getElementById('Body_Body_txt_NewOrderWizard_CustomItemView_MarkUpPercentageEx'+ id).value = markupPercentage;

    calculateValuesAfterPercentageConvert(markupPercentage,id);
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
    
 </script>
@include('admin.shared.viw_footer')
<!-- Include jQuery -->