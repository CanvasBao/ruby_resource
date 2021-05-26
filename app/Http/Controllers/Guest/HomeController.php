<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\About;

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
        $about = (new About())->getAboutforGuest();
        $defaul_assign = ["active" => $this->active, 'about'=> $about];
        $banner = new Banner();
        $banner_list = $banner->getBannersforHome();

        $assign = array_merge($defaul_assign, ['banner_list'=> $banner_list]);
        return view('guest.home', $assign);
    }
}
