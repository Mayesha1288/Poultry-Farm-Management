<?php

namespace App\Http\Controllers;
use App\Models\Hen;
use App\Models\Egg;
use App\Models\Item;
use App\Models\Stock;
use App\Models\Customer;
use App\Models\Sale;
use App\Models\Vaccine;
use App\Models\Food;
use App\Models\Record;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $count['henlist']=Item::where('type_id',1)->count();
        $count['eggs']=Item::where('type_id',2)->count();
        $count['items']=Item::all()->count();
        $count['stocks']=Stock::all()->count();
        $count['customer']=Customer::all()->count();
        $count['recordlist']=Record::all()->count();
        $count['sales']=Sale::all()->count();
        $count['vaccines']=Vaccine::all()->count();
        $count['foods']=Food::all()->count();
        return view('admin.pages.dashboard',compact('count'));
    }
    public function profile()
    {
        return view('admin.partials.admin-profile');
    }
}
