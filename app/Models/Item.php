<?php

namespace App\Models;

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
        return $this->belongsTo(Stock::class,'stockquantity','id');
    }
}
