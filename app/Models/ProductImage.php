<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImage extends Model
{

	use HasFactory;

	protected $table = 'product_image';
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
		'create_at'
    ];
}
