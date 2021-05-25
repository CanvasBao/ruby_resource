<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\About;

class AboutUsController extends Controller
{
    private $active = "2";
    private $sub_header = "Giới Thiệu";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = (new About())->getAboutforGuest();
        $defaul_assign = ["active" => $this->active, 'about'=> $about, 'sub_header' => $this->sub_header];

        $assign = array_merge($defaul_assign, []);
        return view('guest.about-us.index', $assign);
    }
}
