const btn = document.getElementById("toggleBtn");
    const sidebar = document.getElementById("sidebar");
    const icon = document.getElementById("toggleIcon");

    btn.addEventListener("click", () => {
      const open = sidebar.classList.toggle("left-0");
      sidebar.classList.toggle("-left-[300px]");


      icon.className = open ? "ri-close-line" : "ri-menu-line";
    });


    // Tangkap semua form yang punya tombol delete
    document.querySelectorAll('.delete-form').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // hentikan sementara submit

            // Konfirmasi
            const confirmed = confirm("Apakah Anda Yakin Ingin Mengapus Produk Ini?");
            if (confirmed) {
                form.submit(); // submit form jika user klik OK
            }
        });
    });
