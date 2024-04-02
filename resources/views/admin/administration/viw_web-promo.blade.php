@include('admin.shared.viw_header')

    <!--promo create-->
    <div class="container mt-5">
      <div class="tab-content">
        <h1 class="text">
          Promo Code <button type="submit" class="btn btn-primary">+</button>
        </h1>
        <input type="text" value="" placeholder="Search" style="width: 100% ; height: 50px; border-color: cornflowerblue;"/>
        <table class="table table-bordered border-secondary my-3 table-responsive">
          <tbody >
            <tr class="table-dark">
              <th scope="col" style="width: 12%">&nbsp;</th>
              <th scope="col" style="width: 12%">Promo Name</th>
              <th scope="col" style="width: 12%">Promo Code</th>
              <th scope="col" style="width: 12%">Discount(%)</th>
              <th scope="col" style="width: 18%">Start Date</th>
              <th scope="col" style="width: 18%">End Date</th>
              <th scope="col" style="width: 15%">Deleted</th>
            </tr>
            <tr>
              <td>
                <a href="#" class="btn btn-warning btnmargin">Edit</a>
              </td>
              <td>New Website Promotion</td>
              <td>NEW10</td>
              <td>10</td>
              <td>16/11/2023 04:00:00 PM</td>
              <td>16/11/2023 05:00:00 PM</td>
              <td><input type="checkbox" /></td>
            </tr>
            <tr>
              <td>
                <a href="#" class="btn btn-warning btnmargin">Edit</a>
              </td>
              <td>New Website Promotion</td>
              <td>NEW10</td>
              <td>10</td>
              <td>16/11/2023 04:00:00 PM</td>
              <td>16/11/2023 05:00:00 PM</td>
              <td><input type="checkbox" /></td>
            </tr>
            <tr>
              <td>
                <a href="#" class="btn btn-warning btnmargin">Edit</a>
              </td>
              <td>New Website Promotion</td>
              <td>NEW10</td>
              <td>10</td>
              <td>16/11/2023 04:00:00 PM</td>
              <td>16/11/2023 05:00:00 PM</td>
              <td><input type="checkbox" /></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    @include('admin.shared.viw_footer')
