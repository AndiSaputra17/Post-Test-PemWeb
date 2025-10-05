<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if ($username === 'admin' && $password === '123') {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php?message=login_success");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MaleFashion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <nav class="navbar">
                <div class="logo">MaleFashion</div>
                <ul class="nav-menu">
                    <li><a href="index.php" class="nav-link">Beranda</a></li>
                    <li><a href="index.php#produk" class="nav-link">Produk</a></li>
                    <li><a href="index.php#kategori" class="nav-link">Kategori</a></li>
                    <li><a href="index.php#tentang" class="nav-link">Tentang Kami</a></li>
                    <li><a href="index.php#kontak" class="nav-link">Kontak</a></li>
                </ul>
                <div class="nav-actions">
                    <button id="themeToggle" class="btn-theme">🌙</button>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="login-container">
                <h2 class="login-title">Login ke MaleFashion</h2>
                
                <?php if ($error): ?>
                    <div class="error-message"><?php echo $error; ?></div>
                <?php endif; ?>
                
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" id="username" name="username" class="form-control" required 
                               value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                
                <div class="login-info">
                    <p>Demo Login:<br>Username: <strong>admin</strong><br>Password: <strong>123</strong></p>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="footer-bottom">
                <p>&copy; 2023 MaleFashion. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>