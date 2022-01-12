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




<form action="{{route('admin.eggtype.store2')}}" method='post' >

  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Egg Type</label>
    <select required name="eggtype2" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        <option > eggs of deshi hens</option>
        <option > brown eggs of broiler hens</option>
        <option > white eggs of broiler hens</option>
        <option > eggs of pakistani hens</option>
        <option > eggs of layer hens</option>
</select>

  </div>
  
  
  <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Submit</button>
</form> 

@endsection