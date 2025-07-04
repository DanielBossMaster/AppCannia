<?php
namespace App\Controllers;

use App\Models\VeterinarioModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Veterinario extends BaseController
{

public function index()
    {
        return view('veterinario/index'); 
    }
}
?>