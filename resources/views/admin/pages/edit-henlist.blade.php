@extends ('admin.welcome')

@section('contents')

<h1>   Edit Hen List </h1>

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
    border:2px solid 	rgb(77, 0, 0) !important;
    box-shadow: 0 0 10px #719ECE;
}
</style>


<form  action="{{route('admin.hen.update',$hen->id)}}" method="post"  enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="form-group">
    <label for="exampleInputEmail1">Hen Type</label>
    <select  required name="type" value="{{$hen->type}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Hen type">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
    <option > broiler</option>
        <option > deshi</option>
        <option > pakistani</option>
        <option > layer</option>
        <option > sonalika</option>
</select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Hen Weight</label>
    <input required name="weight" value="{{$hen->weight}}" type="number" step="0.01" class="form-control" id="exampleInputPassword1" placeholder="Hen Weight">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Hen Price</label>
    <input  required name="price" value="{{$hen->price}}" type="number" class="form-control" id="exampleInputPassword1" placeholder="Hen Price">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Hen Quantity</label>
    <input required name="quantity"  value="{{$hen->quantity}}"type="number" class="form-control" id="exampleInputPassword1" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Hen Description</label>
    <input required name="description" value="{{$hen->description}}" type="text" class="form-control" id="exampleInputPassword1" placeholder="">
  </div>

  <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Upload Hens Image</label>
            <input name="image" value='{{$hen->image}}' type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
  <button type="submit" class="btn btn-primary">Let's Enter this</button>
</form>

@endsection