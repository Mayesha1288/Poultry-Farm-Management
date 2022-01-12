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
  input:focus
   {
    outline: none !important;
    border:2px solid 	rgb(77, 0, 0) !important;
    box-shadow: 0 0 10px #719ECE;
   }
  </style>


  <form  action="{{route('admin.item.update',$items->id)}}" method="post"  enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input required name="name" value="{{$items->name}}" type="text"  class="form-control" id="exampleInputPassword1" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Type ID</label>
    <select name="type_id" class="form-control" id="exampleInputEmail1"> 
      @foreach($itemtype as $itemtype)
        
        <option value="{{$itemtype-> id}}">{{$itemtype->name}} </option>
        @endforeach
    </select>
  </div>
  <!-- <div class="form-group">
    <label for="exampleInputPassword1">Quantity</label>
    <input  required name="quantity" value="{{$items->quantity}}" type="number" class="form-control" id="exampleInputPassword1" placeholder="">
  </div> -->
    <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Upload Image</label>
            <input required name="image" value="{{$items->image}}" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

   <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <input required name="description" value="{{$items->description}}" type="text" class="form-control" id="exampleInputPassword1" placeholder="">
   </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Price</label>
    <input required name="price" value="{{$items->price}}" type="number"  step="0.01" class="form-control" id="exampleInputPassword1" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Unit</label>
    <input required name="unit" value="{{$items->unit}}" type="text" class="form-control" id="exampleInputPassword1" placeholder="">
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Let's Enter this</button>
  <a href= "{{route ('admin.item')}}"  class="btn btn-info">Back</a>
</form>


@endsection