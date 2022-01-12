@extends ('admin.welcome')

@section('contents')
<!-- <a href="/admin/stock/create" class="btn btn-success">Create Stock list</a> -->
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Type</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <!-- <th scope="col">Action</th> -->
    </tr>
  </thead>
  <tbody>
    @php
    $total_price = 0;
    $total_quantity = 0;
    @endphp
  
    @foreach($hens as $hen)
    
    <tr>
      <th>{{$hen->type}}</th>
      <td>{{$hen->price}}</td>
      <td>{{$hen->quantity}}</td>
      <td>
        @php 
          $price = $hen->price;
          $total_price = $total_price +$price;
          $quantity = $hen->quantity;
          $total_quantity = $total_quantity +$quantity;
        @endphp
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<table>
  <thead>
    <tr>
      <th>Total quantity</th>
      <th>Total price</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{$total_quantity}}</td>
      <td>{{$total_price}}</td>
    </tr>
  </tbody>
</table>

@endsection