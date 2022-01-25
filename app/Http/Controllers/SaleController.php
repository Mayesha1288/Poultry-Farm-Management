<?php

namespace App\Http\Controllers;
use App\Models\Sale;
use App\Models\Item;
use App\Models\Customer;
use App\Models\Saledetail;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function salelist()
    {
         $sale = Item::all();
         $sales = Sale::with('customer')->orderBy('id','desc')->get();
    //    dd($sale);
        return view('admin.pages.salelist',compact('sale','sales'));
    }



    public function addsale()
     {
        $items = Item::all();
        return view('admin.pages.salelist',compact('items'));
     }
     public function store(Request $request)
     {
    //  dd($request->all());
      //   the name which is written in the databaase table then the name written in the form
     $sale = Sale::create([
        'customer_name'=>$request->customer_name,
        'total'=>$request->total,
        'paid_amount'=>$request->paid_amount,   
    ]);

      foreach(session()->get('cart') as $data)
      {
     
      Saledetail::create([
            'sale_id'=>$sale->id,
            'item_id'=>$data['item_id'],
            'paid_amount'=>$sale->paid_amount,
            'total_price'=>$sale->total,
            'quantity'=>$data['product_qty'],
        ]);
      }

    if($sale){
      session()->forget('cart');
    }
    return redirect()->back()->with('msg','Sales Inserted  successfully.');
     }



     public function saleDetails($sale_id)
    { 
      
 
      $sale=Sale::with('saleDetails')->find($sale_id);
      // dd($sale);
      $customer_id=$sale->customer_name;
      $customer=Customer::find($customer_id);
      // dd($customer);
      return view('admin.pages.saledetails',compact('sale','customer'));
    }
}
