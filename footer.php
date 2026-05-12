<!-- ─── FOOTER ────────────────────────────────────────── -->
<footer class="fas-footer">
    <div class="container">
        <div class="row g-4 mb-4">
            <div class="col-lg-4">
                <div class="footer-brand mb-3">FRIDAY<span>AFTER</span>SNEAKERS</div>
                <p style="font-size:0.88rem;line-height:1.6;max-width:320px;">
                    Reseller & dropship sneakers authentic pilihan. Sudah 7 tahun melayani pecinta sepatu
                    di seluruh Indonesia.
                </p>
                <div class="d-flex gap-2 mt-3">
                    <a href="https://instagram.com/fridayafter.sneakers" target="_blank" class="social-btn"><i class="bi bi-instagram"></i></a>
                    <a href="https://wa.me/6287762951839" target="_blank" class="social-btn"><i class="bi bi-whatsapp"></i></a>
                    <a href="https://shopee.co.id/fridayaftersneakers" target="_blank" class="social-btn"><i class="bi bi-shop"></i></a>
                    <a href="https://tokopedia.com/fridayaftersneakers" target="_blank" class="social-btn"><i class="bi bi-bag-check-fill"></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="footer-heading">Hubungi Kami</div>
                <ul class="list-unstyled d-flex flex-column gap-3">
                    <li><i class="bi bi-whatsapp text-success me-2"></i> <a href="#" class="footer-link">+62 877-6295-1839</a></li>
                    <li><i class="bi bi-instagram text-danger me-2"></i> <a href="https://instagram.com/fridayafter.sneakers" target="_blank" class="footer-link">@fridayafter.sneakers</a></li>
                    <li><i class="bi bi-clock me-2" style="color:var(--fas-orange);"></i> Sen – Sab, 09.00 – 21.00 WIB</li>
                </ul>
            </div>
        </div>
        <div class="text-center" style="border-top:1px solid rgba(255,255,255,0.08);padding-top:1.5rem;font-size:0.8rem;">
            &copy; <?= date('Y') ?> Friday After Sneakers. All rights reserved.
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Loading Spinner -->
<div id="loadingSpinner" class="fas-spinner">
    <div class="fas-spinner-inner"></div>
</div>

<script>
    function showSpinner() {
        document.getElementById('loadingSpinner').classList.add('show');
    }
    function hideSpinner() {
        document.getElementById('loadingSpinner').classList.remove('show');
    }
    document.querySelectorAll('.load-spinner').forEach(el => {
        el.addEventListener('click', showSpinner);
    });
</script>
</body>
</html>