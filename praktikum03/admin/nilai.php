<?php
    $ns1 = ["id" => 1, "nim" => "0110124037", "uts" => 80, "uas" => 84, "tugas" => 78];
    $ns2 = ["id" => 2, "nim" => "0110124046", "uts" => 90, "uas" => 84, "tugas" => 88];
    $ns3 = ["id" => 3, "nim" => "0110124055", "uts" => 100, "uas" => 84, "tugas" => 99];
    $ns4 = ["id" => 4, "nim" => "0110124060", "uts" => 70, "uas" => 84, "tugas" => 90]; 
    
    $ar_nilai = [$ns1, $ns2, $ns3, $ns4];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Mahasiswa</title>
</head>
<body>
    <h3>Daftar Nilai Siswa</h3>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>Tugas</th>
                <th>Nilai Akhir</th>
            </tr>
        </thead> 
        <tbody>
            <?php
            $nomor = 1;
            foreach($ar_nilai as $ns) {
                $nilai_akhir = ($ns['uts'] + $ns['uas'] + $ns['tugas']) / 3; // Perhitungan nilai akhir
                echo '<tr>';
                echo '<td>' . $nomor . '</td>';
                echo '<td>' . $ns['nim'] . '</td>';
                echo '<td>' . $ns['uts'] . '</td>';
                echo '<td>' . $ns['uas'] . '</td>';
                echo '<td>' . $ns['tugas'] . '</td>';
                echo '<td>' . number_format($nilai_akhir, 2, ',', '.') . '</td>';
                echo '</tr>';
                $nomor++;
            }   
            ?>
        </tbody>
    </table>
</body>
</html>