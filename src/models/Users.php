<?php
require_once(__DIR__.'/Model.php');
require_once(__DIR__.'/Pages.php');



class Users
{
    public function getUsers() : array
    {
        $dbc = new Model;
        $mysqlClient = $dbc->dbConnect();
        $usersStatement = $mysqlClient->prepare('SELECT * FROM users');
        $usersStatement->execute();
        $users=$usersStatement->fetchAll();
        return $users;
    }

    public function addUser(string $firstname, string $lastname, string $email, string $password, string $role) : bool 
    {
        $dbc = new Model;
        $mysqlClient = $dbc->dbConnect();
        $addUser = $mysqlClient->prepare('INSERT INTO users(firstname, lastname, email, password, role) VALUES (:firstname, :lastname, :email, :password, :role)');
        return $addUser->execute([
            'firstname'=>$firstname,
            'lastname'=>$lastname,
            'email'=>$email,
            'password'=>$password,
            'role' =>$role,
        ]);
    }

    public function modRoleUser($postdata)
    {
        $dbc = new Model;
        $mysqlClient = $dbc->dbConnect();
        $changeRole = $mysqlClient->prepare('UPDATE users SET role = :role WHERE id=:id');
        return $changeRole->execute([
            'role'=>$postdata['role'],
            'id'=>$postdata['id'],
        ]);
    }

    public function logout()
    {
        $page = new Pages;
        session_unset();
        session_destroy();
        $pageDisplay = $page->redirectTO();
    }
}