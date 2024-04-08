<?php

namespace App\Http\controllers;

use Core\Exceptions\FileNotFoundException;
use App\models\User;
use Core\Response;
use Core\Validator;


// Login
class RegisteredUserController
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
        view('register.index');
    }

    public function store(): void
    {
        $hashed_password = password_hash($_POST['psw'], PASSWORD_DEFAULT);

        $data = Validator::check([
            'email' => strtolower($_POST['email']),
            'password' => $hashed_password
        ]);



    }

}