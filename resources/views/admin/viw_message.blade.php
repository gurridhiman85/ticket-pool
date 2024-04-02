@include('admin.shared.viw_header')

    <!--message create-->
    
    <div class="container">
      <h1 class="mt-3">Messaging (0) |
        <button type="submit" class="btn btn-primary">+</button>
      </h1>
      
      <div class="row mt-5">
        <div class="col-2 mt-2">
          <a href="#">Inbox (0)<span style="font-size: 12px"> - My Account</span></a> 
          <a href="#">Sent(0)<span style="font-size: 12px"> - My Account</span></a> 
          <a href="#">Deleted<span style="font-size: 12px"> - My Account</span></a> 
        </div>

        <div class="col-sm-10" style="overflow-x: hidden; overflow-y: auto">
          <div>
            <table style="width: 100%">
              <tbody>
                <tr>
                  <th style="width: 60px">From:</th>
                  <td>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="from"
                      aria-label="Username"
                      aria-describedby="basic-addon1"
                    />
                  </td>
                </tr>
                <tr>
                  <th>To:</th>
                  <td>
                    <select class="form-select" aria-label="Default select example">
                      <option selected>select the recipient/s</option>                    
                    </select>
                  </td>
                </tr>
                <tr>
                  <th style="width: 60px">Subject:&nbsp</th>
                  <td>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="subject"
                      aria-label="subject"
                      aria-describedby="basic-addon1"
                    />
                  </td>
                </tr>
              </tbody>
            </table>
            <hr />
            <br />
            Body:
            <textarea
              type="text"
              rows="2"
              cols="30"
              class="form-control"
              placeholder="Body"
              style="height: 260px"
            ></textarea>
            <button class="bg-success w-100 border-0">Submit</button>
          </div>
        </div>
      </div>
    </div>
    @include('admin.shared.viw_footer')
