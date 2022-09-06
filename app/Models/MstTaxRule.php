<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class MstTaxRule extends Model
{
	//
	use SoftDeletes;
	const DELETED_AT = 'deleted_at';
	protected $table = 'mst_tax_rule';
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'tax_rate' => 'int'
	];

	protected $dates = [
		'deleted_at'
	];

	protected $fillable = [
		'tax_rate',
		'apply_date',
		'fraction'
	];

	public function getTaxNow()
	{
		$now = date('Y-m-d');

		return MstTaxRule::where('apply_date', '<=', $now)
			->orderBy('apply_date', 'desc')
			->first();
	}
}
