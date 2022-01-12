<?php

namespace App\Http\Controllers;


use App\Models\Type;
use App\Models\Eggtype;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function hentype()
    {
        $eggtypes=Eggtype::all();
        $types=Type::all();
        return view ('admin.pages.type',compact('types','eggtypes'));
    }
    public function createhentype()
    {
        return view('admin.pages.create-hentype');
    }
    public function store(Request $request){
        //  dd($request->all());
    
        
        $request->validate([
            'hentype'=>'required| unique:types,hentype'

        ]);
        Type::create([
            'hentype'=>$request->hentype,
            
            

        ]);
        return redirect()->back()->with('msg','HenTypes added successfully.');;
    }


    public function eggtype()
    {
        //dd($types);
       
        return view ('admin.pages.type');
    }
    public function createeggtype()
    {
        //dd("ok");
        return view('admin.pages.create-eggtype');
    }
    public function store2(Request $request){
        //  dd($request->all());
        $request->validate([
            'eggtype2'=>'required| unique:eggtypes,eggtype'

        ]);

        Eggtype::create([

            'eggtype'=>$request->eggtype2,

        ]);

        return redirect()->back()->with('msg','EggTypes added successfully.');
    }
}
