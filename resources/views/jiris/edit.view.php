<?php
/** @var stdClass $jiri */
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible"
              content="ie=edge">
        <title>Jiris</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
        <a class="sr-only"
           href="#main-menu">Aller au menu principal</a>
        <div class="container mx-auto flex flex-col-reverse gap-6">
            <main class="flex flex-col gap-4">
                <h1 class="font-bold text-2xl">Modifier <?= $jiri->name ?></h1>
                <form action="/jiri/update" method="post" class="flex flex-col gap-4">
                    <input type="hidden" name="id" value="<?= $jiri->id ?>">
                    <div>
                        <label for="name" class="font-bold">Nom</label>
                        <input id="name" type="text" value="<?= $jiri->name ?>" name="name" class="border border-grey-700 px-2">
                    </div>
                    <div>
                        <label for="starting_at" class="font-bold">Date et heure de début</label>
                        <input id="starting_at" type="text" value="<?= $jiri->starting_at ?>" name="starting_at" class="border border-grey-700 px-2">
                    </div>
                    <button type="submit" class="rounded bg-blue-500 text-white">Enregistrer la modification</button>
                </form>
                <form action="/jiri/delete" method="post">
                    <input type="hidden" name="id" value="<?= $jiri->id ?>">
                    <button type="submit" class="text-red-500">Supprimer ce jiri</button>
                </form>
            </main>
            <nav id="main-menu">
                <h2 class="sr-only">Menu principal</h2>
                <ul class="flex gap-4">
                    <li><a class="underline text-blue-500"
                           href="/jiris">Jiris</a></li>
                    <li><a class="underline text-blue-500"
                           href="/contacts">Contacts</a></li>
                    <li><a class="underline text-blue-500"
                           href="/projects">Projets</a></li>
                </ul>
            </nav>
        </div>
    </body>
</html>