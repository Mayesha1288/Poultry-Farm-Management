@extends ('admin.welcome')
@section('contents')

<style>
  input:focus {
    outline: none !important;
    border:2px solid 	turquoise !important;
    box-shadow: 0 0 10px #719ECE;
}
</style>


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


<form  action="{{route('admin.customer.store')}}" method="post" >
  @csrf
<div class="form-group">
    <label for="exampleInputPassword1">Customer Name</label>
    <input required name="name" type="text"  class="form-control" id="exampleInputPassword1" placeholder="Customer Name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Customer Address</label>
    <input  required name="address" type="text" class="form-control" id="exampleInputPassword1" placeholder="Customer Address">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Phone Number</label>
    <input required name="number" type="number" class="form-control" id="exampleInputPassword1" placeholder="Phone Number">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Customer description</label>
    <input  name="customer_description" type="text" class="form-control" id="exampleInputPassword1" placeholder="">
  </div>

  <br>

  <button type="submit" class="btn btn-primary">Let's Enter this</button>
</form>

@endsection