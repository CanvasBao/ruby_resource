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
    public function insertProductImg($product_id, $detail_img)
    {
        $now_at = date("Y-m-d H:i:s");
        $insert_data = [];
        foreach($detail_img as $img){
            $insert_data[] = [
                'product_id' => $product_id,
                'img_path' => $img,
                'created_at' => $now_at,
                'updated_at' => $now_at
            ];
        }
        $this->insert($insert_data);
    }

    /**
     * get.
     *
     * @var array
     */
    public function updateProductImg($product_id, $detail_img)
    {
        if( isset($detail_img['new']) && !empty( $detail_img['new'] ) ){
            $this->insertProductImg($detail_img['new']);
        }

        
        if( isset($detail_img['delete_old']) && !empty( $detail_img['delete_old'] ) ){
            $delete_img = $detail_img['delete_old'];
            
            foreach($delete_img as $id){
                $old_img = $this::where('img_id', $id)->get();
                if(count($old_img) != 1){
                    throw new Exception();
                }
                
                $this::where('img_id', $id)->delete();
            }
        }

        return true;
    }

    /**
     * get.
     *
     * @var array
     */
    public function deleteProductImg($product_id){
        $this::where('product_id', $product_id)->delete();
    }
}
