<?php 
$title = 'oups';
ob_start();?>
<body class="bg-teal-600">
    <?PHP require_once(__DIR__.'../../template/header.php'); ?>
    <main class="container mx-auto px-4 md:px-0 my-10">
        <div>
            <p class="text-5xl text-center"><?=$error?></p>
        </div>
    </main>
</body>
<?php
$content = ob_get_clean();

require_once(__DIR__.'./layout.php');
