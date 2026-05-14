<?php 
require_once __DIR__ . '/../config.php'; 

$current_page = $_GET['page'] ?? 'welcome';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizini</title>
    <link rel="stylesheet" href="/quizini/assets/css/style.css">
</head>
<body>

<?php if (!in_array($current_page, ['welcome', 'login', 'register'])): ?>
<nav>
    <?php if (isset($_SESSION['user_id'])): ?>
        <div class="nav-inner">
            <span class="nav-username"><?= htmlspecialchars($_SESSION['username'] ?? 'Player') ?></span>
            <a href="index.php?page=home">Home</a>
            <a href="index.php?page=logout">Logout</a>
        </div>
    <?php endif; ?>
</nav>
<?php endif; ?>