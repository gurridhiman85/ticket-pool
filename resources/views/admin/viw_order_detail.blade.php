@include('admin.shared.viw_header')
<h1 class="text-center">Order Details</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Order Id</th>
      <th scope="col">Name</th>
      <th scope="col">Account no</th>
      <th scope="col">Total Amount</th>
      <th scope="col">Adderess</th>
      <th scope="col">Order status</th>
      <th scope="col">Order Date/Time</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th><?php echo $order_detail->id;?></th>
      <td><?php echo $order_detail->name;?></td>
      <td><?php echo $order_detail->account_no;?></td>
      <td><?php echo '$'.$order_detail->total;?></td>
      <td><?php echo $order_detail->address;?></td>
      <td><?php echo $order_detail->order_status;?></td>
      <td><?php echo $order_detail->date_added;?></td>
    </tr>
  </tbody>
</table>
@include('admin.shared.viw_footer')