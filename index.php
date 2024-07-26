<?php
session_start();    
require_once(__DIR__.'/src/models/Pages.php');
require_once(__DIR__.'/src/models/Users.php');

$page = new Pages;

// gestion de la connexion ou de la création de compte

if(!isset($_SESSION['LOGGED_USER'])){
    if(isset($_GET['connect']) && $_GET['connect']==='adduser'){
        $pageDisplay = $page->addUserPage();
        return;
    }else{
        $pageDisplay=$page->loginPage();
        return;
    }
}

// routeur en fonction du GET id
if(isset($_GET['id']) && $_GET['id']!=='' && is_numeric($_GET['id'])){
    if(isset($_GET['action']) && $_GET['action'] !==''){
        $pageDisplay = $page->modAsana();
    }else{
        $pageDisplay=$page->asana();
    }
}

// routeur en fonction du GET action

if(isset($_GET['action']) && $_GET['action'] !== ''){
    if($_GET['action']==='logout'){
        $userObj = new Users;
        $user = $userObj->logout();
        exit;
    }elseif($_GET['action']==='contact'){
        $pageDisplay = $page->contactPage();
    }elseif($_GET['action']==='addAsana'){
        $pageDisplay = $page->addAsanaPage();
    }elseif($_GET['action'] === 'asanas'){
        $pageDisplay = $page->asanas();
    } elseif($_GET['action'] === 'listUsers'){
        $pageDisplay = $page->listUsersPage();
    } else{
        $pageDisplay = $page->errorPage('Page en construction');
    }
}else{
    $pageDisplay = $page->homepage();
}