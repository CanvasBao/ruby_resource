<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController as AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Exception;
use Session;


class ProductController extends AdminController
{
    public  $sub_name = 'Product';
    protected $model;

    public function __construct()
    {
        $this->model = new Product();
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_list = $this->model->getProducts();
        return view('admin.product.index',[
            'sub_name' => $this->sub_name,
            'product_list' => $product_list
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->sub_name = $this->sub_name." > Create";

        return view('admin.product.show',[
            'sub_name' => $this->sub_name
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
            'message' => 'Tạo mới thành công'
        ];

        try{
            $input = $request->only(['product_name', 'product_description', 'detail_img']);

            if(!$request->hasfile('product_img')){
                throw new Exception("Chưa chọn ảnh đại diện");
            }
            $file_img = $request->file('product_img');
    
            $param = $input;
            $param['img_file'] = $file_img;
            $result_exc = $this->model->createProduct($param);

        }catch(Exception $e){
            $message = $e->getMessage() == "" ? "Tạo mới thất bại" :  $e->getMessage() ;
            $result = [
                'status' => false,
                'message' => $message
            ];
        }
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $product = $this->model->getProductDetail($id);
    //     $this->sub_name = $this->sub_name." > Detail";
    //     return view('admin.product.show',[
    //         'sub_name' => $this->sub_name,
    //         'id' => $id,
    //         'product' => $product 
    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->model->getProductDetail($id);
        $this->sub_name = $this->sub_name." > Update";
        return view('admin.product.show',[
            'sub_name' => $this->sub_name,
            'id' => $id,
            'product' => $product 
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
            'message' => 'Đã chỉnh sửa thành công'
        ];

        try{
            $param = $request->only(['product_name', 'product_description', 'detail_img']);
            $param['id'] = $id;

            if($request->hasfile('product_img')){
                $file_img = $request->file('product_img');
                $param['img_file'] = $file_img;
            }

            $result_exc = $this->model->updateProduct($param);

            if(!$result_exc){
                throw new Exception();
            }
        }catch(Exception $e){
            $message = $e->getMessage() == "" ? "Chỉnh sửa thất bại" :  $e->getMessage() ;
            $result = [
                'status' => false,
                'message' => $message
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
            'message' => 'Đã xóa thành công'
        ];

        try{
            $result_exc =$this->model->deleteProduct($id);
                
            if(!$result_exc){
                throw new Exception();
            } 
        }catch(Exception $e){
            $message = $e->getMessage() == "" ? "Xóa thất bại" :  $e->getMessage() ;
            $result = [
                'status' => false,
                'message' => $message
            ];
        }
        return response()->json($result);
    }
}
