<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pantau status peminjaman dan pengembalian barang di CampusShare.">
    <title>Riwayat Peminjaman &amp; Pengembalian - CampusShare</title>
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
        .breadcrumb-line { color: #6e7b90; font-size: 10px; }
        .breadcrumb-line a { text-decoration: none; }
        .page-title { margin: 2px 0 4px; font-size: clamp(22px, 3vw, 28px); font-weight: 800; letter-spacing: -.04em; }
        .page-description { color: #748096; font-size: 11px; line-height: 1.5; }
        .header-link { color: var(--blue); font-size: 10px; font-weight: 600; text-decoration: none; }

        .summary-card { height: 100%; min-height: 112px; padding: 13px 14px; border: 1px solid #e8edf5; border-radius: 12px; background: #fff; }
        .summary-icon { display: inline-flex; width: 29px; height: 29px; align-items: center; justify-content: center; border-radius: 50%; background: #e9f0ff; color: var(--blue); }
        .summary-label { color: #68758a; font-size: 9px; font-weight: 600; }
        .summary-value { font-size: 21px; font-weight: 800; line-height: 1.1; }
        .summary-subtitle { color: #778397; font-size: 9px; }
        .summary-progress { height: 4px; border-radius: 999px; background: #e8edf5; }
        .summary-progress span { display: block; height: 100%; border-radius: inherit; background: var(--blue); }

        .main-tabs { gap: 6px; padding: 5px; border-radius: 10px; background: #edf2fb; }
        .main-tabs .nav-link { display: flex; align-items: center; justify-content: center; gap: 7px; min-height: 36px; padding: 7px 11px; border-radius: 8px; color: #536177; font-size: 10px; font-weight: 600; }
        .main-tabs .nav-link.active { background: var(--blue); color: #fff; box-shadow: 0 2px 5px rgba(32, 89, 232, .2); }
        .tab-count { min-width: 19px; padding: 2px 5px; border-radius: 999px; background: rgba(255, 255, 255, .18); font-size: 9px; }
        .history-toolbar { padding: 9px 11px; border: 1px solid #e9edf5; border-radius: 10px; background: #fff; }
        .history-search { min-height: 32px; border: 0; border-radius: 7px; background: #f6f8fc; font-size: 10px; }
        .history-filter { max-width: 155px; min-height: 32px; border-color: #e6eaf2; border-radius: 7px; font-size: 9px; }
        .status-filters { display: flex; flex-wrap: wrap; gap: 6px; }
        .status-filter { padding: 5px 9px; border: 1px solid #e9edf5; border-radius: 999px; background: #fff; color: #5c6980; font-size: 9px; }
        .status-filter.active { border-color: var(--blue); background: var(--blue); color: #fff; }

        .history-card { padding: 13px; border: 1px solid #e9edf4; border-radius: 12px; background: #fff; }
        .history-state { font-size: 9px; font-weight: 700; }
        .history-state.active { color: #e24848; }
        .history-state.pending { color: #c58113; }
        .history-state.done { color: #15864a; }
        .history-date { color: #79859a; font-size: 9px; }
        .history-item { display: flex; align-items: flex-start; gap: 10px; margin-top: 8px; }
        .history-photo { width: 100px; height: 82px; flex: 0 0 auto; border-radius: 8px; object-fit: cover; }
        .history-name { margin: 0 0 4px; font-size: 13px; font-weight: 700; line-height: 1.4; }
        .borrower-avatar { width: 26px; height: 26px; border-radius: 50%; object-fit: cover; }
        .history-meta { color: #758197; font-size: 9px; }
        .history-review { margin-top: 8px; padding: 8px; border-radius: 8px; background: #f2f5fc; color: #68758a; font-size: 9px; line-height: 1.5; }
        .history-stars { color: #f59e0b; letter-spacing: 1px; }
        .progress-track { height: 6px; border-radius: 999px; background: #e7edf7; }
        .progress-track span { display: block; height: 100%; border-radius: inherit; background: #e1a322; }
        .history-actions { display: flex; flex-wrap: wrap; align-items: center; gap: 7px; margin-top: 9px; }
        .btn-small { border-radius: 999px; font-size: 9px; font-weight: 600; }
        .btn-soft { border: 0; background: #e9effc; color: #4f607d; }
        .btn-main { border: 0; background: var(--blue); color: #fff; }
        .btn-main:hover { background: #164bcc; color: #fff; }
        .text-link { color: var(--blue); font-size: 9px; font-weight: 600; text-decoration: none; }

        .sidebar-card { padding: 14px; border: 1px solid #e9edf4; border-radius: 12px; background: #fff; }
        .qr-ready { color: #159351; font-size: 9px; font-weight: 700; }
        .qr-frame { display: grid; width: 148px; height: 148px; place-items: center; margin: 12px auto; border: 1px solid #edf0f5; border-radius: 12px; background: #fff; }
        .qr-placeholder { display: grid; width: 118px; height: 118px; grid-template-columns: repeat(9, 1fr); grid-template-rows: repeat(9, 1fr); gap: 3px; }
        .qr-placeholder span { border-radius: 2px; background: #10213a; }
        .qr-placeholder span:nth-child(3n), .qr-placeholder span:nth-child(7n), .qr-placeholder span:nth-child(11n) { background: transparent; }
        .qr-code-label { color: var(--blue); font-size: 10px; font-weight: 700; letter-spacing: .2em; text-align: center; }
        .qr-detail { display: flex; justify-content: space-between; gap: 10px; padding: 8px 0; border-top: 1px solid #edf0f5; color: #69768a; font-size: 9px; }
        .protocol-step { display: flex; align-items: flex-start; gap: 8px; padding: 8px 0; border-top: 1px solid #edf0f5; }
        .protocol-icon { color: var(--blue); }
        .protocol-title { font-size: 9px; font-weight: 700; }
        .protocol-copy { margin: 2px 0 0; color: #748096; font-size: 8px; line-height: 1.5; }
        .help-button { border: 1px solid #e2e8f3; border-radius: 999px; color: var(--blue); font-size: 9px; font-weight: 600; }

        .pagination-wrap { padding: 8px 10px; border: 1px solid #e9edf4; border-radius: 9px; background: #fff; }
        .pagination { gap: 4px; margin: 0; }
        .pagination .page-link { display: inline-flex; min-width: 29px; height: 29px; align-items: center; justify-content: center; border: 0; border-radius: 7px !important; background: #eff3fb; color: #28364c; font-size: 9px; }
        .pagination .active .page-link { background: var(--blue-dark); color: #fff; }

        .site-footer { margin-top: 32px; background: #fff; }
        .footer-brand { width: 112px; }
        .footer-about { max-width: 310px; color: #68758a; font-size: 11px; line-height: 1.65; }
        .footer-title { margin-bottom: 12px; font-size: 12px; font-weight: 700; }
        .footer-links { display: grid; gap: 9px; }
        .footer-links a { color: #68758a; font-size: 10px; text-decoration: none; }
        .footer-links a:hover, .legal-links a:hover { color: var(--blue); }
        .footer-bottom { border-top: 1px solid #f0f2f7; color: #8490a2; font-size: 9px; }
        .legal-links a { color: #667287; text-decoration: none; }

        .modal-backdrop.show { background-color: #000; opacity: .58; }
        .review-modal { max-width: 490px; }
        .review-modal .modal-content { overflow: hidden; border: 0; border-radius: 15px; box-shadow: 0 15px 50px rgba(10, 20, 40, .2); }
        .review-modal .modal-header { padding: 13px 16px 9px; border-bottom: 1px solid #edf0f5; }
        .review-modal .modal-title { font-size: 15px; font-weight: 700; }
        .modal-subtitle { margin-top: 2px; color: #778397; font-size: 9px; }
        .review-modal .modal-body { padding: 10px 15px; }
        .review-modal .modal-footer { padding: 8px 14px 12px; border-top: 1px solid #edf0f5; }
        .borrowed-item { display: flex; align-items: center; gap: 8px; padding: 8px; border-radius: 9px; background: #edf3ff; }
        .borrowed-photo { width: 48px; height: 43px; flex: 0 0 auto; border-radius: 6px; object-fit: cover; }
        .borrowed-title { font-size: 9px; font-weight: 700; }
        .borrowed-meta { color: #66748a; font-size: 8px; }
        .borrow-date { margin-left: auto; padding: 4px 6px; border-radius: 5px; background: #dce8ff; color: var(--blue-dark); font-size: 8px; white-space: nowrap; }
        .overall-rating { padding: 10px; border-radius: 9px; background: #edf3ff; text-align: center; }
        .rating-heading { font-size: 9px; font-weight: 600; }
        .star-picker { display: flex; justify-content: center; gap: 3px; margin: 1px 0; }
        .star-picker button { padding: 0; border: 0; background: transparent; color: #f59e0b; font-size: 23px; line-height: 1.1; }
        .rating-recommendation { color: var(--blue-dark); font-size: 9px; font-weight: 600; }
        .category-rating-label { font-size: 8px; font-weight: 600; }
        .mini-stars { display: flex; gap: 1px; }
        .mini-stars button { padding: 0; border: 0; background: transparent; color: #f59e0b; font-size: 12px; line-height: 1; }
        .rating-category { display: flex; align-items: center; justify-content: space-between; gap: 5px; padding: 5px 7px; border-radius: 6px; background: #edf3ff; }
        .modal-form-label { margin-bottom: 4px; font-size: 8px; font-weight: 600; }
        .modal-review-text { min-height: 62px; padding: 7px; border-color: #e4e9f2; border-radius: 7px; background: #f8faff; font-size: 8px; line-height: 1.45; }
        .modal-form-check { font-size: 8px; }
        .bonus-note { padding: 8px; border-radius: 7px; background: #edf3ff; color: var(--blue-dark); font-size: 8px; line-height: 1.4; }
        .review-submit { border-radius: 999px; background: var(--blue); color: #fff; font-size: 9px; font-weight: 600; }
        .review-submit:hover { background: #164bcc; color: #fff; }
        .review-cancel { border-radius: 999px; background: #eef2fa; color: #55637a; font-size: 9px; }

        @media (max-width: 991.98px) {
            .navbar { min-height: 66px; }
            .main-nav { padding: 12px 0; }
            .main-nav .nav-link { border-radius: 8px; }
        }

        @media (max-width: 767.98px) {
            .page-container { padding-right: 16px; padding-left: 16px; }
            .brand-logo { width: 112px; }
            .main-tabs { overflow-x: auto; flex-wrap: nowrap; }
            .main-tabs .nav-link { min-width: max-content; }
            .history-photo { width: 84px; height: 76px; }
            .review-modal { max-width: calc(100vw - 24px); margin-right: auto; margin-left: auto; }
        }

        @media (max-width: 420px) {
            .history-photo { width: 72px; height: 68px; }
            .history-item { gap: 8px; }
            .history-name { font-size: 11px; }
            .review-modal .modal-body { padding-right: 11px; padding-left: 11px; }
            .borrowed-photo { width: 40px; height: 40px; }
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
                        <li class="nav-item"><a class="nav-link" href="hal_profil.php">Dashboard Saya</a></li>
                        <li class="nav-item"><a class="nav-link active" href="riwayat_peminjama_&_pengembalian_barang.php">Riwayat Pinjam</a></li>
                        <li class="nav-item"><a class="nav-link" href="layar_chat_pesan_antar_mahasiswa.php"><i class="bi bi-chat-dots me-1"></i>Pesan / Chat</a></li>
                    </ul>
                    <div class="d-flex align-items-center gap-3">
                        <a class="btn btn-primary btn-sm rounded-pill px-3 text-nowrap" href="tambah_barang_baru.php"><i class="bi bi-plus-circle me-1"></i>Pinjamkan Barang</a>
                        <a class="position-relative text-decoration-none" href="#" aria-label="Notifikasi"><i class="bi bi-bell fs-5"></i><span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-white rounded-circle"></span></a>
                        <a href="#" class="d-flex align-items-center gap-2 text-decoration-none"><img class="user-avatar" src="img/people/person-1.png" alt=""><span class="d-none d-xl-block small fw-semibold">Rizky<br><span class="text-secondary fw-normal">FT UI</span></span></a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="container page-container py-3">
        <nav class="breadcrumb-line mb-1" aria-label="Breadcrumb"><a href="index.php">Beranda</a><span class="mx-1">›</span><span aria-current="page">Riwayat Peminjaman &amp; Pengembalian</span></nav>
        <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-2 mb-3">
            <div>
                <h1 class="page-title">Riwayat Peminjaman &amp; Pengembalian</h1>
                <p class="page-description mb-0">Pantau status pinjaman aktif, jadwal serah-terima kembali, verifikasi QR code, dan beri ulasan rekan mahasiswa terpercaya.</p>
            </div>
            <div class="d-flex flex-wrap gap-3">
                <a class="header-link" href="#"><i class="bi bi-file-earmark-pdf me-1"></i>Ekspor Rekap (PDF)</a>
                <a class="header-link" href="#"><i class="bi bi-info-circle me-1"></i>Panduan Serah Terima</a>
            </div>
        </div>

        <section class="row g-2 mb-3" aria-label="Ringkasan peminjaman">
            <div class="col-6 col-lg-3"><article class="summary-card"><div class="d-flex align-items-center justify-content-between"><span class="summary-label">Sedang Dipinjam</span><span class="summary-icon"><i class="bi bi-box-seam"></i></span></div><div class="summary-value mt-1">2 <span class="summary-subtitle">Barang Aktif</span></div><div class="summary-subtitle mt-1"><i class="bi bi-clock-history text-warning me-1"></i>Batas terdekat: Besok, 17:00</div><div class="summary-progress mt-2"><span style="width:76%"></span></div></article></div>
            <div class="col-6 col-lg-3"><article class="summary-card"><div class="d-flex align-items-center justify-content-between"><span class="summary-label">Menunggu Verifikasi QR</span><span class="summary-icon text-primary"><i class="bi bi-qr-code"></i></span></div><div class="summary-value mt-1">1 <span class="summary-subtitle">Permintaan Disetujui</span></div><div class="summary-subtitle mt-1"><i class="bi bi-geo-alt text-primary me-1"></i>Siap COD @ Kantin FT UI</div><div class="summary-progress mt-2"><span style="width:82%;background:#426cf2"></span></div></article></div>
            <div class="col-6 col-lg-3"><article class="summary-card"><div class="d-flex align-items-center justify-content-between"><span class="summary-label">Perlu Dikembalikan</span><span class="summary-icon text-danger"><i class="bi bi-arrow-return-left"></i></span></div><div class="summary-value text-danger mt-1">1 <span class="summary-subtitle">Barang Batas H-1</span></div><div class="summary-subtitle mt-1"><i class="bi bi-clock text-danger me-1"></i>Sisa 24 Jam (Casio fx-991EX)</div><div class="summary-progress mt-2"><span style="width:100%;background:#e84a4a"></span></div></article></div>
            <div class="col-6 col-lg-3"><article class="summary-card"><div class="d-flex align-items-center justify-content-between"><span class="summary-label">Total Sukses Selesai</span><span class="summary-icon text-primary"><i class="bi bi-award"></i></span></div><div class="summary-value mt-1">18 <span class="summary-subtitle">Transaksi Tuntas</span></div><div class="summary-subtitle mt-1 text-success"><i class="bi bi-graph-up-arrow me-1"></i>100% Pengembalian Tepat Waktu</div><div class="summary-progress mt-2"><span style="width:100%;background:#22bd72"></span></div></article></div>
        </section>

        <div class="row g-3 align-items-start">
            <section class="col-12 col-lg-8" aria-label="Daftar riwayat barang">
                <nav class="nav main-tabs mb-2" aria-label="Jenis transaksi">
                    <a class="nav-link active flex-grow-1" href="#"><i class="bi bi-person"></i>Saya Sebagai Peminjam (Barang Yang Saya Pinjam)<span class="tab-count">2 Aktif</span></a>
                    <a class="nav-link flex-grow-1" href="#"><i class="bi bi-grid"></i>Saya Sebagai Pemilik (Barang Dipinjam Orang)<span class="tab-count">1</span></a>
                </nav>
                <div class="history-toolbar mb-2">
                    <div class="row g-2 align-items-center">
                        <div class="col-12 col-sm-7"><div class="input-group"><span class="input-group-text border-0 bg-transparent"><i class="bi bi-search text-secondary"></i></span><input class="form-control history-search" type="search" placeholder="Cari nama peminjam, judul, atau nama mahasiswa..."></div></div>
                        <div class="col-12 col-sm-5"><select class="form-select history-filter ms-sm-auto" aria-label="Pilih semester"><option>Semester Ganjil 2024/2025</option><option>Semester Genap 2023/2024</option></select></div>
                    </div>
                    <div class="status-filters mt-2">
                        <button class="btn status-filter active" type="button">Semua (4)</button>
                        <button class="btn status-filter" type="button">Sedang Aktif (2)</button>
                        <button class="btn status-filter" type="button">Menunggu QR (1)</button>
                        <button class="btn status-filter" type="button">Batas Waktu H-1 (1)</button>
                        <button class="btn status-filter" type="button">Selesai &amp; Ulasan (2)</button>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <article class="history-card">
                        <div class="d-flex flex-wrap justify-content-between gap-2"><span class="history-state active"><i class="bi bi-circle-fill me-1" style="font-size:6px"></i>Sedang Dipinjam · Harus Dikembalikan Besok</span><span class="text-link">Elektronik &amp; Lab</span><span class="history-date">ID Peminjaman: CS-2024-8845</span></div>
                        <div class="history-item">
                            <img class="history-photo" src="img/items/item-3.png" alt="Kalkulator scientific Casio fx-991EX">
                            <div class="flex-grow-1">
                                <div class="d-flex flex-wrap align-items-start justify-content-between gap-2"><div><h2 class="history-name">Kalkulator Saintifik Casio fx-991EX ClassWiz</h2><div class="d-flex align-items-center gap-2"><img class="borrower-avatar" src="img/people/person-3.png" alt=""><div><div class="history-meta fw-semibold text-dark">Budi Santoso <span class="faculty-chip">FMIPA UI ’21</span></div><div class="history-meta"><span class="history-stars">★★★★★</span> 4.9 · Skor Kepercayaan 98/100</div></div></div></div><span class="badge rounded-pill text-bg-warning" style="font-size:8px">Sisa 24 Jam</span></div>
                                <div class="history-review mt-2"><div class="d-flex flex-wrap justify-content-between gap-2"><span class="fw-semibold">Masa Peminjaman</span><span class="history-meta">10 Nov – 21 Nov 2024</span></div><div class="history-meta mt-1">Titik Serah Terima: Perpusat UI (Lantai 1, Meja Diskusi)</div><div class="progress-track mt-2"><span style="width:88%"></span></div><div class="d-flex justify-content-between mt-1"><span class="history-meta">Kalkulasi Durasi Sewa Kumulatif: 3 dari 3 Hari</span><strong class="history-meta text-warning-emphasis">85% Terlewati</strong></div></div>
                            </div>
                        </div>
                        <div class="history-actions"><span class="history-meta text-success me-auto"><i class="bi bi-shield-check me-1"></i>Jaminan KTM Terverifikasi aktif via SSO UI</span><span class="history-meta">Minta Perpanjangan Waktu</span><button class="btn btn-small btn-soft"><i class="bi bi-chat-dots me-1"></i>Chat Pemilik</button><button class="btn btn-small btn-main"><i class="bi bi-qr-code me-1"></i>Tampilkan QR Pengembalian</button></div>
                    </article>

                    <article class="history-card">
                        <div class="d-flex flex-wrap justify-content-between gap-2"><span class="history-state pending"><i class="bi bi-circle-fill me-1" style="font-size:6px"></i>Menunggu Pemilik · Siap Serah Terima COD</span><a class="text-link" href="#">Peralatan &amp; Lab</a><span class="history-date">Persetujuan diterima</span></div>
                        <div class="history-item">
                            <img class="history-photo" src="img/items/item-4.png" alt="Jas almamater kuning">
                            <div class="flex-grow-1"><div class="d-flex flex-wrap justify-content-between gap-2"><h2 class="history-name">Jas Almamater Makara Kuning (Size L)</h2><span class="history-meta">Durasi 22 Nov – 25 Nov</span></div><div class="history-meta mt-1">Pemilik: <strong class="text-dark">Annisa Nurul</strong> · <span class="faculty-chip">FK UI ’21</span></div><div class="history-review mt-2"><div class="history-meta"><i class="bi bi-geo-alt text-primary me-1"></i>Kantin Fakultas Teknik (Lobi Mesin)</div><div class="history-meta mt-1"><i class="bi bi-clock text-primary me-1"></i>Jadwal: Jumat, 22 Nov · 13:00 WIB</div></div></div>
                        </div>
                        <div class="history-actions"><span class="history-state text-danger me-auto"><i class="bi bi-x-circle me-1"></i>Batalkan Pengajuan</span><span class="history-meta">Menunggu QR serah terima</span><button class="btn btn-small btn-main"><i class="bi bi-qr-code me-1"></i>Lihat Kode QR</button></div>
                    </article>

                    <article class="history-card">
                        <div class="d-flex flex-wrap justify-content-between gap-2"><span class="history-state done"><i class="bi bi-check-circle-fill me-1"></i>Transaksi Selesai Sepenuhnya</span><a class="text-link" href="#">Peminjaman &amp; Reputasi</a><span class="history-date">Selesai pada 14 Nov 2024</span></div>
                        <div class="history-item">
                            <img class="history-photo" src="img/items/item-5.png" alt="Starter kit Arduino dan sensor">
                            <div class="flex-grow-1"><h2 class="history-name">Starter Kit Arduino Uno Rev3 + 16 Macam Sensor Proyek Lab</h2><div class="d-flex align-items-center gap-2 mt-1"><img class="borrower-avatar" src="img/people/person-4.png" alt=""><div><div class="history-meta fw-semibold text-dark">Bagus Santoso <span class="faculty-chip">FT UI ’20</span></div><div class="history-meta"><span class="history-stars">★★★★★</span> Ulasan Anda: 5.0</div></div></div><div class="history-review mt-2">“Kit sangat lengkap, kabel dan sensor rapi. Saya merekomendasikan pemilik ini kepada rekan-rekan!”</div></div>
                        </div>
                        <div class="history-actions"><span class="history-meta text-primary me-auto"><i class="bi bi-award me-1"></i>Skor Kepercayaan Anda Bertambah +5 Pts</span><a href="#" class="text-link"><i class="bi bi-file-earmark-pdf me-1"></i>Unduh Bukti Pengembalian Digital (PDF)</a></div>
                    </article>
                </div>

                <nav class="pagination-wrap d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-2 mt-2" aria-label="Halaman riwayat">
                    <span class="small-muted">Menampilkan 1–4 dari 4 transaksi aktif semester ini</span>
                    <ul class="pagination"><li class="page-item active"><a class="page-link" href="#" aria-current="page">1</a></li></ul>
                </nav>
            </section>

            <aside class="col-12 col-lg-4" aria-label="Serah terima dan panduan">
                <section class="sidebar-card mb-3">
                    <div class="d-flex align-items-center justify-content-between gap-2"><h2 class="fw-bold mb-0" style="font-size:12px"><i class="bi bi-qr-code text-primary me-1"></i>QR Serah Terima Aktif</h2><span class="qr-ready"><i class="bi bi-circle-fill me-1" style="font-size:6px"></i>Live Ready</span></div>
                    <p class="small-muted mt-2 mb-0">Tunjukkan kode ini kepada rekan peminjam saat serah terima barang di titik temu.</p>
                    <div class="qr-frame" aria-label="Kode serah terima QR"><div class="qr-placeholder">
                        <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                        <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                        <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                        <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                        <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                        <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                        <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                        <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                        <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                    </div></div>
                    <div class="qr-code-label">CS-UI-884521</div>
                    <div class="qr-detail mt-2"><span><i class="bi bi-clock-history me-1"></i>Masa Berlaku Kode</span><strong class="text-primary">14:58</strong></div>
                    <button class="btn btn-small btn-soft w-100 py-2"><i class="bi bi-arrow-clockwise me-1"></i>Perbarui Kode <i class="bi bi-qr-code-scan ms-1"></i></button>
                </section>

                <section class="sidebar-card mb-3">
                    <h2 class="fw-bold mb-2" style="font-size:11px">Protokol Pengembalian 3 Langkah</h2>
                    <div class="protocol-step"><i class="bi bi-1-circle-fill protocol-icon"></i><div><div class="protocol-title">Cek Fisik &amp; Kelengkapan Bersama</div><p class="protocol-copy">Periksa kamera, layar, dan komponen sesuai deskripsi peminjaman.</p></div></div>
                    <div class="protocol-step"><i class="bi bi-2-circle-fill protocol-icon"></i><div><div class="protocol-title">Scan QR untuk Keluar</div><p class="protocol-copy">Buka menu kamera CampusShare untuk mengakhiri masa pinjam dengan bukti digital.</p></div></div>
                    <div class="protocol-step"><i class="bi bi-3-circle-fill protocol-icon"></i><div><div class="protocol-title">Verifikasi &amp; Beri Ulasan</div><p class="protocol-copy">Ulas sikap dan kelengkapan barang setelah tanda tangan otomatis tersimpan.</p></div></div>
                    <div class="small fw-semibold text-primary mt-2">Kebijakan Ganti Rugi &amp; Kerusakan</div>
                </section>
                <a href="#" class="btn help-button w-100 py-2"><i class="bi bi-headset me-1"></i>Hubungi Tim Kampus</a>
            </aside>
        </div>
    </main>

    <footer class="site-footer">
        <div class="container page-container py-4 py-lg-5">
            <div class="row g-4">
                <div class="col-12 col-md-6 col-lg-5">
                    <a class="d-inline-flex align-items-center gap-3 text-decoration-none mb-3" href="index.php"><img class="footer-brand" src="img/CampusShare%20Logo.png" alt="CampusShare"><span class="fw-semibold text-primary">CampusShare</span></a>
                    <p class="footer-about">Platform peminjaman dan berbagi perlengkapan akademik antar mahasiswa terverifikasi. Mendorong efisiensi finansial, gaya hidup sirkular, dan kolaborasi terpercaya di lingkungan kampus.</p>
                    <div class="small text-primary"><i class="bi bi-shield-check me-1"></i>Peminjaman Terjamin dengan KTM &amp; SSO Kampus</div>
                </div>
                <div class="col-6 col-md-3 col-lg-2"><h2 class="footer-title">Tautan Cepat</h2><div class="footer-links"><a href="index.php">Beranda</a><a href="cari_barang.php">Eksplorasi Barang</a><a href="hal_profil.php">Katalog Saya</a><a href="#">Status Pengembalian</a><a href="tambah_barang_baru.php">Formulir Peminjaman</a></div></div>
                <div class="col-6 col-md-3 col-lg-2"><h2 class="footer-title">Kategori Populer</h2><div class="footer-links"><a href="#">Kamera &amp; Alat Visual</a><a href="#">Kalkulator Saintifik &amp; Grafis</a><a href="#">Buku Teks &amp; Diktat Kuliah</a><a href="#">Komponen Lab &amp; Elektronika</a><a href="#">Perlengkapan Presentasi &amp; Event</a></div></div>
                <div class="col-6 col-md-6 col-lg-3"><h2 class="footer-title">Panduan &amp; Keamanan</h2><div class="footer-links"><a href="#">Aturan Peminjaman Sehat</a><a href="#">Protokol Verifikasi Mahasiswa</a><a href="#">Kebijakan Ganti Rugi &amp; Rusak</a><a href="#">Hubungi Tim Kampus</a></div></div>
            </div>
            <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between gap-3 mt-4 mt-lg-5 pt-3"><span>© 2024 CampusShare Indonesia. Inisiatif Mahasiswa Lintas Kampus. Hak cipta dilindungi.</span><div class="legal-links d-flex flex-wrap gap-3"><a href="#">Syarat &amp; Ketentuan</a><a href="#">Kebijakan Privasi</a><a href="#">Integritas Kampus</a></div></div>
        </div>
    </footer>

    <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered review-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <div><h2 class="modal-title" id="reviewModalLabel"><i class="bi bi-clipboard2-check text-primary me-1"></i>Beri Ulasan &amp; Rating</h2><div class="modal-subtitle">Bantu rekan mahasiswa membangun reputasi pinjam yang amanah</div></div>
                    <button type="button" class="btn-close align-self-start" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <form id="review-form">
                    <div class="modal-body">
                        <div class="borrowed-item mb-2">
                            <img class="borrowed-photo" src="img/items/item-2.png" alt="Tripod Takara ECO-193A">
                            <div><div class="borrowed-title">Tripod Takara ECO-193A</div><div class="borrowed-meta"><img class="borrower-avatar me-1" style="width:17px;height:17px" src="img/people/person-6.png" alt="">Sarah Clarissa · Fikom UI ’22</div></div>
                            <span class="borrow-date">18 - 20 Nov 2024</span>
                        </div>
                        <div class="overall-rating mb-2">
                            <div class="rating-heading">Kepuasan Keseluruhan</div>
                            <div class="star-picker" data-rating-group="overall" aria-label="Rating keseluruhan">
                                <button type="button" aria-label="1 bintang" data-value="1">★</button><button type="button" aria-label="2 bintang" data-value="2">★</button><button type="button" aria-label="3 bintang" data-value="3">★</button><button type="button" aria-label="4 bintang" data-value="4">★</button><button type="button" aria-label="5 bintang" data-value="5">★</button>
                            </div>
                            <div class="rating-recommendation">Sangat Memuaskan &amp; Direkomendasikan (5/5)</div>
                        </div>
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-1">
                            <span class="modal-form-label mb-0">Aspek Penilaian Spesifik</span>
                            <div class="d-flex flex-wrap gap-1">
                                <div class="rating-category"><span class="category-rating-label">Kondisi Barang</span><span class="mini-stars" data-rating-group="condition"><button type="button" data-value="1">★</button><button type="button" data-value="2">★</button><button type="button" data-value="3">★</button><button type="button" data-value="4">★</button><button type="button" data-value="5">★</button></span></div>
                                <div class="rating-category"><span class="category-rating-label">Ketepatan &amp; Respon</span><span class="mini-stars" data-rating-group="response"><button type="button" data-value="1">★</button><button type="button" data-value="2">★</button><button type="button" data-value="3">★</button><button type="button" data-value="4">★</button><button type="button" data-value="5">★</button></span></div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-1 mb-2">
                            <span class="badge rounded-pill text-bg-primary" style="font-size:8px"><i class="bi bi-check2-circle me-1"></i>Kondisi Sangat Mulus</span>
                            <span class="badge rounded-pill text-bg-primary" style="font-size:8px">Respon Pemilik Cepat</span>
                            <span class="badge rounded-pill text-bg-primary" style="font-size:8px">Tepat Waktu COD</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between"><label class="modal-form-label" for="review-comment">Tulis Catatan Pengalaman:</label><span class="borrowed-meta"><span id="review-count">82</span> / 500</span></div>
                        <textarea class="form-control modal-review-text mb-2" id="review-comment" maxlength="500">Barang sangat terawat, tripod kokoh dan Sarah sangat ramah serta tepat waktu saat COD!</textarea>
                        <div class="form-check modal-form-check mb-2"><input class="form-check-input" id="show-identity" type="checkbox" checked><label class="form-check-label" for="show-identity">Tampilkan identitas mahasiswa terverifikasi saya</label></div>
                        <div class="bonus-note"><i class="bi bi-award me-1"></i><strong>+5 Poin Skor Kepercayaan Kampus</strong> akan ditambahkan otomatis ke profil Anda setelah ulasan diverifikasi.</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn review-cancel px-3 py-2" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn review-submit px-3 py-2"><i class="bi bi-send me-1"></i>Kirim Ulasan &amp; Rating</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll("[data-rating-group] button").forEach(function (button) {
            button.addEventListener("click", function () {
                var group = button.closest("[data-rating-group]");
                var value = Number(button.dataset.value);
                group.querySelectorAll("button").forEach(function (star) {
                    star.style.opacity = Number(star.dataset.value) <= value ? "1" : ".35";
                });
                group.dataset.value = value;
                if (group.dataset.ratingGroup === "overall") {
                    document.querySelector(".rating-recommendation").textContent =
                        value === 5 ? "Sangat Memuaskan & Direkomendasikan (5/5)" : "Rating keseluruhan (" + value + "/5)";
                }
            });
        });

        var comment = document.getElementById("review-comment");
        var counter = document.getElementById("review-count");
        comment.addEventListener("input", function () {
            counter.textContent = comment.value.length;
        });

        document.getElementById("review-form").addEventListener("submit", function (event) {
            event.preventDefault();
            bootstrap.Modal.getInstance(document.getElementById("reviewModal")).hide();
        });

        window.addEventListener("load", function () {
            bootstrap.Modal.getOrCreateInstance(document.getElementById("reviewModal")).show();
        });
    </script>
</body>
</html>