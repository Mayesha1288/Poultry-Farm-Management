@extends ('admin.welcome')

@section('contents')

<style>
  body{
   
     background: linear-gradient(to left, #ccccff 45%, #ccffff 95%);
 
  }
   #customers {
     font-family: Arial, Helvetica, sans-serif;
     border-collapse: collapse;
     width: 100%;
   }
   .heading h2{
     text-align: center;
   }
   #customers td, #customers th {
     border: 1px solid #ddd;
     padding: 8px;
   }
   
   #customers tr:nth-child(even){background-color: #ccccff;}
   
   #customers tr:hover {background-color: #ddd;}
   
   #customers th {
     padding-top: 12px;
     padding-bottom: 12px;
     text-align: left;
     background-color: rgb(126 15 115);
     color: white;
   }
</style>
<br>
<div class="heading">
  <h2>Sale List</h2>
</div>

<br>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add
</button> -->

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sales</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <body>
    <h2>Add Sale From Here!</h2>
  
  <div>
    <form action="{{route('admin.sale.store')}}" method="POST">
      @csrf
       <label for="sale">Sale Item</label>
      <select id="sale" name="sale_item">
        @foreach ($sale as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
      </select>
      <br>
      <label for="lname"> customer name</label>
      <input type="number" id="lname" name="sale_quantity" placeholder="">
      <input type="submit" value="Save">
      <br>
      <label for="lname">  Total Price </label>
      <input type="number" id="lname" name="total" placeholder="">
      <input type="submit" value="Save"><br>
      <label for="lname"> Paid</label>
      <input type="number" id="lname" name="paid_amount" placeholder="">
      <input type="submit" value="Save">
    </form>
  </div>
  </body>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</body> -->

<body>
<table id="customers">
  <thead>
    <tr>
      <th>#ID</th>
      <th>Customer Name</th>
      <th>Total</th>
      <th>Paid Amount</th>
      <th>Due</th>
      <th>Return</th>
      <th>Action</th>
  
    </tr>  
  </thead>
  @foreach($sales as $sale)
    <tr>
        <th>{{$sale->id}}</th>
        <th>{{optional($sale->customer)->customer_name}}</th>
        <th>{{$sale->total}}</th>
        <th>{{$sale->paid_amount}}</th>
        @php
        $due= $sale->total - $sale->paid_amount;
        @endphp
        @if($due<=0)
        <th>0</th>
        @else
        <th>{{$due}}</th>
        @endif

        @if($due<=0)
        <th>{{$sale->paid_amount - $sale->total}}</th>
        @else
        <th>0</th>
        @endif
       <th> <a class="btn btn-primary" href="{{route('admin.sale.details',$sale->id)}}">View</a> </th>
       <th> <a class="btn btn-danger" href="{{route('admin.sale.delete',$sale->id)}}">Delete</a> </th>
       
 </tr>
    @endforeach
 </body>
 </table><br>
 <a href= "{{route ('admin.dashboard')}}"  class="btn btn-info">Back</a>
@endsection