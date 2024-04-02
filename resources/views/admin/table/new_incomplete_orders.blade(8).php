<table class="table table-bordered border-secondary">
    <thead>
        <tr class="table-dark">
            <th scope="col">Delete</th>
            <th scope="col">Edit</th>
            <th scope="col"></th>
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
            <th scope="col">status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders_info as $info)
        <tr>
            <td><a href="" class="btn btn-danger btnmargin">X</a></td> 
            <td><a href="{{route('admin.orders.edit', ['orderid' => $info->id])}}" class="btn btn-warning btnmargin">Edit</a></td> 
            <td><a href="" class="btn btn-warning btnmargin">Resend Approval Request</a></td>
            <td><a href="" class="btn btn-success btnmargin">Approve</a></td> 
            <td>{{ $info->id }}</td>
            <td>{{ $info->date_added }}</td>
            <td></td>
            <td>{{ $info->name }}</td>
            <td>Denis Okah</td>
            <td> True</td>
            <td>{{'$'.$info->total }}</td>
            <td> </td>
            <td>true </td>
            <td>Approved, Awaiting Deposit</td>
        </tr>
        @endforeach
    </tbody>
</table>