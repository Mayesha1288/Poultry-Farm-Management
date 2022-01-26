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

<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 body-main">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4"> <img class="img" alt="Invoce Template" src="http://pngimg.com/uploads/shopping_cart/shopping_cart_PNG59.png" /> </div>
                        <div class="col-md-8 text-right">
                            <h4 style="color: #F81D2D;"><strong>Invoice </strong></h4>
                            
                            <h5 class="user-name">Name:{{$saledetails->customer->customer_name}}</h5>
                            <h6 class="user-name">Phone-number:{{$saledetails->customer->phone_number}}</h6>
                            <h6 class="user-name">Address:{{$saledetails->customer->address}}</h6>
                            

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





                                <tr>
                                    <td class="text-right">
                                        <p> <strong>Total Amount: </strong> </p>
                                        <p> <strong>Paid Amount: </strong> </p>
                                        <p> <strong>Return: </strong> </p>
                                   
                                    </td>
                                    <td>
                                        <p> <strong>BDT {{$saledetails->total}} </strong> </p>
                                        <p> <strong>BDT {{$saledetails->paid_amount}} </strong> </p>
                                        <p> <strong>BDT {{$saledetails->paid_amount-$saledetails->total}} </strong> </p>
                            
                                    </td>
                                </tr>
                
                            </tbody>
                        </table>
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
@endsection