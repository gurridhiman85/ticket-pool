<div id="Body_Body_rptTabs_Content_pnlTab_1" class="tab-pane active" role="tabpanel">
  <h3>Production</h3>
  <div>
    <table cellspacing="0" cellpadding="3" rules="cols" id="Body_Body_rptTabs_Content_gvTabData_1" style="color:Black;background-color:White;border-color:#999999;border-width:1px;border-style:Solid;width:100%;border-collapse:collapse;">
      <tr style="color:White;background-color:Black;font-weight:bold;">
        <th scope="col" style="width:53px;">&nbsp;</th>
        <th scope="col">Order Number</th>
        <th scope="col" style="width:8%;">Created Date</th>
        <th scope="col" style="width:8%;">Expected By</th>
        <th scope="col" style="width:8%;">Customer</th>
        <th scope="col">Sales Representative</th>
        <th scope="col">On Hold</th>
        <th scope="col">Status</th>
        <th scope="col">Completed</th>
        <th scope="col">Entered By</th>
      </tr>
     @foreach($orders_info as $info)
       @if($info->order_status == "Production Override")
     
       @php
        $costupDetails = DB::table('order_costsetup')->where('customer_id', $info->cid)->get();
       @endphp
       
      <tr>
        <td>
          <p style="text-align:center">
            <a href="{{route('admin.orders.view', ['orderid' => $info->cid])}}" class="btn btn-info btnmargin">View</a>
          </p>
          <p style="text-align:center">
        <a id="Body_Body_rptTabs_Content_gvTabData_1_btnBulkApprove_0" class="btn btn-warning btnmargin" data-id="{{ $info->cid }}"  onclick="openModal(this)" style="display:inline-block;width:165px;">Bulk Approve</a>

          </p>
        </td>
        <td>{{ $info->cid }}</td>
        <td> {{ $info->date_added }}</td>
        <td></td>
        <td>
          <a href="/Customer/CustomerProfile?ID=ddd07850-d4d0-482f-9c90-976d9afde7d9">{{ $info->name }}</a>
        </td>
        <td>{{ $info->NewOrderWizard_SalesRepresentative }}</td>
        <td>False</td>
        <td>Production</td>
        <td>False</td>
        <td>
          <span id="Body_Body_rptTabs_Content_gvTabData_1_EnteredBy_0">{{ $info->NewOrderWizard_SalesRepresentative }}</span>
        </td>
      </tr>
      <tr>
        <td colspan="1"></td>
        <td colspan="9" style="border:2px solid black">
          <div>
            <table cellspacing="0" cellpadding="3" rules="cols" id="Body_Body_rptTabs_Content_gvTabData_1_gv_StageTab_Items_0" style="color:Black;background-color:White;border-color:#999999;border-width:1px;border-style:Solid;width:100%;border-collapse:collapse;">
              <tr style="color:White;background-color:Black;font-weight:bold;">
                <th scope="col">&nbsp;</th>
                <th scope="col">Densu ID</th>
                <th scope="col">Description</th>
                <th scope="col">Size</th>
                <th scope="col">Colour</th>
                <th scope="col">Item Quantity</th>
                <th scope="col">&nbsp;</th>
              </tr>
              @if(count($costupDetails) > 0)
              @foreach($costupDetails as $value)
              @php
            
              @endphp
              <tr>
                <td>
                                 @if($value->type == 'product')
                                 <a id="Body_Body_gv_NewOrderWizard_Items_btnEdit_0" class="btn btn-info btnmargin" href="{{route('admin.product.orders.edit',$value->id)}}" style="display:inline-block;width:165px;">View</a>
                                                <!--<a id="Body_Body_rptTabs_Content_gvTabData_1_gv_StageTab_Items_0_btnApprove_0" class="btn btn-success btnmargin" href="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$rptTabs_Content$ctl01$gvTabData$ctl02$gv_StageTab_Items$ctl02$btnApprove&#39;,&#39;&#39;)">Approve</a>-->
                                 @elseif($value->type == 'cost')
                                 <a id="Body_Body_gv_NewOrderWizard_Items_btnEdit_0" class="btn btn-info btnmargin" href="{{route('admin.wizard.cost.edit',$value->id)}}" style="display:inline-block;width:165px;">View</a>
                                                   <!--<a id="Body_Body_rptTabs_Content_gvTabData_1_gv_StageTab_Items_0_btnApprove_0" class="btn btn-success btnmargin" href="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$rptTabs_Content$ctl01$gvTabData$ctl02$gv_StageTab_Items$ctl02$btnApprove&#39;,&#39;&#39;)">Approve</a>-->
                                 @else
                                 <a id="Body_Body_gv_NewOrderWizard_Items_btnEdit_0" class="btn btn-info btnmargin" href="{{route('admin.shippping.orders.edit',$value->id)}}" style="display:inline-block;width:165px;">View</a>
                                                   <!--<a id="Body_Body_rptTabs_Content_gvTabData_1_gv_StageTab_Items_0_btnApprove_0" class="btn btn-success btnmargin" href="javascript:__doPostBack(&#39;ctl00$ctl00$Body$Body$rptTabs_Content$ctl01$gvTabData$ctl02$gv_StageTab_Items$ctl02$btnApprove&#39;,&#39;&#39;)">Approve</a>-->
                                 @endif
                  
                </td>
                <td>{{ $value->id }}</td>
                <td>{{ $value->wizard_descreption }} </td>
                <td>{{ $value->size }}</td>
                <td>{{ $value->color }}</td>
                <td>{{$value->wizard_quantity}}</td>
                <td></td>
              </tr>
              @endforeach
              @endif
              <tr style="border:2px solid black">
                <td colspan="1"></td>
                <td colspan="5">
                  <div></div>
                  <br />
                </td>
                <td colspan="1"></td>
              </tr>
            </table>
          </div>
          <br />
        </td>
        <td colspan="1"></td>
      </tr>
       @endif
        @endforeach
      <!-- ... (Continue with other rows and nested tables as needed) ... -->
    </table>
  </div>
  <br />
</div>
 

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
       
      </div>
      <div class="modal-body">
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
                         <h1>Next Step</h1>
                            <h3>You are confirming that the task (Production) has been completed for the following items in order #<span id="order_id"> </span>:</h3>
                            <textarea name="ctl00$ctl00$Body$Body$txt_NewOrderWizard_ConfirmPlaceOnHold_Notes" rows="2" cols="20" id="Body_Body_txt_NewOrderWizard_ConfirmPlaceOnHold_Notes" class="form-control" placeholder="Notes" style="width:100%;">
                </textarea><br />
                            <p style="text-align:center">
                               
                                <input  type="hidden" name="approvelid" id="saveid" >
                                 <input  type="hidden" name="type_approved" value="all">
                                <button type="submit" class="btn btn-success btn-lg" name="btn_NewOrderWizard_ConfirmApproval_Yes">Confirm</button>
                               
                            </p>
                </form>  
			</div> 
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
   function openModal(element) {
      
        var dataId = $(element).data('id');
        
        // Use jQuery to trigger the modal display
        $('#order_id').text(dataId); // Set the value to the input field in the modal
           $('#saveid').val(dataId); // Set the value to the input field in the modal
        $('#myModal').modal('show');
    }
</script>


