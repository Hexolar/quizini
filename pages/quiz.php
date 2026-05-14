<?php 
require __DIR__ . '/../includes/header.php';

$quiz_id = (int)($_GET['id'] ?? 0);

$quiz = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM quizzes WHERE id = $quiz_id"));
if (!$quiz) {
    die("Quiz not found");
}

// Get questions
$questions_query = mysqli_query($conn, "SELECT * FROM questions WHERE quiz_id = $quiz_id ORDER BY id");
$questions = [];

while ($q = mysqli_fetch_assoc($questions_query)) {
    $ans_query = mysqli_query($conn, "SELECT * FROM answers WHERE question_id = {$q['id']}");
    $answers = [];
    while ($a = mysqli_fetch_assoc($ans_query)) {
        $answers[] = $a;
    }
    shuffle($answers);           // Randomize answers
    $q['answers'] = $answers;
    $questions[] = $q;
}
?>

<div>
    <div id="progress"></div>
</div>

<div>
    <div>
        <h1><?= htmlspecialchars($quiz['title']) ?></h1>
        
        <form action="index.php?page=results" method="POST">
            <input type="hidden" name="quiz_id" value="<?= $quiz_id ?>">

            <?php foreach ($questions as $index => $q): ?>
            <div>
                <h3><?= ($index + 1) . ". " . htmlspecialchars($q['question_text']) ?></h3>
                <?php foreach ($q['answers'] as $ans): ?>
                    <label>
                        <input type="radio" name="q<?= $q['id'] ?>" value="<?= $ans['id'] ?>" required>
                        <?= htmlspecialchars($ans['answer_text']) ?>
                    </label>
                <?php endforeach; ?>
            </div>
            <?php endforeach; ?>

            <button type="submit">
                Finish Quiz
            </button>
        </form>
    </div>
</div>

<script>
document.querySelectorAll('input[type="radio"]').forEach(input => {
    input.addEventListener('change', () => {
        const answered = document.querySelectorAll('input[type="radio"]:checked').length;
        const total = <?= count($questions) ?>;
        document.getElementById('progress').style.width = ((answered / total) * 100) + '%';
    });
});
</script>

<?php 
require __DIR__ . '/../includes/footer.php';
?>