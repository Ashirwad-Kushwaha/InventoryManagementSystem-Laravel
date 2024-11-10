<?php


use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['name', 'contact_info'];

    // Define the relationship with Item
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
