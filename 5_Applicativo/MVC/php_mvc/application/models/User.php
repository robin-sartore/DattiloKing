<?php

class User
{
    private $username;
    private $password;
    private $cognome;

    /**
     * @param $username
     * @param $password
     * @param $cognome
     */
    public function __construct($username, $password, $cognome)
    {
        $this->username = $username;
        $this->password = $password;
        $this->cognome = $cognome;
    }






    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getCognome()
    {
        return $this->cognome;
    }

    /**
     * @param mixed $cognome
     */
    public function setCognome($cognome)
    {
        $this->cognome = $cognome;
    }



}