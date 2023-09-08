<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as Controller;
use App\Traits\ControllerTraits;
use App\Traits\ResponseTrait;
use Illuminate\Support\MessageBag;
class ApiController extends Controller
{
    use ControllerTraits, ResponseTrait;

    protected $response;

    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
    }

}
