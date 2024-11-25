<?php
namespace App\Models;

use CodeIgniter\Model;

class RolModel extends Model
{
    protected $table = 'Roles';
    protected $allowedFields = ['nombre'];
}
?>
