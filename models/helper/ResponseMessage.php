<?php

include_once dirname(__DIR__, 1) . '/helper/BaseModel.php';

class ResponseMessage implements BaseModel {
    public static $API_HTTP_CODE = "httpCode";
    public static $API_MESSAGE = "message";
    public static $API_EXTRA_ERROR_CODE = "errorCode";

    private $httpCode;
    private $message;
    private $errorCode;

    public function __construct($httpCode = null, $message = null, $errorCode = null)
    {
        $this->httpCode = $httpCode;
        $this->message = $message;
        $this->errorCode = $errorCode;
    }

    public function setHttpCode($httpCode) {
        $this->httpCode = $httpCode;
    }

    public function getHttpCode() {
        return $this->httpCode;
    }

    public function toAssocArray() {
        return array(
            ResponseMessage::$API_HTTP_CODE => $this->httpCode,
            ResponseMessage::$API_MESSAGE => $this->message,
            ResponseMessage::$API_EXTRA_ERROR_CODE => $this->errorCode
        );
    }

    public function encodeToJson()
    {
        return json_encode($this->toAssocArray());
    }

    public function decodeFromJson($jsonData)
    { 
        $assocArray = json_decode($jsonData);
        $object = new ResponseMessage(
            $assocArray[ResponseMessage::$API_HTTP_CODE],
            $assocArray[ResponseMessage::$API_MESSAGE],
            $assocArray[ResponseMessage::$API_EXTRA_ERROR_CODE]
        );
        return $object;
    }

    public function toString()
    { 
        echo "Response Message :: ";
    }
}

?>