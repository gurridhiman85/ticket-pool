@include('admin.shared.viw_header')
<?php //echo '<pre>';print_r($staff_info);die;?>
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
      <th scope="col">First Name</th>
         <th scope="col">Last Name</th>
      <th scope="col">Position</th>
      <th scope="col">Admin Portal Access</th>
      <th scope="col">Deleted</th>
      <th scope="col">Restricted</th>
      
    </tr>
  </thead>
  <tbody>
    <?php $model_count=1;$count=1;foreach($staff_info as $info) {?>
        <tr>
        <td><?php echo $count++;?></td>
        <td><a href="{{ route('admin.permission') }}" class="btn btn-primary">View</a></td>
        <td><?php echo $info->first_name;?></td>
        <td><?php echo $info->last_name;?></td>
        <td><?php echo $info->Position;?></td>
        <td><?php echo $info->AdminPortalAccess;?> 
        
        <input type="checkbox" @if($info->AdminPortalAccess == 'on') checked @endif disabled="disabled" />
        </td>
         <td><?php echo $info->AdminPortalAccess;?> 
        
        <input type="checkbox" @if($info->cbDeleted == 'on') checked @endif disabled="disabled" />
        </td>
         <td><?php echo $info->AdminPortalAccess;?> 
        
        <input type="checkbox" @if($info->cbRestricted == 'on') checked @endif disabled="disabled" />
        </td>
        
        
        </tr>
            <!--Staff Modal -->
<div class="modal fade" id="staff_model<?php echo $model_count; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Staff</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="{{ route('admin/staff/update') }}" method="post" enctype="multipart/form-data">
          @csrf
           @csrf
          <div class="row">
            <div class="mb-3 col-lg-4">
              <label for="" class="form-label">First Name:</label>
              <input type="text" class="form-control" value{{$info->first_name ?? '' }} id="first_name" name="first_name" required>
                  <!-- @error('item_code')
                <div>{{ $message }}</div>
            @enderror -->
            </div>
            <div class="mb-3 col-lg-4">
              <label for="" class="form-label">Last Name:</label>
              <input type="text" class="form-control"id="last_name"value{{$info->first_name ?? ''}}  name="last_name" required>
            </div>
            <div class="mb-3 col-lg-4">
              <label for="" class="form-label">Position</label>
              <input type="text" class="form-control" id="Position"value{{$info->first_name ?? ''}}  name="Position" required>
            </div>
        </div>
        <div class="row">
        
            <div class="mb-3 col-lg-4">
              <label for="" class="form-label">Primary Email</label>
              <input type="text" class="form-control" id="PrimaryEmail"value{{$info->first_name ?? ''}}  name="PrimaryEmail" required>
            </div>
            <div class="mb-3 col-lg-4">
              <label for="" class="form-label">MobilePhone</label>
              <input type="text" class="form-control"id="MobilePhone" value{{$info->first_name ?? ''}} name="MobilePhone" required>
            </div>
             <div class="mb-3 col-lg-4">
              <label for="" class="form-label">HomePhone</label>
              <input type="text" class="form-control"id="HomePhone" value{{$info->first_name ?? ''}} name="HomePhone" required>
            </div>
             <div class="mb-3 col-lg-4">
              <label for="" class="form-label">AdminPortalAccess</label>
              <input type="checkbox" class=" "id="AdminPortalAccess"   name="AdminPortalAccess" >
            </div>
             <div class="mb-3 col-lg-4">
              <label for="" class="form-label">Deleted</label>
              <input type="checkbox" class=" "id="cbDeleted" name="cbDeleted" required>
            </div>
             <div class="mb-3 col-lg-4">
              <label for="" class="form-label">Restricted</label>
              <input type="checkbox" class=" "id="cbRestricted" name="cbRestricted" required>
            </div>
             
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save</button>
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
