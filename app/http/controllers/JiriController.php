<?php

namespace App\Http\Controllers;

use Core\Database;
use Core\Exceptions\FileNotFoundException;

class JiriController
{
    private Database $db;

    public function __construct()
    {
        try {
            $this->db = new Database(base_path('.env.local.ini'));
        } catch (FileNotFoundException $exception) {
            die($exception->getMessage());
        }
    }

    public function index(): void
    {
        $statement_upcoming_jiris =
            $this->db->query('SELECT * FROM jiris WHERE starting_at > current_timestamp');
        $upcoming_jiris =
            $statement_upcoming_jiris->fetchAll();

        $statement_passed_jiris =
            $this->db->query('SELECT * FROM jiris WHERE starting_at < current_timestamp');
        $passed_jiris =
            $statement_passed_jiris->fetchAll();

        view('jiris.index', compact('upcoming_jiris', 'passed_jiris'));
    }

    public function create()
    {
        echo "display a creation form for jiris";
    }
}