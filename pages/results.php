<?php
require __DIR__ . '/../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php?page=home");
    exit;
}

$quiz_id = (int)$_POST['quiz_id'];
$user_id = $_SESSION['user_id'];
$score   = 0;
$total   = 0;

$questions = mysqli_query($conn, "SELECT id FROM questions WHERE quiz_id = $quiz_id");

while ($q = mysqli_fetch_assoc($questions)) {
    $total++;
    $qid = $q['id'];
    if (isset($_POST["q$qid"])) {
        $selected = (int)$_POST["q$qid"];
        $check = mysqli_query($conn, "SELECT is_correct FROM answers WHERE id = $selected");
        if ($row = mysqli_fetch_assoc($check)) {
            if ($row['is_correct']) $score++;
        }
    }
}

// Save result
$stmt = $conn->prepare("INSERT INTO user_results (user_id, quiz_id, score, total) VALUES (?, ?, ?, ?)");
$stmt->bind_param("iiii", $user_id, $quiz_id, $score, $total);
$stmt->execute();
?>

<div class="result-page">
    <h1 class="result-heading">QUIZ COMPLETE</h1>
    <h2 class="result-score">Your Score: <strong><?= $score ?>/<?= $total ?></strong></h2>
    <a href="index.php?page=home" class="btn btn-primary result-back">Back to Home</a>
</div>

<?php require __DIR__ . '/../includes/footer.php'; ?>