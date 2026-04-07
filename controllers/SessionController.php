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
        // Get all sessions with joined data
        $sessions = $this->model->getAll();

        // Calculate stats
        $stats = [
            'total' => count($sessions),
            'ongoing' => 0,
            'today' => 0,
            'week' => 0
        ];

        $now = new DateTime();
        $today = $now->format('Y-m-d');
        $weekEnd = (clone $now)->modify('+7 days')->format('Y-m-d');

        foreach ($sessions as $session) {
            $startTime = new DateTime($session['start_time']);
            $endTime = new DateTime($session['end_time']);
            $sessionDate = $startTime->format('Y-m-d');

            // Check ongoing
            if ($now >= $startTime && $now <= $endTime) {
                $stats['ongoing']++;
            }

            // Check today
            if ($sessionDate === $today) {
                $stats['today']++;
            }

            // Check this week
            if ($sessionDate >= $today && $sessionDate <= $weekEnd) {
                $stats['week']++;
            }
        }

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
            'speaker_id'    => !empty($_POST['speaker_id']) ? (int)$_POST['speaker_id'] : null,
            'room_id'       => !empty($_POST['room_id']) ? (int)$_POST['room_id'] : null,
            'title'         => trim($_POST['title'] ?? ''),
            'description'   => trim($_POST['description'] ?? ''),
            'start_time'    => trim($_POST['start_time'] ?? ''),
            'end_time'      => trim($_POST['end_time'] ?? ''),
        ];

        if ($this->model->create($data)) {
            header('Location: ' . route('session'));
            exit;
        }
    }

    public function edit(?int $id): void
    {
        if (!$id) {
            header('Location: ' . route('session'));
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
            header('Location: ' . route('session'));
            exit;
        }

        $data = [
            'conference_id' => (int)($_POST['conference_id'] ?? 0),
            'speaker_id'    => !empty($_POST['speaker_id']) ? (int)$_POST['speaker_id'] : null,
            'room_id'       => !empty($_POST['room_id']) ? (int)$_POST['room_id'] : null,
            'title'         => trim($_POST['title'] ?? ''),
            'description'   => trim($_POST['description'] ?? ''),
            'start_time'    => trim($_POST['start_time'] ?? ''),
            'end_time'      => trim($_POST['end_time'] ?? ''),
        ];

        if ($this->model->update($id, $data)) {
            header('Location: ' . route('session'));
            exit;
        }
    }

    public function delete(?int $id): void
    {
        if ($id && $this->model->delete($id)) {
            header('Location: ' . route('session'));
            exit;
        }
    }
}
