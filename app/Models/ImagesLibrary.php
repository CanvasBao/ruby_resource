<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Folder;
use App\Models\Imgfile;
use Exception;

class ImagesLibrary extends Model
{
    protected $root_dir = "../public/assets/img";
    protected $root_path = "/assets/img";
    
    /**
     * get all file and folder in folder
     */
    public function getDir($folder_id = '0000')
    {
        try{
            $folder_id = sprintf('%04d', $folder_id);
            $folder_info = (new Folder)->checkExists($folder_id);
            if( $folder_info === false ){
                return false;
            }

            $folder_list = (new Folder)->getFileInFolder($folder_id);

            $file_list = (new Imgfile)->getFileInFolder($folder_id, $folder_info['path']);

            $show_path =  str_replace("/"," > ", "root" . $folder_info['path']);
            
        }catch(Exception $e){
            return false;
        }

        return [$folder_list, $file_list, $show_path, $folder_info['parent_id']];
    }

    /**
     * reister folder record and file record in folder to database, if not registered yet
     */
    public function mergerDirAndDB($folder_id = '0000')
    {          
        try{
            $folder_id = sprintf('%04d', $folder_id);

            $dir_path = $this->getFullpathFolder($folder_id);
            $real_path = $this->root_dir . $dir_path;
            
            $files = array_diff(scandir($real_path), array('.', '..'));
            foreach($files as $file){
                $file_path = $real_path . '/' . $file;
                if(is_dir($file_path)){
                    (new Folder)->createFolder($file, $folder_id);
                }else{
                    (new Imgfile)->createFile($file, $folder_id);
                }

            }          
        }catch(Exception $e){
            return false;
        }
        return true;
    }

    /**
     * get full path folder from root folder
     */
    public function getFullpathFolder($folder_id){
        try{
            $path = (new Folder)->getFullpathFolder($folder_id);        
        }catch(Exception $e){
            return false;
        }

        return $path;
    }

    /**
     * create new folder
     */
    public function createFolder($params){
        try{
            $folder_id = $params['id'];
            $parent_path = (new Folder)->getFullpathFolder($folder_id);

            $folder_name = $params['name'];
            $real_path = $this->root_dir . $parent_path;
            $folder_path = $real_path . '/' . $folder_name;

            $result = (new Folder)->createFolder($folder_name, $folder_id);
            if( ! $result ){
                throw new Exception();
            }

            mkdir($folder_path, 0755);

            if(!is_dir($folder_path)){
                throw new Exception();
            }


        }catch(Exception $e){
            return false;
        }

        return true;
    }


    /**
     * upload file
     */
    public function uploadFile($folder_id, $file_upload)
    {
        try{
            $folder_id = sprintf('%04d', $folder_id);
            $parent_path = (new Folder)->getFullpathFolder($folder_id);
            $real_path = $this->root_dir . $parent_path;

            $id = (new Imgfile())::max('file_id');
            $next_id = (int)$id + 1;

            $insert_data = [];
            $now_at = date("Y-m-d H:i:s");
            foreach($file_upload as $file)
            {
                $name = time().'.'.$file->extension();
                $file->move($real_path.'/', $name);  
                $insert_data[] = [
                    'file_id' => sprintf('%04d', $next_id),
                    'parent_folder_id' => $folder_id,
                    'file_name' => $name,
                    'created_at' => $now_at,
                    'updated_at' => $now_at
                ];
                $next_id++;
            }

            (new Imgfile())->insert($insert_data);

        }catch(Exception $e){
            return false;
        }

        return true;
    }

    
    /**
     * upload Product Avatar and register record to Library
     */
    public function uploadProductAvatarImg($file)
    {
        try{
            //get product folder
            $dir_info = (new Folder)->checkExistsFolderName("product");
            if($dir_info === false){
                throw new Exception("product folder is not exists");
            }
           
            $file_path = (new Imgfile())->uploadOneFile($file, $dir_info);
            if($file_path === false){
                throw new Exception("upload file fail");
            }
        }catch(Exception $e){
            throw $e;
        }

        return  $file_path;
    }

    /**
     * upload Banner image and register record to Library
     */
    public function uploadBannerImg($file){

        try{
            //get product folder
            $dir_info = (new Folder)->checkExistsFolderName("banner");
            if($dir_info === false){
                throw new Exception("banner folder is not exists");
            }

            $file_path = (new Imgfile())->uploadOneFile($file, $dir_info);
            if($file_path === false){
                throw new Exception("upload file fail");
            }
        }catch(Exception $e){
            throw $e;
        }

        return  $file_path;
    }

    /**
     * delete image file from Library
     */
    public function deleteImageFile($params){

        try{
            //get folder
            $dir_info = (new Folder)->checkExists($params['folder_id']);
            if($dir_info === false){
                throw new Exception("folder is not exists");
            }

            $file_ids = explode(",", $params['file_id']);
            $result = (new Imgfile())->deleteFile($file_ids, $dir_info);
            if($result === false){
                throw new Exception("delete file fail");
            }
        }catch(Exception $e){
            $message = $e->getMessage() == "" ? "delete file" :  $e->getMessage() ;
            return $message;
        }

        return "delete success";
    }
}
