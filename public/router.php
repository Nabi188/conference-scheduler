<?php

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
    return false;
}

$_GET['controller'] = 'dashboard';
$_GET['action'] = 'index';

$parts = explode('/', trim($uri, '/'));

if (!empty($parts[0])) {
    switch ($parts[0]) {
        case 'dashboard':
            $_GET['controller'] = 'dashboard';
            break;
        case 'conferences':
            $_GET['controller'] = 'conference';
            if (isset($parts[1]) && is_numeric($parts[1])) {
                $_GET['id'] = (int)$parts[1];
                $_GET['action'] = isset($parts[2]) ? $parts[2] : 'edit';
            } elseif (isset($parts[1])) {
                $_GET['action'] = $parts[1]; // create, index
            }
            break;
        case 'sessions':
            $_GET['controller'] = 'session';
            if (isset($parts[1]) && is_numeric($parts[1])) {
                $_GET['id'] = (int)$parts[1];
                $_GET['action'] = isset($parts[2]) ? $parts[2] : 'edit';
            } elseif (isset($parts[1])) {
                $_GET['action'] = $parts[1];
            }
            break;
        case 'speakers':
            $_GET['controller'] = 'speaker';
            if (isset($parts[1]) && is_numeric($parts[1])) {
                $_GET['id'] = (int)$parts[1];
                $_GET['action'] = isset($parts[2]) ? $parts[2] : 'edit';
            } elseif (isset($parts[1])) {
                $_GET['action'] = $parts[1];
            }
            break;
        case 'rooms':
            $_GET['controller'] = 'room';
            if (isset($parts[1]) && is_numeric($parts[1])) {
                $_GET['id'] = (int)$parts[1];
                $_GET['action'] = isset($parts[2]) ? $parts[2] : 'edit';
            } elseif (isset($parts[1])) {
                $_GET['action'] = $parts[1];
            }
            break;
        case 'login':
            $_GET['controller'] = 'auth';
            $_GET['action'] = 'login';
            break;
        case 'logout':
            $_GET['controller'] = 'auth';
            $_GET['action'] = 'logout';
            break;
    }
}

require __DIR__ . '/index.php';
