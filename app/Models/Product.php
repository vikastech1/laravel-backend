<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable =[
        'images',
        'title',
        'sku',
        'price',
        'quantity',
        'description',
        'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class); 
    }
}
