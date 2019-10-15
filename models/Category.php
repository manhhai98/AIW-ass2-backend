<?php

include_once dirname(__DIR__, 1) . '/models/helper/BaseModel.php';

class Category implements BaseModel
{
    public static $API_TAG_ID = "id";
    public static $API_TAG_NAME = "name";

    private $id;
    private $name;

    public function __construct($name = "")
    {
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function toAssocArray() {
        return array(
            Category::$API_TAG_NAME => $this->name
        );
    }

    public function encodeToJson()
    {
        return json_encode($this->toAssocArray());
    }

    public function decodeFromJson($jsonData)
    { 
        $assocArray = json_decode($jsonData);
        $object = new Category($assocArray[Category::$API_TAG_NAME]);
        return $object;
    }

    public function toString()
    { 
        echo "Object: [Category: id= {$this->getId()}, name= {$this->getName()}]";
    }
}
