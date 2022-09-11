<?php

namespace App\Plugins;

//class definition : Response
class Response
{
    private $data = null;

    /**
     * data response.
     */
    public function data($value)
    {
        $this->data = $value;
        return $this;
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function success($message = 'success', $code = 200)
    {
        return $this->send($message, $code);
    }

    /**
     * success response register update method.
     *
     * @return \Illuminate\Http\Response
     */
    public function registed($message = 'registed')
    {
        return $this->send($message, 201);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function valiError($data)
    {
        $this->data($data);
        return $this->send('Validation error.', 403);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function error($message = 'Error.', $code = 404)
    {
        if ($this->data instanceof \Exception) {
            if ($this->data->getCode() === 3000) {
                $this->data(array(
                    'text' => $this->data->getMessage(), 'type' => 'original'
                ));
            }
        }
        return $this->send($message, $code);
    }

    /**
     * return rollback error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function rollback($message = 'Error.')
    {
        return $this->error($message, 500);
    }

    /**
     * send response.
     *
     * @return \Illuminate\Http\Response
     */
    private function send($message = '', $code = 200)
    {
        $response = [
            'message' => $message
        ];
        if ($this->data !== null) {
            $response['data'] = $this->data;
        }

        return
            response()->json($response, $code);
    }
}
