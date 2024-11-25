<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class ModulosController extends Controller
{
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('modulos');
        $query = $builder->get();
        $data['modulos'] = $query->getResult();
        return view('modulos', $data);
    }
}
?>
