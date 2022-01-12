<?php

namespace App\Http\Controllers;
use App\Models\Sale;
use App\Models\Item;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function salelist()
    {
         $sale = Item::all();
         $sales = Sale::all();
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
     // dd($request->all());
      //   the name which is written in the databaase table then the name written in the form
      Sale::create([
          'item_id'=>$request->sale_item,
          'sale_quantity'=>$request->sale_quantity,
  
      ]);
      return redirect()->back()->with('msg','Sales Inserted  successfully.');
     }
}
