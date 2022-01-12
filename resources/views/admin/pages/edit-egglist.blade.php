@extends ('admin.welcome')

@section('contents')

<style>
  input:focus {
    outline: none !important;
    border:2px solid 	rgb(77, 0, 0) !important;
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



<form action="{{route('admin.egg.update',$egg->id)}}" method='post' enctype="multipart/form-data">

  @csrf
  @method('put')
  <div class="form-group">
    <label for="exampleInputEmail1">Egg Type</label>
    <select name="egg_type" value="{{$egg->type}}" class="form-control" id="exampleInputEmail1"> 
     @foreach($eggTypes as $eggtype)
      <option value="{{$eggtype->id}}" {{$egg->type == $eggtype->id ? 'selected' : ''}}>{{$eggtype->eggtype}}</option>
      @endforeach
    </select>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Egg Price</label>
    <input required name="egg_price" value='{{$egg->price}}'  type="text" class="form-control" id="exampleInputPassword1" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Egg Quantity</label>
    <input required name="egg_quantity" value='{{$egg->quantity}}'  type="text" class="form-control" id="exampleInputPassword1" placeholder="">
  </div>
  <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Upload Eggs Image</label>
            <input  name="image" value='{{$egg->image}}'  type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
  <br>
  <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Submit</button>
</form>

@endsection


