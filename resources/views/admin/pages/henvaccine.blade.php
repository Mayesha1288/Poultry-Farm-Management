@extends('admin.welcome')
@section('contents')

<a href= "{{route ('admin.hens.vaccine.create')}}"  class="btn btn-success">Create Vaccine list</a>
<table class="table table-hover">
  <thead>
    <tr>
    <th scope="col">ID</th>
      <th scope="col">Vaccine name</th>
      <th scope="col">Vaccine Production Date</th>
      <th scope="col">Vaccine  ExpirationDate</th>
      <th scope="col">Vaccine Description</th>
     
    </tr>
  </thead>
  <tbody>
    <!-- first we will write the variables name and then write the name which isgiven in the  database table -->
    <!-- the first one is the one which is written in compact and the next one is variable -->
    <!-- foreach is used for loop -->
  @foreach($vaccines as $vaccine)
    <tr>
    <th > {{$vaccine->id}}</th>
        <th > {{$vaccine->vaccine_name}}</th>
        <th>{{$vaccine->vaccine_production}}</th>
        <th>{{$vaccine->vaccine_expiration}}</th>
        <th>{{$vaccine->vaccine_description}}</th>
        
    </tr>
    @endforeach



@endsection