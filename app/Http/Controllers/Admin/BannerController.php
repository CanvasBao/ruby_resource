<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController as AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Banner;
use Exception;
use Session;

class BannerController extends AdminController
{
    public  $sub_name = 'Banner';
    protected $model;

    public function __construct()
    {
        $this->model = new Banner();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousel = new Banner();
        $carousel_grid = $carousel->getBannersGrid();
        return view('admin.banner.index',[
            'sub_name' => $this->sub_name,
            'carousel_grid' => $carousel_grid
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $result = [
            'status' => true,
            'message' => ''
        ];

        try{
            $input = $request->only(['title', 'content']);
        
            if(!$request->hasfile('img-file')){
                throw new Exception();
            }
            $file_img = $request->file('img-file');
    
            $param = $input;
            $param['img_file'] = $file_img;
            $result_exc = $this->model->createBanners($param);
    
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
            $input = $request->only(['title', 'content']);
            $param = $input;
            $param['id'] = $id;

            if($request->hasfile('img-file')){
                $file_img = $request->file('img-file');
                $param['img_file'] = $file_img;
            }

            $result_exc = $this->model->updateBanners($param);
    
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = [
            'status' => true,
            'message' => ''
        ];

        try{
            $result_exc =$this->model->deleteBanner($id);
                
            if(!$result_exc){
                throw new Exception();
            } 
        }catch(Exception $e){
            $result = [
                'status' => false,
                'message' => 'delete fail'
            ];
        }
        return response()->json($result);
    }
}
