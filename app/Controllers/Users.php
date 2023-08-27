<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Users extends BaseController
{

    private UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Listando os usuários do sistema'
        ];

        return view('Users/index', $data);
    }

    public function getUsers()
    {
        if (!$this->request->isAJAX()) {
            return redirect()->back();
        }

        $users = $this->userModel->select(['id', 'name', 'email', 'active', 'image'])->findAll();

        $data = [];
        foreach ($users as $user) {
            $data[] = [
                'image' => $user->image,
                'name' => esc($user->name),
                'email' => esc($user->email),
                'active' => $user->active === 't' ? '<i class="fa fa-unlock text-success"></i>&nbsp;Ativo' : '<i class="fa fa-lock text-warning"></i>&nbsp;Inativo'
            ];
        }

        return $this->response->setJSON(['data' => $data]);
    }
}
