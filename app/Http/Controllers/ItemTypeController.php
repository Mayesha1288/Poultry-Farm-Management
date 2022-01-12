<?php

namespace App\Http\Controllers;
use App\Models\Itemtype;
use Illuminate\Http\Request;

class ItemTypeController extends Controller
{
    public function itemtype()
    {
        // $key = request()->search;
        // if($key){
        // $itemtype = Itemtype::whereLike(['name','id'], $key)->get();
        // }
        $itemtype=Itemtype::all();
        return view('admin.pages.itemtype',compact('itemtype'));
    }

    public function typelist()
    {
        return view('admin.pages.add_itemtype');
    }
    public function store(Request $request)
   {
    //    dd($request->all());
    //   the name which is written in the databaase table then the name written in the form
    Itemtype::create([
        'name'=>$request->name,
        'status'=>$request->status,

    ]);
    return redirect()->back()->with('msg','Types Inserted  successfully.');
   }
  
}