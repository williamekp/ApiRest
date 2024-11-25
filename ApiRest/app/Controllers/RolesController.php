<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class RolesController extends Controller
{
    public function index()
    {
        $db = \Config\Database::connect();

        // Consulta para obtener roles con sus módulos
        $query = $db->query("
            SELECT r.id, r.nombre, GROUP_CONCAT(m.nombre SEPARATOR ', ') as modulos
            FROM Roles r
            LEFT JOIN Roles_Modulos rm ON r.id = rm.rol_id
            LEFT JOIN modulos m ON rm.modulo_id = m.id
            GROUP BY r.id
        ");
        $data['roles'] = $query->getResult();
        
        return view('roles', $data);
    }
}
?>
