<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\About;
use App\Models\Product;

class HomeController extends Controller
{
    private $active = "1";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //
        $about = (new About())->getAboutforGuest();
        //
        $banner_list = (new Banner())->getBannersforHome();
        //
        $products = (new Product())->getProducts();
                
        $assign = [
            "active" => $this->active,
            "about" => $about,
            'banner_list'=> $banner_list,
            'products' => $products
        ];

        return view('guest.home', $assign);
    }
}
