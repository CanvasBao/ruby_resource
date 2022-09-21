<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderCustomer extends Model
{
	use HasFactory;
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
			'name',
			'company',
			'address',
			'phone',
			'email',
			'create_at'
    ];

	public function user(){
		return $this->hasOne(User::class, 'id', 'user_id');
	}
}
