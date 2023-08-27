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

    public function getUsers() {
        // if(!$this->request->isAJAX()) {
        //     return redirect()->back();
        // }

        $users = $this->userModel->select(['id', 'name', 'email', 'active', 'image'])->findAll();
        
        echo '<pre>';
        print_r($users);
        exit;
    }
}
