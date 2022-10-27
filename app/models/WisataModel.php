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

    public function getSummaryWisata()
    {
        $query = "select 
        w.id,
        w.nama tempat_wisata,
        CASE 
        WHEN t.total_pengunjung_dewasa IS NULL THEN
            0
        ELSE
            t.total_pengunjung_dewasa
        END total_dewasa,
        CASE 
        WHEN t.total_pengunjung_anak IS NULL THEN
            0
        ELSE
            t.total_pengunjung_anak
        END total_anak,
        CASE 
        WHEN t.total_pengunjung IS NULL THEN
            0
        ELSE
            t.total_pengunjung
        END total_pengunjung,
        CASE 
        WHEN t.total_pendapatan IS NULL THEN
            0
        ELSE
            t.total_pendapatan
        END total_pendapatan
    from tempat_wisata w
    left join (	select 
                                tempat_wisata,
                                sum(pengunjung_dewasa) total_pengunjung_dewasa,
                                sum(pengunjung_anak) total_pengunjung_anak,
                                (sum(pengunjung_dewasa) + sum(pengunjung_anak)) total_pengunjung,
                                sum(total_harga) total_pendapatan  
                            from pemesanan_tiket 
                            GROUP BY tempat_wisata) t on w.id = t.tempat_wisata;";

        $this->db->query($query);
        return $this->db->resultSet();
    }
}
