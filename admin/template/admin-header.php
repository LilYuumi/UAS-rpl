<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Ecommerce</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            background-color: #1f2937;
            color: #fff;
            transition: all 300ms ease;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar.collapsed .sidebar-text {
            display: none;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            color: #d1d5db;
            text-decoration: none;
            border-left: 3px solid transparent;
            transition: all 200ms ease;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            border-left-color: #3b82f6;
        }

        .sidebar-menu a svg {
            width: 20px;
            height: 20px;
            min-width: 20px;
            margin-right: 12px;
        }

        .topbar {
            background-color: #fff;
            border-bottom: 1px solid #e5e7eb;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .stat-card {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            transition: all 200ms ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
            border-color: #d1d5db;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .stat-icon.orders {
            background-color: #dbeafe;
            color: #0369a1;
        }

        .stat-icon.revenue {
            background-color: #dcfce7;
            color: #16a34a;
        }

        .stat-icon.users {
            background-color: #fce7f3;
            color: #be123c;
        }

        .stat-icon.visits {
            background-color: #fef3c7;
            color: #d97706;
        }

        .chart-container {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            position: relative;
        }

        .table-container {
            overflow-x: auto;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #f8f9fa;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            padding: 16px;
            text-align: left;
            font-size: 12px;
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid #f3f4f6;
            color: #374151;
            font-size: 14px;
        }

        tbody tr:hover {
            background-color: #f9fafb;
        }

        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge.completed {
            background-color: #d1fae5;
            color: #065f46;
        }

        .badge.pending {
            background-color: #fee2e2;
            color: #7f1d1d;
        }

        .badge.processing {
            background-color: #dbeafe;
            color: #0c2d6b;
        }

        .product-grid {
            display: grid;
            gap: 20px;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        }

        .product-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
            transition: all 200ms ease;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        }

        .product-img {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            color: #d1d5db;
        }

        .product-info {
            padding: 16px;
        }

        .mobile-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 40;
            transition: opacity 300ms ease;
        }

        .mobile-overlay.active {
            display: block;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            margin-top: 8px;
            z-index: 50;
            min-width: 180px;
        }

        .dropdown-menu.active {
            display: block;
        }

        .dropdown-menu a,
        .dropdown-menu button {
            display: block;
            width: 100%;
            padding: 12px 16px;
            text-align: left;
            border: none;
            background: none;
            cursor: pointer;
            color: #374151;
            font-size: 14px;
            transition: background-color 200ms ease;
        }

        .dropdown-menu a:first-child,
        .dropdown-menu button:first-child {
            border-radius: 8px 8px 0 0;
        }

        .dropdown-menu a:last-child,
        .dropdown-menu button:last-child {
            border-radius: 0 0 8px 8px;
        }

        .dropdown-menu a:hover,
        .dropdown-menu button:hover {
            background-color: #f3f4f6;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                left: -100% ;
                top: 0;
                height: 100vh;
                width: 280px;
                z-index: 50;
                transition: left 300ms ease;
            }

            .sidebar.mobile-open {
                left: 0;
            }

            .sidebar.collapsed {
                width: 280px;
            }

            .sidebar-text {
                display: inline !important;
            }

            .product-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }
        }

        @media (max-width: 640px) {
            .stat-card {
                padding: 16px;
            }

            th, td {
                padding: 12px;
                font-size: 13px;
            }

            .product-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>