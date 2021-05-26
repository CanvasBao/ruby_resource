<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\About;

class ContactController extends Controller
{
    private $active = "4";
    private $sub_header = "Liên Hệ";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = (new About())->getAboutforGuest();
        $defaul_assign = ["active" => $this->active, 'about'=> $about, 'sub_header' => $this->sub_header];

        $about['map'] = "http://maps.google.com/maps?q=". $about['longitude'] .",". $about['latitude'] ."&z=19&output=embed";

        $assign = array_merge($defaul_assign, []);
        return view('guest.contact.index', $assign);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return 'OK';
    }
}
