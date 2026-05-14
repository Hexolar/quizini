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
        <h2>SIGN IN</h2>
        
        <?php if (isset($error)): ?>
            <p class="auth-error"><?= $error ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="email" name="email" placeholder="Email" required class="auth-input">
            <input type="password" name="password" placeholder="Password" required class="auth-input">
            <button type="submit" class="btn-auth">SIGN IN</button>
        </form>
        
        <p style="margin-top:25px; color:#c0f0d0;">
            Don't have an account? 
            <a href="index.php?page=register" style="color:#00ccff;">Sign Up</a>
        </p>
    </div>
</div>

<?php require __DIR__ . '/../includes/footer.php'; ?>