@extends('admin.welcome')

@section('contents')


<h2>Item List</h2>

<a href= "{{route ('admin.item.create')}}"  class="btn btn-primary">Add Item </a>

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Type ID</th>
        <th scope="col">Image</th>
        <th scope="col">Description</th>
        <th scope="col">Price</th>
        <th scope="col">Unit</th>
        <th scope="col">Action</th>
           
    </tr>
    </thead>
    <tbody>

    @foreach($item as $items)
    <tr>
        <th>{{$items->id}}</th>
        <th>{{$items->name}}</th>
        <th>{{$items->itemType->name}}</th>
        <th>
                    <img src="{{url('/uploads/'.$items->image)}}" width="100px" alt=" image">
         </th>
        <th>{{$items->description}}</th>
        <th>{{$items->price}}</th>
        <th>{{$items->unit}}</th>
       
        <td>
                        <a class="btn btn-primary" href="{{route('admin.item.details',$items->id)}}">View</a>
                        <a class="btn btn-danger" href="{{route('admin.item.delete',$items->id)}}">Delete</a>
                        <a class="btn btn-info" href="{{route('admin.item.edit',$items->id)}}">Update</a>
                    </td>
    </tr>
    @endforeach
</table>
@endsection