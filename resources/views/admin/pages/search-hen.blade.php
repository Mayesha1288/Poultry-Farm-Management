@extends ('admin.welcome')

@section('contents')

<h3>Searched Hen list</h3>
<a href="#" class="btn btn-warning" onclick="printDiv('PrintTableArea')">Print</a>

<div id="PrintTableArea">
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Type</th>
        <th scope="col">Weight</th>
        <th scope="col">Price/kg</th>
        <th scope="col">Quantity</th>
        <th scope="col">Description</th>
        <th>Image</th>
        <th scope="col">Action</th>
       

    </tr>
    </thead>
    <tbody>

      @foreach($hens as $hen)
    <tr>
        <th > {{$hen->id}}</th>
        <th>{{$hen->type}}</th>
        <th>{{$hen->weight}}</th>
        <th>{{$hen->price}}</th>
        <th >{{$hen->quantity}}</th>
        <th >{{$hen->description}}</th>
        <th>
                    <img src="{{url('/uploads/'.$hen->image)}}" width="100px" alt="hen image">
                </th>
                <td>
                        <a class="btn btn-primary" href="{{route('admin.hen.details',$hen->id)}}">View</a>
                        <a class="btn btn-danger" href="{{route('admin.hen.delete',$hen->id)}}">Delete</a>
                        <a class="btn btn-info" href="{{route('admin.hen.update',$hen->id)}}">Update</a>
                    </td>
    </tr>
    @endforeach
    
    </tbody>
</table>
</div>
<script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>



@endsection