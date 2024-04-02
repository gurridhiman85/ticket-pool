<table class="table table-bordered border-secondary">
    <thead>
        <tr class="table-dark">
            <th scope="col">Delete</th>
            <th scope="col">Edit</th>
           
            <th scope="col">Order Number</th>
            <th scope="col">Created Date</th>
            <th scope="col">Expected By</th>
            <th scope="col">Customer</th>
            <th scope="col">Sales Represtantive</th>
           
            <th >Total Sale Price</th>
            <th scope="col">Entered By</th>
            <th scope="col">Quote</th>
          
        </tr>
    </thead>
    <tbody>
        @foreach($orders_info as $info)
        @if($info->order_status == 'New Incomplete Orders')
        <tr>
            <td><a href="" class="btn btn-danger btnmargin">X</a></td> 
            <td><a href="{{route('admin.orders.edit', ['orderid' => $info->cid])}}" class="btn btn-warning btnmargin">Edit</a></td> 
            
            <td>{{ $info->cid }}</td>
            <td>{{ $info->date_added }}</td>
            <td>{{$info->expected_date ?? ''}}</td>
            <td>{{ $info->name }}</td>
            <td>{{$info->NewOrderWizard_SalesRepresentative}}</td>
         
            <td>$ {{$info->total ?? 0.00 }}</td>
            <td> </td>
            <td>{{ $info->quote == 'on'? 'True': 'False' }} </td>
            
        </tr>
        @endif
        @endforeach
    </tbody>
</table>