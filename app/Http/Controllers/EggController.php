<?php

namespace App\Http\Controllers;


use App\Models\Egg;
use App\Models\Eggtype;
use Illuminate\Http\Request;

class EggController extends Controller
{
    public function egglist()
    {
        $key = request()->search;
        if($key){
            $eggs = Egg::with('eggType')->whereLike(['eggType.eggtype','price'], $key)->get();
            return view ('admin.pages.egg-list',compact('eggs'));
        }
      
        $eggs=Egg::with('eggType')->get();
        return view ('admin.pages.egg-list',compact('eggs'));
    }
    public function createegglist()
    {
        $egg=Eggtype::all();
        // dd($egg);
        return view('admin.pages.create-egglist',compact('egg'));
    }
    public function store(Request $request){
        // dd($request->all());

        $filename = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = date('Ymdhms').'.'.$file->getclientOriginalExtension();
            $file->storeAs('/uploads',$filename);
        }

        Egg::create([
            'type'=>$request->egg_type,
            'price'=>$request->egg_price,
            'quantity'=>$request->egg_quantity,
            'image'=>$filename

        ]);
        return redirect()->back()->with('msg','Eggs added successfully.');;
    }

    public function eggDetails($egg_id)
    {
 
 //        collection= get(), all()====== read with loop (foreach)
 //       object= first(), find(), findOrFail(),======direct
      $egg=Egg::find($egg_id);

 //      $product=Product::where('id',$product_id)->first();
        return view('admin.pages.eggdetails',compact('egg'));
    }
 
    public function eggDelete($egg_id)
    {
       Egg::find($egg_id)->delete();
       return redirect()->back()->with('msg','Egg Deleted.');
    }
   

    public function eggEdit($id)
    {
        $egg=Egg::find($id);
        $eggTypes=Eggtype::select('id','eggtype')->get();
        return view('admin.pages.edit-egglist',compact('egg','eggTypes'));
    }

    public function eggUpdate(Request $request,$id)
    {
        $egg=Egg::find($id);
        $filename = $egg->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = date('Ymdhms').'.'.$file->getclientOriginalExtension();
            $file->storeAs('/uploads',$filename);
        }
        $egg->update([
            // field name from db || field name from form
            'type'=>$request->egg_type,
            'price'=>$request->egg_price,
            'quantity'=>$request->egg_quantity,
            'image'=>$filename
        ]);
        return redirect()->route('admin.eggs')->with('msg','Egg  Updated Successfully.');
    }
}
