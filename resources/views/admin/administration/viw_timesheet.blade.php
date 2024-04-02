@include('admin.shared.viw_header')

    <!--timesheets create-->
    <div class="container mt-5">
       <h1>Timesheets</h1>
        <div>
            <ul class="nav nav-tabs ">
              <li class="nav-item" style="margin-top: 5px; margin-right: 5px">
                <a class="btn btn-primary" href="#">New Timesheets</a>
              </li>
              <li class="nav-item" style="margin-top: 5px; margin-right: 5px">
                <a class="btn btn-primary" href="#">Past Claims</a>
              </li>
              <li class="nav-item" style="margin-top: 5px; margin-right: 5px">
                <a class="btn btn-primary" href="#">Manage Timesheets</a>
              </li>                         
            </ul>
          </div>
          <div class="mt-5">
            <h1>Manage Timesheets <a type="submit" class="btn btn-secondary" href="">+</a></h1>
            <ul class="nav nav-tabs ">
              <li class="nav-item" style="margin-top: 5px; margin-right: 5px">
                <a class="btn btn-outline-success" href="#">Current(02)</a>
              </li>
              <li class="nav-item" style="margin-top: 5px; margin-right: 5px">
                <a class="btn btn-primary" href="#">Past(04)</a>
              </li>
              <li class="nav-item" style="margin-top: 5px; margin-right: 5px">
                <a class="btn btn-primary" href="#">Future(06)</a>
              </li>
              <li class="nav-item" style="margin-top: 5px; margin-right: 5px">
                <a class="btn btn-primary" href="#">Deleted(08)</a>
              </li>                         
            </ul>
          </div>

          <div class="mt-5">
            <h3>Current Timesheets</h3>
            <h4  style="border: 1px;;">There are no records to display at this time.</h4>
            
          </div>
    </div>
    @include('admin.shared.viw_footer')
