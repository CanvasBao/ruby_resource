<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    
    protected $root_path = "/assets/img/";
    //

    /**
     * get.
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
     * create
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
}
