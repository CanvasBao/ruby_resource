<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Exception;
use File;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =[
        'conpany_name',
        'street_address',
        'area_address',
        'city_address',
        'country_address',
        'phone',
        'email',
        'facebook',
        'zalo'
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at', 'created_at'
    ];

class About extends Model
{
    /**
     * get.
     *
     * @var array
     */
    public function getAbout()
    {
        $result = $this::orderBy('id')
                    ->get();
        $about = $result[0];

        return $about;
    }
    
    /**
     * get.
     *
     * @var array
     */
    public function updateAbout($param)
    {
        try{
            if(empty($this->fillable)){
                throw new Exception();
            }
            
            $about = $this::orderBy('id')->get();
            if(empty($about)){
                throw new Exception();
            }
            $id =  $about[0]['id'];
            
            $data_update = [];
            foreach( $this->fillable as $field ){
                if(!isset($param[$field])){
                    continue;
                }
                $data_update[$field] = $param[$field];
            }

            $this::where('id', $id)
              ->update($data_update);
            
        }
        catch(Exception $e){
            return false;
        }

        return true;
    }
}
