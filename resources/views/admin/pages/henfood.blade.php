@extends('admin.welcome')
@section('contents')



<a href= "{{route ('admin.hens.food.create')}}"  class="btn btn-success">Create Food list</a>
<table class="table table-hover">
  <thead>
    <tr>
    <th scope="col">ID</th>
      <th scope="col">Food name</th>
      <th scope="col">How many times per day</th>
      <th scope="col">Hen Type</th>
     
     
    </tr>
  </thead>
  <tbody>
    <!-- first we will write the variables name and then write the name which isgiven in the  database table -->
    <!-- the first one is the one which is written in compact and the next one is variable -->
    <!-- foreach is used for loop -->
   @foreach($foods as $food)
    <tr>
    <th > {{$food->id}}</th>
        <th > {{$food->food_name}}</th>
        <th>{{$food->food_times}}</th>
        <th>{{$food->food_hentype}}</th>
       
        
    </tr>
    @endforeach

    <a href= "{{route ('admin.dashboard')}}"  class="btn btn-info">Back</a>
  </tbody>

</table>
@endsection