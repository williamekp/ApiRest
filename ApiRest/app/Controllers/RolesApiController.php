<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\RolModel;
use CodeIgniter\HTTP\ResponseInterface;

class RolesApiController extends ResourceController
{
    protected $modelName = 'App\Models\RolModel';
    protected $format    = 'json';

    // Obtener todos los roles
    public function index()
    {
        try {
            $roles = $this->model->findAll();
            if ($roles) {
                return $this->respond($roles, ResponseInterface::HTTP_OK);
            } else {
                return $this->respond(['message' => 'No roles found'], ResponseInterface::HTTP_OK);
            }
        } catch (\Exception $e) {
            return $this->failServerError('Error al obtener los roles');
        }
    }

    // Obtener un rol por ID
    public function show($id = null)
    {
        try {
            $rol = $this->model->find($id);
            if ($rol) {
                return $this->respond($rol, ResponseInterface::HTTP_OK);
            } else {
                return $this->respond(['message' => 'Rol no encontrado'], ResponseInterface::HTTP_NOT_FOUND);
            }
        } catch (\Exception $e) {
            return $this->failServerError('Error al obtener el rol');
        }
    }

    // Crear un nuevo rol
    public function create()
    {
        try {
            $data = [
                'nombre' => $this->request->getVar('nombre')
            ];
            if ($this->model->insert($data)) {
                return $this->respondCreated([
                    'status' => ResponseInterface::HTTP_CREATED,
                    'message' => 'Rol creado exitosamente',
                    'data' => $data
                ]);
            } else {
                return $this->failValidationErrors($this->model->errors());
            }
        } catch (\Exception $e) {
            return $this->failServerError('Error al crear el rol');
        }
    }

    // Actualizar un rol existente
    public function update($id = null)
    {
        try {
            $data = [
                'nombre' => $this->request->getRawInput('nombre')
            ];
            if ($this->model->update($id, $data)) {
                return $this->respond([
                    'status' => ResponseInterface::HTTP_OK,
                    'message' => 'Rol actualizado exitosamente',
                    'data' => $data
                ]);
            } else {
                return $this->failValidationErrors($this->model->errors());
            }
        } catch (\Exception $e) {
            return $this->failServerError('Error al actualizar el rol');
        }
    }

    // Eliminar un rol
    public function delete($id = null)
    {
        try {
            if ($this->model->delete($id)) {
                return $this->respondDeleted([
                    'status' => ResponseInterface::HTTP_OK,
                    'message' => 'Rol eliminado exitosamente'
                ]);
            } else {
                return $this->respond(['message' => 'Rol no encontrado'], ResponseInterface::HTTP_NOT_FOUND);
            }
        } catch (\Exception $e) {
            return $this->failServerError('Error al eliminar el rol');
        }
    }
}
?>
