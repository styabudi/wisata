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
    public function GetAllWisataForDropdown()
    {
        $this->db->query('SELECT id, nama FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function GetWisataById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function tambahData($data)
    {
        $query = "INSERT INTO " . $this->table . "(nama, alamat, harga) VALUES (:nama,:alamat,:harga)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('harga', $data['harga']);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function updateData($data)
    {
        $query = "UPDATE " . $this->table . " SET nama = :nama, alamat = :alamat,harga = :harga where id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('harga', $data['harga']);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function deleteWisata($id)
    {
        $query = "DELETE FROM " . $this->table . " where id =:id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
