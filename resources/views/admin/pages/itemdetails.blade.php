@extends('admin.welcome')


@section('contents')

<center>
<div id="PrintTableArea">
    <h1>Item Details</h1>

    <p> Item Name :{{$items->name}}</p>  
<p> Item Type Name :{{$items->itemType->name}}</p>
<p> Item Description :{{$items->description}}</p>
<p>Price: <h4><span style="color: orange">BDT {{$items->price}}</span></h4> </p>
<p>Unit:{{$items->unit}}</p>
<p>
        <img style="border-radius: 4px;" width="200px;" src=" {{url('/uploads/'.$items->image)}}" alt=" image">
    </p>


        

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