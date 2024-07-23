<?php

Class Asanas
{

    public function getAsanas() : array
    {
        $dbc = new Model;
        $mysqlClient = $dbc->dbConnect();
        $getAsanas = $mysqlClient-> prepare('SELECT * FROM asanas');
        $getAsanas->execute();
        $asanas = $getAsanas->fetchAll();
        return $asanas;
    }

    public function getAsana($id) : array
    {
        $dbc = new Model;
        $mysqlClient = $dbc->dbConnect();
        $getAsana = $mysqlClient->prepare('SELECT * FROM asanas WHERE id=:id');
        $getAsana->execute([
            'id' => $id,
        ]);
        $asanaDetail = $getAsana->fetchAll(PDO :: FETCH_ASSOC);
        
        $asana=[
            'id'=>$asanaDetail[0]['id'],
            'asanaName'=>$asanaDetail[0]['asanaName'],
            'description'=>$asanaDetail[0]['description'],
            'benefits'=>$asanaDetail[0]['benefits'],
            'image'=>$asanaDetail[0]['image'],
        ];
        return $asana;

    }

    public function addAsana(array $asana)
    {
        $dbc = new Model;
        $mysqlClient = $dbc->dbConnect();
        $addAsana = $mysqlClient->prepare('INSERT INTO asanas(asanaName, description, benefits, image) VALUES (:asanaName, :description, :benefits, :image)');
        return $addAsana->execute([
            'asanaName'=>$asana['asana-name'],
            'description'=>$asana['about'],
            'benefits'=>$asana['benefits'],
            'image'=>$asana['image'],
        ]);
    }

    public function sendAsana(array $postData)
    {
        $id = $postData['id'];
        $asanaName = $postData['asanaName'];
        $description= $postData['description'];
        $benefits = $postData['benefits'];
        $image = $postData['image'];

        $dbc = new Model;
        $mysqlClient = $dbc->dbConnect();
        $changeAsana = $mysqlClient->prepare('UPDATE asanas SET AsanaName = :asanaName, description=:description, benefits=:benefits, image=:image WHERE id=:id');
        return $changeAsana->execute([
            'id'=>$id,
            'AsanaName'=>$asanaName,
            'description'=>$description,
            'benefits'=>$benefits,
            'image'=>$image,
        ]);
    }
}