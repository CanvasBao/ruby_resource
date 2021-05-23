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
        'decription',
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
     * get.
     *
     * @var array
     */
    public function getAbout()
    {
        $result = $this::orderBy('id')
                    ->get();
        $about = $result[0];
        if( !empty($about['logo']) ){
            $about['logo_path'] = 'assets/img/'.$about['logo'];
        }

        return $about;
    }
    
    /**
     * get.
     *
     * @var array
     */
    public function getAboutforGuest()
    {
        $about = $this->getAbout();
        $about["company_name_array"] = explode(" ",$about["company_name"]);

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

                if( !empty($about['logo']) ){
                    $old_logo_path = 'assets/img/'.$about['logo'];
                    if( file_exists($old_logo_path) ){
                        unlink($old_logo_path);
                    }
                }

                $logo_img = $param['logo-img'];
                $logo_name = "logo.".$logo_img->extension();
                $logo_img->move('assets/img/', $logo_name);

                $new_logo_path = 'assets/img/'.$logo_name;
                if (!file_exists ($new_logo_path) ){
                    throw new Exception();
                }

                $data_update['logo'] = $logo_name;
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
