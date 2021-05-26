<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Exception;
use File;

class PdImg extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =[
        'product_id',
        'img_id',
        'img_name',
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at', 'created_at'
    ];
    
    /**
     * get.
     *
     * @var array
     */
    public function getProductImgList($product_id)
    {
        $img_list = $this::select(DB::raw('concat("assets/img/product/" , img_name) as img_name, img_id'))
                        ->where('product_id', $product_id)
                        ->get();

        return $img_list;
    }
}
