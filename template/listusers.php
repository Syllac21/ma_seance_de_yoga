<?php
require_once(dirname(__DIR__,1).'/src/models/Users.php');

$title = 'liste des utilisateurs';
$objUsers = new Users;
$users = $objUsers->getUsers();

ob_start();
require_once(__DIR__.'/header.php');
var_dump($users); ?>

<?php $content = ob_get_clean();

require_once('layout.php');

