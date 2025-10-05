<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$message = "";
if (isset($_GET['message'])) {
    if ($_GET['message'] === 'login_success') {
        $message = "Selamat datang kembali, " . $_SESSION['username'] . "!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - MaleFashion</title>
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
                    <li><a href="logout.php" class="nav-link">Logout</a></li>
                </ul>
                <div class="nav-actions">
                    <button id="themeToggle" class="btn-theme">🌙</button>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <section class="dashboard-header">
            <div class="container">
                <h1 class="welcome-message">Dashboard</h1>
                <p class="user-info">Halo, <strong><?php echo $_SESSION['username']; ?></strong>! Selamat datang di panel admin MaleFashion</p>
            </div>
        </section>

        <div class="container">
            <?php if ($message): ?>
                <div class="success-message"><?php echo $message; ?></div>
            <?php endif; ?>
            
            <div class="dashboard-stats">
                <div class="stat-card">
                    <div class="stat-number">152</div>
                    <div class="stat-label">Total Produk</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">1,248</div>
                    <div class="stat-label">Pelanggan</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">89</div>
                    <div class="stat-label">Pesanan Hari Ini</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">Rp 42.5Jt</div>
                    <div class="stat-label">Pendapatan Bulan Ini</div>
                </div>
            </div>

            <div class="section">
                <div class="section-title">
                    <h2>Manajemen Produk</h2>
                </div>
                <div class="product-grid">
                    <?php
                    $products = [
                        [
                            "name" => "Kemeja Slim Fit Premium",
                            "price" => 450000,
                            "image" => "https://images.unsplash.com/photo-1598033129183-c4f50c736f10?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=700&q=80",
                            "description" => "Koleksi eksklusif untuk musim ini"
                        ],
                        [
                            "name" => "Celana Chino Designer",
                            "price" => 650000,
                            "image" => "https://images.unsplash.com/photo-1591047139829-d91aecb6caea?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=736&q=80",
                            "description" => "Limited edition dari desainer ternama"
                        ],
                        [
                            "name" => "Sneakers Limited Edition",
                            "price" => 1200000,
                            "image" => "https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80",
                            "description" => "Koleksi terbatas dengan kualitas premium"
                        ]
                    ];

                    foreach ($products as $product) {
                        $formatted_price = "Rp " . number_format($product['price'], 0, ',', '.');
                        echo "
                        <article class='product-card'>
                            <div class='product-img'>
                                <img src='{$product['image']}' alt='{$product['name']}'>
                            </div>
                            <div class='product-content'>
                                <h3 class='product-title'>{$product['name']}</h3>
                                <p>{$product['description']}</p>
                                <p class='product-price'>{$formatted_price}</p>
                                <div class='dashboard-actions'>
                                    <button class='btn btn-secondary'>Edit</button>
                                    <button class='btn btn-primary'>Update</button>
                                </div>
                            </div>
                        </article>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="footer-bottom">
                <p>&copy; 2023 MaleFashion. All rights reserved. | Logged in as: <?php echo $_SESSION['username']; ?></p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>