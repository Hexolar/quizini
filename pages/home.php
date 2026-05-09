<?php require __DIR__ . '/../includes/header.php'; ?>


<div class="section hero">
    <div>
        <h1 style="font-size:3.5rem; margin-bottom:1rem;">Welcome back, <?= htmlspecialchars($_SESSION['username'] ?? 'Player') ?>!</h1>
        <p style="font-size:1.4rem; margin-bottom:3rem;">Choose your arena</p>
    </div>
</div>

<?php
$quizzes = mysqli_query($conn, "SELECT * FROM quizzes");
while ($quiz = mysqli_fetch_assoc($quizzes)):
    $result = mysqli_query($conn, "SELECT score, total FROM user_results WHERE user_id = {$_SESSION['user_id']} AND quiz_id = {$quiz['id']} ORDER BY completed_at DESC LIMIT 1");
    $best = mysqli_fetch_assoc($result);
?>
<div class="section" style="background:#3a2a22;">
    <div style="max-width:700px;">
        <h2><?= htmlspecialchars($quiz['title']) ?></h2>
        <p><?= htmlspecialchars($quiz['description']) ?></p>
        
        <?php if ($best): ?>
            <p style="margin:15px 0;">Best Score: <strong><?= $best['score'] ?>/<?= $best['total'] ?></strong></p>
        <?php endif; ?>
        
        <a href="index.php?page=quiz&id=<?= $quiz['id'] ?>" class="btn btn-primary">Start Quiz</a>
    </div>
</div>
<?php endwhile; ?>

<?php 
require __DIR__ . '/../includes/footer.php';
?>