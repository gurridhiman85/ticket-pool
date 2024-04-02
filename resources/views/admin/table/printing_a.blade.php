<div id="Body_Body_rptTabs_Content_pnlTab_3" class="tab-pane active" role="tabpanel">
   <h3>Printing A</h3>
   <div>
      <table cellspacing="0" cellpadding="3" rules="cols" id="Body_Body_rptTabs_Content_gvTabData_3" style="color:Black;background-color:White;border-color:#999999;border-width:1px;border-style:Solid;width:100%;border-collapse:collapse;">
         <tbody>
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
               <th scope="col">On Hold</th>
               <th scope="col">Entered By</th>
            </tr>
           
 

    @foreach($orders_info as $info)
       
      @if($info->printingA == 'on')
 
      
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
                     <table cellspacing="0" cellpadding="3" rules="cols" id="Body_Body_rptTabs_Content_gvTabData_3_gv_StageTab_Items_0" style="color:Black;background-color:White;border-color:#999999;border-width:1px;border-style:Solid;width:100%;border-collapse:collapse;">
                        <tbody>
               @php 
                $costupDetails = DB::table('order_costsetup')->where('customer_id', $info->cid)->where('printingA', 'on')->get();  
               @endphp
                        @foreach($costupDetails as $value)
                           <tr style="color:White;background-color:Black;font-weight:bold;">
                              <th scope="col">&nbsp;</th>
                              <th scope="col">Densu ID</th>
                              <th scope="col">Description</th>
                              <th scope="col">Size</th>
                              <th scope="col">Colour</th>
                              <th scope="col">Item Quantity</th>
                              <th scope="col">&nbsp;</th>
                           </tr>
                           
                           <tr>
                              <td>
                                 <a href="{{route('admin.orders.view', ['orderid' => $info->cid])}}" class="btn btn-info btnmargin">View</a>
                                 <a id="Body_Body_rptTabs_Content_gvTabData_3_gv_StageTab_Items_0_btnApprove_0" class="btn btn-success btnmargin"   data-id="{{ $value->id }}"  onclick="openModal(this)" >Approve</a>
                              </td>
                              <td>{{$value->id}}</td>
                              <td>{{$value->wizard_descreption}}</td>
                              <td>{{$value->size}}</td>
                              <td>{{$value->color}}</td>
                              <td>{{$value->wizard_quantity}}</td>
                              <td>
                              </td>
                           </tr>
                           
                           <tr style="border:2px solid black">
                              <td colspan="1"></td>
                              <td colspan="5">
                                 <div>
                                    <table cellspacing="0" cellpadding="3" rules="cols" id="Body_Body_rptTabs_Content_gvTabData_3_gv_StageTab_Items_0_gv_StageTab_Items_GridPricing_0" style="color:Black;background-color:White;border-color:#999999;border-width:1px;border-style:Solid;width:100%;border-collapse:collapse;">
                                       <tbody>
                                          <tr style="color:White;background-color:Black;font-weight:bold;">
                                             <th scope="col">Logo</th>
                                             <th scope="col">Position</th>
                                             <th scope="col">Decoration</th>
                                             <th scope="col">Stage Quantity</th>
                                             <th scope="col">Process Quantity</th>
                                           </tr>
                                @php 
                                    $data = App\Models\PrintingItem::where('order_cost_id', $value->id)->get(); 
                                @endphp   
                                        @foreach($data as $key =>$item)
                                          <tr>
                                             <td>{{$item->logo}}</td>
                                             <td>{{$item->position}}</td>
                                             <td style="font-weight:bold;">Printing A</td>
                                             <td>{{$item->quantity}}</td>
                                             <td>{{$item->process}}</td>
                                          </tr>

                                          <tr style="color:White;background-color:Black;font-weight:bold;">
                                             <td>&nbsp;</td>
                                             <td>&nbsp;</td>
                                             <td>&nbsp;</td>
                                             <td>&nbsp;</td>
                                             <td>&nbsp;</td>
                                          </tr>
                                          @endforeach
                                       </tbody>
                                    </table>
                                 </div>
                                 <br>
                              </td>
                              <td colspan="1"></td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
                  <br>
               </td>
               <td colspan="1"></td>
            </tr>
             @endif
             @endforeach

         </tbody>
      </table>
   </div>
</div>
<!-- Sub-Form Submission Script -->

