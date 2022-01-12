@extends ('admin.welcome')

@section('contents')

<h3>Searched Stock list</h3>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col"> Hen Type</th>
      <!-- <th scope="col">Price</th>
      <th scope="col">Quantity</th> -->


      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($hens as $hen)
    <tr>
      <th>{{$hen->hentype}}</th>
      <td>
        <a href="{{route('admin.stock.details',$hen->id)}}" class="btn btn-primary">View</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col"> Egg Type</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($eggs as $egg)
    <tr>
      <th>{{$egg->eggtype}}</th>
      <td>
        <a href="{{route('admin.egg-stock.details',$hen->id)}}" class="btn btn-primary">View</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection