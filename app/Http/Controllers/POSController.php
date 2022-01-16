<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Customer;
use Illuminate\Http\Request;

class POSController extends Controller
{
    public function pos()
    {
       
        $item = Item::all();
        $customer = Customer::all();
        $carts= session()->get('cart');
        // dd($customer);
        return view('admin.pages.pos',compact('item','customer','carts'));
    }
}
