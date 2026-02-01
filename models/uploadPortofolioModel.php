<?php
class UploadPortofolioModel {
    private $db;

    public function __construct() {
        global $db; // Pastikan ini adalah instance PDO
        $this->db = $db;
    }

}