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
<table class="table table-hover">
  <thead>
    <tr>
    <th scope="col"> Sale ID</th>
    <th scope="col"> Item ID</th>
    <th scope="col">Total Price</th>
    <th scope="col">Paid Amount</th>
    <th scope="col">Quantity</th>
    </tr>
</thead>
  <tbody>
          
    <tr>
        <td>{{$sale->id}}</td>
        <td>{{$sale->item_id}}</td>
         <td>{{$sale->total}}</td>
        <td>{{$sale->paid_amount}}</td>
        <td>{{$sale->quantity}}</td>
        
       
 </tr>
 </tbody>
</table>
<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 body-main">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4"> <img class="img" alt="Invoce Template" src="http://pngimg.com/uploads/shopping_cart/shopping_cart_PNG59.png" /> </div>
                        <div class="col-md-8 text-right">
                            <h4 style="color: #F81D2D;"><strong>Invoice </strong></h4>
                            
                            <h5 class="user-name">Name:{{$customer->customer_name}}</h5>
                            <h6 class="user-name">Phone-number:{{$customer->phone_number}}</h6>
                            <h6 class="user-name">Address:{{$customer->address}}</h6>
                            

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
                                        <h5>Amount</h5>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-md-9">Samsung Galaxy 8 64 GB</td>
                                    <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i> 50,000 </td>
                                </tr>
                                <tr>
                                    <td class="col-md-9">JBL Bluetooth Speaker</td>
                                    <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i> 5,200 </td>
                                </tr>
                                <tr>
                                    <td class="col-md-9">Apple Iphone 6s 16GB</td>
                                    <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i> 25,000 </td>
                                </tr>
                                <tr>
                                    <td class="col-md-9">MI Smartwatch 2</td>
                                    <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i> 2,200 </td>
                                </tr>
                                <tr>
                                    <td class="text-right">
                                        <p> <strong>Total Amount: </strong> </p>
                                        <p> <strong>Paid Amount: </strong> </p>
                                        <p> <strong>Return: </strong> </p>
                                        <p> <strong>Due: </strong> </p>
                                    </td>
                                    <td>
                                        <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> 500 </strong> </p>
                                        <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> 82,900</strong> </p>
                                        <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> 3,000 </strong> </p>
                                        <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> 79,900</strong> </p>
                                    </td>
                                </tr>
                                <tr style="color: #F81D2D;">
                                    <td class="text-right">
                                        <h4><strong>Total:</strong></h4>
                                    </td>
                                    <td class="text-left">
                                        <h4><strong><i class="fas fa-rupee-sign" area-hidden="true"></i> 79,900 </strong></h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <div class="col-md-12">
                            <p><b>Date :</b> 6 June 2019</p> <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection