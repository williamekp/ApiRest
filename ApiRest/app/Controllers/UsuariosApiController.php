<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UsuarioModel;
use CodeIgniter\HTTP\ResponseInterface;

class UsuariosApiController extends ResourceController
{
    protected $modelName = 'App\Models\UsuarioModel';
    protected $format    = 'json';

    // Obtener todos los usuarios
    public function index()
    {
        try {
            $usuarios = $this->model->findAll();
            return $this->respond($usuarios, ResponseInterface::HTTP_OK);
        } catch (\Exception $e) {
            return $this->failServerError('Error al obtener los usuarios');
        }
        return $this->respond(ResponseInterface::HTTP_OK);
    }

    // Obtener un usuario por ID
    public function show($id = null)
    {
        try {
            $usuario = $this->model->find($id);
            if ($usuario) {
                return $this->respond($usuario, ResponseInterface::HTTP_OK);
            } else {
                return $this->failNotFound('Usuario no encontrado');
            }
        } catch (\Exception $e) {
            return $this->failServerError('Error al obtener el usuario');
        }
    }

    // Crear un nuevo usuario
    public function create()
    {
        try {
            $data = [
                'nombre' => $this->request->getVar('nombre'),
                'email' => $this->request->getVar('email'),
                'contrasenia' => password_hash($this->request->getVar('contrasenia'), PASSWORD_DEFAULT)
            ];
            if ($this->model->insert($data)) {
                return $this->respondCreated([
                    'status' => ResponseInterface::HTTP_CREATED,
                    'message' => 'Usuario creado exitosamente',
                    'data' => $data
                ]);
            } else {
                return $this->failValidationErrors($this->model->errors());
            }
        } catch (\Exception $e) {
            return $this->failServerError('Error al crear el usuario');
        }
    }

    // Actualizar un usuario existente
    public function update($id = null)
    {
        try {
            $data = [
                'nombre' => $this->request->getRawInput('nombre'),
                'email' => $this->request->getRawInput('email'),
                'contrasenia' => password_hash($this->request->getRawInput('contrasenia'), PASSWORD_DEFAULT)
            ];
            if ($this->model->update($id, $data)) {
                return $this->respond([
                    'status' => ResponseInterface::HTTP_OK,
                    'message' => 'Usuario actualizado exitosamente',
                    'data' => $data
                ]);
            } else {
                return $this->failValidationErrors($this->model->errors());
            }
        } catch (\Exception $e) {
            return $this->failServerError('Error al actualizar el usuario');
        }
    }

    // Eliminar un usuario
    public function delete($id = null)
    {
        try {
            if ($this->model->delete($id)) {
                return $this->respondDeleted([
                    'status' => ResponseInterface::HTTP_OK,
                    'message' => 'Usuario eliminado exitosamente'
                ]);
            } else {
                return $this->failNotFound('Usuario no encontrado');
            }
        } catch (\Exception $e) {
            return $this->failServerError('Error al eliminar el usuario');
        }
    }
}
?>
