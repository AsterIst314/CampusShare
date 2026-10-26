<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bagikan perlengkapan kuliahmu kepada sesama mahasiswa melalui CampusShare.">
    <title>Pinjamkan Barang - CampusShare</title>
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
        .breadcrumb-line { color: #768298; font-size: 10px; }
        .breadcrumb-line a { text-decoration: none; }
        .security-note { color: var(--blue); font-size: 9px; }

        .form-hero { padding: 22px 0 18px; background: #edf3ff; }
        .hero-kicker { color: var(--blue-dark); font-size: 9px; font-weight: 700; letter-spacing: .04em; }
        .hero-title { margin: 4px 0; font-size: clamp(21px, 3vw, 27px); font-weight: 800; letter-spacing: -.04em; }
        .hero-copy { max-width: 680px; margin-bottom: 0; color: #66748a; font-size: 11px; line-height: 1.55; }
        .draft-state { padding: 6px 10px; border-radius: 999px; background: #fff; color: #58667c; font-size: 9px; white-space: nowrap; }
        .stepper { display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px; margin-top: 16px; padding: 12px 16px; border-radius: 12px; background: #fff; }
        .step { display: flex; align-items: center; gap: 8px; min-width: 0; color: #748096; }
        .step-number { display: inline-flex; width: 32px; height: 32px; flex: 0 0 auto; align-items: center; justify-content: center; border-radius: 50%; background: #edf2fc; color: #68758a; font-size: 12px; font-weight: 700; }
        .step.done .step-number, .step.active .step-number { background: var(--blue); color: #fff; box-shadow: 0 2px 6px rgba(32, 89, 232, .25); }
        .step.active .step-number { outline: 3px solid #dce7ff; }
        .step-label { font-size: 9px; font-weight: 600; line-height: 1.4; }
        .step-label small { display: block; color: inherit; font-size: 9px; font-weight: 400; }

        .form-card, .preview-card, .side-card { border: 1px solid #e9edf5; border-radius: 13px; background: #fff; }
        .form-card { padding: 20px; }
        .form-card + .form-card { margin-top: 18px; }
        .section-heading { margin: 0; font-size: 16px; font-weight: 700; letter-spacing: -.02em; }
        .section-description { margin: 3px 0 0; color: #778397; font-size: 9px; line-height: 1.5; }
        .section-number { color: var(--blue); font-size: 9px; font-weight: 700; letter-spacing: .03em; }
        .required { color: #dc3545; }
        .form-label { margin-bottom: 5px; font-size: 10px; font-weight: 600; }
        .form-control, .form-select { min-height: 37px; border-color: #e2e7f0; border-radius: 8px; background-color: #fff; font-size: 10px; }
        textarea.form-control { min-height: auto; }
        .form-hint { color: #8590a2; font-size: 9px; line-height: 1.5; }
        .character-count { color: #8994a5; font-size: 9px; }
        .category-choice { position: relative; display: block; height: 100%; cursor: pointer; }
        .category-choice input, .choice-card input, .period-choice input, .location-choice input { position: absolute; opacity: 0; pointer-events: none; }
        .category-content { display: flex; min-height: 38px; align-items: center; gap: 6px; padding: 8px; border: 1px solid transparent; border-radius: 8px; background: #eef3ff; color: #35435b; font-size: 9px; font-weight: 600; }
        .category-choice input:checked + .category-content { border-color: var(--blue); background: #e5edff; color: var(--blue-dark); box-shadow: 0 0 0 1px rgba(32, 89, 232, .12); }
        .category-content i { font-size: 13px; }
        .affiliation { padding: 11px 12px; border-radius: 10px; background: #edf3ff; }
        .affiliation-icon { display: inline-flex; width: 34px; height: 34px; flex: 0 0 auto; align-items: center; justify-content: center; border-radius: 50%; background: var(--blue); color: #fff; }
        .affiliation-label { font-size: 9px; font-weight: 600; }
        .affiliation-meta { color: #66748a; font-size: 9px; }
        .verified-status { padding: 5px 8px; border-radius: 999px; background: #dce9ff; color: var(--blue); font-size: 9px; }

        .choice-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 8px; }
        .choice-card { position: relative; display: block; min-height: 88px; cursor: pointer; }
        .choice-content { display: block; height: 100%; padding: 10px; border: 1px solid transparent; border-radius: 10px; background: #eff4ff; }
        .choice-card input:checked + .choice-content { border-color: var(--blue); background: #e8efff; box-shadow: 0 0 0 1px rgba(32, 89, 232, .12); }
        .choice-title { font-size: 9px; font-weight: 700; }
        .choice-copy { margin-top: 4px; color: #68758a; font-size: 8px; line-height: 1.5; }
        .choice-check { position: absolute; top: 9px; right: 9px; color: var(--blue); font-size: 10px; opacity: 0; }
        .choice-card input:checked ~ .choice-content .choice-check { opacity: 1; }

        .tag-list { display: flex; flex-wrap: wrap; gap: 5px; }
        .tag { display: inline-flex; align-items: center; gap: 4px; padding: 5px 8px; border-radius: 999px; background: #e7efff; color: var(--blue-dark); font-size: 9px; }
        .tag button { padding: 0; border: 0; background: none; color: inherit; line-height: 1; }
        .tag-entry { width: 100px; height: 25px; padding: 3px 8px; border: 1px dashed #cbd7ee; border-radius: 999px; font-size: 9px; }

        .upload-zone { display: flex; min-height: 130px; flex-direction: column; align-items: center; justify-content: center; border: 1px dashed #b8c8e8; border-radius: 11px; background: #f3f6ff; text-align: center; cursor: pointer; }
        .upload-icon { display: inline-flex; width: 38px; height: 38px; align-items: center; justify-content: center; margin-bottom: 8px; border-radius: 50%; background: #fff; color: var(--blue); font-size: 17px; }
        .upload-title { font-size: 9px; font-weight: 600; }
        .upload-title span { color: var(--blue); text-decoration: underline; }
        .upload-hint { margin-top: 3px; color: #8792a4; font-size: 8px; }
        .photo-tile { position: relative; overflow: hidden; border-radius: 9px; background: #e9eef6; }
        .photo-tile img { display: block; width: 100%; aspect-ratio: 1.35; object-fit: cover; }
        .photo-caption { position: absolute; right: 5px; bottom: 5px; left: 5px; overflow: hidden; padding: 4px 6px; border-radius: 5px; background: rgba(255,255,255,.94); font-size: 8px; text-overflow: ellipsis; white-space: nowrap; }
        .photo-main { position: absolute; top: 6px; left: 6px; padding: 4px 6px; border-radius: 5px; background: var(--blue); color: #fff; font-size: 8px; font-weight: 700; }
        .photo-tip { padding: 10px; border-radius: 9px; background: #edf3ff; color: #65738a; font-size: 9px; line-height: 1.5; }
        .photo-tip i { color: var(--blue); }

        .period-choice { position: relative; display: block; cursor: pointer; }
        .period-content { display: block; padding: 9px 5px; border-radius: 8px; background: #eff3fb; font-size: 9px; text-align: center; }
        .period-choice input:checked + .period-content { background: var(--blue-dark); color: #fff; box-shadow: 0 2px 5px rgba(32,89,232,.2); }
        .location-choice { position: relative; display: block; height: 100%; cursor: pointer; }
        .location-content { display: flex; min-height: 48px; align-items: flex-start; gap: 7px; padding: 9px; border: 1px solid transparent; border-radius: 8px; background: #eef3ff; }
        .location-choice input:checked + .location-content { border-color: #c5d6ff; background: #e8efff; }
        .location-content i { color: var(--blue); }
        .location-name { font-size: 8px; font-weight: 600; }
        .location-meta { margin-top: 2px; color: #778397; font-size: 8px; }
        .integrity-box { padding: 13px; border-radius: 9px; background: #edf3ff; }
        .integrity-title { font-size: 9px; font-weight: 700; }
        .integrity-copy { color: #68758a; font-size: 8px; line-height: 1.5; }
        .integrity-check { font-size: 8px; }

        .preview-heading { color: var(--blue-dark); font-size: 10px; font-weight: 800; letter-spacing: .03em; }
        .preview-subtitle { color: #8792a4; font-size: 8px; }
        .preview-card { overflow: hidden; }
        .preview-image { position: relative; }
        .preview-image > img { display: block; width: 100%; aspect-ratio: 1.35; object-fit: cover; }
        .preview-available { position: absolute; top: 8px; left: 8px; padding: 5px 8px; border-radius: 999px; background: #e3fff0; color: #18854c; font-size: 8px; font-weight: 700; }
        .preview-body { padding: 11px; }
        .preview-category { color: var(--blue); font-size: 8px; font-weight: 700; }
        .preview-product-name { margin: 5px 0; font-size: 11px; font-weight: 700; }
        .preview-copy { color: #6f7b8f; font-size: 8px; line-height: 1.5; }
        .preview-meta { color: #7c889a; font-size: 8px; }
        .preview-owner { width: 27px; height: 27px; border-radius: 50%; object-fit: cover; }
        .preview-rating { color: #f59e0b; font-size: 8px; }
        .preview-cta { width: 100%; border: 0; border-radius: 7px; background: var(--blue-dark); color: #fff; font-size: 8px; font-weight: 700; }
        .security-card { padding: 12px; }
        .side-heading { font-size: 10px; font-weight: 700; }
        .side-list { display: grid; gap: 8px; }
        .side-list-item { display: flex; align-items: flex-start; gap: 6px; color: #68758a; font-size: 8px; line-height: 1.5; }
        .side-list-item i { color: var(--blue); }
        .faq-card { padding: 12px; }
        .faq-title { color: #7e8a9d; font-size: 8px; font-weight: 700; letter-spacing: .03em; }
        .faq-card .accordion-button { padding: 7px 0; background: transparent; box-shadow: none; color: #536176; font-size: 8px; }
        .faq-card .accordion-button::after { width: 10px; height: 10px; background-size: 10px; }
        .faq-card .accordion-body { padding: 0 0 8px; color: #778397; font-size: 8px; }

        .form-actions { display: flex; justify-content: space-between; align-items: center; gap: 10px; }
        .draft-button { border: 0; border-radius: 999px; background: #e9effc; color: #35435b; font-size: 9px; }
        .publish-button { border: 0; border-radius: 999px; background: var(--blue); color: #fff; font-size: 9px; font-weight: 700; box-shadow: 0 3px 7px rgba(32,89,232,.2); }
        .publish-button:hover { background: #154bcc; color: #fff; }

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
            .form-hero { padding-top: 18px; }
            .stepper { gap: 5px; padding: 10px; }
            .step { align-items: flex-start; gap: 5px; }
            .step-number { width: 26px; height: 26px; font-size: 10px; }
            .step-label, .step-label small { font-size: 8px; }
            .form-card { padding: 15px; }
            .choice-grid { gap: 6px; }
            .choice-content { padding: 8px; }
            .choice-copy { font-size: 8px; }
            .site-footer { margin-top: 20px; }
            .footer-bottom .legal-links { justify-content: flex-start !important; }
        }

        @media (max-width: 420px) {
            .stepper { grid-template-columns: 1fr; gap: 9px; }
            .step-label small { display: inline; margin-left: 3px; }
            .choice-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .form-actions { align-items: stretch; flex-direction: column-reverse; }
            .form-actions .btn { width: 100%; }
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
                        <a class="btn btn-primary btn-sm rounded-pill px-3 text-nowrap" href="#"><i class="bi bi-plus-circle me-1"></i>Pinjamkan Barang</a>
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

    <div class="container page-container pt-2">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
            <nav class="breadcrumb-line" aria-label="Breadcrumb">
                <a href="index.php">Beranda</a><span class="mx-1">›</span><a href="hal_profil.php">Dashboard Saya</a><span class="mx-1">›</span><span aria-current="page">Tambah Barang Baru</span>
            </nav>
            <span class="security-note"><i class="bi bi-shield-lock me-1"></i>Dilindungi Verifikasi SSO &amp; KTM Universitas Indonesia</span>
        </div>
    </div>

    <section class="form-hero">
        <div class="container page-container">
            <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-2">
                <div>
                    <div class="hero-kicker">INISIATIF KAMPUS LESTARI</div>
                    <h1 class="hero-title">Pinjamkan Barang ke Sesama Mahasiswa</h1>
                    <p class="hero-copy">Bantu rekan kampus yang memerlukan alat praktikum, buku, atau perangkat kuliah. Tetap aman dengan penjaminan akun SSO dan verifikasi KTM terdaftar.</p>
                </div>
                <span class="draft-state"><i class="bi bi-cloud-check text-primary me-1"></i>Auto-save Draft: <strong class="text-success">Tersimpan</strong></span>
            </div>
            <div class="stepper" aria-label="Langkah mengisi formulir">
                <div class="step done"><span class="step-number"><i class="bi bi-check-lg"></i></span><span class="step-label">Langkah 1<small>Info &amp; Kategori Barang</small></span></div>
                <div class="step active"><span class="step-number">2</span><span class="step-label">Langkah 2 (Aktif)<small>Foto &amp; Kondisi Fisik</small></span></div>
                <div class="step"><span class="step-number">3</span><span class="step-label">Langkah 3<small>Durasi &amp; Titik Temu</small></span></div>
            </div>
        </div>
    </section>

    <main class="container page-container py-4">
        <div class="row g-3 align-items-start">
            <div class="col-12 col-lg-8 col-xl-8">
                <form>
                    <section class="form-card" aria-labelledby="information-heading">
                        <div class="d-flex justify-content-between align-items-start gap-2 mb-3">
                            <div>
                                <div class="section-number"><i class="bi bi-card-list me-1"></i>BAGIAN 01</div>
                                <h2 class="section-heading mt-1" id="information-heading">Informasi &amp; Kategori Barang</h2>
                                <p class="section-description">Tulis identitas alat dengan jelas agar mudah ditemukan saat pencarian modul praktikum atau ujian.</p>
                            </div>
                            <span class="badge rounded-pill verified-pill">Wajib Diisi</span>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between"><label class="form-label" for="item-name">Nama Barang Lengkap <span class="required">*</span></label><span class="character-count">0/60</span></div>
                            <input class="form-control" id="item-name" name="item_name" maxlength="60" placeholder="Contoh: Kalkulator Scientific Casio FX-991EX" required>
                            <div class="form-hint mt-1">Sertakan merek, tipe, atau seri spesifik agar peminjam dapat menyesuaikan kebutuhan mata kuliah.</div>
                        </div>

                        <fieldset class="mb-3">
                            <legend class="form-label">Pilih Kategori Akademik <span class="required">*</span></legend>
                            <div class="row g-2">
                                <div class="col-6 col-md-4"><label class="category-choice"><input type="radio" name="category" checked><span class="category-content"><i class="bi bi-pc-display-horizontal"></i>Elektronik &amp; Gadget</span></label></div>
                                <div class="col-6 col-md-4"><label class="category-choice"><input type="radio" name="category"><span class="category-content"><i class="bi bi-book"></i>Buku &amp; Diktat</span></label></div>
                                <div class="col-6 col-md-4"><label class="category-choice"><input type="radio" name="category"><span class="category-content"><i class="bi bi-flask"></i>Alat Lab &amp; Sains</span></label></div>
                                <div class="col-6 col-md-4"><label class="category-choice"><input type="radio" name="category"><span class="category-content"><i class="bi bi-camera"></i>Visual &amp; Kamera</span></label></div>
                                <div class="col-6 col-md-4"><label class="category-choice"><input type="radio" name="category"><span class="category-content"><i class="bi bi-award"></i>Jas Alma &amp; Toga</span></label></div>
                                <div class="col-6 col-md-4"><label class="category-choice"><input type="radio" name="category"><span class="category-content"><i class="bi bi-tools"></i>Perkakas &amp; Seni</span></label></div>
                            </div>
                        </fieldset>

                        <div class="affiliation d-flex align-items-center gap-2 mb-3">
                            <span class="affiliation-icon"><i class="bi bi-bank"></i></span>
                            <div class="flex-grow-1"><div class="affiliation-label">Afiliasi Pemilik (Otomatis dari SSO)</div><div class="affiliation-meta"><strong>Fakultas Teknik UI — Departemen Teknik Mesin</strong></div></div>
                            <span class="verified-status"><i class="bi bi-patch-check me-1"></i>Terverifikasi</span>
                        </div>

                        <fieldset class="mb-3">
                            <legend class="form-label">Kondisi Fisik Saat Ini <span class="required">*</span></legend>
                            <div class="choice-grid">
                                <label class="choice-card"><input type="radio" name="condition" checked><span class="choice-content"><i class="bi bi-check-circle-fill choice-check"></i><span class="choice-title">Sangat Bagus</span><span class="choice-copy d-block">Fungsi 100% normal, layar jernih, tombol presisi tanpa cacat berarti.</span></span></label>
                                <label class="choice-card"><input type="radio" name="condition"><span class="choice-content"><i class="bi bi-check-circle-fill choice-check"></i><span class="choice-title">Baik &amp; Layak</span><span class="choice-copy d-block">Semua fitur bekerja, ada goresan halus tanda pemakaian wajar perkuliahan.</span></span></label>
                                <label class="choice-card"><input type="radio" name="condition"><span class="choice-content"><i class="bi bi-check-circle-fill choice-check"></i><span class="choice-title">Minus Kosmetik</span><span class="choice-copy d-block">Fungsi utama normal, penyok/casing ada tanda aus atau ternoda.</span></span></label>
                            </div>
                        </fieldset>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between"><label class="form-label" for="item-description">Kelengkapan &amp; Catatan Khusus Pemakaian</label><span class="character-count">142/500</span></div>
                            <textarea class="form-control" id="item-description" name="description" rows="4" maxlength="500" placeholder="Jelaskan kondisi, kelengkapan, dan aturan pemakaian barang...">Unit kalkulator saintifik lengkap dengan hardcase geser orisinal. Baterai LR44 baru diganti minggu lalu. Sangat aman dan siap digunakan untuk UTS/UAS Fisika Dasar maupun Matdis.</textarea>
                        </div>
                        <div>
                            <label class="form-label" for="new-tag">Kata Kunci Pencarian Cepat (Maks. 5 Tag)</label>
                            <div class="tag-list" id="tag-list">
                                <span class="tag">#Kalkulator <button type="button" aria-label="Hapus tag">×</button></span>
                                <span class="tag">#UjianUAS <button type="button" aria-label="Hapus tag">×</button></span>
                                <span class="tag">#MatematikaTeknik <button type="button" aria-label="Hapus tag">×</button></span>
                                <input class="tag-entry" id="new-tag" type="text" placeholder="+ Tambah Tag" aria-label="Tambah tag">
                            </div>
                        </div>
                    </section>

                    <section class="form-card" aria-labelledby="photos-heading">
                        <div class="d-flex justify-content-between align-items-start gap-2 mb-3">
                            <div>
                                <div class="section-number"><i class="bi bi-images me-1"></i>BAGIAN 02</div>
                                <h2 class="section-heading mt-1" id="photos-heading">Foto Detail &amp; Keaslian Barang</h2>
                                <p class="section-description">Ambil foto asli milik sendiri dengan pencahayaan yang jelas. Foto autentik meningkatkan penerimaan pinjaman hingga 3× lipat.</p>
                            </div>
                            <span class="badge rounded-pill verified-pill">3 / 5<br>Tergunggah</span>
                        </div>

                        <label class="upload-zone w-100 mb-3" for="item-photos">
                            <span class="upload-icon"><i class="bi bi-camera"></i></span>
                            <span class="upload-title">Tarik &amp; Lepaskan foto di sini atau <span>Pilih File dari Perangkat</span></span>
                            <span class="upload-hint">Mendukung format JPG, PNG, atau WEBP (Maksimal 5MB per foto)</span>
                            <input class="visually-hidden" id="item-photos" name="photos[]" type="file" accept="image/jpeg,image/png,image/webp" multiple>
                        </label>

                        <div class="form-label mb-2">FOTO YANG TELAH DIUNGGAH</div>
                        <div class="row g-2 mb-3">
                            <div class="col-4"><div class="photo-tile"><img src="img/items/item-3.png" alt="Kalkulator tampak depan"><span class="photo-main"><i class="bi bi-star-fill me-1"></i>Foto Utama</span><span class="photo-caption">Tampak Depan</span></div></div>
                            <div class="col-4"><div class="photo-tile"><img src="img/items/item-3.png" alt="Kalkulator tampak samping" style="object-position: 20% 60%;transform:scale(1.25)"><span class="photo-caption">Tampak Samping</span></div></div>
                            <div class="col-4"><div class="photo-tile"><img src="img/items/item-3.png" alt="Kelengkapan dan sisi belakang kalkulator" style="object-position: 80% 40%;transform:scale(1.3)"><span class="photo-caption">Kelengkapan Belakang</span></div></div>
                        </div>
                        <div class="photo-tip"><i class="bi bi-lightbulb me-1"></i><strong>Tips Fotografi Cepat:</strong> Hindari foto yang buram atau screenshot dari internet. Sertakan nomor seri atau stiker penanda pribadi untuk memudahkan proses serah terima kembali.</div>
                    </section>

                    <section class="form-card" aria-labelledby="duration-heading">
                        <div class="mb-3">
                            <div class="section-number"><i class="bi bi-clock-history me-1"></i>BAGIAN 03</div>
                            <h2 class="section-heading mt-1" id="duration-heading">Durasi, Titik Temu &amp; Jaminan</h2>
                            <p class="section-description">Tentukan batas waktu peminjaman yang wajar dan pilih lokasi serah terima di area kampus yang aman.</p>
                        </div>

                        <fieldset class="mb-3">
                            <legend class="form-label">Maksimal Durasi Peminjaman Per Periode</legend>
                            <div class="row g-2">
                                <div class="col-6 col-sm-3"><label class="period-choice"><input type="radio" name="duration"><span class="period-content">3 Hari</span></label></div>
                                <div class="col-6 col-sm-3"><label class="period-choice"><input type="radio" name="duration" checked><span class="period-content">7 Hari (1 Minggu)</span></label></div>
                                <div class="col-6 col-sm-3"><label class="period-choice"><input type="radio" name="duration"><span class="period-content">14 Hari</span></label></div>
                                <div class="col-6 col-sm-3"><label class="period-choice"><input type="radio" name="duration"><span class="period-content">Satu Semester</span></label></div>
                            </div>
                        </fieldset>

                        <fieldset class="mb-3">
                            <legend class="form-label">Skema Peminjaman &amp; Keamanan</legend>
                            <div class="choice-grid">
                                <label class="choice-card"><input type="radio" name="guarantee" checked><span class="choice-content"><i class="bi bi-check-circle-fill choice-check"></i><span class="choice-title text-primary">Gratis / Berbagi</span><span class="choice-copy d-block">Tanpa biaya sewa. Rekomendasi integritas komunitas akademik UI.<br><span class="text-primary">Rekomendasi Kampus</span></span></span></label>
                                <label class="choice-card"><input type="radio" name="guarantee"><span class="choice-content"><i class="bi bi-check-circle-fill choice-check"></i><span class="choice-title">Deposit KTM Digital</span><span class="choice-copy d-block">Sistem menahan data verifikasi KTM aktif peminjam hingga barang kembali.<br>Otomatis Terkunci</span></span></label>
                                <label class="choice-card"><input type="radio" name="guarantee"><span class="choice-content"><i class="bi bi-check-circle-fill choice-check"></i><span class="choice-title">Biaya Perawatan Sukarela</span><span class="choice-copy d-block">Biaya pengganti baterai/tinta (misal: Rp5.000/peminjaman tanpa mencairkan saldo).<br>Non-Komersial</span></span></label>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend class="form-label">Rekomendasi Titik Serah Terima di Kampus (Pilih Minimal 1)</legend>
                            <div class="row g-2">
                                <div class="col-12 col-sm-6"><label class="location-choice"><input type="checkbox" checked><span class="location-content"><i class="bi bi-check-square-fill"></i><span><span class="location-name d-block">Perpustakaan Pusat UI (Crystal Knowledge)</span><span class="location-meta">Lobi Utama &amp; Starbucks Area</span></span></span></label></div>
                                <div class="col-12 col-sm-6"><label class="location-choice"><input type="checkbox" checked><span class="location-content"><i class="bi bi-check-square-fill"></i><span><span class="location-name d-block">Kantin &amp; Selasar Fakultas Teknik (FT UI)</span><span class="location-meta">Gedung GKFT, Kantin</span></span></span></label></div>
                                <div class="col-12 col-sm-6"><label class="location-choice"><input type="checkbox"><span class="location-content"><i class="bi bi-square"></i><span><span class="location-name d-block">Student Center &amp; Pusgiwa UI</span><span class="location-meta">Area Gazebo &amp; Co-working Space</span></span></span></label></div>
                                <div class="col-12 col-sm-6"><label class="location-choice"><input type="checkbox"><span class="location-content"><i class="bi bi-square"></i><span><span class="location-name d-block">Stasiun UI / Lobi Halte Bikun Asrama</span><span class="location-meta">Area Terang &amp; Terbuka Umum</span></span></span></label></div>
                            </div>
                        </fieldset>
                    </section>

                    <section class="form-card" aria-label="Publikasi barang">
                        <div class="integrity-box mb-3">
                            <div class="d-flex align-items-start gap-2"><i class="bi bi-shield-check fs-5 text-primary"></i><div><div class="integrity-title">Pakta Integritas Peminjaman Sivitas Akademika</div><div class="integrity-copy">Dengan mempublikasikan barang ini, saya menyatakan bahwa barang ini adalah hak milik saya secara sah, dalam kondisi siap pakai sesuai penjelasan, dan berkomitmen melakukan serah terima langsung di area kampus yang telah disepakati.</div><label class="form-check-label integrity-check"><input class="form-check-input me-1" type="checkbox" required> Saya menyetujui seluruh aturan peminjaman dan kode etik mahasiswa</label></div></div>
                        </div>
                        <div class="form-actions">
                            <button class="btn draft-button px-3 py-2" type="button"><i class="bi bi-save me-1"></i>Simpan sebagai Draf</button>
                            <button class="btn publish-button px-4 py-2" type="submit"><i class="bi bi-rocket-takeoff me-1"></i>Publikasikan Barang Sekarang</button>
                        </div>
                    </section>
                </form>
            </div>

            <aside class="col-12 col-lg-4 col-xl-4" aria-label="Pratinjau dan keamanan">
                <div class="d-flex align-items-center justify-content-between gap-2 mb-2">
                    <h2 class="preview-heading mb-0"><i class="bi bi-eye me-1"></i>PRATINJAU LANGSUNG</h2>
                    <span class="preview-subtitle">Tampil di Katalog</span>
                </div>
                <article class="preview-card mb-3">
                    <div class="preview-image">
                        <img src="img/items/item-3.png" alt="Pratinjau kalkulator scientific Casio FX-991EX">
                        <span class="preview-available"><i class="bi bi-circle-fill me-1" style="font-size:6px"></i>Tersedia</span>
                        <span class="position-absolute top-0 end-0 m-2 bg-white rounded-circle px-2 py-1 text-secondary"><i class="bi bi-heart"></i></span>
                    </div>
                    <div class="preview-body">
                        <div class="d-flex align-items-center justify-content-between gap-2 mb-1"><span class="badge rounded-pill verified-pill">Elektronik &amp; Gadget</span><span class="preview-meta">Maks. 7 Hari</span></div>
                        <h3 class="preview-product-name">Kalkulator Scientific Casio FX-991EX</h3>
                        <p class="preview-copy mb-2">Unit kalkulator saintifik lengkap dengan genggaman geser orisinal. Baterai LR44 baru diganti minggu lalu.</p>
                        <div class="d-flex align-items-center justify-content-between border-top pt-2">
                            <div class="d-flex align-items-center gap-2"><img class="preview-owner" src="img/profil/logo_profil.png" alt=""><div><div class="preview-meta fw-semibold text-dark">Rizky Pratama</div><div class="preview-meta">FT UI ’22</div></div></div>
                            <span class="preview-rating"><i class="bi bi-star-fill"></i> 4.9 <span class="text-secondary">(8)</span></span>
                        </div>
                    </div>
                    <div class="px-3 pb-3"><button class="btn preview-cta py-2" type="button">Gratis Pinjam</button></div>
                </article>

                <section class="side-card security-card mb-3">
                    <h2 class="side-heading text-primary mb-2"><i class="bi bi-shield-lock me-1"></i>Jaminan Keamanan CampusShare</h2>
                    <div class="side-list">
                        <div class="side-list-item"><i class="bi bi-shield-check"></i><span><strong>Identitas Terjamin:</strong> Peminjam wajib terhubung dengan SSO universitas aktif dan diverifikasi KTM.</span></div>
                        <div class="side-list-item"><i class="bi bi-qr-code-scan"></i><span><strong>Serah Terima QR Code:</strong> Scan kode fisik saat pertukaran barang agar durasi tercatat akurat.</span></div>
                        <div class="side-list-item"><i class="bi bi-shield-check"></i><span><strong>Proteksi Kerusakan:</strong> Sanksi akademik dan mediasi satgas kampus jika terjadi kehilangan disengaja.</span></div>
                    </div>
                </section>

                <section class="side-card faq-card" aria-labelledby="faq-heading">
                    <h2 class="faq-title mb-1" id="faq-heading">PERTANYAAN SERING DIAJUKAN</h2>
                    <div class="accordion accordion-flush" id="listingFaq">
                        <div class="accordion-item border-0 bg-transparent">
                            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqReturn">Bagaimana jika terlambat kembali?</button></h3>
                            <div id="faqReturn" class="accordion-collapse collapse" data-bs-parent="#listingFaq"><div class="accordion-body">Peminjam akan menerima pengingat dan dapat menghubungi pemilik untuk menyepakati waktu pengembalian baru.</div></div>
                        </div>
                        <div class="accordion-item border-0 bg-transparent">
                            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqFee">Bisa batalkan peminjaman sewaktu-waktu?</button></h3>
                            <div id="faqFee" class="accordion-collapse collapse" data-bs-parent="#listingFaq"><div class="accordion-body">Pembatalan dapat dibicarakan langsung dengan pemilik melalui chat sebelum serah terima barang.</div></div>
                        </div>
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
                <div class="col-6 col-md-3 col-lg-2"><h2 class="footer-title">Tautan Cepat</h2><div class="footer-links"><a href="index.php">Beranda</a><a href="cari_barang.php">Eksplorasi Barang</a><a href="hal_profil.php">Katalog Saya</a><a href="#">Status Pengembalian</a><a href="#">Formulir Peminjaman</a></div></div>
                <div class="col-6 col-md-3 col-lg-2"><h2 class="footer-title">Kategori Populer</h2><div class="footer-links"><a href="#">Kamera &amp; Alat Visual</a><a href="#">Kalkulator Saintifik &amp; Grafis</a><a href="#">Buku Teks &amp; Diktat Kuliah</a><a href="#">Komponen Lab &amp; Elektronika</a><a href="#">Perlengkapan Presentasi &amp; Event</a></div></div>
                <div class="col-6 col-md-6 col-lg-3"><h2 class="footer-title">Panduan &amp; Keamanan</h2><div class="footer-links"><a href="#">Aturan Peminjaman Sehat</a><a href="#">Protokol Verifikasi Mahasiswa</a><a href="#">Kebijakan Ganti Rugi &amp; Rusak</a><a href="#">Hubungi Tim Kampus</a></div></div>
            </div>
            <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between gap-3 mt-4 mt-lg-5 pt-3">
                <span>© 2024 CampusShare Indonesia. Inisiatif Mahasiswa Lintas Kampus. Hak cipta dilindungi.</span>
                <div class="legal-links d-flex flex-wrap gap-3"><a href="#">Syarat &amp; Ketentuan</a><a href="#">Kebijakan Privasi</a><a href="#">Integritas Kampus</a></div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll(".tag button").forEach(function (button) {
            button.addEventListener("click", function () {
                button.closest(".tag").remove();
            });
        });

        document.getElementById("new-tag").addEventListener("keydown", function (event) {
            if (event.key !== "Enter" || !this.value.trim()) return;
            event.preventDefault();
            var tags = document.querySelectorAll("#tag-list .tag");
            if (tags.length >= 5) return;
            var tag = document.createElement("span");
            tag.className = "tag";
            tag.appendChild(document.createTextNode("#" + this.value.trim().replace(/^#+/, "")));
            var remove = document.createElement("button");
            remove.type = "button";
            remove.setAttribute("aria-label", "Hapus tag");
            remove.textContent = "×";
            remove.addEventListener("click", function () { tag.remove(); });
            tag.appendChild(remove);
            document.getElementById("new-tag").before(tag);
            this.value = "";
        });
    </script>
</body>
</html>