<?php
// Simple PHP info page to test the setup
echo "<h1>Docker Compose Web Stack</h1>";
echo "<p>PHP Version: " . phpversion() . "</p>";
echo "<p>Server Time: " . date('Y-m-d H:i:s') . "</p>";

// Test database connection
try {
    $host = 'db';
    $dbname = $_ENV['DB_NAME'] ?? 'app_db';
    $username = $_ENV['DB_USER'] ?? 'app_user';
    $password = $_ENV['DB_PASSWORD'] ?? 'app_password';
    
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<p style='color: green;'>✅ Database connection successful!</p>";
    echo "<p>Database: $dbname</p>";
    
    // Show database version
    $stmt = $pdo->query('SELECT VERSION() as version');
    $version = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<p>MySQL Version: " . $version['version'] . "</p>";
    
} catch(PDOException $e) {
    echo "<p style='color: red;'>❌ Database connection failed: " . $e->getMessage() . "</p>";
}

// Show PHP info (commented out for security)
// phpinfo();
?>