<?php

include_once './config/db-config.php';
include_once './models/helper/ResponseWrapper.php';

class TagRepository {
    public function getAllTags() {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM test");
        $stmt->execute();
        $data = $stmt->fetchAll();

        $response = new ResponseWrapper();
        $response->setData($data);
        $resMesg = new ResponseMessage("200", "OK", "200");
        $response->setMessage($resMesg);
        echo $response->encodeToJson();
    }
}

?>