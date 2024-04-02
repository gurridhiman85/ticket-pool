@include('admin.shared.viw_header')
<?php //echo '<pre>';print_r($inventory_info);die;?>
<div class="container mt-5">
        <!-- <form>
            <div class="mb-3">
                <input type="search" class="form-control" id="search" placeholder="search" aria-describedby="searchHelp">
            </div>
        </form> -->
        @if(session('success'))
        <div id="successMessage" class="alert alert-success">{{ session('success') }}</div>
        @endif
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Item Code</th>
      <th scope="col">Supplier</th>
      <th scope="col">Item Name</th>
      <th scope="col">Selling Name</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $model_count=1;$count=1;foreach($inventory_info as $info) {?>
        <tr>
        <td><?php echo $count++;?></td>
        <td><?php echo $info->item_code;?></td>
        <td><?php echo $info->supplier;?></td>
        <td><?php echo $info->item_name;?></td>
        <td><?php echo $info->selling_name;?></td>
        <td><img src="{{ asset('storage/app/public/images/inventory/' . $info->image) }}" alt="Uploaded Image" width="100px" height="100px" ></td>
        <td><a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#inventory_model<?php echo $model_count; ?>">Edit</a>
        <a href="{{ route('admin/inventory/delete', ['id' => $info->id]) }}" class="btn btn-danger">Delete</a>
        </td>
        </tr>
            <!--Inventory Modal -->
<div class="modal fade" id="inventory_model<?php echo $model_count; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Inventory</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="{{ route('admin/inventory/update') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="mb-3 col-lg-6">
              <label for="" class="form-label">Item Code (*):</label>
              <input type="hidden" id="id" name="id" value="<?php echo $info->id;?>">
              <input type="text" class="form-control" id="item_code" name="item_code" value="<?php echo $info->item_code;?>" required>
                  <!-- @error('item_code')
                <div>{{ $message }}</div>
            @enderror -->
            </div>
            <div class="mb-3 col-lg-6">
              <label for="" class="form-label">Supplier:</label>
              <input type="text" class="form-control"id="supplier" name="supplier" value="<?php echo $info->supplier;?>" required>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-lg-6">
              <label for="" class="form-label">Item Name (*):</label>
              <input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo $info->item_name;?>" required>
            </div>
            <div class="mb-3 col-lg-6">
              <label for="" class="form-label">Selling Name (*):</label>
              <input type="text" class="form-control"id="selling_name" name="selling_name" value="<?php echo $info->selling_name;?>" required>
            </div>
            <div class="mb-3 col-lg-6">
              <label for="" class="form-label">Item Image:</label>
              <input type="file" id="item_image" name="item_image">
              <img src="{{ asset('storage/app/public/images/inventory/' . $info->image) }}" alt="Uploaded Image" width="100px" height="100px" >
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
    <?php 
 $model_count++;}?>
</tbody>
</table>

</div>    
@include('admin.shared.viw_footer')
