<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id', 
        'quantity', 
        'total_price'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
