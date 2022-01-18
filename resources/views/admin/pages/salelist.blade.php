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
     background-color: rgb(9, 24, 68);
     color: white;
   }
   </style>
<br>
<div class="heading">
  <h2>Sale List</h2>
</div>

<br>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <label for="lname"> Sale Quantity</label>
      <input type="number" id="lname" name="sale_quantity" placeholder="sale quantity..">
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
</body>

<body>
<table id="customers">
  <thead>
    <tr>
      <th>#ID</th>
      <th>Customer Name</th>
      <th>Total</th>
      <th>Paid Amount</th>
      <th>Action</th>
  
    </tr>  
  </thead>
  @foreach($sales as $sale)
    <tr>
        <th>{{$sale->id}}</th>
        <th>{{optional($sale->customer)->customer_name}}</th>
        <th>{{$sale->total}}</th>
        <th>{{$sale->paid_amount}}</th>
 </tr>
    @endforeach
 </body>
 </table>

@endsection