<?php

$now = time();
$jiris = [
    ['name' => 'Projets Web 2024', 'id' => 3, 'starting_at' => '2024-01-19 08:30:00'],
    ['name' => 'Design Web 2024', 'id' => 4, 'starting_at' => '2024-06-19 08:30:00'],
    ['name' => 'Projets Web 2025', 'id' => 9, 'starting_at' => '2025-01-19 08:30:00'],
    ['name' => 'Design Web 2023', 'id' => 2, 'starting_at' => '2023-06-19 08:30:00'],
];
$upcoming_jiris = array_filter($jiris, function ($v, $k) use ($now) {
    $date = new DateTimeImmutable($v['starting_at']);
    return ($now - $date->getTimestamp()) < 0;
}, ARRAY_FILTER_USE_BOTH);

$passed_jiris = array_filter($jiris, function ($v, $k) use ($now) {
    $date = new DateTimeImmutable($v['starting_at']);
    return ($now - $date->getTimestamp()) >= 0;
}, ARRAY_FILTER_USE_BOTH);

// TODO
// The callback is a bit redundant, right ?

?>
<!-- VIEW -->
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
        <h1 class="font-bold text-2xl">Jiris</h1>
        <section>
          <h2 class="font-bold">Jiris à venir</h2>
            <?php
            if (count($upcoming_jiris) > 0): ?>
              <ol>
                  <?php
                  foreach ($upcoming_jiris as $jiri): ?>
                    <li><a class="underline text-blue-500"
                           href="/jiris/<?= $jiri['id'] ?>"><?= $jiri['name'] ?></a></li>
                  <?php
                  endforeach ?>
              </ol>
            <?php
            endif ?>
        </section>
        <section>
          <h2 class="font-bold">Jiris passés</h2>
            <?php
            if (count($passed_jiris) > 0): ?>
              <ol>
                  <?php
                  foreach ($passed_jiris as $jiri): ?>
                    <li><a class="underline text-blue-500"
                           href="/jiris/<?= $jiri['id'] ?>"><?= $jiri['name'] ?></a></li>
                  <?php
                  endforeach ?>
              </ol>
            <?php
            endif ?>
        </section>
      </main>
      <nav id="main-menu">
        <h2 class="sr-only">Menu principal</h2>
        <ul class="flex gap-4">
          <li><a class="underline text-blue-500"
                 href="#">Jiris</a></li>
          <li><a class="underline text-blue-500"
                 href="/contacts">Contacts</a></li>
          <li><a class="underline text-blue-500"
                 href="/projects">Projets</a></li>
        </ul>
      </nav>
    </div>
  </body>
</html>