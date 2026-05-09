<style>
        .fas-navbar {
            background: rgba(10,10,10,0.95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--fas-border);
            padding: 0 1.5rem;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .fas-navbar .navbar-brand {
            font-family: var(--fas-font-display);
            font-size: 1.6rem;
            letter-spacing: 0.05em;
            color: var(--fas-white) !important;
            line-height: 1;
        }

        .fas-navbar .navbar-brand span {
            color: var(--fas-orange);
        }

        .fas-navbar .nav-link {
            font-family: var(--fas-font-cond);
            font-weight: 600;
            font-size: 0.9rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--fas-muted) !important;
            padding: 1.5rem 1rem !important;
            transition: color 0.2s;
            position: relative;
        }

        .fas-navbar .nav-link:hover,
        .fas-navbar .nav-link.active {
            color: var(--fas-white) !important;
        }
</style>

<nav class="navbar navbar-expand-lg fas-navbar sticky-top">
    <div class="container">
        <a class="navbar-brand me-4" href="{{ url('/') }}">FRIDAY <span>AFTER </span>SNEAKERS</a>
        <button class="navbar-toggler border-secondary" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center gap-1">
                <li class="nav-item"><a class="nav-link" href="{{ route('user.home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.katalog') }}">Katalog</a></li>
            </ul>
        </div>
    </div>
</nav>  