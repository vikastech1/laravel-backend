<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

	protected $fillable = [
		'tittle'
	];
	public function product(){
		return $this->hasOne(Product::class);
	}
}
