<?php

class Speaker
{
    private PDO $db;

    public function __construct()
    {
        $this->db = getDB();
    }

    public function all(): array
    {
        return $this->db
            ->query('SELECT * FROM speakers ORDER BY name ASC')
            ->fetchAll();
    }

    public function find(int $id): array|false
    {
        $stmt = $this->db->prepare('SELECT * FROM speakers WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare('
            INSERT INTO speakers (name, email, bio, company, job_title, avatar_url)
            VALUES (:name, :email, :bio, :company, :job_title, :avatar_url)
        ');
        return $stmt->execute($data);
    }

    public function update(int $id, array $data): bool
    {
        $data['id'] = $id;
        $stmt = $this->db->prepare('
            UPDATE speakers
            SET name       = :name,
                email      = :email,
                bio        = :bio,
                company    = :company,
                job_title  = :job_title,
                avatar_url = :avatar_url
            WHERE id = :id
        ');
        return $stmt->execute($data);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM speakers WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }
}
