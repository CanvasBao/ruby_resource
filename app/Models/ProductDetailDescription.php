<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetailDescription extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable =[
    'product_id',
    'des_id',
    'des_title',
    'des_content',
    'created_at',
    'updated_at'
    ];

   /**
    * get all description of product
    *
    * @var array
    */
    public function getDetailDes($product_id)
    {
        $des_list = $this::where('product_id', $product_id)
                        ->get();
 
        return $des_list;
    }
    
    /**
     * add extend description to product
     *
     * @var array
     */
    public function insertDetailDes($product_id, $detail_des)
    {
            
            $now_at = date("Y-m-d H:i:s");
            $insert_data = [];
            foreach($detail_des as $des){
                $insert_data[] = [
                    'product_id' => $product_id,
                    'des_title' => $des['title'],
                    'des_content' => $des['content'],
                    'created_at' => $now_at,
                    'updated_at' => $now_at
                ];
            }
            $this->insert($insert_data);

    }

    /**
     * update extand descriptions of product 
     *
     * @var array
     */
    public function updateDetailDes($product_id, $detail_des)
    {
        if( isset($detail_des['new_des']) && !empty( $detail_des['new_des'] ) ){
            $new_des = json_decode($detail_des['new_des'], true);
            $this->insertDetailDes($product_id, $new_des);
        }

        unset($detail_des['new_des']);
        if( !empty( $detail_des ) ){

            foreach($detail_des as $des){
                $old_img = $this::where('des_id', $des['id'])->get();
                if(count($old_img) != 1){
                    throw new Exception();
                }

                if(isset($des['is_delete']) && $des['is_delete'] == "on"){
                    $this::where('des_id', $des['id'])->delete();
                }else{
                    $data_update=[
                        'des_title' => $des['title'],
                        'des_content' => $des['content'],
                    ];
                    $this::where('des_id', $des['id'])->update($data_update);
                }
            }
        }

        return true;
    }

    /**
     * delete extend description od product
     *
     * @var array
     */
    public function deleteDetailDes($product_id){
        return $this::where('product_id', $product_id)->delete();
    }
}
