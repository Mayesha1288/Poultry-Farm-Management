@extends('admin.welcome')


@section('contents')

<div>
    <form>
        <div class="input-group rounded mt-3 mb-2">
            <input type="date" class="form-control rounded" value="{{request()->from_date}}" name="from_date" placeholder="Search" aria-label="Search"
                   aria-describedby="search-addon" />
            <input type="date" class="form-control rounded" value="{{request()->to_date}}" name="to_date" placeholder="Search" aria-label="Search"
                   aria-describedby="search-addon" />
            <span class="input-group-text border-0" id="search-addon">
    <button type="submit">submit</button>
  </span>
        </div>
    </form>
</div>
<div id="PrintTableArea">
    <center>
        <h1>Report</h1>
</center>

@if ($errors->any())
     @foreach ($errors->all() as $error)
         <p class="alert alert-danger">{{$error}}</p>
     @endforeach
 @endif
<body>
 <table id="customers">
  <thead>
    <tr>
      <th>#ID</th>
      <th>Customer Name</th>
      <th>Total</th>
      <th>Paid Amount</th>
      <th>Due</th>
      <th>Return</th>
  
    </tr>  
  </thead>
  @foreach($sales as $sale)
    <tr>
        <th>{{$sale->id}}</th>
        <th>{{optional($sale->customer)->customer_name}}</th>
        <th>{{$sale->total}}</th>
        <th>{{$sale->paid_amount}}</th>
        @php
        $due= $sale->total - $sale->paid_amount;
        @endphp
        @if($due<=0)
        <th>0</th>
        @else
        <th>{{$due}}</th>
        @endif

        @if($due<=0)
        <th>{{$sale->paid_amount - $sale->total}}</th>
        @else
        <th>0</th>
        @endif
      
       
 </tr>
    @endforeach
 </table><br>
 </body>
</div>
@endsection

<script language="javascript">
    function PrintDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

