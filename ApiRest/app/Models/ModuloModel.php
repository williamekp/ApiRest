<?php
namespace App\Models;

use CodeIgniter\Model;

class ModuloModel extends Model
{
    protected $table = 'Modulos';
    protected $allowedFields = ['nombre'];
}
?>
