@extends('admin.welcome')


@section('contents')
  <center>  <h1>Hen Details</h1>
 

<div id="PrintTableArea">
   
<p> Type : {{$hen->type}}</p>
<p>Weight: {{$hen->weight}}</p>
<p>Price/kg: <h4><span style="color: orange">BDT {{$hen->price}}</span></h4> </p>
<p>Quantity: {{$hen->quantity}}</p>
<p>Description: {{$hen->description}}</p>
<p>
        <img style="border-radius: 4px;" width="200px;" src=" {{url('/uploads/'.$hen->image)}}" alt="hen image">
    </p>

    <a href="#" class="btn btn-warning" onclick="printDiv('PrintTableArea')">Print</a>
</div>
    <script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
 </center>
 @endsection