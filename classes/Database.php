<?php 

class Database
{

	public $db;

    public function __construct()
    {
        $this->db = new mysqli("localhost", "root", "","marketplace");

        return $this->db;
    }
}

?>