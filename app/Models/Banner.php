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
     * create new banner
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

            $file_path = (new ImagesLibrary)->uploadBannerImg($param['img_file']);
            if ($file_path === false){
                throw new Exception("upload file fail");
            }

            $this->order_index = $next_id;
            $this->banner_img = $file_path;
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
     * update banner info
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

                $file_path = (new ImagesLibrary)->uploadBannerImg($param['img_file']);
                if ($file_path === false){
                    throw new Exception("upload file fail");
                }
                $data_update["banner_img"] = $file_path;

            }

            $data_update["banner_title"] = $param['title'];
            $data_update["banner_content"] = $param['content'];

            $this::where('banner_id', $id)
              ->update($data_update);
            
        }
        catch(Exception $e){
            throw $e;
        }

        return true;
    }

    /**
     * get all banner show in home page
     *
     * @var array
     */
    public function getBannersforHome()
    {
        $banner = $this::select(DB::raw('banner_img as img, banner_title as title, banner_content as content'))
                    ->orderBy('order_index')
                    ->get();
        
        if(count($banner) < 1){
            $banner = [['img' => '', 'title' => '', 'content' => '']];
        }
        $banner[0]['active'] = 'active';

        return $banner;
    }

    /**
     * get all folder
     *
     * @var array
     */
    public function getBannersGrid()
    {
        $result = $this::select(DB::raw('banner_id as id, banner_img as img, banner_title as title, banner_content as content'))
                    ->orderBy('order_index')
                    ->get();

        return $result;
    }

    
    /**
     * delete banner
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
            
            $result = $this::where('banner_id', $banner[0]['banner_id'])->delete();
            if($result != 1)
            {
                throw new Exception();
            }
        }
        catch(Exception $e){
            return false;
        }

        return true;
    }
}
