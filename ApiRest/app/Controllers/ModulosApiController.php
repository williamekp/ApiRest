<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ModuloModel;
use CodeIgniter\HTTP\ResponseInterface;

class ModulosApiController extends ResourceController
{
    protected $modelName = 'App\Models\ModuloModel';
    protected $format    = 'json';

    // Obtener todos los módulos
    public function index()
    {
        try {
            $modulos = $this->model->findAll();
            if ($modulos) {
                return $this->respond($modulos, ResponseInterface::HTTP_OK);
            } else {
                return $this->respond(['message' => 'No modules found'], ResponseInterface::HTTP_OK);
            }
        } catch (\Exception $e) {
            return $this->failServerError('Error al obtener los módulos');
        }
    }

    // Obtener un módulo por ID
    public function show($id = null)
    {
        try {
            $modulo = $this->model->find($id);
            if ($modulo) {
                return $this->respond($modulo, ResponseInterface::HTTP_OK);
            } else {
                return $this->respond(['message' => 'Módulo no encontrado'], ResponseInterface::HTTP_NOT_FOUND);
            }
        } catch (\Exception $e) {
            return $this->failServerError('Error al obtener el módulo');
        }
    }

    // Crear un nuevo módulo
    public function create()
    {
        try {
            $data = [
                'nombre' => $this->request->getVar('nombre')
            ];
            if ($this->model->insert($data)) {
                return $this->respondCreated([
                    'status' => ResponseInterface::HTTP_CREATED,
                    'message' => 'Módulo creado exitosamente',
                    'data' => $data
                ]);
            } else {
                return $this->failValidationErrors($this->model->errors());
            }
        } catch (\Exception $e) {
            return $this->failServerError('Error al crear el módulo');
        }
    }

    // Actualizar un módulo existente
    public function update($id = null)
    {
        try {
            $data = [
                'nombre' => $this->request->getRawInput('nombre')
            ];
            if ($this->model->update($id, $data)) {
                return $this->respond([
                    'status' => ResponseInterface::HTTP_OK,
                    'message' => 'Módulo actualizado exitosamente',
                    'data' => $data
                ]);
            } else {
                return $this->failValidationErrors($this->model->errors());
            }
        } catch (\Exception $e) {
            return $this->failServerError('Error al actualizar el módulo');
        }
    }

    // Eliminar un módulo
    public function delete($id = null)
    {
        try {
            if ($this->model->delete($id)) {
                return $this->respondDeleted([
                    'status' => ResponseInterface::HTTP_OK,
                    'message' => 'Módulo eliminado exitosamente'
                ]);
            } else {
                return $this->respond(['message' => 'Módulo no encontrado'], ResponseInterface::HTTP_NOT_FOUND);
            }
        } catch (\Exception $e) {
            return $this->failServerError('Error al eliminar el módulo');
        }
    }
}
?>
