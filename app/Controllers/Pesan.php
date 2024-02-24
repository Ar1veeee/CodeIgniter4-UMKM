<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\PesanModel;

class Pesan extends BaseController
{
    protected $produk;
    protected $pesan;

    public function __construct()
    {
        $this->pesan = new PesanModel();
        $this->produk = new ProdukModel();
    }

    public function index()
    {
        $data['produk'] = $this->produk->findAll();
        $data['pesan'] = $this->pesan->findAll();

        echo view('pesan/index', $data);
    }

    public function add() {
        $produkModel = new ProdukModel();
        $data['produk'] = $produkModel->findAll();
        return view('pesan/form_pesan', $data);
    }   

    // Pesan.php (Pesan Controller)
public function create()
{
    $validate = $this->validate([
        'nama' => 'required',
        'nama_produk' => 'required',
        'jumlah' => 'required|numeric',
    ]);

    if (!$validate) {
        return view('pesan/form_pesan', ['validation' => $this->validator]);
    }

    $nama = $this->request->getPost('nama');
    $produkId = $this->request->getPost('nama_produk');
    $jumlah = $this->request->getPost('jumlah');

    // Check product stock
    $stokSekarang = $this->produk->getStok($produkId);

    if ($stokSekarang >= $jumlah) {
        // Reduce stock in the produk table
        $this->produk->kurangiStok($produkId, $jumlah);

        // Continue with saving the order in the pesan table
        $data = [
            'nama' => $nama,
            'nama_produk' => $produkId,
            'jumlah' => $jumlah,
            't_harga' => $this->request->getPost('t_harga'),
            // Add other fields as needed
        ];

        // Save order data
        $this->pesan->insertPesan($data);

        return redirect()->to('pesan')->with('success', 'Pesanan berhasil dibuat');
    } else {
        return redirect()->to(site_url('pesan'))->with('error', 'Stok tidak mencukupi');
    }
}


    public function edit($nama = null){
        if($nama != null){
            $pesan = $this->pesan->find($nama);
            if(is_object($pesan)){
                $data['pesan'] = $pesan;
                $data['produk'] = $this->produk->findAll();
                return view('pesan/edit_pesan', $data);
            }else{
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($nama = null){
        $this->pesan->update($nama, [
            'nama' => $this->request->getPost('nama'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'jumlah' => $this->request->getPost('jumlah'),
            'harga' => $this->request->getPost('harga'),
            't_harga' => $this->request->getPost('t_harga'),
        ]);

        return redirect() ->to('pesan');
    }

    public function delete($nama){
        $this->pesan->where('nama', $nama)->delete();
    
        return redirect() ->to('pesan');
    }
}