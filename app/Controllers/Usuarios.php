<?php 

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Exception;


class Usuarios extends ResourceController{
    use ResponseTrait;

    private $usuarioModel;
    private $token = 'allowaccess';

    public function __construct(){
        $this->usuarioModel = new \App\Models\UsuariosModel();
    }

    //validar token
    //validate token
    private function _validateToken(){
        return $this->request->getHeaderLine('token') == $this->token;
    }

    //listar todos usuarios (GET)
    //list all users (GET)
    public function index(){
        $data =  $this->usuarioModel->findAll();
        return $this->response->setJSON($data);
    }

    //listar um usuario específico (GET)
    //list a specific user (GET)
    public function list($id = null){
        $data = $this->usuarioModel->where('id', $id)->first();
        return $this->respond($data);
    }

    //criar novo usuário (POST)
    //create a new user (POST)
    public function create(){
        $response = [];

        if($this->_validateToken() == true){
            $data['nome'] = $this->request->getPost('nome');
            $data['email'] = $this->request->getPost('email');
            $data['senha'] = $this->request->getPost('senha');

            try{
                if($this->usuarioModel->insert($data)){
                    $response = [
                        'response' => 'success',
                        'msg' => 'Usuário criado com sucesso'
                    ];
                } else {
                    $response = [
                        'response' => 'error',
                        'msg' => 'Erro ao criar usuário',
                        'errors' => $this->usuarioModel->errors()
                    ]; 
                }

            } catch(Exception $e){
                $response = [
                    'response' => 'error',
                    'msg' => 'Erro ao criar usuário',
                    'errors' => [
                        'exception'=> $e->getMessage()
                    ]
                ]; 
            }

        } else {
            $response = [
                'response' => 'error',
                'msg' => 'Token inválido',
            ];
        }

        return $this->response->setJSON($response);
    }

    //atualizar informações de um usuário (PUT)
    //update a user's information (PUT)
    public function update($id = null){
        $response = [];

        if($this->_validateToken() == true){

            $data = $this->request->getJSON();

            try{
                if($this->usuarioModel->update($id, $data)){
                    $response = [
                        'response' => 'success',
                        'msg' => 'Usuário atualizado com sucesso',
                    ];
                } else {
                    $response = [
                        'response' => 'error',
                        'msg' => 'Erro ao atualizar usuário',
                        'errors' => $this->usuarioModel->errors()
                    ];
                }

            } catch(Exception $e){
                $response = [
                    'response' => 'error',
                    'msg' => 'Erro ao atualizar usuário',
                    'errors' => [
                        'exception'=> $e->getMessage()
                    ]
                ];
            }

        } else {
            $response = [
                'response' => 'error',
                'msg' => 'Token inválido',
            ];
        }

        return $this->response->setJSON($response);
    }

    //remover um usuario (DELETE)
    //remove a user (DELETE)
    public function delete($id = null){
        $response = [];

        if($this->_validateToken() == true){

            $data = $this->usuarioModel->find($id);

            try{
                if($data){
                    if($this->usuarioModel->where('id', $id)->delete($id)){
                        $response = [
                            'response' => 'success',
                            'msg' => 'Usuário removido com sucesso',
                        ];
                    } else {
                        $response = [
                            'response' => 'error',
                            'msg' => 'Erro ao remover usuário',
                            'errors' => $this->usuarioModel->errors()
                        ];
                    }
                } else {
                    $response = [
                        'response' => 'error',
                        'msg' => 'O ID informado não existe',
                    ];
                }

            } catch(Exception $e){
                $response = [
                    'response' => 'error',
                    'msg' => 'Erro ao remover usuário',
                    'errors' => [
                        'exception'=> $e->getMessage()
                    ]
                ];
            }

        } else {
            $response = [
                'response' => 'error',
                'msg' => 'Token inválido',
            ];
        }

        return $this->response->setJSON($response);
    }

}