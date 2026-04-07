<?php

class Session
{
    private PDO $db;

    public function __construct()
    {
        $this->db = getDB();
    }

    public function all(): array
    {
        return $this->db->query('
            SELECT s.*,
                   c.title      AS conference_title,
                   sp.name      AS speaker_name,
                   r.name       AS room_name
            FROM sessions s
            LEFT JOIN conferences c  ON s.conference_id = c.id
            LEFT JOIN speakers    sp ON s.speaker_id    = sp.id
            LEFT JOIN rooms       r  ON s.room_id       = r.id
            ORDER BY s.start_time ASC
        ')->fetchAll();
    }

    public function getAll(): array
    {
        $stmt = $this->db->query("
            SELECT s.*, 
                   c.title as conference_title,
                   sp.name as speaker_name,
                   r.name as room_name
            FROM sessions s
            LEFT JOIN conferences c ON s.conference_id = c.id
            LEFT JOIN speakers sp ON s.speaker_id = sp.id
            LEFT JOIN rooms r ON s.room_id = r.id
            ORDER BY s.start_time DESC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id): array|false
    {
        $stmt = $this->db->prepare('
            SELECT s.*
            FROM sessions s
            WHERE s.id = :id
        ');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare('
            INSERT INTO sessions
                (conference_id, speaker_id, room_id, title, description, start_time, end_time, status)
            VALUES
                (:conference_id, :speaker_id, :room_id, :title, :description, :start_time, :end_time, :status)
        ');
        return $stmt->execute([
            'conference_id' => $data['conference_id'],
            'speaker_id' => $data['speaker_id'] ?: null,
            'room_id' => $data['room_id'] ?: null,
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
            'status' => $data['status'] ?? 'scheduled'
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $stmt = $this->db->prepare('
            UPDATE sessions
            SET conference_id = :conference_id,
                speaker_id    = :speaker_id,
                room_id       = :room_id,
                title         = :title,
                description   = :description,
                start_time    = :start_time,
                end_time      = :end_time,
                status        = :status,
                updated_at    = NOW()
            WHERE id = :id
        ');
        return $stmt->execute([
            'id' => $id,
            'conference_id' => $data['conference_id'],
            'speaker_id' => $data['speaker_id'] ?: null,
            'room_id' => $data['room_id'] ?: null,
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
            'status' => $data['status'] ?? 'scheduled'
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM sessions WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }

    public function getTodaySessions(): array
    {
        $stmt = $this->db->prepare("
            SELECT s.*, c.title as conference_title, sp.name as speaker_name, r.name as room_name
            FROM sessions s
            LEFT JOIN conferences c ON s.conference_id = c.id
            LEFT JOIN speakers sp ON s.speaker_id = sp.id
            LEFT JOIN rooms r ON s.room_id = r.id
            WHERE DATE(s.start_time) = CURRENT_DATE
            ORDER BY s.start_time ASC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUpcomingSessions(int $limit = 5): array
    {
        $stmt = $this->db->prepare("
            SELECT s.*, c.title as conference_title, sp.name as speaker_name, r.name as room_name
            FROM sessions s
            LEFT JOIN conferences c ON s.conference_id = c.id
            LEFT JOIN speakers sp ON s.speaker_id = sp.id
            LEFT JOIN rooms r ON s.room_id = r.id
            WHERE s.start_time > NOW()
            ORDER BY s.start_time ASC
            LIMIT ?
        ");
        $stmt->execute([$limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStats(): array
    {
        $stmt = $this->db->query("
            SELECT 
                COUNT(*) as total,
                COUNT(CASE WHEN status = 'scheduled' THEN 1 END) as scheduled,
                COUNT(CASE WHEN status = 'ongoing' THEN 1 END) as ongoing,
                COUNT(CASE WHEN status = 'done' THEN 1 END) as completed,
                COUNT(CASE WHEN status = 'cancelled' THEN 1 END) as cancelled
            FROM sessions
        ");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getRecent(int $limit = 5): array
    {
        $stmt = $this->db->prepare("
            SELECT s.*, c.title as conference_title, sp.name as speaker_name
            FROM sessions s
            LEFT JOIN conferences c ON s.conference_id = c.id
            LEFT JOIN speakers sp ON s.speaker_id = sp.id
            ORDER BY s.created_at DESC
            LIMIT ?
        ");
        $stmt->execute([$limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function count(): int
    {
        $stmt = $this->db->query("SELECT COUNT(*) FROM sessions");
        return (int)$stmt->fetchColumn();
    }

    public function countByStatus(string $status): int
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM sessions WHERE status = ?");
        $stmt->execute([$status]);
        return (int)$stmt->fetchColumn();
    }
}
