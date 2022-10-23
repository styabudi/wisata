<?php

class WisataModel
{
    private $table = 'tempat_wisata';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function GetAllWisata()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function GetWisataById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}
