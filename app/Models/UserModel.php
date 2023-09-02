<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $returnType = 'App\Entities\User';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'name',
        'email',
        'password',
        'reset_hash',
        'reset_expire_in',
        'image',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [
        'id' => 'permit_empty|is_natural_no_zero',
        'name' => 'required|min_length[3]|max_length[125]',
        'email' => 'required|max_length[250]|valid_email|is_unique[users.email,id,{id}]',
        'password' => 'required|min_length[6]',
        'password_confirmation' => 'required_with[password]|matches[password]',
    ];
    protected $validationMessages = [
        'name' => [
            'required' => 'O campo Nome completo é obrigatório.',
            'min_length' => 'O campo Nome completo precisa ter pelo menos 3 carecteres.',
            'max_length' => 'O campo Nome completo não pode ser maior que 125 caracteres.',
        ],
        'email' => [
            'required' => 'O campo E-mail é obrigatório.',
            'is_unique' => 'Esse e-mail já foi escolhido. Por favor informe outro.',
            'max_length' => 'O campo E-mail não pode ser maior que 230 caracteres.',
        ],
        'password' => [
            'min_length' => 'A Senha precisa ter pelo menos 6 carecteres.',
        ],
        'password_confirmation' => [
            'required_with' => 'Por favor confirme sua senha.',
            'matches' => 'As senhas precisam ser iguais.',
        ],
    ];

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = ['hasPassword'];
    protected $beforeUpdate = ['hasPassword'];

    protected function hasPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password_hash'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
            unset($data['data']['password']);
            unset($data['data']['password_confirmation']);
        }

        return $data;
    }
}
