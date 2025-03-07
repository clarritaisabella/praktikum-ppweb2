<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi IT Club Data Science</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: auto;
            padding: 20px;
        }
        .container {
            background-color:rgb(254, 95, 169);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px gray;
            width: 500px;
        }
        .form-label {
            font-weight: bold;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #e3f2fd;
            border-left: 5px solidrgb(93, 11, 67);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Form Registrasi IT Club Data Science</h2>
        
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">NIM:</label>
                <input type="text" name="nim" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Nama Lengkap:</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Kelamin:</label><br>
                <input type="radio" name="jenis_kelamin" value="Laki-Laki" required> Laki-Laki
                <input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan
            </div>

            <div class="mb-3">
                <label class="form-label">Program Studi:</label>
                <select name="program_studi" class="form-control">
                    <option value="SI">Sistem Informasi</option>
                    <option value="TI">Teknik Informatika</option>
                    <option value="BD">Bisnis Digital</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Skill Web & Programming:</label><br>
                <input type="checkbox" name="skill[]" value="10"> HTML
                <input type="checkbox" name="skill[]" value="10"> CSS
                <input type="checkbox" name="skill[]" value="20"> JavaScript
                <input type="checkbox" name="skill[]" value="20"> RWD Bootstrap
                <input type="checkbox" name="skill[]" value="30"> PHP
                <input type="checkbox" name="skill[]" value="30"> Python
                <input type="checkbox" name="skill[]" value="50"> Java
            </div>

            <div class="mb-3">
                <label class="form-label">Tempat Domisili:</label>
                <select name="domisili" class="form-control">
                    <option value="Jakarta">Jakarta</option>
                    <option value="Depok">Depok</option>
                    <option value="Bogor">Bogor</option>
                    <option value="Tangerang">Tangerang</option>
                    <option value="Bekasi">Bekasi</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $program_studi = $_POST['program_studi'];
            $domisili = $_POST['domisili'];
            $email = $_POST['email'];

            // Menghitung skor berdasarkan skill yang dipilih
            $total_skor = 0;
            if (!empty($_POST['skill'])) {
                foreach ($_POST['skill'] as $nilai) {
                    $total_skor += (int) $nilai;
                }
            }

            // Menentukan predikat berdasarkan skor
            if ($total_skor == 0) {
                $predikat = "Tidak Memadai";
            } elseif ($total_skor > 0 && $total_skor <= 40) {
                $predikat = "Kurang";
            } elseif ($total_skor > 40 && $total_skor <= 60) {
                $predikat = "Cukup";
            } elseif ($total_skor > 60 && $total_skor <= 100) {
                $predikat = "Baik";
            } else {
                $predikat = "Sangat Baik";
            }

            // Konversi program studi ke teks
            $program_studi_text = [
                "SI" => "Sistem Informasi",
                "TI" => "Teknik Informatika",
                "BD" => "Bisnis Digital"
            ];
            $program_studi_label = $program_studi_text[$program_studi];

            // Menampilkan hasil di bawah form
            echo "<div class='result'>";
            echo "<h4>Hasil Registrasi</h4>";
            echo "<b>NIM:</b> $nim <br>";
            echo "<b>Nama:</b> $nama <br>";
            echo "<b>Jenis Kelamin:</b> $jenis_kelamin <br>";
            echo "<b>Program Studi:</b> $program_studi_label <br>";
            echo "<b>Domisili:</b> $domisili <br>";
            echo "<b>Email:</b> $email <br>";
            echo "<b>Total Skor:</b> $total_skor <br>";
            echo "<b>Predikat:</b> <span style='color:blue;'>$predikat</span> <br>";
            echo "</div>";
        }
        ?>

    </div>
</body>
</html>