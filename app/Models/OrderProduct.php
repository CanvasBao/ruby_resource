<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderProduct extends Model
{
	use HasFactory;
	protected $table = 'order_product';
	public $timestamps = false;

	protected $casts = [
		'order_id' => 'int',
		'product_id' => 'int',
		'price' => 'int',
        'quantity' => 'int'
	];

	protected $dates = [
		'create_at'
	];
    
    protected $fillable = [
        'order_id',
        'product_id',
		'price',
        'quantity',
		'create_at'
    ];

	public function images(){
		return $this->hasMany(ProductImage::class, 'product_id', 'product_id')
				->orderBy('created_at', 'desc')
				->orderBy('id', 'desc');
	}

	public function product(){
		return $this->hasOne(Product::class, 'id', 'product_id');
	}
}
