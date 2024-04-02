{{-- admin.viw_orders.blade.php --}}
@include('admin.shared.viw_header')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<h1 class="text-center">Orders Details <a href="{{route('admin.orders.create')}}" name="ctl00$ctl00$Body$Body$btnAddOrder" value="+" id="Body_Body_btnAddOrder" class="btn btn-primary"> +</a></h1>

<!-- Date filtering form -->
<form method="get" action="{{ route('admin.orders') }}" class="mb-4">
    <div class="row">
        <div class="col">
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" class="form-control">
        </div>
        <div class="col">
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" id="end_date" class="form-control">
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary mt-4">Filter</button>
        </div>
    </div>
</form>

@php
  $newIncompleteOrdersCount = App\Models\Customers::where('order_status', 'New Incomplete Orders')->get()->count();
  $quotesCount = App\Models\OderDetails::where('quote', 'on')->get()->count();
  $pendingInternalApprovalCount = App\Models\Customers::where('order_status', 'Pending Internal Approval')->get()->count();
  $pendingcustomerApprovalCount = App\Models\Customers::where('order_status', 'Pending Customer Approval')->get()->count();
  $pendingOrderCount = App\Models\Customers::where('order_status', 'Pending Orders')->get()->count();
  $onholdCount = App\Models\Customers::where('order_status', 'On Hold')->get()->count();
  $awaitingOrderCount = App\Models\Customers::get()->count();
@endphp  

<!-- Filter links -->
<ul id="filterLinkas" style="display: contents; list-style: none;">
    <li class="nav-item" style="margin-top:5px; margin-right:5px">
        <a href="{{ route('admin.orders', ['filter' => 'New Incomplete Orders']) }}" data-category="New Incomplete Orders" class="btn btn-primary">New Incomplete Orders ({{$newIncompleteOrdersCount}}) </a>
    </li>
    <li class="nav-item" style="margin-top:5px; margin-right:5px">
    <a href="{{ route('admin.orders', ['filter' => 'qoutes']) }}" class="btn btn-primary">
        Quotes ({{$quotesCount}})
    </a>
</li>
<li class="nav-item" style="margin-top:5px; margin-right:5px">
    <a href="{{ route('admin.orders', ['filter' => 'Pending Internal Approval']) }}" class="btn btn-primary">
        Pending Internal Approval ({{$pendingInternalApprovalCount}})
    </a>
</li>

<li class="nav-item" style="margin-top:5px; margin-right:5px">
    <a href="{{ route('admin.orders', ['filter' => 'Pending Customer Approval']) }}" class="btn btn-primary">
        Pending Customer Approval ({{$pendingcustomerApprovalCount}})
    </a>
</li>

<li class="nav-item" style="margin-top:5px; margin-right:5px">
    <a href="{{ route('admin.orders', ['filter' => 'Awaiting Deposit']) }}" class="btn btn-primary">
        Awaiting Deposit ({{$awaitingOrderCount}})
    </a>
</li>
<li class="nav-item" style="margin-top:5px; margin-right:5px">
    <a href="{{ route('admin.orders', ['filter' => 'Pending Orders']) }}" class="btn btn-primary">
        Pending Orders ({{$pendingOrderCount}})
    </a>
</li>

<li class="nav-item" style="margin-top:5px; margin-right:5px">
    <a href="{{ route('admin.orders', ['filter' => 'On Hold']) }}" class="btn btn-primary">
        On Hold({{$onholdCount}})
    </a>
</li>

<li class="nav-item" style="margin-top:5px; margin-right:5px">
    <a href="{{ route('admin.orders',['filter' => 'Production Override']) }}" class="btn btn-primary">
        Production(65)
    </a>
</li>

<li class="nav-item" style="margin-top:5px; margin-right:5px">
    <a href="{{ route('admin.orders', ['filter' => 'All']) }}" class="btn btn-primary">
        All (125)
    </a>
</li>

<li class="nav-item" style="margin-top:5px; margin-right:5px">
    <a href="{{ route('admin.orders', ['filter' => 'Printing A']) }}" class="btn btn-primary">
        Printing A (5)
    </a>
</li>

<li class="nav-item" style="margin-top:5px; margin-right:5px">
    <a href="{{ route('admin.orders', ['filter' => 'Printing B']) }}" class="btn btn-primary">
        Printing B (75)
    </a>
</li>

<li class="nav-item" style="margin-top:5px; margin-right:5px">
    <a href="{{ route('admin.orders', ['filter' => 'Embroidery A']) }}" class="btn btn-primary">
        Embroidery A (16)
    </a>
</li>
</ul>



<!-- Table -->

@if(request()->has('filter') && request('filter') == 'New Incomplete Orders')

    @include('admin.table.new_incomplete_orders')
@elseif(request()->has('filter') && request('filter') == 'qoutes')
    @include('admin.table.qoutes')
@elseif(request()->has('filter') && request('filter') == 'Pending Internal Approval')
    @include('admin.table.pending_internal_approval')
@elseif(request()->has('filter') && request('filter') == 'Pending Customer Approval')
  @include('admin.table.pending_customer_approval')
@elseif(request()->has('filter') && request('filter') == 'Awaiting Deposit')
  @include('admin.table.awaiting_deposit')
 @elseif(request()->has('filter') && request('filter') == 'Pending Orders')
  @include('admin.table.pending_orders')
@elseif(request()->has('filter') && request('filter') == 'On Hold')
  @include('admin.table.on_hold')
  @elseif(request()->has('filter') && request('filter') == 'Production Override')
  @include('admin.table.production')
  @elseif(request()->has('filter') && request('filter') == 'All')
  @include('admin.table.all')
   @elseif(request()->has('filter') && request('filter') == 'Printing A')
   @include('admin.table.printing_a')
   @elseif(request()->has('filter') && request('filter') == 'Printing B')
   @include('admin.table.printing_b')
    @elseif(request()->has('filter') && request('filter') == 'Embroidery A')
   @include('admin.table.embroidery_a')
@else
    @include('admin.table.new_incomplete_orders')
@endif




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
                            <h3>We are going to mark Production for the line item as completed.</h3>
                            <textarea name="ctl00$ctl00$Body$Body$txt_NewOrderWizard_ConfirmPlaceOnHold_Notes" rows="2" cols="20" id="Body_Body_txt_NewOrderWizard_ConfirmPlaceOnHold_Notes" class="form-control" placeholder="Notes" style="width:100%;">
                </textarea><br />
                            <p style="text-align:center">
                               
                                <input  type="hidden" name="approvelid" id="saveid" >
                                 <input  type="hidden" name="type_approved" value="tablcostup_approved">
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


<script>
$(document).ready(function () {
    // Filter links click event
    $('#filterLinks a').on('click', function (e) {
        e.preventDefault();

        // Get the selected category
        var selectedCategory = $(this).data('category');

        // Show/hide rows and columns based on the selected category
        $('table tbody tr').hide();
        if (selectedCategory === 'All') {
            $('table tbody tr').show();
        } else {
            // Show only the first 5 rows with the selected category
            if (selectedCategory === 'New Incomplete Orders') {
                $('table tbody tr').slice(0, 5).show();
            } else {
                // For other categories, filter based on the content of the 3rd column
                $('table tbody td:nth-child(3)').filter(function () {
                    return $(this).text().toLowerCase().includes(selectedCategory.toLowerCase());
                }).parent('tr').slice(0, 5).show();
            }

            // Hide specific columns and rows
            var columnsAndRowsToHide = {
                'New Incomplete Orders': [1, 2],
                // Define columns to hide for other categories as needed
            };

            if (columnsAndRowsToHide[selectedCategory]) {
                columnsAndRowsToHide[selectedCategory].forEach(function (columnIndex) {
                    // Hide both th and td elements for the specified column
                    $('table tbody tr').find('td:nth-child(' + columnIndex + '), th:nth-child(' + columnIndex + ')').hide();
                    // Hide the entire row for the specified category
                    

                });
            }
        }
    });
});

 
</script>

@include('admin.shared.viw_footer')

<!-- Include jQuery -->
