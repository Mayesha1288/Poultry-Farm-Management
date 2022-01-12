@extends('admin.welcome')

@section('contents')
<h1> Hi .this is the Hen and Egg type list...</h1>
<h2> Hope you have a beautiful  Day</h2>
<a href="{{route('admin.hentype.create')}}" class="btn btn-success">Create the Hen Type</a>
<a href="{{route('admin.eggtype.create')}}" class="btn btn-info">Create the Egg Type</a>

<button  class="btn btn-primary" type="button" onClick="PrintDiv('PrintTableArea');" >Print</button>

<center>
<div id="PrintTableArea">
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Hen  Type</th>
        
    </tr>
    </thead>
    <tbody>
<!-- first we will write the variables name and then write the name which isgiven in the  database table -->
    <!-- the first one is the one which is written in compact and the next one is variable -->
    <!-- foreach is used for loop -->
       @foreach($types as $type)
    <tr>
        <th > {{$type->id}}</th>
        <th>{{$type->hentype}}</th>

        @endforeach
        </tbody>
</table>

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Egg Id </th>
        <th scope="col">Egg Type</th>
        
    </tr>
    </thead>
    <tbody>
<!-- first we will write the variables name and then write the name which isgiven in the  database table -->
    <!-- the first one is the one which is written in compact and the next one is variable -->
    <!-- foreach is used for loop -->
       @foreach($eggtypes as $eggtype)
    <tr>
        <th > {{$eggtype->id}}</th>
        <th>{{$eggtype->eggtype}}</th>

        @endforeach
        </tbody>
</table>
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