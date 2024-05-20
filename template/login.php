<?php
require_once(__DIR__.'../../src/models/Pages.php');
$title = 'connexion';
ob_start(); 
$page = new Pages;
?>
<header>
    <h1 class="text-center text-5xl py-5 bg-teal-600">Ma Séance de yoga</h1>
</header>
<body>
    <main class="container mx auto px-4 md:px-0 my-10">
        <div class="flex min-h-full flex col justify-center px-6 py-12 lg:px-8 bg-fixed bg-cover bg-center h-screen">
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <img src="../images/image_header_yoga.png" alt="bienvenue">
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Connectez vous à votre compte</h2>
            </div>
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <!-- formulaire -->
                <form action="/src/controllers/loginController.php" method="POST" class="space-y-6">
                    <?php if(isset($_SESSION['LOGIN_ERROR_MESSAGE'])){
                        $displayPage=$page->errorPage($_SESSION['LOGIN_ERROR_MESSAGE']);
                        unset($_SESSION['LOGIN_ERROR_MESSAGE']);
                        return;
                    } ?>

                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Adresse mail</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
        
                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Mot de passe</label>
                            <div class="text-sm">
                                <a href="#" class="font-semibold text-teal-950 hover:text-teal-700">Mot de passe oublié?</a>
                            </div>
                        </div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
        
                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-teal-950 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-teal-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Connexion</button>
                    </div>
                    <div class="text-right">
                        <a href="../index.php" class="text-teal-200 hover:text-teal-50">Annuler</a>
                        <a href="../index.php?connect=adduser" class="hover:bg-teal-700 text-white py-2 px-4 rounded-full">Créer votre compte</a>
                    </div>
            </form>
    </main>
</body>
<?php
$content = ob_get_clean();

require_once(__DIR__.'./layout.php');