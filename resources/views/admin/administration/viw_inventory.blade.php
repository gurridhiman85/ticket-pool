@include('admin.shared.viw_header')
    <!--inventory create-->
    <div class="container mt-5">
        <h1>Inventory  | 
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inventory_model ">+</button></h1>
        @if(session('success'))
        <div id="successMessage" class="alert alert-success">{{ session('success') }}</div>
        @endif
            <!-- <form>
              <div class="mb-3">
                <input type="search" class="form-control" id="search" placeholder="search" aria-describedby="searchHelp">
               </div>
              </form> -->

        <div class="d-grid mt-4 ">
          <a class="btn btn-primary" href="{{ route('admin/inventory/list') }}" type="button">View All Inventory</a>
         </div>
    </div>

    <!--Inventory Modal -->
<div class="modal fade" id="inventory_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Inventory</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

<ul class="nav nav-tabs" id="myTabs">
    <li class="nav-item">
      <a class="nav-link " id="tab1" data-toggle="tab" href="#content1">Add Single Item</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="tab2" data-toggle="tab" href="#content2">Upload Standard Pricing</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="tab3" data-toggle="tab" href="#content3">Upload Advanced Pricing</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="tab4" data-toggle="tab" href="#content4">Upload Grid Pricing</a>
    </li>
  </ul>

  <div class="tab-content mt-2">
    <div class="tab-pane fade " id="content1">
      <form action="{{ route('admin/inventory/insert') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="mb-3 col-lg-6">
              <label for="" class="form-label">Item Code (*):</label>
              <input type="text" class="form-control" id="item_code" name="item_code" required>
                  <!-- @error('item_code')
                <div>{{ $message }}</div>
            @enderror -->
            </div>
            <div class="mb-3 col-lg-6">
              <label for="" class="form-label">Supplier:</label>
              <input type="text" class="form-control"id="supplier" name="supplier" required>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-lg-6">
              <label for="" class="form-label">Item Name (*):</label>
              <input type="text" class="form-control" id="item_name" name="item_name" required>
            </div>
            <div class="mb-3 col-lg-6">
              <label for="" class="form-label">Selling Name (*):</label>
              <input type="text" class="form-control"id="selling_name" name="selling_name" required>
            </div>
            <div class="mb-3 col-lg-6">
              <label for="" class="form-label">Item Image:</label>
              <input type="file" id="item_image" name="item_image">
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save</button>
      </div>
      </form>
      </div>
      
    <div class="tab-pane fade" id="content2">
      <div id="Body_Body_pnl_Overlay_StandardPricing" class="container">

    <h1>Standard Pricing Upload</h1>

    <form action="{{route('admin/inventory/upload-standard-pricing')}}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="file" name="ctl00$ctl00$Body$Body$fuStandardPricing" id="Body_Body_fuStandardPricing" class="btn btn-primary" required="required" />
        <input type="submit" name="ctl00$ctl00$Body$Body$btnUploadStandardPricing" value="Submit" onclick="HBAC(this);WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btnUploadStandardPricing&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="Body_Body_btnUploadStandardPricing" class="btn btn-success" />
        <input id="Body_Body_cbStandardPricing_ReplaceExisting" type="checkbox" name="ctl00$ctl00$Body$Body$cbStandardPricing_ReplaceExisting" /><label for="Body_Body_cbStandardPricing_ReplaceExisting">Replace Items with the same Item Code</label>

        <h2>CLICK SUBMIT ONCE: This process can take a few minutes to complete.</h2>

        <h3>Upload Instructions</h3>
        Please ensure that the file is in .txt format and is 'Tab delimited'. Export the file from Microsoft Excel by: (1) Select the sheet you wish to Export; (2) Click File > Export > Change File Type; (3) Select Text (Tab delimited) (*.txt) and Save As. You may upload the file which you export here.

        <h5>Formatting</h5>
        Cell order should be Supplier, Item Code, Product Name, Range, Price. Do not add headers, the first line should be the first item. Quantity must have a range (e.g. Quantity 1-9 or 500+), if there is no range, enter 1+. A price must be entered, or enter 0, do not use POA. Supplier must be in the system, and the display name of the supplier should match the supplier field.
        <br />

        <table style="border:1px solid black">
            <tr>
                <td style="width:100px; border:1px solid black">
                    A Supplier
                </td>
                <td style="width:100px; border:1px solid black">
                    A1234
                </td>
                <td style="width:100px; border:1px solid black">
                    A sample item
                </td>
                <td style="width:100px; border:1px solid black">
                    1-99
                </td>
                <td style="width:100px; border:1px solid black">
                    0.70
                </td>
            </tr>
            <!-- More table rows go here -->
        </table>
    </form>
</div>

    </div>
    <div class="tab-pane fade" id="content3">
      <div id="Body_Body_pnl_Overlay_MultiRangePricing" class="container">

    <h1>Advanced Pricing Upload</h1>

    <form action="#" method="post" enctype="multipart/form-data">
        @csrf

        <input type="file" name="ctl00$ctl00$Body$Body$fuMultiRangePricing" id="Body_Body_fuMultiRangePricing" class="btn btn-primary" required="required" />
        <input type="submit" name="ctl00$ctl00$Body$Body$btnUploadMultiRangePricing" value="Submit" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btnUploadMultiRangePricing&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="Body_Body_btnUploadMultiRangePricing" class="btn btn-success" />
        <input id="Body_Body_cbMultiRangePricing_ReplaceExisting" type="checkbox" name="ctl00$ctl00$Body$Body$cbMultiRangePricing_ReplaceExisting" />
        <label for="Body_Body_cbMultiRangePricing_ReplaceExisting">Replace Items with the same Item Code</label>

        <h3>Upload Instructions</h3>
        Please ensure that the file is in .txt format and is 'Tab delimited'. Export the file from Microsoft Excel by: (1) Select the sheet you wish to Export; (2) Click File > Export > Change File Type; (3) Select Text (Tab delimited) (*.txt) and Save As. You may upload the file which you export here.

        <h5>Formatting</h5>
        Cell order should be Supplier, ItemCode, Description, Colour, Sizes, CUSTOM RANGES. Do not duplicate custom ranges, even if they are from different suppliers. The first line should be the header. If there is no range, enter 1+. Do not use POA, use 0. If there is no price for the range, leave the cell empty, do not add a zero. Supplier must be in the system, and the display name of the supplier should match the supplier field.
        <br />

        <table style="border:1px solid black">
            <tr>
                <th style="width:100px; border:1px solid black">Supplier</th>
                <th style="width:100px; border:1px solid black">Item Code</th>
                <th style="width:100px; border:1px solid black">Description</th>
                <th style="width:100px; border:1px solid black">Colour</th>
                <th style="width:100px; border:1px solid black">Sizes</th>
                <th style="width:100px; border:1px solid black">1+</th>
                <th style="width:100px; border:1px solid black">1-99</th>
                <th style="width:100px; border:1px solid black">100-499</th>
                <th style="width:100px; border:1px solid black">1000+</th>
            </tr>
            <tr>
                <td style="width:100px; border:1px solid black">A Supplier</td>
                <td style="width:100px; border:1px solid black">A1234</td>
                <td style="width:100px; border:1px solid black">A sample item</td>
                <td style="width:100px; border:1px solid black">Blue|Yellow|Green</td>
                <td style="width:100px; border:1px solid black">XS|XXL</td>
                <td style="width:100px; border:1px solid black">1.00</td>
                <td style="width:100px; border:1px solid black"></td>
                <td style="width:100px; border:1px solid black"></td>
                <td style="width:100px; border:1px solid black"></td>
            </tr>
            <!-- More table rows go here -->
        </table>
    </form>
</div>

    </div>
    
    
     <div class="tab-pane fade" id="content4">
      <div id="Body_Body_pnl_Overlay_MultiRangePricing" class="container">

    <h1>Grid Pricing Upload</h1>

    <form action="#" method="post" enctype="multipart/form-data">
        @csrf

        <input type="file" name="ctl00$ctl00$Body$Body$fuMultiRangePricing" id="Body_Body_fuMultiRangePricing" class="btn btn-primary" required="required" />
        <input type="submit" name="ctl00$ctl00$Body$Body$btnUploadMultiRangePricing" value="Submit" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ctl00$Body$Body$btnUploadMultiRangePricing&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="Body_Body_btnUploadMultiRangePricing" class="btn btn-success" />
        <input id="Body_Body_cbMultiRangePricing_ReplaceExisting" type="checkbox" name="ctl00$ctl00$Body$Body$cbMultiRangePricing_ReplaceExisting" />
        <label for="Body_Body_cbMultiRangePricing_ReplaceExisting">Replace Items with the same Item Code</label>

        <h3>Upload Instructions</h3>
        Please ensure that the file is in .txt format and is 'Tab delimited'. Export the file from Microsoft Excel by: (1) Select the sheet you wish to Export; (2) Click File > Export > Change File Type; (3) Select Text (Tab delimited) (*.txt) and Save As. You may upload the file which you export here.

        <h5>Formatting</h5>
        Cell order should be Supplier, ItemCode, Description, Colour, Sizes, CUSTOM RANGES. Do not duplicate custom ranges, even if they are from different suppliers. The first line should be the header. If there is no range, enter 1+. Do not use POA, use 0. If there is no price for the range, leave the cell empty, do not add a zero. Supplier must be in the system, and the display name of the supplier should match the supplier field.
        <br />

        <table style="border:1px solid black">
            <tr>
                <th style="width:100px; border:1px solid black">Supplier</th>
                <th style="width:100px; border:1px solid black">Item Code</th>
                <th style="width:100px; border:1px solid black">Description</th>
                <th style="width:100px; border:1px solid black">Colour</th>
                <th style="width:100px; border:1px solid black">Sizes</th>
                <th style="width:100px; border:1px solid black">1+</th>
                <th style="width:100px; border:1px solid black">1-99</th>
                <th style="width:100px; border:1px solid black">100-499</th>
                <th style="width:100px; border:1px solid black">1000+</th>
            </tr>
            <tr>
                <td style="width:100px; border:1px solid black">A Supplier</td>
                <td style="width:100px; border:1px solid black">A1234</td>
                <td style="width:100px; border:1px solid black">A sample item</td>
                <td style="width:100px; border:1px solid black">Blue|Yellow|Green</td>
                <td style="width:100px; border:1px solid black">XS|XXL</td>
                <td style="width:100px; border:1px solid black">1.00</td>
                <td style="width:100px; border:1px solid black"></td>
                <td style="width:100px; border:1px solid black"></td>
                <td style="width:100px; border:1px solid black"></td>
            </tr>
            <!-- More table rows go here -->
        </table>
    </form>
     </div>

    </div>
  </div>



       
    </div>
  </div>
</div>
@include('admin.shared.viw_footer')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

