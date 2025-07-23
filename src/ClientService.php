<?php

class ClientService
{
    private PDO $pdo;

    public function __construct(Database $db)
    {
        $this->pdo = $db->getConnection();
    }

    public function clientExists(string $clientId): bool
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM clients WHERE id = :id");
        $stmt->execute(['id' => $clientId]);
        return $stmt->fetchColumn() > 0;
    }
}
