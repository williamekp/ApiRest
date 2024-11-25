<?php
namespace App\Models;

use CodeIgniter\Model;

class UsuarioRolModel extends Model
{
    protected $table = 'Usuarios_Roles';
    protected $allowedFields = ['usuario_id', 'rol_id'];
}
?>
