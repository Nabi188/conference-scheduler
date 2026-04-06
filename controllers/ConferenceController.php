<?php

class ConferenceController
{
    private Conference $model;

    public function __construct()
    {
        $this->model = new Conference();
    }

    public function index(): void
    {
        $conferences = $this->model->all();
        require_once dirname(__DIR__) . '/views/conferences/index.php';
    }

    public function create(): void
    {
        require_once dirname(__DIR__) . '/views/conferences/create.php';
    }

    public function store(): void
    {
        $data = [
            'title'       => trim($_POST['title'] ?? ''),
            'description' => trim($_POST['description'] ?? ''),
            'location'    => trim($_POST['location'] ?? ''),
            'start_date'  => trim($_POST['start_date'] ?? ''),
            'end_date'    => trim($_POST['end_date'] ?? ''),
            'status'      => trim($_POST['status'] ?? 'upcoming'),
        ];

        if ($this->model->create($data)) {
            header('Location: /public/index.php?controller=conference&action=index');
            exit;
        }
    }

    public function edit(?int $id): void
    {
        if (!$id) {
            header('Location: /public/index.php?controller=conference&action=index');
            exit;
        }

        $conference = $this->model->find($id);
        if (!$conference) {
            http_response_code(404);
            echo '404 - Conference not found';
            exit;
        }

        require_once dirname(__DIR__) . '/views/conferences/edit.php';
    }

    public function update(?int $id): void
    {
        if (!$id) {
            header('Location: /public/index.php?controller=conference&action=index');
            exit;
        }

        $data = [
            'title'       => trim($_POST['title'] ?? ''),
            'description' => trim($_POST['description'] ?? ''),
            'location'    => trim($_POST['location'] ?? ''),
            'start_date'  => trim($_POST['start_date'] ?? ''),
            'end_date'    => trim($_POST['end_date'] ?? ''),
            'status'      => trim($_POST['status'] ?? 'upcoming'),
        ];

        if ($this->model->update($id, $data)) {
            header('Location: /public/index.php?controller=conference&action=index');
            exit;
        }
    }

    public function delete(?int $id): void
    {
        if ($id && $this->model->delete($id)) {
            header('Location: /public/index.php?controller=conference&action=index');
            exit;
        }
    }
}
