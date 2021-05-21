<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Exception;
use File;

class Banner extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =[
        'order_index',
        'banner_img',
        'banner_title',
        'banner_content'
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
    public function createBanners($param)
    {
        try{
            $id=DB::select("SHOW TABLE STATUS LIKE 'Banners'");
            if(empty($id)){
                $next_id = 1;
            }else{
                $next_id=$id[0]->Auto_increment;
            }

            $file_img = $param['img_file'];
            $file_name = "rubybanner-".$next_id.".".$file_img->extension();

            $file_img->move('assets/img/banner/', $file_name);

            $file_path = 'assets/img/banner/'.$file_name;
            if (!file_exists ($file_path) ){
                throw new Exception();
            }

            $this->order_index = $next_id;
            $this->banner_img = $file_name;
            $this->banner_title = $param['title'];
            $this->banner_content = $param['content'];
            $this->save();
            
        }
        catch(Exception $e){
            return false;
        }

        return true;
    }

    /**
     * get.
     *
     * @var array
     */
    public function updateBanners($param)
    {
        try{
            $id = $param['id'];
            $banner = $this::where('banner_id', $id)->get();
            $data_update = [];
            if(isset($param['img_file'])){

                $old_file_path = 'assets/img/banner/'.$banner[0]['banner_img'];
                if (file_exists ($old_file_path) ){
                    unlink($old_file_path);
                }

                $file_img = $param['img_file'];
                $file_name = "rubybanner-".$id.".".$file_img->extension();
                $data_update["banner_img"] = $file_name;
    
                $file_img->move('assets/img/banner/', $file_name);
    
                $file_path = 'assets/img/banner/'.$file_name;
                if (!file_exists ($file_path) ){
                    throw new Exception();
                }
            }

            $data_update["banner_title"] = $param['title'];
            $data_update["banner_content"] = $param['content'];

            $this::where('banner_id', $id)
              ->update($data_update);
            
        }
        catch(Exception $e){
            return false;
        }

        return true;
    }

    /**
     * get.
     *
     * @var array
     */
    public function getBannersforHome()
    {
        $result = $this::select(DB::raw('concat("banner/" , banner_img) as img, banner_title as title, banner_content as content'))
                    ->orderBy('order_index')
                    ->get();
        $result[0]['active'] = 'active';

        return $result;
    }

    /**
     * get.
     *
     * @var array
     */
    public function getBannersGrid()
    {
        $result = $this::select(DB::raw('banner_id as id, concat("assets/img/banner/" , banner_img) as img, banner_title as title, banner_content as content'))
                    ->orderBy('order_index')
                    ->get();

        return $result;
    }

    
    /**
     * get.
     *
     * @var array
     */
    public function deleteBanner($id)
    {
        try{
            $banner = $this::where('banner_id', $id)->get();
            if(count($banner) != 1){
                throw new Exception();
            }
            
            $file_path = 'assets/img/banner/'.$banner[0]['banner_img'];
            
            $result = $this::where('banner_id', $banner[0]['banner_id'])->delete();
            if($result != 1)
            {
                throw new Exception();
            }

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
