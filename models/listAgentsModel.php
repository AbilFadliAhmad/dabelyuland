<?php
class ListAgentsModel {
    private $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }

}