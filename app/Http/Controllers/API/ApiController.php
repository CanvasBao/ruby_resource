<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as Controller;
use App\Plugins\Response;
use App\Plugins\CustomHelper;
use Illuminate\Support\MessageBag;
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

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    protected function registered($data = [], $message = 'registered')
    {
        return $this->sendResponse($data, $message, 201);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    protected function sendResponse($result = [], $message = 'success', $code = 200)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, $code);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    protected function sendError($error = [], $message = 'fail', $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $message,
        ];

        if ($error instanceof \Exception) {
            if ($error->getCode() === 3000) {
                $response['data'] = array(
                        'text' => $error->getMessage(), 'type' => 'original'
                    );
            }
        }
        elseif ($error instanceof MessageBag) {
            $response['data'] = $error;
        }
        elseif (is_array($error) && !empty($error)){
            $response['data'] = $error;
        }

        return response()->json($response, $code);
    }
}
