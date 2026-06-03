<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Inventarisasi Aset BMN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Icon Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary: #2563eb;
            --secondary: #14b8a6;
            --dark: #0f172a;
            --muted: #64748b;
            --border: #e2e8f0;
            --soft-blue: #eff6ff;
            --soft-green: #ecfdf5;
            --soft-yellow: #fffbeb;
            --soft-red: #fef2f2;
        }

        body {
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, rgba(37, 99, 235, .18), transparent 35%),
                radial-gradient(circle at top right, rgba(20, 184, 166, .18), transparent 30%),
                linear-gradient(135deg, #f8fafc, #eef6ff);
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            color: var(--dark);
        }

        .navbar-custom {
            background: rgba(15, 23, 42, .93);
            backdrop-filter: blur(14px);
            box-shadow: 0 12px 30px rgba(15, 23, 42, .18);
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: inline-flex;
            justify-content: center;
            align-items: center;
            color: white;
            margin-right: 10px;
        }

        .page-wrapper {
            padding: 34px 0 50px;
        }

        .hero-card,
        .content-card,
        .stat-card,
        .form-card,
        .detail-card {
            background: rgba(255, 255, 255, .92);
            border: 1px solid rgba(226, 232, 240, .95);
            border-radius: 26px;
            box-shadow: 0 20px 45px rgba(15, 23, 42, .08);
        }

        .hero-card {
            padding: 30px;
            position: relative;
            overflow: hidden;
        }

        .hero-card::after {
            content: "";
            position: absolute;
            right: -90px;
            top: -90px;
            width: 260px;
            height: 260px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(37, 99, 235, .22), rgba(20, 184, 166, .22));
        }

        .hero-title {
            font-weight: 850;
            letter-spacing: -.04em;
            font-size: clamp(1.7rem, 3vw, 2.5rem);
            margin-bottom: 8px;
        }

        .hero-subtitle {
            color: var(--muted);
            max-width: 720px;
            margin-bottom: 0;
        }

        .btn-main {
            border: none;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            font-weight: 700;
            border-radius: 14px;
            padding: .75rem 1rem;
            box-shadow: 0 14px 28px rgba(37, 99, 235, .25);
        }

        .btn-main:hover {
            color: white;
            transform: translateY(-1px);
        }

        .btn-soft {
            border: 1px solid var(--border);
            background: white;
            color: var(--dark);
            font-weight: 700;
            border-radius: 14px;
            padding: .7rem 1rem;
        }

        .btn-soft:hover {
            background: var(--soft-blue);
            color: var(--primary);
        }

        .stat-card {
            padding: 22px;
            height: 100%;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
        }

        .icon-blue {
            background: var(--soft-blue);
            color: #2563eb;
        }

        .icon-green {
            background: var(--soft-green);
            color: #059669;
        }

        .icon-yellow {
            background: var(--soft-yellow);
            color: #b45309;
        }

        .icon-red {
            background: var(--soft-red);
            color: #dc2626;
        }

        .stat-number {
            font-weight: 850;
            font-size: 2rem;
            margin-bottom: 0;
        }

        .stat-label {
            color: var(--muted);
            font-size: .9rem;
            font-weight: 700;
            margin-bottom: 0;
        }

        .content-card,
        .form-card,
        .detail-card {
            overflow: hidden;
        }

        .card-topbar {
            padding: 22px 24px;
            border-bottom: 1px solid var(--border);
            background: linear-gradient(135deg, rgba(239, 246, 255, .95), rgba(236, 254, 255, .7));
        }

        .card-body-custom {
            padding: 24px;
        }

        .filter-box {
            border: 1px solid var(--border);
            border-radius: 22px;
            padding: 18px;
            background: white;
        }

        .form-control,
        .form-select {
            border-radius: 14px;
            padding: .78rem .9rem;
            border-color: var(--border);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: rgba(37, 99, 235, .5);
            box-shadow: 0 0 0 .2rem rgba(37, 99, 235, .12);
        }

        .form-label {
            font-weight: 750;
            color: #334155;
        }

        .table-modern {
            border-collapse: separate;
            border-spacing: 0 10px;
            margin-bottom: 0;
        }

        .table-modern thead th {
            color: #64748b;
            font-size: .78rem;
            text-transform: uppercase;
            letter-spacing: .08em;
            border: none;
            padding: 10px 14px;
        }

        .table-modern tbody tr {
            background: white;
            box-shadow: 0 10px 20px rgba(15, 23, 42, .05);
        }

        .table-modern tbody td {
            padding: 16px 14px;
            border-top: 1px solid #eef2f7;
            border-bottom: 1px solid #eef2f7;
            vertical-align: middle;
        }

        .table-modern tbody td:first-child {
            border-left: 1px solid #eef2f7;
            border-radius: 16px 0 0 16px;
        }

        .table-modern tbody td:last-child {
            border-right: 1px solid #eef2f7;
            border-radius: 0 16px 16px 0;
        }

        .asset-code {
            background: #f1f5f9;
            color: #0f172a;
            border-radius: 10px;
            padding: .35rem .55rem;
            font-size: .83rem;
            font-weight: 800;
        }

        .badge-status {
            border-radius: 999px;
            padding: .45rem .7rem;
            font-weight: 800;
            font-size: .78rem;
            display: inline-flex;
            align-items: center;
        }

        .status-good {
            background: #dcfce7;
            color: #166534;
        }

        .status-light {
            background: #fef3c7;
            color: #92400e;
        }

        .status-heavy {
            background: #fee2e2;
            color: #991b1b;
        }

        .badge-category {
            background: #eff6ff;
            color: #1d4ed8;
            border-radius: 999px;
            padding: .45rem .7rem;
            font-weight: 800;
            font-size: .78rem;
        }

        .action-btn {
            width: 38px;
            height: 38px;
            border-radius: 13px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
        }

        .detail-list {
            display: grid;
            gap: 14px;
        }

        .detail-item {
            display: grid;
            grid-template-columns: 230px 1fr;
            gap: 18px;
            padding: 18px;
            border: 1px solid var(--border);
            border-radius: 18px;
            background: white;
        }

        .detail-label {
            color: var(--muted);
            font-weight: 800;
        }

        .detail-value {
            font-weight: 800;
            color: var(--dark);
        }

        .alert {
            border-radius: 18px;
            border: none;
        }

        @media (max-width: 768px) {
            .detail-item {
                grid-template-columns: 1fr;
            }

            .card-body-custom {
                padding: 18px;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center fw-bold" href="{{ route('aset-bmn.index') }}">
            <span class="brand-icon">
                <i class="bi bi-building-gear"></i>
            </span>
            Inventaris Aset BMN
        </a>
    </div>
</nav>

<main class="page-wrapper">
    <div class="container">
        @yield('content')
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>