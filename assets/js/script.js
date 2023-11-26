document.addEventListener("DOMContentLoaded", function () {
    var navLinks = document.querySelectorAll(".nav-link");
    var logoutButton = document.getElementById("logoutButton");

    //close button
    var closeButton = document.querySelector('.modal-header .btn-close');

    closeButton.addEventListener('click', function () {
      var modal = new bootstrap.Modal(document.getElementById('modalBackOfficeDataLabel'));
      modal.hide(); 
    });

    navLinks.forEach(function (link) {
      link.addEventListener("click", function () {
        // Hilangkan kelas "active" dari semua tautan navigasi
        navLinks.forEach(function (navLink) {
          navLink.classList.remove("active");
        });

        // Tambahkan kelas "active" ke tautan yang sedang diklik
        this.classList.add("active");
      });
    });

    // Tambahkan event click ke tombol logout
    logoutButton.addEventListener("click", function () {
      // Kirim permintaan logout ke skrip PHP yang Anda buat
      fetch("login.php") // Ganti dengan URL skrip PHP Anda
        .then(function (response) {
          if (response.ok) {
            // Redirect ke halaman login atau halaman lain yang sesuai setelah logout
            window.location.href = "login.php"; // Ganti dengan URL yang sesuai
          } else {
            console.error("Gagal logout");
          }
        })
        .catch(function (error) {
          console.error("Terjadi kesalahan: " + error);
        });
    });
  });
    function showNotification() {
    alert("Data sedang disimpan. Tunggu sebentar.");
  }

  

    



  
