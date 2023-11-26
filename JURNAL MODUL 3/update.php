<!-- Pada file ini kalian membuat coding untuk logika update / meng-edit data mobil pada showroom sesuai id-->
<?php
// (1) Jangan lupa sertakan koneksi database dari yang sudah kalian buat yaa
    include("connect.php");
// (2) Tangkap nilai "id" mobil (CLUE: gunakan GET)
    $id = $_GET['id'];
    // (3) Buatkan fungsi "update" yang menerima data sebagai parameter
    function update($connect, $id, $data) {
        // Dapatkan data yang dikirim sebagai parameter dan simpan dalam variabel yang sesuai.
        $nama_mobil = $data['nama mobil'];
        $brand_mobil = $data['brand mobil'];
        $warna_mobil = $data['warna mobil'];
        $tipe_mobil = $data['tipe mobil'];
        $harga_mobil = $data['harga mobil'];
        // Buatkan perintah SQL UPDATE untuk mengubah data di tabel, berdasarkan id mobil
        $query = "UPDATE showroom mobil SET
            nama mobil='$nama_mobil',
            brand mobil='$brand_mobil',
            warna mobil='$warna_mobil',
            tipe mobil='$tipe_mobil',
            harga mobil='$harga_mobil'
            WHERE id = $id";
        // Eksekusi perintah SQL
        $result = mysqli_query($connect, $query);
        // Buatkan kondisi jika eksekusi query berhasil
        // Jika terdapat kesalahan, buatkan eksekusi query gagalnya
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    // Panggil fungsi update dengan data yang sesuai
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = [
            'nama mobil' => $_POST['nama mobil'],
            'brand mobil' => $_POST['brand mobil'],
            'warna mobil' => $_POST['warna mobil'],
            'tipe mobil' => $_POST['tipe mobil'],
            'harga mobil' => $_POST['harga mobil'],
        ];
    
        $berhasil = update($connect, $id, $data);
    
        if ($berhasil) {
            echo "Data berhasil diperbarui.";
        } else {
            echo "Error updating data: " . mysqli_error($connect);
        }
    }
// Tutup koneksi ke database setelah selesai menggunakan database
    $connect->close();
?>