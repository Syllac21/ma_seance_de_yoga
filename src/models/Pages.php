<?php

class Pages{

    public function homepage()
    {
        require_once(dirname(__DIR__,2).'/template/homepage.php');
    }

    public function contactPage()
    {
        require_once(dirname(__DIR__,2).'/template/contact.php');
    }

    public function errorPage($lblError)
    {
        $error=$lblError;
        require_once(dirname(__DIR__,2).'/template/error.php');
    }

    public function loginPage()
    {
        require_once(dirname(__DIR__,2).'/template/login.php');
    }

    public function addUserPage()
    {
        require_once(dirname(__DIR__,2).'/template/adduser.php');
    }

    public function redirectTO() 
    {
        header('location: http://ma_seance_de_yoga.test/index.php');
        exit;
    }
}