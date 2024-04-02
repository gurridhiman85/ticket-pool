@include('admin.shared.viw_header')
        <!--orders-->
        <div class="col-md-4 ">
          <div class="card">
            <div class="card-header text-primary fw-bold">
              Orders 
            </div>
            <div class="card-body " style="max-height: 300px; overflow-y:auto;">
               <div>
                <table class="table table-bordered border-secondary-subtle table-striped">
                  <tbody>
                    <tr style="color:White;background-color:Black;font-weight:bold;">
                      <th scope="col">&nbsp</th>
                      <th scope="col">Details</th>
                    </tr>
                    <?php foreach($order_info as $info) {?>
                    <tr>
                      <td>
                      <a class="btn btn-info" href="{{ route('admin.orders.edit', ['orderid' => $info->id]) }}">Open</a>
                      </td>
                      <td>
                        <h6><?php echo $info->account_no;?>,<?php echo $info->name;?></h6>
                        <?php echo $info->address;?>
                      </td>
                    </tr>      
                    <?php }?>    
                  </tbody>
                </table>

               </div>
            </div>
          </div>         
        </div>

        <!--stock controls-->
        <div class="col-md-4">
          <div class="card">
            <div class="card-header text-primary fw-bold">
               Stock Control
            </div>
            <div class="card-body " style="max-height: 300px; overflow-y:auto;">
               <div>
                <table class="table table-bordered border-secondary-subtle table-striped">
                  <tbody>
                    <tr style="color:White;background-color:Black;font-weight:bold;">
                      <th scope="col">&nbsp</th>
                      <th scope="col">Message</th>
                    </tr>
                    <?php foreach($inventory_info as $info) {?>
                    <tr>
                      <td>
                      <a class="btn btn-info openPopupButton" data-id="{{$info->id}}">Open</a>
                      </td>
                      <td>
                        <h6><?php echo $info->item_code;?>,<?php echo $info->supplier;?></h6>
                        <?php echo $info->item_name;?>,<?php echo $info->selling_name;?>	
                      </td>
                    </tr>      
                    <?php }?>    
                  </tbody>
                </table>

               </div>
            </div>
          </div>         
        </div>
        
        
         <!--Accounts Payable Drafts -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-header text-primary fw-bold">
              Accounts Payable Drafts 
            </div>
            <div class="card-body " style="max-height: 300px; overflow-y:auto;">
               <div>
                <table class="table table-bordered border-secondary-subtle table-striped">
                  <tbody>
                    <tr style="color:White;background-color:Black;font-weight:bold;">
                      <th scope="col">&nbsp</th>
                      <th scope="col">Message</th>
                    </tr>
                    <?php foreach($inventory_info as $info) {?>
                    <tr>
                      <td>
                      <a class="btn btn-info" href="#">Open</a>
                      </td>
                      <td>
                        <h6><?php echo $info->item_code;?>,<?php echo $info->supplier;?></h6>
                        <?php echo $info->item_name;?>,<?php echo $info->selling_name;?>	
                      </td>
                    </tr>      
                    <?php }?>    
                  </tbody>
                </table>

               </div>
            </div>
          </div>         
        </div>

 
        
         <!--Accounts Payable Awaiting Payment Approval -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-header text-primary fw-bold">
              Accounts Payable Awaiting Payment Approval 
            </div>
            <div class="card-body" style="max-height: 300px; overflow-y:auto;">
               <div>
                <table class="table table-bordered border-secondary-subtle table-striped">
                  <tbody>
                    <tr style="color:White;background-color:Black;font-weight:bold;">
                      <th scope="col">&nbsp</th>
                      <th scope="col">Message</th>
                    </tr>
                    <?php foreach($inventory_info as $info) {?>
                    <tr>
                      <td>
                      <a class="btn btn-info" href="#">Open</a>
                      </td>
                      <td>
                        <h6><?php echo $info->item_code;?>,<?php echo $info->supplier;?></h6>
                        <?php echo $info->item_name;?>,<?php echo $info->selling_name;?>	
                      </td>
                    </tr>      
                    <?php }?>    
                  </tbody>
                </table>

               </div>
            </div>
          </div>         
        </div>
        </div>
      </div>
      <!--Stock controls-->
    </div>
    
    
    
    <!-- Modal -->
<div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Inventory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modaldata">
        ...
      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>





<div class="modal fade" id="itemDetailsModal" tabindex="-1" role="dialog" aria-labelledby="itemDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="itemDetailsModalLabel">Inventory Item Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div id="Body_Body_pnl_Overlay_ItemView_Details" class="container">
    <h2>Inventory Item Details</h2>
    <form method="post" action="#">
        @csrf

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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    
   

	$(document).ready(function(){
	    // Handle click event on buttons with class "openPopupButton"
	    $('.openPopupButton').on('click', function () {
	        
		// Get the ID from the data-id attribute of the clicked button
		var id = $(this).data('id');
            var routeUrl = '{{ route('open-model-Stock-control')}}';
		// Use AJAX to fetch the content from the /popup-content route with the ID
		$.ajax({
		    url: routeUrl,
		    method: 'get',
		     data: {
                    id: id,
                    // Include other data variables as needed
                },
		    success: function (data) {
		        console.log(data);
		        // Append the fetched content to the modal container
		        $('#modaldata').html(data);
		        // Show the popup/modal
		        $('#exampleModalCenter').modal('show');
		    },
		    error: function (xhr, status, error) {
		        console.error('Error fetching popup content:', error);
		    }
		});
	    });
	});
	
	
	$(document).ready(function () {
        $('#itemDetailsModal').on('shown.bs.modal', function () {
            // Focus on the first input field when the modal is shown
            $('#Body_Body_txtItemDetails_MinimumQuantity').focus();
        });
    });

    </script>
@include('admin.shared.viw_footer')

