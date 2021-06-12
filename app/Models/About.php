<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Exception;
use File;

class About extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =[
        'logo',
        'company_name',
        'description',
        'street_address',
        'area_address',
        'city_address',
        'country_address',
        'longitude',
        'latitude',
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
    
    public function getFillable(){
        $field = array_diff( $this->fillable, ['logo'] );
        return $field;
    }

    /**
     * get about info
     *
     * @var array
     */
    public function getAbout()
    {
        $result = $this::orderBy('id')
                    ->get();
        $about = $result[0];
        if( !empty($about['logo']) ){
            $about['logo_path'] = $about['logo'];
        }

        return $about;
    }
    
    /**
     * get about info for show
     *
     * @var array
     */
    public function getAboutforGuest()
    {
        $about = $this->getAbout();


        $header_arr = explode(" ",$about["company_name"]);
        foreach( $header_arr as $key => $name ){
            if($key % 2 != 0){
                continue;
            }
            $header_arr[$key] = '<span>'.$name.'</span>';
        }
        $about['coname_header'] = implode(' ',$header_arr);

        return $about;
    }
    
    
    /**
     * update about info
     *
     * @var array
     */
    public function updateAbout($param)
    {
        try{
            if(empty($this->fillable)){
                throw new Exception();
            }
            
            $about = $this->getAbout();
            if(empty($about)){
                throw new Exception();
            }
            $id =  $about['id'];
            $data_update = [];
            foreach( $this->fillable as $field ){
                if(!isset($param[$field]) || $param[$field] == $about['field']){
                    continue;
                }
                $data_update[$field] = $param[$field];
            }
            
            if(isset($param['logo-img'])){
                $root = [
                    'id' => '0000',
                    'path' => ''
                ];
                $file_path = (new Imgfile())->uploadOneFile($param['logo-img'], $root);

                $data_update['logo'] = $file_path;
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
