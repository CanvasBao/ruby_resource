<?php

namespace App\Traits;

use Illuminate\Support\MessageBag;

trait ResponseTrait
{

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    protected function registeredResponse($data = [], $message = 'registered')
    {
        return $this->successResponse($data, $message, 201);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    protected function successResponse($result = [], $message = 'success', $code = 200)
    {
        if(!empty($result)){
            $response = $result;
        }else{
            $response = [
                'success' => true,
                'message' => $message,
            ];
        }

        return response()->json($response, $code);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    protected function errorResponse($error = [], $message = 'fail', $code = 404)
    {
        $response = [
            'message' => $message,
        ];

        if ($error instanceof \Exception) {
            if ($error->getCode() === 3000) {
                $response['error'] = array(
                        'text' => $error->getMessage(), 'type' => 'original'
                    );
            }else{
                \Log::error($error);
            }
        }
        elseif ($error instanceof MessageBag) {
            $response['error'] = $error;
        }
        elseif (is_array($error) && !empty($error)){
            $response['error'] = $error;
        }

        return response()->json($response, $code);
    }

    /**
     * return error response is not exist.
     *
     * @return \Illuminate\Http\Response
     */
    protected function notExist(String $name = 'recorder')
    {
        $message = `{$name} does not exist`;
        return $this->errorResponse([], $message, 404);
    }

    /**
     * return error response is not exist.
     *
     * @return \Illuminate\Http\Response
     */
    protected function validateError(MessageBag $error)
    {
        return $this->errorResponse($error, 'check input error', 403);
    }
}
