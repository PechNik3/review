<?php

class Database
{
    private PDO $pdo;

    public function __construct(string $dbPath)
    {
        $this->pdo = new PDO('sqlite:' . $dbPath);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->initialize();
    }

    public function getConnection(): PDO
    {
        return $this->pdo;
    }

    private function initialize(): void
    {
        $this->pdo->exec("
            CREATE TABLE IF NOT EXISTS clients (
                id TEXT PRIMARY KEY,
                name TEXT
            );
            
            CREATE TABLE IF NOT EXISTS reviews (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                client_id TEXT,
                rating INTEGER,
                comment TEXT,
                created_at TEXT
            );
        ");
    }
}
