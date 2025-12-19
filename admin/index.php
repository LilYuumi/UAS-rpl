<?php include('../middleware/adminMiddleware.php') ?>
<?php include('template/header.php');?>

<!-- SIDEBAR -->
<?php include('template/sidebar.php')?>

<!-- CONTENT -->
<main class="flex-1 p-8 md:pt-8 pt-24 bg-gray-50 min-h-screen">

  <?php if (isset($_SESSION['auth'])): ?>
    <div class="mb-8">
      <h1 class="text-4xl font-bold text-gray-800 mb-2">
        Welcome, <?= $_SESSION['auth_user']['nama_user']; ?>
      </h1>
      <p class="text-gray-500 max-w-3xl leading-relaxed">
        Selamat datang di Dashboard Admin, pusat kendali penuh untuk toko online Anda. Dari sini, Anda dapat memantau, mengelola, dan mengoptimalkan semua aspek operasional toko Anda dengan cepat dan efisien.
      </p>
    </div>

    <!-- DASHBOARD CARDS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

      <!-- Total Orders -->
      <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition duration-300">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-400 font-semibold">Total Orders</p>
            <h2 class="text-2xl font-bold text-gray-800 mt-2">1,245</h2>
          </div>
          <div class="bg-blue-100 p-3 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v18H3V3z" />
            </svg>
          </div>
        </div>
      </div>

      <!-- Total Sales -->
      <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition duration-300">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-400 font-semibold">Total Sales</p>
            <h2 class="text-2xl font-bold text-gray-800 mt-2">Rp. 45,300,000</h2>
          </div>
          <div class="bg-green-100 p-3 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-3 0-4 2-4 2s1 2 4 2 4-2 4-2-1-2-4-2z" />
            </svg>
          </div>
        </div>
      </div>

      <!-- Products -->
      <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition duration-300">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-400 font-semibold">Products</p>
            <h2 class="text-2xl font-bold text-gray-800 mt-2">320</h2>
          </div>
          <div class="bg-yellow-100 p-3 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V5a2 2 0 00-2-2h-6" />
            </svg>
          </div>
        </div>
      </div>

      <!-- Customers -->
      <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition duration-300">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-400 font-semibold">Customers</p>
            <h2 class="text-2xl font-bold text-gray-800 mt-2">1,024</h2>
          </div>
          <div class="bg-red-100 p-3 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0012 21c3.866 0 7.414-1.578 9.879-4.196" />
            </svg>
          </div>
        </div>
      </div>

    </div>

    <!-- INFO CARDS / DESCRIPTION -->
    <div class="bg-white rounded-xl p-6 shadow">
      <h2 class="text-xl font-bold text-gray-800 mb-4">Dashboard Overview</h2>
      <p class="text-gray-600 leading-relaxed">
        Dari dashboard ini, Anda dapat mengelola seluruh aspek toko online Anda: mulai dari menambahkan produk baru, memantau pesanan, mengelola kategori, hingga melihat analitik penjualan. Setiap fitur dirancang agar cepat, intuitif, dan mudah diakses, sehingga pengelolaan toko menjadi seamless.
      </p>
    </div>

  <?php endif; ?>

</main>

<?php include('template/footer.php')?>
