<?php
require_once 'includes/auth.php';
require_once 'includes/db.php';

if (isLoggedIn()) { header('Location: index.php'); exit; }

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama     = trim($_POST['nama'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $noTelp   = trim($_POST['no_telepon'] ?? '');
    $password = $_POST['password'] ?? '';
    $konfirm  = $_POST['konfirmasi'] ?? '';

    if (!$nama || !$email || !$password || !$konfirm) {
        $error = 'Mohon lengkapi semua field yang wajib diisi.';
    } elseif ($password !== $konfirm) {
        $error = 'Password dan konfirmasi password tidak cocok.';
    } elseif (strlen($password) < 8) {
        $error = 'Password minimal 8 karakter.';
    } else {
        // Cek email duplikat
        $cek = $conn->prepare("SELECT users_id FROM users WHERE email = ?");
        $cek->bind_param('s', $email);
        $cek->execute();
        if ($cek->get_result()->num_rows > 0) {
            $error = 'Email sudah terdaftar. Silakan gunakan email lain.';
        } else {
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $ins = $conn->prepare("INSERT INTO users (nama_lengkap, email, no_telepon, password, role) VALUES (?,?,?,?,'pelanggan')");
            $ins->bind_param('ssss', $nama, $email, $noTelp, $hash);
            if ($ins->execute()) {
                $success = 'Akun berhasil dibuat! Silakan login.';
            } else {
                $error = 'Terjadi kesalahan. Coba lagi.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar | Friday After Sneakers</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow:wght@400;500;600&family=Barlow+Condensed:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root { --fas-black:#0a0a0a;--fas-dark:#111;--fas-surface:#1a1a1a;--fas-border:#2a2a2a;--fas-orange:#FF5C00;--fas-white:#F5F5F0;--fas-muted:#888; }
        body { background:var(--fas-black);color:var(--fas-white);font-family:'Barlow',sans-serif;min-height:100vh;display:flex;align-items:center;justify-content:center;padding:2rem; }
        .auth-card { width:100%;max-width:520px; }
        .auth-brand { font-family:'Bebas Neue',sans-serif;font-size:1.6rem;letter-spacing:.05em;text-decoration:none;color:var(--fas-white); }
        .auth-brand span { color:var(--fas-orange); }
        .auth-title { font-family:'Bebas Neue',sans-serif;font-size:2.5rem;letter-spacing:.02em;margin-bottom:.3rem; }
        .field-label { font-family:'Barlow Condensed',sans-serif;font-size:.75rem;font-weight:700;letter-spacing:.15em;text-transform:uppercase;color:var(--fas-muted);margin-bottom:.4rem;display:block; }
        .fas-input { background:var(--fas-surface);border:1px solid var(--fas-border);border-radius:0;color:var(--fas-white);font-family:'Barlow',sans-serif;padding:.8rem 1rem;width:100%;transition:border-color .2s; }
        .fas-input:focus { outline:none;border-color:var(--fas-orange);background:var(--fas-surface);color:var(--fas-white);box-shadow:0 0 0 2px rgba(255,92,0,.15); }
        .fas-input::placeholder { color:var(--fas-muted); }
        .btn-fas-orange { background:var(--fas-orange);color:#fff;font-family:'Barlow Condensed',sans-serif;font-weight:700;font-size:.9rem;letter-spacing:.1em;text-transform:uppercase;border:none;border-radius:0;padding:.85rem 1.4rem;width:100%;transition:background .2s; }
        .btn-fas-orange:hover { background:#ff8a3d;color:#fff; }
        .fas-alert-err { border:none;border-left:3px solid #dc3545;background:rgba(220,53,69,.12);color:#ea868f;border-radius:0;padding:.8rem 1rem;font-size:.9rem;margin-bottom:1.5rem; }
        .fas-alert-ok  { border:none;border-left:3px solid #198754;background:rgba(25,135,84,.12);color:#75c49a;border-radius:0;padding:.8rem 1rem;font-size:.9rem;margin-bottom:1.5rem; }
    </style>
</head>
<body>
<div class="auth-card">
    <div class="mb-4">
        <a href="index.php" class="auth-brand">FRIDAY<span>AFTER</span>SNEAKERS</a>
    </div>

    <div class="auth-title">DAFTAR</div>
    <p style="color:var(--fas-muted);font-size:.9rem;margin-bottom:2rem;">
        Sudah punya akun?
        <a href="/login.php" style="color:var(--fas-orange);text-decoration:none;">Masuk di sini</a>
    </p>

    <?php if ($error): ?>
    <div class="fas-alert-err"><i class="bi bi-exclamation-circle me-2"></i><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <?php if ($success): ?>
    <div class="fas-alert-ok"><i class="bi bi-check-circle me-2"></i><?= htmlspecialchars($success) ?>
        <a href="/login.php" style="color:#75c49a;font-weight:600;"> Klik di sini untuk login.</a>
    </div>
    <?php endif; ?>

    <?php if (!$success): ?>
    <form method="POST">
        <div class="mb-3">
            <label class="field-label">Nama Lengkap <span style="color:var(--fas-orange)">*</span></label>
            <input class="fas-input" type="text" name="nama" required
                   placeholder="Nama lengkapmu" value="<?= htmlspecialchars($_POST['nama'] ?? '') ?>">
        </div>
        <div class="mb-3">
            <label class="field-label">Email <span style="color:var(--fas-orange)">*</span></label>
            <input class="fas-input" type="email" name="email" required
                   placeholder="nama@email.com" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
        </div>
        <div class="mb-3">
            <label class="field-label">No. WhatsApp</label>
            <input class="fas-input" type="tel" name="no_telepon"
                   placeholder="08xx-xxxx-xxxx (Opsional)"
                   value="<?= htmlspecialchars($_POST['no_telepon'] ?? '') ?>">
            <small style="color:var(--fas-muted);font-size:.78rem;">Digunakan untuk koordinasi pengiriman</small>
        </div>
        <div class="row g-3 mb-4">
            <div class="col-6">
                <label class="field-label">Password <span style="color:var(--fas-orange)">*</span></label>
                <input class="fas-input" type="password" name="password" required placeholder="Min 8 karakter">
            </div>
            <div class="col-6">
                <label class="field-label">Konfirmasi <span style="color:var(--fas-orange)">*</span></label>
                <input class="fas-input" type="password" name="konfirmasi" required placeholder="Ulangi password">
            </div>
        </div>
        <button type="submit" class="btn-fas-orange">
            <i class="bi bi-person-plus me-2"></i>Buat Akun
        </button>
    </form>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
