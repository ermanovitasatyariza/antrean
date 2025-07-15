

// /menciptakan animasi marquee horizontal tanpa putus secara otomatis, tanpa perlu menggandakan isi secara manual

  document.addEventListener("DOMContentLoaded", function () {
    const track = document.getElementById("marqueeTrack");
    const content = document.getElementById("poliContent");
    const kotakList = content.querySelectorAll(".kotak-poli");

    kotakList.forEach(kotak => {
      const clone = kotak.cloneNode(true);
      content.appendChild(clone); // Tambahkan clone-nya langsung ke akhir container
    });

    const totalWidth = content.offsetWidth;

    track.style.animation = `scrollMarquee ${totalWidth * 0.03}s linear infinite`;

    const styleSheet = document.createElement("style");
    styleSheet.innerHTML = `
      @keyframes scrollMarquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-${totalWidth}px); }
      }
    `;
    document.head.appendChild(styleSheet);
  });

  ///Dashboard Page
  function showFormPG() {
    document.getElementById("buttonPG").style.display = "none";
    document.getElementById("petugasForm").style.display = "block";
  }

function openPagePG() {
  const value = document.getElementById('menuSelectPetugasPanggil').value;
  if (!value) {
    alert("Silakan pilih menu terlebih dahulu!");
    return;
  }

  // Tambahkan parameter navigasi (misalnya asal = dashboard)
  const from = "dashboard";

  let targetUrl = "";

  if (value === "farmasi") {
    targetUrl = `farmasi.html?from=${from}`;
  } else if (value === "poli") {
    targetUrl = `poli-pilihpolidokterantrean?from=${from}`;
  } else if (value === "admisi") {
    targetUrl = `admisi-pilihloket?from=${from}`;
  }

  // Arahkan ke URL dengan parameter
  window.location.href = targetUrl;
}

  function showFormDisplay() {
    document.getElementById("buttonDisplay").style.display = "none";
    document.getElementById("DisplayForm").style.display = "block";
  }

  function openPageDisplay() {
    const value = document.getElementById('menuSelectDisplay').value;
    if (!value) {
      alert("Silakan pilih menu terlebih dahulu!");
      return;
    }
    if (value === "farmasi") {
      window.location.href = "farmasi.html";
    } else if (value === "poli") {
      window.location.href = "display-antrean-poli";
    } else if (value === "admisi") {
      window.location.href = "display-antrean-admisi";
    }
  }

  // Cek apakah halaman saat ini adalah terimakasih.html
if (window.location.pathname.endsWith("terimakasih")) {
  setTimeout(function () {
      window.location.href = "ekios";
  }, 5000); // 30 detik
}

document.addEventListener("DOMContentLoaded", function () {
  const input = document.getElementById("kodeInput");
  const buttons = document.querySelectorAll(".keypad button");

  // Fokus otomatis saat halaman dimuat
  input.focus();

  buttons.forEach(button => {
      button.addEventListener("click", () => {
          const key = button.getAttribute("data-key");
          if (key) {
              // Tambah angka ke input jika belum melebihi batas
              if (input.value.length < input.maxLength) {
                  input.value += key;
              }
          } else if (button.classList.contains("hapus")) {
              // Hapus 1 karakter dari belakang
              input.value = input.value.slice(0, -1);
          }
          // Tetap fokus di input meskipun tombol ditekan
          input.focus();
      });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const inputs = document.querySelectorAll(".code-input");
  const buttons = document.querySelectorAll(".keypad button");
  let activeInput = inputs[0]; // mulai dari input pertama
  activeInput.focus();

  // Event ketika input di klik → set sebagai input aktif
  inputs.forEach((input, index) => {
      input.addEventListener("focus", () => {
          activeInput = input;
      });

      // Tambahan: bila input diisi langsung via keyboard (opsional)
      input.addEventListener("input", () => {
          if (input.value.length === input.maxLength) {
              if (index + 1 < inputs.length) {
                  inputs[index + 1].focus();
                  activeInput = inputs[index + 1];
              }
          }
      });
  });

  // Tombol keypad diklik
  buttons.forEach(button => {
      button.addEventListener("click", () => {
          if (!activeInput) return;

          const key = button.getAttribute("data-key");

          if (key) {
              if (activeInput.value.length < activeInput.maxLength) {
                  activeInput.value += key;

                  // Cek apakah sudah penuh
                  if (activeInput.value.length === activeInput.maxLength) {
                      // Pindah ke input berikutnya jika ada
                      const currentIndex = Array.from(inputs).indexOf(activeInput);
                      if (currentIndex + 1 < inputs.length) {
                          activeInput = inputs[currentIndex + 1];
                          activeInput.focus();
                      }
                  }
              }
          } else if (button.classList.contains("hapus")) {
              // Hapus karakter terakhir
              activeInput.value = activeInput.value.slice(0, -1);
          }

          activeInput.focus();
      });
  });
});

function updateJam() {
        const sekarang = new Date();
        const jam = sekarang.getHours().toString().padStart(2, '0');
        const menit = sekarang.getMinutes().toString().padStart(2, '0');
        const detik = sekarang.getSeconds().toString().padStart(2, '0');
        document.getElementById('jam').textContent = ` | ${jam}:${menit}:${detik}`;
    }

    // Perbarui setiap detik
    setInterval(updateJam, 1000);
    updateJam(); // Panggil sekali saat load

//JavaScript untuk ikon mata
function togglePassword() {
    var passwordInput = document.getElementById("password");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}

document.addEventListener("DOMContentLoaded", function () {
    const button = document.querySelector('.panggil-button');
    const waktuPanggil = document.getElementById('waktu-panggil');

    if (button && waktuPanggil) {
        button.addEventListener('click', function () {
            const now = new Date();
            const formatted = now.toLocaleString('id-ID', {
                day: '2-digit', month: '2-digit', year: 'numeric',
                hour: '2-digit', minute: '2-digit', second: '2-digit'
            });

            waktuPanggil.textContent = formatted;
        });
    } else {
        console.warn("Element '.panggil-button' atau '#waktu-panggil' tidak ditemukan.");
    }
});


document.getElementById('cariForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = this;
    const formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'error') {
            alert(data.message);
        } else if (data.redirect) {
            window.location.href = data.redirect;
        }
    })
    .catch(error => {
        console.error(error);
        alert('Terjadi kesalahan saat menghubungi server.');
    });
});

//print antrean
function printAndRedirect() {
    // Memastikan redireksi hanya terjadi setelah selesai print
    window.onafterprint = function () {
        window.location.href = 'terimakasih';
    };
    window.print();
}

function tampilkanBagianPanggil() {
    // Ambil semua elemen yang dibutuhkan
    const bagianUlang = document.getElementById("bagian-ulang");
    const bagianPanggil = document.getElementById("bagian-panggil");
    const audioPlayer = document.getElementById("audioPlayer");

    const tombolLewati = document.getElementById('tombol-lewati');
    const tombolSelesai = document.getElementById('tombol-selesai');
    const tombolSelanjutnya = document.getElementById('tombol-selanjutnya');

    const tombolPanggil = document.getElementById('panggil');
    const tombolPanggilUlang = document.getElementById('panggil-ulang');

    // Sembunyikan bagian ulang dan tombol panggil ulang
    bagianUlang.style.display = "none";
    if (tombolPanggilUlang) tombolPanggilUlang.style.display = "none";

    // Sembunyikan tombol Panggil
    // if (tombolPanggil) tombolPanggil.style.display = "none";

    // Tampilkan bagian panggil
    bagianPanggil.style.display = "inline-block";

    // Tampilkan tombol Lewati dan Selesai
    tombolLewati.style.display = "inline-block";
    tombolSelesai.style.display = "inline-block";

    // Sembunyikan tombol Selanjutnya
    tombolSelanjutnya.style.display = "none";

    // Play audio antrean
    const nomorAntrean = document.querySelector('.nomor-antrian-panggil')?.textContent.trim() || 'default';
    const audioPath = `/audio/${nomorAntrean}.mp3`;
    audioPlayer.src = audioPath;
    audioPlayer.play().catch(error => {
        console.error("Gagal memutar audio:", error);
    });

    // Event tombol Lewati
    tombolLewati.onclick = () => {
        tombolLewati.style.display = "none";
        tombolSelesai.style.display = "none";
        tombolPanggil.style.display = "none";
        tombolSelanjutnya.style.display = "inline-block";
    };

    // Event tombol Selesai
    tombolSelesai.onclick = () => {
        tombolLewati.style.display = "none";
        tombolSelesai.style.display = "none";
        if (tombolPanggil) tombolPanggil.style.display = "none";
        tombolSelanjutnya.style.display = "inline-block";
    };

    // Event tombol Selanjutnya
    tombolSelanjutnya.onclick = () => {
        tombolPanggil.style.display = "inline-block";
        tombolPanggilUlang.style.display = "inline-block";
        tombolSelanjutnya.style.display = "none";
        bagianPanggil.style.display = "none"; // Reset tampilan bagian panggil
    };

}

function tampilkanBagianPanggilUlang() {
    // Sembunyikan bagian panggil biasa
    document.getElementById("bagian-panggil").style.display = "none";

    // Tampilkan bagian panggil ulang
    const bagianUlang = document.getElementById("bagian-ulang");
    bagianUlang.style.display = "block";

    // Tampilkan tombol-tombol awal
    const tombolPanggilUlang = document.getElementById('tombol-panggil-ulang');
    const tombolLewatiUlang = document.getElementById('tombol-lewati-ulang');
    const tombolSelesaiUlang = document.getElementById('tombol-selesai-ulang');
    const tombolSelanjutnyaUlang = document.getElementById('tombol-selanjutnya-ulang');
    const selectNoLewati = document.getElementById('no-lewati');
    const PanggilUlang = document.getElementById('panggil-ulang');
    const Panggil = document.getElementById('panggil');

    tombolPanggilUlang.style.display = 'inline-block';
    tombolLewatiUlang.style.display = 'inline-block';
    tombolSelesaiUlang.style.display = 'inline-block';
    tombolSelanjutnyaUlang.style.display = 'none';
    selectNoLewati.style.display = 'inline-block';

    // Saat tombol panggil diklik, putar audio dari nomor yang dipilih
    tombolPanggilUlang.addEventListener('click', function () {
        const nomorTerpilih = selectNoLewati.value;
        if (!nomorTerpilih || nomorTerpilih === "Pilih Nomor") return;

        const audioPath = `/audio/${nomorTerpilih}.mp3`;
        const audioPlayer = document.getElementById('audioPlayer');
        audioPlayer.src = audioPath;
        audioPlayer.play().catch(error => {
            console.error("Gagal memutar audio:", error);
        });
    });

    // Fungsi jika Lewati diklik
    tombolLewatiUlang.addEventListener('click', function () {
    tombolPanggilUlang.style.display = 'none';
    tombolSelesaiUlang.style.display = 'none';
    tombolLewatiUlang.style.display = 'none';
    tombolSelanjutnyaUlang.style.display = 'inline-block';
    selectNoLewati.style.display = 'none';
    Panggil = 'inline-block';
    });

    // Fungsi jika Selesai diklik
    tombolSelesaiUlang.addEventListener('click', function () {
    tombolPanggilUlang.style.display = 'none';
    tombolSelesaiUlang.style.display = 'none';
    tombolLewatiUlang.style.display = 'none';
    tombolSelanjutnyaUlang.style.display = 'inline-block';
    selectNoLewati.style.display = 'none';
    Panggil = 'inline-block';
    });

    // Reset pilihan tombol panggil utama
    // const tombolPanggil = document.getElementById('panggil');
    // if (tombolPanggil) tombolPanggil.style.display = 'none';

    // Event tombol Selanjutnya
    tombolSelanjutnya.onclick = () => {
    tombolPanggil.style.display = "inline-block";
    tombolPanggilUlang.style.display = "inline-block";
    tombolSelanjutnya.style.display = "none";
    bagianPanggil.style.display = "none"; // Reset tampilan bagian panggil
    };

}

