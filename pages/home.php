<?php require __DIR__ . '/../includes/header.php'; ?>

<!-- Hero -->
<div class="home-hero">
    <h1>QUIZINI</h1>
    <p class="scroll-prompt">SCROLL DOWN TO VIEW QUIZZES</p>
</div>

<!-- Quiz Sections -->
<?php
$quizzes = mysqli_query($conn, "SELECT * FROM quizzes");
while ($quiz = mysqli_fetch_assoc($quizzes)):
    $result = mysqli_query($conn, "SELECT score, total FROM user_results WHERE user_id = {$_SESSION['user_id']} AND quiz_id = {$quiz['id']} ORDER BY completed_at DESC LIMIT 1");
    $best = mysqli_fetch_assoc($result);
?>
<div class="quiz-section">
    <div class="quiz-content">
        <h2><?= htmlspecialchars($quiz['title']) ?></h2>
        <p><?= htmlspecialchars($quiz['description']) ?></p>
        
        <?php if ($best): ?>
            <p style="color:#00ccff; margin:15px 0;">Best Score: <strong><?= $best['score'] ?>/<?= $best['total'] ?></strong></p>
        <?php endif; ?>
        
        <a href="index.php?page=quiz&id=<?= $quiz['id'] ?>" class="btn">START QUIZ</a>
    </div>
</div>
<?php endwhile; ?>

<?php require __DIR__ . '/../includes/footer.php'; ?>