<?php

require_once(dirname(__DIR__,1).'/src/models/Pages.php');
require_once(dirname(__DIR__,1).'/src/models/Asanas.php');

$getData = $_GET;
$page = new Pages;
$objAsana = new Asanas;
$asana = $objAsana->getAsana($getData['id']);

if($_SESSION['LOGGED_USER']['role'] === 'admin') { 

    $title = $asana['asanaName'];

    ob_start();
    require_once(__DIR__.'/header.php');
    ?>


    <h2 class="text-center font-semibold leading-7 text-gray-300 text-2xl"><?= $asana['asanaName'] ?> </h2>
    <form action="/index.php?action=modAsana&id=<?= $getData['id'] ?>" method="POST" class="mx-auto px-5 w-1/2 flex flex-col justify-center" enctype="multipart/form-data">
        <div class="space-y-12">
            
            <div class="border-b border-gray-900/10 pb-12">
            
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="asana-name" class="block text-sm font-medium leading-6 text-gray-300">Nom de l'Asana</label>
                        <div class="mt-2">
                            <input type="text" name="asana-name" id="asana-name" value="<?= $asana['asanaName'] ?>" class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 w-1/2">
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="about" class="block text-sm font-medium leading-6 text-gray-300">Description</label>
                        <div class="mt-2">
                            <textarea id="description" name="description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $asana['description'] ?></textarea>
                        </div>
                        <p class="mt-3 text-sm leading-6 text-gray-600">Décrivez l'asana</p>
                    </div>
                    
                    <div class="col-span-full">
                        <label for="benefits" class="block text-sm font-medium leading-6 text-gray-300">Bienfaits</label>
                        <div class="mt-2">
                            <textarea id="benefits" name="benefits" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?=$asana['benefits'] ?></textarea>
                        </div>
                        <p class="mt-3 text-sm leading-6 text-gray-600">Quels sont les bienfaits de cette posture</p>
                    </div>
                    <div class="border-b border-gray-900/10 pb-12">
        
                    <!-- photo -->
                        <div class="col-span-full">
                            <label for="new-image" class="block text-sm font-medium leading-6 text-gray-300">Image</label>
                            <div class="mt-2 flex items-center gap-x-3">
                                <input type="file" name="new-image" id="new-image" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                            </div>
                        </div>

                
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Annuler</button>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Envoie</button>
        </div>
    </form>


    <?php $content = ob_get_clean(); 
    require_once('layout.php');
}else{
    $pageDisplay = $page->redirectTO();
}