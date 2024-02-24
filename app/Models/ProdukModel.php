<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $returnType = 'object';
    protected $allowedFields = ['nama_produk', 'stok', 'harga', 'deskripsi'];
    public function deleteProduk($id_produk)
{
    return $this->where('id_produk', $id_produk)->delete();
}
public function getStok($id)
    {
        return $this->db->table($this->table)->where('id_produk', $id)->get()->getRow()->stok;
    }

    public function kurangiStok($id, $jumlah)
    {
        $this->db->table($this->table)->where('id_produk', $id)->decrement('stok', $jumlah);
    }


}
