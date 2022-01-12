<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Hen;
// use App\Models\Egg;
// use App\Models\Type;
// use App\Models\Eggtype;
use App\Models\Itemtype;
use App\Models\Item;
use App\Models\Stock;


class StockController extends Controller
{
    public function stocklist()
    {
        $stocks = Stock::all();
        return view('admin.pages.stock-list',compact('stocks'));
    }



    public function addstock()
    {
        $items = Item::all();
        return view('admin.pages.add_stock',compact('items'));
    }




    //stock table database connection start
    public function store(Request $request)
    {

        $checkIfExist=Stock::where('stock_item',$request->stock_item)->first();
  
        if($checkIfExist){
            $checkIfExist->update([
                'stock_quantity'=>$checkIfExist->stock_quantity+$request->stock_quantity,
            ]);
        }else{
          $a =  Stock::create([
                'stock_item'=>$request->stock_item,
                'stock_quantity'=>$request->stock_quantity,
            ]);

        }
           
           return redirect()->route('admin.stock')->with('success','Stock Saved successfully.');
    }


    public function stockDelete($stock_id)
      {
         Stock::find($stock_id)->delete();
         return redirect()->back()->with('success','Stock Deleted.');
      }



    // public function stockDetails($id)
    // {
    //     $category= Type::find($id);
    //     $hens = Hen::where('type',$category->hentype)->get();
    //     return view('admin.pages.stock-details',compact('hens'));
    // }



    // public function eggstockDetails($id)
    // {
    //     $category= Eggtype::find($id);
    //     $eggs = Egg::where('type',$category->id)->get();
    //     return view('admin.pages.egg-stock-details',compact('eggs'));
    // }

}
