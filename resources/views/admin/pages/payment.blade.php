@extends ('admin.welcome')

@section('contents')


@if(session()->has('msg'))
        <p class="alert alert-success">{{session()->get('msg')}}</p>
    @endif
<center>
<form action="{{route('admin.record.search')}}" method="GET">
<ul class="navbar-nav">

  <center>
<li class="col-md-4">
<input type="text" placeholder="Search.." name="search">
<button type="submit">Submit</button>
  </li>
</center>
</ul>
    </form>
</center>

<a href="{{route('admin.payment.create',)}}" class="btn btn-success">Create Payment list</a>

<table class="table table-hover">
  <thead>
    <tr>
    <th scope="col">ID</th>
    <th scope="col">  Customer Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Item Purchased</th>
      <th scope="col">Total Quantity</th>
      <th scope="col">Total Kg</th>
      <th scope="col">Price/kg</th>
      <th scope="col">Total Price</th>
    </tr>
  </thead>
  <tbody>

  <!-- first we will write the variables name and then write the name which isgiven in the  database table -->
    <!-- the first one is the one which is written in compact and the next one is variable -->
    <!-- foreach is used for loop -->
  @foreach($payments as $payment)
    <tr>
    <th > {{$payment->id}}</th>
    <th > {{$payment->customer_name}}</th>
        <th > {{$payment->phone_number}}</th>
        <th>{{$payment->item_purchased}}</th>
        <th>{{$payment->total_quantity}}</th>
        <th>{{$payment->total_kg}}</th>
        <th >{{$payment->price}}</th>
        <th >{{$payment->total_price}}</th>
        
        <td>
                      
                    </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
@endsection