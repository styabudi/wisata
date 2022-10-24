<?php
class PemesananTiketModel
{
    private $table = 'pemesanan_tiket';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function saveBookingTiket($data)
    {
        $query = "INSERT INTO " . $this->table . "(nama_pemesan,nik,no_hp,tempat_wisata,tanggal_kunjungan,pengunjung_dewasa,pengunjung_anak,total_harga) 
                VALUES (:nama, :nik, :no_hp, :tempat_wisata, :tanggal_kunjungan, :pengunjung_dewasa, :pengunjung_anak, :total_harga)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nik', $data['nik']);
        $this->db->bind('no_hp', $data['hp']);
        $this->db->bind('tempat_wisata', $data['tempat_wisata']);
        $this->db->bind('tanggal_kunjungan', $data['tanggal_kunjungan']);
        $this->db->bind('pengunjung_dewasa', $data['pengunjung_dewasa']);
        $this->db->bind('pengunjung_anak', (trim($data['pengunjung_anak']) == '') ? null : $data['pengunjung_anak']);
        $this->db->bind('total_harga', $data['total_harga']);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
