<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Folder;
use App\Models\Imgfile;
use Exception;

class ImagesLibrary extends Model
{
    protected $root_dir = "../public/assets/img";
    protected $root_path = "/assets/img/";
    //
    /**
     * 
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
     * 
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
     * 
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
     * 
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
}
