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
        if (empty($validationErrors)) {
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

    public function updateUser($userId, $userData)
    {
        $existingUser = $this->userModel->getUserById($userId);

        if ($existingUser) {
            $updatedUser = UserModel::fromArray($userData);
            $updatedUser->setId($userId);

            $validationErrors = $updatedUser->validate();
            if (empty($validationErrors)) {
                $this->userModel->updateUser($userId, $updatedUser->toArray());
                echo "Usuário atualizado com sucesso.";
            } else {
                echo "Erros de validação: " . implode(', ', $validationErrors);
            }
        } else {
            echo "Usuário não encontrado.";
        }
    }

    public function deleteUser($userId)
    {
        $existingUser = $this->userModel->getUserById($userId);

        if ($existingUser) {
            $this->userModel->deleteUser($userId);
            echo "Usuário excluído com sucesso.";
        } else {
            echo "Usuário não encontrado.";
        }
    }

    // Outros métodos para listar usuários, gerenciar permissões, etc.
}