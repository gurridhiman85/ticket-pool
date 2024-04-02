<h4>Awaiting Deposit</h4>
<table class="table table-bordered border-secondary">
    <thead>
        <tr class="table-dark">
            <th scope="col">Delete</th>
            <th scope="col">Edit</th>
            
            <th scope="col">Order Id</th>
            <th scope="col">Created Date</th>
            <th scope="col">ExpectedBy</th>
            <th scope="col">Customer</th>
            <th scope="col">Sales Represtantive</th>
            <th>On Hold</th>
            <th scope="col">Invoice</th>
             <th scope="col">status</th>
             <th scope="col">Total Sale Price (Inc GST)</th>
            <th scope="col">Entered By</th>
            
           
        </tr>
    </thead>
    <tbody>
        @foreach($orders_info as $info)
          @if($info->order_status == "Awaiting Deposit")
        <tr>
            <td><a href="" class="btn btn-danger btnmargin">X</a></td> 
            <td><a href="{{route('admin.orders.edit', ['orderid' => $info->cid])}}" class="btn btn-warning btnmargin">Edit</a> </br>
                  <a href="{{route('admin.orders.view', ['orderid' => $info->cid, 'approved'=>'proudctions_overview'])}}" class="btn btn-warning btnmargin">Production Override</a>
            </td> 
            
             
            <td>{{ $info->id }}</td>
            <td>{{ $info->date_added }}</td>
            <td></td>
            <td>{{ $info->name }}</td>
            <td>Denis Okah</td>
            <td> True</td>           
            <td> </td> 
            <td>Approved, Awaiting Deposit</td>
             <td>{{'$'.$info->total }}</td>
             <td> </td> 
        </tr>
        @endif
        @endforeach
    </tbody>
</table>