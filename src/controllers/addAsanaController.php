<?php
require_once(dirname(__DIR__,1).'/models/model.php');
require_once(dirname(__DIR__,1).'/models/Asanas.php');
require_once(dirname(__DIR__,1).'/models/Pages.php');

$postData=$_POST;
$page = new Pages;

// validation des données saisies

if(
    trim(strip_tags($postData['asana-name']))==='' ||
    trim(strip_tags($postData['about']))===''||
    trim(strip_tags($postData['benefits'])==='')
){
    $pagedisplay = $page->errorPage('toutes les informations sont nécessaires');
}

// validation du fichier image

$dossier ='../../images/';
$fichier = basename($_FILES['image']['name']);
$taille_max=5000000;
$taille=filesize($_FILES['image']['tmp_name']);
$extension_ok=['.png','.gif','.jpg','.jpeg','.webp'];
$extension=strrchr($_FILES['image']['name'],'.');

if(!empty($_FILES['image']['name'])){
    // vérification de l'extension
    if(!in_array($extension,$extension_ok)){$erreur= 'les extensions autorisées sont les suivantes : .png .gif ..jpg .jpeg .wbep';}

        // vérification de la taille
        if($taille>$taille_max){$erreur= 'votre fichier est trop volumineux';}

            if(!isset($erreur)){
                // remplacement des caractère avec des accents
                $fichier=strtr($fichier,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                // déplacement du fichier temporaire
                if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier.$fichier)){
                    echo 'téléchargement OK';
                } else {
                    $pagedisplay = $page->errorPage('Erreur de téléchargement');
                } 
            } else {
                $pagedisplay = $page->errorPage($erreur);    
            }
} else {$image='pas-images.webp';}

$postData['asana-name'] = trim(strip_tags($postData['asana-name']));
$postData['about'] = trim(strip_tags($postData['about']));
$postData['benefits'] = trim(strip_tags($postData['benefits']));
$postData['image'] = $fichier;

$asana = new Asanas;

if(!$asana->addAsana($postData)){
    $pagedisplay=$page->errorPage('erreur de transfert de données');
    exit;
} else {
    $pagedisplay=$page->redirectTO();
}

