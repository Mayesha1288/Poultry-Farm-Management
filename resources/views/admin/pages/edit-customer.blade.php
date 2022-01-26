@extends ('admin.welcome')
@section('contents')

<style>
  input:focus {
    outline: none !important;
    border:2px solid 	turquoise !important;
    box-shadow: 0 0 10px #719ECE;
  }
</style>

<h1>   Edit Customer List </h1>

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
  @method('PUT')
 <div class="form-group">
    <label for="exampleInputPassword1">Customer Name</label>
    <input required name="name" value="{{$customer->name}}" type="text"  class="form-control" id="exampleInputPassword1" placeholder="Customer Name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Customer Address</label>
    <input  required name="address"  value="{{$customer->address}}" type="text" class="form-control" id="exampleInputPassword1" placeholder="Customer Address">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Phone Number</label>
    <input required name="number" value="{{$customer->number}}" type="number" class="form-control" id="exampleInputPassword1" placeholder="Phone Number">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Customer description</label>
    <select  required name="customer_description"  value="{{$customer->customer_description}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Hen type">
        <option > Walk in Customer</option>
        <option > Regular Customer</option>
     </select>
  </div>

  <br>

  <button type="submit" class="btn btn-primary">Let's Enter this</button>
  <a href= "{{route ('admin.customer')}}"  class="btn btn-info">Back</a>
</form>
@endsection