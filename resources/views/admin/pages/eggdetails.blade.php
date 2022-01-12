@extends('admin.welcome')


@section('contents')
<button  class="btn btn-primary" type="button" onClick="PrintDiv('PrintTableArea');" >Print</button>

<center>
<div id="PrintTableArea">
    <h1>Egg Details</h1>
<p> Type : {{$egg->type}}</p>
<p>Price: <h4><span style="color: orange">BDT {{$egg->price}}</span></h4> </p>
<p>Quantity: {{$egg->quantity}}</p>

<p>
        <img style="border-radius: 4px;" width="200px;" src=" {{url('/uploads/'.$egg->image)}}" alt="egg image">
    </p>
    <!-- <button  class="btn btn-primary" type="button" onClick="PrintDiv('PrintTableArea');" >Print</button> -->
</center>
</div>

<script language="javascript">
    function PrintDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
@endsection