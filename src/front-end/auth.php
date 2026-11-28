
<?php
// PENTING: blok PHP harus di paling atas, sebelum ada output HTML apa pun
require 'config.php';

if (!empty($_SESSION['id_user'])) { header('Location: index.php'); exit; } // sudah login

const TRUST_AWAL = 50; // nilai awal trust_point untuk akun baru (silakan ubah)

$error = $errorDaftar = '';
$tab = 'masuk';
$old = ['nama' => '', 'nim' => '', 'fakultas' => '', 'email' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $aksi = $_POST['aksi'] ?? '';

    // ---------- MASUK ----------
    if ($aksi === 'masuk') {
        $email = mb_strtolower(trim($_POST['email'] ?? ''));
        $pass  = $_POST['password'] ?? '';

        if ($email === '' || $pass === '') {
            $error = 'Semua kolom wajib diisi.';
        } else {
            $st = $pdo->prepare('SELECT id_user, password FROM tabel_user WHERE email = ?');
            $st->execute([$email]);
            $row = $st->fetch();

            if ($row && password_verify($pass, $row['password'])) {   // cocokkan dengan hash di kolom password
                session_regenerate_id(true);
                $_SESSION['id_user'] = (int)$row['id_user'];
                $tujuan = $_SESSION['redirect_after_login'] ?? 'index.php';
                unset($_SESSION['redirect_after_login']);
                header('Location: ' . $tujuan);
                exit;
            }
            $error = 'Email atau kata sandi salah.';
        }
    }

    // ---------- DAFTAR ----------
    elseif ($aksi === 'daftar') {
        $tab = 'daftar';
        $old = [
            'nama'     => trim($_POST['nama'] ?? ''),
            'nim'      => trim($_POST['nim'] ?? ''),
            'fakultas' => trim($_POST['fakultas'] ?? ''),
            'email'    => mb_strtolower(trim($_POST['email'] ?? '')),
        ];
        $pass = $_POST['password'] ?? '';

        if (in_array('', $old, true) || $pass === '') {
            $errorDaftar = 'Semua kolom wajib diisi.';
        } elseif (mb_strlen($old['nama']) > 100 || mb_strlen($old['nim']) > 20
               || mb_strlen($old['fakultas']) > 50 || mb_strlen($old['email']) > 100) {
            $errorDaftar = 'Ada isian yang terlalu panjang.';
        } elseif (!filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
            $errorDaftar = 'Format email tidak valid.';
        // } elseif (!str_ends_with($old['email'], 'ac.id')) {
        //     $errorDaftar = 'Gunakan email kampus (berakhiran .ac.id).';
        } elseif (strlen($pass) < 8) {
            $errorDaftar = 'Kata sandi minimal 8 karakter.';
        } else {
            $cek = $pdo->prepare('SELECT 1 FROM tabel_user WHERE email = ? OR nim = ?');
            $cek->execute([$old['email'], $old['nim']]);
            if ($cek->fetch()) {
                $errorDaftar = 'Email atau NIM sudah terdaftar. Silakan masuk.';
            } else {
                try {
                    $pdo->prepare('INSERT INTO tabel_user (nama, nim, email, password, fakultas, dir_foto_profil, trust_point)
                                   VALUES (?, ?, ?, ?, ?, ?, ?)')
                        ->execute([$old['nama'], $old['nim'], $old['email'],
                                   password_hash($pass, PASSWORD_DEFAULT), $old['fakultas'], 'img/people/user-icon.png', TRUST_AWAL]);
                    session_regenerate_id(true);
                    $_SESSION['id_user'] = (int)$pdo->lastInsertId();
                    header('Location: index.php');
                    exit;
                } catch (PDOException $ex) {
                    $errorDaftar = 'Pendaftaran gagal, silakan coba lagi.';
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pantau status peminjaman dan pengembalian barang di CampusShare.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
      <title>Masuk — CampusShare</title>
      <style>
        :root{
          --biru:#2563EB; --biru-tua:#1D4ED8; --biru-muda:#DBEAFE;
          --hijau:#22C55E; --hijau-muda:#DCFCE7;
          --merah:#EF4444; --merah-muda:#FEE2E2;
          --kuning-muda:#FEF3C7;
          --abu-bg:#F3F4F6; --abu-garis:#E5E7EB; --abu-teks:#6B7280;
          --gelap:#111827; --radius:14px;
          --shadow:0 1px 3px rgba(0,0,0,.08),0 4px 16px rgba(0,0,0,.06);
        }
        *{margin:0;padding:0;box-sizing:border-box}
        body{font-family:"Segoe UI",system-ui,-apple-system,Roboto,sans-serif;background:var(--abu-bg);color:var(--gelap);line-height:1.55}
        .hidden{display:none!important}
        button{font-family:inherit;cursor:pointer;border:none}
        input,select,textarea{font-family:inherit;font-size:14px;width:100%;padding:11px 14px;border:1.5px solid var(--abu-garis);border-radius:10px;background:#fff;outline:none;transition:border .15s}
        input:focus,select:focus,textarea:focus{border-color:var(--biru)}
        label{display:block;font-size:13px;font-weight:600;margin:14px 0 6px 2px;color:#374151}
        h2{font-size:21px;margin-bottom:16px}
        h3{font-size:17px}
        .text-muted{color:var(--abu-teks);font-size:13px}

        /* ====== TOMBOL ====== */
        .btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;padding:11px 20px;border-radius:10px;font-weight:700;font-size:14px;transition:filter .15s,transform .05s}
        .btn:active{transform:scale(.98)}
        .btn:disabled{opacity:.5;cursor:not-allowed}
        .btn-primary{background:var(--biru);color:#fff}.btn-primary:hover{background:var(--biru-tua)}
        .btn-success{background:var(--hijau);color:#fff}.btn-success:hover{filter:brightness(.95)}
        .btn-danger{background:var(--merah);color:#fff}.btn-danger:hover{filter:brightness(.95)}
        .btn-outline{background:#fff;color:var(--biru);border:1.5px solid var(--biru)}
        .btn-ghost{background:transparent;color:var(--abu-teks)}.btn-ghost:hover{background:var(--abu-bg)}
        .btn-light{background:#fff;color:var(--biru)}
        .btn-sm{padding:7px 14px;font-size:13px;border-radius:8px}
        .btn-block{width:100%}

        /* ====== BADGE ====== */
        .badge{display:inline-flex;align-items:center;gap:5px;font-size:12px;font-weight:700;padding:3px 10px;border-radius:99px}
        .badge.tersedia{background:var(--hijau-muda);color:#15803D}
        .badge.dipinjam{background:var(--merah-muda);color:#B91C1C}
        .badge.menunggu{background:var(--kuning-muda);color:#B45309}
        .badge.selesai{background:var(--biru-muda);color:var(--biru-tua)}
        .badge.netral{background:var(--abu-bg);color:#374151}
        .badges-row{display:flex;gap:8px;flex-wrap:wrap;margin:10px 0 6px}
        .stars{color:#F59E0B;letter-spacing:2px}
        .stars .off{color:#D1D5DB}
        .verified{background:var(--hijau);color:#fff;border-radius:50%;width:17px;height:17px;display:inline-flex;align-items:center;justify-content:center;font-size:10px;vertical-align:middle}

        /* ====== NAVBAR ====== */
        .nav{position:sticky;top:0;z-index:50;background:#fff;border-bottom:1px solid var(--abu-garis);padding:0 22px;display:flex;align-items:center;gap:8px;height:60px}
        .nav-logo{font-weight:800;font-size:17px;color:var(--biru);display:flex;align-items:center;gap:7px;cursor:pointer;background:none}
        .nav-links{display:flex;gap:4px;margin-left:24px}
        .nav-link{padding:8px 14px;border-radius:10px;color:var(--abu-teks);font-weight:600;font-size:14px;background:none;cursor:pointer}
        .nav-link:hover{background:var(--abu-bg);color:var(--gelap)}
        .nav-link.active{background:var(--biru-muda);color:var(--biru)}
        .nav-right{margin-left:auto;display:flex;align-items:center;gap:10px}
        .nav-user{display:flex;align-items:center;gap:8px;background:none;border-radius:10px;padding:4px 8px;cursor:pointer}
        .nav-user:hover{background:var(--abu-bg)}
        .avatar{width:36px;height:36px;border-radius:50%;background:var(--biru);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:14px;flex-shrink:0}
        .avatar-sm{width:28px;height:28px;font-size:12px}
        .avatar-big{width:64px;height:64px;font-size:24px}

        .container{max-width:1100px;margin:0 auto;padding:24px 20px}
        .footer{text-align:center;color:var(--abu-teks);font-size:13px;padding:28px 0 34px}

        /* ====== HERO & STAT ====== */
        .hero{background:linear-gradient(120deg,#1E40AF,#2563EB);border-radius:20px;color:#fff;padding:34px 32px}
        .hero h1{font-size:24px}
        .hero p{opacity:.92;font-size:14.5px;margin:4px 0 18px}
        .hero-search{display:flex;gap:10px;max-width:560px}
        .hero-search input{flex:1;border:none}
        .stats{display:grid;grid-template-columns:repeat(auto-fit,minmax(150px,1fr));gap:14px;margin:18px 0 8px}
        .stat{background:#fff;border:1px solid var(--abu-garis);border-radius:var(--radius);padding:16px}
        .stat-num{font-size:26px;font-weight:800;color:var(--biru)}
        .stat-label{font-size:13px;color:var(--abu-teks)}

        .section-title{display:flex;align-items:center;justify-content:space-between;margin:28px 0 14px}
        .section-title .link{background:none;color:var(--biru);font-weight:700;font-size:14px;cursor:pointer}
        .notif-count{background:var(--merah);color:#fff;border-radius:99px;font-size:12px;padding:1px 9px}

        /* ====== LOGIN ====== */
        .login-wrap{min-height:100vh;display:grid;grid-template-columns:1fr 1fr}
        .login-left{background:linear-gradient(160deg,#1E40AF,#2563EB 85%,#3B82F6);color:#fff;padding:56px;display:flex;flex-direction:column;justify-content:center}
        .login-left h1{font-size:30px;max-width:430px;margin-bottom:10px} 
        .login-left p{opacity:.92;max-width:400px}
        .brand{font-size:22px;font-weight:800;display:flex;gap:8px;align-items:center;margin-bottom:28px}
        .login-points{list-style:none;margin:26px 0;display:flex;flex-direction:column;gap:10px;font-size:15px}
        .login-emoji{font-size:32px;letter-spacing:8px;margin-top:32px;opacity:.85}
        .login-right{display:flex;align-items:center;justify-content:center;padding:40px;background:#fff}
        .login-form{width:100%;max-width:380px}
        .login-tabs{display:flex;background:var(--abu-bg);border-radius:10px;padding:4px;margin-bottom:6px}
        .login-tab{flex:1;padding:9px;border-radius:8px;border:none;background:none;font-weight:700;color:var(--abu-teks);cursor:pointer}
        .login-tab.active{background:#fff;color:var(--biru);box-shadow:0 1px 2px rgba(0,0,0,.08)}
        .lg-err{color:var(--merah);font-size:13px;min-height:20px;margin:6px 0 10px;font-weight:600}
        .login-note{font-size:12px;color:var(--abu-teks);text-align:center;margin-top:12px}
        .login-form .btn{margin-top:6px}

        /* ====== RESPONSIVE ====== */
        @media(max-width:860px){
          .login-left{display:none}
          .login-wrap{grid-template-columns:1fr}
          .detail-grid{grid-template-columns:1fr}
          .detail-thumb{height:210px;font-size:90px}
          .form-2col{grid-template-columns:1fr}
          .filter-bar{grid-template-columns:1fr 1fr}
          .filter-bar input{grid-column:1/-1}
        }
        @media(max-width:640px){
          .nav-txt,.nav-nama{display:none}
          .nav-links{margin-left:6px}
          .nav-link{padding:8px 10px}
          .hero{padding:24px 20px}
          .loan-card{flex-wrap:wrap}
          .stats{grid-template-columns:repeat(2,1fr)}
          .chat-layout.ada-chat{grid-template-columns:1fr}
          .chat-layout.ada-chat .chat-list{display:none}
          .chat-layout:not(.ada-chat) .chat-main{display:none}
          .chat-back{display:inline-flex}
        }
      </style>
      <!--
      <script src="data.js" defer></script>
      <script src="utils.js" defer></script> 
      <script src="login-scr.js" defer></script> -->
      
</head>
<body>
    <div id="login-screen" class="login-wrap">
      <div class="login-left">
        <div class="brand">
          <a class="navbar-brand d-flex align-items-center gap-3 me-lg-3" href="index.php" aria-label="CampusShare Beranda">
            <img class="brand-logo" src="img/CampusShare%20Logo.png" style="width: 100%; height: 100%; margin-top: 0; padding-top: 0;" alt="CampusShare">
          </a>
        </div>
        <br>
        <h1 style="font-family: 'Plus Jakarta Sans', sans-serif; font-weight:700;">Pinjam barang dengan mudah sesama mahasiswa.</h1>
        <p style="font-family: 'Plus Jakarta Sans', sans-serif; font-weight:300;">Hemat pengeluaran, kurangi barang menumpuk, dan bantu teman satu kampusmu.</p>
        <ul class="login-points" style="font-family: 'Plus Jakarta Sans', sans-serif; font-weight:300;">
          <li>✅ Identitas mahasiswa terverifikasi</li>
          <li>✅ Kondisi &amp; durasi peminjaman jelas</li>
          <li>✅ Rating dan ulasan transparan</li>
        </ul>
        <div class="login-emoji">🎒 💻 🧮 🏸 📷</div>
      </div>

      <div class="login-right">
        <div class="login-form" style="margin-top:180px;">
          <div class="login-tabs">
            <button type="button" class="login-tab <?= $tab === 'masuk' ? 'active' : '' ?>" id="tab-masuk" onclick="loginTab('masuk')">Masuk</button>
            <button type="button" class="login-tab <?= $tab === 'daftar' ? 'active' : '' ?>" id="tab-daftar" onclick="loginTab('daftar')">Daftar</button>
          </div>

          <!-- FORM MASUK -->
          <form method="post" id="form-masuk" class="<?= $tab === 'masuk' ? '' : 'hidden' ?>" style="width: 100%; height: 550px; justify-content: center; align-items: center;">
            <input type="hidden" name="aksi" value="masuk">
            <label for="lg-email">Email</label>
            <input id="lg-email" name="email" type="email" placeholder="nama@student.ac.id" autocomplete="email" required>
            <label for="lg-pass">Kata Sandi</label>
            <input id="lg-pass" name="password" type="password" placeholder="Kata sandi..." autocomplete="current-password" required>
            <div class="lg-err" id="lg-err"><?= e($error) ?></div>
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
          </form>

          <!-- FORM DAFTAR -->
          <form method="post" id="form-daftar" class="<?= $tab === 'daftar' ? '' : 'hidden' ?>" style="width: 100%; height: 550px; justify-content: center; align-items: center;">
            <input type="hidden" name="aksi" value="daftar">
            <label for="rg-nama">Nama Lengkap</label>
            <input id="rg-nama" name="nama" maxlength="100" placeholder="Nama lengkap..." value="<?= e($old['nama']) ?>" required>
            <label for="rg-nim">NIM</label>
            <input id="rg-nim" name="nim" maxlength="20" placeholder="NIM..." value="<?= e($old['nim']) ?>" required>
            <label for="rg-fak">Fakultas</label>
            <input id="rg-fak" name="fakultas" maxlength="50" placeholder="Masukkan nama fakultas Anda..." value="<?= e($old['fakultas']) ?>" required>
            <label for="rg-email">Email</label>
            <input id="rg-email" name="email" type="email" maxlength="100" placeholder="E-mail..." autocomplete="email" value="<?= e($old['email']) ?>" required>
            <label for="rg-pass">Kata Sandi</label>
            <input id="rg-pass" name="password" type="password" minlength="8" placeholder="Minimal 8 karakter..." autocomplete="new-password" required>
            <div class="lg-err" id="rg-err"><?= e($errorDaftar) ?></div>
            <button type="submit" class="btn btn-primary btn-block">Buat Akun</button>
          </form>
        </div>
      </div>
    </div>

    <script>
      // Hanya untuk berpindah tab tampilan; login & pendaftaran diproses server (PHP)
      function loginTab(m){
        document.getElementById("tab-masuk").classList.toggle("active", m === "masuk");
        document.getElementById("tab-daftar").classList.toggle("active", m === "daftar");
        document.getElementById("form-masuk").classList.toggle("hidden", m !== "masuk");
        document.getElementById("form-daftar").classList.toggle("hidden", m !== "daftar");
      }
    </script>
</body>
</html>