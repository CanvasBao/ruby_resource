<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\OrderProduct;
use App\Models\Coupon;
use App\Models\MstOrderStatus;
use App\Models\OrderCustomer;

class Order extends Model
{
	use SoftDeletes, HasFactory;
	const DELETED_AT = 'deleted_at';
	protected $table = 'order';
	public $timestamps = true;

	protected $casts = [
		'id' => 'int',
		'cart_id' => 'int'
	];

	protected $dates = [
        'receipt_date',
		'payment_date',
        'receipt_datetime',
        'created_at',
		'deleted_at'
	];
    
    protected $fillable = [
		'id',
        'tax',
        'order_status',
        'discount',
        'coupon_id',
        'coupon_code',
        'payment_total',
        'payment_method',
		'payment_date',
		'postage',
        'receipt_date',
        'created_at',
		'deleted_at',
    ];

	public function products(){
		return $this->hasMany(OrderProduct::class, 'order_id')
				->orderBy('created_at', 'desc')
				->orderBy('id', 'desc');
	}

	public function coupon(){
		return $this->hasOne(Coupon::class, 'id', 'coupon_id');
	}

	public function status(){
		return $this->hasOne(MstOrderStatus::class, 'id', 'order_status');
	}

	public function customer(){
		return $this->hasOne(OrderCustomer::class, 'order_id');
	}
}
