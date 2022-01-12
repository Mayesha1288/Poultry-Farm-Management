<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment()
    {
        $payments=Payment::all();
        return view('admin.pages.payment',compact('payments'));
    }
    public function createpayment(){
        return view('admin.pages.create-payment');
    }

    public function store(Request $request)
   {
    //    dd($request->all());

    Payment::create([
        'customer_name'=>$request->customer_name,
        'phone_number'=>$request->phone_number,
        'item_purchased'=>$request->item_purchased,
        'total_quantity'=>$request->total_quantity,
        'total_kg'=>$request->total_kg,
        'price'=>$request->price,
        'total_price'=>$request->total_price,
        

    ]);
    return redirect()->back()->with('msg','Payment created successfully.');
   }
}
