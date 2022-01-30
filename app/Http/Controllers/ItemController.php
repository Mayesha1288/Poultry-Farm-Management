<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Itemtype;
use Illuminate\Http\Request;
use App\Models\Stock;

class ItemController extends Controller
{
    public function item()
    {
        $key = request()->search;
        if($key){
            $item=Item::with(['itemType','stock'])
           ->where('name','Like',"%{$key}%")->get();
            return view('admin.pages.itemlist',compact('item'));
        }else{
            $item=Item::with(['itemType','stock'])->get();
            return view('admin.pages.itemlist',compact('item'));
        }
     
    }


    public function itemlist()
    {
        $itemtype=Itemtype::all();
        return view('admin.pages.add_item',compact('itemtype'));
    }
    public function store(Request $request)
   {
  //left side databse name right side form name in link//

    $checkIfExist=Stock::where('stock_item',$request->stock_item)->first();

    $filename = '';

        if ($request->hasFile('image'))
         {
            $file = $request->file('image');
            $filename = date('Ymdhms').'.'.$file->getclientOriginalExtension();
            $file->storeAs('/uploads',$filename);
        }

 $request->validate([
    'name'=>'required',
    'type_id'=>'required',
    'quantity'=>'required|numeric',
    'image'=>'required',
    'description'=>'required',
    'price'=>'required',
    'unit'=>'required'
    ]);
  $item = Item::create([
        'name'=>$request->name,
        'type_id'=>$request->type_id,
        'image'=>$filename,
        'description'=>$request->description,
        'price'=>$request->price,
        'unit'=>$request->unit
    ]);
   
  
    if($checkIfExist)
    {

        $checkIfExist->update([
            'stock_quantity'=>$checkIfExist->stock_quantity+$request->stock_quantity,
        ]);
    }
    else
    {
        Stock::create([
            'stock_quantity'=>$request->quantity,
            'stock_item' => $item->id
        ]);
    }
    
    return redirect()->back()->with('msg','Items added successfully.');
   }


   public function itemDetails($item_id)
   {

//        collection= get(), all()====== read with loop (foreach)
//       object= first(), find(), findOrFail(),======direct
     $items=Item::with('stock')->find($item_id);
    //  dd($items);
       return view('admin.pages.itemdetails',compact('items'));
   }

   public function itemDelete($item_id)
   {
      Item::find($item_id)->delete();
      return redirect()->back()->with('msg','Item Deleted.');

   } 


   public function itemEdit($id)
    {
        $itemtype=Itemtype::all();
        $items=Item::find($id);
        if($items)
        {
            return view('admin.pages.edit_item',compact('items','itemtype'));
        }

   }

   public function itemUpdate(Request $request,$id)
   {
       $items=Item::find($id);
    //    dd($items);

       $filename = $items->image;
//    dd($filename());
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $filename = date('Ymdhms').'.'.$file->getclientOriginalExtension();
            $file->storeAs('/uploads',$filename);
        }
       $checkIfExist=Stock::where('stock_item',$items->id)->first();
        
       //dd($checkIfExist);
       $items->update([
           // field name from db || field name from form
           'name'=>$request->name,
           'type_id'=>$request->type_id,
           'image'=>$filename,
           'description'=>$request->description,
           'price'=>$request->price,
           'unit'=>$request->unit,

       ]);
       return redirect()->route('admin.item')->with('msg','Item Updated Successfully.');
   }



}
