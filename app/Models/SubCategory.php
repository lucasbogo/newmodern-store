<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'subcategory_name_en',
        'subcategory_name_pt',
        'subcategory_slug_en',
        'subcategory_slug_pt',

    ];

    /* Relacionamento categoria com sub-categoria, necessário para mostrar 
       nome categoria na tabela subcategoria */
    public function category()
    {
        // fk_category_id pertence à table subcategory; 
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
