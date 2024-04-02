@include('admin.shared.viw_header')

    <!--email craete-->

    <div class="container mt-5">
      <h1>Email Service</h1>
      <div class="col-lg-10" style="overflow-x: hidden; overflow-y: auto">
        <div>
          <label for="text">Email:</label>
          <input
            type="text"
            class="form-control"
            placeholder="email"
            aria-label="Username"
            aria-describedby="basic-addon1"
          />
          <select class="form-select mt-3 bg-primary" aria-label="Default select example">
            <option>select recipient/s</option>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Handle</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td colspan="2">Larry the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>
          </select>
            
          <label class="mt-3" for="text">Subject:</label>
          <input
            type="text"
            class="form-control"
            placeholder="subject"
            aria-label="Username"
            aria-describedby="basic-addon1"
          />
         <div class="mt-3">
           Message: 
          <textarea
            type="text"
            rows="2"
            cols="20"
            class="form-control"
            placeholder="Please type here"
            style="height: 300px"
          ></textarea>
        </div>
          <button
            class="bg-success rounded border-0 mt-1"
            style="height: 50px; width: 80px"
          >
            Submit
          </button>
        </div>
      </div>
    </div>
    @include('admin.shared.viw_footer')
