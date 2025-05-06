

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
    if (value === "farmasi") {
      window.location.href = "farmasi.html";
    } else if (value === "poli") {
      window.location.href = "poli.html";
    } else if (value === "admisi") {
      window.location.href = "admisi-pilihloket.html";
    }
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
      window.location.href = "display-antrean-poli.html";
    } else if (value === "admisi") {
      window.location.href = "display-antrean-admisi.html";
    }
  }

  // Cek apakah halaman saat ini adalah terimakasih.html
if (window.location.pathname.endsWith("terimakasih.html")) {
  setTimeout(function () {
      window.location.href = "ekios.html";
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


