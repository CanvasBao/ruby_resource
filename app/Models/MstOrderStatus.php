<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;


class MstOrderStatus extends Model
{
    //
	use SoftDeletes;
	const DELETED_AT = 'deleted_at';
	protected $table = 'mst_order_status';

    protected $fillable = [
		'id',
		'status_name',
		'status_color',
		'sort_no',
	];

	public function orders(){
		return $this->hasMany(Order::class, 'order_status')
				->whereNull('deleted_at');
	}
}
