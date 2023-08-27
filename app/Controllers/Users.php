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
                'active' => $user->active === 't' ? 'Ativo' : '<span class="text-warning">Inativo</span>'
            ];
        }

        return $this->response->setJSON(['data' => $data]);
    }
}
