<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $listside = [
            ['active' => 'active', 'img' => 'slide/slideruby-1.jpg', 'title' => 'Welcome to Ruby Lable', 'content' => 'Sự hài lòng của bạn là niềm vui của chúng tôi' ],
            [ 'img' => 'slide/slideruby-2.jpg', 'title' => 'Welcome to Ruby Lable', 'content' => 'Sự hài lòng của bạn là niềm vui của chúng tôi' ],
            [ 'img' => 'slide/slideruby-3.jpg', 'title' => 'Welcome to Ruby Lable', 'content' => 'Sự hài lòng của bạn là niềm vui của chúng tôi' ],
        ];
        return view('guest.home', ["active" => $this->active, 'listside'=> $listside]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}
