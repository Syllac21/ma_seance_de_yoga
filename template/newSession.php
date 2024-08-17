<?php
include_once(dirname(__DIR__,1).'/src/models/Asanas.php');

$asanasObj = new Asanas;
$asanas =$asanasObj->getAsanas();
$asanasSession =[];
$title = 'Nouvelle session';

ob_start();


?>


<?php require_once(__DIR__.'/header.php'); ?>
<main>
    <form action="../src/controllers/newSessionController.php" method="POST">
        <div class="container flex justify-between px-20">
            <!-- Liste des asanas disponibles -->
            <div>
                <h3>Liste des asanas disponibles</h3>
                <ul id="asanas-list" class="list-none px-20 border border-solid border-white min-h-300">
                    <?php foreach ($asanas as $asana) : ?>
                        <li id="asana-<?= $asana['id'] ?>" onclick="addToSession(<?=$asana['id'] ?>)" class="px-10 mx-5 border border-solid border-white cursor-pointer text-align-center hover:shadow-xl">
                            <ul>
                                <li><?= $asana['asanaName'] ?></li>
                                <li><?= $asana['benefits'] ?> </li>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Liste des asanas dans la session -->
            <div>
                <h3>Asanas dans la session</h3>
                <ul id="session-list">
                    <!-- Les asanas déplacés apparaîtront ici -->
                </ul>
            </div>
        </div>
        <input type="hidden" name="asanasInSession" id="asanasInSession" value="">
        <div class="flex justify-center items-center">
        <button type="submit" class="rounded-md bg-teal-950 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-teal-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Valider</button>
        </div>
    </form>

    <script>
        // Liste des asanas dans la session
        let sessionAsanas = [];

        // Fonction pour ajouter un asana dans la session
        function addToSession(asanaId) {
            const asanaElement = document.getElementById(`asana-${asanaId}`);
            const sessionList = document.getElementById("session-list");

            // Vérifier si l'asana est déjà dans la session
            if (!sessionAsanas.includes(asanaId)) {
                sessionAsanas.push(asanaId);

                // Déplacer l'asana vers la liste de la session
                asanaElement.id = `session-asana-${asanaId}`;
                asanaElement.setAttribute('onclick', `removeFromSession(${asanaId})`);
                sessionList.appendChild(asanaElement);

                 // Mettre à jour le champ caché avec la liste des asanas
                 document.getElementById("asanasInSession").value = sessionAsanas.join(',');
            }
        }

        // Fonction pour retirer un asana de la session
        function removeFromSession(asanaId) {
            const asanaElement = document.getElementById(`session-asana-${asanaId}`);
            const asanasList = document.getElementById("asanas-list");

            // Retirer de la session
            sessionAsanas = sessionAsanas.filter(id => id !== asanaId);

            // Déplacer l'asana vers la liste des asanas disponibles
            asanaElement.id = `asana-${asanaId}`;
            asanaElement.setAttribute('onclick', `addToSession(${asanaId})`);
            asanasList.appendChild(asanaElement);

            // Mettre à jour le champ caché avec la liste des asanas
            document.getElementById("asanasInSession").value = sessionAsanas.join(',');
        }
    </script>

</main>

<?php $content = ob_get_clean();
require_once('layout.php');