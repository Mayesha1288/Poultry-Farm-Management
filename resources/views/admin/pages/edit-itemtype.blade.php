@extends ('admin.welcome')
@section('contents')

<h2>Edit ItemType From Here!</h2>
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


<form  action="{{route('admin.itemtype.update',$itemtype->id)}}" method="post" > 
  @method('put')
  @csrf

  <div class="form-group">
    <label for="exampleInputPassword1">Name</label>
    <input required name="name"  value="{{$itemtype->name}}" type="text"  class="form-control" id="exampleInputPassword1" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Status</label>
    <select  required name="status"  value="{{$itemtype->status}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Hen type">
        <option > Active</option>
        <option > InActive</option>
     </select>
  </div>

  <br>

  <button type="submit" class="btn btn-primary">Let's Enter this</button>
  <a href= "{{route ('admin.itemtype')}}"  class="btn btn-info">Back</a>
</form>
  @endsection