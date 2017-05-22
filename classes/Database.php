<?php

class Database
{

	public $db;

    public function __construct()
    {
        $this->db = new MySQLi("localhost", "root", "","marketplace")or die($this->db->error);

        return $this->db;
    }
}

?>