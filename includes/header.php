<?php 
require_once __DIR__ . '/../config.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizini</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<nav class="nav">
    <h1>QUIZINI</h1>
    <?php if (isset($_SESSION['user_id'])): ?>
        <div>
            <span><?= htmlspecialchars($_SESSION['username'] ?? 'Player') ?></span>
            <a href="index.php?page=home" style="margin-left:20px;">Home</a>
            <a href="index.php?page=logout" style="margin-left:15px; color:#ff6666;">Logout</a>
        </div>
    <?php endif; ?>
</nav>