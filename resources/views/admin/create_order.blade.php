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
                    <li class="nav-item" style="margin-top:5px; margin-right:5px; display:none; visibility:hidden">
                        
                    </li>
                </ul>
                <div id="tabContentOrder" class="tab-content">
                    <div id="Body_Body_pnl_NewOrderWizard_Tab_Order" class="tab-pane active" role="tabpanel">
                        <h1>Order Wizard  | New Customer</h1>
                        <p style="text-align:center">
                        </p>
                        <div id="Body_Body_pnl_NewOrderWizard_NewCustomer">
				
				 <form action="{{ route('admin.orders.store') }}" method="post">
                               @csrf
                            <div class="row">
                                <div class="col-lg-12"><h2>Customer Details</h2></div>
                                <div class="col-lg-12"><input name="Customer_Name" type="text" id="Body_Body_txt_NewOrderWizard_NewCustomer_Name" class="form-control" placeholder="Customer Display Name" required="required" style="width:100%;" /><br /></div>
                            
                                <div class="col-lg-4">First Name: <input name="Customer_FirstName" type="text" id="Body_Body_txt_NewOrderWizard_NewCustomer_FirstName" class="form-control" placeholder="First Name" required="required" style="width:100%;" /><br /></div>
                                <div class="col-lg-4">Last Name: <input name="Customer_LastName" type="text" id="Body_Body_txt_NewOrderWizard_NewCustomer_LastName" class="form-control" placeholder="Last Name" required="required" style="width:100%;" /><br /></div>
                                <div class="col-lg-4">Position: <input name="Customer_Position" type="text" id="Body_Body_txt_NewOrderWizard_NewCustomer_Position" class="form-control" placeholder="Position" style="width:100%;" /><br /></div>
                                <div class="col-lg-6">Primary Email: <input name="Customer_PrimaryEmail" type="text" id="Body_Body_txt_NewOrderWizard_NewCustomer_PrimaryEmail" class="form-control" placeholder="Primary Email" required="required" style="width:100%;" /><br /></div>
                                <div class="col-lg-6">Billing Email: <input name="Customer_BillingEmail" type="text" id="Body_Body_txt_NewOrderWizard_NewCustomer_BillingEmail" class="form-control" placeholder="Billing Email" required="required" style="width:100%;" /><br /></div>
                                <div class="col-lg-3">Work Phone: <input name="Customer_WorkPhone" type="text" id="Body_Body_txt_NewOrderWizard_NewCustomer_WorkPhone" class="form-control" placeholder="Work Phone" style="width:100%;" /><br /></div>
                                <div class="col-lg-3">Mobile Phone: <input name="Customer_MobilePhone" type="text" id="Body_Body_txt_NewOrderWizard_NewCustomer_MobilePhone" class="form-control" placeholder="Mobile Phone" style="width:100%;" /><br /></div>
                                <div class="col-lg-3">Home Phone: <input name="Customer_HomePhone" type="text" id="Body_Body_txt_NewOrderWizard_NewCustomer_HomePhone" class="form-control" placeholder="Home Phone" style="width:100%;" /><br /></div>

                          <div class="col-lg-12">
    <span class="h3">
        <input id="Body_Body_cb_NewOrderWizard_NewCustomer_BusinessCustomer" type="checkbox" name="ctl00$ctl00$Body$Body$cb_NewOrderWizard_NewCustomer_BusinessCustomer" onclick="toggleBusinessFields()" />
        <label for="Body_Body_cb_NewOrderWizard_NewCustomer_BusinessCustomer">Business Customer?</label>
    </span>
    <br /><br />
</div>

<div id="Body_Body_pnl_NewOrderWizard_NewCustomer_Business" class="col-lg-12" style="display:none;">
    <!-- Business Details Fields -->
    <div class="row">
        <div class="col-lg-12"><h2>Business Details</h2></div>
        <div class="col-lg-12">Legal Business Name: <input name="business_name" type="text" id="Body_Body_txt_NewOrderWizard_NewCustomer_LegalBusinessName" class="form-control" placeholder="Legal Business Name" style="width:100%;"><br></div>
        <div class="col-lg-12">Trading Name (*): <input name="trending_name" type="text" id="Body_Body_txt_NewOrderWizard_NewCustomer_TradingName" class="form-control" placeholder="Trading Name"  style="width:100%;"><br></div>
        <div class="col-lg-6">ABN: <input name="abn" type="text" id="Body_Body_txt_NewOrderWizard_NewCustomer_ABN" class="form-control" placeholder="ABN" style="width:100%;"><br></div>
        <div class="col-lg-6">ACN: <input name="acn" type="text" id="Body_Body_txt_NewOrderWizard_NewCustomer_ACN" class="form-control" placeholder="ACN" style="width:100%;"><br></div>
        <div class="col-lg-12">
            <br>
        </div>
    </div>
</div>           
                                <div class="col-lg-12"><h2>Billing Details</h2></div>
                                <div class="col-lg-6"><br /><input id="Body_Body_cbDepositRequired" type="checkbox" name="DepositRequired" checked="checked" /><label for="Body_Body_cbDepositRequired">Deposit Required</label></div>
                                <div class="col-lg-4">Deposit (%):<input name="DepositPercentage" type="text" value="50" id="Body_Body_txtDepositPercentage" class="form-control" placeholder="Deposit (%)" required="required" style="width:100%;" /><br /></div>
                                <div class="col-lg-6">
                                    Payment Term: <br />
                                    <select name="PaymentTerm" id="Body_Body_txtPaymentTerm" class="form-control" placeholder="Payment Term" required="required" style="width:100%;">
					<option value="7 Days from Completion">7 Days from Completion</option>
					<option value="14 Days from Completion">14 Days from Completion</option>
					<option value="30 Days from Completion">30 Days from Completion</option>
					<option value="30 Days from EOM">30 Days from EOM</option>
					<option selected="selected" value="COD">COD</option>

				</select>
                                    <br />
                                </div>
                                <div class="col-lg-4">Credit Limit (0 = Unlimited):<input name="CreditLimit" type="text" value="0" id="Body_Body_txtCreditLimit" class="form-control" placeholder="Credit Limit ($)" required="required" style="width:100%;" /><br /></div>
                                <div class="col-lg-4">Fixed Discount (%):<input name="FixedDiscount" type="text" value="0" id="Body_Body_txtFixedDiscount" class="form-control" placeholder="Fixed Discount (%)" required="required" style="width:100%;" /><br /></div>
                                <div class="col-lg-12"><h2>Billing Address</h2></div>
                                <div class="col-lg-12">Address Line 1: <input name="Customer_BillingAddressLine1" type="text" id="Body_Body_txt_NewOrderWizard_NewCustomer_BillingAddressLine1" class="form-control" placeholder="Address Line 1" required="required" style="width:100%;" /><br /></div>
                                <div class="col-lg-12">Address Line 2: <input name="Customer_BillingAddressLine2" type="text" id="Body_Body_txt_NewOrderWizard_NewCustomer_BillingAddressLine2" class="form-control" placeholder="Address Line 2" style="width:100%;" /><br /></div>
                                <div class="col-lg-3">Suburb: <input name="Customer_BillingSuburb" type="text" id="Body_Body_txt_NewOrderWizard_NewCustomer_BillingSuburb" class="form-control" placeholder="Suburb" required="required" style="width:100%;" /><br /></div>
                                <div class="col-lg-3">State: <select name="Customer_BillingState" id="Body_Body_txt_NewOrderWizard_NewCustomer_BillingState" class="form-control" placeholder="State" required="required" style="width:100%;">
					<option selected="selected" value="Victoria">Victoria</option>
					<option value="New South Wales">New South Wales</option>
					<option value="Queensland">Queensland</option>
					<option value="South Australia">South Australia</option>
					<option value="Tasmania">Tasmania</option>
					<option value="Western Australia">Western Australia</option>
					<option value="Northern Territory">Northern Territory</option>
					<option value="Australian Capital Territory">Australian Capital Territory</option>

				</select><br /></div>
                                <div class="col-lg-3">Post Code: <input name="Customer_BillingPostCode" type="text" id="Body_Body_txt_NewOrderWizard_NewCustomer_BillingPostCode" class="form-control" placeholder="Post Code" required="required" style="width:100%;" /><br /></div>
                                <div class="col-lg-3">Country: <select name="Customer_BillingCountry" id="Body_Body_txt_NewOrderWizard_NewCustomer_BillingCountry" class="form-control" placeholder="Country" required="required" style="width:100%;">
					<option selected="selected" value="Australia">Australia</option>

				</select><br /></div>
                            
                                <div class="col-lg-12"><h2>Delivery Address <input type="button" name="Customer_CopyBillingAddressToDelivery" value="As Above" onclick="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$btn_NewOrderWizard_NewCustomer_CopyBillingAddressToDelivery&#39;,&#39;&#39;)" id="Body_Body_btn_NewOrderWizard_NewCustomer_CopyBillingAddressToDelivery" class="btn btn-info" /></h2></div>
                                <div class="col-lg-12">Address Line 1: <input name="Customer_DeliveryAddressLine1" type="text" id="Body_Body_txt_NewOrderWizard_NewCustomer_DeliveryAddressLine1" class="form-control" placeholder="Address Line 1" required="required" style="width:100%;" /><br /></div>
                                <div class="col-lg-12">Address Line 2: <input name="Customer_DeliveryAddressLine2" type="text" id="Body_Body_txt_NewOrderWizard_NewCustomer_DeliveryAddressLine2" class="form-control" placeholder="Address Line 2" style="width:100%;" /><br /></div>
                                <div class="col-lg-3">Suburb: <input name="Customer_DeliverySuburb" type="text" id="Body_Body_txt_NewOrderWizard_NewCustomer_DeliverySuburb" class="form-control" placeholder="Suburb" required="required" style="width:100%;" /><br /></div>
                                <div class="col-lg-3">State: <select name="Customer_DeliveryState" id="Body_Body_txt_NewOrderWizard_NewCustomer_DeliveryState" class="form-control" placeholder="State" required="required" style="width:100%;">
					<option selected="selected" value="Victoria">Victoria</option>
					<option value="New South Wales">New South Wales</option>
					<option value="Queensland">Queensland</option>
					<option value="South Australia">South Australia</option>
					<option value="Tasmania">Tasmania</option>
					<option value="Western Australia">Western Australia</option>
					<option value="Northern Territory">Northern Territory</option>
					<option value="Australian Capital Territory">Australian Capital Territory</option>

				</select><br /></div>
                                <div class="col-lg-3">Post Code: <input name="Customer_DeliveryPostCode" type="text" id="Body_Body_txt_NewOrderWizard_NewCustomer_DeliveryPostCode" class="form-control" placeholder="Post Code" required="required" style="width:100%;" /><br /></div>
                                <div class="col-lg-3">Country: <select name="Customer_DeliveryCountry" id="Body_Body_txt_NewOrderWizard_NewCustomer_DeliveryCountry" class="form-control" placeholder="Country" required="required" style="width:100%;">
					<option selected="selected" value="Australia">Australia</option>

				</select><br /></div>


                                <div class="col-lg-12" style="text-align:center">
                                    
                                    <p>
                                        <input type="submit" value="Submit"  id="" class="btn btn-success" />
                                    </p>
                                </div>
                            </div>
                            </form>
                        
			</div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    
		</div>
                    
                    
                </div>
            </div>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        
	</div>
        
        
        
        
    
</div>

<script>
    function toggleBusinessFields() {
        var businessPanel = document.getElementById('Body_Body_pnl_NewOrderWizard_NewCustomer_Business');
        businessPanel.style.display = document.getElementById('Body_Body_cb_NewOrderWizard_NewCustomer_BusinessCustomer').checked ? 'block' : 'none';
    }
</script>
    

@include('admin.shared.viw_footer')

<!-- Include jQuery -->
