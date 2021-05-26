<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Exception;
use File;
use App\Models\PdImg;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =[
        'product_name',
        'product_description',
        'product_price',
        'product_img',
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
    public function getProducts()
    {
        $products = $this::select(DB::raw('concat("assets/img/product/" , product_img) as product_img, product_description, product_price, product_name, product_id'))
                        ->get();
        
        return $products;
    }

    /**
     * get.
     *
     * @var array
     */
    public function getProductDetail($id)
    {
        $product_info = $this::where('product_id', $id)->first();
        $img_list = (new PdImg())->getProductImgList($id);
        $product_info['img_list'] = $img_list;
        
        return $product_info;
    }
}
