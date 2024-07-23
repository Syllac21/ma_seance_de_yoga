<?php
session_start();
require_once(dirname(__DIR__,2).'/src/models/Users.php');
require_once(dirname(__DIR__,2).'/src/models/Pages.php');

// recupération de la table users

$obj_users = new Users;
$users = $obj_users->getUsers();
$page = new Pages;
// validation des données dans $_POST

$postData=$_POST;

if(
    !empty($postData['email']) &&
    !empty($postData['password'])
){
    
    if(!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)){
        $pageDisplay = $page->errorPage('Veuillez entrer une adresse email valide');
    } else {
        foreach($users as $user){
            if(
                $user['email'] === $postData['email'] &&
                password_verify($postData['password'],$user['password'])
                
            ){
                $_SESSION['LOGGED_USER'] = [
                    'email' => $user['email'],
                    'id_user' => $user['id_user'],
                    'role' => $user['role'],
                ];
            }
        }
        if(!isset($_SESSION['LOGGED_USER'])) {
            $pageDisplay = $page->errorPage('les identifiants saisis ne correpondent pas à un compte existant');
        }
    }
    $pageDisplay = $page->redirectTO();
    exit;
} 