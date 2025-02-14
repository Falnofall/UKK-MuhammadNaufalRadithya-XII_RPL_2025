<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=light_mode" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Aplikasi Perhitungan Diskon</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Fira+Code:wght@300..700&family=Oswald:wght@200..700&display=swap');

        body {
            background: url(bg.jpg)no-repeat center fixed;
            background-size: cover;
            font-family: "Comfortaa", serif;
        }
        
        .bg {
            background: url(bg2.jpg) no-repeat center fixed;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <!-- Membuat form input -->
                <form method="post" class="border rounded p-2 bg-dark bg-opacity-25">
                    <!-- Tombol background -->
                    <span class="material-symbols-outlined" onclick="mode()">
                        light_mode
                    </span>
                    <h3 class="text-bg-dark bg-opacity-75 text-center rounded p-2">Selamat Datang di Aplikasi HITKON
                    </h3>
                    <label class="form-label"><b>Harga (Rp)</b></label>
                    <input type="number" name="harga" class="form-control" min="0" step="0.01" autofocus autocomplete="off"
                        required onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Masukan harga ">

                    <label class="form-label pt-2"><b>Diskon (%)</b></label>
                    <input type="text" maxlength="3" name="diskon" class="form-control input-focus-bg-success" min="0" step="0.01" autocomplete="off"
                        required onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Masukan diskon">
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success w-50 p-2 mt-2 me-2" name="hitung">Hitung</button>
                        <button type="reset" class="btn btn-warning w-50 p-2 mt-2">Ulang</button>
                    </div>
                </form>

                <?php
                //Membuat variabel 
                if (isset($_POST['hitung'])) {
                    $harga = $_POST['harga'];
                    $diskon = $_POST['diskon'];

                    //Validasi input agar diskon > 100% & harga < 0 
                    if ($harga < 0) {
                        echo "<script>alert('Harga tidak boleh negatif')</script>";
                    } elseif ($diskon < 0 || $diskon > 100) {
                        echo "<script>alert('Diskon harus antara 1-100')</script>";
                    } else {
                        //Kalkulasi antara harga & diskon
                        $nilai_diskon = $harga * ($diskon / 100);
                        $total_harga = $harga - $nilai_diskon; ?>
                        <!-- Hasil dari output -->
                        <div class="border rounded p-2 mt-3 bg-dark bg-opacity-25 text-light">
                            <!-- Menampilkan hasil dengan format mata uang -->
                            <p>Harga : <b>Rp. <?php echo number_format($harga, 2, ',', '.') ?></b></p>
                            <p>Diskon <?php echo $diskon ?>% : <b>Rp. <?php echo number_format($nilai_diskon, 2, ',', '.') ?></b></p>
                            <p>Harga : <b>Rp. <?php echo number_format($total_harga, 2, ',', '.') ?></b></p>
                            <button type="reset" class="btn btn-danger w-100 p-2 mt-2" onclick="hapus()">Hapus</button>
                        </div>
                <?php }
                }
                ?>
            </div>
            <p class="text-center text-light">&copy; UKK 2025 | Muhammad Naufal Radithya | Rekayasa Perangkat Lunak</p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Membuat fungsi untuk refresh halaman website & ganti background halaman -->
    <script>
        function hapus() {
            window.location.href = window.location.href;
        };

        function mode() {
            document.body.classList.toggle('bg');
        };
    </script>
</body>

</html>