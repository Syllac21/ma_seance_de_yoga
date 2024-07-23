<?php
require_once(dirname(__DIR__,1).'/src/models/Users.php');

$title = 'liste des utilisateurs';
$objUsers = new Users;
$users = $objUsers->getUsers();

ob_start();
require_once(__DIR__.'/header.php'); ?>

<table class="mx-auto">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>prénom</th>
                        <th>Role</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user) : ?>
                    
                        <tr>
                            <td><?=$user['firstname'] ?></td>
                            <td><?=$user['lastname']?> </td>
                            <td><?=$user['role'] ?></td>
                        </tr>
                <?php endforeach;?>
                </tbody>
            </table>

<?php $content = ob_get_clean();

require_once('layout.php');

