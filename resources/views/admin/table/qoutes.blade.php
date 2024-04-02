<h4>Quotes</h4>
<p>This list combines any order marked as a Quote from all tabs. If you wish to approve the order internally, or on behalf of a customer, find the order in the respective tab.</p>
<table class="table table-bordered border-secondary">
    <thead>
        <tr class="table-dark">
            <th scope="col">Delete</th>
            <th scope="col">Edit</th>
           
            <th scope="col">Order Number</th>
            <th scope="col">Created Date</th>
            <!--   <th scope="col">Name</th>-->
            <!--<th scope="col">Mobile Number</th>-->
            <th scope="col">Expected By</th>
            <th scope="col">Customer</th>
            <th scope="col">Sales Represtantive</th> 
            <th scope="col">Entered By</th>
            <th scope="col">Status</th>
          
        </tr>
    </thead>
    <tbody>
        @foreach($orders_info as $info)
        @if($info->quote == 'on')
        <tr>
            <td><a href="" class="btn btn-danger btnmargin">X</a></td> 
            <td><a href="{{route('admin.orders.edit', ['orderid' => $info->cid])}}" class="btn btn-warning btnmargin">Edit</a></td> 

            <td>{{ $info->id }}</td>
            <td>{{ $info->date_added }}</td>
           
            <!--<td>Prince Kumar</td>-->
            <!--<td>+91 98823 74011</td>-->
             <td></td>
            <td>{{ $info->name }}</td>
            <td>{{ $info->NewOrderWizard_SalesRepresentative }}</td> 
                <td>{{$info->sales_representive }}</td> 
            <td>{{$info->order_status}} </td>
            
        </tr>
        @endif
        @endforeach
    </tbody>
</table>