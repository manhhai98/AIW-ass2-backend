<?php

include_once dirname(__DIR__, 1) . '/helper/ResponseMessage.php';

class ResponseWrapper implements BaseModel{
    public static $API_DATA = "data";
    public static $API_MESSAGE = "message";

    private $data;
    private $message;

    public function __construct($data = null, ResponseMessage $message = null)
    {
        $this->data = $data;
        $this->message = $message;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }

    public function setMessage(ResponseMessage $message) {
        $this->message = $message->toAssocArray();
    }

    public function getMessage() {
        return $this->message;
    }

    public function toAssocArray() {
        return array(
            ResponseWrapper::$API_DATA => $this->data,
            ResponseWrapper::$API_MESSAGE => $this->message
        );
    }

    public function encodeToJson()
    {
        return json_encode($this->toAssocArray());
    }

    public function decodeFromJson($jsonData)
    { 
        $assocArray = json_decode($jsonData);
        $object = new ResponseWrapper(
            $assocArray[ResponseWrapper::$API_DATA],
            $assocArray[ResponseWrapper::$API_MESSAGE]
        );
        return $object;
    }

    public function toString()
    { 
        echo "Response Wrapper :: ";
    }
}

?>