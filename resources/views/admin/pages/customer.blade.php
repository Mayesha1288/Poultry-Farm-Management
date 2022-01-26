@extends('admin.welcome')
@section('contents')
<!-- to link this button in this route -->

<form action="{{route('admin.customer')}}">
<div class="input-group rounded mt-3 mb-2">
  <div class="form-outline">
    <input type="search" id="form1" class="form-control" name="search" placeholder="Search" arial-label="Search" aria-describedby="search-addon" />
    <!-- <label class="form-label" for="form1">Search</label> -->
  </div>
  <button type="submit" class="btn btn-primary">
    <i class="fas fa-search"></i>
  </button>
</div>

</form>

<a href= "{{route ('admin.customer.create')}}"  class="btn btn-primary">Create Customer list</a>
<table class="table table-hover">
  <thead>
    <tr>
    <th scope="col">ID</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Customer Address</th>
      <th scope="col">Customer Number</th>
      <th scope="col">Customer Description</th>
      <th scope="col">Action</th>
     
    </tr>
  </thead>
  <tbody>
    <!-- first we will write the variables name and then write the name which isgiven in the  database table -->
    <!-- the first one is the one which is written in compact and the next one is variable -->
    <!-- foreach is used for loop -->
  @foreach($customer as $customers)
    <tr>
    <th>{{$customers->id}}</th>
        <th>{{$customers->customer_name}}</th>
        <th>{{$customers->address}}</th>
        <th>{{$customers->phone_number}}</th>
        <th>{{$customers->customer_description}}</th>
        <td>
        <a class="btn btn-primary" href="{{route('admin.customer.details',$customers->id)}}">View</a>
        <a class="btn btn-danger" href="{{route('admin.customer.delete',$customers->id)}}">Delete</a>
        <a class="btn btn-info" href="{{route('admin.customer.edit',$customers->id)}}">Update</a>
        </td>

    </tr>
    @endforeach

</tbody>
</table>

@endsection