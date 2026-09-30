<?php
    $produk=[
    [
        "nama" => "Monitor 24 Inch",      
        "kategori" => "Monitor",     
        "harga" => 1800000, 
        "stok" => 4
        ],
    [
        "nama" => "Laptop Productivity",  
        "kategori" => "Laptop",      
        "harga" => 8500000, 
        "stok" => 3
        ],
    [
        "nama" => "Mechanical Keyboard",  
        "kategori" => "Aksesoris",   
        "harga" => 650000,  
        "stok" => 12
        ],
    [
        "nama" => "Wireless Mouse",       
        "kategori" => "Aksesoris",   
        "harga" => 185000,  
        "stok" => 25
        ],
    [
        "nama" => "Headset Gaming",       
        "kategori" => "Audio",       
        "harga" => 420000,  
        "stok" => 0
        ],
    [
        "nama" => "Flashdisk 64GB",       
        "kategori" => "Penyimpanan", 
        "harga" => 95000,   
        "stok" => 40
        ],
    ];

    function formatRupiah($angka) {
        return "Rp" . number_format($angka, 0, ",", ".");
    }
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset = "UTF-8">
        <title>CIA Store</title>
        <link rel = "Stylesheet" href = "style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <header>
            <nav class="navbar">
                <div class="logo">Cia Store</div>
                <div class="menu">
                    <a href="#hero">Home</a>
                    <a href="#products">Product</a>
                    <a href="#footer">About</a>
                </div>
            </nav>
        </header>
        <section id="hero">
            <p class="hero-label">CIA Store</p>
            <h1>The Biggest Tech Store</h1>
            <p>Toko Perangkat dan Aksesoris Teknologi Terlengkap</p>
            <a href="#products" class="hero-button">Lihat Produk</a>
        </section>
        <section id="info">
            <h2>Katalog Produk</h2>
            <span>Total Produk: <?=count($produk)?></span>
        </section>
        <main id="products">
            <div class="product-grid">
                <?php foreach ($produk as $item): ?>
                    <?php
                        $adaDiskon = $item["harga"] >= 1000000;
                        $hargaAkhir = $item["harga"];
                        if ($adaDiskon) {
                            $hargaAkhir = 0.90 * $item["harga"];
                        }
                    ?>
                    <article class="product-card">
                        <p class="category"><?= $item["kategori"]?></p>
                        <h3><?= $item["nama"]?></h3>
                        <?php if ($adaDiskon): ?>
                            <p><span class="badge-diskon">Diskon 10%</span></p>
                            <del class="price-old"><?= formatRupiah($item["harga"])?></del>
                            <p class="price"><?= formatRupiah($hargaAkhir)?></p>
                        <?php else: ?>
                            <p class="price"><?= formatRupiah($item["harga"])?></p>
                        <?php endif;?>
                        
                        <p class="stock">Stok: <?= $item["stok"]?></p>
                        <?php if ($item["stok"] > 0): ?>
                            <span class="status available">Tersedia</span>
                            <button class="buy-button">Beli Sekarang</button>
                        <?php else: ?>
                            <span class="status soldout">Stok Habis</span>
                            <button class="buy-button" disabled>Beli Sekarang</button>
                        <?php endif;?>
                    </article>
                <?php endforeach;?>
            </div>
        </main>
        <footer id="footer">
            <p>Cia Store</p>
            <p>&copy; <?= date("Y") ?> Cia Store. Toko perangkat dan aksesoris teknologi.</p>
        </footer>
    </body>
</html>