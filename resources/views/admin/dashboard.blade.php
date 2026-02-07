@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.8;
            }
        }

        .dashboard-header {
            margin-bottom: 2rem;
            animation: fadeInUp 0.5s ease;
        }

        .dashboard-header h1 {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #0c1e35 0%, #B8941F 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .dashboard-header p {
            color: #6b7280;
            font-size: 1.1rem;
        }


        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.25rem;
            margin-bottom: 2rem;
        }

        @media (max-width: 1200px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        .stat-card-modern {
            background: white;
            border-radius: 16px;
            padding: 1.75rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            animation: fadeInUp 0.6s ease;
            animation-fill-mode: both;
        }

        .stat-card-modern:nth-child(1) {
            animation-delay: 0.1s;
        }

        .stat-card-modern:nth-child(2) {
            animation-delay: 0.2s;
        }

        .stat-card-modern:nth-child(3) {
            animation-delay: 0.3s;
        }

        .stat-card-modern:nth-child(4) {
            animation-delay: 0.4s;
        }

        .stat-card-modern:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }

        .stat-card-modern::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            opacity: 0.1;
            transition: all 0.3s ease;
        }

        .stat-card-modern:hover::before {
            transform: scale(1.2);
        }

        .stat-card-modern.blue::before {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        }

        .stat-card-modern.green::before {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }

        .stat-card-modern.purple::before {
            background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
        }

        .stat-card-modern.gold::before {
            background: linear-gradient(135deg, #B8941F 0%, #9C7A1A 100%);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            color: white;
            margin-bottom: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .stat-icon.blue {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        }

        .stat-icon.green {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }

        .stat-icon.purple {
            background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
        }

        .stat-icon.gold {
            background: linear-gradient(135deg, #B8941F 0%, #9C7A1A 100%);
        }

        .stat-value-modern {
            font-size: 2.5rem;
            font-weight: 800;
            color: #1f2937;
            line-height: 1;
            margin-bottom: 0.5rem;
        }

        .stat-label-modern {
            color: #6b7280;
            font-size: 0.95rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-change {
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            font-size: 0.85rem;
            font-weight: 600;
            margin-top: 0.75rem;
            padding: 0.3rem 0.7rem;
            border-radius: 20px;
        }

        .stat-change.up {
            color: #059669;
            background: #d1fae5;
        }

        .stat-change.down {
            color: #dc2626;
            background: #fee2e2;
        }

        .quick-actions {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
            animation: fadeInUp 0.7s ease;
        }

        .quick-actions h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .quick-actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .action-btn {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.5rem;
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            border: 2px solid transparent;
            border-radius: 12px;
            text-decoration: none;
            color: #1f2937;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .action-btn:hover {
            border-color: #B8941F;
            transform: translateX(5px);
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        }

        .action-btn i {
            font-size: 1.5rem;
            color: #B8941F;
        }

        .recent-section {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            animation: fadeInUp 0.8s ease;
            overflow-x: auto;
        }

        .recent-section h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .modern-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            table-layout: fixed;
        }

        .modern-table thead tr {
            background: linear-gradient(135deg, #0c1e35 0%, #1a3a5c 100%);
        }

        .modern-table thead th {
            padding: 1rem;
            text-align: left;
            color: white;
            font-weight: 600;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .modern-table thead th:first-child {
            border-top-left-radius: 12px;
            width: 10%;
        }

        .modern-table thead th:nth-child(2) {
            width: 20%;
        }

        .modern-table thead th:nth-child(3) {
            width: 25%;
        }

        .modern-table thead th:nth-child(4) {
            width: 15%;
        }

        .modern-table thead th:nth-child(5) {
            width: 15%;
        }

        .modern-table thead th:last-child {
            border-top-right-radius: 12px;
            width: 15%;
        }

        .modern-table tbody tr {
            border-bottom: 1px solid #e5e7eb;
            transition: all 0.2s ease;
        }

        .modern-table tbody tr:hover {
            background: #f9fafb;
        }

        .modern-table tbody tr:last-child {
            border-bottom: none;
        }

        .modern-table tbody td {
            padding: 1rem;
            color: #374151;
            vertical-align: middle;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .badge {
            display: inline-block;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .badge-success {
            background: #d1fae5;
            color: #065f46;
        }

        .badge-warning {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-info {
            background: #dbeafe;
            color: #1e40af;
        }
    </style>

    <div class="dashboard-header">
        <h1>Welcome Back, Haji Nisar Shah! 👋</h1>
        <p>Here's what's happening with your visa consultancy today</p>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card-modern blue">
            <div class="stat-icon blue">
                <i class="fas fa-envelope-open-text"></i>
            </div>
            <div class="stat-value-modern">{{ $stats['inquiries'] }}</div>
            <div class="stat-label-modern">Total Inquiries</div>
            <div class="stat-change up">
                <i class="fas fa-arrow-up"></i> 12% from last month
            </div>
        </div>

        <div class="stat-card-modern green">
            <div class="stat-icon green">
                <i class="fas fa-concierge-bell"></i>
            </div>
            <div class="stat-value-modern">{{ $stats['services'] }}</div>
            <div class="stat-label-modern">Active Services</div>
            <div class="stat-change up">
                <i class="fas fa-check-circle"></i> All systems go
            </div>
        </div>

        <div class="stat-card-modern purple">
            <div class="stat-icon purple">
                <i class="fas fa-globe-americas"></i>
            </div>
            <div class="stat-value-modern">{{ $stats['countries'] }}</div>
            <div class="stat-label-modern">Countries Served</div>
            <div class="stat-change up">
                <i class="fas fa-arrow-up"></i> 2 new added
            </div>
        </div>

        <div class="stat-card-modern gold">
            <div class="stat-icon gold">
                <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="stat-value-modern">{{ $stats['pending_reviews'] }}</div>
            <div class="stat-label-modern">Pending Reviews</div>
            @if($stats['pending_reviews'] > 0)
                <div class="stat-change down">
                    <i class="fas fa-clock"></i> Needs attention
                </div>
            @else
                <div class="stat-change up">
                    <i class="fas fa-check"></i> All caught up!
                </div>
            @endif
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="quick-actions">
        <h2><i class="fas fa-bolt"></i> Quick Actions</h2>
        <div class="quick-actions-grid">
            <a href="{{ route('admin.services.create') }}" class="action-btn">
                <i class="fas fa-plus-circle"></i>
                <span>Add Service</span>
            </a>
            <a href="{{ route('admin.countries.create') }}" class="action-btn">
                <i class="fas fa-flag"></i>
                <span>Add Country</span>
            </a>
            <a href="{{ route('admin.team.index') }}" class="action-btn">
                <i class="fas fa-users"></i>
                <span>Manage Team</span>
            </a>
            <a href="{{ route('admin.packages.index') }}" class="action-btn">
                <i class="fas fa-box"></i>
                <span>Edit Packages</span>
            </a>
            <a href="{{ route('admin.settings.homepage') }}" class="action-btn">
                <i class="fas fa-paint-brush"></i>
                <span>Homepage Settings</span>
            </a>
            <a href="{{ route('admin.reviews.index') }}" class="action-btn">
                <i class="fas fa-star"></i>
                <span>Review Reviews</span>
            </a>
        </div>
    </div>

    <!-- Recent Inquiries -->
    <div class="recent-section">
        <h2><i class="fas fa-history"></i> Recent Inquiries</h2>
        <table class="modern-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Client Name</th>
                    <th>Email</th>
                    <th>Visa Type</th>
                    <th>Destination</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($latestInquiries as $inquiry)
                    <tr>
                        <td>
                            <strong>{{ $inquiry->created_at->format('M d') }}</strong>
                            <br>
                            <small style="color: #9ca3af;">{{ $inquiry->created_at->format('Y') }}</small>
                        </td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                <div
                                    style="width: 40px; height: 40px; border-radius: 50%; background: linear-gradient(135deg, #B8941F 0%, #9C7A1A 100%); display: flex; align-items: center; justify-content: center; color: white; font-weight: 700;">
                                    {{ strtoupper(substr($inquiry->name, 0, 1)) }}
                                </div>
                                <strong>{{ $inquiry->name }}</strong>
                            </div>
                        </td>
                        <td>{{ $inquiry->email }}</td>
                        <td><span class="badge badge-info">{{ $inquiry->visa_type ?? 'General' }}</span></td>
                        <td><span class="badge badge-warning">{{ $inquiry->country_of_interest ?? 'N/A' }}</span></td>
                        <td><span class="badge badge-success">New</span></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 3rem; color: #9ca3af;">
                            <i class="fas fa-inbox" style="font-size: 3rem; margin-bottom: 1rem; display: block;"></i>
                            <strong>No inquiries yet</strong>
                            <br>
                            <small>New inquiries will appear here</small>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if($latestInquiries->count() > 0)
            <div style="margin-top: 1.5rem; text-align: center;">
                <a href="{{ route('admin.inquiries.index') }}"
                    style="color: #B8941F; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 0.5rem;">
                    View All Inquiries <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        @endif
    </div>
@endsection