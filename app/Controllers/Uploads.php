<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Uploads extends BaseController
{
    public function show($filename)
    {
        $filePath = ROOTPATH . 'public/uploads/' . $filename;

        if (file_exists($filePath)) {
            // Set appropriate headers for file download
            header('Content-Type: ' . mime_content_type($filePath));
            header('Content-Disposition: inline; filename="' . $filename . '"');
            header('Content-Transfer-Encoding: binary');
            header('Accept-Ranges: bytes');
            readfile($filePath);
        } else {
            // File not found, you might want to handle this case appropriately
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
