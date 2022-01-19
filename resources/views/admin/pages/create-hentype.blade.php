@extends ('admin.welcome')

@section('contents')

<style>
  input:focus {
    outline: none !important;
    border:2px solid 	purple !important;
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




<form action="{{route('admin.hentype.store')}}" method='post' >

  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Hen Type</label>
    <select required name="hentype" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        <option > broiler</option>
        <option > deshi</option>
        <option > pakistani</option>
        <option > layer</option>
        <option > sonalika</option>
 </select>

  </div>
  
  
  <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Submit</button>
</form> 
@endsection