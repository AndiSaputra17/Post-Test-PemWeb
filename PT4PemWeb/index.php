<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MaleFashion - Tempat Belanja Fashion Pria Terpercaya</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <nav class="navbar">
                <div class="logo">MaleFashion</div>
                <ul class="nav-menu">
                    <li><a href="#home" class="nav-link">Beranda</a></li>
                    <li><a href="#produk" class="nav-link">Produk</a></li>
                    <li><a href="#kategori" class="nav-link">Kategori</a></li>
                    <li><a href="#tentang" class="nav-link">Tentang Kami</a></li>
                    <li><a href="#kontak" class="nav-link">Kontak</a></li>
                    <li><a href="login.php" class="nav-link">Login</a></li>
                </ul>
                <div class="nav-actions">
                    <button id="themeToggle" class="btn-theme">🌙</button>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <section id="home" class="hero">
            <div class="container">
                <div class="hero-content">
                    <h1 class="hero-title">Temukan Gaya Terbaik Anda</h1>
                    <p class="hero-subtitle">Koleksi fashion pria terkini dengan kualitas premium dan harga terjangkau</p>
                    <a href="#produk" class="btn btn-primary">Jelajahi Koleksi</a>
                </div>
            </div>
        </section>

        <section id="kategori" class="section">
            <div class="container">
                <div class="section-title">
                    <h2>Kategori Produk</h2>
                </div>
                <div class="category-grid">
                    <article class="category-card">
                        <div class="category-icon">👕</div>
                        <h3>Pakaian</h3>
                        <p>Kemeja, Kaos, Celana dan Jaket dengan desain modern</p>
                    </article>
                    <article class="category-card">
                        <div class="category-icon">🧢</div>
                        <h3>Aksesoris</h3>
                        <p>Topi, Sabuk, Dompet dan Jam untuk melengkapi gaya Anda</p>
                    </article>
                    <article class="category-card">
                        <div class="category-icon">👟</div>
                        <h3>Sepatu</h3>
                        <p>Sneakers, Formal Shoes dan Sandal dengan kualitas terbaik</p>
                    </article>
                </div>
            </div>
        </section>

        <section id="produk" class="section">
            <div class="container">
                <div class="section-title">
                    <h2>Produk Terbaru</h2>
                </div>
                <div class="product-grid">
                    <?php
                    $products = [
                        [
                            "name" => "Kemeja Slim Fit",
                            "price" => 299000,
                            "image" => "https://images.unsplash.com/photo-1598033129183-c4f50c736f10?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=700&q=80",
                            "description" => "Kemeja cotton dengan desain modern dan nyaman"
                        ],
                        [
                            "name" => "Celana Chino",
                            "price" => 399000,
                            "image" => "https://images.unsplash.com/photo-1591047139829-d91aecb6caea?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=736&q=80",
                            "description" => "Celana chino dengan bahan premium dan berbagai pilihan warna"
                        ],
                        [
                            "name" => "Sneakers Casual",
                            "price" => 499000,
                            "image" => "https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80",
                            "description" => "Sneakers dengan desain trendy dan nyaman dipakai sehari-hari"
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
                                <a href='login.php' class='btn btn-secondary'>Beli Sekarang</a>
                            </div>
                        </article>";
                    }
                    ?>
                </div>
            </div>
        </section>

        <section id="tentang" class="section about">
            <div class="container">
                <div class="section-title">
                    <h2>Tentang Kami</h2>
                </div>
                <div class="about-content">
                    <p>MaleFashion hadir untuk memberikan pengalaman berbelanja fashion pria yang mudah, berkualitas, dan terpercaya sejak 2023.</p>
                    <p>Dengan fokus pada kenyamanan dan kepuasan pelanggan, kami terus berinovasi untuk memberikan pelayanan terbaik.</p>
                </div>
            </div>
        </section>

        <section id="kontak" class="section">
            <div class="container">
                <div class="section-title">
                    <h2>Hubungi Kami</h2>
                </div>
                <form class="contact-form" method="POST">
                    <div class="form-group">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" id="nama" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pesan" class="form-label">Pesan:</label>
                        <textarea id="pesan" name="pesan" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $nama = htmlspecialchars($_POST['nama']);
                        $email = htmlspecialchars($_POST['email']);
                        $pesan = htmlspecialchars($_POST['pesan']);
                        echo "<div class='form-message success'>Terima kasih $nama, pesan Anda telah dikirim!</div>";
                    }
                    ?>
                </form>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-section">
                    <h3 class="footer-heading">MaleFashion</h3>
                    <p>Jl. Fashion No. 123, Jakarta Selatan</p>
                    <p>Email: info@malefashion.id</p>
                    <p>Telepon: (021) 1234-5678</p>
                </div>
                <div class="footer-section">
                    <h3 class="footer-heading">Tautan Cepat</h3>
                    <ul class="footer-links">
                        <li><a href="#home">Beranda</a></li>
                        <li><a href="#produk">Produk</a></li>
                        <li><a href="#kategori">Kategori</a></li>
                        <li><a href="#tentang">Tentang Kami</a></li>
                        <li><a href="#kontak">Kontak</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3 class="footer-heading">Referensi Desain</h3>
                    <p>Inspirasi desain dari:</p>
                    <a href="https://heymale.id/" target="_blank">Heymale.id</a>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2023 MaleFashion. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>