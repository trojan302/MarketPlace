<?php 

class Database
{

	public $db;

    public function __construct()
    {
        $this->db = new mysqli("localhost", "root", "","project_ecommerce");

        return $this->db;
    }
}

?>