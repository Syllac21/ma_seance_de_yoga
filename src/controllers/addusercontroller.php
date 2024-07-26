<?php
session_start();
require_once(dirname(__DIR__,1).'/models/Model.php');
require_once(dirname(__DIR__,1).'/models/Users.php');
require_once(dirname(__DIR__,1).'/models/Pages.php');

$postData = $_POST;
$page = new Pages;



// on vérifie que le visiteur vient de notre site

if($postData['token'] === $_SESSION['token']){
        
    // on vérifie la méthode

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        // on vérifie le pot de miel
        if(isset($postData['country']) && empty($postData['country'])){
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

            $pageDisplay = $page->redirectTO();
                exit;
        }
    }

} else{
    $pageDisplay = $page->redirectTO();
}