<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dashboard CampusShare untuk mengelola barang dan permintaan peminjaman.">
    <title>Dashboard Saya - CampusShare</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --ink: #142238;
            --muted: #778397;
            --blue: #2059e8;
            --blue-dark: #064acb;
            --pale-blue: #edf3ff;
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
        .profile-banner { padding: 20px 24px; border: 1px solid #e7edf8; border-radius: 14px; background: linear-gradient(110deg, #fff 60%, #eff4ff); }
        .profile-photo-wrap { position: relative; flex: 0 0 auto; }
        .profile-photo { width: 80px; height: 80px; border: 3px solid #fff; border-radius: 50%; object-fit: cover; box-shadow: 0 2px 8px rgba(20, 34, 56, .16); }
        .online-dot { position: absolute; right: 0; bottom: 2px; display: flex; width: 21px; height: 21px; align-items: center; justify-content: center; border: 2px solid #fff; border-radius: 50%; background: #20bd70; color: #fff; font-size: 10px; }
        .profile-title { font-size: 20px; font-weight: 700; letter-spacing: -.03em; }
        .profile-meta { color: #68758a; font-size: 11px; }
        .profile-campus { color: var(--blue); font-size: 10px; font-weight: 600; }
        .trust-score { min-width: 275px; padding: 13px 16px; border-radius: 12px; background: #f0f5ff; }
        .trust-ring { display: inline-flex; width: 54px; height: 54px; align-items: center; justify-content: center; border: 5px solid #2865ff; border-radius: 50%; color: var(--blue-dark); font-size: 13px; font-weight: 800; }
        .trust-label { font-size: 11px; font-weight: 600; }
        .trust-value { color: var(--blue); font-size: 19px; font-weight: 800; line-height: 1.2; }
        .trust-caption { color: #189354; font-size: 9px; }

        .stat-card { height: 100%; min-height: 142px; padding: 15px; border: 1px solid #edf0f6; border-radius: 13px; background: #fff; }
        .stat-icon { display: inline-flex; width: 37px; height: 37px; align-items: center; justify-content: center; border-radius: 9px; background: #e7efff; color: var(--blue); font-size: 17px; }
        .stat-kicker { color: var(--muted); font-size: 9px; font-weight: 700; letter-spacing: .03em; }
        .stat-value { font-size: 24px; font-weight: 800; line-height: 1.2; }
        .stat-label { color: #6f7c90; font-size: 10px; }
        .stat-action { color: var(--blue); font-size: 10px; font-weight: 600; text-decoration: none; }
        .stat-badge { border-radius: 999px; background: #dcfce9; color: #168249; font-size: 9px; font-weight: 700; }
        .stat-badge.warning { background: #fff0ee; color: #d84c45; }
        .stat-cta { overflow: hidden; position: relative; }
        .stat-cta::after { position: absolute; top: -34px; right: -30px; width: 90px; height: 90px; border-radius: 50%; background: #eaf1ff; content: ""; }

        .dashboard-tabs { overflow-x: auto; flex-wrap: nowrap; padding: 5px; border-radius: 11px; background: #edf2fc; }
        .dashboard-tabs .nav-link { display: flex; align-items: center; gap: 7px; padding: 8px 12px; border-radius: 8px; color: #445168; font-size: 10px; white-space: nowrap; }
        .dashboard-tabs .nav-link.active { background: #fff; color: var(--blue); box-shadow: 0 1px 4px rgba(20, 34, 56, .08); }
        .tab-count { min-width: 17px; padding: 2px 5px; border-radius: 999px; background: #e1eaff; color: #355aab; font-size: 9px; text-align: center; }
        .tab-count.active { background: var(--blue); color: #fff; }
        .section-heading { font-size: 16px; font-weight: 700; }
        .small-muted { color: var(--muted); font-size: 10px; }

        .approval-card { padding: 15px; border: 1px solid #e9edf4; border-radius: 13px; background: #fff; }
        .requester-photo { width: 43px; height: 43px; flex: 0 0 auto; border-radius: 50%; object-fit: cover; }
        .requester-name { font-size: 11px; font-weight: 700; }
        .faculty-chip { padding: 3px 6px; border-radius: 5px; background: #e7efff; color: var(--blue-dark); font-size: 8px; font-weight: 700; }
        .requester-meta { color: var(--muted); font-size: 9px; }
        .request-status { padding: 5px 8px; border-radius: 999px; background: #edf2ff; color: var(--blue); font-size: 9px; font-weight: 600; white-space: nowrap; }
        .requested-item { padding: 8px; border-radius: 9px; background: #edf3ff; }
        .requested-item img { width: 55px; height: 45px; flex: 0 0 auto; border-radius: 7px; object-fit: cover; }
        .requested-item-title { font-size: 10px; font-weight: 700; }
        .requested-item-meta { color: #6b788d; font-size: 9px; }
        .item-status { flex: 0 0 auto; padding: 4px 7px; border-radius: 999px; background: #e3edff; color: var(--blue); font-size: 8px; }
        .purpose-label { color: #5e6b80; font-size: 9px; font-weight: 700; letter-spacing: .03em; }
        .purpose-copy { margin: 3px 0 0; color: #59667b; font-size: 10px; line-height: 1.55; }
        .btn-muted { border: 0; border-radius: 999px; background: #eef2fb; color: #637087; font-size: 9px; }
        .btn-approve { border: 0; border-radius: 999px; background: var(--blue); color: #fff; font-size: 9px; font-weight: 700; }
        .btn-approve:hover { background: #154bcc; color: #fff; }

        .sidebar-card { padding: 16px; border: 1px solid #e9edf4; border-radius: 13px; background: #fff; }
        .campaign-card { border: 0; background: linear-gradient(145deg, #174bd7, #2762ef); color: #fff; box-shadow: 0 5px 12px rgba(27, 83, 222, .2); }
        .campaign-tag { padding: 4px 8px; border-radius: 999px; background: rgba(255,255,255,.18); font-size: 8px; }
        .campaign-title { margin: 8px 0 6px; font-size: 17px; font-weight: 700; line-height: 1.25; }
        .campaign-copy { color: #e0e9ff; font-size: 10px; line-height: 1.5; }
        .campaign-button { border-radius: 999px; background: #fff; color: var(--blue); font-size: 10px; font-weight: 700; }
        .rating-row { display: grid; grid-template-columns: 75px 1fr 24px; align-items: center; gap: 7px; margin-top: 7px; }
        .rating-label { color: #69768a; font-size: 9px; }
        .rating-bar { height: 6px; border-radius: 999px; background: #e7edf7; }
        .rating-bar span { display: block; height: 100%; border-radius: inherit; background: #19c66a; }
        .rating-number { font-size: 9px; text-align: right; }
        .rating-review { padding: 9px; border-radius: 8px; background: #eff4ff; }
        .rating-review + .rating-review { margin-top: 7px; }
        .review-stars { color: #f59e0b; font-size: 10px; letter-spacing: 1px; }
        .safety-list { display: grid; gap: 8px; }
        .safety-item { display: flex; align-items: flex-start; gap: 7px; color: #58667c; font-size: 9px; line-height: 1.5; }
        .safety-item i { color: var(--blue); }

        .site-footer { margin-top: 32px; background: #fff; }
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
        }

        @media (max-width: 767.98px) {
            .page-container { padding-right: 16px; padding-left: 16px; }
            .brand-logo { width: 112px; }
            .profile-banner { padding: 16px; }
            .profile-photo { width: 64px; height: 64px; }
            .profile-title { font-size: 17px; }
            .trust-score { min-width: 0; width: 100%; }
            .stat-card { min-height: 132px; }
            .approval-card { padding: 12px; }
            .request-status { font-size: 8px; }
            .site-footer { margin-top: 20px; }
            .footer-bottom .legal-links { justify-content: flex-start !important; }
        }

        @media (max-width: 420px) {
            .request-actions { width: 100%; }
            .request-actions .btn { flex: 1 1 auto; }
            .requested-item img { width: 46px; height: 42px; }
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
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavigation" aria-controls="mainNavigation" aria-expanded="false" aria-label="Buka navigasi"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="mainNavigation">
                    <ul class="navbar-nav main-nav mx-lg-auto align-items-lg-center">
                        <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link" href="cari_barang.php">Cari Barang</a></li>
                        <li class="nav-item"><a class="nav-link active" href="hal_profil.php">Dashboard Saya</a></li>
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

    <main class="container page-container py-4">
        <section class="profile-banner d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4" aria-label="Profil mahasiswa">
            <div class="d-flex align-items-center gap-3">
                <div class="profile-photo-wrap">
                    <img class="profile-photo" src="img/profil/logo_profil.png" alt="Foto profil Rizky Pratama">
                    <span class="online-dot"><i class="bi bi-check-lg"></i></span>
                </div>
                <div>
                    <div class="d-flex flex-wrap align-items-center gap-2">
                        <h1 class="profile-title mb-0">Halo, Rizky Pratama!</h1>
                        <span class="badge rounded-pill verified-pill"><i class="bi bi-patch-check-fill me-1"></i>Terverifikasi SSO Kampus</span>
                    </div>
                    <div class="profile-meta mt-1">NIM: 2006543210 · Departemen Teknik Mesin, Fakultas Teknik UI</div>
                    <div class="profile-campus mt-1"><i class="bi bi-buildings me-1"></i>Kampus Depok - Zona Pusat Riset Mahasiswa</div>
                </div>
            </div>
            <div class="trust-score d-flex align-items-center gap-3">
                <span class="trust-ring">98%</span>
                <div><div class="trust-label">Skor Kepercayaan Kampus <i class="bi bi-info-circle text-secondary"></i></div><div class="trust-value">98 <span class="text-secondary fs-6 fw-normal">/100</span></div><div class="trust-caption">Peminjam Berintegritas Tinggi</div></div>
            </div>
        </section>

        <section class="row g-3 mb-4" aria-label="Ringkasan aktivitas">
            <div class="col-6 col-lg-3">
                <article class="stat-card d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-start"><span class="stat-icon"><i class="bi bi-archive"></i></span><span class="stat-kicker">KATALOG SAYA</span></div>
                    <div class="mt-2"><div class="stat-value">5</div><div class="stat-label">Barang aktif terdaftar</div></div>
                    <a class="btn btn-sm rounded-pill stat-action mt-auto pt-2" href="#"><i class="bi bi-plus-lg me-1"></i>Tambah Barang Baru</a>
                </article>
            </div>
            <div class="col-6 col-lg-3">
                <article class="stat-card d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-start"><span class="stat-icon"><i class="bi bi-box-seam"></i></span><span class="badge stat-badge"><i class="bi bi-circle-fill me-1" style="font-size:6px"></i>2 Aktif</span></div>
                    <div class="mt-2"><div class="stat-value">2 <span class="fs-6 fw-normal">Barang</span></div><div class="stat-label">Laptop Asus ROG · Tripod Takara</div></div>
                    <a class="stat-action mt-auto pt-2" href="#">Pantau Status Pinjam <i class="bi bi-arrow-right float-end"></i></a>
                </article>
            </div>
            <div class="col-6 col-lg-3">
                <article class="stat-card d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-start"><span class="stat-icon text-warning"><i class="bi bi-calendar-check"></i></span><span class="badge stat-badge warning"><i class="bi bi-clock me-1"></i>Besok</span></div>
                    <div class="mt-2"><div class="stat-value">1 <span class="fs-6 fw-normal">Barang</span></div><div class="stat-label">Kalkulator Scientific Casio FX-991EX (Budi - FMIPA)</div></div>
                    <a class="stat-action text-warning-emphasis mt-auto pt-2" href="#">Persiapan Pengembalian <i class="bi bi-arrow-return-left float-end"></i></a>
                </article>
            </div>
            <div class="col-6 col-lg-3">
                <article class="stat-card stat-cta d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-start"><span class="stat-icon"><i class="bi bi-envelope-check"></i></span><span class="badge rounded-pill text-bg-primary" style="font-size:8px">Perlu Tindakan</span></div>
                    <div class="mt-2 position-relative" style="z-index:1"><div class="stat-value text-primary">3 <span class="fs-6 fw-normal text-dark">Pengajuan</span></div><div class="stat-label">Menunggu persetujuan Anda</div></div>
                    <a class="btn btn-sm btn-primary rounded-pill mt-auto pt-2 position-relative" style="z-index:1;font-size:9px" href="#incoming-requests">Tinjau Sekarang <i class="bi bi-chevron-right ms-1"></i></a>
                </article>
            </div>
        </section>

        <div class="row g-3 align-items-start">
            <section class="col-12 col-lg-8" id="incoming-requests" aria-labelledby="approvals-heading">
                <nav class="nav dashboard-tabs mb-3" aria-label="Navigasi dashboard">
                    <a class="nav-link active" href="#incoming-requests"><i class="bi bi-inbox"></i>Permintaan Masuk <span class="tab-count active">3</span></a>
                    <a class="nav-link" href="#"><i class="bi bi-grid"></i>Barang Saya <span class="tab-count">5</span></a>
                    <a class="nav-link" href="#"><i class="bi bi-arrow-left-right"></i>Peminjaman Aktif <i class="bi bi-circle-fill text-success" style="font-size:6px"></i></a>
                </nav>
                <div class="d-flex align-items-end justify-content-between gap-2 mb-3">
                    <div><h2 class="section-heading mb-0" id="approvals-heading">Persetujuan Peminjaman</h2><div class="small-muted">Tinjau mahasiswa yang ingin meminjam perlengkapan Anda</div></div>
                    <span class="small-muted text-nowrap">3 menunggu respon</span>
                </div>

                <div class="d-grid gap-3">
                    <article class="approval-card">
                        <div class="d-flex align-items-start gap-2 mb-2">
                            <img class="requester-photo" src="img/people/person-2.png" alt="Annisa Nurul">
                            <div class="flex-grow-1"><div class="d-flex flex-wrap align-items-center gap-2"><span class="requester-name">Annisa Nurul</span><span class="faculty-chip">FK UI · 2021</span></div><div class="requester-meta">Trust Score: <strong class="text-primary">99/100</strong> · 14× Sukses Meminjam</div></div>
                            <span class="request-status"><i class="bi bi-clock me-1"></i>Diajukan 2 jam yang lalu</span>
                        </div>
                        <div class="requested-item d-flex align-items-center gap-2 mb-3">
                            <img src="img/items/item-2.png" alt="">
                            <div class="flex-grow-1"><div class="requested-item-title">Tripod Takara ECO-193A + Phone Holder</div><div class="requested-item-meta">Durasi: 24 – 26 Okt (3 Hari)</div></div>
                            <span class="item-status">Gratis / Kolaborasi</span>
                        </div>
                        <div class="mb-3"><div class="purpose-label">KEPERLUAN PEMINJAMAN:</div><p class="purpose-copy">“Butuh untuk pengambilan footage praktikum dokumenter tugas akhir KUI. Dijamin dijaga sangat hati-hati dan dikembalikan tepat waktu.”</p></div>
                        <div class="d-flex flex-wrap justify-content-end gap-2 request-actions"><button class="btn btn-muted px-3 py-2">Tolak Permintaan</button><button class="btn btn-approve px-3 py-2"><i class="bi bi-qr-code me-1"></i>Setujui &amp; Buat QR Serah Terima</button></div>
                    </article>

                    <article class="approval-card">
                        <div class="d-flex align-items-start gap-2 mb-2">
                            <img class="requester-photo" src="img/people/person-3.png" alt="Dimas Suryo">
                            <div class="flex-grow-1"><div class="d-flex flex-wrap align-items-center gap-2"><span class="requester-name">Dimas Suryo</span><span class="faculty-chip">FT UI · 2022</span></div><div class="requester-meta">Trust Score: <strong class="text-primary">95/100</strong> · 8× Sukses Meminjam</div></div>
                            <span class="request-status"><i class="bi bi-clock me-1"></i>Diajukan 4 jam yang lalu</span>
                        </div>
                        <div class="requested-item d-flex align-items-center gap-2 mb-3">
                            <img src="img/items/item-5.png" alt="">
                            <div class="flex-grow-1"><div class="requested-item-title">Kit Arduino Uno Complete Sensor Set</div><div class="requested-item-meta">Durasi: 25 – 28 Okt (4 Hari)</div></div>
                            <span class="item-status">Deposit KTM</span>
                        </div>
                        <div class="mb-3"><div class="purpose-label">KEPERLUAN PEMINJAMAN:</div><p class="purpose-copy">“Untuk simulasi sensor suhu sistem kendali otomatis di Lab Otomasi FT. Komponen akan dirawat dalam boks akrilik aslinya.”</p></div>
                        <div class="d-flex flex-wrap justify-content-end gap-2 request-actions"><button class="btn btn-muted px-3 py-2">Tolak Permintaan</button><button class="btn btn-approve px-3 py-2"><i class="bi bi-qr-code me-1"></i>Setujui &amp; Buat QR Serah Terima</button></div>
                    </article>

                    <article class="approval-card">
                        <div class="d-flex align-items-start gap-2 mb-2">
                            <img class="requester-photo" src="img/people/person-4.png" alt="Siti Rahma">
                            <div class="flex-grow-1"><div class="d-flex flex-wrap align-items-center gap-2"><span class="requester-name">Siti Rahma</span><span class="faculty-chip">FEB UI · 2023</span></div><div class="requester-meta">Trust Score: <strong class="text-primary">100/100</strong> · Akun Terverifikasi Baru</div></div>
                            <span class="request-status"><i class="bi bi-clock me-1"></i>Diajukan Kemarin</span>
                        </div>
                        <div class="requested-item d-flex align-items-center gap-2 mb-3">
                            <img src="img/items/item-6.png" alt="">
                            <div class="flex-grow-1"><div class="requested-item-title">Buku Teks Termodinamika Teknik (Cengel Ed. 8)</div><div class="requested-item-meta">Durasi: 26 Okt – 02 Nov (7 Hari)</div></div>
                            <span class="item-status">Bebas Biaya</span>
                        </div>
                        <div class="mb-3"><div class="purpose-label">KEPERLUAN PEMINJAMAN:</div><p class="purpose-copy">“Persiapan UTS mata kuliah lintas fakultas. Buku di perpustakaan sudah habis dipinjam.”</p></div>
                        <div class="d-flex flex-wrap justify-content-end gap-2 request-actions"><button class="btn btn-muted px-3 py-2">Tolak Permintaan</button><button class="btn btn-approve px-3 py-2"><i class="bi bi-qr-code me-1"></i>Setujui &amp; Buat QR Serah Terima</button></div>
                    </article>
                </div>
            </section>

            <aside class="col-12 col-lg-4" aria-label="Reputasi dan panduan">
                <section class="sidebar-card campaign-card mb-3">
                    <span class="campaign-tag">Inisiatif Kampus Sirkular</span>
                    <h2 class="campaign-title">Punya Alat Kuliah Tak Terpakai?</h2>
                    <p class="campaign-copy">Bantu rekan mahasiswa satu fakultas atau lintas departemen dengan meminjamkan alat lab, buku diktat, atau gadget akademik Anda.</p>
                    <a href="#" class="btn campaign-button w-100 py-2 text-decoration-none"><i class="bi bi-plus-circle me-1"></i>Tambah Barang Baru</a>
                </section>

                <section class="sidebar-card mb-3" aria-labelledby="rating-heading">
                    <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                        <h2 class="section-heading mb-0" id="rating-heading">Ulasan &amp; Rating Saya</h2>
                        <span class="small fw-semibold"><i class="bi bi-star-fill text-warning"></i> 4.96 <span class="small-muted">(23 Ulasan)</span></span>
                    </div>
                    <div class="mb-3">
                        <div class="rating-row"><span class="rating-label">Kondisi Barang</span><div class="rating-bar"><span style="width:98%"></span></div><span class="rating-number">4.9</span></div>
                        <div class="rating-row"><span class="rating-label">Ketepatan Waktu</span><div class="rating-bar"><span style="width:100%;background:#2361f0"></span></div><span class="rating-number">5.0</span></div>
                        <div class="rating-row"><span class="rating-label">Komunikasi Chat</span><div class="rating-bar"><span style="width:98%;background:#2361f0"></span></div><span class="rating-number">4.9</span></div>
                    </div>
                    <article class="rating-review">
                        <div class="d-flex justify-content-between"><span class="small fw-semibold">Mahendra (FT)</span><span class="small-muted">3 hari lalu</span></div>
                        <div class="review-stars">★★★★★</div>
                        <p class="small-muted mb-0">“Pinjam kit Arduino Rizky, kelengkapan kabel dan modul lengkap banget. Komunikasi responsif!”</p>
                    </article>
                    <article class="rating-review">
                        <div class="d-flex justify-content-between"><span class="small fw-semibold">Farah (FIA)</span><span class="small-muted">1 minggu lalu</span></div>
                        <div class="review-stars">★★★★★</div>
                        <p class="small-muted mb-0">“Sangat kooperatif saat COD serah terima di kantin teknik. Laptop bersih &amp; baterai awet.”</p>
                    </article>
                </section>

                <section class="sidebar-card" aria-labelledby="security-heading">
                    <h2 class="small fw-bold text-primary mb-2" id="security-heading"><i class="bi bi-shield-lock-fill me-1"></i>Protokol Keamanan Transaksi</h2>
                    <div class="safety-list">
                        <div class="safety-item"><i class="bi bi-check-circle-fill"></i><span>Pastikan melakukan pemindaian QR Code saat serah terima barang langsung di area kampus.</span></div>
                        <div class="safety-item"><i class="bi bi-check-circle-fill"></i><span>Periksa kondisi fisik dan fungsional alat bersama peminjam sebelum verifikasi final.</span></div>
                        <div class="safety-item"><i class="bi bi-check-circle-fill"></i><span>Jaminan ganti rugi didukung SSO Universitas apabila terjadi kerusakan saat masa pinjam.</span></div>
                    </div>
                </section>
            </aside>
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
                    <div class="footer-links"><a href="index.php">Beranda</a><a href="cari_barang.php">Eksplorasi Barang</a><a href="#">Katalog Saya</a><a href="#">Status Pengembalian</a><a href="#">Formulir Peminjaman</a></div>
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
                <span>© 2024 CampusShare Indonesia. Inisiatif Mahasiswa Lintas Kampus. Hak cipta dilindungi.</span>
                <div class="legal-links d-flex flex-wrap gap-3"><a href="#">Syarat &amp; Ketentuan</a><a href="#">Kebijakan Privasi</a><a href="#">Integritas Kampus</a></div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>