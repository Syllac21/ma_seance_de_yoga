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

    public function errorPage(string $lblError)
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

    public function addAsanaPage()
    {
        require_once(dirname(__DIR__,2).'/template/addAsana.php');
    }

    public function asanas()
    {
        require_once(dirname(__DIR__,2).'/template/asanas.php');
    }

    public function asana()
    {
        require_once(dirname(__DIR__,2).'/template/asana.php');
    }

    public function modAsana()
    {
        require_once(dirname(__DIR__,2).'/template/modAsana.php');
    }

    public function listUsersPage(){
        require_once(dirname(__DIR__,2).'/template/listusers.php');
    }

    public function newSession(){
        require_once(dirname(__DIR__,2).'/template/newSession.php');
    }
    
    public function redirectTO() 
    {
        header('location: /');
        exit;
    }
}