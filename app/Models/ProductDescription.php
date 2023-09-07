<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductDescription extends Model
{

	use HasFactory;

	protected $table = 'product_description';
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
			'title',
			'content'
    ];
	

	public function product()
	{
		return $this->hasOne(Product::class, 'id', 'product_id');
	}
}
