<?php

use Core\View;
use JetBrains\PhpStorm\NoReturn;

#[NoReturn] function dd(mixed ...$vars): void
{
    foreach ($vars as $var) {
        var_dump($var);
        echo '<hr>';
    }
    die();
}

function view(string $path, array $data = []): void
{
    View::view($path, $data);
}

function component(string $path, array $data = []): void
{
    View::component($path, $data);
}

function partials(string $path, array $data = []): void
{
    View::partials($path, $data);
}

function base_path(string $path = ''): string
{
    return BASE_PATH."/{$path}";
}

function public_path(string $path = ''): string
{
    $server = 'Http'.($_SERVER['HTTPS'] === 'on' ? 's' : '').'://'.$_SERVER['SERVER_NAME'];

    return "{$server}/$path";
}

function method(string $method): void
{
    echo <<<HTML
<input type="hidden" name="_method" value="$method">

HTML;
}

function csrf_token()
{
    $token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $token;
    echo <<<HTML
<input type="hidden" name="_csrf" value="$token">

HTML;
}