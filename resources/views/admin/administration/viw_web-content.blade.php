@include('admin.shared.viw_header')

    <!--web content-->
   <div class="container mt-5">
    <div class="row mb-5">
      <h1 class="col-4">Web Page Manager</h1>
   
    <div class="d-grid col-auto ">
      <a class="btn btn-primary" href="#" type="button">Refresh Website content and Inventory</a>
     </div>
  </div>
    <div class="row">
      <h3>About Page</h3>
        <div class="col-md-6">
            Upload Image (.png, .jpg, .jpeg; MAX 150kb): 
            <input type="file" name="AboutImage" id="AboutImage" class="btn btn-primary">
        </div>
        <div class="col-md-4">
            <input type="submit" name="UploadAboutImage" value="Upload Image" id="AboutImage" class="btn btn-success">
        </div>
        <div class="col-lg-12">
            <img src="../../images/58541.jpg" alt="No image found"  class="img-fluid" style="width:50%; height:75%">           
        </div>
    </div>

    <div class="row">
      <h3>shop page</h3>
      <div class="col-md-6">
          Upload Image (.png, .jpg, .jpeg; MAX 150kb): 
          <input type="file" name="AboutImage" id="AboutImage" class="btn btn-primary">
      </div>
      <div class="col-md-4">
          <input type="submit" name="UploadAboutImage" value="Upload Image" id="AboutImage" class="btn btn-success">
      </div>
      <div class="col-lg-12">
          <img src="../../images/images.jpeg" alt="No image found"  class="img-fluid" style="width:50%; height:75%">           
      </div>
  </div>
</div>
@include('admin.shared.viw_footer')
