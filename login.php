<?php
require_once 'includes/auth.php';
require_once 'includes/db.php';

if (isLoggedIn()) { header('Location: index.php'); exit; }

$error = '';
$redirect = $_GET['redirect'] ?? '/index.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email && $password) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['users_id'];
            $_SESSION['nama']    = $user['nama_lengkap'];
            $_SESSION['email']   = $user['email'];
            $_SESSION['role']    = $user['role'];

            if ($user['role'] === 'admin') {
                header('Location: admin/index.php');
            } else {
                header('Location: ' . $redirect);
            }
            exit;
        } else {
            $error = 'Email atau password salah.';
        }
    } else {
        $error = 'Mohon isi semua field.';
    }
}

$pageTitle = 'Login';
?>
<?php
// Override header — halaman auth punya layout sendiri
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Friday After Sneakers</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow:wght@400;500;600&family=Barlow+Condensed:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --fas-black:#0a0a0a;--fas-dark:#111111;--fas-surface:#1a1a1a;
            --fas-border:#2a2a2a;--fas-orange:#FF5C00;--fas-white:#F5F5F0;--fas-muted:#888888;
        }
        body { background:var(--fas-black);color:var(--fas-white);font-family:'Barlow',sans-serif;min-height:100vh;display:flex; }
        .auth-left {
            background: var(--fas-dark);
            border-right: 1px solid var(--fas-border);
            display:flex;flex-direction:column;justify-content:space-between;
            padding:3rem;min-height:100vh;
            position:relative;overflow:hidden;
        }
        .auth-left::before {
            content:'FRIDAY\AAFTER\ASNEAKERS';
            white-space:pre;
            font-family:'Bebas Neue',sans-serif;
            font-size:clamp(4rem,8vw,8rem);
            line-height:.9;
            color:rgba(255,92,0,.07);
            position:absolute;bottom:-1rem;left:-1rem;
            letter-spacing:.02em;
        }
        .auth-brand { font-family:'Bebas Neue',sans-serif;font-size:1.8rem;letter-spacing:.05em; }
        .auth-brand span { color:var(--fas-orange); }
        .auth-right {
            display:flex;align-items:center;justify-content:center;
            padding:2rem;flex:1;
        }
        .auth-card { width:100%;max-width:420px; }
        .auth-title { font-family:'Bebas Neue',sans-serif;font-size:2.5rem;letter-spacing:.02em;margin-bottom:.3rem; }
        .auth-subtitle { color:var(--fas-muted);font-size:.9rem;margin-bottom:2rem; }
        .fas-input {
            background:var(--fas-surface);border:1px solid var(--fas-border);border-radius:0;
            color:var(--fas-white);font-family:'Barlow',sans-serif;padding:.8rem 1rem;
            width:100%;transition:border-color .2s;
        }
        .fas-input:focus { outline:none;border-color:var(--fas-orange);background:var(--fas-surface);color:var(--fas-white);box-shadow:0 0 0 2px rgba(255,92,0,.15); }
        .fas-input::placeholder { color:var(--fas-muted); }
        .field-label {
            font-family:'Barlow Condensed',sans-serif;font-size:.75rem;font-weight:700;
            letter-spacing:.15em;text-transform:uppercase;color:var(--fas-muted);margin-bottom:.4rem;display:block;
        }
        .btn-fas-orange {
            background:var(--fas-orange);color:#fff;font-family:'Barlow Condensed',sans-serif;
            font-weight:700;font-size:.9rem;letter-spacing:.1em;text-transform:uppercase;
            border:none;border-radius:0;padding:.85rem 1.4rem;width:100%;transition:background .2s;
        }
        .btn-fas-orange:hover { background:#ff8a3d;color:#fff; }
        .fas-alert {
            border:none;border-left:3px solid #dc3545;background:rgba(220,53,69,.12);
            color:#ea868f;border-radius:0;padding:.8rem 1rem;font-size:.9rem;margin-bottom:1.5rem;
        }
        .pw-toggle { cursor:pointer;color:var(--fas-muted);transition:color .2s; }
        .pw-toggle:hover { color:var(--fas-white); }
    </style>
</head>
<body>
<div class="col-lg-5 d-none d-lg-flex auth-left">
    <div>
        <a href="/index.php" class="auth-brand">FRIDAY<span>AFTER</span>SNEAKERS</a>
        <p style="color:var(--fas-muted);font-size:.9rem;margin-top:.5rem;">
            Authentic · Trusted · Since 2019
        </p>
    </div>
    <div>
        <p style="color:var(--fas-muted);font-size:.85rem;line-height:1.8;">
            "Selamat datang kembali.<br>Sneakers impianmu menunggumu."
        </p>
    </div>
</div>

<div class="col auth-right">
    <div class="auth-card">
        <!-- Mobile Brand -->
        <div class="d-lg-none mb-4">
            <a href="/index.php" class="auth-brand" style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;text-decoration:none;color:var(--fas-white);">
                FRIDAY<span style="color:var(--fas-orange);">AFTER</span>SNEAKERS
            </a>
        </div>

        <div class="auth-title">MASUK</div>
        <p class="auth-subtitle">Belum punya akun?
            <a href="/register.php" style="color:var(--fas-orange);text-decoration:none;">Daftar di sini</a>
        </p>

        <?php if ($error): ?>
        <div class="fas-alert">
            <i class="bi bi-exclamation-circle me-2"></i><?= htmlspecialchars($error) ?>
        </div>
        <?php endif; ?>

        <form method="POST">
            <input type="hidden" name="redirect" value="<?= htmlspecialchars($redirect) ?>">

            <div class="mb-3">
                <label class="field-label">Email</label>
                <input class="fas-input" type="email" name="email"
                       placeholder="nama@email.com" required
                       value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            </div>

            <div class="mb-4">
                <label class="field-label">Password</label>
                <div class="position-relative">
                    <input class="fas-input" type="password" name="password"
                           id="pwInput" placeholder="Password kamu" required
                           style="padding-right:2.8rem;">
                    <i class="bi bi-eye pw-toggle position-absolute"
                       style="right:.9rem;top:50%;transform:translateY(-50%);"
                       onclick="togglePw()"></i>
                </div>
            </div>

            <button type="submit" class="btn-fas-orange">
                <i class="bi bi-arrow-right-circle me-2"></i>Masuk
            </button>
        </form>

        <div style="height:1px;background:var(--fas-border);margin:2rem 0;"></div>

        <p style="text-align:center;color:var(--fas-muted);font-size:.85rem;">
            Butuh bantuan?
            <a href="https://wa.me/6287762951839" target="_blank"
               style="color:var(--fas-orange);text-decoration:none;">Hubungi kami</a>
        </p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function togglePw() {
    const inp = document.getElementById('pwInput');
    const ico = document.querySelector('.pw-toggle');
    if (inp.type === 'password') {
        inp.type = 'text';
        ico.className = 'bi bi-eye-slash pw-toggle position-absolute';
        ico.style.cssText = 'right:.9rem;top:50%;transform:translateY(-50%);cursor:pointer;color:var(--fas-muted);';
    } else {
        inp.type = 'password';
        ico.className = 'bi bi-eye pw-toggle position-absolute';
        ico.style.cssText = 'right:.9rem;top:50%;transform:translateY(-50%);cursor:pointer;color:var(--fas-muted);';
    }
}
</script>
</body>
</html>