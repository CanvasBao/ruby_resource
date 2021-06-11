<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Exception;
use File;
use App\Models\PdImg;
use App\Models\ProductDetailImg;
use App\Models\ProductDetailDescription;

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
        if( !empty($product_info['product_img']) ){
            $product_info['product_img_path'] =  "assets/img/product/" . $product_info['product_img'] ;
        }
        $product_info['img_list'] = (new ProductDetailImg())->getProductImgList($id);

        $product_info['des_list'] = (new ProductDetailDescription)->getDetailDes($id);
        
        return $product_info;
    }
    
    /**
     * get.
     *
     * @var array
     */
    public function createProduct($param)
    {
        try{

            $file_img = $param['img_file'];
            $file_name = $file_img->getClientOriginalName();

            $file_img->move('assets/img/product/', $file_name);

            $file_path = 'assets/img/product/'.$file_name;
            if (!file_exists ($file_path) ){
                throw new Exception("copy file thất bại");
            }

            $this->product_img = $file_name;
            $this->product_name = $param['product_name'];
            $this->product_description = $param['product_description'];
            $this->save();
            $product_id = $this->id;
            if (! $product_id ){
                throw new Exception("Đăng ký product thất bại");
            }
            
            if( isset($param['detail_img']['new']) ){
                $detail_img = $param['detail_img']['new'] ;
                (new ProductDetailImg())->insertProductImg($product_id, $detail_img);
            }
            
            if( isset($param['detail_des']['new_des']) ){
                $detail_des = json_decode($param['detail_des']['new_des'], true);
                (new ProductDetailDescription)->insertDetailDes( $product_id, $detail_des);
            }
        }
        catch(Exception $e){
            throw $e;
        }

        return true;
    }
  
    /**
     * update product.
     *
     * @var array
     */
    public function updateProduct($param)
    {
        try{
            $id = $param['id'];
            $product = $this::where('product_id', $id)->get();
            $data_update = [];

            if( isset($param['img_file']) ){
                if( !empty($product[0]['product_img']) ){
                    $old_file_path = 'assets/img/product/'.$product[0]['product_img'];
                    if ( file_exists($old_file_path) ){
                        unlink($old_file_path);
                    }
                }

                $file_img = $param['img_file'];
                $file_name = $file_img->getClientOriginalName();
                $data_update["product_img"] = $file_name;
    
                $file_img->move('assets/img/product/', $file_name);
    
                $file_path = 'assets/img/product/'.$file_name;
                if ( !file_exists($file_path) ){
                    throw new Exception("copy file thất bại");
                }
            }

            if( isset($param['detail_img']) ){
                (new ProductDetailImg())->updateProductImg( $id, $param['detail_img']);
            }

            if( isset($param['detail_des']) ){
                (new ProductDetailDescription)->updateDetailDes( $id, $param['detail_des']);
            }
            
            $data_update["product_name"] = $param['product_name'];
            $data_update["product_description"] = $param['product_description'];
            
            $this::where('product_id', $id)->update($data_update);
            
        }
        catch(Exception $e){
            throw $e;
        }

        return true;
    }

    /**
     * delete product
     *
     * @var array
     */
    public function deleteProduct($id)
    {
        try{
            $product = $this::where('product_id', $id)->get();
            if(count($product) != 1){
                throw new Exception();
            }
            
            $file_path = 'assets/img/product/'.$product[0]['product_img'];
            
            $result = $this::where('product_id', $product[0]['product_id'])->delete();
            if($result != 1)
            {
                throw new Exception();
            }

            (new ProductDetailImg())->deleteProductImg( $product[0]['product_id']);

            (new ProductDetailDescription)->deleteDetailDes( $product[0]['product_id']);
            
            if (file_exists ($file_path) ){
                $result = unlink($file_path);
                if(!$result){
                    throw new Exception();
                }
            }

            
        }
        catch(Exception $e){
            return false;
        }

        return true;
    }

}
