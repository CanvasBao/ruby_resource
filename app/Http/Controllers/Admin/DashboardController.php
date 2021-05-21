<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController as AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Banner;

use Session;

class DashboardController extends AdminController
{
    public  $sub_name = 'Dashboard';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousel = new Banner();
        $carousel_grid = $carousel->getBannersGrid();
        return view('admin.dashboard.index',[
            'sub_name' => $this->sub_name,
            'carousel_grid' => $carousel_grid
        ]);
    }
}
