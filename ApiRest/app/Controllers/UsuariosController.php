<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
use App\Models\UsuarioRolModel;

class UsuariosController extends Controller
{   
    public function index()
    {
        $db = \Config\Database::connect();
        // Consulta para obtener usuarios con sus roles
        $query = $db->query("
            SELECT u.id, u.nombre, u.email, u.contrasenia, GROUP_CONCAT(r.nombre SEPARATOR ', ') as roles
            FROM Usuarios u
            LEFT JOIN Usuarios_Roles ur ON u.id = ur.usuario_id
            LEFT JOIN roles r ON ur.rol_id = r.id
            GROUP BY u.id
        ");
        $data['usuarios'] = $query->getResult();
        
        return view('usuarios', $data);
    }

    public function agregar()
    {
        helper(['form']);
        $data['roles'] = $this->obtenerRoles();
        echo view('usuarios/agregar', $data);
    }

    public function guardar()
    {
        $model = new UsuarioModel();
        $usuarioRolModel = new UsuarioRolModel();
        $roles = $this->request->getVar('roles');

        $data = [
            'nombre' => $this->request->getVar('nombre'),
            'email' => $this->request->getVar('email'),
            'contrasenia' => password_hash($this->request->getVar('contrasenia'), PASSWORD_DEFAULT)
        ];

        if ($model->save($data)) {
            $usuarioId = $model->insertID();
            if (!empty($roles)) {
                foreach ($roles as $rolId) {
                    $usuarioRolModel->save([
                        'usuario_id' => $usuarioId,
                        'rol_id' => $rolId
                    ]);
                }
            }
            return redirect()->to('/login');
        } else {
            return redirect()->back()->withInput()->with('msg', 'Error al guardar el usuario');
        }
    }

    private function obtenerRoles()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('Roles');
        return $builder->get()->getResult();
    }
}
?>
