<?php

class DashboardController
{
    private Conference $conferenceModel;
    private Session $sessionModel;
    private Speaker $speakerModel;
    private Room $roomModel;

    public function __construct()
    {
        $this->conferenceModel = new Conference();
        $this->sessionModel = new Session();
        $this->speakerModel = new Speaker();
        $this->roomModel = new Room();
    }

    public function index(): void
    {
        // Statistics
        $conferenceStats = $this->conferenceModel->getStats();
        $sessionStats = $this->sessionModel->getStats();
        $totalSpeakers = $this->speakerModel->count();
        $totalRooms = $this->roomModel->count();

        // Upcoming data
        $upcomingConferences = $this->conferenceModel->getUpcoming(5);
        $todaySessions = $this->sessionModel->getTodaySessions();
        $recentSessions = $this->sessionModel->getRecent(5);

        require_once dirname(__DIR__) . '/views/dashboard/index.php';
    }
}
