<h4>Pending Approval</h4>
<table class="table table-bordered border-secondary">
    <thead>
        <tr class="table-dark">
            <th scope="col">Delete</th>
            <th scope="col">Edit</th>
      
            <th scope="col"></th>
            <th scope="col">Order Id</th>
            <th scope="col">Created Date</th>
            <th scope="col">ExpectedBy</th>
            <th scope="col">Customer</th>
            <th scope="col">Sales Represtantive</th>
            <th>On Hold</th>
            <th scope="col">Total Sale Price</th>
            <th scope="col">Entered By</th>
            <th scope="col">Quote</th>
        
        </tr>
    </thead>
    <tbody>
        @foreach($orders_info as $info)
        @if($info->order_status == "Pending Internal Approval")
        
        <tr>
            <td><a href="" class="btn btn-danger btnmargin">X</a></td> 
            <td><a href="{{route('admin.orders.edit', ['orderid' => $info->cid])}}" class="btn btn-warning btnmargin">Edit</a></td> 
          
            <td><a href="{{ route('admin.orders.edit', ['orderid' => $info->cid, 'approved' => 'approved']) }}" class="btn btn-success btnmargin">Approve</a></td>

            <td>{{ $info->cid }}</td>
            <td>{{ $info->date_added }}</td>
            <td></td>
            <td>{{ $info->name }}</td>
            <td>Denis Okah</td>
            <td> True</td>
            <td>{{'$'.$info->total }}</td>
            <td> </td>
            <td>true </td>
     
        </tr>
        @endif
        @endforeach
    </tbody>
</table>