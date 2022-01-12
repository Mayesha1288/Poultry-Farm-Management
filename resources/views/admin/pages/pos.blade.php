@extends ('admin.welcome')

@section('contents')
<center>
<h2> Point of Sale</h2>
<center>

<div class="row">
    <div class="col-lg-4">
     POS
        <div class="panel">

          <h4 class="text-info">Customer
          <a href= ""  class="btn btn-primary">Add  </a>
          </h4>
            <select class="form-control">
              <option>Select Customer</option>
              @foreach($customer as $customers)
        
              <option value="{{$customers->id}}">{{$customers->customer_name}} </option>
              @endforeach
            </select>     
        </div>    
    </div>
    <div class="col-lg-8">
    All items
    <table class="table table-hover">
    <thead>
    <tr>
       
        <th scope="col">Name</th>
        <th scope="col">Type ID</th>
        <th scope="col">Image</th>
        <th scope="col">Price</th>
        <th scope="col">Unit</th>
        <th scope="col">Action</th>
           
    </tr>
    </thead>
    <tbody>

    @foreach($item as $items)
    <tr>
        
        <th><a href="" style="font-size: 20px;"> <i class="fas fa-plus"></i></a>
        {{$items->name}}
        </th>
        <th>{{$items->itemType->name}}</th>
        <th>
             <img src="{{url('/uploads/'.$items->image)}}" width="100px" alt=" image">
         </th>
        <th>{{$items->price}}</th>
        <th>{{$items->unit}}</th>
       
        <td>
                        <a class="btn btn-primary" href="{{route('admin.item.details',$items->id)}}">View</a>
                      
                    </td>
    </tr>
    @endforeach
</table>
    </div>
    
</div>

@endsection