<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Bill extends Model
{

    use HasFactory;

    protected $fillable = ['total_amount'];

    public function billItems()
    {
        return $this->hasMany(BillItem::class);
    }

    //
}
