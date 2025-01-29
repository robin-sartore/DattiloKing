<?php


class home{
    public function index(){
        require  'application/views/templates/header.php';
        require  'application/views/home/index.php';
        require  'application/views/templates/footer.php';
    }
    public function lista(){
        require_once 'application/models/UserMapper.php';
        $userMapper = new UserMapper();
        $users = $userMapper->fetchAll();

        require  'application/views/templates/header.php';
        require  'application/views/lista/index.php';
        require  'application/views/templates/footer.php';
    }
}