<!-- Pada file ini kalian membuat coding untuk logika delete / menghapus data mobil pada showroom sesuai id-->
<?php 
// (1) Jangan lupa sertakan koneksi database dari yang sudah kalian buat yaa
    include('connect.php');
// (2) Tangkap nilai "id" mobil (CLUE: gunakan GET)
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    // (3) Buatkan perintah SQL DELETE untuk menghapus data dari tabel berdasarkan id mobil
    $query = "DELETE FROM showroom mobil WHERE id = $id";
    $result = mysqli_query($connect, $query);
    // (4) Buatkan perkondisi jika eksekusi query berhasil
        if ($result) {
            echo "<script>alert('Data Berhasil dihapus');</script>";
            echo "<script>window.location.href = 'list_mobil.php';</script>";
        } 
        else {
            echo "<script>alert('Data Gagal dihapus');</script>";
            echo "<script>window.location.href = 'list_mobil.php';</script>";
        }
    }
// Tutup koneksi ke database setelah selesai menggunakan database
    $connect->close();

?>