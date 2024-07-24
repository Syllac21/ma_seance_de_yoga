<?php
require_once(dirname(__DIR__,1).'/src/models/Users.php');

$title = 'liste des utilisateurs';
$objUsers = new Users;
$users = $objUsers->getUsers();
$_SESSION['token'] = md5(uniqid(mt_rand(), true));

ob_start();
require_once(__DIR__.'/header.php'); ?>

<!-- En tête du tableau des utilisateurs -->
    <table class="container mx-auto my-8 border">
        <thead class="border">
            <tr>
                <th class="border">Nom</th>
                <th class="border">prénom</th>
                <th class="border">email</th>
                <th class="border">Role</th> 
                <th class="border">Valider</th>               
            </tr>
        </thead>
        <!-- chaque ligne de la base de données créée une ligne du tableau qui est un formulaire, on rajouter une colonne avec le bouton envoie -->
        <tbody>
            <?php foreach ($users as $user) : ?>
                <form action="../src/controllers/modRoleUser.php" method="POST" class="mx-auto px-5 w-1/2 flex flex-col justify-center" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id" value="<?=$user['id']?>">
                    <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?? '' ?>"> 
                    <tr>
                        <td class="border ps-4"><?=$user['firstname'] ?></td>
                        <td class="border ps-4"><?=$user['lastname']?> </td>
                        <td class="border ps-4"><?=$user['email'] ?> </td>
                        <td class="border ps-4">
                            <select id="role" name="role">
                                <option value="admin"<?php if($user['role']==='admin'){echo ('selected');} ?> >Administrateur</option>
                                <option value="reader"<?php if($user['role']==='reader'){echo ('selected');} ?> >lecteur</option>
                                <option value="na"<?php if($user['role']==='na'){echo ('selected');} ?> >non-autorisé</option>
                            </select>
                        </td>
                        <td class="border ps-4"><button type="submit" class="rounded-md bg-indigo-600 py-2 px-3 my-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">envoie</button></td>
                    </tr>
                </form>
            <?php endforeach;?>
        </tbody>
    </table>
    <div class="mt-1 flex items-center justify-end gap-x-6">
        
    </div>
    
    



<?php $content = ob_get_clean();

require_once('layout.php');

