
<?php 

session_start(); 

error_reporting(E_ALL); ini_set('display_errors', 1);

include('../middleware/adminMiddleware.php');
include('template/admin-header.php');

?>


<body class="bg-gray-50">
    <div class="flex h-screen bg-gray-50">
        <!-- Sidebar -->
        <?php include('template/sidebar.php')?>

        <!-- Mobile Overlay -->
        <div id="mobileOverlay" class="mobile-overlay"></div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col md:ml-0 w-full">
            <!-- Topbar -->
            <header class="topbar sticky top-0 z-30">
                <div class="px-6 py-4 flex items-center justify-between">
                    <div class="flex items-center gap-4 md:hidden">
                        <button id="hamburger" class="p-2 hover:bg-gray-100 rounded-lg transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <h2 class="text-lg font-semibold text-gray-900">Dashboard</h2>
                    </div>

                    <div class="hidden md:flex flex-1 items-center gap-4">
                        <div class="relative flex-1 max-w-md">
                            <input type="text" placeholder="Search..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <svg class="absolute right-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <button class="relative p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                            </svg>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>

                        <button id="profileBtn" class="relative p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition flex items-center gap-2">
                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-semibold">
                                A
                            </div>
                            <span class="hidden sm:inline text-sm font-medium text-gray-700">Admin</span>
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                            </svg>
                        </button>

                        <!-- Profile Dropdown -->
                        <div id="profileDropdown" class="dropdown-menu">
                            <a href="#">Profile</a>
                            <a href="#">Settings</a>
                            <a href="../logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-auto">
                <div id="overviewSection" class="p-6 space-y-6 section-content">
                    <!-- Stats Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="stat-card">
                            <div class="flex items-start justify-between">
                                <div>
                                    <p class="text-sm text-gray-600 mb-1">Total Orders</p>
                                    <p class="text-3xl font-bold text-gray-900">2,543</p>
                                    <p class="text-xs text-green-600 mt-2">↑ 12% from last month</p>
                                </div>
                                <div class="stat-icon orders">📦</div>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="flex items-start justify-between">
                                <div>
                                    <p class="text-sm text-gray-600 mb-1">Revenue</p>
                                    <p class="text-3xl font-bold text-gray-900">$48,592</p>
                                    <p class="text-xs text-green-600 mt-2">↑ 8% from last month</p>
                                </div>
                                <div class="stat-icon revenue">💰</div>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="flex items-start justify-between">
                                <div>
                                    <p class="text-sm text-gray-600 mb-1">Total Users</p>
                                    <p class="text-3xl font-bold text-gray-900">18,234</p>
                                    <p class="text-xs text-green-600 mt-2">↑ 5% from last month</p>
                                </div>
                                <div class="stat-icon users">👥</div>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="flex items-start justify-between">
                                <div>
                                    <p class="text-sm text-gray-600 mb-1">Website Visits</p>
                                    <p class="text-3xl font-bold text-gray-900">94,567</p>
                                    <p class="text-xs text-green-600 mt-2">↑ 23% from last month</p>
                                </div>
                                <div class="stat-icon visits">📊</div>
                            </div>
                        </div>
                    </div>

                    <!-- Charts Row -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <div class="lg:col-span-2 chart-container">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Sales Chart</h3>
                            <canvas id="salesChart"></canvas>
                        </div>

                        <div class="chart-container">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Top Products</h3>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-900">Product A</p>
                                        <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                                            <div class="bg-blue-500 h-2 rounded-full" style="width: 75%"></div>
                                        </div>
                                    </div>
                                    <p class="text-sm font-semibold text-gray-900 ml-4">75%</p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-900">Product B</p>
                                        <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                                            <div class="bg-green-500 h-2 rounded-full" style="width: 60%"></div>
                                        </div>
                                    </div>
                                    <p class="text-sm font-semibold text-gray-900 ml-4">60%</p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-900">Product C</p>
                                        <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                                            <div class="bg-orange-500 h-2 rounded-full" style="width: 45%"></div>
                                        </div>
                                    </div>
                                    <p class="text-sm font-semibold text-gray-900 ml-4">45%</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Orders -->
                    <div class="chart-container">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Orders</h3>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#12345</td>
                                        <td>John Doe</td>
                                        <td>$299.99</td>
                                        <td><span class="badge completed">Completed</span></td>
                                        <td>2024-11-20</td>
                                    </tr>
                                    <tr>
                                        <td>#12346</td>
                                        <td>Jane Smith</td>
                                        <td>$149.50</td>
                                        <td><span class="badge processing">Processing</span></td>
                                        <td>2024-11-21</td>
                                    </tr>
                                    <tr>
                                        <td>#12347</td>
                                        <td>Bob Johnson</td>
                                        <td>$599.00</td>
                                        <td><span class="badge completed">Completed</span></td>
                                        <td>2024-11-21</td>
                                    </tr>
                                    <tr>
                                        <td>#12348</td>
                                        <td>Alice Williams</td>
                                        <td>$75.25</td>
                                        <td><span class="badge pending">Pending</span></td>
                                        <td>2024-11-22</td>
                                    </tr>
                                    <tr>
                                        <td>#12349</td>
                                        <td>Charlie Brown</td>
                                        <td>$425.75</td>
                                        <td><span class="badge completed">Completed</span></td>
                                        <td>2024-11-22</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Products Section -->
                <div id="productsSection" class="p-6 space-y-6 section-content" style="display: none;">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Products</h2>
                        <div class="product-grid">
                            <div class="product-card">
                                <div class="product-img">🎧</div>
                                <div class="product-info">
                                    <h3 class="font-semibold text-gray-900">Wireless Headphones</h3>
                                    <p class="text-sm text-gray-600 mt-1">Premium sound quality</p>
                                    <div class="flex justify-between items-center mt-4">
                                        <span class="text-lg font-bold text-gray-900">$129.99</span>
                                        <span class="text-sm bg-green-100 text-green-700 px-3 py-1 rounded-full">In Stock</span>
                                    </div>
                                </div>
                            </div>

                            <div class="product-card">
                                <div class="product-img">⌚</div>
                                <div class="product-info">
                                    <h3 class="font-semibold text-gray-900">Smart Watch</h3>
                                    <p class="text-sm text-gray-600 mt-1">Advanced health tracking</p>
                                    <div class="flex justify-between items-center mt-4">
                                        <span class="text-lg font-bold text-gray-900">$299.99</span>
                                        <span class="text-sm bg-green-100 text-green-700 px-3 py-1 rounded-full">In Stock</span>
                                    </div>
                                </div>
                            </div>

                            <div class="product-card">
                                <div class="product-img">📱</div>
                                <div class="product-info">
                                    <h3 class="font-semibold text-gray-900">Mobile Phone</h3>
                                    <p class="text-sm text-gray-600 mt-1">Latest generation</p>
                                    <div class="flex justify-between items-center mt-4">
                                        <span class="text-lg font-bold text-gray-900">$899.99</span>
                                        <span class="text-sm bg-red-100 text-red-700 px-3 py-1 rounded-full">Low Stock</span>
                                    </div>
                                </div>
                            </div>

                            <div class="product-card">
                                <div class="product-img">💻</div>
                                <div class="product-info">
                                    <h3 class="font-semibold text-gray-900">Laptop</h3>
                                    <p class="text-sm text-gray-600 mt-1">High performance</p>
                                    <div class="flex justify-between items-center mt-4">
                                        <span class="text-lg font-bold text-gray-900">$1,299.99</span>
                                        <span class="text-sm bg-green-100 text-green-700 px-3 py-1 rounded-full">In Stock</span>
                                    </div>
                                </div>
                            </div>

                            <div class="product-card">
                                <div class="product-img">🎮</div>
                                <div class="product-info">
                                    <h3 class="font-semibold text-gray-900">Gaming Console</h3>
                                    <p class="text-sm text-gray-600 mt-1">Latest release</p>
                                    <div class="flex justify-between items-center mt-4">
                                        <span class="text-lg font-bold text-gray-900">$499.99</span>
                                        <span class="text-sm bg-green-100 text-green-700 px-3 py-1 rounded-full">In Stock</span>
                                    </div>
                                </div>
                            </div>

                            <div class="product-card">
                                <div class="product-img">📷</div>
                                <div class="product-info">
                                    <h3 class="font-semibold text-gray-900">Digital Camera</h3>
                                    <p class="text-sm text-gray-600 mt-1">Professional grade</p>
                                    <div class="flex justify-between items-center mt-4">
                                        <span class="text-lg font-bold text-gray-900">$749.99</span>
                                        <span class="text-sm bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">Limited</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Other Sections (placeholder) -->
                <div id="ordersSection" class="p-6 space-y-6 section-content" style="display: none;">
                    <h2 class="text-2xl font-bold text-gray-900">Orders</h2>
                    <div class="bg-white rounded-lg p-6 border border-gray-300 text-center text-gray-500">Orders section content will appear here</div>
                </div>

                <div id="customersSection" class="p-6 space-y-6 section-content" style="display: none;">
                    <h2 class="text-2xl font-bold text-gray-900">Customers</h2>
                    <div class="bg-white rounded-lg p-6 border border-gray-300 text-center text-gray-500">Customers section content will appear here</div>
                </div>

                <div id="analyticsSection" class="p-6 space-y-6 section-content" style="display: none;">
                    <h2 class="text-2xl font-bold text-gray-900">Analytics</h2>
                    <div class="bg-white rounded-lg p-6 border border-gray-300 text-center text-gray-500">Analytics section content will appear here</div>
                </div>

                <div id="settingsSection" class="p-6 space-y-6 section-content" style="display: none;">
                    <h2 class="text-2xl font-bold text-gray-900">Settings</h2>
                    <div class="bg-white rounded-lg p-6 border border-gray-300 text-center text-gray-500">Settings section content will appear here</div>
                </div>
            </main>
        </div>
    </div>

    <script src="js/main.js"></script>


</body>
</html>