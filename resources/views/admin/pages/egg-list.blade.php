@extends('admin.welcome')

@section('contents')
<h1> Hi .this is the egg list</h1>

@if(session()->has('msg'))
        <p class="alert alert-success">{{session()->get('msg')}}</p>
    @endif
    
<!-- to link this button in this route -->
<a href="{{route('admin.eggs.create')}}" class="btn btn-success">Create Egg list</a>

<form action="{{route('admin.eggs')}}" method="GET">
    <div class="input-group mb-3">
        <input name="search" type="text" class="form-control" placeholder="Search">
        <!-- <button class="btn btn-success" type="submit">Search</button> -->
    </div>
</form>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col"> Type</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th> Image</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
<!-- first we will write the variables name and then write the name which isgiven in the  database table -->
    <!-- the first one is the one which is written in compact and the next one is variable -->
    <!-- foreach is used for loop -->
       @foreach($eggs as $egg)
    <tr>
        <th > {{$egg->id}}</th>
        <th>{{$egg->eggType->eggtype}}</th>
        <th>{{$egg->price}}</th>
        <th>{{$egg->quantity}}</th>
        <th>
                    <img src="{{url('/uploads/'.$egg->image)}}" width="100px" alt="egg image">
                </th>

                <td>
                        <a class="btn btn-primary" href="{{route('admin.egg.details',$egg->id)}}">View</a>
                        <a class="btn btn-danger" href="{{route('admin.egg.delete',$egg->id)}}">Delete</a>
                        <a class="btn btn-info" href="{{route('admin.egg.edit',$egg->id)}}">Update</a>
                    </td>
    </tr>
    @endforeach
    
    </tbody>
</table>
<a href= "{{route ('admin.dashboard')}}"  class="btn btn-info">Back</a>
@endsection