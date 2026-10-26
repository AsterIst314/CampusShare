<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pindai QR CampusShare untuk memverifikasi serah terima barang.">
    <title>Pindai QR Serah Terima - CampusShare</title>
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
        .site-header { position: relative; z-index: 1; background: #fff; box-shadow: 0 2px 9px rgba(20, 34, 56, .06); }
        .navbar { min-height: 68px; }
        .page-container { max-width: 1280px; }
        .brand-logo { width: 126px; height: auto; }
        .verified-pill { background: #eff4ff; color: var(--blue); font-size: 10px; font-weight: 600; }
        .main-nav .nav-link { padding: 9px 11px; border-radius: 999px; color: #26354b; font-size: 10px; }
        .main-nav .nav-link.active { background: #eaf0ff; color: var(--blue); }
        .user-avatar { width: 32px; height: 32px; border-radius: 50%; object-fit: cover; }

        .scanner-stage { position: relative; min-height: 610px; overflow: hidden; color: #fff; background: #101d35; }
        .scanner-stage::before { position: absolute; inset: 0; background: linear-gradient(180deg, rgba(9, 22, 46, .76), rgba(9, 20, 42, .9)), url("img/items/item-1.png") center 43% / cover no-repeat; content: ""; }
        .scanner-stage::after { position: absolute; inset: 0; background: radial-gradient(ellipse at 50% 40%, rgba(70, 121, 213, .12), transparent 55%); content: ""; pointer-events: none; }
        .scanner-content { position: relative; z-index: 1; }
        .scanner-toolbar { display: flex; align-items: center; justify-content: space-between; gap: 12px; padding-top: 16px; }
        .back-link { display: inline-flex; width: 34px; height: 34px; align-items: center; justify-content: center; border: 1px solid rgba(255,255,255,.14); border-radius: 50%; background: rgba(255,255,255,.08); color: #fff; text-decoration: none; }
        .scanner-title { font-size: 16px; font-weight: 700; }
        .live-pill { padding: 4px 7px; border-radius: 999px; background: rgba(30, 200, 115, .17); color: #63e49e; font-size: 8px; font-weight: 700; }
        .scanner-subtitle { color: #c1cee2; font-size: 9px; }
        .scanner-tools { display: flex; gap: 7px; }
        .tool-button { display: inline-flex; align-items: center; gap: 5px; padding: 7px 10px; border: 1px solid rgba(255,255,255,.14); border-radius: 999px; background: rgba(255,255,255,.08); color: #edf3ff; font-size: 9px; }
        .scanner-tip { display: table; margin: 14px auto; padding: 7px 11px; border: 1px solid rgba(255,255,255,.1); border-radius: 999px; background: rgba(255,255,255,.1); color: #e2eaf7; font-size: 9px; }
        .scan-frame { position: relative; width: min(250px, 72vw); aspect-ratio: 1; margin: 18px auto 0; border: 2px solid rgba(64, 123, 255, .9); border-radius: 17px; box-shadow: 0 0 0 999px rgba(5, 14, 31, .16), 0 0 34px rgba(50, 110, 255, .12); }
        .scan-frame::before, .scan-frame::after { position: absolute; width: 28px; height: 28px; border-color: #5b91ff; border-style: solid; content: ""; }
        .scan-frame::before { top: -2px; left: -2px; border-width: 4px 0 0 4px; border-radius: 12px 0 0; }
        .scan-frame::after { right: -2px; bottom: -2px; border-width: 0 4px 4px 0; border-radius: 0 0 12px; }
        .scan-corner { position: absolute; top: -2px; right: -2px; width: 28px; height: 28px; border-top: 4px solid #5b91ff; border-right: 4px solid #5b91ff; border-radius: 0 12px 0 0; }
        .scan-corner.bottom-left { top: auto; right: auto; bottom: -2px; left: -2px; border: 0; border-bottom: 4px solid #5b91ff; border-left: 4px solid #5b91ff; border-radius: 0 0 0 12px; }
        .scan-line { position: absolute; top: 20%; right: 12px; left: 12px; height: 2px; background: linear-gradient(90deg, transparent, #68a1ff, transparent); box-shadow: 0 0 12px #2874ff; animation: scan 3s ease-in-out infinite alternate; }
        @keyframes scan { from { top: 16%; } to { top: 82%; } }
        .scanner-status { margin-top: 13px; color: #d7e2f4; font-size: 9px; text-align: center; }
        .scanner-dot { display: inline-block; width: 7px; height: 7px; margin-right: 5px; border-radius: 50%; background: #39da84; box-shadow: 0 0 8px #39da84; }
        .bottom-panel { position: relative; z-index: 1; display: grid; grid-template-columns: minmax(0, 1.5fr) minmax(220px, .8fr); gap: 14px; max-width: 1040px; margin: 0 auto; padding: 14px; border: 1px solid #e8edf4; border-radius: 13px; background: #fff; color: var(--ink); box-shadow: 0 5px 18px rgba(10, 20, 40, .12); }
        .handoff-item { display: flex; align-items: flex-start; gap: 10px; }
        .handoff-photo { width: 100px; height: 74px; flex: 0 0 auto; border-radius: 8px; object-fit: cover; }
        .handoff-title { font-size: 12px; font-weight: 700; }
        .handoff-meta { margin-top: 5px; color: #6f7c90; font-size: 9px; }
        .handoff-step { margin-top: 7px; color: #66748a; font-size: 8px; }
        .camera-actions { display: grid; gap: 7px; align-content: center; }
        .action-confirm { border: 0; border-radius: 8px; background: var(--blue); color: #fff; font-size: 10px; font-weight: 700; }
        .action-confirm:hover { background: #174bcc; color: #fff; }
        .action-manual { border: 1px solid #dfe6f1; border-radius: 8px; background: #fff; color: #526177; font-size: 9px; }
        .privacy-note { display: flex; align-items: flex-start; gap: 6px; margin-top: 9px; color: #7d899b; font-size: 8px; }

        .site-footer { position: relative; z-index: 1; background: #fff; }
        .footer-brand { width: 112px; }
        .footer-about { max-width: 310px; color: #68758a; font-size: 10px; line-height: 1.65; }
        .footer-title { margin-bottom: 10px; font-size: 11px; font-weight: 700; }
        .footer-links { display: grid; gap: 8px; }
        .footer-links a { color: #68758a; font-size: 9px; text-decoration: none; }
        .footer-bottom { border-top: 1px solid #f0f2f7; color: #8490a2; font-size: 8px; }
        .legal-links a { color: #667287; text-decoration: none; }

        .modal-backdrop.show { background: #101a2e; opacity: .68; }
        .qr-modal { max-width: 510px; }
        .qr-modal .modal-content { overflow: hidden; border: 0; border-radius: 14px; box-shadow: 0 16px 45px rgba(10,20,40,.24); }
        .qr-modal .modal-header { padding: 11px 14px; border-bottom: 0; background: #eff4ff; }
        .qr-modal .modal-body { padding: 9px 13px 11px; }
        .qr-modal .modal-footer { padding: 8px 12px 10px; border-top: 0; }
        .qr-symbol { display: inline-flex; width: 32px; height: 32px; flex: 0 0 auto; align-items: center; justify-content: center; border-radius: 8px; background: var(--blue); color: #fff; font-size: 17px; }
        .qr-title { font-size: 12px; font-weight: 700; }
        .qr-explainer { max-width: 330px; margin-top: 3px; color: #69768b; font-size: 8px; line-height: 1.4; }
        .qr-ready { padding: 3px 6px; border-radius: 999px; background: #dcfce9; color: #168249; font-size: 7px; font-weight: 700; white-space: nowrap; }
        .qr-loan { display: flex; align-items: center; gap: 7px; padding: 7px; border-radius: 8px; background: #f0f5ff; }
        .qr-loan img { width: 40px; height: 33px; flex: 0 0 auto; border-radius: 5px; object-fit: cover; }
        .qr-loan-title { font-size: 8px; font-weight: 700; }
        .qr-loan-meta { color: #69768b; font-size: 7px; }
        .qr-ticket { margin-left: auto; color: var(--blue); font-size: 7px; font-weight: 700; white-space: nowrap; }
        .qr-display { padding: 10px; border: 1px dashed #c6d8ff; border-radius: 9px; text-align: center; }
        .qr-art { position: relative; display: grid; width: 132px; height: 132px; grid-template-columns: repeat(9, 1fr); grid-template-rows: repeat(9, 1fr); gap: 4px; margin: 0 auto 6px; padding: 8px; border: 1px solid #e3eaf5; border-radius: 9px; background: #fff; box-shadow: 0 2px 5px rgba(20,34,56,.08); }
        .qr-art span { border-radius: 2px; background: var(--blue-dark); }
        .qr-art span:nth-child(3n), .qr-art span:nth-child(7n), .qr-art span:nth-child(11n), .qr-art span:nth-child(13n) { background: transparent; }
        .qr-art span:nth-child(10), .qr-art span:nth-child(12), .qr-art span:nth-child(19), .qr-art span:nth-child(27), .qr-art span:nth-child(34), .qr-art span:nth-child(55), .qr-art span:nth-child(63), .qr-art span:nth-child(70), .qr-art span:nth-child(78) { background: var(--blue); }
        .qr-art::after { position: absolute; top: 50%; left: 50%; width: 32px; height: 32px; border: 4px solid var(--blue); border-radius: 50%; background: #fff; color: var(--blue-dark); content: "C"; font-size: 15px; font-weight: 800; line-height: 24px; text-align: center; transform: translate(-50%, -50%); }
        .qr-code { color: var(--blue-dark); font-size: 12px; font-weight: 800; letter-spacing: .14em; }
        .qr-expiry { color: #68758a; font-size: 7px; }
        .qr-steps { padding: 8px; border-radius: 8px; background: #f0f5ff; }
        .qr-step-heading { margin-bottom: 5px; font-size: 8px; font-weight: 700; }
        .qr-step { display: flex; gap: 4px; color: #66748a; font-size: 7px; line-height: 1.4; }
        .qr-step-number { display: inline-flex; width: 14px; height: 14px; flex: 0 0 auto; align-items: center; justify-content: center; border-radius: 50%; background: var(--blue); color: #fff; font-size: 7px; font-weight: 700; }
        .btn-qr-light { border-radius: 7px; background: #edf3ff; color: #31425c; font-size: 8px; }
        .btn-qr-primary { border-radius: 7px; background: var(--blue); color: #fff; font-size: 8px; font-weight: 600; }
        .btn-qr-primary:hover { background: #164bcc; color: #fff; }

        @media (max-width: 991.98px) {
            .navbar { min-height: 62px; }
            .main-nav { padding: 12px 0; }
            .main-nav .nav-link { border-radius: 8px; }
            .scanner-stage { min-height: 560px; }
        }

        @media (max-width: 767.98px) {
            .page-container { padding-right: 14px; padding-left: 14px; }
            .brand-logo { width: 110px; }
            .scanner-stage { min-height: 0; padding-bottom: 16px; }
            .scanner-toolbar { align-items: flex-start; }
            .scanner-title { font-size: 14px; }
            .tool-button { padding: 6px 8px; font-size: 8px; }
            .scan-frame { margin-top: 25px; }
            .bottom-panel { grid-template-columns: 1fr; margin: 25px 14px 0; }
            .camera-actions { grid-template-columns: 1fr 1fr; }
            .privacy-note { grid-column: 1 / -1; }
            .qr-modal { max-width: calc(100vw - 20px); margin-right: auto; margin-left: auto; }
        }

        @media (max-width: 420px) {
            .scanner-toolbar { flex-wrap: wrap; }
            .scanner-tools { margin-left: auto; }
            .scanner-subtitle { max-width: 225px; }
            .scan-frame { width: min(220px, 65vw); }
            .bottom-panel { margin-right: 10px; margin-left: 10px; padding: 10px; }
            .handoff-photo { width: 76px; height: 66px; }
            .handoff-title { font-size: 10px; }
            .qr-modal .modal-body { padding-right: 9px; padding-left: 9px; }
            .qr-art { width: 122px; height: 122px; }
            .qr-ready { font-size: 6px; }
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
                        <li class="nav-item"><a class="nav-link" href="riwayat_peminjama_&amp;_pengembalian_barang.php">Riwayat Pinjam</a></li>
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

    <main>
        <section class="scanner-stage" aria-label="Pemindai QR serah terima">
            <div class="container page-container scanner-content">
                <div class="scanner-toolbar">
                    <div class="d-flex align-items-center gap-2">
                        <a href="layar_chat_pesan_antar_mahasiswa.php" class="back-link" aria-label="Kembali ke pesan"><i class="bi bi-arrow-left"></i></a>
                        <div>
                            <div class="d-flex flex-wrap align-items-center gap-2"><h1 class="scanner-title mb-0">Pindai QR Serah Terima</h1><span class="live-pill"><i class="bi bi-circle-fill me-1" style="font-size:5px"></i>Live Feed</span></div>
                            <div class="scanner-subtitle"><i class="bi bi-geo-alt me-1"></i>Perpustakaan Pusat UI (Crystal Knowledge) <span class="text-success">· <i class="bi bi-circle-fill" style="font-size:5px"></i> GPS Aktif</span></div>
                        </div>
                    </div>
                    <div class="scanner-tools">
                        <button class="btn tool-button" id="flash-button" type="button"><i class="bi bi-lightning-charge"></i><span>Senter Mati</span></button>
                        <button class="btn tool-button" type="button" aria-label="Ganti kamera"><i class="bi bi-camera"></i></button>
                        <button class="btn tool-button" type="button" aria-label="Pengaturan kamera"><i class="bi bi-gear"></i></button>
                    </div>
                </div>
                <div class="scanner-tip"><i class="bi bi-qr-code-scan me-1"></i>Arahkan kamera ke QR Code di layar ponsel Andi Pratama</div>
                <div class="scan-frame" aria-label="Area pemindaian QR"><span class="scan-corner"></span><span class="scan-corner bottom-left"></span><span class="scan-line"></span></div>
                <div class="scanner-status"><span class="scanner-dot"></span>Mencari kode serah terima di sekitar...</div>

                <section class="bottom-panel" aria-label="Detail transaksi peminjaman">
                    <div class="handoff-item">
                        <img class="handoff-photo" src="img/items/item-1.png" alt="Laptop ASUS VivoBook 14">
                        <div class="flex-grow-1">
                            <div class="d-flex flex-wrap align-items-center gap-2 mb-1"><span class="badge rounded-pill verified-pill">Peminjaman Aktif</span><span class="small-muted fw-semibold">#CS-883921</span></div>
                            <h2 class="handoff-title mb-0">Laptop ASUS VivoBook 14</h2>
                            <div class="handoff-meta"><i class="bi bi-person me-1"></i>Andi Pratama (FT ’21) <i class="bi bi-arrow-left-right mx-1"></i> Rizky Pratama (FT ’21)</div>
                            <div class="handoff-meta"><i class="bi bi-calendar3 me-1"></i>21 Nov 2024 · <i class="bi bi-clock ms-1 me-1"></i>13:00 WIB</div>
                            <div class="handoff-step"><i class="bi bi-geo-alt text-primary me-1"></i>Perpusat UI, Lantai 1 (Crystal Knowledge)</div>
                        </div>
                    </div>
                    <div class="camera-actions">
                        <button class="btn action-confirm py-2" type="button" id="confirm-handoff"><i class="bi bi-shield-check me-1"></i>Konfirmasi &amp; Serah Terima</button>
                        <button class="btn action-manual py-2" type="button" data-bs-toggle="modal" data-bs-target="#manualCodeModal"><i class="bi bi-keyboard me-1"></i>Input Kode Manual</button>
                        <div class="privacy-note"><i class="bi bi-shield-lock text-primary"></i><span>Pastikan barang sudah diperiksa bersama. Verifikasi ini akan mencatat waktu serah terima secara resmi.</span></div>
                    </div>
                </section>
            </div>
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
                        <div class="d-flex align-items-center justify-content-center gap-1"><span class="qr-code">CS-UI-883921</span><button class="btn p-0 text-secondary" id="copy-code" type="button" aria-label="Salin kode"><i class="bi bi-copy"></i></button></div>
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
                <div class="modal-footer"><button class="btn btn-qr-light px-3 py-2" id="download-qr" type="button"><i class="bi bi-download me-1"></i>Unduh QR</button><button class="btn btn-qr-primary px-3 py-2" type="button" data-bs-dismiss="modal">Tutup Pratinjau</button></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="manualCodeModal" tabindex="-1" aria-labelledby="manualCodeLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm"><div class="modal-content">
            <div class="modal-header"><h2 class="modal-title fs-6" id="manualCodeLabel">Input Kode Serah Terima</h2><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button></div>
            <form id="manual-code-form"><div class="modal-body"><label class="form-label small" for="manual-code">Kode yang ditampilkan pemilik</label><input class="form-control" id="manual-code" autocomplete="one-time-code" placeholder="Contoh: CS-UI-883921" required><div class="form-text">Minta pemilik barang membacakan kode di layar QR-nya.</div></div><div class="modal-footer"><button class="btn btn-primary btn-sm" type="submit">Verifikasi Kode</button></div></form>
        </div></div>
    </div>

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm"><div class="modal-content text-center p-3"><div class="text-success fs-1"><i class="bi bi-check-circle-fill"></i></div><h2 class="modal-title fs-6 fw-bold" id="successLabel">Serah Terima Tercatat</h2><p class="small text-secondary mt-2 mb-0">Transaksi #CS-883921 berhasil diverifikasi. Selamat menggunakan barang pinjaman!</p><button type="button" class="btn btn-primary btn-sm mt-3" data-bs-dismiss="modal">Selesai</button></div></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var handoffModalElement = document.getElementById("handoffModal");
        var handoffModal = bootstrap.Modal.getOrCreateInstance(handoffModalElement);

        document.getElementById("flash-button").addEventListener("click", function () {
            var enabled = this.dataset.enabled !== "true";
            this.dataset.enabled = String(enabled);
            this.classList.toggle("text-warning", enabled);
            this.querySelector("span").textContent = enabled ? "Senter Nyala" : "Senter Mati";
        });

        document.getElementById("confirm-handoff").addEventListener("click", function () {
            handoffModal.show();
        });

        document.getElementById("copy-code").addEventListener("click", async function () {
            try {
                await navigator.clipboard.writeText("CS-UI-883921");
                this.innerHTML = '<i class="bi bi-check2 text-success"></i>';
            } catch (error) {
                this.setAttribute("aria-label", "Kode serah terima: CS-UI-883921");
            }
        });

        document.getElementById("download-qr").addEventListener("click", function () {
            window.print();
        });

        document.getElementById("manual-code-form").addEventListener("submit", function (event) {
            event.preventDefault();
            var codeInput = document.getElementById("manual-code");
            codeInput.setCustomValidity("");
            if (codeInput.value.trim().toUpperCase() !== "CS-UI-883921") {
                codeInput.setCustomValidity("Kode tidak sesuai dengan transaksi ini.");
                codeInput.reportValidity();
                return;
            }
            var manualModal = document.getElementById("manualCodeModal");
            manualModal.addEventListener("hidden.bs.modal", function showSuccess() {
                manualModal.removeEventListener("hidden.bs.modal", showSuccess);
                bootstrap.Modal.getOrCreateInstance(document.getElementById("successModal")).show();
            });
            bootstrap.Modal.getInstance(manualModal).hide();
        });

        window.addEventListener("load", function () {
            handoffModal.show();
        });
    </script>
</body>
</html>