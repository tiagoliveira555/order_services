<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

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
            'title' => 'Listando os usuários do sistema',
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
                'name' => anchor("/users/show/{$user->id}", esc($user->name), 'title: "exibir usuário '.esc($user->name).'"'),
                'email' => esc($user->email),
                'active' => $user->active === 't' ? '<i class="fa fa-unlock text-success"></i>&nbsp;Ativo' : '<i class="fa fa-lock text-warning"></i>&nbsp;Inativo',
            ];
        }

        return $this->response->setJSON(['data' => $data]);
    }

    public function show(int $id = null)
    {
        $user = $this->getUserOr404($id);

        $data = [
            'title' => 'Detalhando o usuário '.esc($user->name),
            'user' => $user,
        ];

        return view('Users/show', $data);
    }

    public function edit(int $id = null)
    {
        $user = $this->getUserOr404($id);

        $data = [
            'title' => 'Editando o usuário '.esc($user->name),
            'user' => $user,
        ];

        return view('Users/edit', $data);
    }

    public function update()
    {
        if (!$this->request->isAJAX()) {
            return redirect()->back();
        }

        $responseData['token'] = csrf_hash();

        $post = $this->request->getPost();

        $user = $this->getUserOr404($post['id']);

        if (empty($post['password'])) {
            unset($post['password']);
            unset($post['password_confirmation']);
        }

        $user->fill($post);

        if ($user->hasChanged() === false) {
            $responseData['info'] = 'Não há dados para serem atualizados.';

            return $this->response->setJSON($responseData);
        }
        if ($this->userModel->protect(false)->save($user)) {
            session()->setFlashdata('success', 'Dados salvos com sucesso!');

            return $this->response->setJSON($responseData);
        }

        $responseData['error'] = 'Por favor verifique os campos abaixo e tente novamente.';
        $responseData['errors'] = $this->userModel->errors();

        return $this->response->setJSON($responseData);
    }

    private function getUserOr404(int $id = null)
    {
        if (!$id || !$user = $this->userModel->withDeleted(true)->find($id)) {
            return throw PageNotFoundException::forPageNotFound("Não encontramos o usuário com o id {$id}");
        }

        return $user;
    }
}
