<?php
class phrase{

    public function __construct(){
        require_once '../models/UserMapper.php';
    }
    public function getPhrase(){
        $userMapper = new UserMapper();
        $phrase = $userMapper->getPhraseModel();
        echo $phrase;
    }
}
$phraseController = new phrase();
$phraseController->getPhrase();