<?php 
require __DIR__ . '/../includes/header.php'; 
$user_id = $_SESSION['user_id'];

// Map quiz titles to their image files
$quiz_images = [
    'Formula 1 (2000-Present)' => 'F1.jpg',
    'Video Games'            => 'game.jpg',
    'PHP Coding Challenge'    => 'coding.jpg',
    'Rock & Metal Music'     => 'rockmusic.jpg',
    'Lightsaber Duel Styles'  => 'lightsaberDuel.jpg',
];
?>

<!-- Hero section -->
<div class="home-hero">
    <h1 class="home-hero-title">QUIZINI</h1>

    <div class="home-hero-images">
        <div class="home-hero-thumb"></div>
        <div class="home-hero-thumb"></div>
        <div class="home-hero-thumb"></div>
    </div>

    <p class="home-hero-hint">SCROLL DOWN TO VIEW QUIZZES</p>
</div>

<?php
$quizzes = mysqli_query($conn, "SELECT * FROM quizzes");

while ($quiz = mysqli_fetch_assoc($quizzes)):

    $best_result = mysqli_query($conn, "
        SELECT score, total 
        FROM user_results 
        WHERE user_id = $user_id 
          AND quiz_id = {$quiz['id']} 
        ORDER BY score DESC 
        LIMIT 1
    ");
    $best = mysqli_fetch_assoc($best_result);

    $title    = $quiz['title'];
    $img_file = $quiz_images[$title] ?? null;
?>

<!-- Quiz section -->
<div class="home-quiz-section">
    <div class="home-quiz-image">
        <?php if ($img_file): ?>
            <img src="/quizini/assets/images/<?= htmlspecialchars($img_file) ?>"
                 alt="<?= htmlspecialchars($title) ?>">
        <?php endif; ?>
    </div>

    <div class="home-quiz-info">
        <span class="home-quiz-label">QUIZ</span>
        <h2 class="home-quiz-title"><?= htmlspecialchars($title) ?></h2>
        <p class="home-quiz-desc"><?= htmlspecialchars($quiz['description']) ?></p>

        <?php if ($best): ?>
            <p class="home-quiz-score">
                Best Score: <strong><?= $best['score'] ?>/<?= $best['total'] ?></strong>
            </p>
        <?php endif; ?>

        <a href="index.php?page=quiz&id=<?= $quiz['id'] ?>" class="btn btn-take-quiz">Take Quiz</a>
    </div>
</div>

<?php endwhile; ?>

<?php require __DIR__ . '/../includes/footer.php'; ?>