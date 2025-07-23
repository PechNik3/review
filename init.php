<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/src/Database.php';

$db = new Database(__DIR__ . '/db/database.sqlite');
$pdo = $db->getConnection();

$clientId = 'abc1234';
$clientName = 'Тестовый клиент';

$stmt = $pdo->prepare("INSERT OR IGNORE INTO clients (id, name) VALUES (:id, :name)");
$stmt->execute(['id' => $clientId, 'name' => $clientName]);

echo "Клиент добавлен!";
