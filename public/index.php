<?php
session_start();

require_once dirname(__DIR__) . '/config/database.php';
require_once dirname(__DIR__) . '/config/auth.php';
require_once dirname(__DIR__) . '/config/helpers.php';

require_once dirname(__DIR__) . '/models/Conference.php';
require_once dirname(__DIR__) . '/models/Session.php';
require_once dirname(__DIR__) . '/models/Speaker.php';
require_once dirname(__DIR__) . '/models/Room.php';

require_once dirname(__DIR__) . '/controllers/DashboardController.php';
require_once dirname(__DIR__) . '/controllers/ConferenceController.php';
require_once dirname(__DIR__) . '/controllers/SessionController.php';
require_once dirname(__DIR__) . '/controllers/SpeakerController.php';
require_once dirname(__DIR__) . '/controllers/RoomController.php';

$controller = $_GET['controller'] ?? 'conference';
$action     = $_GET['action']     ?? 'index';
$id         = isset($_GET['id'])  ? (int)$_GET['id'] : null;

if ($controller === 'auth') {
    if ($action === 'login') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $password = trim($_POST['password'] ?? '');
            if (login($username, $password)) {
                header('Location: /public/index.php?controller=dashboard&action=index');
                exit;
            }
            $error = 'Username or password is incorrect';
        }
        require_once dirname(__DIR__) . '/views/auth/login.php';
    } elseif ($action === 'logout') {
        logout();
        header('Location: /public/index.php?controller=auth&action=login');
        exit;
    }
    exit;
}

requireAuth();

$controllers = [
    'dashboard'   => new DashboardController(),
    'conference' => new ConferenceController(),
    'session'    => new SessionController(),
    'speaker'    => new SpeakerController(),
    'room'       => new RoomController(),
];

if (!isset($controllers[$controller])) {
    http_response_code(404);
    echo '404 - Page not found';
    exit;
}

$ctrl = $controllers[$controller];

match ($action) {
    'index'  => $ctrl->index(),
    'create' => $ctrl->create(),
    'store'  => $ctrl->store(),
    'edit'   => $ctrl->edit($id),
    'update' => $ctrl->update($id),
    'delete' => $ctrl->delete($id),
    default  => (function () {
        http_response_code(404);
        echo '404';
    })()
};
