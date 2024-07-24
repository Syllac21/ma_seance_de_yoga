<?php
session_start();
require_once(dirname(__DIR__,1).'/models/Model.php');
require_once(dirname(__DIR__,1).'/models/Users.php');
require_once(dirname(__DIR__,1).'/models/Pages.php');

$postData = $_POST;
$page = new Pages;

// on vérifie le token


if($postData['token'] === $_SESSION['token']){
        
    // on vérifie la méthode

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        // validation des données

        if(
            empty(trim($postData['id'])) ||
            empty(trim($postData['role'])) ||
            !is_numeric($postData['id'])
        ){
            $pageDisplay = $page->errorPage('erreur lors du changement de rôle');
            return;
        }

        // récupération des données

        $id = $postData['id'];
        $role = $postData['id'];

        $objUser= new Users;
        if(!$objUser->modRoleUser($postData)){
            $pageDisplay = $page->errorPage('erreur lors du changement de rôle');
            exit;
        }

        $pageDisplay = $page->listUsersPage();
        exit;
        
    }

    } else{
        $pageDisplay = $page->redirectTO();
    }
    