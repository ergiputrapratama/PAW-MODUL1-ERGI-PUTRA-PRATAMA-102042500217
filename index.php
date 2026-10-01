<?php
// 4. Seluruh data produk disimpan menggunakan array PHP
$products = [
    [
        "nama" => "Monitor 24 Inch",
        "kategori" => "Aksesoris Komputer",
        "harga" => 1800000,
        "stok" => 4
    ],
    [
        "nama" => "Laptop Productivity",
        "kategori" => "Komputer & Laptop",
        "harga" => 8500000,
        "stok" => 3
    ],
    [
        "nama" => "Mechanical Keyboard RGB",
        "kategori" => "Aksesoris Komputer",
        "harga" => 750000,
        "stok" => 0
    ],
    [
        "nama" => "Wireless Mouse Ergonomic",
        "kategori" => "Aksesoris Komputer",
        "harga" => 350000,
        "stok" => 10
    ],
    [
        "nama" => "Headset Gaming Surround",
        "kategori" => "Audio",
        "harga" => 1200000,
        "stok" => 2
    ],
    [
        "nama" => "External SSD 512GB",
        "kategori" => "Penyimpanan",
        "harga" => 950000,
        "stok" => 5
    ]
];

// 11. Menghitung jumlah seluruh produk secara otomatis berdasarkan data yang tersimpan
$total_produk = count($products);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store - Katalog Produk</title>
    <style>
        /* Reset & Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #1359c3;
            color: #ffffff;
            line-height: 1.6;
        }

        /* Navbar */
        navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1414de;
            color: #fff;
            padding: 20px 50px;
        }

        navbar .logo {
            font-size: 24px;
            font-weight: bold;
        }

        navbar .nav-links {
            display: flex;
            gap: 20px;
        }

        navbar .nav-links a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
        }

        navbar .nav-links a:hover {
            color: #00bcd4;
        }

        /* Hero Section */
        header {
            background: linear-gradient(135deg, #1e1e2f, #2a2a40);
            color: white;
            text-align: center;
            padding: 60px 20px;
        }

        header h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        header p {
            font-size: 18px;
            color: #bbb;
        }

        /* Catalog Container */
        main {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        main h2 {
            margin-bottom: 25px;
            font-size: 24px;
            border-left: 5px solid #1e1e2f;
            padding-left: 10px;
        }

        /* CSS Grid untuk Katalog Produk */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        /* Product Card */
        article.product-card {
            background: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        /* Pseudo-Class: Efek Hover */
        article.product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        }

        .product-category {
            font-size: 13px;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .product-title {
            font-size: 18px;
            font-weight: bold;
            margin: 10px 0;
            color: #222;
        }

        /* Harga & Diskon */
        .price-normal {
            font-size: 14px;
            color: #888;
            text-decoration: line-through;
        }

        .badge-discount {
            display: inline-block;
            background-color: #ff4757;
            color: white;
            font-size: 11px;
            padding: 2px 6px;
            border-radius: 4px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .price-final {
            font-size: 20px;
            font-weight: bold;
            color: #2ed573;
            margin-bottom: 15px;
        }

        .stock-info {
            font-size: 14px;
            margin-bottom: 15px;
        }

        /* Status Badge */
        span.status-tersedia {
            background-color: #e8f8f5;
            color: #27ae60;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
        }

        span.status-habis {
            background-color: #ffadad;
            color: #c0392b;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
        }

        /* Tombol Beli */
        .buy-button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #1e1e2f;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        .buy-button:hover {
            opacity: 0.85;
        }

        .buy-button.disabled {
            background-color: #dcdde1;
            color: #7f8fa6;
            cursor: not-allowed;
            pointer-events: none;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #1e1e2f;
            color: white;
            margin-top: 50px;
            font-size: 14px;
        }

        /* Responsive Layout dengan Media Query */
        @media (max-width: 900px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .product-grid {
                grid-template-columns: 1fr;
            }
            
            navbar {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>

    <!-- 12. Navbar / Header -->
    <navbar>
        <div class="logo">Cia Store</div>
        <div class="nav-links">
            <a href="#">Beranda</a>
            <a href="#products">Katalog</a>
            <a href="#">Kontak</a>
        </div>
    </navbar>

    <!-- Hero Section -->
    <header>
        <h1>Simple Tech Store.</h1>
        <p>Temukan perangkat dan aksesoris teknologi terbaik untuk kebutuhanmu.</p>
    </header>

    <!-- Main Content / Katalog Produk -->
    <main id="products">
        <h2>Katalog Produk (Total: <?= $total_produk; ?> Produk)</h2>

        <div class="product-grid">
            <?php 
            // 5. Menggunakan perulangan PHP untuk menampilkan seluruh data produk secara dinamis
            foreach ($products as $p): 
                // 1. & 4. Ketentuan Diskon: Harga Rp 1.000.000 atau lebih mendapatkan diskon 10%
                $diskon_persen = 0;
                $harga_akhir = $p['harga'];

                if ($p['harga'] >= 1000000) {
                    $diskon_persen = 10;
                    $harga_akhir = $p['harga'] - ($p['harga'] * 0.10);
                }
            ?>
                <article class="product-card">
                    <div class="product-category"><?= $p['kategori']; ?></div>
                    <div class="product-title"><?= $p['nama']; ?></div>

                    <?php if ($diskon_persen > 0): ?>
                        <div class="badge-discount">DISKON <?= $diskon_persen; ?>%</div>
                        <div class="price-normal">Rp <?= number_format($p['harga'], 0, ',', '.'); ?></div>
                    <?php endif; ?>

                    <!-- 10. Harga produk format mata uang Rupiah -->
                    <div class="price-final">Rp <?= number_format($harga_akhir, 0, ',', '.'); ?></div>

                    <div class="stock-info">
                        Stok: <strong><?= $p['stok']; ?></strong> | 
                        
                        <?php 
                        // 7. Percabangan PHP untuk status produk berdasarkan jumlah stok
                        if ($p['stok'] > 0) {
                            echo '<span class="status-tersedia">Tersedia</span>';
                        } else {
                            echo '<span class="status-habis">Stok Habis</span>';
                        }
                        ?>
                    </div>

                    <?php 
                    // 8 & 9. Tombol Beli / Dinonaktifkan jika stok habis
                    if ($p['stok'] > 0) {
                        echo '<button class="buy-button">Beli Sekarang</button>';
                    } else {
                        echo '<button class="buy-button disabled" disabled>Stok Habis</button>';
                    }
                    ?>
                </article>
            <?php endforeach; ?>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Cia Store. All rights reserved.</p>
    </footer>

</body>
</html>