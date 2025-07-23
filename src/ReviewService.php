<?php

class ReviewService
{
    private PDO $pdo;

    public function __construct(Database $db)
    {
        $this->pdo = $db->getConnection();
    }

    public function saveReview(string $clientId, int $rating, string $comment): void
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO reviews (client_id, rating, comment, created_at)
            VALUES (:client_id, :rating, :comment, :created_at)
        ");
        $stmt->execute([
            'client_id' => $clientId,
            'rating' => $rating,
            'comment' => $comment,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
