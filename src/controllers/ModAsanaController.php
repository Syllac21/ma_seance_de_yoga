<?php
require_once(dirname(__DIR__,1).'/models/Model.php');
require_once(dirname(__DIR__,1).'/models/Asanas.php');

class Modfish{
    /**
     * récupération des données concernant l'asana'
     *
     * @param integer $id
     * @return array
     */
    public function prepareMod (int $id) : array 
    {
        
        if(
            empty($id) ||
            !is_numeric($id)
        ){
            echo 'je ne trouve pas ce poisson';
            exit;
        }
        $objAsana= new Asanas;
        $asana=$objAsana->getAsana($id);
        return $asana;
    }

    public function sendModWithoutImage(array $postData)
    {
        // vérifiation des données
        if(
            trim(strip_tags($postData['asanaName']))==='' ||
            trim(strip_tags($postData['description']))===''||
            trim(strip_tags($postData['benefits'])==='')
        ){
            echo("tous les champs sont obligatoires");
            exit;

        }
        $sendAsana = new Asanas;

        return $sendAsana->sendAsana($postData);
        
    }

    /**
     * modifie les informations sur l'asana concerné et l'image correspondante
     *
     * @param array $postData
     * @param array $files
     * 
     */
    public function sendModWithImage(array $postData, array $files)
    {
        
        // vérifiation des données
        if(
            trim(strip_tags($postData['asanaName']))==='' ||
            trim(strip_tags($postData['description']))===''||
            trim(strip_tags($postData['benefits'])==='')
        ){
            echo("tous les champs sont obligatoires");
            exit;

        }
        
        // gestion de l'image

        $dossier = './images/';
        $fichier = basename($files['new-image']['name']);
        $taille = filesize($files['new-image']['tmp_name']);
        $taille_max=5000000;
        $extensionOk = ['.png', '.gif', '.jpg', '.jpeg', '.webp'];
        $extension = strchr($files['new-image']['name'],'.');

        if(
            !empty($files['new-image']['name'])
        ){
            // vérification de l'extension 
            if(!in_array($extension,$extensionOk)){$erreur= 'les extensions autorisées sont les suivantes : .png .gif ..jpg .jpeg .wbep';}

            //vérification de la taille
            if($taille>$taille_max){$erreur= 'votre fichier est trop volumineux';}

            if(!isset($erreur)){
                // remplacement des caractère avec des accents
                $fichier=strtr($fichier,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                // déplacement du fichier temporaire
                if(move_uploaded_file($files['new-image']['tmp_name'], $dossier.$fichier)){
                    echo 'téléchargement OK';
                }
                else{
                    echo 'Erreur de téléchargement';
                    exit;
                }
            }
        }
        $postData['image'] = $files['new-image']['name'];
        $sendAsana = new Asanas;

        return $sendAsana->sendAsana($postData);
    }

}