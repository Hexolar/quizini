<?php require __DIR__ . '/../includes/header.php'; ?>
<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (registerUser($_POST['username'], $_POST['email'], $_POST['password'])) {
        header("Location: index.php?page=login");
        exit;
    } else {
        $error = "Registration failed. Email or username may already exist.";
    }
}
?>

<div class="section">
    <div style="max-width:420px; width:100%;">
        <h2 style="margin-bottom:2rem; color:var(--neon-cyan);">CREATE ACCOUNT</h2>
        
        <?php if (isset($error)): ?>
            <p style="color:#ff6666; text-align:center;"><?= $error ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="username" placeholder="Username" required style="width:100%; padding:14px; margin:10px 0; border-radius:8px; border:none;">
            <input type="email" name="email" placeholder="Email" required style="width:100%; padding:14px; margin:10px 0; border-radius:8px; border:none;">
            <input type="password" name="password" placeholder="Password" required style="width:100%; padding:14px; margin:10px 0; border-radius:8px; border:none;">
            <button type="submit" class="btn btn-success" style="width:100%; margin-top:15px;">Create Account</button>
        </form>
        
        <p style="text-align:center; margin-top:20px;">
            Already have an account? <a href="index.php?page=login" style="color:var(--neon-cyan);">Sign In</a>
        </p>
    </div>
</div>

<?php 
require __DIR__ . '/../includes/footer.php';
?>