<?php
require_once(dirname(__DIR__,1).'/src/models/Asanas.php');

$title = 'Liste des asanas';
$objAsanas = new Asanas;
$asanas = $objAsanas->getAsanas();

ob_start();
require_once(__DIR__.'/header.php'); ?>

<h1 class="text-center font-semibold leading-5 text-gray-300 text-2xl">Les asanas</h1>

<main class="container mx-auto p-5">
    
    <section class="md:grid grid-cols-5 xl:grid grid-col3 gap-5">
        <?php foreach ($asanas as $asana) : ?>
            <article class="card rounded-xl overflow-hidden shadow-xl bg-cyan-500 bg-opacity-40 hover:shadow-2xl">
                
                <img class="w-full" src="/images/<?=$asana['image'] ?>" alt="<?= $asana['asanaName'] ?>" />
                
                <div class="px-6 py-4">
                    <h2 class="text-2xl mb-2 text-gray-200"><?= $asana['asanaName'] ?> </h2>
                    <p class="text-white">
                        Description :
                        <?= $asana['description'] ?>
                    </p>
                </div>
                <div class="px-6 py-4">
                    <a href="index.php?id=<?= $asana['id'] ?> " class="px-3 py-4 bg-gray-200 rounded-2xl">En savoir plus</a>
                </div>
            </article>
        <?php endforeach; ?>
    </section>
</main>
<?php $content = ob_get_clean();

require_once('layout.php');