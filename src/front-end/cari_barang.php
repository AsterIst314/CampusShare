<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Jelajahi perlengkapan kuliah yang tersedia untuk dipinjam di CampusShare.">
    <title>Cari Barang - CampusShare</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --ink: #142238;
            --muted: #778397;
            --blue: #1454df;
            --blue-dark: #064acb;
            --pale-blue: #eaf1ff;
            --page: #f7f8fd;
        }

        body {
            color: var(--ink);
            background: var(--page);
            font-family: "Plus Jakarta Sans", sans-serif;
            font-size: 12px;
        }

        a { color: inherit; }
        .site-header { background: #fff; box-shadow: 0 2px 9px rgba(20, 34, 56, .06); }
        .navbar { min-height: 76px; }
        .brand-logo { width: 126px; height: auto; }
        .verified-pill { background: #eff4ff; color: var(--blue); font-size: 10px; font-weight: 600; }
        .main-nav .nav-link { padding: 10px 12px; border-radius: 999px; color: #26354b; font-size: 11px; }
        .main-nav .nav-link.active { background: #eaf0ff; color: var(--blue); }
        .user-avatar { width: 34px; height: 34px; border-radius: 50%; object-fit: cover; }

        .page-container { max-width: 1280px; }
        .breadcrumb-line { color: #273650; font-size: 11px; }
        .breadcrumb-line a { text-decoration: none; }
        .cluster-badge { border-radius: 999px; background: #eaf0ff; color: var(--blue-dark); font-size: 10px; font-weight: 600; }

        .search-panel { padding: 12px; border: 1px solid #e8ecf4; border-radius: 12px; background: #fff; box-shadow: 0 4px 12px rgba(26, 43, 72, .08); }
        .search-control { min-height: 42px; border: 0; border-radius: 8px; background: #eff4ff; font-size: 11px; }
        .search-field { position: relative; }
        .search-field > i { position: absolute; z-index: 2; top: 13px; left: 12px; color: var(--blue); }
        .search-field .form-control { padding-left: 34px; }
        .filter-select { min-height: 42px; border-color: #e5eaf3; border-radius: 8px; font-size: 10px; }
        .search-btn { min-height: 42px; border: 0; border-radius: 8px; background: var(--blue); color: #fff; font-size: 11px; font-weight: 700; }
        .search-btn:hover, .request-btn:hover { background: #0c44c3; color: #fff; }
        .results-meta { color: #59677c; font-size: 10px; }
        .results-meta a { color: var(--blue); font-weight: 600; text-decoration: none; }

        .filter-panel { border: 1px solid #ebeff6; border-radius: 13px; background: #fff; }
        .filter-title { font-size: 14px; font-weight: 700; }
        .filter-group-title { font-size: 10px; font-weight: 700; }
        .filter-reset { color: var(--blue); font-size: 9px; font-weight: 600; text-decoration: none; }
        .filter-option { display: flex; align-items: center; gap: 6px; padding: 4px 0; color: #445168; font-size: 10px; }
        .filter-option .form-check-input { width: 13px; height: 13px; margin: 0; flex: 0 0 auto; }
        .filter-count { margin-left: auto; color: #66748a; font-size: 9px; }
        .filter-count.success { color: #16924f; }
        .filter-count.danger { color: #df5353; }
        .filter-chip { padding: 4px 8px; border-radius: 999px; background: #eff3fb; color: #38465e; font-size: 9px; white-space: nowrap; }
        .filter-chip.active { background: var(--blue); color: #fff; }
        .price-range { width: 100%; height: 4px; accent-color: var(--blue); }

        .toolbar { padding: 10px 12px; border: 1px solid #e9edf5; border-radius: 11px; background: #fff; }
        .toolbar-select { max-width: 160px; border-color: #e5eaf3; border-radius: 7px; font-size: 10px; }
        .view-toggle { width: 31px; height: 31px; border: 1px solid #e7ebf3; border-radius: 7px; background: #fff; color: #56647a; }
        .view-toggle.active { border-color: var(--blue); background: var(--blue); color: #fff; }

        .product-card { overflow: hidden; height: 100%; border: 1px solid #e9edf4; border-radius: 13px; background: #fff; }
        .product-photo { position: relative; overflow: hidden; background: #e8edf4; }
        .product-photo > img { display: block; width: 100%; aspect-ratio: 1.7; object-fit: cover; }
        .photo-tag { position: absolute; top: 9px; left: 9px; padding: 4px 7px; border-radius: 999px; background: #e4fff0; color: #138847; font-size: 9px; font-weight: 700; }
        .photo-tag.right { right: 9px; left: auto; background: rgba(255, 255, 255, .96); color: #26344b; }
        .photo-tag.busy { background: #ffeded; color: #d33c3c; }
        .photo-tag.return { background: #fff1e8; color: #c44331; }
        .favorite-btn { position: absolute; top: 8px; right: 8px; display: inline-flex; width: 29px; height: 29px; align-items: center; justify-content: center; border: 0; border-radius: 50%; background: rgba(255, 255, 255, .94); color: #526077; font-size: 14px; }
        .photo-tag.right + .favorite-btn { top: 42px; }
        .photo-duration { position: absolute; right: 9px; bottom: 8px; left: 9px; padding: 4px 7px; border-radius: 5px; background: rgba(17, 30, 49, .83); color: #fff; font-size: 9px; }
        .product-body { padding: 12px; }
        .product-category { color: var(--blue); font-size: 9px; font-weight: 700; }
        .product-name { overflow: hidden; margin: 4px 0; font-size: 12px; font-weight: 700; text-overflow: ellipsis; white-space: nowrap; }
        .product-description { display: -webkit-box; min-height: 32px; overflow: hidden; margin: 0; color: #667287; font-size: 10px; line-height: 1.5; -webkit-box-orient: vertical; -webkit-line-clamp: 2; }
        .owner-line { display: flex; align-items: center; gap: 6px; min-width: 0; }
        .owner-photo { width: 29px; height: 29px; flex: 0 0 auto; border-radius: 50%; object-fit: cover; }
        .owner-name { font-size: 9px; font-weight: 700; }
        .owner-faculty { color: var(--muted); font-size: 8px; }
        .rating { color: #f59e0b; font-size: 9px; white-space: nowrap; }
        .rating span { color: #536176; }
        .product-footer { display: flex; align-items: center; justify-content: space-between; gap: 5px; padding: 8px 10px 10px; }
        .pickup-location { min-width: 0; color: #7b879a; font-size: 9px; line-height: 1.35; }
        .pickup-location i { color: #7d8aa0; }
        .request-btn { max-width: 104px; border: 0; border-radius: 7px; background: var(--blue); color: #fff; font-size: 9px; font-weight: 700; line-height: 1.3; }
        .notify-btn { max-width: 78px; border: 0; border-radius: 7px; background: #eaf0ff; color: var(--blue); font-size: 9px; font-weight: 600; line-height: 1.3; }

        .pagination-wrap { padding: 9px 10px; border: 1px solid #e9edf4; border-radius: 10px; background: #fff; }
        .pagination { margin: 0; gap: 4px; }
        .pagination .page-link { display: inline-flex; min-width: 31px; height: 31px; align-items: center; justify-content: center; border: 0; border-radius: 7px !important; background: #eff3fb; color: #28364c; font-size: 10px; }
        .pagination .active .page-link { background: var(--blue-dark); color: #fff; }
        .pagination .disabled .page-link { color: #9da8b8; }

        .request-panel { padding: 19px 22px; border-radius: 13px; background: linear-gradient(110deg, #e7efff, #d8e6ff); }
        .request-kicker { color: var(--blue-dark); font-size: 9px; font-weight: 700; }
        .request-title { margin: 4px 0; font-size: 15px; font-weight: 700; }
        .request-copy { margin: 0; color: #657287; font-size: 10px; line-height: 1.5; }
        .request-cta { border: 0; border-radius: 999px; background: #064acb; color: #fff; font-size: 10px; font-weight: 700; }

        .site-footer { margin-top: 30px; background: #fff; }
        .footer-brand { width: 112px; }
        .footer-about { max-width: 310px; color: #68758a; font-size: 11px; line-height: 1.65; }
        .footer-title { margin-bottom: 12px; font-size: 12px; font-weight: 700; }
        .footer-links { display: grid; gap: 9px; }
        .footer-links a { color: #68758a; font-size: 10px; text-decoration: none; }
        .footer-links a:hover, .legal-links a:hover { color: var(--blue); }
        .footer-bottom { border-top: 1px solid #f0f2f7; color: #8490a2; font-size: 9px; }
        .legal-links a { color: #667287; text-decoration: none; }

        @media (max-width: 991.98px) {
            .navbar { min-height: 66px; }
            .main-nav { padding: 12px 0; }
            .main-nav .nav-link { border-radius: 8px; }
            .filter-panel { position: static; }
        }

        @media (max-width: 767.98px) {
            .page-container { padding-right: 16px; padding-left: 16px; }
            .brand-logo { width: 112px; }
            .toolbar { align-items: flex-start !important; }
            .toolbar-select { max-width: 145px; }
            .product-photo > img { aspect-ratio: 1.65; }
            .request-panel { padding: 17px; }
            .footer-bottom .legal-links { justify-content: flex-start !important; }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid page-container">
                <a class="navbar-brand d-flex align-items-center gap-3 me-lg-3" href="index.php" aria-label="CampusShare Beranda">
                    <img class="brand-logo" src="img/CampusShare%20Logo.png" alt="CampusShare">
                    <span class="d-none d-xl-inline fw-semibold text-primary">CampusShare</span>
                </a>
                <span class="badge rounded-pill verified-pill d-none d-xl-inline-flex"><i class="bi bi-patch-check-fill me-1"></i>Universitas Terverifikasi</span>
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavigation" aria-controls="mainNavigation" aria-expanded="false" aria-label="Buka navigasi">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNavigation">
                    <ul class="navbar-nav main-nav mx-lg-auto align-items-lg-center">
                        <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link active" href="cari_barang.php"><i class="bi bi-search me-1"></i>Cari Barang</a></li>
                        <li class="nav-item"><a class="nav-link" href="hal_profil.php">Dashboard Saya</a></li>
                        <li class="nav-item"><a class="nav-link" href="riwayat_peminjama_&_pengembalian_barang.php">Riwayat Pinjam</a></li>
                        <li class="nav-item"><a class="nav-link" href="layar_chat_pesan_antar_mahasiswa.php"><i class="bi bi-chat-dots me-1"></i>Pesan / Chat</a></li>
                    </ul>
                    <div class="d-flex align-items-center gap-3">
                        <a class="btn btn-primary btn-sm rounded-pill px-3 text-nowrap" href="tambah_barang_baru.php"><i class="bi bi-plus-circle me-1"></i>Pinjamkan Barang</a>
                        <a class="position-relative text-decoration-none" href="#" aria-label="Notifikasi"><i class="bi bi-bell fs-5"></i><span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-white rounded-circle"></span></a>
                        <a href="#" class="d-flex align-items-center gap-2 text-decoration-none">
                            <img class="user-avatar" src="img/people/person-1.png" alt="">
                            <span class="d-none d-xl-block small fw-semibold">Rizky<br><span class="text-secondary fw-normal">FT UI</span></span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="container page-container pt-3 pb-5">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
            <nav class="breadcrumb-line" aria-label="Breadcrumb">
                <a href="index.php">Beranda</a>
                <span class="mx-1 text-secondary">›</span>
                <span aria-current="page">Katalog Barang Kampus</span>
            </nav>
            <span class="badge cluster-badge"><i class="bi bi-geo-alt-fill me-1"></i>Cluster Kampus: UI Depok (Terverifikasi Aktif)</span>
        </div>

        <form class="search-panel row g-2 align-items-center mb-2" role="search">
            <div class="col-12 col-lg-7">
                <label class="visually-hidden" for="catalog-search">Cari barang kampus</label>
                <div class="search-field">
                    <i class="bi bi-search"></i>
                    <input class="form-control search-control" id="catalog-search" type="search" placeholder="Cari kamera sony, kalkulator ti-84, jas almamater, mikrometer skrip...">
                </div>
            </div>
            <div class="col-8 col-lg-3">
                <label class="visually-hidden" for="campus-filter">Pilih lokasi kampus</label>
                <select class="form-select filter-select" id="campus-filter"><option>Seluruh Kampus UI Depok (&lt; 3 km)</option><option>Fakultas Teknik</option><option>Fakultas MIPA</option></select>
            </div>
            <div class="col-4 col-lg-2 d-grid">
                <button class="btn search-btn" type="submit"><i class="bi bi-search me-1"></i>Terapkan</button>
            </div>
        </form>

        <div class="d-flex flex-wrap justify-content-between gap-2 mb-3 results-meta">
            <span><strong class="text-primary">Menampilkan 48 barang</strong> tersedia di sekitarmu hari ini · <a href="#">Diperbarui 3 menit lalu oleh mahasiswa</a></span>
            <span class="text-dark"><i class="bi bi-shield-lock text-warning me-1"></i>Semua peminjam wajib lampirkan KTM digital</span>
        </div>

        <div class="row g-3 align-items-start">
            <aside class="col-12 col-md-4 col-lg-3 col-xl-3" aria-label="Filter barang">
                <div class="filter-panel p-3">
                    <div class="d-flex align-items-center justify-content-between gap-2 mb-3">
                        <h1 class="filter-title mb-0"><i class="bi bi-funnel text-primary me-1"></i>Filter Barang</h1>
                        <a href="cari_barang.php" class="filter-reset">Reset Semua</a>
                    </div>

                    <section class="mb-3">
                        <div class="d-flex justify-content-between mb-1"><h2 class="filter-group-title mb-0">Status Ketersediaan</h2><a href="#" class="filter-reset">Lungsung Ambil</a></div>
                        <div class="rounded-3 p-2" style="background:#eff4ff">
                            <label class="filter-option"><input class="form-check-input" type="radio" name="availability" checked><span>Semua Barang</span><span class="filter-count">48</span></label>
                            <label class="filter-option"><input class="form-check-input" type="radio" name="availability"><span class="text-success">Hanya Tersedia</span><span class="filter-count success">38</span></label>
                            <label class="filter-option"><input class="form-check-input" type="radio" name="availability"><span class="text-danger">Sedang Dipinjam</span><span class="filter-count danger">10</span></label>
                        </div>
                    </section>

                    <section class="mb-3">
                        <h2 class="filter-group-title mb-1">Lokasi Fakultas Pemilik</h2>
                        <label class="filter-option"><input class="form-check-input" type="checkbox" checked><span>Semua Fakultas</span><span class="filter-count">48</span></label>
                        <label class="filter-option"><input class="form-check-input" type="checkbox"><span>Fakultas Teknik (FT)</span><span class="filter-count">14</span></label>
                        <label class="filter-option"><input class="form-check-input" type="checkbox"><span>FMIPA</span><span class="filter-count">9</span></label>
                        <label class="filter-option"><input class="form-check-input" type="checkbox"><span>FEB (Ekonomi &amp; Bisnis)</span><span class="filter-count">7</span></label>
                        <label class="filter-option"><input class="form-check-input" type="checkbox"><span>FISIP</span><span class="filter-count">5</span></label>
                        <label class="filter-option"><input class="form-check-input" type="checkbox"><span>Fakultas Ilmu Budaya</span><span class="filter-count">4</span></label>
                    </section>

                    <section class="mb-3">
                        <h2 class="filter-group-title mb-1">Kategori Barang</h2>
                        <div class="d-flex flex-wrap gap-1">
                            <button class="btn filter-chip active" type="button">Semua</button>
                            <button class="btn filter-chip" type="button">Elektronik</button>
                            <button class="btn filter-chip" type="button">Buku Kuliah</button>
                            <button class="btn filter-chip" type="button">Alat Praktikum</button>
                            <button class="btn filter-chip" type="button">Fotografi</button>
                            <button class="btn filter-chip" type="button">Jas Almamater</button>
                            <button class="btn filter-chip" type="button">Olahraga</button>
                        </div>
                    </section>

                    <section class="mb-3">
                        <div class="d-flex justify-content-between mb-1"><h2 class="filter-group-title mb-0">Durasi Peminjaman</h2><span class="filter-reset">Hingga 7 Hari</span></div>
                        <input class="price-range" type="range" min="1" max="14" value="7" aria-label="Durasi peminjaman maksimal">
                        <div class="d-flex justify-content-between text-secondary" style="font-size:9px"><span>1 Hari</span><span>1 Minggu</span><span>&gt; 2 Minggu</span></div>
                    </section>

                    <section class="mb-3">
                        <h2 class="filter-group-title mb-1">Rating Pemilik Terpercaya</h2>
                        <div class="d-flex align-items-center gap-1"><input class="form-check-input mt-0" type="checkbox" aria-label="Rating 4.5 ke atas"><span style="font-size:10px">⭐ <strong>4.5 ke atas</strong></span><a href="#" class="filter-reset ms-auto">Reputasi Top</a></div>
                    </section>

                    <div class="d-flex gap-2 rounded-3 p-2" style="background:#eaf1ff">
                        <i class="bi bi-info-circle text-primary"></i>
                        <p class="mb-0 text-secondary" style="font-size:9px;line-height:1.5">Kelola kampusmu menjaga barang dengan baik. Selalu periksa foto kondisi barang sebelum konfirmasi jadwal temu.</p>
                    </div>
                </div>
            </aside>

            <section class="col-12 col-md-8 col-lg-9 col-xl-9" aria-label="Daftar perlengkapan kampus">
                <div class="toolbar d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
                    <div class="d-flex align-items-center gap-2"><span class="text-secondary" style="font-size:10px">Urutkan:</span>
                        <select class="form-select form-select-sm toolbar-select" aria-label="Urutkan barang"><option>Paling Populer</option><option>Terbaru</option><option>Terdekat dari Gedung</option><option>Rating Tertinggi</option></select>
                    </div>
                    <div class="d-flex align-items-center gap-1">
                        <span class="text-secondary me-1 d-none d-sm-inline" style="font-size:9px">Tampilan:</span>
                        <button class="view-toggle active" type="button" aria-label="Tampilan grid"><i class="bi bi-grid-3x3-gap"></i></button>
                        <button class="view-toggle" type="button" aria-label="Tampilan daftar"><i class="bi bi-layout-sidebar"></i></button>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-12 col-sm-6 col-lg-4">
                        <article class="product-card">
                            <div class="product-photo">
                                <img src="img/items/item-1.png" alt="Laptop, kamera dan perlengkapan fotografi di atas meja" loading="lazy">
                                <span class="photo-tag"><i class="bi bi-circle-fill me-1" style="font-size:6px"></i>Tersedia</span>
                                <button class="favorite-btn" type="button" aria-label="Simpan favorit"><i class="bi bi-heart"></i></button>
                                <span class="photo-duration">Maks. 3 Hari Pinjam</span>
                            </div>
                            <div class="product-body">
                                <div class="product-category"><i class="bi bi-camera me-1"></i>Fotografi · Alat Dokumentasi</div>
                                <h2 class="product-name">Sony Alpha A6400 + Lensa Kit 16–50mm</h2>
                                <p class="product-description">Kondisi mulus 98%, sensor bersih, baterai 2 buah + memory card 64GB. Cocok untuk...</p>
                            </div>
                            <div class="product-footer">
                                <div class="owner-line"><img class="owner-photo" src="img/people/person-2.png" alt=""><div class="text-truncate"><div class="owner-name">Naufal <i class="bi bi-patch-check-fill text-primary"></i></div><div class="owner-faculty">Fasilkom UI ’22</div></div></div>
                                <div class="rating"><i class="bi bi-star-fill"></i> <span>4.9</span> <span>(24)</span></div>
                            </div>
                            <div class="product-footer pt-0">
                                <div class="pickup-location"><i class="bi bi-geo-alt me-1"></i>Lab Gedung C · 250m</div>
                                <button class="btn request-btn px-2 py-2">Detail &amp; Ajukan Pinjam</button>
                            </div>
                        </article>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4">
                        <article class="product-card">
                            <div class="product-photo">
                                <img src="img/items/item-3.png" alt="Kalkulator scientific dengan buku dan catatan" loading="lazy">
                                <span class="photo-tag"><i class="bi bi-circle-fill me-1" style="font-size:6px"></i>Tersedia</span>
                                <button class="favorite-btn" type="button" aria-label="Simpan favorit"><i class="bi bi-heart"></i></button>
                                <span class="photo-duration">Maks. 7 Hari Pinjam</span>
                            </div>
                            <div class="product-body">
                                <div class="product-category"><i class="bi bi-calculator me-1"></i>Elektronik · Ujian Matematika</div>
                                <h2 class="product-name">Kalkulator Grafis TI-84 Plus CE</h2>
                                <p class="product-description">Layar warna jernih, baterai awet tahan 2 minggu. Sangat membantu analisis untuk ujian...</p>
                            </div>
                            <div class="product-footer">
                                <div class="owner-line"><img class="owner-photo" src="img/people/person-3.png" alt=""><div class="text-truncate"><div class="owner-name">Adinda <i class="bi bi-patch-check-fill text-primary"></i></div><div class="owner-faculty">FT UI (Teknik Sipil) ’21</div></div></div>
                                <div class="rating"><i class="bi bi-star-fill"></i> <span>5.0</span> <span>(38)</span></div>
                            </div>
                            <div class="product-footer pt-0">
                                <div class="pickup-location"><i class="bi bi-geo-alt me-1"></i>Kantin FT Rotunda · 100m</div>
                                <button class="btn request-btn px-2 py-2">Detail &amp; Ajukan Pinjam</button>
                            </div>
                        </article>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4">
                        <article class="product-card">
                            <div class="product-photo">
                                <img src="img/items/item-5.png" alt="Peralatan elektronik dan osiloskop di meja lab" loading="lazy">
                                <span class="photo-tag busy"><i class="bi bi-circle-fill me-1" style="font-size:6px"></i>Sedang Dipinjam</span>
                                <button class="favorite-btn" type="button" aria-label="Simpan favorit"><i class="bi bi-heart"></i></button>
                                <span class="photo-duration" style="background:rgba(255,245,240,.96);color:#bf3d2c">Kembali: Besok 17:00</span>
                            </div>
                            <div class="product-body">
                                <div class="product-category"><i class="bi bi-cpu me-1"></i>Alat Praktikum · Elektro</div>
                                <h2 class="product-name">Mini Handheld Oscilloscope OWON</h2>
                                <p class="product-description">Cocok untuk praktikum rangkaian listrik &amp; sinyal audio. Sudah dikalibrasi lengkap.</p>
                            </div>
                            <div class="product-footer">
                                <div class="owner-line"><img class="owner-photo" src="img/people/person-4.png" alt=""><div class="text-truncate"><div class="owner-name">Bagus Santoso <i class="bi bi-patch-check-fill text-primary"></i></div><div class="owner-faculty">FT UI (Teknik Elektro ’20)</div></div></div>
                                <div class="rating"><i class="bi bi-star-fill"></i> <span>4.8</span> <span>(19)</span></div>
                            </div>
                            <div class="product-footer pt-0">
                                <div class="pickup-location"><i class="bi bi-geo-alt me-1"></i>Gedung Lab DETE F · 300m</div>
                                <button class="btn notify-btn px-2 py-2">Ingatkan Saya</button>
                            </div>
                        </article>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4">
                        <article class="product-card">
                            <div class="product-photo">
                                <img src="img/items/item-4.png" alt="Jas almamater kampus warna kuning tergantung rapi" loading="lazy">
                                <span class="photo-tag"><i class="bi bi-circle-fill me-1" style="font-size:6px"></i>Tersedia</span>
                                <button class="favorite-btn" type="button" aria-label="Simpan favorit"><i class="bi bi-heart"></i></button>
                                <span class="photo-duration">Maks. 2 Hari Pinjam</span>
                            </div>
                            <div class="product-body">
                                <div class="product-category"><i class="bi bi-person-badge me-1"></i>Pakaian · Jas Almamater</div>
                                <h2 class="product-name">Jas Almamater Makara Kuning (Size L)</h2>
                                <p class="product-description">Kondisi baru selesai laundry, wangi &amp; rapi. Siap pakai untuk sidang proposal, MUN,...</p>
                            </div>
                            <div class="product-footer">
                                <div class="owner-line"><img class="owner-photo" src="img/people/person-5.png" alt=""><div class="text-truncate"><div class="owner-name">Faris Ramadhan <i class="bi bi-patch-check-fill text-primary"></i></div><div class="owner-faculty">FEB UI ’22</div></div></div>
                                <div class="rating"><i class="bi bi-star-fill"></i> <span>4.9</span> <span>(31)</span></div>
                            </div>
                            <div class="product-footer pt-0">
                                <div class="pickup-location"><i class="bi bi-geo-alt me-1"></i>Selasar FEB Gedung B · 600m</div>
                                <button class="btn request-btn px-2 py-2">Detail &amp; Ajukan Pinjam</button>
                            </div>
                        </article>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4">
                        <article class="product-card">
                            <div class="product-photo">
                                <img src="img/items/item-6.png" alt="Buku kuliah terbuka untuk membaca dan belajar" loading="lazy">
                                <span class="photo-tag"><i class="bi bi-circle-fill me-1" style="font-size:6px"></i>Tersedia</span>
                                <button class="favorite-btn" type="button" aria-label="Simpan favorit"><i class="bi bi-heart"></i></button>
                                <span class="photo-duration">Maks. 14 Hari Pinjam</span>
                            </div>
                            <div class="product-body">
                                <div class="product-category"><i class="bi bi-book me-1"></i>Buku Kuliah · Kedokteran / FMIPA</div>
                                <h2 class="product-name">Campbell Biology (Global Edition)</h2>
                                <p class="product-description">Hardcover original bahasa Inggris, bersih dari coretan spidol. Bonus catatan...</p>
                            </div>
                            <div class="product-footer">
                                <div class="owner-line"><img class="owner-photo" src="img/people/person-6.png" alt=""><div class="text-truncate"><div class="owner-name">dr. Sarah Clarissa <i class="bi bi-patch-check-fill text-primary"></i></div><div class="owner-faculty">FK UI ’20</div></div></div>
                                <div class="rating"><i class="bi bi-star-fill"></i> <span>4.9</span> <span>(42)</span></div>
                            </div>
                            <div class="product-footer pt-0">
                                <div class="pickup-location"><i class="bi bi-geo-alt me-1"></i>Perpustakaan Pusat UI · 450m</div>
                                <button class="btn request-btn px-2 py-2">Detail &amp; Ajukan Pinjam</button>
                            </div>
                        </article>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4">
                        <article class="product-card">
                            <div class="product-photo">
                                <img src="img/items/item-2.png" alt="Tripod kamera dan ruang studio foto" loading="lazy">
                                <span class="photo-tag busy"><i class="bi bi-circle-fill me-1" style="font-size:6px"></i>Sedang Dipinjam</span>
                                <button class="favorite-btn" type="button" aria-label="Simpan favorit"><i class="bi bi-heart"></i></button>
                                <span class="photo-duration" style="background:rgba(255,245,240,.96);color:#bf3d2c">Kembali: Lusa 10:00</span>
                            </div>
                            <div class="product-body">
                                <div class="product-category"><i class="bi bi-camera me-1"></i>Fotografi · Konten Kreatif</div>
                                <h2 class="product-name">Tripod Takara Video Head +</h2>
                                <p class="product-description">Tinggi maksimal 170cm, fluid head smooth untuk video TikTok/Reels atau recording...</p>
                            </div>
                            <div class="product-footer">
                                <div class="owner-line"><img class="owner-photo" src="img/people/person-7.png" alt=""><div class="text-truncate"><div class="owner-name">Aisyah Putri <i class="bi bi-patch-check-fill text-primary"></i></div><div class="owner-faculty">FISIP UI ’23</div></div></div>
                                <div class="rating"><i class="bi bi-star-fill"></i> <span>4.7</span> <span>(14)</span></div>
                            </div>
                            <div class="product-footer pt-0">
                                <div class="pickup-location"><i class="bi bi-geo-alt me-1"></i>Gedung Komunikasi FISIP · 800m</div>
                                <button class="btn notify-btn px-2 py-2">Ingatkan Saya</button>
                            </div>
                        </article>
                    </div>
                </div>

                <nav class="pagination-wrap d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-2 mt-3" aria-label="Halaman barang">
                    <span class="small text-secondary">Menampilkan <strong class="text-dark">1–6</strong> dari <strong class="text-dark">48</strong> perlengkapan</span>
                    <ul class="pagination">
                        <li class="page-item disabled"><a class="page-link" href="#" aria-label="Sebelumnya"><i class="bi bi-chevron-left"></i></a></li>
                        <li class="page-item active"><a class="page-link" href="#" aria-current="page">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item disabled"><span class="page-link bg-white">…</span></li>
                        <li class="page-item"><a class="page-link" href="#">8</a></li>
                        <li class="page-item"><a class="page-link" href="#" aria-label="Berikutnya"><i class="bi bi-chevron-right"></i></a></li>
                    </ul>
                </nav>

                <section class="request-panel mt-3" aria-labelledby="request-heading">
                    <div class="row align-items-center g-3">
                        <div class="col-12 col-md-8">
                            <div class="request-kicker"><i class="bi bi-stars me-1"></i>Belum Menemukan Yang Kamu Butuhkan?</div>
                            <h2 class="request-title" id="request-heading">Pasang Permintaan Pinjam (Wanted Gear)</h2>
                            <p class="request-copy">Mahasiswa lain di fakultas sekitar akan menerima notifikasi jika kami memiliki barang yang kamu cari. Gratis dan cepat dapat respon!</p>
                        </div>
                        <div class="col-12 col-md-4 text-md-end"><button class="btn request-cta px-3 py-2"><i class="bi bi-clipboard-plus me-1"></i>Buat Post Permintaan</button></div>
                    </div>
                </section>
            </section>
        </div>
    </main>

    <footer class="site-footer">
        <div class="container page-container py-4 py-lg-5">
            <div class="row g-4">
                <div class="col-12 col-md-6 col-lg-5">
                    <a class="d-inline-flex align-items-center gap-3 text-decoration-none mb-3" href="index.php">
                        <img class="footer-brand" src="img/CampusShare%20Logo.png" alt="CampusShare">
                        <span class="fw-semibold text-primary">CampusShare</span>
                    </a>
                    <p class="footer-about">Platform peminjaman dan berbagi perlengkapan akademik antar mahasiswa terverifikasi. Mendorong efisiensi finansial, gaya hidup sirkular, dan kolaborasi terpercaya di lingkungan kampus.</p>
                    <div class="small text-primary"><i class="bi bi-shield-check me-1"></i>Peminjaman Terjamin dengan KTM &amp; SSO Kampus</div>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <h2 class="footer-title">Tautan Cepat</h2>
                    <div class="footer-links"><a href="index.php">Beranda</a><a href="cari_barang.php">Eksplorasi Barang</a><a href="hal_profil.php">Katalog Saya</a><a href="#">Status Pengembalian</a><a href="tambah_barang_baru.php">Formulir Peminjaman</a></div>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <h2 class="footer-title">Kategori Populer</h2>
                    <div class="footer-links"><a href="#">Kamera &amp; Alat Visual</a><a href="#">Kalkulator Saintifik &amp; Grafis</a><a href="#">Buku Teks &amp; Diklat Kuliah</a><a href="#">Komponen Lab &amp; Elektronika</a><a href="#">Perlengkapan Presentasi &amp; Event</a></div>
                </div>
                <div class="col-6 col-md-6 col-lg-3">
                    <h2 class="footer-title">Panduan &amp; Keamanan</h2>
                    <div class="footer-links"><a href="#">Aturan Peminjaman Sehat</a><a href="#">Protokol Verifikasi Mahasiswa</a><a href="#">Kebijakan Ganti Rugi &amp; Rusak</a><a href="#">Hubungi Tim Kampus</a></div>
                </div>
            </div>
            <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between gap-3 mt-4 mt-lg-5 pt-3">
                <span>© 2026 CampusShare Indonesia. Inisiatif Mahasiswa Lintas Kampus. Hak cipta dilindungi.</span>
                <div class="legal-links d-flex flex-wrap gap-3"><a href="#">Syarat &amp; Ketentuan</a><a href="#">Kebijakan Privasi</a><a href="#">Integritas Kampus</a></div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>