@include('admin.shared.viw_header')
    <!--inventory create-->
    <div class="container" id="dashboard">
        <h1 class="mt-3">Customer </h1>
        <div class="row gy-3 my-3" style="border-bottom:1px solid;width: 105%;">
        </div>
    <div class="container mt-5">
     
             <form action="{{ route('customer') }}" method="GET">
                @csrf
              <div class="mb-3">
                
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search">

                <div id="searchResults" style="list-style: none;border:1px solid;">

                </div>
            </div>
   
        </form> 
              <div class="mt-3" style="text-align:center;">
                <button id="add-cust" class=""style="background-color:#33e3ff;border-color: #45daf1;color: white; font-weight:bold;">Add Customer</button> 
    
    </div>
   
    
    <div class="modal fade" id="modalWindow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create a customer</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-8 mx-auto">
                  <!-- Input field and submit button -->
                  <div class="input-group mb-3">
                    
                <input type="text" class="form-control" placeholder="Customer Display Name" aria-label="Type something here" aria-describedby="basic-addon2">
                  </div>
                <div class="input-group-append" style="text-align:center;margin-left: 91px;">
                      <button class="btn btn-outline-secondary"  type="button">Submit</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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


<script>
    let delayTimer;
    const searchQueryInput = document.getElementById('search');

    searchQueryInput.addEventListener('input', function() {
        clearTimeout(delayTimer);
        delayTimer = setTimeout(function() {
            const query = searchQueryInput.value.trim();
            if (query.length >= 3) {
                fetchSearchResults(query);
            } else {
                const searchResultsContainer = document.getElementById('searchResults');
                searchResultsContainer.innerHTML = ''; // Clear search results container if query is empty or less than 3 characters
            }
        }, 2000);
    });

    async function fetchSearchResults(query) {
        const response = await fetch(`/search?search=${encodeURIComponent(query)}`);
        const contentType = response.headers.get('content-type');
        let results;

        if (contentType && contentType.includes('application/json')) {
            results = await response.json();
        } else {
            results = await response.text();
        }

        displaySearchResults(results);
    }

    function displaySearchResults(results) {
        const searchResultsContainer = document.getElementById('searchResults');
        searchResultsContainer.innerHTML = '';

        if (typeof results === 'string') {
            // Insert HTML directly into the search results container
            searchResultsContainer.innerHTML = results;
        } else {
            // Parse JSON response
            results.forEach(customer => {
                // Create a div element to represent each search result
                const customerElement = document.createElement('div');
                customerElement.textContent = customer.name;

                // Append the div element to the search results container
                searchResultsContainer.appendChild(customerElement);
            });
        }
    }
    $('#add-cust').click(function() {
    $('#modalWindow').modal('show');
    });
</script>


   
   


 
    </script>