<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Exception;

class Folder extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =[
        'folder_id',
        'parent_folder_id',
        'folder_name',
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at', 'created_at'
    ];
     
    protected $root_dir = "../public/assets/img";

    /**
     * get.
     *
     * @var array
     */
    public function checkExists($folder_id = "0000")
    {
        try{
            if($folder_id == "0000"){
                return [
                    'id' => $folder_id,
                    'parent_id' => $folder_id,
                    'name' => 'root',
                    'path' => ''
                ];
            }

            $info = $this::select(DB::raw('getfullpath (folder_id) as path, parent_folder_id as parent_id, folder_id as id, folder_name as name'))
                            ->where('folder_id', $folder_id)
                            ->first();

            if( empty($info) ){
                throw new Exception();
            }

            if( !is_dir($this->root_dir . $info['path']) ){
                throw new Exception();
            }
        }catch(Exception $e){
            return false;
        }

        return $info;
    }

    /**
     * get.
     *
     * @var array
     */
    public function getFileInFolder($folder_id)
    {
        $folder_path = "/assets/img/folder.jpg";
        $file_list = $this::select(DB::raw('"'. $folder_path .'" as icon_path, folder_id as id, folder_name as name'))
                        ->where('parent_folder_id', $folder_id)
                        ->get();

        return $file_list;
    }

    /**
     * create
     */
    public function createFolder($name, $parent_id = '0000')
    {
        $is_exists = $this::where('parent_folder_id', $parent_id)
                            ->where('folder_name', $name)
                            ->exists();
        
        if($is_exists){
            return true;
        }

        $id = $this::max('folder_id');
        if(isset($id)){
            $next_id = (int)$id + 1;
        }else{
            $next_id = 1;
        }
        $folder_id = sprintf('%04d', $next_id);

        $this->folder_id = $folder_id;
        $this->parent_folder_id = $parent_id;
        $this->folder_name = $name;
        $this->save();

        return true;
    }

    
    public function getFullpathFolder($folder_id){
        $path = DB::select(DB::raw("select getfullpath ( ? ) as path"), [$folder_id]);
        if(empty($path[0]->path))
        { 
            return false; 
        }
        return $path[0]->path;
    }
}
