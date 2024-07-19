<?php 
$title = 'accueil';
ob_start();?>
<body class="bg-teal-600">
    <?PHP require_once(__DIR__.'../../template/header.php'); ?>
    <main class="container mx-auto px-4 md:px-0 my-10">
        <div class="shadow-2xl grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-rose-100 shadow-md rounded p-6">
                <h2 class="text-2xl text-center font-bold mb-4">Mes séances de yoga</h2>
                <div class="items-center gap-8 md:flex">
                    <img class="max-w-60 rounded-lg mx-auto" src="./images/image_mes_seances.jpg" alt="lotus">
                </div>
                <p class="text-center">Retrouvez ici les séances que vous avez déjà créées</p>
            </div>
            <div class="shadow-2xl bg-rose-100 shadow-md rounded p-6">
                <h2 class="text-2xl text-center font-bold mb-4">Créer une nouvelle séance</h2>
                <div class="items-center gap-8 md:flex">
                    <img class="max-w-60 rounded-lg mx-auto" src="./images/image_nouvelle_seance.jpg" alt="lotus">
                </div>
                
                <p class="text-center">Choisissez les asanas pour votre nouvelle séance</p>
            </div>
        </div>
    </main>
</body>
<?php
$content = ob_get_clean();

require_once(__DIR__.'./layout.php');
