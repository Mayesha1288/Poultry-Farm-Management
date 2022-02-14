@extends('admin.welcome')
@section('contents')

<h4>Sale Details</h4>
<style>
 .body-main {
     background: #ffffff;
     border-bottom: 15px solid #1E1F23;
     border-top: 15px solid #1E1F23;
     margin-top: 30px;
     margin-bottom: 30px;
     padding: 40px 30px !important;
     position: relative;
     box-shadow: 0 1px 21px #808080;
     font-size: 10px
 }

 .main thead {
     background: #1E1F23;
     color: #fff
 }

 .img {
     height: 100px
 }

 h1 {
     text-align: center
 }
</style>
<div id="PrintTableArea">
<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 body-main">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4"> <img class="img" alt="Invoce Template" src="http://pngimg.com/uploads/shopping_cart/shopping_cart_PNG59.png" /> </div>
                        <div class="col-md-8 text-right">
                            <h4 style="color: #F81D2D;"><strong>Invoice </strong></h4>
                            
                            <h5 class="user-name">Name:  {{$saledetails->customer->customer_name}}</h5>
                            <h6 class="user-name">Phone-number:  {{$saledetails->customer->phone_number}}</h6>
                            <h6 class="user-name">Address:  {{$saledetails->customer->address}}</h6>
                            

                            <!-- <p>221 ,Baker Street</p>
                            <p>1800-234-124</p>
                            <p>example@gmail.com</p> -->
                        </div>
                    </div>
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <h5>Description</h5>
                                    </th>
                                    <th>
                                        <h5>Price</h5>
                                    </th>
                                    <th>
                                        <h5>Quantity/KG</h5>
                                    </th>
                                    <th>
                                        <h5>Amount</h5>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>


                            @foreach($saledetails->saleDetails as $sale)
                                <tr>
                                    <td class="col-md-9">{{ $sale->item->name}}</td>
                                    <td class="col-md-3">{{ $sale->item->price}}</td>
                                    <td class="col-md-3">{{ $sale->quantity}}</td>

                                    <td class="col-md-3">{{ $sale->total_price}}</td>
                                </tr>
                             
                            @endforeach

                            </tbody>
                        </table>

                        <div style="display:flex; justify-content: space-between;">
                                    <div class="text-right">
                                        <p> <strong>Total Amount: </strong> </p>
                                        <p> <strong>Paid Amount: </strong> </p>
                                        <p> <strong>Return: </strong> </p>
                                   
</div>
                                    <div class="text-left" style="padding-right: 55px;">
                                        <p> <strong>BDT {{$saledetails->total}} </strong> </p>
                                        <p> <strong>BDT {{$saledetails->paid_amount}} </strong> </p>
                                        @php
                                        $due = $saledetails->total - $saledetails->paid_amount
                                        @endphp
                                        @if($due<=0)
                                        <p> <strong>BDT {{$saledetails->paid_amount-$saledetails->total}} </strong> </p>
                                        @else
                                        <p>{{$due}}</p>
                                        <h6 >
                                            You need to give more money .Should return me the amount shown in Return as soon as possible
                                        </h6>
                                        @endif
                            
</div>
</div>
                    </div>
                    <div>
                        <div class="col-md-12">
                            <p><b>Date :</b> {{$saledetails->created_at}}</p> <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
</div>
 <button  class="btn btn-primary" type="button" onClick="PrintDiv('PrintTableArea');" >Print</button>
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