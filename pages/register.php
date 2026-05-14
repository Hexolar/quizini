<?php 
require __DIR__ . '/../includes/header.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (registerUser($_POST['username'], $_POST['email'], $_POST['password'])) {
        header("Location: index.php?page=login");
        exit;
    } else {
        $error = "Registration failed. Username or email may already exist.";
    }
}
?>

<div class="auth-page">
    <div class="auth-card">
        <h2 class="auth-title">CREATE ACCOUNT</h2>

        <?php if (isset($error)): ?>
            <p class="auth-error"><?= $error ?></p>
        <?php endif; ?>

        <form class="auth-form" method="POST">
            <input class="auth-input" type="text"     name="username" placeholder="username" required>
            <input class="auth-input" type="email"    name="email"    placeholder="email"    required>
            <input class="auth-input" type="password" name="password" placeholder="password" required>
            <button class="btn btn-secondary auth-submit" type="submit">REGISTER</button>
        </form>

        <p class="auth-footer-text">
            Already have an account?
            <a class="auth-link" href="index.php?page=login">Sign In</a>
        </p>
    </div>
</div>

<?php require __DIR__ . '/../includes/footer.php'; ?>