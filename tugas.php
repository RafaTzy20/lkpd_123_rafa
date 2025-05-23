<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LKPD PHP Dasar</title>
</head>
<body>
    <h1>Penilaian</h1>
    <form method="post">
        <label>Masukkan Nilai:</label>
        <input type="number" name="nilai" required>
        <input type="submit" value="Cek Nilai">
    </form>
    <?php
    if (isset($_POST['nilai'])) {
        $nilai = $_POST['nilai'];
        if ($nilai >= 90 && $nilai <= 100) {
            echo "<p>Nilai $nilai = A</p>";
        } elseif ($nilai >= 80) {
            echo "<p>Nilai $nilai = B</p>";
        } elseif ($nilai >= 70) {
            echo "<p>Nilai $nilai = C</p>";
        } elseif ($nilai >= 0) {
            echo "<p>Nilai $nilai = D</p>";
        } else {
            echo "<p>Nilai wajib di antara 0 - 100</p>";
        }
    }
    ?>
    
    <h1>Waktu</h1>
    <form method="post">
        <label>Masukkan Jam (HH:MM):</label>
        <input type="text" name="jam" required>
        <input type="submit" value="Cek Waktu">
    </form>
    <?php
    if (isset($_POST['jam'])) {
        $jam = $_POST['jam'];
        list($hour, $minute) = explode(':', $jam);
        $hour = (int)$hour;
        if ($hour >= 0 && $hour < 4) {
            echo "<p>$jam = Dini Hari</p>";
        } elseif ($hour < 10) {
            echo "<p>$jam = Pagi</p>";
        } elseif ($hour < 15) {
            echo "<p>$jam = Siang</p>";
        } elseif ($hour < 17.5) {
            echo "<p>$jam = Sore</p>";
        } elseif ($hour < 18.5) {
            echo "<p>$jam = Petang</p>";
        } elseif ($hour < 24) {
            echo "<p>$jam = Malam</p>";
        } else {
            echo "<p>Dunia Lain</p>";
        }
    }
    ?>

<h1>Jadwal Harian Andi</h1>
    <form method="post">
        <label for="jam">Masukkan Jam (HH:MM):</label>
        <input type="text" id="jam" name="jam" required>
        <button type="submit">Cek Jadwal</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jam = $_POST['jam'];
        $waktu = explode(":", $jam);
        $jamInt = (int)$waktu[0];
        $menitInt = (int)$waktu[1];

        // Logika jadwal harian Andi
        if ($jamInt == 15 && $menitInt >= 30 && $menitInt <= 45) {
            echo "Jam $jam: Andi sedang dalam perjalanan pulang sekolah ke rumah.";
        } elseif ($jamInt == 15 && $menitInt > 45 || ($jamInt == 16 && $menitInt <= 00)) {
            echo "Jam $jam: Andi sedang mandi.";
        } elseif ($jamInt == 16 && $menitInt > 00 && $menitInt <= 10) { 
            echo "Jam $jam: Andi bersiap untuk mengaji.";
        } elseif ($jamInt == 16 && $menitInt > 10 && $menitInt <= 40) {
            echo "Jam $jam: Andi mengaji selama 30 menit.";
        } elseif ($jamInt == 16 && $menitInt > 40 || ($jamInt == 17 && $menitInt <= 35)) {
            echo "Jam $jam: Andi menghafalkan dialog untuk festival kesenian budaya.";
        } elseif ($jamInt == 18 && $menitInt >= 20 && $menitInt <= 35) {
            echo "Jam $jam: Andi bersiap untuk sholat Maghrib.";
        } elseif ($jamInt == 18 && $menitInt > 35 && $menitInt <= 40) {
            echo "Jam $jam: Andi menjalankan sholat Maghrib.";
        } elseif ($jamInt == 18 && $menitInt > 40 && $menitInt <= 50) {
            echo "Jam $jam: Andi membeli bumbu masakan.";
        } elseif ($jamInt == 18 && $menitInt > 50 || ($jamInt == 19 && $menitInt <= 05)) {
            echo "Jam $jam: Andi makan malam bersama.";
        } elseif ($jamInt == 19 && $menitInt >= 25 && $menitInt <= 40) {
            echo "Jam $jam: Andi bersiap untuk sholat Isya'.";
        } elseif ($jamInt == 19 && $menitInt > 40 && $menitInt <= 50) {
            echo "Jam $jam: Andi menjalankan sholat Isya'.";
        } elseif ($jamInt == 19 && $menitInt > 50 || ($jamInt == 20 && $menitInt <= 50)) {
            echo "Jam $jam: Andi mengerjakan tugas sekolah.";
        } elseif ($jamInt == 20 && $menitInt > 50 || ($jamInt == 21 && $menitInt <= 30)) {
            echo "Jam $jam: Andi mengobrol bersama keluarga.";
        } elseif ($jamInt == 21 && $menitInt > 30 || ($jamInt == 22 && $menitInt == 0)) {
            echo "Jam $jam: Andi chattingan bersama Raya membahas festival.";
        } elseif ($jamInt == 22 && $menitInt > 0 || ($jamInt == 04 && $menitInt == 0)) {
            echo "Jam $jam: Andi sedang tidur.";
        } elseif ($jamInt == 07 && $menitInt >= 0 || ($jamInt == 15 && $menitInt <= 30)) {
            echo "Jam $jam: Andi sedang berada di sekolah.";
        } else {
            echo "Jam $jam: Tidak ada kegiatan yang terjadwal.";
        }
        
    }        
    ?>

<table border="1">
        <tr>
            <th>Jam</th>
            <th>Kegiatan</th>
        </tr>
        <tr><td>15:30 - 15:45</td><td>Pulang Sekolah</td></tr>
        <tr><td>15:45 - 16:00</td><td>Mandi</td></tr>
        <tr><td>16:10 - 16:40</td><td>Mengaji</td></tr>
        <tr><td>16:55 - 17:35</td><td>Menghafal Dialog Festival</td></tr>
        <tr><td>18:40 - 18:50</td><td>Membeli Bumbu Masakan</td></tr>
        <tr><td>18:50 - 19:05</td><td>Makan Malam</td></tr>
        <tr><td>19:50 - 20:50</td><td>Mengerjakan Tugas Sekolah</td></tr>
        <tr><td>20:50 - 21:30</td><td>Mengobrol dengan Keluarga</td></tr>
        <tr><td>21:30 - 22:00</td><td>Chatting dengan Raya (Waktu Arab: 01:30 - 02:00)</td></tr>
        <tr><td>22:00 - 04:00</td><td>Tidur</td></tr>
    </table>

    <p>Rafa Irsyad Musyaffa(20) & Titis Wicaksono(32) </p>
    
</body>
</html>