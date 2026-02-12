<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - BPS Kabupaten Pasuruan</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --bps-blue: #0093DD;
            --bps-blue-dark: #0077B6;
            --bps-green: #76B82A;
            --bps-orange: #F3921E;
            --sidebar-width: 260px;
            --bg-light: #f4f7fa;
            --text-dark: #1e293b;
            --text-muted: #64748b;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background: var(--bg-light); color: var(--text-dark); display: flex; min-height: 100vh; }

        /* SIDEBAR */
        .sidebar {
            width: var(--sidebar-width);
            background: #0f172a;
            color: white;
            position: fixed;
            height: 100vh;
            transition: 0.3s;
            z-index: 1000;
        }

        .sidebar-header {
            padding: 30px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }

        .sidebar-header img { width: 60px; margin-bottom: 10px; }
        .sidebar-header h3 { font-size: 14px; letter-spacing: 1px; color: var(--bps-blue); }

        .nav-list { list-style: none; padding: 20px 0; }
        .nav-item a {
            display: flex;
            align-items: center;
            padding: 14px 25px;
            color: #94a3b8;
            text-decoration: none;
            transition: 0.3s;
            font-size: 15px;
        }

        .nav-item a:hover, .nav-item.active a {
            background: rgba(255,255,255,0.05);
            color: white;
            border-left: 4px solid var(--bps-blue);
        }

        .nav-item i { width: 30px; font-size: 18px; }

        /* MAIN SECTION */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            transition: 0.3s;
        }

        /* TOPBAR */
        .topbar {
            height: 70px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 900;
        }

        .breadcrumb { font-size: 14px; color: var(--text-muted); }
        .user-profile { display: flex; align-items: center; gap: 12px; font-size: 14px; font-weight: 600; }
        .user-profile img { width: 35px; height: 35px; border-radius: 50%; }

        /* CONTENT BODY */
        .container { padding: 30px; }

        /* CARD STYLES */
        .card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
            margin-bottom: 25px;
            border: 1px solid #e2e8f0;
        }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .sidebar { left: -260px; }
            .sidebar.show { left: 0; }
            .main-content { margin-left: 0; }
        }
    </style>
</head>
<body>

    <aside class="sidebar" id="adminSidebar">
        <div class="sidebar-header">
            <img src="{{ asset('images/bps.png') }}" alt="Logo BPS">
            <h3>ADMIN PANEL</h3>
        </div>
       <ul class="nav-list">
    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
    </li>

    <li class="nav-item {{ request()->routeIs('admin.kegiatan') ? 'active' : '' }}">
        <a href="{{ route('admin.kegiatan') }}"><i class="fas fa-camera"></i> Kelola Kegiatan</a>
    </li>

    <li class="nav-item {{ request()->routeIs('admin.target') ? 'active' : '' }}">
        <a href="{{ route('admin.target') }}"><i class="fas fa-bullseye"></i> Target Utama</a>
    </li>

    <li style="padding: 20px 25px; font-size: 11px; color: #475569; text-transform: uppercase;">External</li>
    <li class="nav-item">
        <a href="{{ route('home') }}"><i class="fas fa-external-link-alt"></i> Ke Landing Page</a>
    </li>
</ul>
    </aside>

    <div class="main-content">
        <header class="topbar">
            <div class="breadcrumb">
                <i class="fas fa-bars" id="toggleMenu" style="margin-right: 15px; cursor: pointer; color: var(--text-dark);"></i>
                Admin / <strong>Dashboard</strong>
            </div>
            <div class="user-profile">
                <span>Halo, Administrator</span>
                <img src="https://ui-avatars.com/api/?name=Admin+BPS&background=0093DD&color=fff" alt="User">
            </div>
        </header>

        <main class="container">
            @yield('admin_content')
        </main>
    </div>

    <script>
        const toggleBtn = document.getElementById('toggleMenu');
        const sidebar = document.getElementById('adminSidebar');
        
        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('show');
        });
    </script>
</body>
</html>