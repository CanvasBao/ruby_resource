<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Folder;

class Imgfile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =[
        'file_id',
        'parent_folder_id',
        'file_name',
        'created_at',
        'updated_at' 
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
    protected $root_path = "/assets/img";
    protected $root_dir = "../public/assets/img";
    //

    /**
     * get all files in folder
     *
     * @var array
     */
    public function getFileInFolder($folder_id, $folder_path = false)
    {
        $path = $this->root_path . $folder_path;

        $file_list = $this::select(DB::raw('concat("'. $path .'", "/", file_name) as icon_path, file_id as id, file_name as name'))
                        ->where('parent_folder_id', $folder_id)
                        ->get();

        return $file_list;
    }

    /**
     * create new file record
     */
    public function createFile($name, $parent_id = '0000')
    {
        $is_exists = $this::where('parent_folder_id', $parent_id)
                            ->where('file_name', $name)
                            ->exists();
        
        if($is_exists){
            return true;
        }
        
        $id = $this::max('file_id');
        if(isset($id)){
            $next_id = (int)$id + 1;
        }else{
            $next_id = 1;
        }
        $file_id = sprintf('%04d', $next_id);

        $this->file_id = $file_id;
        $this->parent_folder_id = $parent_id;
        $this->file_name = $name;
        $this->save();

        return true;
    }

    
    /**
     * copy and register new image file
     */
    public function uploadOneFile($file, $parent_info)
    {
        try{
            // copy image
            $name = time().'.'.$file->extension();
            $real_path = $this->root_dir . $parent_info['path'];
            $file->move($real_path.'/', $name);   
            
            //get image id
            $id = (new Imgfile())::max('file_id');
            $next_id = (int)$id + 1;

            // register record to Library
            $this->file_id = sprintf('%04d', $next_id);
            $this->parent_folder_id = sprintf('%04d', $parent_info['id']);
            $this->file_name = $name;
            $this->save();

            $file_path = $this->root_path . $parent_info['path'] . '/' . $name;
        }catch(Exception $e){
            return false;
        }
        return $file_path;
    }

    /**
     * delete file 
     */
    public function deleteFile($file_ids, $parent_info){

        if(!is_array($file_ids)){
            $file_ids = [$file_ids];
        }

        foreach($file_ids as $id){
            $file_id = sprintf('%04d', $id);
            $file_info = $this::select(DB::raw('file_id as id, file_name as name'))
                        ->where('file_id', $file_id)
                        ->get();

            if(count($file_info) == 0){
                continue;
            }
            
            $file_path = $this->root_dir . $parent_info['path'] . '/' . $file_info[0]['name'];
            if(file_exists($file_path)){
                unlink($file_path);
            }

            $this::where('file_id', $file_id)->delete();
        }

        return true;
    }
}
