<h4>On Hold</h4>
<table class="table table-bordered border-secondary">
    <thead>
        <tr class="table-dark">
            <th scope="col">Delete</th>
            <th scope="col">Edit</th>            
            <th scope="col">Order Number</th>
            <th scope="col">Created Date</th>
            <th scope="col">ExpectedBy</th>
            <th scope="col">Customer</th>
            <th scope="col">Sales Represtantive</th>
             <th>On Hold</th>
             <th>Invoice</th>
             <th scope="col">status</th>
            <th scope="col">Total Sale Price</th>
            <th scope="col">Entered By</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($orders_info as $info)
        @if($info->order_status == "On Hold")
        <tr>
            <td><a href="" class="btn btn-danger btnmargin">X</a></td> 
            <td><a href="{{route('admin.orders.view', ['orderid' => $info->cid, 'removehold' => 'yes'])}}" class="btn btn-warning btnmargin">Edit</a></td> 
            
            <td>{{ $info->cid }}</td>
            <td>{{ $info->date_added }}</td>
            <td></td>
            <td>{{ $info->name }}</td>
            <td>Denis Okah</td>
            <td>  </td>
             <td>45646</td>
                <td>Production</td>
            <td>{{'$'.$info->total }}</td>
            <td> </td>
         
         
        </tr>
        @endif
        @endforeach
    </tbody>
</table>