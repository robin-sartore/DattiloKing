<?php
require_once 'User.php';
class UserMapper{
    public function fetchAll(){
        $lines = array();
        $file = file(USERS);

        foreach ($file as $key => $value){
            $lines[$key] = str_getcsv($value,';');
        }
        $users = array();
        foreach($lines as $line){
            $user = new User($line[0],$line[1],$line[2]);
            $users[] = $user;
        }
        return $users;
    }
}