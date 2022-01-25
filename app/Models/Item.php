<?php

namespace App\Models;
use App\Models\Stock;
use App\Models\Itemtype;
use App\Models\Item;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function itemType()
    {
        return $this->belongsTo(Itemtype::class,'type_id','id');
       
    }
    public function stock()
    {
        return $this->belongsTo(Stock::class,'id','stock_item');
    }

    public function item()
    {
        return $this->belongsTo(Item::class,'item_id','id');
    }



}
