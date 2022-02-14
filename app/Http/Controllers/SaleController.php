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
         $key = request()->search;
      if($key){
        $sale = Item::where('customer_name','Like',"%{$key}%")->get();
        $sales = Sale::with('customer')->orderBy('id','desc')->get();
       return view('admin.pages.salelist',compact('sale','sales'));

      }
      else{
         $sale = Item::all();
         $sales = Sale::with('customer')->orderBy('id','desc')->get();
        return view('admin.pages.salelist',compact('sale','sales'));
      }
    }



    public function addsale()
     {
        $items = Item::all();
        return view('admin.pages.salelist',compact('items'));
     }
     public function store(Request $request)
     {

      $request->validate([
        
        'customer_name'=>'required',
    ]);
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
            'total_price'=>$data['total_price'],
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
      $saledetails = Sale::with('saleDetails','customer')->find($sale_id);
      return view('admin.pages.saledetails',compact('saledetails'));
    }

    
    public function saleDelete($sale_id)
    {
       Sale::find($sale_id)->delete();
       return redirect()->back()->with('msg','Sale Deleted.');

    } 




    public function invoice($sale_id)
    {
      $sale=Sale::find($sale_id);
        return view('admin.pages.invoice',compact('sale'));
    }
}
