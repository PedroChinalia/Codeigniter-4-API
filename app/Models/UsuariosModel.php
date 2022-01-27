<?php 

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome', 'email', 'senha'];
    protected $validationRules = [
        'nome' => 'required|min_length[3]|is_unique[usuarios.nome]',
        'email' => 'required|is_unique[usuarios.email]',
        'senha' => 'required|min_length[3]'
    ];
}