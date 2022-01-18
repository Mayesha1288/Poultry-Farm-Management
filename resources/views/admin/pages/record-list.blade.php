@extends ('admin.welcome')

@section('contents')


@if(session()->has('msg'))
        <p class="alert alert-success">{{session()->get('msg')}}</p>
    @endif
<center>
<!-- <form action="{{route('admin.record.search')}}" method="GET">
<ul class="navbar-nav"> -->

  <center>
    <form action="{{route('admin.record.search')}}">
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
<!-- <li class="col-md-4">
<input type="text" placeholder="Search.." name="search">
<button type="submit">Submit</button>
  </li> -->
</center>
</ul>
    </form>
</center>

<a href="{{route('admin.records.create',)}}" class="btn btn-success">Create Record list</a>

<table class="table table-hover">
  <thead>
    <tr>
    <th scope="col">ID</th>
    <th scope="col">  Date</th>
      <th scope="col">Hens Died</th>
      <th scope="col">Sick Hens</th>
      <th scope="col">vaccinated hens</th>
      <th scope="col">eggs collected</th>
      <th scope="col">eggs damaged</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  <!-- first we will write the variables name and then write the name which isgiven in the  database table -->
    <!-- the first one is the one which is written in compact and the next one is variable -->
    <!-- foreach is used for loop -->
  @foreach($recordlist as $record)
    <tr>
    <th > {{$record->id}}</th>
    <th > {{$record->date}}</th>
        <th > {{$record->hens_died}}</th>
        <th>{{$record->sick_hens}}</th>
        <th>{{$record->vaccinated_hens}}</th>
        <th>{{$record->eggs_collected}}</th>
        <th >{{$record->eggs_damaged}}</th>
        
        <td>
                        <a class="btn btn-primary" href="{{route('admin.record.details',$record->id)}}">View</a>
                        <a class="btn btn-danger" href="{{route('admin.record.delete',$record->id)}}">Delete</a>
                        <a class="btn btn-info" href="{{route('admin.record.edit',$record->id)}}">Update</a>
                    </td>
    </tr>
    @endforeach
    
  </tbody>
</table><br>
<a href= "{{route ('admin.dashboard')}}"  class="btn btn-info">Back</a>
@endsection