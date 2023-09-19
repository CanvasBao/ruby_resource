<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BestSelling extends Model
{
    use HasFactory;

	protected $table = 'best_selling';
	public $timestamps = false;
	protected $primaryKey = 'product_id';
	//
	protected $casts = [
		'sort_no' => 'int'
	];

	protected $dates = [
		'created_at'
	];

	protected $fillable = [
		'product_id',
		'sort_no'
	];
}
