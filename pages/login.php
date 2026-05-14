<?php 
require __DIR__ . '/../includes/header.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (loginUser($_POST['email'], $_POST['password'])) {
        header("Location: index.php?page=home");
        exit;
    } else {
        $error = "Invalid email or password!";
    }
}
?>

<div class="auth-page">
    <div class="auth-card">
        <h2 class="auth-title">SIGN IN</h2>

        <?php if (isset($error)): ?>
            <p class="auth-error"><?= $error ?></p>
        <?php endif; ?>

        <form class="auth-form" method="POST">
            <input class="auth-input" type="email"    name="email"    placeholder="email"    required>
            <input class="auth-input" type="password" name="password" placeholder="password" required>
            <button class="btn btn-primary auth-submit" type="submit">SIGN IN</button>
        </form>

        <p class="auth-footer-text">
            Don't have an account?
            <a class="auth-link" href="index.php?page=register">Sign Up</a>
        </p>
    </div>
</div>

<?php require __DIR__ . '/../includes/footer.php'; ?>