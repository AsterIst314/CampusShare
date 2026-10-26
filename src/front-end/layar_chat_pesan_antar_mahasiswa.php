<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pesan aman antar mahasiswa dan serah terima barang melalui CampusShare.">
    <title>Pesan Antar Mahasiswa - CampusShare</title>
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
        .navbar { min-height: 68px; }
        .page-container { max-width: 1280px; }
        .brand-logo { width: 126px; height: auto; }
        .verified-pill { background: #eff4ff; color: var(--blue); font-size: 10px; font-weight: 600; }
        .main-nav .nav-link { padding: 9px 11px; border-radius: 999px; color: #26354b; font-size: 10px; }
        .main-nav .nav-link.active { background: #eaf0ff; color: var(--blue); }
        .user-avatar { width: 32px; height: 32px; border-radius: 50%; object-fit: cover; }
        .breadcrumb-line { color: #6e7b90; font-size: 10px; }
        .breadcrumb-line a { text-decoration: none; }
        .campus-online { color: #168a4d; font-size: 9px; font-weight: 600; }

        .chat-shell { overflow: hidden; min-height: 510px; border: 1px solid #e6ebf4; border-radius: 13px; background: #fff; box-shadow: 0 4px 14px rgba(20, 34, 56, .05); }
        .inbox { min-height: 510px; border-right: 1px solid #e9edf4; background: #fbfcff; }
        .inbox-header { padding: 15px 14px 10px; }
        .inbox-title { font-size: 15px; font-weight: 700; }
        .unread-count { display: inline-flex; min-width: 19px; height: 19px; align-items: center; justify-content: center; border-radius: 50%; background: var(--blue); color: #fff; font-size: 9px; }
        .icon-button { display: inline-flex; width: 30px; height: 30px; align-items: center; justify-content: center; border: 0; border-radius: 7px; background: transparent; color: #69768b; }
        .inbox-search { min-height: 32px; border: 1px solid #edf0f6; border-radius: 8px; background: #fff; font-size: 9px; }
        .inbox-filters { display: flex; gap: 5px; overflow-x: auto; padding: 0 11px 9px; }
        .inbox-filter { padding: 5px 8px; border: 1px solid #e8edf5; border-radius: 999px; background: #fff; color: #627087; font-size: 8px; white-space: nowrap; }
        .inbox-filter.active { border-color: var(--blue); background: var(--blue); color: #fff; }
        .conversation { display: flex; gap: 8px; padding: 11px; border-top: 1px solid #eef1f6; cursor: pointer; }
        .conversation.active { background: #edf3ff; }
        .conversation-avatar { position: relative; flex: 0 0 auto; }
        .conversation-avatar img { width: 37px; height: 37px; border-radius: 50%; object-fit: cover; }
        .presence { position: absolute; right: 0; bottom: 0; width: 10px; height: 10px; border: 2px solid #fff; border-radius: 50%; background: #20bf70; }
        .conversation-name { font-size: 9px; font-weight: 700; }
        .conversation-time { color: var(--muted); font-size: 8px; white-space: nowrap; }
        .conversation-item { color: #44536b; font-size: 8px; font-weight: 600; }
        .conversation-snippet { display: -webkit-box; overflow: hidden; color: #778397; font-size: 8px; line-height: 1.45; -webkit-box-orient: vertical; -webkit-line-clamp: 2; }
        .conversation-status { color: #17894e; font-size: 8px; font-weight: 600; }
        .mini-unread { display: inline-flex; min-width: 15px; height: 15px; align-items: center; justify-content: center; border-radius: 50%; background: var(--blue); color: #fff; font-size: 8px; }

        .chat-main { display: flex; min-height: 510px; flex-direction: column; }
        .chat-header { display: flex; align-items: center; gap: 9px; padding: 12px 14px; border-bottom: 1px solid #edf0f5; }
        .chat-header img { width: 36px; height: 36px; border-radius: 50%; object-fit: cover; }
        .chat-person { font-size: 10px; font-weight: 700; }
        .chat-subtitle { color: var(--muted); font-size: 8px; }
        .secure-hint { padding: 7px 10px; background: #f5f8ff; color: #5c6b82; font-size: 8px; text-align: center; }
        .loan-strip { display: flex; align-items: center; gap: 8px; margin: 10px 12px 0; padding: 8px; border: 1px solid #e7edf8; border-radius: 9px; background: #fff; }
        .loan-strip img { width: 48px; height: 38px; border-radius: 6px; object-fit: cover; }
        .loan-title { font-size: 9px; font-weight: 700; }
        .loan-meta { color: #748096; font-size: 8px; }
        .loan-status { padding: 4px 6px; border-radius: 999px; background: #dcfce9; color: #168249; font-size: 8px; font-weight: 700; white-space: nowrap; }
        .message-area { display: flex; flex: 1; flex-direction: column; gap: 10px; padding: 14px; background: #fcfdff; }
        .day-divider { display: flex; align-items: center; gap: 8px; color: #8b96a7; font-size: 8px; }
        .day-divider::before, .day-divider::after { height: 1px; flex: 1; background: #e9edf4; content: ""; }
        .message-row { display: flex; align-items: flex-end; gap: 6px; }
        .message-row.mine { justify-content: flex-end; }
        .message-avatar { width: 23px; height: 23px; border-radius: 50%; object-fit: cover; }
        .message-bubble { max-width: 78%; padding: 8px 10px; border: 1px solid #e9edf5; border-radius: 11px 11px 11px 3px; background: #fff; color: #4e5c72; font-size: 9px; line-height: 1.5; }
        .message-row.mine .message-bubble { border-color: #dbe6ff; border-radius: 11px 11px 3px 11px; background: #eaf1ff; }
        .message-time { margin-top: 3px; color: #98a2b1; font-size: 7px; text-align: right; }
        .message-tags { display: flex; flex-wrap: wrap; gap: 5px; padding: 7px 12px 0; }
        .message-tag { padding: 5px 7px; border: 1px solid #e7ebf3; border-radius: 999px; background: #fff; color: #647187; font-size: 8px; }
        .chat-compose { display: flex; align-items: center; gap: 7px; padding: 9px 11px; border-top: 1px solid #e9edf4; }
        .chat-compose .form-control { min-height: 34px; border-color: #e5eaf2; border-radius: 999px; background: #f8faff; font-size: 9px; }
        .send-button { display: inline-flex; width: 32px; height: 32px; flex: 0 0 auto; align-items: center; justify-content: center; border: 0; border-radius: 50%; background: var(--blue); color: #fff; }

        .loan-detail { min-height: 510px; border-left: 1px solid #e9edf4; background: #fff; }
        .detail-heading { padding: 14px 13px 9px; border-bottom: 1px solid #edf0f5; font-size: 12px; font-weight: 700; }
        .detail-body { padding: 12px; }
        .detail-product { width: 100%; height: 104px; border-radius: 8px; object-fit: cover; }
        .detail-title { margin: 8px 0 4px; font-size: 10px; font-weight: 700; }
        .detail-copy { color: #748096; font-size: 8px; line-height: 1.5; }
        .detail-section-title { margin: 12px 0 6px; font-size: 9px; font-weight: 700; }
        .detail-state { display: flex; align-items: center; gap: 6px; margin: 6px 0; color: #66748a; font-size: 8px; }
        .detail-state i { color: var(--blue); }
        .detail-state.success i { color: #18a65a; }
        .detail-info { padding: 8px; border-radius: 8px; background: #eef4ff; }
        .detail-action { width: 100%; border: 0; border-radius: 7px; background: var(--blue); color: #fff; font-size: 8px; font-weight: 700; }
        .report-action { width: 100%; margin-top: 5px; border: 0; background: transparent; color: #718096; font-size: 8px; }
        .safety-note { padding: 9px; border-radius: 8px; background: #f0f5ff; color: #718096; font-size: 8px; line-height: 1.5; }

        .site-footer { margin-top: 30px; background: #fff; }
        .footer-brand { width: 112px; }
        .footer-about { max-width: 310px; color: #68758a; font-size: 10px; line-height: 1.65; }
        .footer-title { margin-bottom: 10px; font-size: 11px; font-weight: 700; }
        .footer-links { display: grid; gap: 8px; }
        .footer-links a { color: #68758a; font-size: 9px; text-decoration: none; }
        .footer-links a:hover, .legal-links a:hover { color: var(--blue); }
        .footer-bottom { border-top: 1px solid #f0f2f7; color: #8490a2; font-size: 8px; }
        .legal-links a { color: #667287; text-decoration: none; }

        .modal-backdrop.show { background: #111c30; opacity: .64; }
        .qr-modal { max-width: 510px; }
        .qr-modal .modal-content { overflow: hidden; border: 0; border-radius: 15px; box-shadow: 0 16px 45px rgba(10, 20, 40, .22); }
        .qr-modal .modal-header { padding: 12px 16px; border-bottom: 0; background: #eff4ff; }
        .qr-modal .modal-body { padding: 10px 15px 13px; }
        .qr-modal .modal-footer { padding: 9px 14px 12px; border-top: 0; }
        .qr-symbol { display: inline-flex; width: 35px; height: 35px; align-items: center; justify-content: center; border-radius: 9px; background: var(--blue); color: #fff; font-size: 18px; }
        .qr-title { font-size: 13px; font-weight: 700; }
        .qr-explainer { max-width: 370px; margin-top: 3px; color: #69768b; font-size: 8px; line-height: 1.45; }
        .qr-ready { padding: 4px 7px; border-radius: 999px; background: #dcfce9; color: #168249; font-size: 8px; font-weight: 700; white-space: nowrap; }
        .qr-loan { display: flex; align-items: center; gap: 8px; padding: 8px; border-radius: 8px; background: #f0f5ff; }
        .qr-loan img { width: 43px; height: 36px; border-radius: 5px; object-fit: cover; }
        .qr-loan-title { font-size: 8px; font-weight: 700; }
        .qr-loan-meta { color: #69768b; font-size: 7px; }
        .qr-ticket { margin-left: auto; color: var(--blue); font-size: 8px; font-weight: 700; white-space: nowrap; }
        .qr-display { padding: 12px; border: 1px dashed #c5d7ff; border-radius: 10px; text-align: center; }
        .qr-art { display: grid; width: 154px; height: 154px; grid-template-columns: repeat(9, 1fr); grid-template-rows: repeat(9, 1fr); gap: 4px; margin: 0 auto 8px; padding: 9px; border: 1px solid #e4eaf3; border-radius: 9px; background: #fff; box-shadow: 0 2px 5px rgba(20, 34, 56, .08); }
        .qr-art span { border-radius: 2px; background: var(--blue-dark); }
        .qr-art span:nth-child(3n), .qr-art span:nth-child(7n), .qr-art span:nth-child(11n), .qr-art span:nth-child(13n) { background: transparent; }
        .qr-art span:nth-child(10), .qr-art span:nth-child(12), .qr-art span:nth-child(19), .qr-art span:nth-child(27), .qr-art span:nth-child(34), .qr-art span:nth-child(55), .qr-art span:nth-child(63), .qr-art span:nth-child(70), .qr-art span:nth-child(78) { background: var(--blue); }
        .qr-code { color: var(--blue-dark); font-size: 13px; font-weight: 800; letter-spacing: .16em; }
        .qr-copy-button { border: 0; background: transparent; color: #6d7a8f; font-size: 12px; }
        .qr-expiry { color: #68758a; font-size: 8px; }
        .qr-steps { padding: 9px; border-radius: 9px; background: #f0f5ff; }
        .qr-step-heading { margin-bottom: 6px; font-size: 8px; font-weight: 700; }
        .qr-step { display: flex; gap: 5px; color: #66748a; font-size: 7px; line-height: 1.45; }
        .qr-step-number { display: inline-flex; width: 15px; height: 15px; flex: 0 0 auto; align-items: center; justify-content: center; border-radius: 50%; background: var(--blue); color: #fff; font-size: 7px; font-weight: 700; }
        .btn-qr-light { border-radius: 7px; background: #edf3ff; color: #31425c; font-size: 8px; }
        .btn-qr-primary { border-radius: 7px; background: var(--blue); color: #fff; font-size: 8px; font-weight: 600; }
        .btn-qr-primary:hover { background: #164bcc; color: #fff; }

        @media (max-width: 991.98px) {
            .navbar { min-height: 62px; }
            .main-nav { padding: 12px 0; }
            .main-nav .nav-link { border-radius: 8px; }
            .inbox, .chat-main, .loan-detail { min-height: 0; }
            .inbox { border-right: 0; }
            .loan-detail { border-top: 1px solid #e9edf4; border-left: 0; }
            .conversation-list { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .conversation { border-right: 1px solid #eef1f6; }
        }

        @media (max-width: 575.98px) {
            .page-container { padding-right: 12px; padding-left: 12px; }
            .brand-logo { width: 110px; }
            .conversation-list { display: block; }
            .conversation:not(.active) { display: none; }
            .chat-shell { border-radius: 9px; }
            .chat-main { min-height: 440px; }
            .message-area { min-height: 210px; }
            .loan-detail { padding-bottom: 8px; }
            .qr-modal { max-width: calc(100vw - 20px); margin-right: auto; margin-left: auto; }
            .qr-modal .modal-body { padding-right: 10px; padding-left: 10px; }
            .qr-art { width: 138px; height: 138px; }
            .qr-step { font-size: 7px; }
            .site-footer { margin-top: 18px; }
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
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavigation" aria-controls="mainNavigation" aria-expanded="false" aria-label="Buka navigasi"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="mainNavigation">
                    <ul class="navbar-nav main-nav mx-lg-auto align-items-lg-center">
                        <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link" href="cari_barang.php">Cari Barang</a></li>
                        <li class="nav-item"><a class="nav-link" href="hal_profil.php">Dashboard Saya</a></li>
                        <li class="nav-item"><a class="nav-link" href="riwayat_peminjama_&_pengembalian_barang.php">Riwayat Pinjam</a></li>
                        <li class="nav-item"><a class="nav-link active" href="layar_chat_pesan_antar_mahasiswa.php"><i class="bi bi-chat-dots me-1"></i>Pesan / Chat</a></li>
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
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-2">
            <nav class="breadcrumb-line" aria-label="Breadcrumb"><a href="index.php">Beranda</a><span class="mx-1">›</span><span aria-current="page">Pesan / Chat Mahasiswa</span></nav>
            <span class="campus-online"><i class="bi bi-shield-check me-1"></i>Enkripsi SSO Peer-to-Peer Terverifikasi</span>
        </div>

        <section class="chat-shell row g-0" aria-label="Pesan antar mahasiswa">
            <aside class="col-12 col-lg-3 inbox" aria-label="Daftar pesan">
                <div class="inbox-header d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2"><h1 class="inbox-title mb-0">Pesan Masuk</h1><span class="unread-count">3</span></div>
                    <button class="icon-button" type="button" aria-label="Pesan baru"><i class="bi bi-pencil-square"></i></button>
                </div>
                <div class="px-3 pb-2"><div class="input-group"><span class="input-group-text border-0 bg-white"><i class="bi bi-search text-secondary"></i></span><input class="form-control inbox-search" type="search" placeholder="Cari percakapan..."></div></div>
                <div class="inbox-filters"><button class="btn inbox-filter active" type="button">Semua (4)</button><button class="btn inbox-filter" type="button">Peminjaman (3)</button><button class="btn inbox-filter" type="button">Penjual (1)</button></div>
                <div class="conversation-list">
                    <article class="conversation active">
                        <div class="conversation-avatar"><img src="img/people/person-1.png" alt=""><span class="presence"></span></div>
                        <div class="flex-grow-1 overflow-hidden">
                            <div class="d-flex justify-content-between gap-1"><span class="conversation-name">Andi Pratama</span><span class="conversation-time">10:45</span></div>
                            <div class="conversation-item">FT UI ’21 · Asus VivoBook 14</div>
                            <div class="conversation-snippet">Oke kak, laptop bisa dikembalikan jam 11.00 di depan Starbucks Perpusat.</div>
                            <div class="d-flex justify-content-between mt-1"><span class="conversation-status"><i class="bi bi-circle-fill me-1" style="font-size:5px"></i>Sedang Dipinjam</span><span class="mini-unread">1</span></div>
                        </div>
                    </article>
                    <article class="conversation">
                        <div class="conversation-avatar"><img src="img/people/person-6.png" alt=""></div>
                        <div class="flex-grow-1 overflow-hidden">
                            <div class="d-flex justify-content-between gap-1"><span class="conversation-name">Sarah Clarissa</span><span class="conversation-time">Kemarin</span></div>
                            <div class="conversation-item">Fikom UI ’22 · Tripod Takara</div>
                            <div class="conversation-snippet">Terima kasih kak, tripod sudah saya kembalikan. Barang dalam kondisi baik ya.</div>
                            <div class="conversation-status mt-1">Selesai</div>
                        </div>
                    </article>
                    <article class="conversation">
                        <div class="conversation-avatar"><img src="img/people/person-2.png" alt=""></div>
                        <div class="flex-grow-1 overflow-hidden">
                            <div class="d-flex justify-content-between gap-1"><span class="conversation-name">Annisa Nurul</span><span class="conversation-time">Selasa</span></div>
                            <div class="conversation-item">FK UI ’21 · Tripod + Holder</div>
                            <div class="conversation-snippet">Halo Kak Rizky, apakah tripodnya masih bisa dipinjam untuk tugas dokumenter?</div>
                            <div class="conversation-status mt-1 text-primary">Menunggu Persetujuan</div>
                        </div>
                    </article>
                    <article class="conversation">
                        <div class="conversation-avatar"><img src="img/people/person-3.png" alt=""></div>
                        <div class="flex-grow-1 overflow-hidden">
                            <div class="d-flex justify-content-between gap-1"><span class="conversation-name">Dimas Suryo</span><span class="conversation-time">2 hari lalu</span></div>
                            <div class="conversation-item">FT UI ’22 · Laptop ASUS</div>
                            <div class="conversation-snippet">Siap Kak, nanti saya transfer uang jaminan untuk peminjaman minggu ini.</div>
                            <div class="conversation-status mt-1 text-secondary">Ditutup</div>
                        </div>
                    </article>
                </div>
            </aside>

            <section class="col-12 col-lg-6 chat-main" aria-label="Percakapan dengan Andi Pratama">
                <div class="chat-header">
                    <img src="img/people/person-1.png" alt="Andi Pratama">
                    <div class="flex-grow-1"><div class="chat-person">Andi Pratama <i class="bi bi-patch-check-fill text-primary"></i></div><div class="chat-subtitle">FT UI ’21 · Aktif sekarang</div></div>
                    <button class="icon-button" type="button" aria-label="Detail percakapan"><i class="bi bi-three-dots-vertical"></i></button>
                </div>
                <div class="secure-hint"><i class="bi bi-shield-lock text-primary me-1"></i>Percakapan aman melalui SSO kampus. Hindari membagikan informasi pribadi.</div>
                <div class="loan-strip">
                    <img src="img/items/item-1.png" alt="Laptop ASUS VivoBook 14">
                    <div class="flex-grow-1"><div class="loan-title">Laptop ASUS VivoBook 14</div><div class="loan-meta"><i class="bi bi-arrow-left-right me-1"></i>Andi Pratama (FT ’21) ↔ Rizky Pratama (FT ’21)</div><div class="loan-meta"><i class="bi bi-geo-alt me-1"></i>Perpusat UI (Crystal Knowledge) · Lt. 1 · 13:00 WIB</div></div>
                    <span class="loan-status"><i class="bi bi-check-circle me-1"></i>Aktif</span>
                </div>
                <div class="message-area" id="message-area" aria-live="polite">
                    <div class="day-divider">Hari ini, 21 November 2024</div>
                    <div class="message-row"><img class="message-avatar" src="img/people/person-1.png" alt=""><div><div class="message-bubble">Halo Rizky! Aku sudah selesai memakai laptopnya untuk presentasi. Terima kasih banyak ya.</div><div class="message-time">10:32</div></div></div>
                    <div class="message-row mine"><div><div class="message-bubble">Sama-sama, Andi. Kondisi laptop dan charger masih lengkap, kan?</div><div class="message-time">10:39 <i class="bi bi-check2-all text-primary"></i></div></div></div>
                    <div class="message-row"><img class="message-avatar" src="img/people/person-1.png" alt=""><div><div class="message-bubble">Lengkap semua, kak. Oke kak, laptop bisa dikembalikan jam 11.00 di depan Starbucks Perpusat.</div><div class="message-time">10:45</div></div></div>
                    <div class="message-row mine"><div><div class="message-bubble">Siap! Aku sudah sampai di titik temu. Sampai jumpa sebentar lagi.</div><div class="message-time">10:48 <i class="bi bi-check2-all text-primary"></i></div></div></div>
                </div>
                <div class="message-tags"><span class="message-tag"><i class="bi bi-geo-alt me-1"></i>Saya sudah sampai titik temu</span><span class="message-tag"><i class="bi bi-clock-history me-1"></i>Saya terlambat 10 menit</span><button class="btn message-tag" type="button" data-bs-toggle="modal" data-bs-target="#handoffModal"><i class="bi bi-qr-code me-1"></i>Konfirmasi QR Code</button></div>
                <form class="chat-compose" id="chat-form">
                    <button class="icon-button" type="button" aria-label="Lampirkan file"><i class="bi bi-plus-circle"></i></button>
                    <button class="icon-button" type="button" aria-label="Kirim foto"><i class="bi bi-camera"></i></button>
                    <label class="visually-hidden" for="message-input">Tulis pesan</label>
                    <input class="form-control" id="message-input" placeholder="Ketik pesan ke Andi Pratama... (Gunakan bahasa santun antar mahasiswa)">
                    <button class="send-button" type="submit" aria-label="Kirim pesan"><i class="bi bi-send-fill"></i></button>
                </form>
            </section>

            <aside class="col-12 col-lg-3 loan-detail" aria-label="Detail pinjaman">
                <h2 class="detail-heading d-flex align-items-center justify-content-between">Detail Pinjam <span class="text-primary" style="font-size:8px">#CS-883921</span></h2>
                <div class="detail-body">
                    <img class="detail-product" src="img/items/item-1.png" alt="Laptop ASUS VivoBook 14">
                    <h3 class="detail-title">Laptop ASUS VivoBook 14</h3>
                    <p class="detail-copy">Core i5, RAM 8GB, SSD 512GB. Baterai awet untuk menunjang kebutuhan kuliah.</p>
                    <div class="d-flex justify-content-between"><span class="detail-copy">Durasi Pinjam</span><strong class="detail-copy text-dark">4 Hari (Aman Komunitas)</strong></div>
                    <h3 class="detail-section-title">Alur Transaksi</h3>
                    <div class="detail-state success"><i class="bi bi-check-circle-fill"></i><span><strong>Peminjaman Disetujui</strong><br><span class="detail-copy">SSO Terverifikasi Kampus</span></span></div>
                    <div class="detail-state"><i class="bi bi-circle-fill" style="font-size:8px"></i><span><strong>COD &amp; Serah Terima</strong><br><span class="detail-copy">Hari ini, 13:00 WIB</span></span></div>
                    <div class="detail-state"><i class="bi bi-circle" style="font-size:8px"></i><span><strong>Pengembalian Barang</strong><br><span class="detail-copy">Batas: 24 Nov 2024 · 16:00 WIB</span></span></div>
                    <div class="detail-info mt-2"><div class="detail-copy"><i class="bi bi-geo-alt text-primary me-1"></i><strong class="text-dark">Jadwal &amp; Titik Temu</strong></div><div class="detail-copy mt-1">Perpustakaan Pusat (Meja Diskusi 1)<br>Senin, 21 Nov 2024 · 13:00 WIB</div></div>
                    <button class="btn detail-action mt-3 py-2" type="button" data-bs-toggle="modal" data-bs-target="#handoffModal"><i class="bi bi-qr-code me-1"></i>Buka Kode Serah Terima</button>
                    <button class="btn report-action"><i class="bi bi-headset me-1"></i>Bantuan &amp; Laporkan Sengketa</button>
                    <div class="safety-note mt-2"><strong class="d-block text-dark mb-1"><i class="bi bi-shield-check text-primary me-1"></i>Protokol Keamanan UI</strong>Wajib lakukan pengecekan fisik perangkat bersama sebelum transaksi selesai.</div>
                </div>
            </aside>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container page-container py-4 py-lg-5">
            <div class="row g-4">
                <div class="col-12 col-md-6 col-lg-5">
                    <a class="d-inline-flex align-items-center gap-3 text-decoration-none mb-3" href="index.php"><img class="footer-brand" src="img/CampusShare%20Logo.png" alt="CampusShare"><span class="fw-semibold text-primary">CampusShare</span></a>
                    <p class="footer-about">Platform peminjaman dan berbagi perlengkapan akademik antar mahasiswa terverifikasi. Mendorong efisiensi finansial, gaya hidup sirkular, dan kolaborasi terpercaya di lingkungan kampus.</p>
                    <div class="small text-primary"><i class="bi bi-shield-check me-1"></i>Peminjaman Terjamin dengan KTM &amp; SSO Kampus</div>
                </div>
                <div class="col-6 col-md-3 col-lg-2"><h2 class="footer-title">Tautan Cepat</h2><div class="footer-links"><a href="index.php">Beranda</a><a href="cari_barang.php">Eksplorasi Barang</a><a href="hal_profil.php">Katalog Saya</a><a href="#">Status Pengembalian</a><a href="#">Formulir Peminjaman</a></div></div>
                <div class="col-6 col-md-3 col-lg-2"><h2 class="footer-title">Kategori Populer</h2><div class="footer-links"><a href="#">Kamera &amp; Alat Visual</a><a href="#">Kalkulator Saintifik &amp; Grafis</a><a href="#">Buku Teks &amp; Diktat Kuliah</a><a href="#">Komponen Lab &amp; Elektronika</a><a href="#">Perlengkapan Presentasi &amp; Event</a></div></div>
                <div class="col-6 col-md-6 col-lg-3"><h2 class="footer-title">Panduan &amp; Keamanan</h2><div class="footer-links"><a href="#">Aturan Peminjaman Sehat</a><a href="#">Protokol Verifikasi Mahasiswa</a><a href="#">Kebijakan Ganti Rugi &amp; Rusak</a><a href="#">Hubungi Tim Kampus</a></div></div>
            </div>
            <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between gap-3 mt-4 mt-lg-5 pt-3"><span>© 2024 CampusShare Indonesia. Inisiatif Mahasiswa Lintas Kampus. Hak cipta dilindungi.</span><div class="legal-links d-flex flex-wrap gap-3"><a href="#">Syarat &amp; Ketentuan</a><a href="#">Kebijakan Privasi</a><a href="#">Integritas Kampus</a></div></div>
        </div>
    </footer>

    <div class="modal fade" id="handoffModal" tabindex="-1" aria-labelledby="handoffModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered qr-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex align-items-start gap-2">
                        <span class="qr-symbol"><i class="bi bi-qr-code"></i></span>
                        <div><div class="d-flex flex-wrap align-items-center gap-2"><h2 class="qr-title mb-0" id="handoffModalLabel">QR Serah Terima</h2><span class="qr-ready"><i class="bi bi-circle-fill me-1" style="font-size:5px"></i>Aktif &amp; Terverifikasi SSO</span></div><div class="qr-explainer">Tunjukkan kode ini kepada rekan saat bertemu di titik temu kampus.</div></div>
                    </div>
                    <button type="button" class="btn-close align-self-start" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="qr-loan mb-2">
                        <img src="img/items/item-1.png" alt="Laptop ASUS VivoBook 14">
                        <div><div class="qr-loan-title">Laptop ASUS VivoBook 14</div><div class="qr-loan-meta"><i class="bi bi-arrow-left-right me-1"></i>Andi Pratama (FT ’21) ↔ Rizky Pratama (FT ’21)</div><div class="qr-loan-meta"><i class="bi bi-geo-alt me-1"></i>Perpusat UI (Crystal Knowledge) · Lt. 1 · 13:00 WIB</div></div>
                        <span class="qr-ticket">#CS-883921</span>
                    </div>
                    <div class="qr-display">
                        <div class="qr-art" role="img" aria-label="Kode QR serah terima">
                            <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                            <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                            <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                            <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                            <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                            <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                            <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                            <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                            <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                        </div>
                        <div class="d-flex align-items-center justify-content-center gap-1"><span class="qr-code">CS-UI-883921</span><button class="qr-copy-button" id="copy-code" type="button" aria-label="Salin kode"><i class="bi bi-copy"></i></button></div>
                        <div class="qr-expiry mt-1"><i class="bi bi-hourglass-split text-warning me-1"></i>Berlaku hingga <strong id="countdown">14:32</strong> WIB (Auto-refresh berkala)</div>
                    </div>
                    <div class="qr-steps mt-2">
                        <div class="qr-step-heading">3 Langkah Serah Terima di Lokasi:</div>
                        <div class="row g-2">
                            <div class="col-4"><div class="qr-step"><span class="qr-step-number">1</span><span>Pindai QR ini via aplikasi rekan peminjam.</span></div></div>
                            <div class="col-4"><div class="qr-step"><span class="qr-step-number">2</span><span>Cek fisik laptop, charger &amp; kelengkapan bersama.</span></div></div>
                            <div class="col-4"><div class="qr-step"><span class="qr-step-number">3</span><span>Konfirmasi serah terima &amp; aktifkan garansi kampus.</span></div></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-qr-light px-3 py-2" id="download-qr"><i class="bi bi-download me-1"></i>Unduh QR</button>
                    <button type="button" class="btn btn-qr-primary px-3 py-2" data-bs-dismiss="modal">Tutup Pratinjau</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById("chat-form").addEventListener("submit", function (event) {
            event.preventDefault();
            var input = document.getElementById("message-input");
            var text = input.value.trim();
            if (!text) return;
            var row = document.createElement("div");
            row.className = "message-row mine";
            var wrapper = document.createElement("div");
            var bubble = document.createElement("div");
            bubble.className = "message-bubble";
            bubble.textContent = text;
            var time = document.createElement("div");
            time.className = "message-time";
            time.textContent = "Baru saja";
            wrapper.append(bubble, time);
            row.appendChild(wrapper);
            document.getElementById("message-area").appendChild(row);
            input.value = "";
            row.scrollIntoView({ block: "nearest" });
        });

        document.getElementById("copy-code").addEventListener("click", async function () {
            try {
                await navigator.clipboard.writeText("CS-UI-883921");
                this.innerHTML = '<i class="bi bi-check2"></i>';
            } catch (error) {
                this.setAttribute("aria-label", "Kode serah terima: CS-UI-883921");
            }
        });

        document.getElementById("download-qr").addEventListener("click", function () {
            window.print();
        });

        window.addEventListener("load", function () {
            bootstrap.Modal.getOrCreateInstance(document.getElementById("handoffModal")).show();
        });
    </script>
</body>
</html>