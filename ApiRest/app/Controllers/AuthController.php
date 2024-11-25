<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsuarioModel;

class AuthController extends Controller
{
    public function login()
    {
        helper(['form']);
        echo view('login');
    }

    public function auth()
    {
        $session = session();
        $model = new UsuarioModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
        
        if($data){
            $pass = $data['contrasenia'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'id' => $data['id'],
                    'nombre' => $data['nombre'],
                    'email' => $data['email'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('usuarios');
            }else{
                $session->setFlashdata('msg', 'Contraseña incorrecta');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'Email no encontrado');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
?>
