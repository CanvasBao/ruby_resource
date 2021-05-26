<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\About;
use App\Models\Product;

class ProductController extends Controller
{
    private $active = "3";
    private $sub_header = "Sản Phẩm";
    private $defaul_assign = [];

    public function __construct (){
        $about = (new About())->getAboutforGuest();
        $this->defaul_assign = [
            'active' => $this->active, 
            'about'=> $about, 
            'sub_header' => $this->sub_header
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = (new Product())->getProducts();

        $assign = array_merge($this->defaul_assign, ['products' => $products]);
        return view('guest.product.index', $assign);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product_info = (new Product())->getProductDetail($id);
        
        $assign = array_merge($this->defaul_assign, ['product_info' => $product_info]);

        return view('guest.product.show', $assign);
    }
}
