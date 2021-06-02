<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController as AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ImagesLibrary;
use Exception;
use Session;

class ImagesLibraryController extends AdminController
{
    public  $sub_name = 'Thư Viện Hình Ảnh';
    protected $model;

    public function __construct()
    {  
        $this->model = new ImagesLibrary();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        list($folder_list, $file_list) = $this->model->getDir();

        return view('admin.images-library.index',[
            'sub_name' => $this->sub_name,
            'folder_list' => $folder_list,
            'file_list' => $file_list,
            'dir_name' => 'root',
            'dir_path' => 'root'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
        // return $this->model->mergerDirAndDB();

        // $files = $this->model->getDir();

        // return view('admin.images-library.index',[
        //     'sub_name' => $this->sub_name,
        //     'file_list' => $files,
        //     'dir_name' => 'root',
        //     'dir_path' => 'root'
        // ]);
    // }

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
        ];
        try{
            $params = $request->only(['id', 'name']);
            
            if( !$this->model->createFolder($params) )
            {
                throw new Exception();
            }
            
        }catch(Exception $e){
            return false;
            $result['status'] = false;
            
        }

        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        list($folder_list, $file_list, $show_path, $parent_id) = $this->model->getDir($id);
        $result = [
            'status' => true,
            'token' => csrf_token(),
            'folder_list' => $folder_list,
            'file_list' => $file_list,
            'parent_id' => $parent_id,
            'show_path' => $show_path
        ];
        return response()->json($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return $this->model->getFullpathFolder($id);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function merger($id)
    {
        $this->model->mergerDirAndDB($id); 
        $result = [
            'status' => true
        ];
        return response()->json($result);
    }
}