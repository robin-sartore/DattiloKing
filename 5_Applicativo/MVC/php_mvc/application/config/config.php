<?php


$actual_link = (isset($SERVER_['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://$_SERVER[HTTP_HOST]";
$documentRoot = $_SERVER['DOCUMENT_ROOT'];
$dir = str_replace('\\','/',getcwd().'/');
$final = $actual_link.str_replace($documentRoot, '',$dir);

define('URL',$final);

define('USERS', 'application/models/users.csv');