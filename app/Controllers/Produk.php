<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\FileModel;
use App\Controllers\BaseController;

class Produk extends BaseController
{
    protected $produk;

    public function __construct()
    {
        $this->produk = new ProdukModel();
    }

    // In your controller (e.g., Uploads.php)
public function show($filename)
{
    return $this->response->download(ROOTPATH . 'public/uploads/' . $filename, null);
}

    public function insert()
{
    $file = $this->request->getFile('file');
    $nama_produk = $this->request->getPost('nama_produk');
    $stok = $this->request->getPost('stok');
    $harga = $this->request->getPost('harga');
    $deskripsi = $this->request->getPost('deskripsi');

    // Assuming the 'uploads' directory is at the root level of your CodeIgniter 4 project
    $uploadPath = ROOTPATH . 'public/uploads/';

    if ($file->isValid() && !$file->hasMoved()) {
        $newName = $file->getRandomName();
            $file->move($uploadPath, $newName);

        // Save product details to the database
        $produkModel = new FileModel(); // Assuming you have a model named FileModel
        $data = [
            'nama_produk' => $nama_produk,
            'stok' => $stok,
            'harga' => $harga,
            'deskripsi' => $deskripsi,
            'file' => $newName,
            // 'file_path' => 'uploads/' . $newName, // Optional: If you want to store the file path
        ];
        $produkModel->insert($data);

        return redirect()->to('/produk/index')->with('success', 'Product added successfully.');
    } else {
        return redirect()->to('/produk/index')->with('error', 'Product add failed.');
    }
}

    public function index()
    {
        // membuat instan kelas dari ProdukModel
        $data['produk'] = $this->produk->findAll();
        echo view('produk/index', $data);
    }
    public function add()
    {
        return view('produk/form_produk');
    }
    public function create()
    {
        $validate = $this->validate([
            'nama_produk' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Nama produk tidak boleh kosong',
                    'min_length' => 'Nama Produk minimal 5 Karakter'
                ]
            ]
        ]);
        if (!$validate) {
            return view('produk/form_produk', ['validation' => $this->validator]);
        }
        $data = $this->request->getPost();
        $this->produk->insert($data);
        return redirect()->to('produk');
    }
    public function edit($id_produk)
    {
        $produk = $this->produk->find($id_produk);
        return view('produk/edit_produk', ['produk' => $produk]);
    }

    public function update($id_produk)
{
    // Validation rules
    $validationRules = [
        'nama_produk' => 'required|min_length[5]',
        'stok' => 'required|numeric',
        'harga' => 'required|numeric',
        'deskripsi' => 'required',
        'file' => 'max_size[file,1024]|is_image[file]',
    ];

    $validation = \Config\Services::validation();
    $validation->setRules($validationRules);

    // Run validation
    if (!$validation->withRequest($this->request)->run()) {
        return view('produk/edit_produk', ['validation' => $validation, 'produk' => $this->produk->find($id_produk)]);
    }

    // Existing product data
    $existingProduct = $this->produk->find($id_produk);

    // Handle file upload
    $file = $this->request->getFile('file');
    if ($file->isValid() && !$file->hasMoved()) {
        // If a new file is uploaded, move it to the 'uploads' directory
        $newName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/uploads/', $newName);
        
        // Delete the old file if it exists
        $oldFile = $existingProduct->file;
        if (!empty($oldFile) && file_exists(ROOTPATH . 'public/uploads/' . $oldFile)) {
            unlink(ROOTPATH . 'public/uploads/' . $oldFile);
        }

        // Set the new file name in the data array
        $existingProduct->file = $newName;
    }

    // Update other product data
    $data = [
        'nama_produk' => $this->request->getPost('nama_produk'),
        'stok' => $this->request->getPost('stok'),
        'harga' => $this->request->getPost('harga'),
        'deskripsi' => $this->request->getPost('deskripsi'),
        'file' => $existingProduct->file, // Pastikan ini adalah nama kolom yang benar di basis data
    ];

    // Save the changes to the database
    $this->produk->update($id_produk, $data);

    return redirect()->to('/produk')->with('success', 'Product updated successfully!');
}


    public function delete($id_produk)
    {
        // Find the record to be deleted using the same instance of ProdukModel
        $produk = $this->produk->find($id_produk);

        if ($produk) {
            // Delete the record using the deleteProduk method in the model
            $this->produk->deleteProduk($id_produk);

            return redirect()->to('/produk')->with('success', 'Record deleted successfully!');
        } else {
            return redirect()->to('/produk')->with('error', 'Record not found!');
        }
    }

}
