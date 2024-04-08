<?php

namespace App\Http\controllers;

use Core\Exceptions\FileNotFoundException;
use App\models\User;



// Login
class AuthenticatedSessionController
{
    private User $user;

    public function __construct()
    {
        try {
            $this->user = new User(base_path('.env.local.ini'));
        } catch (FileNotFoundException $exception) {
            die($exception->getMessage());
        }
    }


    public function show(): void
    {
        view('login.index');
    }







}