document.getElementById("phone-input").addEventListener("input", function (e) {
    // Hapus semua karakter non-angka
    let value = e.target.value.replace(/\D/g, "");
    // Potong ke 13 angka
    value = value.slice(0, 13);
    // Tetapkan nilai input ke nilai yang telah divalidasi
    e.target.value = value;
});

document.getElementById("nip-input").addEventListener("input", function (e) {
    // Hapus semua karakter non-angka
    let value = e.target.value.replace(/\D/g, "");
    // Potong ke 13 angka
    value = value.slice(0, 18);
    // Tetapkan nilai input ke nilai yang telah divalidasi
    e.target.value = value;
});

document.getElementById("nip-input").addEventListener("input", function () {
    var nip = this.value;
    if (nip.length < 18) {
        document.getElementById("nip-error").style.display = "block";
    } else {
        document.getElementById("nip-error").style.display = "none";
    }
});

document.getElementById("room-input-name").addEventListener("input", function (e) {
    // Hapus semua karakter yang tidak valid
    let value = e.target.value;
    if (value.length > 0 && !value[0].match(/[0-9]/)) {
        value = "";
    }
    if (value.length > 1 && !value[1].match(/[a-zA-Z]/)) {
        value = value[0];
    }
    // Tetapkan nilai input ke nilai yang telah divalidasi
    e.target.value = value;
});

function phoneValidation(id) {
    document
        .getElementById("phone-input-" + id)
        .addEventListener("input", function (e) {
            // Hapus semua karakter non-angka
            let value = e.target.value.replace(/\D/g, "");
            // Potong ke 13 angka
            value = value.slice(0, 13);
            // Tetapkan nilai input ke nilai yang telah divalidasi
            e.target.value = value;
        });
}

function nipValidation(id) {
    document
        .getElementById("nip-input-" + id)
        .addEventListener("input", function (e) {
            // Hapus semua karakter non-angka
            let value = e.target.value.replace(/\D/g, "");
            // Potong ke 13 angka
            value = value.slice(0, 18);
            // Tetapkan nilai input ke nilai yang telah divalidasi
            e.target.value = value;
        });
}
