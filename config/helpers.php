<?php

function url(string $path = ''): string
{
    $baseUrl = 'http://localhost:8000';
    return $baseUrl . '/' . ltrim($path, '/');
}

function route(string $controller, string $action = 'index', ?int $id = null): string
{
    $routes = [
        'dashboard' => '/dashboard',
        'conference' => '/conferences',
        'session' => '/sessions',
        'speaker' => '/speakers',
        'room' => '/rooms',
        'auth' => ''
    ];

    $path = $routes[$controller] ?? '/';

    if ($controller === 'auth') {
        return url($action);
    }

    if ($action === 'index') {
        return url($path);
    }

    if ($id) {
        return url("{$path}/{$id}/{$action}");
    }

    return url("{$path}/{$action}");
}
