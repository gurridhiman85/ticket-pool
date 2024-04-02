<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <!-- Add your CSS stylesheets and other head elements here -->
</head>
<body>

<div id="Body_Body_pnlSubOverlay">
    <div id="Body_Body_pnl_Overlay_ItemView" class="container">

    

        <div role="tabpanel">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><button class="btn btn-info" onclick="switchTab('Information')">Information</button></li>
                <li class="nav-item"><button class="btn btn-primary" onclick="switchTab('ItemDetails')">Item Details</button></li>
                <li class="nav-item"><button class="btn btn-primary" onclick="switchTab('Inventory')">Inventory</button></li>
                <li class="nav-item"><button class="btn btn-primary" onclick="switchTab('WebDetails')">Web Details</button></li>
                <li class="nav-item"><button class="btn btn-warning" onclick="switchTab('CreatePO')">Create PO</button></li>
            </ul>
            <div id="tabContentInventory" class="tab-content">
                <div id="Body_Body_pnlTabInformation" class="tab-pane active" role="tabpanel">

                   <div class="row">
            <div class="mb-3 col-lg-6">
              <label for="" class="form-label">Item Code (*):</label>
              <input type="text" class="form-control" id="item_code" value="{{$inventoryDetails->item_code}}"name="item_code" required>
                  <!-- @error('item_code')
                <div>{{ $message }}</div>
            @enderror -->
            </div>
            <div class="mb-3 col-lg-6">
              <label for="" class="form-label">Supplier:</label>
              <input type="text" class="form-control"id="supplier"  value="{{$inventoryDetails->supplier}}" name="supplier" required>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-lg-6">
              <label for="" class="form-label">Item Name (*):</label>
              <input type="text" class="form-control" id="item_name"  value="{{$inventoryDetails->item_name}}" name="item_name" required>
            </div>
            <div class="mb-3 col-lg-6">
              <label for="" class="form-label">Selling Name (*):</label>
              <input type="text" class="form-control"id="selling_name"  value="{{$inventoryDetails->selling_name}}" name="selling_name" required>
            </div>
            <div class="col-lg-3">
            <br />
            <input id="cbKeepInventory" type="checkbox" checked="checked" onclick="toggleCheckbox('cbKeepInventory')" />
            <label for="cbKeepInventory">Keep Inventory</label>
            <br />
        </div>
        <div class="col-lg-3">
            <br />
            <input id="cbGridPricing" type="checkbox" />
            <label for="cbGridPricing">Grid Pricing</label>
            <br />
        </div>
        <div class="col-lg-3">
            <br />
            <input id="cbWeb" type="checkbox" checked="checked" onclick="toggleCheckbox('cbWeb')" />
            <label for="cbWeb">Enable Web</label>
            <br />
        </div>
        <div class="col-lg-3">
            <br />
            <input id="cbDeleted" type="checkbox" />
            <label for="cbDeleted">Deleted</label>
            <br />
            </div>
        </div>

                </div>
                <div id="Body_Body_pnlTabItemDetails" class="tab-pane" role="tabpanel">



                    <h3>Item Details     <button class="btn btn-info" onclick="openItemDetailsModal()">+</button> </h3>
                    <div style="overflow-x:auto; overflow-y:auto; max-height:60vh; width:100%; max-width:100%">
                                        <div>
                        						<table cellspacing="0" cellpadding="3" rules="cols" id="Body_Body_gvItemDetails" style="color:Black;background-color:White;border-color:#999999;border-width:1px;border-style:Solid;width:100%;border-collapse:collapse;">
                            <tr style="color:White;background-color:Black;font-weight:bold;">
                                <th scope="col" style="width:53px;">&nbsp;</th>
                                <th scope="col" style="width:53px;">&nbsp;</th>
                                <th scope="col">Minimum Quantity</th>
                                <th scope="col">Maximum Quantity</th>
                                <th scope="col">Minimum Processes</th>
                                <th scope="col">Maximum Processes</th>
                                <th scope="col">Sizes</th>
                                <th scope="col">Colours</th>
                                <th scope="col">Purchase Price ExGST</th>
                            </tr>
                            @php 
                        
                         $itemDetails = DB::table('invertory_details')->where('invertory_id', $inventoryDetails->id)->get();
                         
                        @endphp
                            @foreach($itemDetails as $index => $item)
    
                                <tr style="background-color:{{ $index % 2 == 0 ? '#CCCCCC' : 'White' }};">
                                    <td>
                                        <a class="btn btn-warning btnmargin" onclick="openEditModal({{ $item->id }})" >Edit</a>
                                    </td>
                                    <td>
                                        <a onclick="return confirm('By proceeding, you confirm you wish to delete this item!');" class="btn btn-danger btnmargin" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions('$item->id ', '', true, '', '', false, true))">X</a>
                                    </td>
                                    <td>{{ $item->minimum_quantity }}</td>
                                    <td>{{ $item->maximum_quantity }}</td>
                                    <td>{{ $item->minimum_processes }}</td>
                                    <td>{{ $item->maximum_processes }}</td>
                                    <td>{{ $item->sizes }}</td>
                                    <td>{{ $item->colours }}</td>
                                    <td>{{ $item->purchase_price_ex }}</td>
                                </tr>
                            @endforeach
                            </table>
					</div>
                                    </div>
                                    <br />

                </div>
                <div id="Body_Body_pnlTabInventory" class="tab-pane" role="tabpanel">

                   <div id="Body_Body_pnl_Overlay_ItemView_Inventory">
					
                                    <br />
                                    <h3>Inventory <input type="submit" name="ctl00$ctl00$Body$Body$btnViewInventoryHistory" value="View History" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btnViewInventoryHistory&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="Body_Body_btnViewInventoryHistory" class="btn btn-success" /></h3>
                                    <table>
                                        <tr>
                                            <th style="width:150px">Type</th>
                                            <th style="width:150px">Count</th>
                                            <th>Manual Adjustment</th>
                                        </tr>
                                        <tr>
                                            <th>Stock</th>
                                            <td style="font-weight:bolder">(-2000)</td>
                                            <td>
                                               <!-- Button to trigger the modal -->
						<input type="button" value="Increase" onclick="openInventoryDetailsModal()" id="Body_Body_btnStock_Increase" class="btn btn-info" />&nbsp;&nbsp;
                                                <input type="button"  value="Decrease"  onclick="openInventoryDetailsModalDecrease()" id="Body_Body_btnStock_Decrease" class="btn btn-warning" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Sample Stock</th>
                                            <td style="font-weight:bolder">(0)</td>
                                            <td>
                                                <input type="submit"  value="Increase"  onclick="openInventoryDetailsModal1()"   class="btn btn-info" />&nbsp;&nbsp;
                                                <input type="submit"   value="Decrease" onclick="openInventoryDetailsModalDecrease1()"id="Body_Body_btnSampleStock_Decrease" class="btn btn-warning" />
                                            </td>
                                        </tr>
                                    </table>
                                    <br />

                </div>
                <!-- Add more tab content as needed -->

            </div>
            
            
            
            <div id="Body_Body_pnlTabWebDetails" class="tab-pane" role="tabpanel">

                   <div id="Body_Body_pnl_Overlay_ItemView_WebDetails">
				 <div class="container">
      

        <form method="post" action="{{route('admin/inventory/webdetails')}}" enctype="multipart/form-data">
            @csrf
          <input type="hidden" class="form-control"   value="{{$inventoryDetails->id}}" name="inventory_id">
            <div class="row">
                <div class="col-lg-12">
                    <br>
                    <h3>Web Details | <span style="font-size:13px"><input id="cbMakePublic" type="checkbox" name="cbMakePublic" checked="checked" /><label for="cbMakePublic">Make Public</label> <input id="cbWebAddToFeaturePage" type="checkbox" name="cbWebAddToFeaturePage" /><label for="cbWebAddToFeaturePage">Add to Feature Page</label></span></h3>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    Primary Display Image: <input type="file" name="fuPrimaryDisplayImage" class="btn btn-primary" style="width:100%;">
                    <br>
                    <input type="button" name="btnUploadPrimaryDisplayImage" value="Upload" class="btn btn-success">
                    <br>
                 <!-- Display existing image here -->
            @if(isset($inventoryWebDetails->primary_display_image_path)) 
              <img src="{{ asset('storage/app/public/' . $inventoryWebDetails->primary_display_image_path) }}" alt="Primary Display Image" style="width: 227px;">

            @endif
                </div>

                <!-- Add other form fields and columns here -->

                <div class="col-lg-4">
                    Other Display Image: <input type="file" name="fuOtherDisplayImage" class="btn btn-primary" style="width:100%;">
                    <br>
                    <input type="button" name="btnUploadOtherDisplayImage" value="Upload" class="btn btn-success">
                    <br>
                    <!-- Display existing images here -->
                      @if(isset($inventoryWebDetails->fuOtherDisplayImage)) 
                   <img src="{{ asset('storage/app/public/' . $inventoryWebDetails->fuOtherDisplayImage) }}" alt="" style="width: 227px;">

                  @endif
                </div>

                <!-- Repeat the structure for other display images -->

                <div class="col-lg-12">
                    Title: <textarea name="txtWebTitle" rows="2" cols="20" class="form-control" placeholder="Title" required style="width:100%;"> {{$inventoryWebDetails->txtWebTitle ?? " "}}</textarea>
                    <br>
                </div>

                <div class="col-lg-12">
                    Description: <textarea name="txtWebDescription" rows="2" cols="20" class="form-control" placeholder="Description" required style="width:100%;"> {{$inventoryWebDetails->txtWebDescription ?? " "}} </textarea>
                    <br>
                </div>

                <div class="col-lg-6">
                    Category: 
                    <input name="txtWebCategory" type="text" class="form-control" placeholder="Category" required style="width:100%;" value = "{{$inventoryWebDetails->txtWebCategory ?? " "}}" />
                    <input type="hidden" name="hftxtWebCategory" />
                    <!-- Add autocomplete functionality if needed -->
                    <br>
                </div>

                <div class="col-lg-6">
                    Subcategory: 
                    <input name="txtWebSubcategory" type="text" class="form-control" placeholder="Subcategory" required style="width:100%;"  value="{{$inventoryWebDetails->txtWebSubcategory ?? " "}}" />
                    <input type="hidden" name="hftxtWebSubcategory" />
                    <!-- Add autocomplete functionality if needed -->
                    <br>
                </div>

                <div class="col-lg-12">
                    Available Sizes (If Applicable, separate by vertical bar |): 
                    <input name="txtWebAvailableSizes" type="text" class="form-control" placeholder="Available Sizes" style="width:100%;"  value="{{$inventoryWebDetails->txtWebAvailableSizes ?? " "}}" />
                    <br>
                </div>

                <div class="col-lg-12">
                    Available Colours (If Applicable, separate by vertical bar |): 
                    <input name="txtWebAvailableColours" type="text" class="form-control" placeholder="Available Colours" style="width:100%;"  value="{{$inventoryWebDetails->txtWebAvailableColours ?? " "}}"/>
                    <br>
                </div>

                <div class="col-lg-12">
                    Document (PDF, max 10MB):  
                    <input type="file" name="fuWebPublicItemDocumentation" class="btn btn-primary" style="width:100%;"  />
                    <br>
                    <br>
                     @if(isset($inventoryWebDetails->fuWebPublicItemDocumentation)) 
                   <img src="{{ asset('storage/app/public/' . $inventoryWebDetails->fuWebPublicItemDocumentation) }}" alt="" style="width: 227px;">

                  @endif
                </div>

                <div class="col-lg-3">
                    <br>
                <input id="cbWebEnableCustomDesigner" type="checkbox" name="cbWebEnableCustomDesigner" onclick="javascript:setTimeout('__doPostBack(\'cbWebEnableCustomDesigner\',\'\')', 0)" {{ $inventoryWebDetails->cbWebEnableCustomDesigner == 'on' ? 'checked' : '' }} />

                    <label for="cbWebEnableCustomDesigner">Enable Custom Designer</label>
                    <br>
                </div>

                <div class="col-lg-6">
                    <br>
                    <input id="cbMoveToProduction" type="checkbox" name="cbMoveToProduction"  {{$inventoryWebDetails->cbMoveToProduction == 'on' ? 'checked' : ''}}/>
                    <label for="cbMoveToProduction">No Approval Required, Move to Production</label>
                    <br>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12" style="text-align:right">
                    <p>
                        <input type="submit" name="btnSaveOnly" value="Save" class="btn btn-success">
                        <input type="submit" name="btnSubmitInventory" value="Save and Close" class="btn btn-success">
                    </p>
                </div>
            </div>
        </form>
    </div>

                </div>
                <!-- Add more tab content as needed -->

            </div>
            <div id="Body_Body_pnlTabInventory" class="tab-pane" role="tabpanel">

                   <div id="Body_Body_pnl_Overlay_ItemView_Inventory">
					
                                    <br />
                                    <h3>Inventory <input type="submit" name="ctl00$ctl00$Body$Body$btnViewInventoryHistory" value="View History" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btnViewInventoryHistory&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="Body_Body_btnViewInventoryHistory" class="btn btn-success" /></h3>
                                    <table>
                                        <tr>
                                            <th style="width:150px">Type</th>
                                            <th style="width:150px">Count</th>
                                            <th>Manual Adjustment</th>
                                        </tr>
                                        <tr>
                                            <th>Stock</th>
                                            <td style="font-weight:bolder">(-2000)</td>
                                            <td>
                                               <!-- Button to trigger the modal -->
						<input type="button" value="Increase" onclick="openInventoryDetailsModal()" id="Body_Body_btnStock_Increase" class="btn btn-info" />&nbsp;&nbsp;
                                                <input type="button"  value="Decrease"  onclick="openInventoryDetailsModalDecrease()" id="Body_Body_btnStock_Decrease" class="btn btn-warning" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Sample Stock</th>
                                            <td style="font-weight:bolder">(0)</td>
                                            <td>
                                                <input type="submit"  value="Increase"  onclick="openInventoryDetailsModal1()"   class="btn btn-info" />&nbsp;&nbsp;
                                                <input type="submit"   value="Decrease" onclick="openInventoryDetailsModalDecrease1()"id="Body_Body_btnSampleStock_Decrease" class="btn btn-warning" />
                                            </td>
                                        </tr>
                                    </table>
                                    <br />

                </div>
                <!-- Add more tab content as needed -->

            </div>
            
        </div>

        <div class="row">
            <div class="col-lg-12" style="text-align:right">
                <p>
                    <!--<button class="btn btn-success" onclick="saveData('SaveOnly')">Save</button>-->
                    <!--<button class="btn btn-success" onclick="saveData('SaveAndClose')">Save and Close</button>-->
                </p>
            </div>
        </div>

    </div>
</div>

<!-- Modal for Item Details -->
<div class="modal" id="itemDetailsModal" tabindex="-1" role="dialog" aria-labelledby="itemDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="itemDetailsModalLabel">Add Item Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div id="Body_Body_pnl_Overlay_ItemView_Details" class="container">
    <h2>Inventory Item Details</h2>
    <form method="post" action="{{route('save.item.details')}}">
        @csrf
<input type="hidden" class="form-control"id="supplier"  value="{{$inventoryDetails->id}}" name="inventory_id">
        <div class="row">
            <div class="col-lg-12">
                Minimum Quantity:
                <input name="txtItemDetails_MinimumQuantity" type="text" class="form-control" placeholder="Minimum Quantity" required="required" style="width:100%;" />
                <br />
            </div>
            <div class="col-lg-12">
                Maximum Quantity:
                <input name="txtItemDetails_MaximumQuantity" type="text" class="form-control" placeholder="Maximum Quantity" required="required" style="width:100%;" />
                <input id="cbNoMaximum" type="checkbox" name="cbNoMaximum" />
                <label for="cbNoMaximum">No Maximum</label>
                <br />
            </div>
            <div class="col-lg-12">
                Minimum Processes:
                <input name="txtItemDetails_MinimumProcesses" type="text" class="form-control" placeholder="Minimum Processes" required="required" style="width:100%;" />
                <br />
            </div>
            <div class="col-lg-12">
                Maximum Processes:
                <input name="txtItemDetails_MaximumProcesses" type="text" class="form-control" placeholder="Maximum Processes" required="required" style="width:100%;" />
                <br />
            </div>
            <div class="col-lg-12">
                Sizes:
                <input name="txtItemDetails_Sizes" type="text" class="form-control" placeholder="Sizes" style="width:100%;" />
                <br />
            </div>
            <div class="col-lg-12">
                Colours:
                <input name="txtItemDetails_Colours" type="text" class="form-control" placeholder="Colours" style="width:100%;" />
                <br />
            </div>
            <div id="pnl_Overlay_ItemView_Details_PurchasePrice" class="col-lg-12">
                Purchase Price (exclude GST):
                <input name="txtItemDetails_PurchasePriceEx" type="text" class="form-control" placeholder="Purchase Price (exclude GST)" required="required" style="width:100%;" />
                <br />
            </div>
            <div class="col-lg-12" style="text-align:center">
                <p>
                    <input type="button" name="btnItemDetails_Cancel" value="Cancel" onclick="javascript:__doPostBack('btnItemDetails_Cancel','')" class="btn btn-danger" />&nbsp;&nbsp;
                    <input type="submit" name="btnItemDetails_Submit" value="Save" class="btn btn-success" />
                    &nbsp;&nbsp;
                </p>
            </div>
        </div>
    </form>
</div>
            </div>
            
        </div>
    </div>
</div>




<!-- Modal for Item Details -->
<div class="modal" id="inventoryDetailsModal" tabindex="-1" role="dialog" aria-labelledby="inventoryDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="Body_Body_pnl_Overlay_ItemView_Details" class="container">
                    
				<h2 id="inventory_heading"></h2>
				<form method="POST" action="#">
				    @csrf
				    <input type="hidden" class="form-control"id="supplier"  value="{{$inventoryDetails->id}}" name="inventory_id">
				     <input type="hidden" class="form-control"id="inventoryType"    name="inventoryType">
				    <div class="row">
					<div class="col-lg-12">
					    Enter the amount of stock to be added:
					    <input name="inventoryAdjustment" type="number" class="form-control" placeholder="Adjustment" required style="width:100%;" />
					    <br />
					</div>
					<div class="col-lg-12">
					    Note:
					    <input name="inventoryAdjustmentNote" type="text" class="form-control" placeholder="Note" required style="width:100%;" />
					    <br />
					</div>
					<div class="col-lg-12" style="text-align:center">
					    <p>
						<a href="#" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
						<button type="submit" class="btn btn-success">Submit</button>&nbsp;&nbsp;
					    </p>
					</div>
				    </div>
				</form>

                    
                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal" id="editItemModal" tabindex="-1" role="dialog" aria-labelledby="itemDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="itemDetailsModalLabel">Add Item Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div id="Body_Body_pnl_Overlay_ItemView_Details" class="container">
    <h2>Inventory Item Details</h2>
     <form method="post" action="{{ route('admin/inventory/update-item') }}">
        @csrf

        <!-- Hidden field to store the item ID -->
        <input type="hidden" name="editItemId" value="">
<div class="row">
            <div class="col-lg-12">
                Minimum Quantity:
                <input name="txtItemDetails_MinimumQuantity" type="text" class="form-control" placeholder="Minimum Quantity" required="required" style="width:100%;" />
                <br />
            </div>
            <div class="col-lg-12">
                Maximum Quantity:
                <input name="txtItemDetails_MaximumQuantity" type="text" class="form-control" placeholder="Maximum Quantity" required="required" style="width:100%;" />
                <input id="cbNoMaximum" type="checkbox" name="cbNoMaximum" />
                <label for="cbNoMaximum">No Maximum</label>
                <br />
            </div>
            <div class="col-lg-12">
                Minimum Processes:
                <input name="txtItemDetails_MinimumProcesses" type="text" class="form-control" placeholder="Minimum Processes" required="required" style="width:100%;" />
                <br />
            </div>
            <div class="col-lg-12">
                Maximum Processes:
                <input name="txtItemDetails_MaximumProcesses" type="text" class="form-control" placeholder="Maximum Processes" required="required" style="width:100%;" />
                <br />
            </div>
            <div class="col-lg-12">
                Sizes:
                <input name="txtItemDetails_Sizes" type="text" class="form-control" placeholder="Sizes" style="width:100%;" />
                <br />
            </div>
            <div class="col-lg-12">
                Colours:
                <input name="txtItemDetails_Colours" type="text" class="form-control" placeholder="Colours" style="width:100%;" />
                <br />
            </div>
            <div id="pnl_Overlay_ItemView_Details_PurchasePrice" class="col-lg-12">
                Purchase Price (exclude GST):
                <input name="txtItemDetails_PurchasePriceEx" type="text" class="form-control" placeholder="Purchase Price (exclude GST)" required="required" style="width:100%;" />
                <br />
            </div>
            <div class="col-lg-12" style="text-align:center">
                <p>
                    <input type="button" name="btnItemDetails_Cancel" value="Cancel" onclick="javascript:__doPostBack('btnItemDetails_Cancel','')" class="btn btn-danger" />&nbsp;&nbsp;
                    <input type="submit" name="btnItemDetails_Submit" value="Save" class="btn btn-success" />
                    &nbsp;&nbsp;
                </p>
            </div>

        <br />

        <button type="submit" class="btn btn-success">Save Changes</button>
    </form>
</div>
            </div>
            
        </div>
    </div>
</div>

<script>
    function switchTab(tabName) {
        // Hide all tabs
        document.querySelectorAll('.tab-pane').forEach(function(tab) {
            tab.classList.remove('active');
        });

        // Show the selected tab
        document.getElementById('Body_Body_pnlTab' + tabName).classList.add('active');
    }

    function saveData(action) {
        // Implement logic to save data based on the selected action
        console.log('Saving data with action:', action);
    }
    
     function openItemDetailsModal() {
        // Open the Item Details modal using Bootstrap's modal function
        $('#itemDetailsModal').modal('show');
    }
    function openEditModal(itemId) {
        // Make an AJAX request to get item details by ID
        $.ajax({
            url: '{{ url("/admin/inventory/get-item-details/") }}/' + itemId, // Update the URL to match your route
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log('daataa', data);
                // Populate the modal with the retrieved data
                $('#editItemModal input[name="txtItemDetails_MinimumQuantity"]').val(data.minimum_quantity);
                $('#editItemModal input[name="txtItemDetails_MaximumQuantity"]').val(data.maximum_quantity);
                $('#editItemModal input[name="txtItemDetails_MinimumProcesses"]').val(data.minimum_processes);
                $('#editItemModal input[name="txtItemDetails_MaximumProcesses"]').val(data.maximum_processes);
                $('#editItemModal input[name="txtItemDetails_Sizes"]').val(data.sizes);
                $('#editItemModal input[name="txtItemDetails_Colours"]').val(data.colours);
                $('#editItemModal input[name="txtItemDetails_PurchasePriceEx"]').val(data.purchase_price_ex);

                // Set the item ID in a hidden field
                $('#editItemModal input[name="editItemId"]').val(itemId);

                // Show the modal
                $('#editItemModal').modal('show');
            },
            error: function (error) {
                console.error('Error fetching item details:', error);
            }
        });
    }
    
    
      // inventory 
    function openInventoryDetailsModal() {
      $("#inventory_heading").text('Increase Stock');
       $("#inventoryType").val('Increase Stock');
        // Open the Item Details modal using Bootstrap's modal function
        $('#inventoryDetailsModal').modal('show');
    }
    
    
     function openInventoryDetailsModalDecrease() {
      $("#inventory_heading").text('Decrease Stock');
       $("#inventoryType").val('Decrease Stock');
        // Open the Item Details modal using Bootstrap's modal function
        $('#inventoryDetailsModal').modal('show');
    }
       // inventory 
    function openInventoryDetailsModal1() {
      $("#inventory_heading").text('Increase Sample Stock');
       $("#inventoryType").val('Increase Sample Stock');
        // Open the Item Details modal using Bootstrap's modal function
        $('#inventoryDetailsModal').modal('show');
    }
    
    
     function openInventoryDetailsModalDecrease1() {
      $("#inventory_heading").text('Decrease  Sample Stock');
       $("#inventoryType").val('Decrease Sample Stock');
        // Open the Item Details modal using Bootstrap's modal function
        $('#inventoryDetailsModal').modal('show');
    }
</script>

</body>
</html>
