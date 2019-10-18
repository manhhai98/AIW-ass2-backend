<?php

include_once dirname(__DIR__, 1) . '/repo/TagRepository.php';

class TagController {
    const TAG_URI_PATH = "tags";

    private $requestMethod;
    private $tagId;
    private $tagRepository;

    public function __construct($requestMethod, $tagId)
    {
        $this->requestMethod = $requestMethod;
        $this->tagId = $tagId;
        $this->tagRepository = new TagRepository();
    }

    public function processRequest() {
        switch ($this->requestMethod) {
            case 'GET':
                if ($this->tagId == null) {
                    $response = $this->tagRepository->getAll();
                } else {
                    $response = $this->tagRepository->getById($this->tagId);
                }
                break;
            case 'POST':
                // $response = $this->createUserFromRequest();
                break;
            case 'PUT':
                //$response = $this->updateUserFromRequest($this->userId);
                break;
            case 'DELETE':
                //$response = $this->deleteUser($this->userId);
                break;
            default:
                //$response = $this->notFoundResponse();
                break;
        }
        // if ($response['body']) {
        //     echo $response['body'];
        // } else {
        //     // TODO: may need to change how to handle error
        //     $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
        // }
    }
}

?>