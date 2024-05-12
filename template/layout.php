<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - Ma séance de yoga</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="../images/logo-site-yoga.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Appliquer la police Roboto à tout le document */
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-teal-600">
    <?= $content ?>
</body>
</html>