@extends ('admin.welcome')

@section('contents')


  @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>
                <p class="alert alert-danger">{{$error}}</p>
            </div>
        @endforeach
  @endif

    @if(session()->has('msg'))
        <p class="alert alert-success">{{session()->get('msg')}}</p>
    @endif

  <style>
   input:focus {
    outline: none !important;
    border:1px solid 	blue !important;
    box-shadow: 0 0 10px #719ECE;
   }
  </style>

<form action="{{route('admin.hens.food.store3')}}" method="post">
 @csrf
 <div class="form-group">
    <label for="exampleInputEmail1">Food Name</label>
    <input required name="food_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">How many times a day</label>
    <input required name="time" type="number" step="0.01" class="form-control" id="exampleInputPassword1" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Hen type</label>
    <input name="type" type="text" class="form-control" id="exampleInputPassword1" placeholder="">
  </div>
  
  <button type="submit" class="btn btn-info">Let's Enter this</button>
</form>
@endsection