<?php
if ($_POST) {

    include '../config/Database.php';
    include '../object/Anggota.php';

    $database = new Database();
    $db = $database->getConnection();

    $anggota = new Anggota($db);

    $anggota->NIK = $_POST['nik'];
    $anggota->NamaLengkap = $_POST['namalengkap'];
    $anggota->alamat = $_POST['alamat'];
    $anggota->NoTelp = $_POST['notelp'];
    $anggota->ID = $_POST['id'];

    $anggota->update();
    
}
header("Location: http://localhost/perpus_app/anggota/index.php");
?>