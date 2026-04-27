<?php

class RoomController
{
    private Room $model;

    public function __construct()
    {
        $this->model = new Room();
    }

    public function index(): void
    {
        $rooms = $this->model->all();
        require_once dirname(__DIR__) . '/views/rooms/index.php';
    }

    public function create(): void
    {
        require_once dirname(__DIR__) . '/views/rooms/create.php';
    }

    public function store(): void
    {
        $data = [
            'name'        => trim($_POST['name'] ?? ''),
            'capacity'    => (int)($_POST['capacity'] ?? 0),
            'location'    => trim($_POST['location'] ?? ''),
            'description' => trim($_POST['description'] ?? ''),
        ];

        $errors = [];
        if (empty($data['name'])) {
            $errors[] = 'Name is required.';
        }
        if (empty($data['location'])) {
            $errors[] = 'Location is required.';
        }
        if ($data['capacity'] <= 0) {
            $errors[] = 'Capacity must be greater than 0.';
        }

        if (!empty($errors)) {
            require_once dirname(__DIR__) . '/views/rooms/create.php';
            return;
        }

        if ($this->model->create($data)) {
            header('Location: ' . route('room'));
            exit;
        }
    }

    public function edit(?int $id): void
    {
        if (!$id) {
            header('Location: ' . route('room'));
            exit;
        }

        $room = $this->model->find($id);
        if (!$room) {
            http_response_code(404);
            echo '404 - Room not found';
            exit;
        }

        require_once dirname(__DIR__) . '/views/rooms/edit.php';
    }

    public function update(?int $id): void
    {
        if (!$id) {
            header('Location: ' . route('room'));
            exit;
        }

        $data = [
            'name'        => trim($_POST['name'] ?? ''),
            'capacity'    => (int)($_POST['capacity'] ?? 0),
            'location'    => trim($_POST['location'] ?? ''),
            'description' => trim($_POST['description'] ?? ''),
        ];

        $errors = [];
        if (empty($data['name'])) {
            $errors[] = 'Name is required.';
        }
        if (empty($data['location'])) {
            $errors[] = 'Location is required.';
        }
        if ($data['capacity'] <= 0) {
            $errors[] = 'Capacity must be greater than 0.';
        }

        if (!empty($errors)) {
            $original = $this->model->find($id) ?: [];
            $room = array_merge($original, $data);
            $room['id'] = $id;
            require_once dirname(__DIR__) . '/views/rooms/edit.php';
            return;
        }

        if ($this->model->update($id, $data)) {
            header('Location: ' . route('room'));
            exit;
        }
    }

    public function delete(?int $id): void
    {
        if ($id && $this->model->delete($id)) {
            header('Location: ' . route('room'));
            exit;
        }
    }
}
