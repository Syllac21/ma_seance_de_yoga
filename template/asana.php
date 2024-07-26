<?php

require_once(dirname(__DIR__,1).'/src/models/Asanas.php');
require_once(dirname(__DIR__,1).'/src/models/Pages.php');
$getData = $_GET;
$objAsana = new Asanas;
$page = new Pages;


// vérification des données du GET
if(
    !isset($getData['id'])||
    !is_numeric($getData['id'])
){
    $pageDisplay = $page->errorPage('Aucune posture ne correspond');
}

// je récupère les données correspondant à la posture
$asana = $objAsana->getAsana($getData['id']);
$title = $asana['asanaName'];

ob_start();
require_once(__DIR__.'/header.php');
?>
<main class="container mx-auto p-5">
        
    <section class="grid grid-cols-2 gap-3">
        <div class=" rounded-lg px-5 bg-cyan-500 bg-opacity-60 pt-5">
            <h1 class="text-2xl font-semibold mb-5 text-gray-200"> <?= $asana['asanaName'] ?> </h1>
            <p class="mb-3 text-xl text-gray-200 text-justify"><?= $asana['description'] ?> </p>
            <p class="text-gray-200 italic">Bienfaits :<?= $asana['benefits'] ?> </p>
        </div>
        <div class="mx-auto">
            <img class="rounded-xl" src="/images/<?= $asana['image'] ?>" alt="<?= $asana['asanaName'] ?> ">
        </div>
    </section>
    <div class="w-full flex justify-center my-5">
        <?php if ($_SESSION['LOGGED_USER']['role'] === 'admin'): ?>
            <a  href="/index.php?action=modasana&id=<?= $asana['id'] ?>"
                class="flex text-gray-100 justify-center transition duration-200 ease-in-out transform px-4 py-2 w-48 border-b-4 border-gray-500 hover:border-b-2 bg-gradient-to-t from-gray-400  via-gray-600 to-gray-200 rounded-2xl hover:translate-y-px "

                style="-webkit-box-shadow: 0px 10px 13px -7px #000000, 5px 5px 15px 8px rgba(0,0,0,0); 
                box-shadow: 0px 10px 13px -7px #000000, 5px 5px 15px 5px rgba(0,0,0,0);">
                Modifier
            </a>
        <?php endif ?>
    </div>
</main>
<?php $content = ob_get_clean(); 
require_once('layout.php');