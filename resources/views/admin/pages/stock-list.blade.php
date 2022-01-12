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
  <h2>Stock List</h2>
</div>

<br>
<a href="{{route('admin.stock.create')}}" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add
  </a>

<body>
<table id="customers">
  <thead>
    <tr>
      <th>#ID</th>
      <th>Stock Item</th>
      <th>Quantity</th>
      <th>Action</th>
  
    </tr>  
  </thead>
  <tbody>
  
    @foreach ($stocks as $key=>$stock)
    <tr>
      <td>{{$key+1}}</td>
      <td>{{optional($stock->item)->name}}</td>
      <td>{{$stock->stock_quantity}}</td>
      
      <td>
        
        <a class="btn btn-danger" href="{{route('admin.stock.delete',$stock->id)}}">Delete</a>
      </td>




    </tr>    
    @endforeach
    
  </tbody>

</table>





@endsection