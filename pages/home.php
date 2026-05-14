<?php 
require __DIR__ . '/../includes/header.php'; 
$user_id = $_SESSION['user_id'];
?>

<div>
    <h1>QUIZINI</h1>
    <p>SCROLL DOWN TO VIEW QUIZZES</p>
</div>

<?php
$quizzes = mysqli_query($conn, "SELECT * FROM quizzes");

while ($quiz = mysqli_fetch_assoc($quizzes)):
    
    // Get the BEST score for this user and quiz
    $best_result = mysqli_query($conn, "
        SELECT score, total 
        FROM user_results 
        WHERE user_id = $user_id 
          AND quiz_id = {$quiz['id']} 
        ORDER BY score DESC 
        LIMIT 1
    ");
    $best = mysqli_fetch_assoc($best_result);
?>

<div>
    <div>
        <h2><?= htmlspecialchars($quiz['title']) ?></h2>
        <p><?= htmlspecialchars($quiz['description']) ?></p>
        
        <?php if ($best): ?>
            <p>
                Best Score: <strong><?= $best['score'] ?>/<?= $best['total'] ?></strong>
            </p>
        <?php endif; ?>
        
        <a href="index.php?page=quiz&id=<?= $quiz['id'] ?>" class="btn">START QUIZ</a>
    </div>
</div>

<?php endwhile; ?>

<?php require __DIR__ . '/../includes/footer.php'; ?>