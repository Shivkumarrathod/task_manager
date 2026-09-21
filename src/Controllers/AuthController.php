<?php

namespace App\Controllers;

use App\Core\Controller;

class AuthController extends Controller
{
    public function login(): void
    {
        $error = $_SESSION['login_error'] ?? null;
        unset($_SESSION['login_error']);

        $this->render('auth/login', [
            'error' => $error
        ]);
    }

    public function authenticate(): void
    {
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if (!empty($email) && !empty($password)) {
            $_SESSION['user'] = [
                'email' => $email,
                'name' => explode('@', $email)[0]
            ];
            $this->redirect('/tasks');
        } else {
            $_SESSION['login_error'] = 'Please enter both email and password.';
            $this->redirect('/login');
        }
    }

    public function logout(): void
    {
        unset($_SESSION['user']);
        $this->redirect('/');
    }
}
