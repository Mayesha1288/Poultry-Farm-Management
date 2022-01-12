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
    border:2px solid 	yellow !important;
    box-shadow: 0 0 10px #719ECE;
}
</style>

<form action="{{route('admin.hens.vaccine.store2')}}" method="post">
@csrf
<!-- csrf is used to avoid the page expired thing  -->
<div class="form-group">
    <label for="exampleInputEmail1">Vaccine Name</label>
    <input required name="vaccine_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Vaccine Production date</label>
    <input required name="vaccine_production" type="date" step="0.01" class="form-control" id="exampleInputPassword1" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Vaccine Expiration Date</label>
    <input required name="vaccine_expiration" type="date" class="form-control" id="exampleInputPassword1" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Vaccine Description</label>
    <input required name="vaccine_description" type="test" class="form-control" id="exampleInputPassword1" placeholder="">
  </div>
  <button type="submit" class="btn btn-info">Let's Enter this</button>
</form>
@endsection