@extends ('admin.welcome')

@section('contents')
<a href="{{route('admin.hens.create')}}" class="btn btn-success">Create Hen list</a>
<a href="{{route('admin.hens.vaccine')}}" class="btn btn-primary">Check the Vaccine </a>
<a href="{{route('admin.hens.food')}}" class="btn btn-warning">Check the Food </a>
<a href= "{{route ('admin.dashboard')}}"  class="btn btn-info">Back</a>
<form action="{{route('admin.hen.search')}}" method="GET">
    <div class="input-group mb-3">
        <input name="search" type="text" class="form-control" placeholder="Search">
        <!-- <button class="btn btn-success" type="submit">Search</button> -->
    </div>
</form>

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Type</th>
        <th scope="col">Weight</th>
        <th scope="col">Price/kg</th>
        <th scope="col">Quantity</th>
        <th scope="col">Description</th>
        <th>Image</th>
        <th scope="col">Action</th>
       

    </tr>
    </thead>
    <tbody>

      @foreach($henlist as $hen)
    <tr>
        <th > {{$hen->id}}</th>
        <th>{{$hen->type}}</th>
        <th>{{$hen->weight}}</th>
        <th>{{$hen->price}}</th>
        <th >{{$hen->quantity}}</th>
        <th >{{$hen->description}}</th>
        <th>
                    <img src="{{url('/uploads/'.$hen->image)}}" width="100px" alt="hen image">
                </th>
                <td>
                        <a class="btn btn-primary" href="{{route('admin.hen.details',$hen->id)}}">View</a>
                        <a class="btn btn-danger" href="{{route('admin.hen.delete',$hen->id)}}">Delete</a>
                        <a class="btn btn-info" href="{{route('admin.hen.edit',$hen->id)}}">Update</a>
                    </td>
    </tr>
    @endforeach
    
    </tbody>
</table>


@endsection