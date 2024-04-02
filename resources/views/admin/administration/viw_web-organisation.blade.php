@include('admin.shared.viw_header')


    <!--organisations create-->
    <div class="container mt-5">     
        <div class="tab-content">
            <h1 class="text">Organisation Manager <button type="submit" class="btn btn-primary">+</button></h1>
          <table
             class= "table table-bordered border-primary table-striped"                    
            >
            <tbody >
              <tr class="table-dark">
                <th scope="col" style="width: 12% ; ">&nbsp;</th>
                <th scope="col" style="width: 12%">Organisation Name</th>
                <th scope="col" style="width: 12%">Access Key</th>
                <th scope="col" style="width: 12%">Fixed Order Number</th>
                <th scope="col" style="width: 18%">Total Members</th>
                <th scope="col" style="width: 15%">Deleted</th>                
              </tr>
              <tr>
                <td>
                  <a href="#" class="btn btn-warning btnmargin">View</a>
                </td>
                <td>Newport Power Junior Football Club</td>
                <td>NP2233</td>
                <td>1700805</td>
                <td>2</td>
                <td>  <input type="checkbox"/></td>
              </tr>
              <tr>
                <td>
                  <a href="#" class="btn btn-warning btnmargin">View</a>
                </td>
                <td>Newport Power Junior Football Club</td>
                <td>NP2233</td>
                <td>1700805</td>
                <td>2</td>
                <td>  <input type="checkbox"/></td>
              </tr>
              <tr>
                <td>
                  <a href="#" class="btn btn-warning btnmargin">View</a>
                </td>
                <td>Newport Power Junior Football Club</td>
                <td>NP2233</td>
                <td>1700805</td>
                <td>2</td>
                <td>  <input type="checkbox"/></td>
              </tr>
              <tr style="background-color: #382e2e">
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
    </div>
    @include('admin.shared.viw_footer')
