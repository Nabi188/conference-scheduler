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
            'email'      => trim($_POST['email'] ?? ''),
            'bio'        => trim($_POST['bio'] ?? ''),
            'company'    => trim($_POST['company'] ?? ''),
            'job_title'  => trim($_POST['job_title'] ?? ''),
            'avatar_url' => trim($_POST['avatar_url'] ?? ''),
        ];

        if ($this->model->create($data)) {
            header('Location: /public/index.php?controller=speaker&action=index');
            exit;
        }
    }

    public function edit(?int $id): void
    {
        if (!$id) {
            header('Location: /public/index.php?controller=speaker&action=index');
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
            header('Location: /public/index.php?controller=speaker&action=index');
            exit;
        }

        $data = [
            'name'       => trim($_POST['name'] ?? ''),
            'email'      => trim($_POST['email'] ?? ''),
            'bio'        => trim($_POST['bio'] ?? ''),
            'company'    => trim($_POST['company'] ?? ''),
            'job_title'  => trim($_POST['job_title'] ?? ''),
            'avatar_url' => trim($_POST['avatar_url'] ?? ''),
        ];

        if ($this->model->update($id, $data)) {
            header('Location: /public/index.php?controller=speaker&action=index');
            exit;
        }
    }

    public function delete(?int $id): void
    {
        if ($id && $this->model->delete($id)) {
            header('Location: /public/index.php?controller=speaker&action=index');
            exit;
        }
    }
}
