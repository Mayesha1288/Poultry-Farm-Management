<?php

namespace App\Http\Controllers;
use App\Models\Itemtype;
use App\Models\Item;
use App\Models\Hen;
use App\Models\Food;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class HenController extends Controller
{
   public function henlist()
   {
       $henlist=Item::where('type_id',1)->get();
       return view('admin.pages.hen-list',compact('henlist'));
   }
   public function createhenlist()
   {
    // dd("ok");
    return view('admin.pages.create-henlist');
   }

   public function store(Request $request)
   {
    //    dd($request->all());
  //left side databse name right side form name in link//

  $filename = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = date('Ymdhms').'.'.$file->getclientOriginalExtension();
            $file->storeAs('/uploads',$filename);
        }

  $request->validate([
    'type'=>'required',
    'weight'=>'required|numeric',
    'price'=>'required|numeric',
    'quantity'=>'required|numeric',
    'description'=>'required'
]);





    Hen::create([
        'type'=>$request->type,
        'weight'=>$request->weight,
        'price'=>$request->price,
        'quantity'=>$request->quantity,
        'description'=>$request->description,
        'image'=>$filename
    ]);
    return redirect()->back()->with('msg','Hens added successfully.');
   }


   public function vaccine()
   {
    $vaccines=Vaccine::all();
    //dd($vaccines);
       return view('admin.pages.henvaccine',compact('vaccines') );
       
   }
   public function createvaccine()
   {
    
    return view('admin.pages.create-vaccine');
    
   }

   public function store2(Request $request)
   {
    //    dd($request->all());
       Vaccine::create([
        'vaccine_name'=> $request->vaccine_name,
        'vaccine_production'=> $request->vaccine_production,
        'vaccine_expiration'=> $request->vaccine_expiration,
        'vaccine_description'=> $request->vaccine_description

       ]); 
       return redirect()->back()->with('msg','Vaccine added successfully.');
   }



   public function food()
   {
    $foods=food::all();
       return view('admin.pages.henfood',compact('foods'));
   }
   public function createfood()
   {
    
    return view('admin.pages.create-food');
    
   }

   public function store3(Request $request)
   {
    //    dd($request->all());
       Food::create([
        'food_name'=> $request->food_name,
        'food_times'=> $request->time,
        'food_hentype'=> $request->type,

       ]); 
       return redirect()->back()->with('msg','Food added successfully.');
   }
   
   public function henDetails($hen_id)
   {

//        collection= get(), all()====== read with loop (foreach)
//       object= first(), find(), findOrFail(),======direct
     $item=Item::find($hen_id);
//      $product=Product::where('id',$product_id)->first();
       return view('admin.pages.hendetails',compact('item'));
   }

   public function henDelete($hen_id)
   {
      Item::find($hen_id)->delete();
      return redirect()->back()->with('success','Hen Deleted.');
   }

   public function henEdit($id)
    {
        $itemtype=Itemtype::all();
        $hen=Item::find($id);
//        $product=Product::where('user_id',$id)->first();

   // dd($record);
       
//        dd($all_categories);
if($hen){


        return view('admin.pages.edit-henlist',compact('hen','itemtype'));
}
}

    public function henUpdate(Request $request,$id)
    {
        $hen=Item::find($id);
        $filename = $hen->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = date('Ymdhms').'.'.$file->getclientOriginalExtension();
            $file->storeAs('/uploads',$filename);
        }
        $hen->update([
            // field name from db || field name from form
            'type'=>$request->type,
            'weight'=>$request->weight,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'description'=>$request->description,
            'image'=>$filename
        ]);
        return redirect()->route('admin.hens')->with('msg','Hen  Updated Successfully.');
    }

    public function henSearch(){
        // dd(request()->all());
        $key = request()->search;
        $hens = Hen::where('type','LIKE',"%{$key}%")->get();
         //dd($record);
        return view('admin.pages.search-hen',compact('hens'));
    }
}

