<?php

class Anggota {

    private $conn;
    private $table_name = "Anggota";

    public $ID;
    public $NIK;
    public $NamaLengkap;
    public $alamat;
    public $NoTelp;
    public $TglRegistrasi;

    public function __construct($db) {
        $this->conn = $db;
    }

    function create () {
        //insert
        $query = "INSERT INTO " . $this->table_name . " (NIK, NamaLengkap, alamat, NoTelp, TglRegistrasi)" .
                                  " VALUES (:NIK, :NamaLengkap, :alamat, :NoTelp, :TglRegistrasi)";

        $result = $this->conn->prepare($query);

        $this->NIK = htmlspecialchars(strip_tags($this->NIK));
        $this->NamaLengkap = htmlspecialchars(strip_tags($this->NamaLengkap));
        $this->alamat = htmlspecialchars(strip_tags($this->alamat));
        $this->NoTelp = htmlspecialchars(strip_tags($this->NoTelp));
        $this->TglRegistrasi = date("Y-m-d");

        $result->bindParam(":NIK", $this->NIK);
        $result->bindParam(":NamaLengkap", $this->NamaLengkap);
        $result->bindParam(":alamat", $this->alamat);
        $result->bindParam(":NoTelp", $this->NoTelp);
        $result->bindParam(":TglRegistrasi", $this->TglRegistrasi);

        if($result->execute()) {
            return true;
        } else {
            return false;
        }

    }

    function readALL() {

        $query = "SELECT * FROM " . $this->table_name;

        $result = $this->conn->prepare($query);
        $result->execute();

        return $result;
    }

    function ReadOne() {

        $query = "SELECT * FROM " . $this->table_name . " WHERE ID = ?";

        $result = $this->conn->prepare($query);
        $result->bindParam(1, $this->ID);
        $result->execute();

        $row = $result->fetch(PDO::FETCH_ASSOC);

        $this->NIK = $row['NIK'];
        $this->NamaLengkap = $row['NamaLengkap'];
        $this->alamat = $row['alamat'];
        $this->NoTelp = $row['NoTelp'];
    }

    function update() {
        $query = "UPDATE " . $this->table_name . " SET
            NIK = :NIK,
            NamaLengkap = :NamaLengkap,
            alamat = :alamat,
            NoTelp = :NoTelp
            WHERE
            ID = :ID";

        echo $query;
        $result = $this->conn->prepare($query);

        $this->NIK = htmlspecialchars(strip_tags($this->NIK));
        $this->NamaLengkap = htmlspecialchars(strip_tags($this->NamaLengkap));
        $this->alamat = htmlspecialchars(strip_tags($this->alamat));
        $this->NoTelp = htmlspecialchars(strip_tags($this->NoTelp));

        $result->bindParam(":NIK", $this->NIK);
        $result->bindParam(":NamaLengkap", $this->NamaLengkap);
        $result->bindParam(":alamat", $this->alamat);
        $result->bindParam(":NoTelp", $this->NoTelp);
        $result->bindParam(":ID", $this->ID);

        $result->execute();
    }

    function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE ID = ?";

        $result = $this->conn->prepare($query);
        $result->bindParam(1, $this->ID);

        $result->execute();
    }
}



?>