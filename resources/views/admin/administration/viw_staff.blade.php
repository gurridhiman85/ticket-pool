@include('admin.shared.viw_header')
    <!--staff create-->
    <div class="container mt-5">
        <h1>Staff  | 
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staff_model ">+</button></h1>
        @if(session('success'))
        <div id="successMessage" class="alert alert-success">{{ session('success') }}</div>
        @endif
            <!-- <form>
              <div class="mb-3">
                <input type="search" class="form-control" id="search" placeholder="search" aria-describedby="searchHelp">
               </div>
              </form> -->

        <div class="d-grid mt-4 ">
          <a class="btn btn-primary" href="{{ route('admin/staff/list') }}" type="button">View All Staff</a>
         </div>
    </div>

    <!--Staff Modal -->
<div class="modal fade" id="staff_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Staff</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="{{ route('admin/staff/insert') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="mb-3 col-lg-4">
              <label for="" class="form-label">First Name:</label>
              <input type="text" class="form-control" id="first_name" name="first_name" required>
                  <!-- @error('item_code')
                <div>{{ $message }}</div>
            @enderror -->
            </div>
            <div class="mb-3 col-lg-4">
              <label for="" class="form-label">Last Name:</label>
              <input type="text" class="form-control"id="last_name" name="last_name" required>
            </div>
            <div class="mb-3 col-lg-4">
              <label for="" class="form-label">Position</label>
              <input type="text" class="form-control" id="Position" name="Position" required>
            </div>
        </div>
        <div class="row">
        
            <div class="mb-3 col-lg-4">
              <label for="" class="form-label">Primary Email</label>
              <input type="text" class="form-control" id="PrimaryEmail" name="PrimaryEmail" required>
            </div>
            <div class="mb-3 col-lg-4">
              <label for="" class="form-label">MobilePhone</label>
              <input type="text" class="form-control"id="MobilePhone" name="MobilePhone" required>
            </div>
             <div class="mb-3 col-lg-4">
              <label for="" class="form-label">HomePhone</label>
              <input type="text" class="form-control"id="HomePhone" name="HomePhone" required>
            </div>
             <div class="mb-3 col-lg-4">
              <label for="" class="form-label">AdminPortalAccess</label>
              <input type="checkbox" id="AdminPortalAccess" name="AdminPortalAccess" onclick="toggleBusinessFields()" required>
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

<script>
  function toggleBusinessFields() {
      var businessPanel = document.getElementById('Body_Body_pnlAdminPortalAccessPermissions');
      businessPanel.style.display = document.getElementById('AdminPortalAccess').checked ? 'block' : 'none';
  }
</script>
@include('admin.shared.viw_footer')
