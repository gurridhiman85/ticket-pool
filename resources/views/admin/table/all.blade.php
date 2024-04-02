<h4>All Orders</h4>
<table class="table table-bordered border-secondary">
    <thead>
        <tr class="table-dark">
          
            <th scope="col">View</th>           
            <th scope="col">Order Number</th>
            <th scope="col">Created Date</th>
            <th scope="col">Expected By</th>
            <th scope="col">Customer</th>
            <th scope="col">Sales Represtantive</th>
            <th>On Hold</th>
             <th>Invoice</th>
             <th scope="col">status</th>
             <th scope="col">Completed</th>
            <th scope="col">Total Sale Price (Inc GST)</th>
            <th scope="col">Entered By</th>
      
            
        </tr>
    </thead>
    <tbody>
        @foreach($orders_info as $info)
          @if($info->order_status == "All")
        <tr>
           
          <td><a href="{{route('admin.orders.view', ['orderid' => $info->cid])}}" class="btn btn-info btnmargin">View</a></td> 
           
            <td>{{ $info->id }}</td>
            <td>{{ $info->date_added }}</td>
            <td></td>
            <td>{{ $info->name }}</td>
            <td>{{ $info->NewOrderWizard_SalesRepresentative }}</td>
            <td> True</td>
            <td>  </td>
           <td>Production</td>
            <td> False</td>
            <td>{{'$'.$info->total }}</td>
            <td> </td>
             
           
        </tr>
          @endif
        @endforeach
    </tbody>
</table>