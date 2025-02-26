<?php
class phrase{
    public function getPhrase(){
        require_once 'applicaiton/models/UserMapper.php';
        $userMapper = new UserMapper();
        $phrase = $userMapper->getPhraseModel();
        echo $phrase;
    }
}