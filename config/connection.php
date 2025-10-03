<?php
// Build PDO connection from environment variables (e.g., Coolify)
$servername = getenv('DB_HOST') ?: '127.0.0.1';
$username = getenv('DB_USERNAME') ?: 'root';
$password = getenv('DB_PASSWORD') ?: '';
$dbname = getenv('DB_DATABASE') ?: 'form_db';
$port = getenv('DB_PORT') ?: '3306';

// Force TCP by specifying host and port; include charset to avoid collation issues
$dsn = "mysql:host={$servername};port={$port};dbname={$dbname};charset=utf8mb4";

try {
    $conn = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $e) {
    // Do not echo anything to avoid 'headers already sent'; log instead
    error_log('DB connection failed: ' . $e->getMessage());
    http_response_code(500);
    exit;
}
