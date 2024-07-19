<!DOCTYPE html>
<html>
    <header class="bg-teal-600">
           
        <div class="container mx-auto bg-white">
            <div class="text-center text-5xl py-5 bg-teal-600">
                <img src="../images/logo-site-yoga.jpg" class="w-16 rounded-lg inline" alt="logo">
                <h1 class="inline">Mon yoga sur mesure</h1>
            </div> 
            <div class="relative flex flex-col items-center justify-between w-full bg-teal-600 group py-7 shrink-0">
                <div class="mb-5 items-center justify-between hidden gap-12 text-black md:flex">
                    <a class="text-sm font-normal text-teal-950 hover:text-teal-50" href="/index.php">Accueil</a>
                    <a class="text-sm font-normal text-teal-950 hover:text-teal-50" href="/index.php?action=asanas">Les asanas</a>
                    <a class="text-sm font-normal text-teal-950 hover:text-teal-50" href="/index.php?action=contact">Nous-contacter</a>
                    
                    <!-- onglets admin -->
                    <?php if($_SESSION['LOGGED_USER']['role']==='admin') : ?>
                        <a class="text-sm font-normal text-teal-950 hover:text-teal-50" href="/index.php?action=addAsana">ajouter un asana</a>
                        <a class="text-sm font-normal text-teal-950 hover:text-teal-50" href="/index.php?action=listUsers">Voir les membres</a>
                    <?php endif ?>
                        <a class="text-sm font-normal text-teal-950 hover:text-teal-50" href="/index.php?action=logout">Se déconnecter</a>
                </div>
                <div class="shadow-2xl items-center hidden gap-8 md:flex">
                    
                    <img class="w-full rounded-lg" src="./images/image_header_yoga.png" alt="Logo">
                </div>
                <button onclick="(() => { this.closest('.group').classList.toggle('open')})()" class="flex md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M3 8H21C21.2652 8 21.5196 7.89464 21.7071 7.70711C21.8946 7.51957 22 7.26522 22 7C22 6.73478 21.8946 6.48043 21.7071 6.29289C21.5196 6.10536 21.2652 6 21 6H3C2.73478 6 2.48043 6.10536 2.29289 6.29289C2.10536 6.48043 2 6.73478 2 7C2 7.26522 2.10536 7.51957 2.29289 7.70711C2.48043 7.89464 2.73478 8 3 8ZM21 16H3C2.73478 16 2.48043 16.1054 2.29289 16.2929C2.10536 16.4804 2 16.7348 2 17C2 17.2652 2.10536 17.5196 2.29289 17.7071C2.48043 17.8946 2.73478 18 3 18H21C21.2652 18 21.5196 17.8946 21.7071 17.7071C21.8946 17.5196 22 17.2652 22 17C22 16.7348 21.8946 16.4804 21.7071 16.2929C21.5196 16.1054 21.2652 16 21 16ZM21 11H3C2.73478 11 2.48043 11.1054 2.29289 11.2929C2.10536 11.4804 2 11.7348 2 12C2 12.2652 2.10536 12.5196 2.29289 12.7071C2.48043 12.8946 2.73478 13 3 13H21C21.2652 13 21.5196 12.8946 21.7071 12.7071C21.8946 12.5196 22 12.2652 22 12C22 11.7348 21.8946 11.4804 21.7071 11.2929C21.5196 11.1054 21.2652 11 21 11Z" fill="black"></path>
                    </svg>
                </button>
                <div class="absolute flex md:hidden transition-all duration-300 ease-in-out flex-col items-start shadow-main justify-center w-full gap-3 overflow-hidden bg-teal-600 max-h-0 group-[.open]:py-4 px-4 rounded-2xl group-[.open]:max-h-64 top-full">
                <a class="text-sm font-normal text-teal-950 hover:text-teal-50" href="/index.php">Accueil</a>
                    <a class="text-sm font-normal text-teal-950 hover:text-teal-50" href="/index.php?action=asanas">Les asanas</a>
                    <a class="text-sm font-normal text-teal-950 hover:text-teal-50" href="/index.php?action=contact">Nous-contacter</a>
                    
                    <!-- onglets admin -->
                    <?php if($_SESSION['LOGGED_USER']['role']==='admin') : ?>
                        <a class="text-sm font-normal text-teal-950 hover:text-teal-50" href="/index.php?action=addAsana">ajouter un asana</a>
                        <a class="text-sm font-normal text-teal-950 hover:text-teal-50" href="/index.php?action=listUsers">Voir les membres</a>
                    <?php endif ?>
                        <a class="text-sm font-normal text-teal-950 hover:text-teal-50" href="/index.php?action=logout">Se déconnecter</a>
                </div>
            </div>
        </div>
    </header>
<html>
