<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\UploadPath;

class Category extends Model
{
	use SoftDeletes, HasFactory, UploadPath;
	const DELETED_AT = 'deleted_at';
	public $imgDir = 'category';
	protected $table = 'category';
	public $timestamps = false;
	//
	protected $casts = [
		'id' => 'int',
		'sort_no' => 'int'
	];

	protected $dates = [
		'deleted_at'
	];

	protected $fillable = [
		'id',
		'category_name',
		'category_slug',
		'sort_no',
		'image',
		'title',
		'description',
		'deleted_at'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function products()
	{
		return $this->hasMany(Product::class, 'category_id')
			->orderBy('sort_no', 'asc')
			->orderBy('created_at', 'desc')
			->orderBy('id', 'desc');
	}
}
