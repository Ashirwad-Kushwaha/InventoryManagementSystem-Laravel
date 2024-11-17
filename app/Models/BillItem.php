<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class BillItem extends Model
{
    //
    use HasFactory;

    protected $fillable = ['bill_id', 'item_id', 'quantity', 'total_price'];

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

}
