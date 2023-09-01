<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;
use Faker\Factory;

class UserFakerSeeder extends Seeder
{
    public function run()
    {
        $userModel = new UserModel();
        $faker = Factory::create('pt-BR');

        $quantityUserCreate = 5000;
        $usersPush = [];

        for ($i = 0; $i < $quantityUserCreate; ++$i) {
            array_push($usersPush, [
                'name' => $faker->unique()->name,
                'email' => $faker->unique()->email,
                'password_hash' => password_hash('123456', PASSWORD_DEFAULT),
                'active' => $faker->boolean(),
            ]);
        }

        $userModel->skipValidation(true)->protect(false)->insertBatch($usersPush);

        echo "{$quantityUserCreate} usuários criados com sucesso";
    }
}
