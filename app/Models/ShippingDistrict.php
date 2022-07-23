<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingDistrict extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function division()
    {
        return $this->belongsTo(ShippingDivision::class, 'shipping_division_id', 'id');
    }
}
