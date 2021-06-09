<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetailImg extends Model
{    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable =[
       'img_id',
       'product_id',
       'img_path',
       'created_at',
       'updated_at'
   ];

   /**
    * get.
    *
    * @var array
    */
   public function getProductImgList($product_id)
   {
       $img_list = $this::where('product_id', $product_id)
                       ->get();

       return $img_list;
   }
   
    /**
     * get.
     *
     * @var array
     */
    public function updateProductImg($product_id, $detail_img)
    {
        if( !empty( $detail_img['new'] ) ){
            $new_img = $detail_img['new'];
            
            $now_at = date("Y-m-d H:i:s");
            $insert_data = [];
            foreach($new_img as $img){
                 $insert_data[] = [
                    'product_id' => $product_id,
                    'img_path' => $img,
                    'created_at' => $now_at,
                    'updated_at' => $now_at
                ];
            }
            $this->insert($insert_data);
        }

        
        if( !empty( $detail_img['delete_old'] ) ){
            $delete_img = $detail_img['delete_old'];
            
            foreach($delete_img as $id){
                $old_img = $this::where('img_id', $id)->get();
                if(count($old_img) != 1){
                    throw new Exception();
                }
                
                $this::where('img_id', $id)->delete();
           }
        }


        return $img_list;
    }
}
