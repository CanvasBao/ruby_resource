<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController as AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\About;
use Exception;
use Session;

class AboutController extends AdminController
{

    public  $sub_name = 'About';
    protected $model;

    public function __construct()
    {
        $this->model = new About();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = $this->model->getAbout();
        return view('admin.about.index',[
            'sub_name' => $this->sub_name,
            'about' => $about
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = [
            'status' => true,
            'message' => ''
        ];

        try{
            $field = $this->model->getFillable();
            
            $input = $request->only($field);
            $param = $input;
            
            if($request->hasfile('logo-img')){
                $file_img = $request->file('logo-img');
                $param['logo-img'] = $file_img;
            }
            $result_exc = $this->model->updateAbout($param);
    
            if(!$result_exc){
                throw new Exception();
            } 
        }catch(Exception $e){
            $result = [
                'status' => false,
                'message' => 'insert fail'
            ];
        }
        return response()->json($result);
    }

}
