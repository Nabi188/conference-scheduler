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

    public function find(int $id): array|false
    {
        $stmt = $this->db->prepare('
            SELECT s.*,
                   c.title  AS conference_title,
                   sp.name  AS speaker_name,
                   r.name   AS room_name
            FROM sessions s
            LEFT JOIN conferences c  ON s.conference_id = c.id
            LEFT JOIN speakers    sp ON s.speaker_id    = sp.id
            LEFT JOIN rooms       r  ON s.room_id       = r.id
            WHERE s.id = :id
        ');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare('
            INSERT INTO sessions
                (conference_id, speaker_id, room_id, title, description, start_time, end_time, status)
            VALUES
                (:conference_id, :speaker_id, :room_id, :title, :description, :start_time, :end_time, :status)
        ');
        return $stmt->execute($data);
    }

    public function update(int $id, array $data): bool
    {
        $data['id'] = $id;
        $stmt = $this->db->prepare('
            UPDATE sessions
            SET conference_id = :conference_id,
                speaker_id    = :speaker_id,
                room_id       = :room_id,
                title         = :title,
                description   = :description,
                start_time    = :start_time,
                end_time      = :end_time,
                status        = :status
            WHERE id = :id
        ');
        return $stmt->execute($data);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM sessions WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }

    public function findByConference(int $conferenceId): array
    {
        $stmt = $this->db->prepare('
            SELECT s.*,
                   sp.name AS speaker_name,
                   r.name  AS room_name
            FROM sessions s
            LEFT JOIN speakers sp ON s.speaker_id = sp.id
            LEFT JOIN rooms    r  ON s.room_id    = r.id
            WHERE s.conference_id = :conference_id
            ORDER BY s.start_time ASC
        ');
        $stmt->execute(['conference_id' => $conferenceId]);
        return $stmt->fetchAll();
    }
}
