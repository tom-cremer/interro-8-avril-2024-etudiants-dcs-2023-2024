<?php

function getPDO(): PDO
{
    define('CONFIG_PATH', '.env.local.ini');

    if (file_exists(CONFIG_PATH)) {
        $config = parse_ini_file(CONFIG_PATH, true);
        $driver = $config['DATABASE']['DB_DRIVER'];
        $host = $config['DATABASE']['DB_HOST'];
        $dbname = $config['DATABASE']['DB_NAME'];
        $port = $config['DATABASE']['DB_PORT'];
        $charset = $config['DATABASE']['DB_CHARSET'];
    } else {
        die('Un problème est apparu dans la phase d’initialisation de l’application');
    }

// Établir une connection à la base de données


    $dsn = sprintf('%s:host=%s;port=%s;dbname=%s;charset=%s', $driver, $host, $port, $dbname, $charset);
    $username = 'root';
    $password = '';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    ];
    try {
        $db = new PDO($dsn, $username, $password, $options);
    } catch (PDOException $exception) {
        // Rediriger vers une page d'erreur générique qui invite à contacter l'admin
        die('Un problème de connection avec la base de données est apparu, contactez l’administrateur');
    }
    return $db;
}