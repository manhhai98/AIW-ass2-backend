<?php

include_once './config/db-config.php';
include_once './models/helper/Consts.php';
include_once './models/helper/ResponseWrapper.php';
require_once './repo/BaseRepository.php';

class TagRepository implements BaseRepository {
    const TAG_TBL_NAME = "tags";

    public function getAll()
    {
        global $conn;
        $response = new ResponseWrapper();
        try {
            $stmt = $conn->prepare("SELECT * FROM " . TagRepository::TAG_TBL_NAME);
            $stmt->execute();
            $data = $stmt->fetchAll();
            $response->setData($data);
            $response->setMeta(ResponseMeta::getSuccessMeta());
        } catch (Exception $e) {
            $response->setMeta(new ResponseMeta(
                "400",
                $e->getMessage()
            ));
        }
        echo $response->encodeToJson();
    }

    public function getById($id)
    {
        global $conn;
        $response = new ResponseWrapper();
        try {
            $stmt = $conn->prepare("SELECT * FROM " . TagRepository::TAG_TBL_NAME . " WHERE id=" . $id);
            $stmt->execute();
            $data = $stmt->fetchAll();
            $response->setData($data);
            $response->setMeta(ResponseMeta::getSuccessMeta());
        } catch (Exception $e) {
            $response->setMeta(new ResponseMeta(
                "400",
                $e->getMessage()
            ));
        }
        echo $response->encodeToJson();
    }
}

?>