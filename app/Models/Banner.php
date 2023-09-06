<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UploadPath;

class Banner extends Model
{
    use HasFactory, UploadPath;

	protected $table = 'banners';
	public $imgDir = 'banners';
	public $timestamps = false;
	//
	protected $casts = [
		'id' => 'int',
		'sort_no' => 'int'
	];

	protected $dates = [
		'created_at'
	];

	protected $fillable = [
		'id',
		'image',
		'title',
		'sub_title',
		'sort_no',
		'created_at'
	];

	public function category()
	{
		return $this->belongsTo(Banner::class);
	}

}
