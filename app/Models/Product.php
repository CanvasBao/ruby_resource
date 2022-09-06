<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
	use SoftDeletes, HasFactory;
	const DELETED_AT = 'deleted_at';
	protected $table = 'product';
	public $timestamps = false;

	//
	protected $casts = [
		'id' => 'int',
		'price' => 'int',
		'sort_no' => 'int'
	];

	protected $dates = [
		'deleted_at'
	];

	protected $fillable = [
		'id',
		'name',
		'price',
		'description',
		'code',
		'sort_no',
		'created_at',
		'deleted_at'
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function images()
	{
		return $this->hasMany(ProductImage::class, 'product_id')
			->orderBy('created_at', 'desc')
			->orderBy('id', 'desc');
	}
}
