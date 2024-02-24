<?php

namespace App\Models;

use CodeIgniter\Model;

class PesanModel extends Model
{
    protected $table = 'Pesan';
    protected $primaryKey = 'nama';
    protected $returnType = 'object';
    protected $allowedFields = ['nama', 'nama_produk', 'jumlah','harga','t_harga'];
    public function deleteProduk($nama)
{
    return $this->where('id_produk', $nama)->delete();
}
public function insertPesan($data)
    {
        return $this->insert($data);
    }
}
