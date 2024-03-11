<?php

namespace App\Models;

class UserModel
{
    private $id;
    private $nome;
    private $sexo;
    private $email;
    private $provincia;
    private $contacto;
    private $username;
    private $senha;
    private $tipo_usuario;
    private $permissoes;
    private $idade;

    // Métodos de acesso (getters e setters)
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getNome() { return $this->nome; }
    public function setNome($nome) { $this->nome = $nome; }

    public function getSexo() { return $this->sexo; }
    public function setSexo($sexo) { $this->sexo = $sexo; }

    public function getEmail() { return $this->email; }
    public function setEmail($email) { $this->email = $email; }

    public function getProvincia() { return $this->provincia; }
    public function setProvincia($provincia) { $this->provincia = $provincia; }

    public function getContacto() { return $this->contacto; }
    public function setContacto($contacto) { $this->contacto = $contacto; }

    public function getUsername() { return $this->username; }
    public function setUsername($username) { $this->username = $username; }

    public function getSenha() { return $this->senha; }
    public function setSenha($senha) { $this->senha = $senha; }

    public function getTipoUsuario() { return $this->tipo_usuario; }
    public function setTipoUsuario($tipo_usuario) { $this->tipo_usuario = $tipo_usuario; }

    public function getPermissoes() { return $this->permissoes; }
    public function setPermissoes($permissoes) { $this->permissoes = $permissoes; }

    public function getIdade() { return $this->idade; }
    public function setIdade($idade) { $this->idade = $idade; }

    // Métodos adicionais (opcional)
    public function toArray()
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'sexo' => $this->sexo,
            'email' => $this->email,
            'provincia' => $this->provincia,
            'contacto' => $this->contacto,
            'username' => $this->username,
            'senha' => $this->senha,
            'tipo_usuario' => $this->tipo_usuario,
            'permissoes' => $this->permissoes,
            'idade' => $this->idade,
        ];
    }

    public static function fromArray(array $data)
    {
        $user = new UserModel();
        $user->setId($data['id']);
        $user->setNome($data['nome']);
        $user->setSexo($data['sexo']);
        $user->setEmail($data['email']);
        $user->setProvincia($data['provincia']);
        $user->setContacto($data['contacto']);
        $user->setUsername($data['username']);
        $user->setSenha($data['senha']);
        $user->setTipoUsuario($data['tipo_usuario']);
        $user->setPermissoes($data['permissoes']);
        $user->setIdade($data['idade']);

        return $user;
    }

public function hashPassword() {
    if (!empty($this->senha)) {
        $this->senha = password_hash($this->senha, PASSWORD_DEFAULT);
    }
}

public function calculateAge() {
    if (!empty($this->idade)) {
        $dob = new DateTime($this->idade);
        $today = new DateTime();
        $age = $today->diff($dob)->y;

        return $age;
    }

    return null;  // Ou outra marcação apropriada para indicar que a idade não pode ser calculada
}


public function validate() {
    $errors = [];

    // Validação de e-mail
    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'O e-mail não é válido.';
    }

    // Validação de senha
    if (strlen($this->senha) < 8) {
        $errors[] = 'A senha deve ter pelo menos 8 caracteres.';
    }

    // Adicione mais validações conforme necessário

    return $errors;
}


}