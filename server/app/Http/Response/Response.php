<?php


namespace App\Http\Response;


class Response
{
    private $code;
    private $message;
    private $data;
    private $status;

    /**
     * Response constructor.
     * @param $code
     * @param $message
     * @param $data
     * @param $status
     */
    public function __construct($code, $message, $status,$data = null)
    {
        $this->code = $code;
        $this->message = $message;
        $this->data = $data;
        $this->status = $status;
    }
    public function json(){
        return response([
            'code' => $this->code,
            'message' => $this->message,
            'data' => $this->data,
        ],$this->status);
    }

    /**
     * @param mixed $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }

}
