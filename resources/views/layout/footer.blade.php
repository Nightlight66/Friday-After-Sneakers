<style>
    /* ─── FOOTER ─────────────────────────────── */
        .fas-footer {
            background: var(--fas-dark);
            border-top: 1px solid var(--fas-border);
            padding: 3rem 0 1.5rem;
        }

        .fas-footer .footer-brand {
            font-family: var(--fas-font-display);
            font-size: 2rem;
            letter-spacing: 0.05em;
            color: var(--fas-white);
        }

        .fas-footer .footer-brand span {
            color: var(--fas-orange);
        }

        .fas-footer .footer-link {
            color: var(--fas-muted);
            text-decoration: none;
            font-size: 0.88rem;
            font-family: var(--fas-font-cond);
            letter-spacing: 0.06em;
            text-transform: uppercase;
            transition: color 0.2s;
        }

        .fas-footer .footer-link:hover {
            color: var(--fas-orange);
        }

        .fas-footer .footer-heading {
            font-family: var(--fas-font-cond);
            font-weight: 700;
            font-size: 0.75rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--fas-muted);
            margin-bottom: 1rem;
        }

        .social-btn {
            width: 38px;
            height: 38px;
            border: 1px solid var(--fas-border);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--fas-muted);
            font-size: 1rem;
            text-decoration: none;
            transition: border-color 0.2s, color 0.2s;
        }

        .social-btn:hover {
            border-color: var(--fas-orange);
            color: var(--fas-orange);
        }
</style>
<footer class="fas-footer mt-5">
    <div class="container">
        <div class="row g-5 mb-5">
            <!-- Brand + Desc -->
            <div class="col-lg-4">
                <div class="footer-brand mb-3">
                    FRIDAY<span>AFTER</span>SNEAKERS
                </div>
                <p style="color:var(--fas-muted);font-size:.88rem;line-height:1.7;max-width:280px;">
                    Reseller & dropship sneakers authentic pilihan. Sudah 5 tahun melayani pecinta sepatu
                    di seluruh Indonesia dengan produk terpercaya.
                </p>
                <div class="d-flex gap-2 mt-3">
                    <a href="https://instagram.com/fridayafter.sneakers" target="_blank" class="social-btn">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://wa.me/6282143690101" target="_blank" class="social-btn">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                    <a href="https://tokopedia.com/fridayaftersneakers" target="_blank" class="social-btn">
                        <i class="bi bi-shop"></i>
                    </a>
                    <a href="https://shopee.co.id/fridayaftersneakers" target="_blank" class="social-btn">
                        <i class="bi bi-bag-heart"></i>
                    </a>
                </div>
            </div>

            <!-- Nav Links -->
            <div class="col-6 col-lg-2">
                <div class="footer-heading">Navigasi</div>
                <ul class="list-unstyled d-flex flex-column gap-2">
                    <li><a href="{{ route('user.home') }}" class="footer-link">Home</a></li>
                    <li><a href="{{ route('user.katalog') }}" class="footer-link">Katalog</a></li>
                    {{-- <li><a href="" class="footer-link">Tentang Kami</a></li>
                    <li><a href="" class="footer-link">Kontak</a></li> --}}
                </ul>
            </div>

            <!-- Akun -->
            {{-- <div class="col-6 col-lg-2">
                <div class="footer-heading">Akun</div>
                <ul class="list-unstyled d-flex flex-column gap-2">
                    <li><a href="/login.php" class="footer-link">Login</a></li>
                    <li><a href="/register.php" class="footer-link">Daftar</a></li>
                    <li><a href="/profil.php" class="footer-link">Profil</a></li>
                    <li><a href="/riwayat.php" class="footer-link">Riwayat Pesanan</a></li>
                </ul>
            </div> --}}

            <!-- Kontak -->
            <div class="col-lg-4">
                <div class="footer-heading">Hubungi Kami</div>
                <ul class="list-unstyled d-flex flex-column gap-3">
                    <li class="d-flex align-items-start gap-3">
                        <i class="bi bi-whatsapp text-success mt-1"></i>
                        <div>
                            <div style="color:var(--fas-muted);font-size:.78rem;font-family:var(--fas-font-cond);letter-spacing:.08em;text-transform:uppercase;">WhatsApp</div>
                            <a href="https://wa.me/6282143690101" target="_blank"
                               style="color:var(--fas-white);font-size:.9rem;text-decoration:none;">
                                +62 821-4369-0101
                            </a>
                        </div>
                    </li>
                    <li class="d-flex align-items-start gap-3">
                        <i class="bi bi-instagram text-danger mt-1"></i>
                        <div>
                            <div style="color:var(--fas-muted);font-size:.78rem;font-family:var(--fas-font-cond);letter-spacing:.08em;text-transform:uppercase;">Instagram</div>
                            <a href="https://instagram.com/fridayaftersneakers" target="_blank"
                               style="color:var(--fas-white);font-size:.9rem;text-decoration:none;">
                                @fridayaftersneakers
                            </a>
                        </div>
                    </li>
                    <li class="d-flex align-items-start gap-3">
                        <i class="bi bi-clock mt-1" style="color:var(--fas-orange)"></i>
                        <div>
                            <div style="color:var(--fas-muted);font-size:.78rem;font-family:var(--fas-font-cond);letter-spacing:.08em;text-transform:uppercase;">Jam Operasional</div>
                            <span style="color:var(--fas-white);font-size:.9rem;">
                                Senin – Sabtu, 09.00 – 21.00 WIB
                            </span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="fas-divider" style="margin:0 0 1.5rem;"></div>
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
            <p style="color:var(--fas-muted);font-size:.8rem;margin:0;">
                &copy; <?= date('Y') ?> Friday After Sneakers. All rights reserved.
            </p>
            <p style="color:var(--fas-muted);font-size:.8rem;margin:0;">
                Authentic. Trusted. Since 2019.
            </p>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?= $extraScript ?? '' ?>
</body>
</html>