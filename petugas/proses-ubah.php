<?php
if ($_POST) {

    include '../config/Database.php';
    include '../object/Petugas.php';

    $database = new Database();
    $db = $database->getConnection();

    $petugas = new Petugas($db);

    $petugas->Email = $_POST['email'];
    $petugas->Password = $_POST['password'];
    $petugas->Role = $_POST['role'];
    $petugas->ID = $_POST['id'];

    $petugas->update();
    
}
header("Location: http://localhost/perpus_app/petugas/index.php");
?>