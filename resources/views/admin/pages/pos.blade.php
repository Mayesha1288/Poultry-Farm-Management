@extends ('admin.welcome')

@section('contents')
<center>
<h2> Point of Sale</h2>
<center>

<style>

Edit in JSFiddle
Result
HTML
CSS
Resources
.demo
{
	padding: 50px 0;
}
.heading-title
{
	margin-bottom: 50px;
}

.pricingTable{
    border: 2px solid #e3e3e3;
    text-align: center;
    position: relative;
    padding-bottom: 40px;
    transform: translateZ(0px);
}

.pricingTable:before,
.pricingTable:after{
    content: "";
    position: absolute;
    top: -2px;
    left: -2px;
    bottom: -2px;
    right: -2px;
    z-index: -1;
    transition: all 0.5s ease 0s;
}

.pricingTable:before{
    border-right: 2px solid #08c6aa;
    border-left: 2px solid #08c6aa;
    transform: scaleY(0);
    transform-origin: 100% 0 0;
}

.pricingTable:after{
    border-bottom: 2px solid #08c6aa;
    border-top: 2px solid #08c6aa;
    transform: scaleX(0);
    transform-origin: 0 100% 0;
}

.pricingTable:hover:before{
    transform: scaleY(1);
}

.pricingTable:hover:after{
    transform: scaleX(1);
}

.pricingTable .pricingTable-header{
    background: #08c6aa;
    color: #fff;
    margin: -2px -2px 35px;
    padding: 40px 0;
}

.pricingTable .heading{
    font-size: 30px;
    font-weight: 600;
    margin: 0 0 5px 0;
}

.pricingTable .subtitle{
    font-size: 14px;
    display: block;
}

.pricingTable .price-value{
    font-size: 72px;
    font-weight: 600;
    margin-top: 10px;
    position: relative;
    display: inline-block;
}

.pricingTable .currency{
    font-size: 45px;
    font-weight: normal;
    position: absolute;
    top: 2px;
    left: -30px;
}

.pricingTable .month{
    font-size: 20px;
    position: absolute;
    bottom: 17px;
    right: -40px;
}

.pricingTable .pricing-content{
    list-style: none;
    padding: 0;
    margin-bottom: 30px;
}

.pricingTable .pricing-content li{
    font-size: 16px;
    color: #7a7e82;
    line-height: 40px;
}

.pricingTable .read{
    display: inline-block;
    border: 2px solid #7a7e82;
    border-right: none;
    font-size: 14px;
    font-weight: 700;
    color: #7a7e82;
    padding: 9px 30px;
    position: relative;
    text-transform: uppercase;
    transition: all 0.3s ease 0s;
}

.pricingTable .read:hover{
    border-color: #08c6aa;
    color: #08c6aa;
}

.pricingTable .read i{
    font-size: 19px;
    margin-top: -10px;
    position: absolute;
    top: 50%;
    right: 15px;
    transition: all 0.3s ease 0s;
}

.pricingTable .read:hover i{
    right: 5px;
}

.pricingTable .read:before,
.pricingTable .read:after{
    content: "";
    display: block;
    height: 30px;
    border-left: 2px solid #7a7e82;
    position: absolute;
    right: -11px;
    transition: all 0.3s ease 0s;
}

.pricingTable .read:before{
    bottom: -6px;
    transform: rotate(45deg);
}

.pricingTable .read:after{
    top: -6px;
    transform: rotate(-45deg);
}

.pricingTable .read:hover:before,
.pricingTable .read:hover:after{
    border-left-color: #08c6aa;
}

@media screen and (max-width: 990px){
    .pricingTable{ margin-bottom: 25px; }
}

/* Credit to http://labs.bootstrapthemes.co/demo/Resource/PricingTableStyleDemo38/ */
</style>

<div class="row">
    <div class="col-lg-4">
     POS
        <div class="panel">
          <h4 class="text-info">Customer</h4>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
           Add
           </button>
          </h4>
            <select class="form-control">
              <option>Select Customer</option>
              @foreach($customer as $customers)
        
              <option value="{{$customers->id}}">{{$customers->customer_name}} </option>
              @endforeach
            </select>     
        </div>
        
        
    </div>
    <div class="row"style="margin-top: 10px;" >
                <div style="width:50%;">
                    <div class="pricingTable">
                        
                        <ul class="pricing-content">
                            <li  class="text-danger"></li>
                             <table class="table">
                                 <thead>
                                     <tr>
                                         <th>Name</th>
                                         <th>Price</th>

                                         <th>Qty</th>
                                         <th>Sub Total</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                 @if($carts)
                                   @foreach($carts as $key=>$data)
                                     <tr>
                                          <td>{{$data['name']}}</td>
                                          <td>{{$data['price']}}</td>
                                          <td>{{$data['product_qty']}}</td>
                                          <td>{{$data['price'] * $data['product_qty']}}</td>
                                          <td>
                                              <a href="" class="btn btn-info"><i class="material-icons">add_shopping_cart</i></a>
                                        </td>
                                      </tr>
                                    @endforeach
                                    @endif
                                 </tbody>
                             </table>  
                             <a href="{{route('cart.clear')}}" class="btn btn-danger">Clear Cart</a>                          
                        </ul>

                        <div class="pricingTable-header">
                            <p  style="font-size: 19px;">Quantity: 00.00</p>
                            <p  style="font-size: 19px;">Price: 00.00</p>
                            <h3 class="heading">Total : 00.00</h3>
                        </div>
                        <a href="#" class="read">Create Invoice<i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
    <div style="width:40%; margin-bottom:30px;">

    <table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Type ID</th>
        <th scope="col">Image</th>
        <th scope="col">Price</th>
        <th scope="col">Unit</th>
        <th scope="col">Action</th>
        <!-- <i class="fas fa-plus"></i>  -->
        
    </tr>
    </thead>
    <tbody>

    @foreach($item as $items)
    <tr>
        
        <th><a href="{{route('cart.add',$items->id)}}" style="font-size: 20px;"> <i class="fas fa-plus"></i></a>
        {{$items->name}}
        </th>
        <th>{{$items->itemType->name}}</th>
        <th>
             <img src="{{url('/uploads/'.$items->image)}}" width="100px" alt=" image">
         </th>
        <th>{{$items->price}}</th>
        <th>{{$items->unit}}</th>
       
        <td>
                        <a class="btn btn-primary" href="{{route('admin.item.details',$items->id)}}">View</a>
                        <!-- <a class="btn btn-primary" href="">Add</a> -->

                      
                    </td>
    </tr>
    @endforeach
  </table>
    </div>
    

    
</div>




<!-- customer add modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-info">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
      <div class="modal-body">
      <body>
    <h2>Add Customer From Here!</h2>
  
  <div>
    <form action="{{route('admin.customer.store')}}" method="POST">
      @csrf
        <div class="form-group">
           <label for="exampleInputPassword1">Customer Name</label>
            <input required name="name" type="text"  class="form-control" id="exampleInputPassword1" placeholder="Customer Name">
        </div>
        <div class="form-group">
         <label for="exampleInputPassword1">Customer Address</label>
         <input  required name="address" type="text" class="form-control" id="exampleInputPassword1" placeholder="Customer Address">
        </div>
        <div class="form-group">
           <label for="exampleInputPassword1">Phone Number</label>
           <input required name="number" type="number" class="form-control" id="exampleInputPassword1" placeholder="Phone Number">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Customer description</label>
            <input  required name="customer_description" type="text" class="form-control" id="exampleInputPassword1" placeholder="">
        </div>
        <br><br>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-primary">Save </button>
    </form>
  </div>
  </body>
      </div>
      
    </div>
  </div>
</div>
</body>
@endsection