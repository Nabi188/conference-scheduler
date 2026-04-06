<?php

class SessionController
{
    private Session $model;
    private Conference $conferenceModel;
    private Speaker $speakerModel;
    private Room $roomModel;

    public function __construct()
    {
        $this->model = new Session();
        $this->conferenceModel = new Conference();
        $this->speakerModel = new Speaker();
        $this->roomModel = new Room();
    }

    public function index(): void
    {
        $sessions = $this->model->all();
        require_once dirname(__DIR__) . '/views/sessions/index.php';
    }

    public function create(): void
    {
        $conferences = $this->conferenceModel->all();
        $speakers = $this->speakerModel->all();
        $rooms = $this->roomModel->all();
        require_once dirname(__DIR__) . '/views/sessions/create.php';
    }

    public function store(): void
    {
        $data = [
            'conference_id' => (int)($_POST['conference_id'] ?? 0),
            'speaker_id'    => (int)($_POST['speaker_id'] ?? 0),
            'room_id'       => (int)($_POST['room_id'] ?? 0),
            'title'         => trim($_POST['title'] ?? ''),
            'description'   => trim($_POST['description'] ?? ''),
            'start_time'    => trim($_POST['start_time'] ?? ''),
            'end_time'      => trim($_POST['end_time'] ?? ''),
            'status'        => trim($_POST['status'] ?? 'scheduled'),
        ];

        if ($this->model->create($data)) {
            header('Location: /public/index.php?controller=session&action=index');
            exit;
        }
    }

    public function edit(?int $id): void
    {
        if (!$id) {
            header('Location: /public/index.php?controller=session&action=index');
            exit;
        }

        $session = $this->model->find($id);
        if (!$session) {
            http_response_code(404);
            echo '404 - Session not found';
            exit;
        }

        $conferences = $this->conferenceModel->all();
        $speakers = $this->speakerModel->all();
        $rooms = $this->roomModel->all();
        require_once dirname(__DIR__) . '/views/sessions/edit.php';
    }

    public function update(?int $id): void
    {
        if (!$id) {
            header('Location: /public/index.php?controller=session&action=index');
            exit;
        }

        $data = [
            'conference_id' => (int)($_POST['conference_id'] ?? 0),
            'speaker_id'    => (int)($_POST['speaker_id'] ?? 0),
            'room_id'       => (int)($_POST['room_id'] ?? 0),
            'title'         => trim($_POST['title'] ?? ''),
            'description'   => trim($_POST['description'] ?? ''),
            'start_time'    => trim($_POST['start_time'] ?? ''),
            'end_time'      => trim($_POST['end_time'] ?? ''),
            'status'        => trim($_POST['status'] ?? 'scheduled'),
        ];

        if ($this->model->update($id, $data)) {
            header('Location: /public/index.php?controller=session&action=index');
            exit;
        }
    }

    public function delete(?int $id): void
    {
        if ($id && $this->model->delete($id)) {
            header('Location: /public/index.php?controller=session&action=index');
            exit;
        }
    }
}
