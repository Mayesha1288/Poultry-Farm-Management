@extends('admin.welcome')


@section('contents')
<center>
<div id="PrintTableArea">
    <h1>Customer Details</h1>

    <p> Customer ID :     {{$customer->id}}</p>  
<p> Customer Name :       {{$customer->customer_name}}</p>
<p> Address :        {{$customer->address}}</p>
<p> Phone number :     {{$customer->phone_number}}</p>
<p> Customer Description:      {{$customer->customer_description}}</p>



<button  class="btn btn-primary" type="button" onClick="PrintDiv('PrintTableArea');" >Print</button>
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