async function muatDaftarPerawatan() {
    const tbody = document.querySelector(".table-responsive table tbody")
    const loading = document.getElementById("loading-indicator")
    if (!tbody || !loading) return

    loading.style.display = "block";
    tbody.innerHTML = "";

    try {
        await new Promise((resolve) => setTimeout(resolve, 600))

        const res = await fetch("../data/perawatan.json")
        if (!res.ok) {
            throw new Error("Gagal mengambil data (status " + res.status + ")")
        }
        const perawatan = await res.json();

        perawatan.forEach(function (perawatan) {
            const tr = document.createElement("tr")
            tr.innerHTML =
                "<td>" + perawatan.nama + "</td>" +
                "<td>" + perawatan.pemilik + "</td>" +
                "<td>" + perawatan.layanan + "</td>" +
                "<td>" + perawatan.tanggal + "</td>" +
                "<td>" + perawatan.status + "</td>" +
                "<td>" +
                "<button type=\"button\">Edit</button> " +
                "<button type=\"button\" class=\"btn-hapus\">Hapus</button>" +
                "</td>";
            tbody.appendChild(tr);
        })
    } catch (err) {
        tbody.innerHTML =  "<tr><td colspan=\"6\">Gagal memuat data: " + err.message + "</td></tr>";
    } finally {
        loading.style.display = "none"
    }
}

document.addEventListener("DOMContentLoaded", muatDaftarPerawatan);