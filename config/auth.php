<?php

function login(string $username, string $password): bool
{
    if ($username === $_ENV['ADMIN_USER'] && $password === $_ENV['ADMIN_PASS']) {
        $_SESSION['is_admin'] = true;
        $_SESSION['admin_name'] = 'Admin';
        return true;
    }
    return false;
}

function logout(): void
{
    $_SESSION = [];
    session_destroy();
}

function isLoggedIn(): bool
{
    return !empty($_SESSION['is_admin']);
}

function requireAuth(): void
{
    if (!isLoggedIn()) {
        header('Location: /public/index.php?controller=auth&action=login');
        exit;
    }
}
