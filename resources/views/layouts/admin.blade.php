<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - MG Visa</title>
    <!-- Use same styles as main site or a simplified version -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #0c1e35;
            --secondary-color: #c5a45b;
            --white: #ffffff;
            --gray-light: #f3f4f6;
            --text-dark: #1f2937;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: var(--gray-light);
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: var(--primary-color);
            color: white;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
        }

        .sidebar-brand {
            padding: 20px;
            font-size: 1.25rem;
            font-weight: bold;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-menu {
            flex: 1;
            padding: 20px 0;
        }

        .sidebar-menu a {
            display: block;
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-left: 4px solid var(--secondary-color);
        }

        .sidebar-menu i {
            width: 25px;
        }

        .main-content {
            margin-left: 250px;
            width: calc(100% - 250px);
            max-width: calc(100vw - 250px);
            padding: 30px;
            box-sizing: border-box;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--text-dark);
        }

        .logout-btn {
            background: none;
            border: 1px solid rgba(255, 255, 255, 0.5);
            color: white;
            padding: 5px 15px;
            border-radius: 4px;
            cursor: pointer;
        }

        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .stat-value {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary-color);
        }

        .stat-label {
            color: #6b7280;
            font-size: 0.9rem;
        }

        .recent-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .recent-table th,
        .recent-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        .recent-table th {
            background: #f9fafb;
            font-weight: 600;
            color: #374151;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <div class="sidebar-brand">
            <i class="fas fa-shield-alt"></i> Admin Panel
        </div>
        <div class="sidebar-menu">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->is('admin') ? 'active' : '' }}">
                <i class="fas fa-home"></i> Dashboard
            </a>
            <a href="{{ route('admin.team.index') }}" class="{{ request()->is('admin/team*') ? 'active' : '' }}">
                <i class="fas fa-users"></i> Team
            </a>
            <a href="{{ route('admin.services.index') }}"
                class="{{ request()->is('admin/services*') ? 'active' : '' }}">
                <i class="fas fa-concierge-bell"></i> Services
            </a>
            <a href="{{ route('admin.blogs.index') }}" class="{{ request()->is('admin/blogs*') ? 'active' : '' }}">
                <i class="fas fa-blog"></i> Blogs
            </a>
            <a href="{{ route('admin.countries.index') }}"
                class="{{ request()->is('admin/countries*') ? 'active' : '' }}">
                <i class="fas fa-globe"></i> Countries
            </a>
            <a href="{{ route('admin.reviews.index') }}" class="{{ request()->is('admin/reviews*') ? 'active' : '' }}">
                <i class="fas fa-star"></i> Reviews
            </a>
            <a href="{{ route('admin.inquiries.index') }}"
                class="{{ request()->is('admin/inquiries*') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i> Inquiries
            </a>
            <a href="{{ route('admin.packages.index') }}"
                class="{{ request()->is('admin/packages*') ? 'active' : '' }}">
                <i class="fas fa-box"></i> Packages
            </a>
            <a href="{{ route('admin.settings.homepage') }}"
                class="{{ request()->is('admin/settings/homepage') ? 'active' : '' }}">
                <i class="fas fa-home"></i> Homepage Settings
            </a>
            <a href="{{ route('admin.settings.index') }}"
                class="{{ request()->is('admin/settings') && !request()->is('admin/settings/homepage') ? 'active' : '' }}">
                <i class="fas fa-cog"></i> Site Settings
            </a>
        </div>
        <div style="padding: 20px;">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn" style="width: 100%; text-align: center;">Logout</button>
            </form>
        </div>
    </div>

    <div class="main-content">
        <div class="header">
            <h1 class="page-title">@yield('header')</h1>
            <div>Welcome, {{ Auth::user()->name }}</div>
        </div>

        @if(session('success'))
            <div style="background: #d1fae5; color: #065f46; padding: 15px; border-radius: 6px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

</body>

</html>