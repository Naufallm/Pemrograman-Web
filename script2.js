function validasi() {
    const Nama = document.getElementById("nama").value;
    const Email = document.getElementById("email").value;
    const Alamat = document.getElementById("alamat").value;

    if (Nama === "" || Email === "" || Alamat === "") {
        alert("Semua data harus diisi.");
    } else {
        alert("Pendaftaran berhasil!");
    }
}
