<?php
require_once(__DIR__.'../../src/models/Pages.php');
$title = 'Nouveau compte';
$page = new Pages;

ob_start();
?>
<header>
    <h1 class="text-center text-5xl py-5 bg-teal-600">Ma Séance de yoga</h1>
    <img src="../images/image_header_yoga.png" class="mx-auto" alt="lotus">
</header>
<body class="bg-fixed bg-cover bg-center h-screen bg-no-repeat" style="background-image: url('/images/fonds-marins-coraux.jpg'); ">
    <main class="container mx-auto my-10 p-5">
        <h2 class="text-center font-semibold leading-7 text-gray-300 text-2xl">Nouveau compte</h2>
        <form action="./src/controllers/addusercontroller.php" method="POST" class="mt-2 px-5 mx-auto w-1/2 flex flex-col justify-center">

            <div class="border-b border-gray-900/10 pb-12">

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="firstname" class="block text-sm font-medium leading-6 text-gray-300">Prénom</label>
                        <div class="mt-2">
                            <input type="text" name="firstname" id="firstname" class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 w-1/2">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="lastname" class="block text-sm font-medium leading-6 text-gray-300">Nom</label>
                        <div class="mt-2">
                            <input type="text" name="lastname" id="lastname" class="block w-1/2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-300">Email</label>
                        <div class="mt-2">
                            <input type="email" name="email" id="email" placeholder="adresse@exemple.com" class="block w-1/2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-300">Mot de passe</label>
                        <div class="mt-2">
                            <input type="password" name="password" id="password" class="block w-1/2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    
                    
                </div>
            </div>            
        

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="../index.php" class="text-teal-200 hover:text-teal-50">Annuler</a>
            
            <button type="submit" class="rounded-md bg-teal-950 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-teal-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Envoyer</button>
        </div>
        </form>

    </main>
</body>


<?php
$content = ob_get_clean();

require_once(__DIR__.'./layout.php');

