<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    /* protected $guarded substitui o fillable, 
     * é um alternativa execlente pois assim elimina
     * a necessidade de ter que digitar ou copiar e colar toda informação
     * declarada na migrations table
     * 
     */
    protected $guarded = [];

    /* Relacionamento wishlist com produto necessário para mostrar 
       o produto adicionado na wishlist na view wishlist*/
    public function product()
    {
        // fk_producty_id pertence à table wishlists; 
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
