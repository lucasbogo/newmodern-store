<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'subsubcategory_name_en',
        'subsubcategory_name_pt',
        'subsubcategory_slug_en',
        'subsubcategory_slug_pt',

    ];

    /* Relacionamento categoria com sub-categoria, necessário para mostrar 
       nome categoria na tabela subcategoria */
    public function category()
    {
        // fk_category_id pertence à table subcategory; 
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /* Relacionamento sub-categoria com sub-sub-categoria, necessário para mostrar 
       nome categoria na tabela subcategoria */
    public function subcategory()
    {
        // fk_subcategory_id pertence à table subsubcategory; 
        return $this->belongsTo(SubCategory::class, 'subcategory_id', 'id');
    }
}
