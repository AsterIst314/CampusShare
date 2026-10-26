<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Detail peminjaman Laptop ASUS VivoBook 14 di CampusShare.">
    <title>Laptop ASUS VivoBook 14 - CampusShare</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --ink: #142238;
            --muted: #748096;
            --blue: #2059e8;
            --blue-dark: #064acb;
            --pale: #eef4ff;
            --page: #f7f8fd;
        }

        body {
            background: var(--page);
            color: var(--ink);
            font-family: "Plus Jakarta Sans", sans-serif;
            font-size: 13px;
        }

        a { color: inherit; }
        .site-header { background: #fff; box-shadow: 0 2px 10px rgba(20, 34, 56, .06); }
        .navbar { min-height: 76px; }
        .brand-logo { width: 126px; height: auto; }
        .verified-pill { color: var(--blue); background: #eff4ff; font-size: 11px; font-weight: 600; }
        .main-nav .nav-link { padding: 10px 13px; border-radius: 999px; color: #26354b; font-size: 12px; }
        .main-nav .nav-link.active { background: #eaf0ff; color: var(--blue); }
        .nav-action { white-space: nowrap; }
        .user-avatar { width: 34px; height: 34px; border-radius: 50%; object-fit: cover; }

        .page-container { max-width: 1280px; }
        .breadcrumb-line { color: #25334a; font-size: 11px; }
        .breadcrumb-line a { text-decoration: none; }
        .sso-mark { color: var(--blue); }
        .quick-response { color: #9a5b00; background: #fff0d9; font-size: 10px; font-weight: 700; }
        .panel { border: 1px solid rgba(21, 40, 70, .06); border-radius: 15px; background: #fff; }

        .gallery-main { position: relative; overflow: hidden; border-radius: 14px; background: #e8edf4; }
        .gallery-main img { display: block; width: 100%; aspect-ratio: 390 / 292; object-fit: cover; }
        .gallery-count { position: absolute; right: 10px; bottom: 10px; padding: 5px 9px; border-radius: 6px; background: rgba(17, 30, 49, .82); color: #fff; font-size: 10px; }
        .gallery-thumb { overflow: hidden; padding: 0; border: 2px solid transparent; border-radius: 10px; background: #edf1f6; }
        .gallery-thumb.active { border-color: var(--blue); }
        .gallery-thumb img { display: block; width: 100%; aspect-ratio: 1.25; object-fit: cover; }
        .section-heading { font-size: 14px; font-weight: 700; }
        .section-heading i { color: var(--blue); }
        .small-muted { color: var(--muted); font-size: 11px; }

        .equipment-row { min-height: 54px; padding: 9px 10px; border-radius: 9px; background: var(--pale); }
        .equipment-icon { display: inline-flex; width: 32px; height: 32px; align-items: center; justify-content: center; flex: 0 0 auto; border-radius: 8px; background: #dce8ff; color: var(--blue); }
        .equipment-title { font-size: 11px; font-weight: 600; }
        .equipment-desc { color: var(--muted); font-size: 10px; }
        .trust-box { border-radius: 12px; background: #e7efff; }
        .availability { color: #138447; background: #e8fff1; font-size: 10px; font-weight: 700; }
        .duration { color: var(--blue-dark); background: #eaf0ff; font-size: 10px; font-weight: 700; }
        .product-title { font-size: clamp(19px, 2vw, 24px); font-weight: 800; letter-spacing: -.04em; line-height: 1.35; }
        .rating-stars { color: #f59e0b; letter-spacing: 1px; }
        .rating-text { color: var(--muted); font-size: 11px; }
        .product-description { color: #596579; font-size: 12px; line-height: 1.65; }
        .recommendation-box { border-radius: 10px; background: #edf3ff; font-size: 11px; font-weight: 600; }
        .usage-box { border-radius: 10px; background: #eaf1ff; color: #46546a; font-size: 11px; line-height: 1.55; }
        .usage-box ul { margin: 5px 0 0; padding-left: 18px; }
        .usage-box li + li { margin-top: 5px; }
        .spec-cell { height: 100%; min-height: 64px; padding: 10px; border-radius: 9px; background: #eff4ff; }
        .spec-label { color: var(--muted); font-size: 10px; }
        .spec-value { margin-top: 3px; font-size: 11px; font-weight: 600; }
        .location-row { padding: 10px; border-radius: 10px; background: #edf3ff; }
        .location-row + .location-row { margin-top: 8px; }
        .location-icon { color: var(--blue); font-size: 15px; }
        .location-title { font-size: 11px; font-weight: 600; }

        .borrower-card { box-shadow: 0 3px 6px rgba(20, 34, 56, .12); }
        .borrower-photo { width: 48px; height: 48px; border-radius: 50%; object-fit: cover; }
        .borrower-name { font-size: 13px; font-weight: 700; }
        .borrower-meta { color: var(--muted); font-size: 10px; }
        .borrower-rating { padding: 9px 10px; border: 1px solid #edf0f6; border-radius: 10px; font-size: 11px; }
        .chat-link { display: block; padding: 10px; border-radius: 999px; background: #eaf0ff; color: var(--blue); font-size: 11px; font-weight: 600; text-align: center; text-decoration: none; }
        .form-label { margin-bottom: 5px; font-size: 10px; font-weight: 600; }
        .form-control, .form-select { min-height: 38px; border-color: #e1e6ef; border-radius: 8px; background-color: #f8f9fc; font-size: 11px; }
        .duration-info { padding: 8px 10px; border-radius: 8px; background: #eaf0ff; color: var(--blue); font-size: 10px; font-weight: 600; }
        .terms { color: var(--muted); font-size: 10px; line-height: 1.55; }
        .submit-btn { min-height: 44px; border: 0; border-radius: 999px; background: var(--blue); box-shadow: 0 4px 8px rgba(32, 89, 232, .22); color: #fff; font-size: 12px; font-weight: 700; }
        .submit-btn:hover { background: #174bd1; color: #fff; }
        .fee-note { color: var(--muted); font-size: 10px; }

        .reviews-panel { padding: 22px; }
        .score-panel { min-width: 250px; padding: 12px 16px; border-radius: 12px; background: #eef4ff; }
        .score { font-size: 24px; font-weight: 700; line-height: 1.1; }
        .review-card { height: 100%; padding: 15px; border-radius: 12px; background: #eef4ff; }
        .reviewer-photo { width: 38px; height: 38px; border-radius: 50%; object-fit: cover; }
        .reviewer-name { font-size: 11px; font-weight: 700; }
        .reviewer-meta { color: var(--muted); font-size: 10px; }
        .review-quote { min-height: 74px; margin: 10px 0; color: #455166; font-size: 11px; font-style: italic; line-height: 1.55; }
        .review-date { color: #67748a; font-size: 9px; }

        .site-footer { margin-top: 18px; background: #fff; }
        .footer-brand { width: 112px; }
        .footer-about { max-width: 300px; color: #68758a; font-size: 11px; line-height: 1.6; }
        .footer-title { margin-bottom: 12px; font-size: 12px; font-weight: 700; }
        .footer-links { display: grid; gap: 9px; }
        .footer-links a { color: #68758a; font-size: 10px; text-decoration: none; }
        .footer-links a:hover { color: var(--blue); }
        .footer-bottom { border-top: 1px solid #f0f2f7; color: #8490a2; font-size: 9px; }
        .legal-links a { color: #667287; text-decoration: none; }

        @media (max-width: 991.98px) {
            .navbar { min-height: 66px; }
            .main-nav { padding: 12px 0; }
            .main-nav .nav-link { border-radius: 8px; }
        }

        @media (max-width: 767.98px) {
            .navbar { padding-top: 10px; padding-bottom: 10px; }
            .brand-logo { width: 112px; }
            .page-container { padding-right: 16px; padding-left: 16px; }
            .gallery-main img { aspect-ratio: 1.3; }
            .reviews-panel { padding: 16px; }
            .score-panel { min-width: 0; }
            .review-quote { min-height: 0; }
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
                        <li class="nav-item"><a class="nav-link active" href="index.php"><i class="bi bi-search me-1"></i>Cari Barang</a></li>
                        <li class="nav-item"><a class="nav-link" href="hal_profil.php">Dashboard Saya</a></li>
                        <li class="nav-item"><a class="nav-link" href="riwayat_peminjama_&_pengembalian_barang.php">Riwayat Pinjam</a></li>
                        <li class="nav-item"><a class="nav-link" href="layar_chat_pesan_antar_mahasiswa.php"><i class="bi bi-chat-dots me-1"></i>Pesan / Chat</a></li>
                    </ul>
                    <div class="d-flex align-items-center gap-3">
                        <a class="btn btn-primary btn-sm rounded-pill px-3 nav-action" href="#"><i class="bi bi-plus-circle me-1"></i>Pinjamkan Barang</a>
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

    <main class="container page-container py-4">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
            <nav class="breadcrumb-line" aria-label="Breadcrumb">
                <a href="index.php"><i class="bi bi-house-door"></i> Beranda</a>
                <span class="mx-1 text-secondary">/</span>
                <a href="index.php">Elektronik</a>
                <span class="mx-1 text-secondary">/</span>
                <span aria-current="page">Laptop ASUS VivoBook 14</span>
            </nav>
            <span class="badge rounded-pill quick-response"><i class="bi bi-lightning-charge-fill me-1"></i>Respon Cepat Mahasiswa</span>
        </div>

        <div class="row g-3 align-items-start">
            <section class="col-12 col-md-4" aria-label="Foto dan kelengkapan barang">
                <div class="panel p-2">
                    <div class="gallery-main">
                        <img src="img/items/item-1.png" alt="Laptop ASUS VivoBook 14 siap dipinjam" fetchpriority="high">
                        <span class="gallery-count"><i class="bi bi-images me-1"></i>1 / 4 Foto Asli</span>
                    </div>
                    <div class="row g-2 mt-1" aria-label="Galeri foto barang">
                        <div class="col-3"><button class="gallery-thumb active w-100" type="button" aria-label="Foto laptop tampak depan"><img src="img/items/item-1.png" alt=""></button></div>
                        <div class="col-3"><button class="gallery-thumb w-100" type="button" aria-label="Detail keyboard laptop"><img src="img/items/item-1.png" alt="" style="object-position: 20% 80%; transform: scale(1.5)"></button></div>
                        <div class="col-3"><button class="gallery-thumb w-100" type="button" aria-label="Detail laptop"><img src="img/items/item-1.png" alt="" style="object-position: 75% 50%; transform: scale(1.5)"></button></div>
                        <div class="col-3"><button class="gallery-thumb w-100" type="button" aria-label="Tampilan laptop lainnya"><img src="img/items/item-1.png" alt="" style="object-position: 50% 15%; transform: scale(1.5)"></button></div>
                    </div>
                </div>

                <div class="panel p-3 mt-3">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h2 class="section-heading mb-0"><i class="bi bi-box-seam me-1"></i>Kelengkapan Paket</h2>
                        <span class="small-muted">3 Item Sertaan</span>
                    </div>
                    <div class="d-grid gap-2">
                        <div class="equipment-row d-flex align-items-center gap-2">
                            <span class="equipment-icon"><i class="bi bi-plug"></i></span>
                            <div><div class="equipment-title">Charger Original 65W Type-C</div><div class="equipment-desc">Fast charging &amp; kabel utuh tanpa terkelupas</div></div>
                        </div>
                        <div class="equipment-row d-flex align-items-center gap-2">
                            <span class="equipment-icon"><i class="bi bi-mouse"></i></span>
                            <div><div class="equipment-title">Mouse Wireless Silent Click</div><div class="equipment-desc">Termasuk receiver USB &amp; baterai baru</div></div>
                        </div>
                        <div class="equipment-row d-flex align-items-center gap-2">
                            <span class="equipment-icon"><i class="bi bi-briefcase"></i></span>
                            <div><div class="equipment-title">Tas Softcase Laptop Padded</div><div class="equipment-desc">Tahan cipratan air, busa proteksi ganda</div></div>
                        </div>
                    </div>
                </div>

                <div class="trust-box d-flex gap-2 p-3 mt-3">
                    <i class="bi bi-shield-check sso-mark fs-5"></i>
                    <div><div class="equipment-title">Jaminan Kejujuran Mahasiswa</div><div class="equipment-desc">Seluruh kondisi fisik dan fungsionalitas telah direkam video sebelum peminjaman diserahkan.</div></div>
                </div>
            </section>

            <section class="col-12 col-md-4" aria-label="Deskripsi barang">
                <article class="panel p-3 mb-3">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
                        <span class="badge rounded-pill availability"><i class="bi bi-circle-fill me-1" style="font-size:6px"></i>Tersedia untuk Dipinjam</span>
                        <span class="badge rounded-pill duration">Maks. 7 Hari</span>
                    </div>
                    <h1 class="product-title mb-2">Laptop ASUS VivoBook 14 – Intel Core i5 16GB RAM</h1>
                    <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                        <span class="rating-stars">★★★★★</span><span class="fw-semibold">4.9</span>
                        <span class="text-secondary">•</span><span class="rating-text">Kondisi 95% Mulus</span>
                        <span class="text-secondary">•</span><span class="rating-text">24 Dipinjam</span>
                    </div>
                    <div class="product-description mb-2">Baterai Sehat 4–5 Jam</div>
                    <div class="recommendation-box px-2 py-2"><i class="bi bi-patch-check me-1 text-primary"></i>OS Aktif: Windows 11 Home &amp; Microsoft Office 365 Resmi</div>
                </article>

                <article class="panel p-3 mb-3">
                    <h2 class="section-heading mb-2"><i class="bi bi-file-earmark-text me-1"></i>Deskripsi &amp; Rekomendasi Pemakaian</h2>
                    <p class="product-description mb-2">Laptop ini dipinjamkan khusus untuk mendukung sesama mahasiswa yang membutuhkan perangkat komputasi handal. Sangat cocok untuk pengerjaan simulasi CAD, skripsi/olah data SPSS &amp; Python, editing grafis ringan (Photoshop, Canva, Premiere dasar), hingga presentasi sidang skripsi berkat port display lengkap.</p>
                    <div class="usage-box p-2">
                        <div class="fw-semibold"><i class="bi bi-cone-striped me-1 text-warning"></i>Aturan Pemakaian Pemilik:</div>
                        <ul>
                            <li>Dilarang menginstal software bajakan berat/file torrent yang rentan malware.</li>
                            <li>Harap tidak menaruh makanan/minuman tanpa tutup dekat keyboard.</li>
                            <li>Wajib logout akun pribadi (Google/Microsoft/sofware) sebelum pengembalian.</li>
                            <li>Keterlambatan tanpa konfirmasi h-1 dikenakan penalti reputasi profil kampus.</li>
                        </ul>
                    </div>
                </article>

                <article class="panel p-3 mb-3">
                    <h2 class="section-heading mb-2"><i class="bi bi-cpu me-1"></i>Spesifikasi Teknis</h2>
                    <div class="row g-2">
                        <div class="col-6"><div class="spec-cell"><div class="spec-label">Prosesor &amp; RAM</div><div class="spec-value">Core i5-1135G7 · 16 GB DDR4</div></div></div>
                        <div class="col-6"><div class="spec-cell"><div class="spec-label">Penyimpanan</div><div class="spec-value">512GB PCIe NVMe SSD</div></div></div>
                        <div class="col-6"><div class="spec-cell"><div class="spec-label">Port Eksternal</div><div class="spec-value">Full HDMI, USB Type-C, USB 3.2</div></div></div>
                        <div class="col-6"><div class="spec-cell"><div class="spec-label">Bobot &amp; Layar</div><div class="spec-value">1.40 kg · 14” FHD Anti-Glare</div></div></div>
                    </div>
                </article>

                <article class="panel p-3">
                    <h2 class="section-heading mb-2"><i class="bi bi-geo-alt me-1"></i>Pilihan Lokasi Serah Terima</h2>
                    <div class="location-row d-flex gap-2">
                        <i class="bi bi-briefcase location-icon"></i>
                        <div><div class="location-title">Perpustakaan Pusat Kampus (Lantai 1 Meja Diskusi)</div><div class="small-muted mt-1">Cocok untuk cek fungsi fisik di tempat sejuk &amp; ada colokan listrik.</div></div>
                    </div>
                    <div class="location-row d-flex gap-2">
                        <i class="bi bi-shop location-icon"></i>
                        <div><div class="location-title">Kantin Fakultas Teknik (Dekat Gazebo Mesin)</div><div class="small-muted mt-1">Jadwal serah terima fleksibel jam istirahat kuliah (12.00–13.30).</div></div>
                    </div>
                </article>
            </section>

            <aside class="col-12 col-md-4" aria-label="Formulir pengajuan pinjam">
                <div class="panel borrower-card p-3">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <img class="borrower-photo" src="img/people/person-1.png" alt="Andi Pratama">
                        <div class="flex-grow-1">
                            <div class="borrower-name">Andi Pratama <i class="bi bi-patch-check-fill text-primary"></i></div>
                            <div class="borrower-meta">Teknik Mesin · NIM 1906**** (2021)</div>
                        </div>
                    </div>
                    <div class="borrower-rating d-flex flex-wrap justify-content-between gap-2 mb-2">
                        <span><i class="bi bi-star-fill text-warning me-1"></i><strong>4.9</strong> <span class="text-secondary">(24 dipinjamkan)</span></span>
                        <span><i class="bi bi-stopwatch text-primary me-1"></i><strong>Balas ~10 mnt</strong></span>
                    </div>
                    <a class="chat-link mb-3" href="#"><i class="bi bi-chat-left-text me-1"></i>Tanya Pemilik via Chat</a>

                    <h2 class="section-heading mb-3">Formulir Pengajuan Pinjam</h2>
                    <form>
                        <div class="row g-2 mb-2">
                            <div class="col-6">
                                <label class="form-label" for="borrow-start">Mulai Pinjam</label>
                                <input class="form-control" id="borrow-start" type="date" value="2024-11-20">
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="borrow-end">Tgl Kembali</label>
                                <input class="form-control" id="borrow-end" type="date" value="2024-11-24">
                            </div>
                        </div>
                        <div class="duration-info d-flex justify-content-between align-items-center mb-3">
                            <span><i class="bi bi-clock me-1"></i>Durasi Peminjaman:</span><span>4 Hari (Aman 2–7 Hari)</span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="handover-location">Titik Temu Kampus Disepakati</label>
                            <select class="form-select" id="handover-location">
                                <option>Perpustakaan Pusat Kampus (Lantai 1)</option>
                                <option>Kantin Fakultas Teknik (Dekat Gazebo Mesin)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="borrow-purpose">Tujuan / Alasan Peminjaman</label>
                            <textarea class="form-control" id="borrow-purpose" rows="3" placeholder="Tuliskan tujuan peminjaman...">Untuk kebutuhan praktikum simulasi CAD matakuliah Elemen Mesin II</textarea>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="borrow-agreement">
                            <label class="form-check-label terms" for="borrow-agreement">Saya berkomitmen menjaga barang dan mengembalikan tepat waktu sesuai tata tertib integritas kampus.</label>
                        </div>
                        <button class="btn submit-btn w-100" type="submit"><i class="bi bi-arrow-left-right me-1"></i>Ajukan Peminjaman Sekarang</button>
                        <div class="fee-note text-center mt-2"><i class="bi bi-shield-lock me-1"></i>Tanpa Biaya Sewa · Inisiatif Komunitas Mahasiswa</div>
                    </form>
                </div>
            </aside>
        </div>

        <section class="panel reviews-panel mt-4" aria-labelledby="reviews-heading">
            <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3 mb-3">
                <div>
                    <div class="d-flex flex-wrap align-items-center gap-2"><h2 class="section-heading mb-0" id="reviews-heading">Ulasan &amp; Reputasi Peminjam</h2><span class="badge rounded-pill verified-pill">4 Ulasan Terverifikasi</span></div>
                    <p class="small-muted mb-0 mt-1">Transparansi pengalaman antar mahasiswa dari transaksi peminjaman sebelumnya.</p>
                </div>
                <div class="score-panel d-flex align-items-center gap-3">
                    <div><div class="score">5.0</div><div class="rating-stars">★★★★★</div></div>
                    <div class="border-start ps-3"><div class="small fw-semibold">100% Mengembalikan Tepat Waktu</div><div class="small-muted">Kondisi barang selalu prima saat serah terima.</div></div>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-12 col-md-4"><article class="review-card"><div class="d-flex align-items-center gap-2"><img class="reviewer-photo" src="img/people/person-2.png" alt=""><div class="flex-grow-1"><div class="reviewer-name">Rian</div><div class="reviewer-meta">Teknik Industri ’22</div></div><span class="rating-stars">★★★★★</span></div><blockquote class="review-quote">“Barang sangat terawat, proses serah terima mudah di lobi FT. Laptop kencang buat simulasi Arena, sangat menolong praktikum semester ini!”</blockquote><div class="review-date"><i class="bi bi-clock-history me-1"></i>Dipinjam 3 hari lalu (Durasi: 3 hari)</div></article></div>
                <div class="col-12 col-md-4"><article class="review-card"><div class="d-flex align-items-center gap-2"><img class="reviewer-photo" src="img/people/person-3.png" alt=""><div class="flex-grow-1"><div class="reviewer-name">Dita Aulia</div><div class="reviewer-meta">Ilmu Komputer ’21</div></div><span class="rating-stars">★★★★★</span></div><blockquote class="review-quote">“Baterainya awet banget saat presentasi di ruang seminar tanpa colokan. Charger Type-C aslinya juga berfungsi sangat cepat.”</blockquote><div class="review-date"><i class="bi bi-clock-history me-1"></i>Dipinjam 2 minggu lalu (Durasi: 5 hari)</div></article></div>
                <div class="col-12 col-md-4"><article class="review-card"><div class="d-flex align-items-center gap-2"><img class="reviewer-photo" src="img/people/person-4.png" alt=""><div class="flex-grow-1"><div class="reviewer-name">Farhan Malik</div><div class="reviewer-meta">Teknik Elektro ’20</div></div><span class="rating-stars">★★★★★</span></div><blockquote class="review-quote">“Bang Andi komunikatif banget pas janjian di perpus pusat. Mouse wireless bawaannya juga responsif buat navigasi rumus laporan.”</blockquote><div class="review-date"><i class="bi bi-clock-history me-1"></i>Dipinjam 1 bulan lalu (Durasi: 4 hari)</div></article></div>
            </div>
        </section>
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
                    <div class="footer-links"><a href="index.php">Beranda</a><a href="index.php">Eksplorasi Barang</a><a href="hal_profil.php">Katalog Saya</a><a href="#">Status Pengembalian</a><a href="tambah_barang_baru.php">Formulir Peminjaman</a></div>
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