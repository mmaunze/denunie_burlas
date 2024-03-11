<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController
{
    private $userModel;

    public function __construct($db)
    {
        $this->userModel = new UserModel($db);
    }

    public function createUser($userData)
    {
        $user = UserModel::fromArray($userData);
        $user->hashPassword();

        $validationErrors = $user->validate();
        if (!is_array($validationErrors)) {
            $userId = $this->userModel->createUser($user->toArray());
            // Lógica para lidar com a resposta, como redirecionar ou retornar um JSON
            echo "Usuário criado com ID: " . $userId;
        } else {
            // Lógica para lidar com erros de validação, como exibir mensagens de erro
            echo "Erros de validação: " . implode(', ', $validationErrors);
        }
    }

    public function getUserById($userId)
    {
        $user = $this->userModel->getUserById($userId);
        // Lógica para lidar com o usuário, como renderizar uma visão ou retornar um JSON
        var_dump($user);
    }

    // Outros métodos para atualizar, deletar, listar usuários, etc.

    public function updateUser($userId, $userData)
    {
        $existingUser = $this->userModel->getUserById($userId);

        if ($existingUser) {
            $user = UserModel::fromArray($userData);
            $user->setId($userId);

            $validationErrors = $user->validate();
            if (!is_array($validationErrors)) {
                $this->userModel->updateUser($userId, $user->toArray());
                // Lógica para lidar com a resposta, como redirecionar ou retornar um JSON
                echo "Usuário atualizado com sucesso.";
            } else {
                // Lógica para lidar com erros de validação, como exibir mensagens de erro
                echo "Erros de validação: " . implode(', ', $validationErrors);
            }
        } else {
            // Lógica para lidar com o cenário em que o usuário não existe
            echo "Usuário não encontrado.";
        }
    }

    // Métodos adicionais para deletar, listar usuários, etc.
}

// Exemplo de uso:
// $userController = new UserController($db);
// $userController->createUser($userData);
// $userController->getUserById(1);
// $userController->updateUser(1, $updatedUserData);