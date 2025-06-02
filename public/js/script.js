

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

//   function openPagePG() {
//     const value = document.getElementById('menuSelectPetugasPanggil').value;
//     if (!value) {
//       alert("Silakan pilih menu terlebih dahulu!");
//       return;
//     }
//     if (value === "farmasi") {
//       window.location.href = "farmasi.html";
//     } else if (value === "poli") {
//       window.location.href = "poli-pilihpolidokterantrean";
//     } else if (value === "admisi") {
//       window.location.href = "admisi-pilihloket";
//     }
//   }
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

$(document).ready(function() {
    $('#cariPasienForm').on('submit', function(e) {
        e.preventDefault(); // cegah submit default

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response.status === 'error') {
                    $('#alert-area').html('<div class="alert alert-danger">' + response.message + '</div>');
                } else {
                    // Contoh: Redirect atau tampilkan data pasien
                    window.location.href = '/pilih-poli-dokter?from=px-personal-lama';
                }
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    // Validasi gagal
                    let errors = xhr.responseJSON.errors;
                    let messages = Object.values(errors).map(e => e.join(', ')).join('<br>');
                    $('#alert-area').html('<div class="alert alert-danger">' + messages + '</div>');
                } else {
                    $('#alert-area').html('<div class="alert alert-danger">Terjadi kesalahan.</div>');
                }
            }
        });
    });
});

$('#cariPasienForm').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
        url: $(this).attr('action'),
        method: 'POST',
        data: $(this).serialize(),
        success: function(response) {
            if (response.status === 'error') {
                $('#alert-area').html('<div class="alert alert-danger">' + response.message + '</div>');
            } else {
                // Redirect ke halaman Blade dengan data pasien
                window.location.href = response.redirect_url;
            }
        },
        error: function(xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                let messages = Object.values(errors).map(e => e.join(', ')).join('<br>');
                $('#alert-area').html('<div class="alert alert-danger">' + messages + '</div>');
            } else {
                $('#alert-area').html('<div class="alert alert-danger">Terjadi kesalahan.</div>');
            }
        }
    });
});
