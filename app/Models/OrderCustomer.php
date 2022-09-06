<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use App\Models\Product;

class OrderCustomer extends Model
{
	protected $table = 'order_product';
	public $timestamps = false;

	protected $casts = [
		'order_id' => 'int',
		'user_id' => 'int'
	];

	protected $dates = [
		'create_at'
	];
    
    protected $fillable = [
        'id',
        'order_id',
		'user_id',
		'first_name',
		'last_name',
		'first_name_kana',
		'last_name_kana',
		'postal_code',
		'address_1',
		'address_2',
		'tel',
		'email',
		'birthday',
		'create_at'
    ];

	public function user(){
		return $this->hasOne(User::class, 'id', 'user_id');
	}
}
