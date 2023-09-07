<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\UploadPath;

class ProductImage extends Model
{

	use HasFactory, UploadPath;

	protected $table = 'product_image';
	public $imgDir = 'product';
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'product_id' => 'int'
	];

	protected $dates = [
		'create_at'
	];

    protected $fillable = [
			'id',
			'product_id',
			'image',
			'sort_no',
			'create_at'
    ];
	

	public function product()
	{
		return $this->hasOne(Product::class, 'id', 'product_id');
	}
}
