@extends('admin.welcome')

@section('contents')

<center>
<h2>ItemType List</h2>
<center>

<a href= "{{route ('admin.itemtype.create')}}"  class="btn btn-primary">Create Item Type</a>
<!-- <form action="{{route('admin.itemtype')}}" method="GET">
    <div class="input-group mb-3">
        <input name="search" type="text" class="form-control" placeholder="Search">
        <button class="btn btn-success" type="submit">Search</button>
    </div>
</form> -->
<table class="table table-hover">
    <tbody>
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
        
        
    </tr>
    </thead>
</tbody>
    <tbody>
  <!-- first we will write the variables name and then write the name which isgiven in the  database table -->
    <!-- the first one is the one which is written in compact and the next one is variable -->
    <!-- foreach is used for loop -->
    @foreach($itemtype as $itemtypes)
    <tr>
    <th>{{$itemtypes->id}}</th>
        <th>{{$itemtypes->name}}</th>
        <th>{{$itemtypes->status}}</th>
         <th><a class="btn btn-info" href="{{route('admin.itemtype.edit',$itemtypes->id)}}">Update</a></th>
    </tr>
    @endforeach
</tbody>
</table>
@endsection