// ===== Hamburger menu (JS-driven, menggantikan checkbox hack) =====
function initNavToggle() {
    const toggleBtn = document.getElementById("nav-toggle-btn");
    const nav = document.querySelector("header nav");
    if (!toggleBtn || !nav) return;

    toggleBtn.addEventListener("click", function () {
        nav.classList.toggle("nav-open");
    });
}

// ===== Konfirmasi hapus (front-end only, belum ke server) =====
function initHapusConfirm() {
    document.addEventListener("click", function (event) {
        if (event.target.classList.contains("btn-hapus")) {
            const row = event.target.closest("tr");
            const nama = row?.querySelector("td")?.textContent || "data ini";
            const yakin = confirm(
                'Yakin ingin menghapus "' + nama + '"?'
            );
            if (yakin && row) {
                row.remove();
            }
        }
    });
}

// ===== Filter/pencarian tabel real-time =====
function initTableFilter() {
    const input = document.getElementById("search-input");
    const table = document.querySelector(".table-responsive table");
    if (!input || !table) return;

    input.addEventListener("keyup", function () {
        const keyword = input.value.toLowerCase();
        const rows = table.querySelectorAll("tbody tr");
        rows.forEach(function (row) {
            const teks = row.textContent.toLowerCase();
            row.style.display = teks.includes(keyword) ? "" : "none";
        });
    });
}

// ===== Validasi form (client-side) =====
function tampilkanError(input, pesan) {
    hapusError(input);
    const span = document.createElement("span");
    span.className = "error";
    span.textContent = pesan;
    input.insertAdjacentElement("afterend", span);
}

function hapusError(input) {
    const next = input.nextElementSibling;
    if (next && next.classList.contains("error")) {
        next.remove();
    }
}

function initValidasiForm() {
    const forms = document.querySelectorAll("#form-tambah");
    if (forms.length === 0) return;

    forms.forEach((form) => {
        form.addEventListener("submit", function (e) {
            let valid = true;

            const requiredInputs = form.querySelectorAll("[required]");
            requiredInputs.forEach((input) => {
                if (!input.value.trim()) {
                    tampilkanError(input, "Field ini wajib diisi");
                    valid = false;
                } else {
                    hapusError(input);
                }
            });

            const email = form.querySelector("[name='email']");
            if (email && email.value.trim() !== "") {
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(email.value.trim())) {
                    tampilkanError(email, "Format email tidak valid");
                    valid = false;
                } else {
                    hapusError(email);
                }
            }

            const umur = form.querySelector("[name='umur']");
            if (umur && umur.value !== "") {
                const nilaiUmur = parseInt(umur.value, 10);
                if (isNaN(nilaiUmur) || nilaiUmur < 0) {
                    tampilkanError(umur, "Umur tidak boleh negatif");
                    valid = false;
                } else {
                    hapusError(umur);
                }
            }

            const jumlah = form.querySelector("[name='jumlah']");
            if (jumlah && jumlah.value !== "") {
                const nilaiJumlah = parseInt(jumlah.value, 10);
                if (isNaN(nilaiJumlah) || nilaiJumlah < 0) {
                    tampilkanError(jumlah, "Jumlah hewan tidak boleh negatif");
                    valid = false;
                } else {
                    hapusError(jumlah);
                }
            }

            if (!valid) {
                e.preventDefault();
            }
        });
    });
}

document.addEventListener("DOMContentLoaded", function () {
    initNavToggle();
    initHapusConfirm();
    initTableFilter();
    initValidasiForm();
});