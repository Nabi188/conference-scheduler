<?php
class SpeakerController
{
    private Speaker $model;

    public function __construct()
    {
        $this->model = new Speaker();
    }

    public function index(): void
    {
        $speakers = $this->model->all();
        require_once dirname(__DIR__) . '/views/speakers/index.php';
    }

    public function create(): void
    {
        require_once dirname(__DIR__) . '/views/speakers/create.php';
    }

    public function store(): void
    {
        $data = [
            'name'       => trim($_POST['name'] ?? ''),
            'email'      => trim($_POST['email'] ?? '') ?: null,
            'bio'        => trim($_POST['bio'] ?? '') ?: null,
            'company'    => trim($_POST['company'] ?? '') ?: null,
            'job_title'  => trim($_POST['job_title'] ?? '') ?: null,
            'avatar_url' => trim($_POST['avatar_url'] ?? '') ?: null,
        ];

        $errors = [];
        if (empty($data['name'])) {
            $errors[] = 'Name is required.';
        }
        if (!empty($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid email format.';
        }
        if (!empty($data['avatar_url']) && !filter_var($data['avatar_url'], FILTER_VALIDATE_URL)) {
            $errors[] = 'Invalid avatar URL.';
        }

        if (!empty($errors)) {
            require_once dirname(__DIR__) . '/views/speakers/create.php';
            return;
        }

        $this->model->create($data);
        header('Location: ' . route('speaker'));
        exit;
    }

    public function edit(?int $id): void
    {
        if (!$id) {
            header('Location: ' . route('speaker'));
            exit;
        }

        $speaker = $this->model->find($id);
        if (!$speaker) {
            http_response_code(404);
            echo '404 - Speaker not found';
            exit;
        }

        require_once dirname(__DIR__) . '/views/speakers/edit.php';
    }

    public function update(?int $id): void
    {
        if (!$id) {
            header('Location: ' . route('speaker'));
            exit;
        }

        $data = [
            'name'       => trim($_POST['name'] ?? ''),
            'email'      => trim($_POST['email'] ?? '') ?: null,
            'bio'        => trim($_POST['bio'] ?? '') ?: null,
            'company'    => trim($_POST['company'] ?? '') ?: null,
            'job_title'  => trim($_POST['job_title'] ?? '') ?: null,
            'avatar_url' => trim($_POST['avatar_url'] ?? '') ?: null,
        ];

        $errors = [];
        if (empty($data['name'])) {
            $errors[] = 'Name is required.';
        }
        if (!empty($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid email format.';
        }
        if (!empty($data['avatar_url']) && !filter_var($data['avatar_url'], FILTER_VALIDATE_URL)) {
            $errors[] = 'Invalid avatar URL.';
        }

        if (!empty($errors)) {
            $original = $this->model->find($id) ?: [];
            $speaker = array_merge($original, $data);
            $speaker['id'] = $id;
            require_once dirname(__DIR__) . '/views/speakers/edit.php';
            return;
        }

        $this->model->update($id, $data);
        header('Location: ' . route('speaker'));
        exit;
    }

    public function delete(?int $id): void
    {
        if ($id) {
            $this->model->delete($id);
        }
        header('Location: ' . route('speaker'));
        exit;
    }
}
