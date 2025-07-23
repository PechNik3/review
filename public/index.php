<?php
require_once __DIR__ . '/../src/Database.php';
require_once __DIR__ . '/../src/ClientService.php';
require_once __DIR__ . '/../src/ReviewService.php';

$db = new Database(__DIR__ . '/../db/database.sqlite');
$clientService = new ClientService($db);
$reviewService = new ReviewService($db);

$clientId = $_GET['id'] ?? null;

if (!$clientId || !$clientService->clientExists($clientId)) {
    include __DIR__ . '/../templates/error.php';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rating = (int) ($_POST['rating'] ?? 0);
    $comment = trim($_POST['comment'] ?? '');

    $errors = [];

    if ($rating < 1 || $rating > 5) {
        $errors[] = 'Оценка должна быть от 1 до 5.';
    }

    if (mb_strlen($comment) > 500) {
        $errors[] = 'Комментарий слишком длинный.';
    }

    if (empty($errors)) {
        $reviewService->saveReview($clientId, $rating, $comment);
        echo "<p>Спасибо за ваш отзыв!</p>";
        exit;
    }
}

include __DIR__ . '/../templates/form.php';
