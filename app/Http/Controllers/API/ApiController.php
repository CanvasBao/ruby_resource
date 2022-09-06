<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as Controller;
use App\Plugins\Response;
use App\Plugins\CustomHelper;

class ApiController extends Controller
{
    use CustomHelper;

    protected $response;

    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->response = new Response;
    }
}
