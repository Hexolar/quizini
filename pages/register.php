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
        <h2>CREATE AN ACCOUNT</h2>
        
        <?php if (isset($error)): ?>
            <p class="auth-error"><?= $error ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="email" name="email" placeholder="Email" required class="auth-input">
            <input type="password" name="password" placeholder="Password" required class="auth-input">
            <button type="submit" class="btn-auth">SIGN UP</button>
        </form>

        <p style="margin-top:25px; color:#c0f0d0;">
            Already have an account? 
            <a href="index.php?page=login" style="color:#00ccff;">Sign In</a>
        </p>
    </div>
</div>

<?php require __DIR__ . '/../includes/footer.php'; ?>