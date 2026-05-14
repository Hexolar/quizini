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
    
    <?php if (in_array($current_page, ['welcome', 'login', 'register'])): ?>
        <!-- Auth Pages -->
        <link rel="stylesheet" href="/quizini/assets/css/welcome.css">
        
    <?php elseif ($current_page === 'quiz'): ?>
        <!-- Quiz Page -->
        <link rel="stylesheet" href="/quizini/assets/css/quiz.css">
        
    <?php else: ?>
        <!-- Home, Results, etc. -->
        <link rel="stylesheet" href="/quizini/assets/css/main.css">
    <?php endif; ?>
</head>
<body>

<?php if (!in_array($current_page, ['welcome', 'login', 'register'])): ?>
<nav class="nav">
    <?php if (isset($_SESSION['user_id'])): ?>
        <div>
            <span><?= htmlspecialchars($_SESSION['username'] ?? 'Player') ?></span>
            <a href="index.php?page=home">Home</a>
            <a href="index.php?page=logout" style="color:#ff6666; margin-left:15px;">Logout</a>
        </div>
    <?php endif; ?>
</nav>
<?php endif; ?>