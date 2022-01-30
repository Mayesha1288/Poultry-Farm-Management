<?php

namespace App\Http\Controllers;
use App\Models\Sale;


use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report(Request $request){

        $sales = [];
        if($request->has('from_date'))
      {
        $request->validate([
          'from_date' => 'required',
          'to_date' => 'required|date|after_or_equal:from_date',
      ]);

      $sales = Sale::whereBetween('created_at',[$request->from_date,$request->to_date])->get();
      return view('admin.pages.report-sales',compact('sales'))->with('error','Please select a validate date');
      //dd($items);
        }
        return view('admin.pages.report-sales',compact('sales'))->with('error','Please select a validate date');
      }


    }
    // return view('admin.layouts.report',compact('items'));







    

