
@include('admin.shared.viw_header')

<div style="min-height:75.99px; max-height:75.99px"></div>
    
    <script src="../Data/Js/jquery-1.11.3.min.js"></script>
    <div style="width:100%; min-height:60px; background: linear-gradient(#fff,#f5f7f8); border-bottom: 1px solid #ddd; padding:5px">
        <div class="container">
        <h6><a href="../Default.aspx">Dashboard</a> > <a href="Default.aspx">Receivables</a> > <a href="Search.aspx">Search</a> > View Invoice</h6>
            <div class="row">
                <div class="col-lg-6">
                    <p style="text-align:left">
                        <h1>New Invoice</h1>
                    </p>
                </div>
                <div class="col-lg-6">
                    <p style="text-align:right" class="h1">
                        
                    </p>
                </div>
            </div>
        </div>
    </div>
    <br /><br />
<div class="container">
        <div class="jumbotron">
            
          <form  action="{{ route('admin/accounting/save-invoice') }}" method="post">
              @csrf
            <div class="row">
                <div class="col-lg-3">
                    <h5>To</h5>
                    <input name="ctl00$ctl00$Body$Body$txtTo" type="text" id="filterInput" class="form-control" placeholder="Search" style="width:100%;" />
                    <ul id="filteredItems"></ul>
                    <p id="selectedId"></p>
                    
                    <input type="hidden" name="ctl00$ctl00$Body$Body$hfCSV" id="Body_Body_hfCSV" />
                    <script type="text/javascript">
                        function SearchItemSelectedA(sender, e) {
                            $get("Body_Body_hfCSV").value = e.get_value();
                            __doPostBack('Body_Body_txtTo', '');
                        }
                        function acSearchClientShown(source, args) {

                            source._popupBehavior._element.style.zIndex = 100000;
                        }

                        function acSearchClientHidden(source, args) {

                            source._popupBehavior._element.style.zIndex = 100000;

                        }
                    </script>
                    <a href="../../Customer/CustomerProfile.aspx?ID="></a>
                </div>
                <div class="col-lg-3">
                    <h5>Date</h5>
                    <input name="ctl00$ctl00$Body$Body$txtIssueDate" type="date" value="2024-03-07"  id="Body_Body_txtIssueDate" class="form-control" required="required" />
                </div>
                <div class="col-lg-3">
                    <h5>Due Date</h5>
                    <input name="ctl00$ctl00$Body$Body$txtDueDate" type="date" value="2024-04-06" id="Body_Body_txtDueDate" class="form-control" required="required" style="width:100%;" />
                    
                </div>
                <div class="col-lg-3">
                    <h5>Reference</h5>
                    <input name="ctl00$ctl00$Body$Body$txtReference" type="text" id="Body_Body_txtReference" class="form-control" />
                </div>
                <div class="col-lg-9"></div>
                <div class="col-lg-3">
                    <h5>PO Number</h5>
                    <input name="ctl00$ctl00$Body$Body$txtPONumber" type="text" id="Body_Body_txtPONumber" class="form-control" />
                </div>
            </div>
            <hr />
            <div style="text-align:right; float:right; display:none; visibility:hidden">
                <table>
                    <tr>
                        <td>
                            Amounts are&nbsp;
                        </td>
                        <td>
                            <select name="ctl00$ctl00$Body$Body$ddlAmountTaxType" onchange="javascript:setTimeout(&#39;__doPostBack(\&#39;ctl00$ctl00$Body$Body$ddlAmountTaxType\&#39;,\&#39;\&#39;)&#39;, 0)" id="Body_Body_ddlAmountTaxType" class="form-control">
	<option selected="selected" value="Tax Inclusive">Tax Inclusive</option>
	<option value="Tax Exclusive">Tax Exclusive</option>

</select>
                        </td>
                    </tr>
                </table>
            </div>
            <div style="clear:both"></div>
            <br /><br /><br />
            <script type="text/javascript">
                function calculateValues(arg) {
                    
                    var id = arg.getAttribute('id');
                    Core = id;
                    A = "";
                    B = "";
                    C = "";
                    D = "";
                    if (Core.indexOf('txtQuantity') >= 0)
                    {
                        A = Core.replace('txtQuantity', 'txtQuantity');
                        B = Core.replace('txtQuantity', 'txtUnitPrice');
                        C = Core.replace('txtQuantity', 'txtDiscount');
                        D = Core.replace('txtQuantity', 'lblLineTotal');
                    }
                    if (Core.indexOf('txtUnitPrice') >= 0)
                    {
                        A = Core.replace('txtUnitPrice', 'txtQuantity');
                        B = Core.replace('txtUnitPrice', 'txtUnitPrice');
                        C = Core.replace('txtUnitPrice', 'txtDiscount');
                        D = Core.replace('txtUnitPrice', 'lblLineTotal');
                    }
                    if (Core.indexOf('txtDiscount') >= 0)
                    {
                        A = Core.replace('txtDiscount', 'txtQuantity');
                        B = Core.replace('txtDiscount', 'txtUnitPrice');
                        C = Core.replace('txtDiscount', 'txtDiscount');
                        D = Core.replace('txtDiscount', 'lblLineTotal');
                    }
                    if (Core.indexOf('lblLineTotal') >= 0)
                    {
                        A = Core.replace('lblLineTotal', 'txtQuantity');
                        B = Core.replace('lblLineTotal', 'txtUnitPrice');
                        C = Core.replace('lblLineTotal', 'txtDiscount');
                        D = Core.replace('lblLineTotal', 'lblLineTotal');
                    }

                    var txtQuantity = document.getElementById(A);
                    var txtUnitPrice = document.getElementById(B);
                    var txtDiscount = document.getElementById(C);
                    var getexisting = document.getElementById(D);
                    var lblLineTotal = parseFloat(getexisting.innerText);
                    var existinglinetotal = parseFloat(getexisting.innerText);

                    var sum = 0;
                    var Quantity = 0;
                    var UnitPrice = 0;
                    var Discount = 0;

                    if (isNaN(parseFloat(txtQuantity.value)) == false) {
                        Quantity = parseFloat(txtQuantity.value);
                    }
                    else
                    {
                        Quantity = 0;
                    }
                    if (isNaN(parseFloat(txtUnitPrice.value)) == false) {
                        UnitPrice = parseFloat(txtUnitPrice.value);
                    }
                    else
                    {
                        UnitPrice = 0;
                    }
                    if (isNaN(parseFloat(txtDiscount.value)) == false) {
                        Discount = parseFloat(txtDiscount.value);
                    }
                    else
                    {
                        Discount = 0;
                    }
                    sum = (UnitPrice - Discount) * Quantity;
                    
                    $('#' + D).text(sum);

                    if (sum == 0)
                    {
                        if (existinglinetotal !== sum) {
                            var get = document.getElementById("Body_Body_lblSubtotal");
                            if (get.innerText == 'NaN')
                            {
                                alert('Yes');
                                var subtotal = existinglinetotal;
                                var total = subtotal;
                                alert(total + 'Yes');
                                $('#Body_Body_lblSubtotal').text(total);
                            }
                            else
                            {
                                var subtotal = parseFloat(get.innerText) - existinglinetotal;
                                var total = subtotal;
                                if (isNaN(total))
                                {
                                    total = 0.00;
                                }
                                $('#Body_Body_lblSubtotal').text(total);
                            }
                        }
                    }
                    else
                    {
                        var get = document.getElementById("Body_Body_lblSubtotal");
                        var subtotal = parseFloat(get.innerText) - existinglinetotal;
                        var total = sum + subtotal; 
                        
                        if (isNaN(parseFloat(total)) == false)
                        {
                            $('#Body_Body_lblSubtotal').text(total);
                        }
                        else
                        {
                            $('input[id*=Body_Body_lblSubtotal]').each(function () {
                                subtotal = $(this).text();
                            }, null);
                            $('#Body_Body_lblSubtotal').text(subtotal);
                        }
                    }

                    var get = document.getElementById("Body_Body_lblSubtotal");
                    var subtotal = parseFloat(get.innerText);
                    $('#Body_Body_lblTaxTotal').text(parseFloat(subtotal * 0.10).toFixed(2));
                    $('#Body_Body_lblTotal').text(parseFloat(subtotal * 1).toFixed(2));
                    
                }
            </script>
            <table id="TableItems" style="width:100%; table-layout:fixed;">
                <tr>
                    <th style="width:50%">Description</th>
                    <th style="width:7%">Qty</th>
                    <th style="width:14%">Unit Price</th>
                    <th style="width:14%">Discount</th>
                    <th style="width:13%">Amount AUD</th>
                    <th style="width:2%"></th>
                </tr>
                
                        
                                
                                <tr>
                                    <td>
                                        <textarea name="ctl00$ctl00$Body$Body$rptItems$ctl00$txtDescription" rows="2" cols="20" id="Body_Body_rptItems_txtDescription_0" class="form-control">
</textarea>
                                    </td>
                                    <td>
                                        <input name="ctl00$ctl00$Body$Body$rptItems$ctl00$txtQuantity" type="text" id="Body_Body_rptItems_txtQuantity_0" class="form-control" onkeyup="calculateValues(this)" style="height:64px;" />
                                    </td>
                                    <td>
                                        <input name="ctl00$ctl00$Body$Body$rptItems$ctl00$txtUnitPrice" type="text" id="Body_Body_rptItems_txtUnitPrice_0" class="form-control" onkeyup="calculateValues(this)" style="height:64px;" />
                                    </td>
                                    <td>
                                        <input name="ctl00$ctl00$Body$Body$rptItems$ctl00$txtDiscount" type="text" id="Body_Body_rptItems_txtDiscount_0" class="form-control" onkeyup="calculateValues(this)" style="height:64px;" />
                                    </td>
                                    <td>
                                        <span id="Body_Body_rptItems_lblLineTotal_0" class="form-control" style="display:inline-block;height:64px;"></span>
                                    </td>
                                    <td>
                                        <input type="button" name="ctl00$ctl00$Body$Body$rptItems$ctl00$btnDeleteRow" value="X" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$rptItems$ctl00$btnDeleteRow&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))" id="Body_Body_rptItems_btnDeleteRow_0" class="btn btn-danger" style="height:64px;" />
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <span id="Body_Body_rptItems_RegularExpressionValidator3_0" style="color:Red;display:none;">Please enter only numbers like 1 or 1.00</span>
                                    </td>
                                    <td>
                                        <span id="Body_Body_rptItems_RegularExpressionValidator4_0" style="color:Red;display:none;">Please enter only numbers like 1 or 1.00</span>
                                    </td>
                                    <td>
                                        <span id="Body_Body_rptItems_RegularExpressionValidator5_0" style="color:Red;display:none;">Please enter only numbers like 1 or 1.00</span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                    
                        
                                
                                <tr>
                                    <td>
                                        <textarea name="ctl00$ctl00$Body$Body$rptItems$ctl01$txtDescription" rows="2" cols="20" id="Body_Body_rptItems_txtDescription_1" class="form-control">
</textarea>
                                    </td>
                                    <td>
                                        <input name="ctl00$ctl00$Body$Body$rptItems$ctl01$txtQuantity" type="text" id="Body_Body_rptItems_txtQuantity_1" class="form-control" onkeyup="calculateValues(this)" style="height:64px;" />
                                    </td>
                                    <td>
                                        <input name="ctl00$ctl00$Body$Body$rptItems$ctl01$txtUnitPrice" type="text" id="Body_Body_rptItems_txtUnitPrice_1" class="form-control" onkeyup="calculateValues(this)" style="height:64px;" />
                                    </td>
                                    <td>
                                        <input name="ctl00$ctl00$Body$Body$rptItems$ctl01$txtDiscount" type="text" id="Body_Body_rptItems_txtDiscount_1" class="form-control" onkeyup="calculateValues(this)" style="height:64px;" />
                                    </td>
                                    <td>
                                        <span id="Body_Body_rptItems_lblLineTotal_1" class="form-control" style="display:inline-block;height:64px;"></span>
                                    </td>
                                    <td>
                                        <input type="button" name="ctl00$ctl00$Body$Body$rptItems$ctl01$btnDeleteRow" value="X" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$rptItems$ctl01$btnDeleteRow&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))" id="Body_Body_rptItems_btnDeleteRow_1" class="btn btn-danger" style="height:64px;" />
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <span id="Body_Body_rptItems_RegularExpressionValidator3_1" style="color:Red;display:none;">Please enter only numbers like 1 or 1.00</span>
                                    </td>
                                    <td>
                                        <span id="Body_Body_rptItems_RegularExpressionValidator4_1" style="color:Red;display:none;">Please enter only numbers like 1 or 1.00</span>
                                    </td>
                                    <td>
                                        <span id="Body_Body_rptItems_RegularExpressionValidator5_1" style="color:Red;display:none;">Please enter only numbers like 1 or 1.00</span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                    
                        
                                
                                <tr>
                                    <td>
                                        <textarea name="ctl00$ctl00$Body$Body$rptItems$ctl02$txtDescription" rows="2" cols="20" id="Body_Body_rptItems_txtDescription_2" class="form-control">
</textarea>
                                    </td>
                                    <td>
                                        <input name="ctl00$ctl00$Body$Body$rptItems$ctl02$txtQuantity" type="text" id="Body_Body_rptItems_txtQuantity_2" class="form-control" onkeyup="calculateValues(this)" style="height:64px;" />
                                    </td>
                                    <td>
                                        <input name="ctl00$ctl00$Body$Body$rptItems$ctl02$txtUnitPrice" type="text" id="Body_Body_rptItems_txtUnitPrice_2" class="form-control" onkeyup="calculateValues(this)" style="height:64px;" />
                                    </td>
                                    <td>
                                        <input name="ctl00$ctl00$Body$Body$rptItems$ctl02$txtDiscount" type="text" id="Body_Body_rptItems_txtDiscount_2" class="form-control" onkeyup="calculateValues(this)" style="height:64px;" />
                                    </td>
                                    <td>
                                        <span id="Body_Body_rptItems_lblLineTotal_2" class="form-control" style="display:inline-block;height:64px;"></span>
                                    </td>
                                    <td>
                                        <input type="button" name="ctl00$ctl00$Body$Body$rptItems$ctl02$btnDeleteRow" value="X" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$rptItems$ctl02$btnDeleteRow&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))" id="Body_Body_rptItems_btnDeleteRow_2" class="btn btn-danger" style="height:64px;" />
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <span id="Body_Body_rptItems_RegularExpressionValidator3_2" style="color:Red;display:none;">Please enter only numbers like 1 or 1.00</span>
                                    </td>
                                    <td>
                                        <span id="Body_Body_rptItems_RegularExpressionValidator4_2" style="color:Red;display:none;">Please enter only numbers like 1 or 1.00</span>
                                    </td>
                                    <td>
                                        <span id="Body_Body_rptItems_RegularExpressionValidator5_2" style="color:Red;display:none;">Please enter only numbers like 1 or 1.00</span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                    
                        
                                
                                <tr>
                                    <td>
                                        <textarea name="ctl00$ctl00$Body$Body$rptItems$ctl03$txtDescription" rows="2" cols="20" id="Body_Body_rptItems_txtDescription_3" class="form-control">
</textarea>
                                    </td>
                                    <td>
                                        <input name="ctl00$ctl00$Body$Body$rptItems$ctl03$txtQuantity" type="text" id="Body_Body_rptItems_txtQuantity_3" class="form-control" onkeyup="calculateValues(this)" style="height:64px;" />
                                    </td>
                                    <td>
                                        <input name="ctl00$ctl00$Body$Body$rptItems$ctl03$txtUnitPrice" type="text" id="Body_Body_rptItems_txtUnitPrice_3" class="form-control" onkeyup="calculateValues(this)" style="height:64px;" />
                                    </td>
                                    <td>
                                        <input name="ctl00$ctl00$Body$Body$rptItems$ctl03$txtDiscount" type="text" id="Body_Body_rptItems_txtDiscount_3" class="form-control" onkeyup="calculateValues(this)" style="height:64px;" />
                                    </td>
                                    <td>
                                        <span id="Body_Body_rptItems_lblLineTotal_3" class="form-control" style="display:inline-block;height:64px;"></span>
                                    </td>
                                    <td>
                                        <input type="button" name="ctl00$ctl00$Body$Body$rptItems$ctl03$btnDeleteRow" value="X" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$rptItems$ctl03$btnDeleteRow&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))" id="Body_Body_rptItems_btnDeleteRow_3" class="btn btn-danger" style="height:64px;" />
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <span id="Body_Body_rptItems_RegularExpressionValidator3_3" style="color:Red;display:none;">Please enter only numbers like 1 or 1.00</span>
                                    </td>
                                    <td>
                                        <span id="Body_Body_rptItems_RegularExpressionValidator4_3" style="color:Red;display:none;">Please enter only numbers like 1 or 1.00</span>
                                    </td>
                                    <td>
                                        <span id="Body_Body_rptItems_RegularExpressionValidator5_3" style="color:Red;display:none;">Please enter only numbers like 1 or 1.00</span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                    
                        
                                
                                <tr>
                                    <td>
                                        <textarea name="ctl00$ctl00$Body$Body$rptItems$ctl04$txtDescription" rows="2" cols="20" id="Body_Body_rptItems_txtDescription_4" class="form-control">
</textarea>
                                    </td>
                                    <td>
                                        <input name="ctl00$ctl00$Body$Body$rptItems$ctl04$txtQuantity" type="text" id="Body_Body_rptItems_txtQuantity_4" class="form-control" onkeyup="calculateValues(this)" style="height:64px;" />
                                    </td>
                                    <td>
                                        <input name="ctl00$ctl00$Body$Body$rptItems$ctl04$txtUnitPrice" type="text" id="Body_Body_rptItems_txtUnitPrice_4" class="form-control" onkeyup="calculateValues(this)" style="height:64px;" />
                                    </td>
                                    <td>
                                        <input name="ctl00$ctl00$Body$Body$rptItems$ctl04$txtDiscount" type="text" id="Body_Body_rptItems_txtDiscount_4" class="form-control" onkeyup="calculateValues(this)" style="height:64px;" />
                                    </td>
                                    <td>
                                        <span id="Body_Body_rptItems_lblLineTotal_4" class="form-control" style="display:inline-block;height:64px;"></span>
                                    </td>
                                    <td>
                                        <input type="button" name="ctl00$ctl00$Body$Body$rptItems$ctl04$btnDeleteRow" value="X" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$rptItems$ctl04$btnDeleteRow&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))" id="Body_Body_rptItems_btnDeleteRow_4" class="btn btn-danger" style="height:64px;" />
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <span id="Body_Body_rptItems_RegularExpressionValidator3_4" style="color:Red;display:none;">Please enter only numbers like 1 or 1.00</span>
                                    </td>
                                    <td>
                                        <span id="Body_Body_rptItems_RegularExpressionValidator4_4" style="color:Red;display:none;">Please enter only numbers like 1 or 1.00</span>
                                    </td>
                                    <td>
                                        <span id="Body_Body_rptItems_RegularExpressionValidator5_4" style="color:Red;display:none;">Please enter only numbers like 1 or 1.00</span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                    
                
                <tr>
                    <td><input type="button" name="ctl00$ctl00$Body$Body$btnAddRow" value="Add new line" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btnAddRow&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))" id="Body_Body_btnAddRow" class="btn btn-primary" /></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Sub-Total</td>
                    <td>
                        <span id="Body_Body_lblSubtotal" class="h3">0.00</span>
                    </td>
                    <td></td>
                </tr>
                <tr style="display:none; visibility:hidden">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><div style="display:none; visibility:hidden">Tax Total</div></td>
                    <td>
                        <span id="Body_Body_lblTaxTotal" class="h3" style="display:none; visibility:hidden">0.00</span>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td>
                        <span id="Body_Body_lblTotal" class="h2">0.00</span>
                    </td>
                    <td></td>
                </tr>
            </table>
            <br />
            <hr />
            <div style="text-align:right; float:right">
                <table>
                    <tr>
                        <td>
                            
                            <input type="submit" name="ctl00$ctl00$Body$Body$btnSaveInvoice" value="Save" onclick="HBAC(this);WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btnSaveInvoice&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="Body_Body_btnSaveInvoice" class="btn btn-success" />
                            
                            
                            
                            
                            &nbsp;
                        </td>
                        <td>
                            <input type="button" name="ctl00$ctl00$Body$Body$btnCancelInvoice" value="Cancel" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btnCancelInvoice&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))" id="Body_Body_btnCancelInvoice" class="btn btn-danger" />
                        </td>
                    </tr>
                </table>
            </div>
            <br /><br />
            </form>
            
        </div>
    </div>
    
      
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#filterInput').on('input', function () {
            var keyword = $(this).val();

            $.ajax({
                url: '{{ route("filter.customer") }}',
                type: 'GET',
                data: { keyword: keyword },
               // Assuming this is your Ajax success callback
    success: function (response) {
      var itemsList = $('#filteredItems');
      $("#filteredItems").show();
      itemsList.empty();

    $.each(response.items, function (index, item) {
        var itemLink = '{{ route("filter.customer") }}/' + item.id;

        // Append the list item with a hyperlink
        itemsList.append('<li><a href="#" data-item-id="' + item.id + '">' + item.name + '-' + item.id + '</a></li>');
    });

    // Attach a click event handler to the hyperlinks in the list
        itemsList.find('a').click(function (e) {
            e.preventDefault();
    
            // Get the selected item ID
            var selectedItemID = $(this).data('item-id');
            var itemLink = '{{ route("filter.customer") }}/' + selectedItemID ;
            // Make an Ajax request to fetch detailed information for the selected item
            $.ajax({
               url: itemLink,

                type: 'GET',
                success: function (detailsResponse) {
                  
              
                    // Populate the form fields with the retrieved details
                    $("#selectedId").text(detailsResponse.id);
                     $("#filteredItems").hide();
                    // Add more lines to populate other form fields as needed
                },
                error: function (errorResponse) {
                    console.error('Error fetching details:', errorResponse);
                }
            });
        });
    },

                error: function (error) {
                    console.log(error);
                }
            });
        });
    });
</script>>
    @include('admin.shared.viw_footer')