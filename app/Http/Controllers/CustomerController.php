<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customer()
    {
        $key = request()->search;
        if($key){
            $customer=Customer::where('customer_name','Like',"%{$key}%")->get();
            return view('admin.pages.customer',compact('customer'));
        }else{
        $customer=Customer::all();
        return view('admin.pages.customer',compact('customer'));
     }
    }
    public function createcustomer(){
        return view('admin.pages.create-customer');
    }

    public function store(Request $request)
   {
    //   dd($request->all());
    //   the name which is written in the databaase table then the name written in the form

    $request->validate([
        'name'=>'required',
        'address'=>'required',
        'number'=>'required|min:11|max:11|unique:customers,phone_number',
        'customer_description'=>'required',
    ]);
    Customer::create([
        'customer_name'=>$request->name,
        'address'=>$request->address,
        'phone_number'=>$request->number,
        'customer_description'=>$request->customer_description,
        

    ]);
    return redirect()->back()->with('msg','Customer Inserted  successfully.');
}

public function customerDetails($customer_id)
    {
 
 //        collection= get(), all()====== read with loop (foreach)
 //       object= first(), find(), findOrFail(),======direct
      $customer=Customer::find($customer_id);
 
        return view('admin.pages.customerdetails',compact('customer'));
    }
    public function customerDelete($customer_id)
    {
       Customer::find($customer_id)->delete();
       return redirect()->back()->with('msg','Customer Deleted.');

    } 



    public function customerEdit($id)
    {

        $customer=Customer::find($id);

if($customer)
{
        return view('admin.pages.edit-customer',compact('customer'));
}

    }

    public function customerUpdate(Request $request,$id)
    {


        $customer=Customer::find($id);
        $customer->update([
            // field name from db || field name from form
        'customer_name'=>$request->name,
        'address'=>$request->address,
        'phone_number'=>$request->number,
        'customer_description'=>$request->customer_description,

        ]);
        return redirect()->route('admin.customer')->with('msg','Customer Updated Successfully.');
    }

   
}
