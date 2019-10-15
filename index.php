<?php

// include_once './models/Tag.php';
// include_once './models/Category.php';

// $mTag = new Tag("my name is lam");
// $mName = $mTag->getName();
// echo "AAA" . $mName;
// $mTag->toString();

include_once './repo/TagRepository.php';

$mRepo = new TagRepository();
$mRepo->getAllTags();

include_once './config/db-close.php';


// title, short intro, content, date created, author, related
// articles, comment, tags and category
?>
