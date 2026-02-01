<?php
class DashboardAgentModel {
    private $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }

}