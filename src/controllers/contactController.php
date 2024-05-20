<?php
require_once(dirname(__DIR__,2).'/src/models/Users.php');
require_once(dirname(__DIR__,2).'/src/models/Pages.php');

$postData = $_POST;
$page = new Pages;
// on vérifie les données

if(
    $postData['name'] === '' ||
    $postData['firstName'] === '' ||
    $postData['email'] === '' ||
    $postData['message'] === '' ||
    !filter_var($postData['email'], FILTER_VALIDATE_EMAIL)
){
    $pageDisplay = $page->errorPage('les champs du formulaire ne sont pas remplis correctement');
    exit;
}

$nom = $postData['name']." ".$postData['firstName'];
$email = $postData['email'];
$message = $postData['message'];

// Destinataire de l'e-mail (votre adresse e-mail)
$destinataire = "delphine.delattre21500@gmail.com";

// Sujet de l'e-mail
$sujet = "Nouveau message de contact depuis le site : ma séance de yoga";

// Corps de l'e-mail
$corpsMessage = "Nom: $nom\n";
$corpsMessage .= "E-mail: $email\n\n";
$corpsMessage .= "Message:\n$message";

// Entêtes de l'e-mail
$entetes = "From: $nom <$email>\r\n";
$entetes .= "Reply-To: $email\r\n";
$entetes .= "MIME-Version: 1.0\r\n";
$entetes .= "Content-type: text/plain; charset=utf-8\r\n";

// Envoi de l'e-mail
mail($destinataire, $sujet, $corpsMessage);

$pageDisplay = $page->redirectTO();