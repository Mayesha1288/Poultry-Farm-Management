@extends('admin.welcome')


@section('contents')

<center>
<div id="PrintTableArea">
    <h1>Record Details</h1>

    <p> Date :{{$record->date}}</p>  
<p> Sick Hens :{{$record->sick_hens}}</p>
<p> Hens Died :{{$record->hens_died}}</p>
<p> Vaccinated Hens :{{$record->vaccinated_hens}}</p>
<p>Eggs Collected :{{$record->eggs_collected}}</p>
<p >Eggs Damaged:{{$record->eggs_damaged}}</p>

        

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