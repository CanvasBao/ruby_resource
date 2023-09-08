<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use App\Models\ProductDescription;
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
		'created_at',
		'updated_at',
		'deleted_at'
	];

	protected $fillable = [
		'id',
		'category_id',
		'code',
		'name',
		'price',
		'short_des',
		'sort_no',
		'created_at',
		'updated_at',
		'deleted_at'
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function category()
	{
		return $this->hasOne(Category::class, 'id', 'category_id');
	}

	public function images()
	{
		return $this->hasMany(ProductImage::class, 'product_id')
			->orderBy('sort_no', 'asc')
			->orderBy('created_at', 'desc');
	}

	public function descriptions()
	{
		return $this->hasMany(ProductDescription::class, 'product_id')
			->orderBy('sort_no', 'asc')
			->orderBy('created_at', 'desc');
	}
}
