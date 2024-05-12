<?php
session_start();
require_once(dirname(__DIR__,1).'/models/Model.php');
require_once(dirname(__DIR__,1).'/models/Users.php');
require_once(dirname(__DIR__,1).'/models/Pages.php');

$postData = $_POST;
$page = new Pages;
// validation des données

if(
    empty(trim($postData['firstname'])) ||
    empty(trim($postData['lastname'])) ||
    empty(trim($postData['email'])) ||
    empty(trim($postData['password'])) ||
    !filter_var($postData['email'], FILTER_VALIDATE_EMAIL)
){
    echo 'tous les champs ne sont pas remplis correctement';
    return;
}

// récupération des données

$firstname=trim(strip_tags($postData['firstname']));
$lastname=trim(strip_tags($postData['lastname']));
$email=trim(strip_tags($postData['email']));
$role = 'reader';

// hachage du mot de passe
$password=password_hash(trim(strip_tags($postData['password'])), PASSWORD_DEFAULT);

$objUser= new Users;
if(!$objUser->addUser($firstname, $lastname, $email, $password, $role)){
    echo 'erreur lors de la requête';
    exit;
}

$displayPage = $page->redirectTO();
exit;
