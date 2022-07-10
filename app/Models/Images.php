<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Images extends Model
{
    use HasFactory;

    protected $guarded = [];


    /* Relacionamento produto com imagens, necessário para mostrar 
       as imagens específicas dos produtos*/
       public function product()
       {
           // fk_product_id pertence/combina com  à id images na table images; 
           return $this->belongsTo(Product::class, 'product_id', 'id');
       }
}
