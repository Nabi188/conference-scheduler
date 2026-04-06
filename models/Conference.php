<?php

class Conference
{
    private PDO $db;

    public function __construct()
    {
        $this->db = getDB();
    }

    public function all(): array
    {
        return $this->db
            ->query('SELECT * FROM conferences ORDER BY start_date DESC')
            ->fetchAll();
    }

    public function find(int $id): array|false
    {
        $stmt = $this->db->prepare('SELECT * FROM conferences WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare('
            INSERT INTO conferences (title, description, location, start_date, end_date, status)
            VALUES (:title, :description, :location, :start_date, :end_date, :status)
        ');
        return $stmt->execute($data);
    }

    public function update(int $id, array $data): bool
    {
        $data['id'] = $id;
        $stmt = $this->db->prepare('
            UPDATE conferences
            SET title = :title,
                description = :description,
                location = :location,
                start_date = :start_date,
                end_date = :end_date,
                status = :status
            WHERE id = :id
        ');
        return $stmt->execute($data);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM conferences WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }
}
